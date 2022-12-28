<template>
  <div>
    <b-form @submit.prevent>
      <validation-observer ref="simpleRules">
        <!-- 基本資料 -->
        <b-card
          v-if="showData"
          :title="$route.name === 'PurchaseOperation-PurchaseVoucherCreate' ? $t('PurchaseVoucherModal.createPurchaseVoucher') : $t('PurchaseVoucherModal.editPurchaseVoucher')"
        >
          <b-row>
            <!-- 進貨日期 -->
            <b-form-group
              :label="$t('PurchaseVoucherList.purchaseDate')"
              label-for="purchaseDate"
              class="col-12 col-sm-4"
            >
              <validation-provider
                #default="{ errors }"
                name="purchaseDate"
                rules="required"
              >
                <flat-pickr
                  id="purchaseDate"
                  v-model="showData.purchaseDate"
                  class="form-control"
                  :placeholder="$t('PurchaseVoucherList.purchaseDate')"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 廠商 -->
            <b-form-group
              :label="$t('PurchaseVoucherList.manufacturer')"
              label-for="manufacturer"
              class="col-12 col-sm-4"
            >
              <validation-provider
                #default="{ errors }"
                name="manufacturer"
                rules="required"
              >
                <v-select
                  id="manufacturer"
                  label="full_name"
                  v-model="showData.manufacturer_id"
                  :options="manufacturerOption"
                  :placeholder="$t('PurchaseVoucherModal.selectManufacturer')"
                  :reduce="option => option.id"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 幣別 -->
            <b-form-group
              :label="$t('PurchaseVoucherList.currency')"
              label-for="currency"
              class="col-12 col-sm-4"
            >
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

            <!-- 轉入單號 -->
            <b-form-group
              :label="$t('PurchaseVoucherList.transferNo')"
              label-for="transferNo"
              class="col-12 col-sm-4"
            >
              <validation-provider
                #default="{ errors }"
                name="transferNo"
              >
                <v-select
                  label="transferNo"
                  v-model="showData.transferNo_id"
                  :options="transferNoOption"
                  :placeholder="$t('PurchaseVoucherModal.selectTransferNo')"
                  :reduce="option => option.id"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 專案名稱 -->
            <b-form-group
              :label="$t('PurchaseVoucherList.project')"
              label-for="project"
              class="col-12 col-sm-4"
            >
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

            <!-- 進貨人員 -->
            <b-form-group
              :label="$t('PurchaseVoucherList.purchaseStaff')"
              label-for="purchaseStaff"
              class="col-12 col-sm-4"
            >
              <validation-provider
                #default="{ errors }"
                name="purchaseStaff"
              >
                <v-select
                  id="purchaseStaff"
                  label="name"
                  v-model="showData.purchaseStaff_id"
                  :options="staffOption"
                  :placeholder="$t('PurchaseVoucherModal.selectPurchaseStaff')"
                  :reduce="option => option.id"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 進貨部門 -->
            <b-form-group
              :label="$t('PurchaseVoucherList.purchaseDepartment')"
              label-for="purchaseDepartment"
              class="col-12 col-sm-4"
            >
              <validation-provider
                #default="{ errors }"
                name="purchaseDepartment"
              >
                <v-select
                  id="purchaseDepartment"
                  label="name"
                  v-model="showData.purchaseStaff_id"
                  :options="purchaseDepartmentOption"
                  :placeholder="$t('PurchaseVoucherModal.selectPurchaseDepartment')"
                  :reduce="option => option.id"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 發票號碼 -->
            <b-form-group
              :label="$t('PurchaseVoucherList.invoice')"
              label-for="invoice"
              class="col-12 col-sm-4"
            >
              <validation-provider
                #default="{ errors }"
                name="invoice"
              >
                <b-form-input
                  id="invoice"
                  v-model="showData.invoice"
                  type="text"
                  :placeholder="$t('PurchaseVoucherList.invoice')"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 預交日期 -->
            <b-form-group
              :label="$t('PurchaseVoucherList.preDeliveryDate')"
              label-for="preDeliveryDate"
              class="col-12 col-sm-4"
            >
              <validation-provider
                #default="{ errors }"
                name="preDeliveryDate"
              >
                <flat-pickr
                  id="preDeliveryDate"
                  v-model="showData.preDeliveryDate"
                  class="form-control"
                  :placeholder="$t('PurchaseVoucherList.preDeliveryDate')"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 扣稅類別 -->
            <b-form-group
              :label="$t('PurchaseVoucherList.taxDeductionCategory')"
              label-for="taxDeductionCategory"
              class="col-12 col-sm-4"
            >
              <validation-provider
                #default="{ errors }"
                name="taxDeductionCategory"
              >
                <v-select
                  id="taxDeductionCategory"
                  label="label"
                  v-model="showData.taxDeductionCategory"
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

            <!-- 立帳方式 -->
            <b-form-group
              :label="$t('PurchaseVoucherList.accountSettingMethod')"
              label-for="accountSettingMethod"
              class="col-12 col-sm-4"
            >
              <validation-provider
                #default="{ errors }"
                name="accountSettingMethod"
              >
                <v-select
                  id="accountSettingMethod"
                  label="label"
                  v-model="showData.accountSettingMethod"
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

            <!-- 其他支出 -->
            <b-form-group
              :label="$t('PurchaseVoucherList.otherExpenses')"
              label-for="otherExpenses"
              class="col-12 col-sm-4"
            >
              <validation-provider
                #default="{ errors }"
                name="otherExpenses"
              >
                <v-select
                  id="otherExpenses"
                  label="name"
                  v-model="showData.otherExpenses_id"
                  :options="[
                  ]"
                  :placeholder="$t('PurchaseVoucherModal.selectOtherExpenses')"
                  :reduce="option => option.value"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 傳票號碼 -->
            <b-form-group
              :label="$t('PurchaseVoucherList.subpoena')"
              label-for="subpoena"
              class="col-12 col-sm-4"
            >
              <validation-provider
                #default="{ errors }"
                name="subpoena"
              >
                <b-form-input
                  id="subpoena"
                  v-model="showData.subpoena"
                  type="text"
                  :placeholder="$t('PurchaseVoucherList.subpoena')"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 折扣 -->
            <b-form-group
              :label="$t('PurchaseVoucherList.discount')"
              label-for="discount"
              class="col-12 col-sm-4"
            >
              <validation-provider
                #default="{ errors }"
                name="discount"
              >
                <b-form-input
                  id="discount"
                  v-model="showData.discount"
                  type="text"
                  :placeholder="$t('PurchaseVoucherList.discount')"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 未稅金額 -->
            <b-form-group
              :label="$t('PurchaseVoucherList.untaxedAmount')"
              label-for="untaxedAmount"
              class="col-12 col-sm-4"
            >
              <validation-provider
                #default="{ errors }"
                name="untaxedAmount"
              >
                <b-form-input
                  id="untaxedAmount"
                  v-model="showData.untaxedAmount"
                  type="text"
                  :placeholder="$t('PurchaseVoucherList.untaxedAmount')"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 稅額 -->
            <b-form-group
              :label="$t('PurchaseVoucherList.tax')"
              label-for="tax"
              class="col-12 col-sm-4"
            >
              <validation-provider
                #default="{ errors }"
                name="tax"
              >
                <b-form-input
                  id="tax"
                  v-model="showData.tax"
                  type="text"
                  :placeholder="$t('PurchaseVoucherList.tax')"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 合計 -->
            <b-form-group
              :label="$t('PurchaseVoucherList.total')"
              label-for="total"
              class="col-12 col-sm-4"
            >
              <validation-provider
                #default="{ errors }"
                name="total"
              >
                <b-form-input
                  id="total"
                  v-model="showData.total"
                  type="text"
                  :placeholder="$t('PurchaseVoucherList.total')"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 本幣合計 -->
            <b-form-group
              :label="$t('PurchaseVoucherList.totalLocalCurrency')"
              label-for="totalLocalCurrency"
              class="col-12 col-sm-4"
            >
              <validation-provider
                #default="{ errors }"
                name="totalLocalCurrency"
              >
                <b-form-input
                  id="totalLocalCurrency"
                  v-model="showData.totalLocalCurrency"
                  type="text"
                  :placeholder="$t('PurchaseVoucherList.totalLocalCurrency')"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 備註 -->
            <b-form-group
              :label="$t('remark')"
              label-for="remark"
              class="col-12"
            >
              <validation-provider
                #default="{ errors }"
                name="remark"
              >
                <b-form-textarea
                  id="remark"
                  v-model="showData.totalLocalCurrency"
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
                <b-th class="text-nowrap"> {{$t('PurchaseVoucherList.ProductList.productNo') }} </b-th>
                <b-th class="text-nowrap"> {{$t('PurchaseVoucherList.ProductList.productName') }} </b-th>
                <b-th class="text-nowrap"> {{$t('PurchaseVoucherList.ProductList.specification') }} </b-th>
                <b-th class="text-nowrap"> {{$t('PurchaseVoucherList.ProductList.unit') }} </b-th>
                <b-th class="text-nowrap"> {{$t('PurchaseVoucherList.ProductList.storehouse') }} </b-th>
                <b-th class="text-nowrap"> {{$t('PurchaseVoucherList.ProductList.quantity') }} </b-th>
                <b-th class="text-nowrap"> {{$t('PurchaseVoucherList.ProductList.unitPrice') }} </b-th>
                <b-th class="text-nowrap"> {{$t('PurchaseVoucherList.ProductList.amount') }} </b-th>
                <b-th class="text-nowrap"> {{$t('PurchaseVoucherList.ProductList.numberOfTransfers') }} </b-th>
                <b-th class="text-nowrap"> {{$t('PurchaseVoucherList.ProductList.untransferredQuantity') }} </b-th>
                <b-th class="text-nowrap"> {{$t('PurchaseVoucherList.ProductList.productPreDeliveryDate') }} </b-th>
                <b-th class="text-nowrap"> {{$t('PurchaseVoucherList.ProductList.productRemark') }} </b-th>
                <b-th class="text-nowrap"> {{$t('PurchaseVoucherList.ProductList.action') }} </b-th>
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
                    v-model="item.code"
                    disabled
                  />
                </b-td>
                <!-- 產品 -->
                <b-td>
                  <validation-provider
                    #default="{ errors }"
                    name="productName"
                    rules="required"
                  >
                    <v-select
                      :id="`product-` + index"
                      label="name"
                      :options="productOption"
                      :placeholder="$t('PurchaseVoucherModal.selectProductName')"
                      :filterable="false"
                      style="width: 300px;"
                      @search="onSearchProduct"
                      @input="val => selectProduct(val, item)"
                    >
                      <template slot="no-options">
                        輸入關鍵字搜索 產品資料...
                      </template>
                    </v-select>
                    <small class="text-danger">{{ errors[0] }}</small>
                  </validation-provider>
                </b-td>
                <!-- 規格 -->
                <b-td>
                  <b-form-input
                    v-model="item.sku"
                    disabled
                  />
                </b-td>
                <!-- 單位 -->
                <b-td>
                  <b-form-input
                    v-model="item.unit"
                    disabled
                  />
                </b-td>
                <!-- 倉庫 -->
                <b-td>
                  <v-select
                    :id="`storehouse-` + index"
                    label="name"
                    v-model="item.storehouse"
                    :options="storehouseOption"
                    :placeholder="$t('PurchaseVoucherModal.selectStorehouse')"
                    :reduce="option => option.id"
                    class="text-nowrap"
                    style="width: 120px;"
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
                      v-model="item.unitPrice"
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
                    v-model="item.amount"
                    min="0"
                  />
                </b-td>
                <!-- 已轉數量 -->
                <b-td>
                  <b-form-input v-model="item.numberOfTransfers" />
                </b-td>
                <!-- 未轉數量 -->
                <b-td>
                  <b-form-input v-model="item.untransferredQuantity" />
                </b-td>
                <!-- 預交日期 -->
                <b-td>
                  <b-form-input v-model="item.preDeliveryDate" />
                </b-td>
                <!-- 備註 -->
                <b-td>
                  <b-form-input v-model="item.remark" />
                </b-td>
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
            <!-- <b-tfoot>
          <b-tr>
            <b-td
              colspan="7"
              class="text-right"
            >
              Total Rows: <b>5</b>
            </b-td>
          </b-tr>
        </b-tfoot> -->
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
    const showData = ref(null)

    // 讀取
    if (root.$route.query.id) {
      axios.get(`/purchase-orders/${root.$route.query.id}`)
        .then(response => {
          const data = response.data
          showData.value = JSON.parse(JSON.stringify(data))
        })
    } else {
      showData.value = {
        items: [],
      }
    }

    // 驗證表單
    const validationForm = () => {
      refs.simpleRules.validate()
        .then(success => {
          if (!success) return

          if (showData.value.id) {
            axios
              .put(`/purchase-orders/${showData.value.id}`, showData.value)
              .then(() => {
                this.$toast({
                  component: ToastificationContent,
                  position: 'top-right',
                  props: {
                    title: `${this.$t('updatedSuccess')}`,
                    icon: 'CoffeeIcon',
                    variant: 'success',
                    text: `${root.$t('Procurement Voucher')} ${root.$t('updatedSuccess')}!`,
                  },
                })
                root.$router.push({ name: 'ProcurementOperation-PurchaseVoucherList' });
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
              .post('purchase-orders', showData.value)
              .then(() => {
                this.$toast({
                  component: ToastificationContent,
                  position: 'top-right',
                  props: {
                    title: `${root.$t('createdSuccess')}`,
                    icon: 'CoffeeIcon',
                    variant: 'success',
                    text: `${root.$t('Procurement Voucher')} ${root.$t('createdSuccess')}!`,
                  },
                })
                root.$router.push({ name: 'ProcurementOperation-PurchaseVoucherList' });
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
        root.$set(item, 'id', select.id);
        root.$set(item, 'code', select.code);
        root.$set(item, 'sku', select.sku);
        root.$set(item, 'unit', select.unit);
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
