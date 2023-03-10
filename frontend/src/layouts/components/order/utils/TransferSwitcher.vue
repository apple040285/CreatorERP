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
        :value="showData.transfer ? showData.transfer.order_no : showData.transfer_order_no"
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
      <b-tabs
        v-model="guardIndex"
        justified
      >
        <template v-for="(guard, index) in guardArray">
          <b-tab
            v-if="openTransfer.includes(guard.endpoint)"
            :key="index"
            :title="guard.label"
          />
        </template>
      </b-tabs>

      <b-overlay
        :show="showLoading"
        variant="white"
        spinner-variant="primary"
        blur="0"
        opacity=".75"
        rounded="sm"
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
                <div>
                  <span>{{ transfer.order_no }}</span>
                  -
                  <span>{{ transfer.customer_manufacturer && transfer.customer_manufacturer.full_name }}</span>
                </div>
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
      </b-overlay>
    </b-modal>
  </div>
</template>

<script >
import {
  BModal, BTabs, BTab, BOverlay,
  BTableSimple, BThead, BTbody, BTfoot, BTh, BTr, BTd,
  BInputGroup, BInputGroupPrepend, BInputGroupAppend, BInputGroupText,
  BFormInput,
  BButton,
} from 'bootstrap-vue'
import { ref, computed, watch } from '@vue/composition-api'
import axios from '@axios'

export default {
  components: {
    BModal,
    BTabs,
    BTab,
    BOverlay,

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
    showData: {
      type: Object,
      default: () => { },
    },
    openTransfer: {
      type: Array,
      default: () => [],
    },
  },
  setup(props, { root, emit }) {
    const showLoading = ref(false)

    const refModal = ref(null)

    const guardIndex = ref(null)

    const guardArray = [
      { label: '採購憑單', endpoint: 'procurement-orders', model: 'App\\Models\\ProcurementOrder' },
      { label: '進貨憑單', endpoint: 'purchase-orders', model: 'App\\Models\\PurchaseOrder' },
      { label: '報價頻單', endpoint: 'quotation-orders', model: 'App\\Models\\QuotationOrder' },
      { label: '訂購頻單', endpoint: 'subscriber-orders', model: 'App\\Models\\SubscriberOrder' },
      { label: '銷貨憑單', endpoint: 'sales-orders', model: 'App\\Models\\SalesOrder' },
    ]

    const guard = computed(() => guardArray.find((a, index) => index === guardIndex.value))

    const transferNoOption = ref([])

    // watch
    watch(guardIndex, val => {
      showLoading.value = true

      if (!guard.value) return

      axios.post(`${guard.value.endpoint}/options`)
        .then(response => {
          transferNoOption.value = response.data

          showLoading.value = false
        })
    })

    const selectTransfer = id => {
      axios.get(`${guard.value.endpoint}/${id}`)
        .then(response => {
          const data = response.data

          // 轉單
          root.$set(props.showData, 'transfer_type', guard.value.model);
          root.$set(props.showData, 'transfer_order_no', data.order_no);

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
      if (type === 'App\\Models\\ProcurementOrder') return '採購憑單'
      if (type === 'App\\Models\\PurchaseOrder') return '進貨憑單'
      if (type === 'App\\Models\\QuotationOrder') return '報價頻單'
      if (type === 'App\\Models\\SubscriberOrder') return '訂購頻單'
      if (type === 'App\\Models\\SalesOrder') return '銷貨憑單'
      return '不明'
    }

    return {
      showLoading,

      guardArray,
      guardIndex,

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
