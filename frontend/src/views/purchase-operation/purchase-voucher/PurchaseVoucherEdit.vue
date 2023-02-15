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

              <validation-provider
                #default="{ errors }"
                name="transferNo"
              >
                <v-select
                  label="transferNo"
                  v-model="showData.transfer_order_no"
                  :options="transferNoOption"
                  :placeholder="$t('PurchaseVoucherModal.selectTransferNo')"
                  :reduce="option => option.id"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
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
                  :placeholder="$t('PurchaseVoucherModal.selectManufacturer')"
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
                <v-select
                  id="purchaseStaff"
                  label="name"
                  v-model="showData.staff_id"
                  :options="staffOption"
                  :placeholder="$t('PurchaseVoucherModal.selectPurchaseStaff')"
                  :reduce="option => option.id"
                />
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
                  rows="5"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>
          </b-row>
        </b-card>

        <!-- 產品資料 -->
        <b-card
          v-if="showData"
          :title="$t('PurchaseVoucherModal.productInformation')"
        >
          <b-button
            variant="primary"
            type="button"
            size="sm"
            class="mb-1"
            @click.prevent="addItem(showData.items)"
          >
            <feather-icon icon="PlusIcon" />
          </b-button>

          <b-table-simple
            responsive
            bordered
            style="overflow-x: visible"
          >
            <b-thead>
              <b-tr>
                <b-th class="text-nowrap">#</b-th>
                <b-th class="text-nowrap"> {{ $t('PurchaseVoucherList.ProductList.productNo') }} </b-th>
                <b-th class="text-nowrap"> {{ $t('PurchaseVoucherList.ProductList.productName') }} </b-th>
                <b-th class="text-nowrap"> {{ $t('PurchaseVoucherList.ProductList.specification') }} </b-th>
                <b-th class="text-nowrap"> {{ $t('PurchaseVoucherList.ProductList.unit') }} </b-th>
                <b-th class="text-nowrap"> {{ $t('PurchaseVoucherList.ProductList.storehouse') }} </b-th>
                <b-th class="text-nowrap"> {{ $t('PurchaseVoucherList.ProductList.quantity') }} </b-th>
                <b-th class="text-nowrap"> {{ $t('PurchaseVoucherList.ProductList.unitPrice') }} </b-th>
                <b-th class="text-nowrap"> {{ $t('PurchaseVoucherList.ProductList.amount') }} </b-th>
                <b-th class="text-nowrap"> {{ $t('PurchaseVoucherList.ProductList.productPreDeliveryDate') }} </b-th>
                <b-th class="text-nowrap"> {{ $t('PurchaseVoucherList.ProductList.productRemark') }} </b-th>
                <b-th class="text-nowrap"> {{ $t('PurchaseVoucherList.ProductList.action') }} </b-th>
              </b-tr>
            </b-thead>

            <b-tbody>
              <!-- items -->
              <b-tr
                v-for="(item, index) in showData.items"
                :key="index"
              >
                <b-th>{{ index + 1 }}</b-th>
                <!-- 品號 -->
                <b-td>
                  <b-form-input
                    disabled
                    :value="item.product_code || (item.product && item.product.code)"
                  />
                </b-td>
                <!-- 產品 -->
                <b-td>
                  <v-select
                    :id="`product-` + index"
                    label="name"
                    :options="productOption"
                    :placeholder="$t('PurchaseVoucherModal.selectProductName')"
                    :filterable="false"
                    style="width: 200px;"
                    @search="onSearchProduct"
                    @input="val => selectProduct(val, item)"
                    :value="(item.product && item.product.name)"
                  >
                    <template slot="no-options">
                      輸入關鍵字搜索 產品資料...
                    </template>
                  </v-select>
                </b-td>
                <!-- 規格 -->
                <b-td>
                  <b-form-input
                    disabled
                    :value="item.product_sku || (item.product && item.product.sku)"
                  />
                </b-td>
                <!-- 單位 -->
                <b-td>
                  <b-form-input
                    disabled
                    :value="item.product_unit || (item.product && item.product.unit)"
                  />
                </b-td>
                <!-- 倉庫 -->
                <b-td>
                  <v-select
                    :id="`storehouse-` + index"
                    label="name"
                    v-model="item.storehouse_id"
                    :options="storehouseOption"
                    :placeholder="$t('PurchaseVoucherModal.selectStorehouse')"
                    :reduce="option => option.id"
                    class="text-nowrap"
                    style="width: 130px;"
                  />
                </b-td>
                <!-- 數量 -->
                <b-td>
                  <validation-provider
                    #default="{ errors }"
                    name="quantity"
                    rules="required"
                  >
                    <b-form-input
                      type="number"
                      v-model="item.quantity"
                      min="0"
                      :placeholder="$t('PurchaseVoucherList.ProductList.quantity')"
                    />
                    <small class="text-danger">{{ errors[0] }}</small>
                  </validation-provider>
                </b-td>
                <!-- 單價 -->
                <b-td>
                  <validation-provider
                    #default="{ errors }"
                    name="unitPrice"
                    rules="required"
                  >
                    <b-form-input
                      type="number"
                      v-model="item.price"
                      min="0"
                      :placeholder="$t('PurchaseVoucherList.ProductList.unitPrice')"
                    />
                    <small class="text-danger">{{ errors[0] }}</small>
                  </validation-provider>
                </b-td>
                <!-- 金額 -->
                <b-td>
                  <b-form-input
                    type="number"
                    min="0"
                    disabled
                    :value="parseFloat(item.quantity * item.price).toFixed(2)"
                  />
                </b-td>
                <!-- 預交日期 -->
                <b-td>
                  <flat-pickr
                    v-model="item.delivery_date"
                    class="form-control"
                  />
                </b-td>
                <!-- 備註 -->
                <b-td>
                  <b-form-input v-model="item.remark" />
                </b-td>
                <!-- 操作 -->
                <b-td>
                  <b-button
                    class="ml-50"
                    size="sm"
                    variant="gradient-danger"
                    @click="removeItem(showData.items, index)"
                  >
                    <feather-icon
                      icon="Trash2Icon"
                      size="12"
                    />
                  </b-button>
                </b-td>
              </b-tr>
            </b-tbody>
          </b-table-simple>
        </b-card>

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
  BForm, BFormGroup, BFormInput, BFormTextarea,
  BTableSimple, BThead, BTbody, BTfoot, BTh, BTr, BTd,
  BButton,
} from "bootstrap-vue"
import { ref } from "@vue/composition-api"
import vSelect from 'vue-select'
import flatPickr from 'vue-flatpickr-component'
import { VueGoodTable } from 'vue-good-table'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'
import axios from "@axios"

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
    VueGoodTable,
  },
  setup(_, { root, refs }) {
    const API_PATH = 'purchase-orders'

    const showData = ref(null)

    // 讀取
    if (root.$route.name === 'PurchaseOperation-PurchaseVoucherCreate') {
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

    // 人員
    const staffOption = ref([])
    axios.post('/staffs/options')
      .then(response => {
        staffOption.value = response.data
      })

    // 客戶廠商
    const manufacturerOption = ref([])
    axios.post('/customer-manufacturers/options')
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

    return {
      showData,

      validationForm,

      addItem,
      removeItem,

      transferNoOption,
      currencyOption,
      projectOption,
      purchaseDepartmentOption,
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
