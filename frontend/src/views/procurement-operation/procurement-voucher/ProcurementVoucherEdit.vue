<template>
  <div>
    <b-form @submit.prevent>
      <validation-observer ref="simpleRules">
        <!-- 基本資料 -->
        <b-card
          v-if="showData"
          :title="showData.id ? $t('ProcurementVoucherModal.editProcurementVoucher') : $t('ProcurementVoucherModal.createProcurementVoucher')"
        >
          <b-row>
            <!-- 採購日期 -->
            <b-form-group
              label-for="procurementDate"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('ProcurementVoucherList.procurementDate') }}
                <span class="text-danger">*</span>
              </template>

              <validation-provider
                #default="{ errors }"
                name="procurementDate"
                rules="required"
              >
                <flat-pickr
                  id="procurementDate"
                  v-model="showData.procurement_date"
                  :placeholder="$t('ProcurementVoucherList.procurementDate')"
                  class="form-control"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 採購單號 -->
            <b-form-group
              label-for="procurement_no"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('ProcurementVoucherList.procurementNo') }}
                <span class="text-danger">保存後會自動帶入</span>
              </template>

              <b-form-input
                id="procurementNo"
                type="text"
                :placeholder="$t('ProcurementVoucherList.procurementNo')"
                disabled
                :value="showData.procurement_order_no"
              />
            </b-form-group>

            <!-- 轉入單號 -->
            <b-form-group
              label-for="transferNo"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('ProcurementVoucherList.transferNo') }}
              </template>

              <TransferSwitcher
                :show-data="showData"
                :open-transfer="[]"
                @clear-transfer="clearTransfer"
              />
            </b-form-group>

            <!-- 廠商 -->
            <b-form-group
              label-for="manufacturer"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('ProcurementVoucherList.manufacturer') }}
                <span class="text-danger">*</span>
              </template>

              <validation-provider
                #default="{ errors }"
                name="manufacturer"
                rules="required"
              >
                <v-select
                  id="manufacturer"
                  label="full_name"
                  v-model="showData.customer_manufacturer_id"
                  :options="manufacturerOption"
                  :placeholder="$t('ProcurementVoucherModal.selectManufacturer')"
                  :reduce="option => option.id"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 採購人員 -->
            <b-form-group
              label-for="procurementStaff"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('ProcurementVoucherList.procurementStaff') }}
                <span class="text-danger">*</span>
              </template>

              <validation-provider
                #default="{ errors }"
                name="procurementStaff"
              >
                <v-select
                  id="procurementStaff"
                  label="name"
                  v-model="showData.staff_id"
                  :options="staffOption"
                  :placeholder="$t('ProcurementVoucherModal.selectProcurementStaff')"
                  :reduce="option => option.id"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 採購部門 -->
            <b-form-group
              label-for="procurementDepartment"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('ProcurementVoucherList.procurementDepartment') }}
                <span class="text-danger">*</span>
              </template>

              <validation-provider
                #default="{ errors }"
                name="procurementDepartment"
              >
                <v-select
                  id="procurementDepartment"
                  label="name"
                  v-model="showData.department_id"
                  :options="procurementDepartmentOption"
                  :placeholder="$t('ProcurementVoucherModal.selectProcurementDepartment')"
                  :reduce="option => option.id"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 預交日期 -->
            <b-form-group
              label-for="preDeliveryDate"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('ProcurementVoucherList.preDeliveryDate') }}
              </template>

              <validation-provider
                #default="{ errors }"
                name="preDeliveryDate"
              >
                <flat-pickr
                  id="preDeliveryDate"
                  v-model="showData.delivery_date"
                  :placeholder="$t('ProcurementVoucherList.preDeliveryDate')"
                  class="form-control"
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
                {{ $t('ProcurementVoucherList.project') }}
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
                  :placeholder="$t('ProcurementVoucherModal.selectProject')"
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
                {{ $t('ProcurementVoucherList.accountSettingMethod') }}
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
                  :placeholder="$t('ProcurementVoucherList.selectAccountSettingMethod')"
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
                {{ $t('ProcurementVoucherList.taxDeductionCategory') }}
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
                  :placeholder="$t('ProcurementVoucherList.selectTaxDeductionCategory')"
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
                {{ $t('ProcurementVoucherList.currency') }}
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
                  :placeholder="$t('ProcurementVoucherModal.selectCurrency')"
                  :reduce="option => option.id"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 訂金 -->
            <b-form-group
              label-for="deposit"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('ProcurementVoucherList.deposit') }}
              </template>

              <validation-provider
                #default="{ errors }"
                name="deposit"
              >
                <b-form-input
                  id="deposit"
                  type="text"
                  v-model="showData.deposit_amount"
                  :placeholder="$t('ProcurementVoucherList.deposit')"
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
                {{ $t('ProcurementVoucherList.untaxedAmount') }}
              </template>

              <validation-provider
                #default="{ errors }"
                name="untaxedAmount"
              >
                <b-form-input
                  id="untaxedAmount"
                  type="text"
                  :placeholder="$t('ProcurementVoucherList.untaxedAmount')"
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
                {{ $t('ProcurementVoucherList.tax') }}
              </template>

              <validation-provider
                #default="{ errors }"
                name="tax"
              >
                <b-form-input
                  id="tax"
                  type="text"
                  :placeholder="$t('ProcurementVoucherList.tax')"
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
                {{ $t('ProcurementVoucherList.total') }}
              </template>

              <validation-provider
                #default="{ errors }"
                name="total"
              >
                <b-form-input
                  id="total"
                  type="text"
                  :placeholder="$t('ProcurementVoucherList.total')"
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
              endpoint="procurement-orders/transfers"
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
            :to="{ name: 'ProcurementOperation-ProcurementVoucherList' }"
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
} from 'bootstrap-vue'
import { ref } from '@vue/composition-api'
import vSelect from 'vue-select'
import flatPickr from 'vue-flatpickr-component'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'
import axios from '@axios'
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
    const API_PATH = 'procurement-orders'

    // Record 紀錄
    const blankRecord = {
      items: [],
    }

    const showData = ref(null)

    // 讀取
    if (root.$route.name === 'ProcurementOperation-ProcurementVoucherCreate') {
      showData.value = JSON.parse(JSON.stringify(blankRecord))
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
                    text: `${root.$t('Procurement Voucher')} ${root.$t('updatedSuccess')}!`,
                  },
                })
                root.$router.push({ name: 'ProcurementOperation-ProcurementVoucherList' });
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
                    text: `${root.$t('Procurement Voucher')} ${root.$t('createdSuccess')}!`,
                  },
                })
                root.$router.push({ name: 'ProcurementOperation-ProcurementVoucherList' });
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
    const procurementDepartmentOption = ref([])
    axios.post('/departments/options')
      .then(response => {
        procurementDepartmentOption.value = response.data
      })

    // 人員
    const staffOption = ref([])
    axios.post('/staffs/options')
      .then(response => {
        staffOption.value = response.data
      })

    // 客戶廠商
    const manufacturerOption = ref([])
    axios.post('/customer-manufacturers/options', { type: 'manufacturer' })
      .then(response => {
        manufacturerOption.value = response.data
      })

    // 倉庫
    const storehouseOption = ref([])
    axios.post('/storehouses/options')
      .then(response => {
        storehouseOption.value = response.data
      })

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

      currencyOption,
      projectOption,
      procurementDepartmentOption,
      staffOption,
      manufacturerOption,
      storehouseOption,

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

<style lang="scss">
@import "@core/scss/vue/libs/vue-select.scss";
@import "@core/scss/vue/libs/vue-flatpicker.scss";
</style>
