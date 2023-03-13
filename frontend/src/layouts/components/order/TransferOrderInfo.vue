<template>
  <!-- 產品資料 -->
  <b-card :title="$t('ProcurementVoucherModal.productInformation')">
    <b-table-simple
      responsive
      bordered
      style="overflow-x: visible"
    >
      <b-thead>
        <b-tr>
          <b-th class="text-nowrap"> # </b-th>
          <b-th class="text-nowrap"> 單據類別 </b-th>
          <b-th class="text-nowrap"> 單據編號 </b-th>
          <b-th class="text-nowrap"> 單據日期 </b-th>
          <b-th class="text-nowrap"> 單據金額 </b-th>
          <b-th class="text-nowrap"> 稅金 </b-th>
          <b-th class="text-nowrap"> 總額 </b-th>
        </b-tr>
      </b-thead>

      <b-tbody>
        <b-tr
          v-for="(item, index) in transfers"
          :key="index"
        >
          <b-th>{{ index + 1 }}</b-th>
          <b-td>{{ item.document_type }}</b-td>
          <b-td>{{ item.purchase_order_no }}</b-td>
          <b-td>{{ item.purchase_date }}</b-td>
          <b-td>{{ item.tax_excluding_amount }}</b-td>
          <b-td>{{ item.tax_amount }}</b-td>
          <b-td>{{ item.total_amount }}</b-td>
        </b-tr>
      </b-tbody>
    </b-table-simple>
  </b-card>
</template>

<script>
import {
  BCard, BButton,
  BTableSimple, BThead, BTbody, BTfoot, BTh, BTr, BTd,
} from 'bootstrap-vue'
import { ref } from '@vue/composition-api'
import axios from '@axios'

export default {
  components: {
    BCard,
    BButton,

    BTableSimple,
    BThead,
    BTbody,
    BTfoot,
    BTh,
    BTr,
    BTd,
  },
  props: {
    endpoint: {
      type: String,
      required: true,
    },
    orderId: {
      type: [String, Number],
      required: true,
    },
  },
  setup(props, { root }) {
    const transfers = ref([])
    axios.post(props.endpoint, { id: props.orderId })
      .then(response => {
        transfers.value = response.data
      })

    return {
      transfers,
    }
  }
}
</script>

<style>
</style>