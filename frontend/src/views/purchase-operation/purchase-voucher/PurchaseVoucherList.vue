<template>
  <div>
    <PaginationTable
      ref="table"
      :title="$t('Purchase Voucher')"
      :show-loading="showLoading"
      :fetch-all="fetchAll"
      :tableColumns="tableColumns"
      :itemsCount="itemsCount"
      @add-sidebar="() => $router.push({ name: 'PurchaseOperation-PurchaseVoucherCreate' })"
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
            :to="{ name: 'PurchaseOperation-PurchaseVoucherEdit', params: { id: data.row.id } }"
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
    const API_PATH = 'purchase-orders'

    // loading 動畫
    const showLoading = ref(false)

    // Column
    const tableColumns = [
      { label: '#', field: 'id' },
      { label: 'PurchaseVoucherList.purchaseDate', field: 'purchase_date' },
      { label: 'PurchaseVoucherList.purchaseNo', field: 'purchase_order_no' },
      { label: 'PurchaseVoucherList.manufacturer', field: 'customer_manufacturer.full_name' },
      { label: 'PurchaseVoucherList.project', field: 'project.name' },
      { label: 'PurchaseVoucherList.invoice', field: 'invoice_no' },
      { label: 'PurchaseVoucherList.purchaseStaff', field: 'staff.name' },
      { label: 'PurchaseVoucherList.status', field: 'status' },
      { label: 'PurchaseVoucherList.approvalStatus', field: 'approvalStatus' },
      { label: 'PurchaseVoucherList.action', field: 'action', class: 'text-right' },
    ]

    // 總共筆數
    const itemsCount = ref(0)
    const fetchAll = (ctx, callback) => {
      showLoading.value = true

      axios
        .post(`${API_PATH}/list`, ctx)
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
      refs.table.removeClosure(() => {
        return axios
          .delete(`${API_PATH}/${id}`)
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
          })
          .catch(error => {
            root.$toast({
              component: ToastificationContent,
              position: 'top-right',
              props: {
                title: `${root.$t('deletedFailed')}`,
                icon: 'XIcon',
                variant: 'danger',
                text: error.response.data.message,
              },
            })
          })
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
