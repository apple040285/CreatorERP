<template>
  <div>
    <PaginationTable
      ref="table"
      :title="$t('Frontend Account Management')"
      :show-loading="showLoading"
      :fetch-all="fetchAll"
      :tableColumns="tableColumns"
      :itemsCount="itemsCount"
      @add-sidebar="() => $router.push({ name: 'SystemManagement-FrontendAccountManagementCreate' })"
    >

      <!-- Column: Id -->
      <template #cell(id)="data">
        {{ data.row.originalIndex + 1 }}
      </template>

      <!-- Column: Action -->
      <template #cell(action)="data">
        <span class="text-nowrap">
          <b-button
            v-ripple.400="'rgba(255, 255, 255, 0.15)'"
            variant="outline-success"
            size="sm"
            class="mr-50"
            :to="{ name: 'SystemManagement-FrontendAccountManagementEdit', query: { id: data.row.id } }"
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
  setup() {
    // loading 動畫
    const showLoading = ref(false)

    // Column
    const tableColumns = [
      { label: '#', field: 'id' },
      { label: 'FrontendAccountManagementList.staff', field: 'staff.name' },
      { label: 'FrontendAccountManagementList.storehouse', field: 'storehouse.name' },
      { label: 'FrontendAccountManagementList.account', field: 'email' },
      { label: 'FrontendAccountManagementList.created_by', field: 'creator.name' },
      { label: 'FrontendAccountManagementList.created_at', field: 'created_at' },
      { label: 'FrontendAccountManagementList.updated_by', field: 'editor.name' },
      { label: 'FrontendAccountManagementList.updated_at', field: 'updated_at' },
      { label: 'FrontendAccountManagementList.action', field: 'action' },
    ]

    const apiPath = '/p-members';
    // 總共筆數
    const itemsCount = ref(0)
    const fetchAll = (ctx, callback) => {
      showLoading.value = true

      axios
        .post(`${apiPath}/list`, ctx)
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

    return {
      apiPath,
      showLoading,
      tableColumns,
      itemsCount,
      fetchAll,
    }
  },
  methods: {
    deleteMethod(id) {
      this.$swal({
        title: `${this.$t('checkDelete')}`,
        text: `${this.$t('cantRevert')}`,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: `${this.$t('yes')}`,
        cancelButtonText: `${this.$t('no')}`,
        customClass: {
          confirmButton: 'btn btn-primary',
          cancelButton: 'btn btn-outline-danger ml-1',
        },
        buttonsStyling: false,
      }).then(result => {
        if (result.value) {
          axios
            .delete(`${this.apiPath}/${id}`)
            .then(() => {
              this.fetchAll(this.$refs.table.serverParams, data => this.$refs.table.rows = data);
              this.$toast({
                component: ToastificationContent,
                position: 'top-right',
                props: {
                  title: `${this.$t('deletedSuccess')}`,
                  icon: 'CoffeeIcon',
                  variant: 'success',
                  text: `${this.$t('Frontend Account Management')} ${this.$t('deletedSuccess')}!`,
                },
              })
            })
            .catch(error => {
              this.$toast({
                component: ToastificationContent,
                position: 'top-right',
                props: {
                  title: `${this.$t('deletedFailed')}`,
                  icon: 'XIcon',
                  variant: 'danger',
                  text: error.response.data.message,
                },
              })
            })
        }
      })
    },
  },
}
</script>
