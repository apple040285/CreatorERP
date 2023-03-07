<template >
  <b-card
    no-body
    class="mb-2"
  >
    <div class="card-header">
      <!-- Title & SubTitle -->
      <div>
        <b-card-title>{{ title }}</b-card-title>
        <b-card-sub-title v-if="$attrs['sub-title']">
          {{ $attrs['sub-title'] }}
        </b-card-sub-title>
      </div>
    </div>

    <!-- Header Top 功能 -->
    <div class="mx-1">
      <!-- Header Slot -->
      <slot name="header">

        <!-- Table Top -->
        <b-row>

          <!-- Per Page -->
          <b-col
            cols="12"
            md="6"
            class="d-flex align-items-center justify-content-start mb-1 mb-md-0"
          >
            <!-- <label>每頁顯示</label> -->
            <!-- <v-select
              v-model="filters.perPage"
              :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
              :options="perPageOptions"
              :clearable="false"
              class="per-page-selector d-inline-block mx-50"
              @input="handleChangePage(1)"
            /> -->
            <!-- <label>entries</label> -->
          </b-col>

          <!-- Search -->
          <b-col
            cols="12"
            md="6"
          >
            <!-- search input -->
            <div class="custom-search d-flex justify-content-end">
              <b-button
                v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                variant="outline-primary"
                class="mb-2 mr-2"
                @click="$emit('add-sidebar')"
              >
                {{ $t('create')}}
              </b-button>

              <b-form-group>
                <div class="d-flex align-items-center">
                  <b-form-input
                    v-model="serverParams.searchTerm"
                    debounce="400"
                    type="text"
                    :placeholder="$t('table.Search')"
                    class="d-inline-block"
                  />
                </div>
              </b-form-group>
            </div>
          </b-col>
        </b-row>

      </slot><!-- Header Slot End -->
    </div><!-- Header Top End -->

    <!-- table -->
    <vue-good-table
      mode="remote"
      :isLoading.sync="showLoading"
      :rows="rows"
      :columns="tableColumns.map(m => ({ thClass: (m.thClass || m.class), tdClass: (m.tdClass || m.class), ...m }))"
      :totalRows="itemsCount"
      :pagination-options="{
        enabled: true,
      }"
      @on-page-change="onPageChange"
      @on-per-page-change="onPerPageChange"
      :search-options="{
        enabled: true,
        trigger: 'enter',
        externalQuery: serverParams.searchTerm
      }"
      @on-search="onSearch"
      :sort-options="{
        enabled: true,
      }"
      @on-sort-change="onSortChange"
      class="m-1"
    >
      <!-- Loading -->
      <template #loadingContent>
        <div class="text-center">
          <b-spinner
            variant="primary"
            label="Text Centered"
          />
        </div>
      </template>
      <!-- Loading End -->

      <!-- Table Column -->
      <template #table-column="props">
        <span
          v-if="props.column.label !== '#'"
          class="text-nowrap"
        >
          {{ $t(props.column.label) }}
        </span>
      </template>
      <!-- Table Column End -->

      <!-- Table Row -->
      <template #table-row="data">
        <template v-for="(index, name) in $scopedSlots">
          <slot
            v-if="`cell(${data.column.field})` === name"
            :name="name"
            v-bind="{
              row: data.row,
              value: data.formattedRow[data.column.field],
            }"
          />
        </template>

        <template v-if="typeof ($scopedSlots[`cell(${data.column.field})`]) === 'undefined' && tableColumns.findIndex(element => element.field === data.column.field) !== -1">
          {{ data.formattedRow[data.column.field] }}
        </template>

      </template>
      <!-- Table Row End -->

      <!-- Pagination -->
      <template #pagination-bottom="props">
        <div class="d-flex justify-content-between flex-wrap">

          <!-- page length -->
          <div class="d-flex align-items-center mb-0 mt-1">
            <span class="text-nowrap ">
              {{ $t('table.Showing') }} 1 {{ $t('table.to') }}
            </span>
            <b-form-select
              v-model="serverParams.perPage"
              :options="perPageOptions"
              class="mx-1"
              @input="value => props.perPageChanged({ currentPerPage: value })"
            />
            <span class="text-nowrap">
              {{ $t('table.of') }} {{ props.total }} {{ $t('table.entries') }}
            </span>
          </div>

          <div>
            <b-pagination
              v-model="serverParams.page"
              :total-rows="props.total"
              :per-page="serverParams.perPage"
              first-number
              last-number
              align="right"
              prev-class="prev-item"
              next-class="next-item"
              class="mt-1 mb-0"
              @input="value => props.pageChanged({ currentPerPage: value })"
            >
              <template #prev-text>
                <feather-icon
                  icon="ChevronLeftIcon"
                  size="18"
                />
              </template>
              <template #next-text>
                <feather-icon
                  icon="ChevronRightIcon"
                  size="18"
                />
              </template>
            </b-pagination>
          </div>
        </div>
      </template>
      <!-- Pagination End -->

    </vue-good-table>
  </b-card>
</template>

<script>
import {
  BOverlay,
  BSpinner,
  BCard,
  BCardTitle,
  BCardSubTitle,
  BRow,
  BCol,
  BPagination,
  BButton,

  BFormGroup,
  BFormInput,
  BFormSelect,
} from 'bootstrap-vue'
import { computed, ref } from '@vue/composition-api'
// import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'
// import vSelect from 'vue-select'
import { VueGoodTable } from 'vue-good-table'
// import { groupBy } from '@/libs/utils/utils'
import Ripple from 'vue-ripple-directive'

export default {
  components: {
    BOverlay,
    BSpinner,
    BCard,
    BCardTitle,
    BCardSubTitle,
    BRow,
    BCol,
    BPagination,
    BButton,

    BFormGroup,
    BFormInput,
    BFormSelect,
    // vSelect,

    VueGoodTable,
  },
  directives: {
    Ripple,
  },
  props: {
    title: {
      type: String,
      required: true,
    },
    showLoading: {
      type: Boolean,
      required: true,
    },
    tableColumns: {
      type: Array,
      default: [],
    },
    fetchAll: {
      type: Function,
      required: true,
    },
    itemsCount: {
      type: Number,
      required: true,
    },
    // VueGoodTable 僅有的方法
    // isGroup: {
    //   type: Boolean,
    //   default: false,
    // },
    // groupKey: {
    //   type: String,
    //   default: null,
    // },
    // hiddSwitch: {
    //   type: Boolean,
    //   default: false,
    // },
    // 自訂方法
    noHeader: {
      type: Boolean,
      default: false,
    },
    noHeaderAdd: {
      type: Boolean,
      default: false,
    },
    noHeaderRefresh: {
      type: Boolean,
      default: false,
    },
    noManyRemove: {
      type: Boolean,
      default: false,
    },
  },
  setup(props) {
    // 預設分頁處理
    const serverParams = ref({
      sort: [
        {
          field: '',
          type: ''
        }
      ],
      page: 1,
      perPage: 10,
      searchTerm: '',
    })

    // 每頁顯示筆數
    const perPageOptions = [1, 5, 10, 20, 30, 100]

    // 內容資料
    const rows = ref([])

    props.fetchAll(serverParams.value, data => rows.value = data)

    const onPageChange = () => {
      props.fetchAll(serverParams.value, data => rows.value = data)
    }

    const onPerPageChange = () => {
      props.fetchAll(serverParams.value, data => rows.value = data)
    }

    const onSortChange = params => {
      serverParams.value = Object.assign({}, serverParams.value, { sort: params });

      props.fetchAll(serverParams.value, data => rows.value = data)
    }

    const onSearch = () => {
      props.fetchAll(serverParams.value, data => rows.value = data)
    }

    return {
      serverParams,
      perPageOptions,

      rows,

      onPageChange,
      onSortChange,
      onPerPageChange,
      onSearch,
    }
  }
}
</script>

<style lang="scss">
@import "@core/scss/vue/libs/vue-good-table.scss";
thead {
  tr {
    th {
      padding: 1rem !important;
    }
  }
}

tbody {
  tr {
    td {
      padding: 0.5rem !important;
    }
  }
}

@media (max-width: 767px) {
  .table-responsive .dropdown-menu {
    position: static !important;
  }
}
@media (min-width: 768px) {
  .table-responsive {
    overflow-y: visible;
  }
}
</style>
