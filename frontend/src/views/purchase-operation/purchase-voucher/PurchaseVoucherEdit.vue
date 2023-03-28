<template>
  <div>
    <b-form @submit.prevent>
      <validation-observer ref="simpleRules">
        <!-- 基本資料 -->
        <b-card
          v-if="showData"
          :title="showData.id ? $t('PurchaseVoucherModal.editPurchaseVoucher') : $t('PurchaseVoucherModal.createPurchaseVoucher')"
        >
          <b-row>
            <!-- 進貨日期 -->
            <b-form-group
              label-for="purchaseDate"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('PurchaseVoucherList.purchaseDate') }}
                <span class="text-danger">*</span>
              </template>

              <validation-provider
                #default="{ errors }"
                name="purchaseDate"
                rules="required"
              >
                <flat-pickr
                  id="purchaseDate"
                  v-model="showData.purchase_date"
                  :placeholder="$t('PurchaseVoucherList.purchaseDate')"
                  :disabled="isDetail"
                  class="form-control"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 進貨單號 -->
            <b-form-group
              label-for="purchase_no"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('PurchaseVoucherList.purchaseNo') }}
                <span class="text-danger">保存後會自動帶入</span>
              </template>

              <b-form-input
                id="purchaseNo"
                type="text"
                :placeholder="$t('PurchaseVoucherList.purchaseNo')"
                disabled
                :value="showData.purchase_order_no"
              />
            </b-form-group>

            <!-- 轉入單號 -->
            <b-form-group
              label-for="transferNo"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('PurchaseVoucherList.transferNo') }}
              </template>

              <TransferSwitcher
                :show-data="showData"
                :open-transfer="['procurement-orders']"
                @clear-transfer="clearTransfer"
              />
            </b-form-group>

            <!-- 廠商 -->
            <b-form-group
              label-for="manufacturer"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('PurchaseVoucherList.manufacturer') }}
                <span class="text-danger">*</span>
              </template>

              <ManufacturerSwitcher
                :show-data="showData"
                type="manufacturer"
              />
            </b-form-group>

            <!-- 發票號碼 -->
            <b-form-group
              label-for="invoice"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('PurchaseVoucherList.invoice') }}
              </template>

              <validation-provider
                #default="{ errors }"
                name="invoice"
              >
                <b-form-input
                  id="invoice"
                  v-model="showData.invoice_no"
                  type="text"
                  :placeholder="$t('PurchaseVoucherList.invoice')"
                  :disabled="isDetail"
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
                {{ $t('PurchaseVoucherList.subpoena') }}
              </template>

              <validation-provider
                #default="{ errors }"
                name="subpoena"
              >
                <b-form-input
                  id="subpoena"
                  v-model="showData.voucher_no"
                  type="text"
                  :placeholder="$t('PurchaseVoucherList.subpoena')"
                  disabled
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 進貨人員 -->
            <b-form-group
              label-for="purchaseStaff"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('PurchaseVoucherList.purchaseStaff') }}
                <span class="text-danger">*</span>
              </template>

              <validation-provider
                #default="{ errors }"
                name="purchaseStaff"
              >
                <StaffSwitcher :show-data="showData" />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 進貨部門 -->
            <b-form-group
              label-for="purchaseDepartment"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('PurchaseVoucherList.purchaseDepartment') }}
                <span class="text-danger">*</span>
              </template>

              <validation-provider
                #default="{ errors }"
                name="purchaseDepartment"
              >
                <v-select
                  id="purchaseDepartment"
                  label="name"
                  v-model="showData.department_id"
                  :options="purchaseDepartmentOption"
                  :placeholder="$t('PurchaseVoucherModal.selectPurchaseDepartment')"
                  :reduce="option => option.id"
                  :disabled="isDetail"
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
                預交日期
              </template>

              <validation-provider
                #default="{ errors }"
                name="preDeliveryDate"
              >
                <flat-pickr
                  id="preDeliveryDate"
                  v-model="showData.delivery_date"
                  placeholder="預交日期"
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
                {{ $t('PurchaseVoucherList.project') }}
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
                  :placeholder="$t('PurchaseVoucherModal.selectProject')"
                  :reduce="option => option.id"
                  :disabled="isDetail"
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
                {{ $t('PurchaseVoucherList.accountSettingMethod') }}
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
                  :placeholder="$t('PurchaseVoucherList.selectAccountSettingMethod')"
                  :reduce="option => option.value"
                  :disabled="isDetail"
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
                {{ $t('PurchaseVoucherList.taxDeductionCategory') }}
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
                  :placeholder="$t('PurchaseVoucherList.selectTaxDeductionCategory')"
                  :reduce="option => option.value"
                  :disabled="isDetail"
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
                {{ $t('PurchaseVoucherList.currency') }}
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
                  :placeholder="$t('PurchaseVoucherModal.selectCurrency')"
                  :reduce="option => option.id"
                  :disabled="isDetail"
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
                {{ $t('PurchaseVoucherList.untaxedAmount') }}
              </template>

              <validation-provider
                #default="{ errors }"
                name="untaxedAmount"
              >
                <b-form-input
                  id="untaxedAmount"
                  type="text"
                  :placeholder="$t('PurchaseVoucherList.untaxedAmount')"
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
                {{ $t('PurchaseVoucherList.tax') }}
              </template>

              <validation-provider
                #default="{ errors }"
                name="tax"
              >
                <b-form-input
                  id="tax"
                  type="text"
                  :placeholder="$t('PurchaseVoucherList.tax')"
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
                {{ $t('PurchaseVoucherList.total') }}
              </template>

              <validation-provider
                #default="{ errors }"
                name="total"
              >
                <b-form-input
                  id="total"
                  type="text"
                  :placeholder="$t('PurchaseVoucherList.total')"
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
                  :disabled="isDetail"
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
              endpoint="purchase-orders/transfers"
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
            :to="{ name: 'PurchaseOperation-PurchaseVoucherList' }"
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
  BForm, BFormGroup, BFormInput, BFormTextarea, BFormSelect,
  BInputGroup, BInputGroupPrepend, BInputGroupAppend, BInputGroupText,
  BTableSimple, BThead, BTbody, BTfoot, BTh, BTr, BTd,
  BButton,
} from "bootstrap-vue"
import { ref, computed } from "@vue/composition-api"
import vSelect from 'vue-select'
import Multiselect from 'vue-multiselect'
import flatPickr from 'vue-flatpickr-component'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'
import axios from '@axios'
import TransferSwitcher from '@/layouts/components/order/utils/TransferSwitcher.vue'
import ManufacturerSwitcher from '@/layouts/components/order/utils/ManufacturerSwitcher.vue'
import StaffSwitcher from '@/layouts/components/order/utils/StaffSwitcher.vue'
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
    BFormSelect,

    BInputGroup,
    BInputGroupPrepend,
    BInputGroupAppend,
    BInputGroupText,

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
    Multiselect,

    TransferSwitcher,
    ManufacturerSwitcher,
    StaffSwitcher,
    ProductItemInfo,
    TransferOrderInfo,
  },
  setup(_, { root, refs }) {
    const API_PATH = 'purchase-orders'

    // Record 紀錄
    const blankRecord = {
      purchase_date: new Date(),
      items: [],
    }

    const isDetail = computed(() => root.$route.name === 'PurchaseOperation-PurchaseVoucherView')

    const showData = ref(null)

    // 讀取
    if (root.$route.name === 'PurchaseOperation-PurchaseVoucherCreate') {
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
                    text: `${root.$t('Purchase Voucher')} ${root.$t('updatedSuccess')}!`,
                  },
                })
                root.$router.push({ name: 'PurchaseOperation-PurchaseVoucherList' });
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
                    text: `${root.$t('Purchase Voucher')} ${root.$t('createdSuccess')}!`,
                  },
                })
                root.$router.push({ name: 'PurchaseOperation-PurchaseVoucherList' });
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
    axios.post(`/procurement-orders/options`)
      .then(response => {
        transferNoOption.value = response.data
      })

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
    const purchaseDepartmentOption = ref([])
    axios.post('/departments/options')
      .then(response => {
        purchaseDepartmentOption.value = response.data
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
      blankRecord,
      isDetail,
      showData,

      validationForm,

      addItem,
      removeItem,

      transferNoOption,
      currencyOption,
      projectOption,
      purchaseDepartmentOption,
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

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
<style lang="scss">
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
.form-control:disabled {
  background-color: #efefef;
}
</style>
