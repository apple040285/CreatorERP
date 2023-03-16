<template>
  <div>
    <b-form @submit.prevent>
      <validation-observer ref="simpleRules">
        <!-- 基本資料 -->
        <b-card
          v-if="showData"
          :title="showData.id ? $t('SalesVoucherModal.editSalesVoucher') : $t('SalesVoucherModal.createSalesVoucher')"
        >
          <b-row>
            <!-- 銷貨日期 -->
            <b-form-group
              label-for="salesDate"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('SalesVoucherList.salesDate') }}
                <span class="text-danger">*</span>
              </template>

              <validation-provider
                #default="{ errors }"
                name="salesDate"
                rules="required"
              >
                <flat-pickr
                  id="salesDate"
                  v-model="showData.sales_date"
                  :placeholder="$t('SalesVoucherList.salesDate')"
                  class="form-control"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 銷貨單號 -->
            <b-form-group
              label-for="sales_no"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('SalesVoucherList.salesNo') }}
                <span class="text-danger">保存後會自動帶入</span>
              </template>

              <b-form-input
                id="salesNo"
                type="text"
                :placeholder="$t('SalesVoucherList.salesNo')"
                disabled
                :value="showData.sales_order_no"
              />
            </b-form-group>

            <!-- 轉入單號 -->
            <b-form-group
              label-for="transferNo"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('SalesVoucherList.transferNo') }}
              </template>

              <TransferSwitcher
                :show-data="showData"
                :open-transfer="['procurement-orders', 'purchase-orders', 'quotation-orders', 'subscriber-orders']"
                @clear-transfer="clearTransfer"
              />
            </b-form-group>

            <!-- 廠商 -->
            <b-form-group
              label-for="manufacturer"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('SalesVoucherList.customer') }}
                <span class="text-danger">*</span>
              </template>

              <validation-provider
                #default="{ errors }"
                name="customer"
                rules="required"
              >
                <v-select
                  id="customer"
                  label="full_name"
                  v-model="showData.customer_manufacturer_id"
                  :options="manufacturerOption"
                  :placeholder="$t('SalesVoucherModal.selectCustomer')"
                  :reduce="option => option.id"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 發票號碼 -->
            <b-form-group
              label-for="invoice"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('SalesVoucherList.invoice') }}
              </template>

              <validation-provider
                #default="{ errors }"
                name="invoice"
              >
                <b-form-input
                  id="invoice"
                  v-model="showData.invoice_no"
                  type="text"
                  :placeholder="$t('SalesVoucherList.invoice')"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 傳票號碼 (新增過後不可編輯) -->
            <b-form-group
              label-for="subpoena"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('SalesVoucherList.subpoena') }}
              </template>

              <validation-provider
                #default="{ errors }"
                name="subpoena"
              >
                <b-form-input
                  id="subpoena"
                  v-model="showData.voucher_no"
                  type="text"
                  :placeholder="$t('SalesVoucherList.subpoena')"
                  disabled
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 銷貨人員 -->
            <b-form-group
              label-for="businessPeople"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('SalesVoucherList.businessPeople') }}
                <span class="text-danger">*</span>
              </template>

              <validation-provider
                #default="{ errors }"
                name="businessPeople"
              >
                <v-select
                  id="businessPeople"
                  label="name"
                  v-model="showData.staff_id"
                  :options="staffOption"
                  :placeholder="$t('SalesVoucherModal.selectBusinessPeople')"
                  :reduce="option => option.id"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 銷貨部門 -->
            <b-form-group
              label-for="salesDepartment"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('SalesVoucherList.salesDepartment') }}
                <span class="text-danger">*</span>
              </template>

              <validation-provider
                #default="{ errors }"
                name="salesDepartment"
              >
                <v-select
                  id="salesDepartment"
                  label="name"
                  v-model="showData.department_id"
                  :options="salesDepartmentOption"
                  :placeholder="$t('SalesVoucherModal.selectDepartment')"
                  :reduce="option => option.id"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 專案名稱 -->
            <b-form-group
              label-for="project"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('SalesVoucherList.project') }}
              </template>

              <validation-provider
                #default="{ errors }"
                name="project"
              >
                <v-select
                  id="project"
                  label="name"
                  v-model="showData.project_id"
                  :options="projectOption"
                  :placeholder="$t('SalesVoucherModal.selectProject')"
                  :reduce="option => option.id"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 立帳方式 -->
            <b-form-group
              label-for="accountSettingMethod"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('SalesVoucherList.accountSettingMethod') }}
                <span class="text-danger">*</span>
              </template>

              <validation-provider
                #default="{ errors }"
                name="accountSettingMethod"
              >
                <v-select
                  id="accountSettingMethod"
                  label="label"
                  v-model="showData.billing_type"
                  :options="[
                    { label: '單張立帳', value: 'singleBill' },
                    { label: '不立帳', value: 'noBill' },
                    { label: '收到發票才立帳', value: 'billingAfterReceiptOfInvoice' },
                  ]"
                  :placeholder="$t('SalesVoucherList.selectAccountSettingMethod')"
                  :reduce="option => option.value"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 扣稅類別 -->
            <b-form-group
              label-for="taxDeductionCategory"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('SalesVoucherList.taxDeductionCategory') }}
                <span class="text-danger">*</span>
              </template>

              <validation-provider
                #default="{ errors }"
                name="taxDeductionCategory"
              >
                <v-select
                  id="taxDeductionCategory"
                  label="label"
                  v-model="showData.tax_type"
                  :options="[
                    { label: '不計稅', value: 'taxFree' },
                    { label: '應稅內含', value: 'taxableIncluded' },
                    { label: '應稅外加', value: 'taxablePlus' },
                  ]"
                  :placeholder="$t('SalesVoucherList.selectTaxDeductionCategory')"
                  :reduce="option => option.value"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 幣別 -->
            <b-form-group
              label-for="currency"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('SalesVoucherList.currency') }}
                <span class="text-danger">*</span>
              </template>

              <validation-provider
                #default="{ errors }"
                name="currency"
                rules="required"
              >
                <v-select
                  id="currency"
                  label="name"
                  v-model="showData.currency_id"
                  :options="currencyOption"
                  :placeholder="$t('SalesVoucherModal.selectCurrency')"
                  :reduce="option => option.id"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 未稅金額 -->
            <b-form-group
              label-for="untaxedAmount"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('SalesVoucherList.untaxedAmount') }}
              </template>

              <validation-provider
                #default="{ errors }"
                name="untaxedAmount"
              >
                <b-form-input
                  id="untaxedAmount"
                  type="text"
                  :placeholder="$t('SalesVoucherList.untaxedAmount')"
                  disabled
                  :value="getUntaxedAmount()"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 稅額 -->
            <b-form-group
              label-for="tax"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('SalesVoucherList.tax') }}
              </template>

              <validation-provider
                #default="{ errors }"
                name="tax"
              >
                <b-form-input
                  id="tax"
                  type="text"
                  :placeholder="$t('SalesVoucherList.tax')"
                  disabled
                  :value="getTaxAmount()"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 合計 -->
            <b-form-group
              label-for="total"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('SalesVoucherList.total') }}
              </template>

              <validation-provider
                #default="{ errors }"
                name="total"
              >
                <b-form-input
                  id="total"
                  type="text"
                  :placeholder="$t('SalesVoucherList.total')"
                  disabled
                  :value="getTotalAmount()"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 備註 -->
            <b-form-group
              label-for="remark"
              class="col-12"
            >
              <template #label>
                {{ $t('remark') }}
              </template>

              <validation-provider
                #default="{ errors }"
                name="remark"
              >
                <b-form-textarea
                  id="remark"
                  v-model="showData.remark"
                  type="text"
                  :placeholder="$t('remark')"
                  rows="5"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>
          </b-row>
        </b-card>

        <b-tabs>
          <b-tab
            title="產品資訊"
            active
          >
            <ProductItemInfo
              v-if="showData"
              :show-data="showData"
            />
          </b-tab>

          <b-tab
            v-if="$route.params.id"
            title="轉單資訊"
          >
            <TransferOrderInfo
              endpoint="sales-orders/transfers"
              :order-id="$route.params.id"
            />
          </b-tab>
        </b-tabs>

        <!-- 操作按鈕 -->
        <div class="d-sm-flex align-items-center justify-content-center">
          <b-button
            variant="outline-danger"
            type="button"
            :block="$store.getters['app/currentBreakPoint'] === 'xs'"
            class="mb-1 mb-sm-0 mr-0 mr-sm-1"
            :to="{ name: 'SalesOperation-SalesVoucherList' }"
          >
            <feather-icon
              icon="ArrowLeftIcon"
              class="mr-50"
            />
            {{ $t('back') }}
          </b-button>

          <b-button
            variant="primary"
            type="submit"
            :block="$store.getters['app/currentBreakPoint'] === 'xs'"
            @click.prevent="validationForm"
          >
            <feather-icon
              icon="SaveIcon"
              class="mr-50"
            />
            {{ $t('Submit') }}
          </b-button>
        </div>
      </validation-observer>
    </b-form>

  </div>
</template>

<script>
import { ValidationProvider, ValidationObserver } from 'vee-validate'
import { required } from '@validations'
import {
  BCard, BTabs, BTab, BRow, BCol,
  BForm, BFormGroup, BFormInput, BFormTextarea,
  BTableSimple, BThead, BTbody, BTfoot, BTh, BTr, BTd,
  BButton,
} from "bootstrap-vue"
import { ref } from "@vue/composition-api"
import vSelect from 'vue-select'
import flatPickr from 'vue-flatpickr-component'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'
import axios from "@axios"
import TransferSwitcher from '@/layouts/components/order/utils/TransferSwitcher.vue'
import ProductItemInfo from '@/layouts/components/order/ProductItemInfo.vue'
import TransferOrderInfo from '@/layouts/components/order/TransferOrderInfo.vue'

export default {
  components: {
    ValidationProvider,
    ValidationObserver,

    BCard,
    BTabs,
    BTab,
    BRow,
    BCol,

    BForm,
    BFormGroup,
    BFormInput,
    BFormTextarea,

    BTableSimple,
    BThead,
    BTbody,
    BTfoot,
    BTh,
    BTr,
    BTd,

    BButton,

    vSelect,
    flatPickr,

    TransferSwitcher,
    ProductItemInfo,
    TransferOrderInfo,
  },
  setup(_, { root, refs }) {
    const API_PATH = 'sales-orders'

    // Record 紀錄
    const blankRecord = {
      items: [],
    }

    const showData = ref(null)

    // 讀取
    if (root.$route.name === 'SalesOperation-SalesVoucherCreate') {
      showData.value = {
        items: [],
      }
    } else {
      axios.get(`/${API_PATH}/${root.$route.params.id}`)
        .then(response => {
          const data = response.data
          showData.value = JSON.parse(JSON.stringify(data))
        })
    }

    // 驗證表單
    const validationForm = () => {
      refs.simpleRules.validate()
        .then(success => {
          if (!success) return

          if (showData.value.id) {
            axios
              .put(`/${API_PATH}/${showData.value.id}`, showData.value)
              .then(() => {
                root.$toast({
                  component: ToastificationContent,
                  position: 'top-right',
                  props: {
                    title: `${root.$t('updatedSuccess')}`,
                    icon: 'CoffeeIcon',
                    variant: 'success',
                    text: `${root.$t('Sales Voucher')} ${root.$t('updatedSuccess')}!`,
                  },
                })
                root.$router.push({ name: 'SalesOperation-SalesVoucherList' });
              })
              .catch(error => {
                root.$toast({
                  component: ToastificationContent,
                  position: 'top-right',
                  props: {
                    title: `${root.$t('updatedFailed')}`,
                    icon: 'XIcon',
                    variant: 'danger',
                    text: error.response.data.message,
                  },
                })
              })
          } else {
            axios
              .post(`${API_PATH}`, showData.value)
              .then(() => {
                root.$toast({
                  component: ToastificationContent,
                  position: 'top-right',
                  props: {
                    title: `${root.$t('createdSuccess')}`,
                    icon: 'CoffeeIcon',
                    variant: 'success',
                    text: `${root.$t('Sales Voucher')} ${root.$t('createdSuccess')}!`,
                  },
                })
                root.$router.push({ name: 'SalesOperation-SalesVoucherList' });
              })
              .catch(error => {
                root.$toast({
                  component: ToastificationContent,
                  position: 'top-right',
                  props: {
                    title: `${root.$t('createdFailed')}`,
                    icon: 'XIcon',
                    variant: 'danger',
                    text: error.response.data.message,
                  },
                })
              })
          }
        })
    }

    // 新增產品
    const addItem = items => {
      items.push({})
    }

    // 刪除產品
    const removeItem = (items, index) => {
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
          items.splice(index, 1)
        }
      })
    }

    // 轉入單號
    const transferNoOption = ref([])

    // 幣別
    const currencyOption = ref([])
    axios.post('/currencies/options')
      .then(response => {
        currencyOption.value = response.data
      })

    // 專案
    const projectOption = ref([])
    axios.post('/projects/options')
      .then(response => {
        projectOption.value = response.data
      })

    // 部門
    const salesDepartmentOption = ref([])
    axios.post('/departments/options')
      .then(response => {
        salesDepartmentOption.value = response.data
      })

    // 人員
    const staffOption = ref([])
    axios.post('/staffs/options')
      .then(response => {
        staffOption.value = response.data
      })

    // 客戶廠商
    const manufacturerOption = ref([])
    axios.post('/customer-manufacturers/options', { type: 'customer' })
      .then(response => {
        manufacturerOption.value = response.data
      })

    // 倉庫
    const storehouseOption = ref([])
    axios.post('/storehouses/options')
      .then(response => {
        storehouseOption.value = response.data
      })

    // 產品
    const productOption = ref([])
    const onSearchProduct = (search, loading) => {
      if (search.length) {
        loading(true);

        axios.post('/products/options', { searchTerm: escape(search) })
          .then(response => {
            productOption.value = response.data
            loading(false)
          })
      }
    }

    // 選擇產品
    const selectProduct = (select, item) => {
      if (select) {
        root.$set(item, 'product_id', select.id);
        root.$set(item, 'product_code', select.code);
        root.$set(item, 'product_sku', select.sku);
        root.$set(item, 'product_unit', select.unit);
        root.$set(item, 'quantity', 1);
        root.$set(item, 'price', select.price);
      }
    }

    // 未稅金額
    const getUntaxedAmount = () => {
      if (!showData.value) return 0

      const items = showData.value.items

      if (items.length === 0) return 0

      const total = items.reduce((s, original) => s + (parseFloat(original.quantity || 0) * parseFloat(original.price || 0)), 0)

      switch (showData.value.tax_type) {
        // 不計稅
        case 'taxFree':
          return Math.round(total);
        // 內含稅
        case 'taxableIncluded':
          return Math.round(total / 1.05);
        // 稅金外加
        case 'taxablePlus':
          return Math.round(total);
        default:
          return 0
      }
    }

    // 稅金
    const getTaxAmount = () => {
      if (!showData.value) return 0

      const items = showData.value.items

      if (items.length === 0) return 0

      const total = items.reduce((s, original) => s + (parseFloat(original.quantity || 0) * parseFloat(original.price || 0)), 0)

      switch (showData.value.tax_type) {
        // 不計稅
        case 'taxFree':
          return 0;
        // 內含稅
        case 'taxableIncluded':
          return Math.round(total - getUntaxedAmount());
        // 稅金外加
        case 'taxablePlus':
          return Math.round(total * 0.05);
        default:
          return 0
      }
    }

    // 合計
    const getTotalAmount = () => {
      if (!showData.value) return 0

      const items = showData.value.items

      if (items.length === 0) return 0

      const total = items.reduce((s, original) => s + (parseFloat(original.quantity || 0) * parseFloat(original.price || 0)), 0)

      switch (showData.value.tax_type) {
        // 不計稅
        case 'taxFree':
          return Math.round(total);
        // 內含稅
        case 'taxableIncluded':
          return Math.round(total);
        // 稅金外加
        case 'taxablePlus':
          return Math.round(total * 1.05);
        default:
          return 0
      }
    }

    // 清除轉單
    const clearTransfer = () => {
      showData.value = JSON.parse(JSON.stringify(blankRecord))
    }

    return {
      showData,

      validationForm,

      addItem,
      removeItem,

      transferNoOption,
      currencyOption,
      projectOption,
      salesDepartmentOption,
      staffOption,
      manufacturerOption,
      storehouseOption,
      productOption,

      onSearchProduct,
      selectProduct,

      // 計算
      getUntaxedAmount,
      getTaxAmount,
      getTotalAmount,

      // 驗證
      required,

      clearTransfer,
    }
  },
}
</script>

<style lang="scss" >
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

@import "@core/scss/vue/libs/vue-select.scss";
@import "@core/scss/vue/libs/vue-flatpicker.scss";
</style>
