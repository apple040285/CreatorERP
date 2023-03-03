<template>
  <div>
    <b-input-group>
      <b-input-group-prepend
        v-if="showData.transfer_type"
        is-text
      >
        {{ resolveOrderTransferType(showData.transfer_type) }}
      </b-input-group-prepend>
      <b-form-input
        disabled
        :value="showData.transfer ? showData.transfer.subscriber_order_no : showData.transfer_order_no"
      />
      <b-input-group-append v-if="!showData.id">
        <b-input-group-text v-if="showData.transfer_order_no">
          <feather-icon
            icon="XIcon"
            class="cursor-pointer"
            @click="$emit('clear-transfer')"
          />
        </b-input-group-text>
        <template v-else>
          <b-button
            size="sm"
            text="Button"
            variant="success"
            @click="refModal.show()"
          >
            選擇
          </b-button>
        </template>
      </b-input-group-append>
    </b-input-group>

    <!-- 彈跳窗 -->
    <b-modal
      ref="refModal"
      @hidden="() => {}"
    >
      <b-table-simple
        responsive
        bordered
        style1="overflow-x: visible"
        style="height: 400px"
      >
        <b-thead>
          <b-tr>
            <b-th class="text-nowrap">#</b-th>
            <b-th class="text-nowrap">單號</b-th>
          </b-tr>
        </b-thead>

        <b-tbody>
          <!-- items -->
          <b-tr
            v-for="(transfer, index) in transferNoOption"
            :key="index"
          >
            <b-th>
              {{ index + 1 }}
            </b-th>
            <b-td class="d-flex justify-content-between align-items-center">
              {{ transfer.no }}
              <b-button
                variant="primary"
                size="sm"
                class="text-right"
                @click="selectTransfer(transfer.id)"
              >
                選擇
              </b-button>
            </b-td>
          </b-tr>
        </b-tbody>
      </b-table-simple>
    </b-modal>
  </div>
</template>

<script >
import {
  BModal,
  BTableSimple, BThead, BTbody, BTfoot, BTh, BTr, BTd,
  BInputGroup, BInputGroupPrepend, BInputGroupAppend, BInputGroupText,
  BFormInput,
  BButton,
} from 'bootstrap-vue'
import { ref } from '@vue/composition-api'
import axios from '@axios'

export default {
  components: {
    BModal,

    BTableSimple,
    BThead,
    BTbody,
    BTfoot,
    BTh,
    BTr,
    BTd,

    BInputGroup,
    BInputGroupPrepend,
    BInputGroupAppend,
    BInputGroupText,

    BFormInput,

    BButton,
  },
  props: {
    blankRecord: {
      type: Object,
      default: () => { },
    },
    showData: {
      type: Object,
      default: () => { },
    },
  },
  setup(props, { root, emit }) {
    const refModal = ref(null)

    const transferNoOption = ref([])
    axios.post(`/subscriber-orders/options`)
      .then(response => {
        transferNoOption.value = response.data
      })

    const selectTransfer = id => {
      axios.get(`/subscriber-orders/${id}`)
        .then(response => {
          const data = response.data

          // 轉單
          root.$set(props.showData, 'transfer_type', 'App\\Models\\SubscriberOrder');
          root.$set(props.showData, 'transfer_order_no', data.subscriber_order_no);
          // root.$set(props.showData, 'transfer', { subscriber_order_no: data.subscriber_order_no });

          // 訂單資訊
          root.$set(props.showData, 'customer_manufacturer_id', data.customer_manufacturer_id);
          root.$set(props.showData, 'currency_id', data.currency_id);
          root.$set(props.showData, 'department_id', data.department_id);
          root.$set(props.showData, 'project_id', data.project_id);
          root.$set(props.showData, 'staff_id', data.staff_id);
          root.$set(props.showData, 'billing_type', data.billing_type);
          root.$set(props.showData, 'tax_type', data.tax_type);

          // 商品資訊
          const items = data.items.map(m => ({
            amount: m.amount,
            delivery_date: m.delivery_date,
            price: m.price,
            quantity: m.quantity,
            storehouse_id: m.storehouse_id,
            product_id: m.product_id,
            product: { code: m.product.code, unit: m.product.unit, sku: m.product.sku },
          }))
          root.$set(props.showData, 'items', items);

          refModal.value.hide()
        })
    }

    // 解析轉單類型
    const resolveOrderTransferType = type => {
      if (type === 'App\\Models\\SubscriberOrder') return '訂購憑單'
      return '不明'
    }

    return {
      refModal,
      transferNoOption,
      selectTransfer,

      resolveOrderTransferType,
    }
  }
}
</script>

<style>
</style>