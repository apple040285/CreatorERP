<template>
  <div>
    <PaginationTable
      ref="paginationTable"
      :title="$t('Project Data Setting')"
      :show-loading="showLoading"
      :fetch-all="fetchAll"
      :tableColumns="tableColumns"
      :itemsCount="itemsCount"
      @add-sidebar="() => $router.push({ name: 'ProjectData-ProjectEdit', params: { id: 'add' } })"
    >

      <!-- Column: Id -->
      <template #cell(id)="data">
        {{ data.row.originalIndex + 1 }}
      </template>

      <!-- Column: Roles -->
      <template #cell(roles)="data">
        <span class="text-nowrap">
          {{ data.row.roles.map(item => item.name).join(',') }}
        </span>
      </template>

      <!-- Column: Action -->
      <template #cell(action)="data">
        <span class="text-nowrap">
          <b-button
            v-ripple.400="'rgba(255, 255, 255, 0.15)'"
            variant="outline-success"
            size="sm"
            class="mr-50"
            :to="{ name: 'ProjectData-ProjectEdit', params: { id: data.row.id } }"
          >
            <feather-icon
              icon="Edit2Icon"
              class="mr-25"
            />
            <span>{{ $t('edit') }}</span>
          </b-button>
          <b-button
            v-ripple.400="'rgba(255, 255, 255, 0.15)'"
            variant="outline-danger"
            size="sm"
            @click="deleteMethod(data.row.id)"
          >
            <feather-icon
              icon="Trash2Icon"
              class="mr-25"
            />
            <span>{{ $t('delete') }}</span>
          </b-button>
        </span>
      </template>
    </PaginationTable>
  </div>
</template>

<script>
import BCardCode from '@core/components/b-card-code/BCardCode.vue'
import {
  BRow, BCol, BPagination, BFormGroup, BFormInput, BFormSelect, BButton, BSpinner
} from 'bootstrap-vue'
import { VueGoodTable } from 'vue-good-table'
import axios from "@axios";
import Ripple from 'vue-ripple-directive'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'
import PaginationTable from '@/layouts/components/PaginationTable.vue'
import { ref } from '@vue/composition-api';

export default {
  components: {
    BCardCode,
    BRow,
    BCol,
    VueGoodTable,
    BPagination,
    BFormGroup,
    BFormInput,
    BFormSelect,
    BButton,
    ToastificationContent,
    BSpinner,
    PaginationTable,
  },
  directives: {
    Ripple,
  },
  setup(_, { root, refs }) {
    // loading 動畫
    const showLoading = ref(false)

    // Column
    const tableColumns = [
      { label: '#', field: 'id' },
      { label: 'ProjectList.code', field: 'code' },
      { label: 'ProjectList.name', field: 'name' },
      { label: 'ProjectList.expiration_date', field: 'invalid_at' },
      { label: 'ProjectList.created_by', field: 'creator.name' },
      { label: 'ProjectList.created_at', field: 'created_at' },
      { label: 'ProjectList.updated_by', field: 'editor.name' },
      { label: 'ProjectList.updated_at', field: 'updated_at' },
      { label: 'ProjectList.remark', field: 'remark' },
      { label: 'ProjectList.action', field: 'action' },
    ]

    // 總共筆數
    const itemsCount = ref(0)
    const fetchAll = (ctx, callback) => {
      showLoading.value = true

      axios
        .post('projects/list', ctx)
        .then(response => {
          const { data, meta } = response.data

          callback(data)
          // 總共筆數
          itemsCount.value = meta.total
          // loading 結束
          showLoading.value = false
        })
        .catch(error => {
          console.log(error);
        })
    }

    const deleteMethod = id => {
      root.$swal({
        title: `${root.$t('checkDelete')}`,
        text: `${root.$t('cantRevert')}`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: `${root.$t('yes')}`,
        cancelButtonText: `${root.$t('no')}`,
        customClass: {
          confirmButton: 'btn btn-primary',
          cancelButton: 'btn btn-outline-danger ml-1',
        },
        buttonsStyling: false,
      }).then(result => {
        if (result.value) {
          axios
            .delete(`projects/${id}`)
            .then(() => {
              root.$toast({
                component: ToastificationContent,
                position: 'top-right',
                props: {
                  title: `${root.$t('deletedSuccess')}`,
                  icon: 'CoffeeIcon',
                  variant: 'success',
                  text: `${root.$t('Backend Account Management')} ${root.$t('deletedSuccess')}!`,
                },
              })

              // 重新刷新
              refs.paginationTable.fetchAll(refs.paginationTable.serverParams, data => refs.paginationTable.rows = data);
            })
            .catch(error => {
              const response = error.response

              root.$toast({
                component: ToastificationContent,
                position: 'top-right',
                props: {
                  title: `${root.$t('deletedFailed')}`,
                  icon: 'XIcon',
                  variant: 'danger',
                  text: (response ? response.data.message : error.message),
                },
              })
            })
        }
      })
    }

    return {
      showLoading,
      tableColumns,
      itemsCount,
      fetchAll,

      deleteMethod,
    }
  },
}
</script>
