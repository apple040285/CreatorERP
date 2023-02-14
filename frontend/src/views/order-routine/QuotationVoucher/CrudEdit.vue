<template>
  <div>
    <b-form @submit.prevent>
      <validation-observer ref="simpleRules">
        <!-- 基本資料 -->
        <b-card
          v-if="showData"
          :title="$route.name === 'OrderRoutine-QuotationVoucherCreate' ? $t('QuotationVoucherModel.createQuotationVoucher') : $t('QuotationVoucherModel.editQuotationVoucher')"
        >
        
          <b-row>
            <!-- 報價日期 -->
            <b-form-group
              :label="$t('QuotationVoucherList.quotationDate')"
              label-for="quotationDate"
              class="col-12 col-sm-4"
            >
              <validation-provider
                #default="{ errors }"
                name="quotationDate"
                rules="required"
              >
                <flat-pickr
                  id="quotationDate"
                  v-model="showData.quotation_date"
                  class="form-control"
                  :placeholder="$t('QuotationVoucherList.quotationDate')"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!---報價單號-->
            <b-form-group
              :label="$t('QuotationVoucherList.quotationNo')"
              label-for="quotationNo"
              class="col-12 col-sm-4"
            >
              <validation-provider
                #default="{ errors }"
                name="quotationNo"
                rules="required"
              >
              <b-form-input
                  id="quotationNo"
                  v-model="showData.quotation_order_no"
                  type="text"
                  :placeholder="$t('QuotationVoucherList.quotationNo')"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>
          

            <!-- 客戶 -->
            <b-form-group
              :label="$t('QuotationVoucherList.customer')"
              label-for="customer"
              class="col-12 col-sm-4"
            >
              <validation-provider
                #default="{ errors }"
                name="customer"
                rules="required"
              >
                <v-select
                  id="customer"
                  label="full_name"
                  v-model="showData.customer_id"
                  :options="customerOption"
                  :placeholder="$t('QuotationVoucherModel.quotationCustomer')"
                  :reduce="option => option.id"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

             <!-- 幣別 -->
             <b-form-group
              :label="$t('QuotationVoucherList.currency')"
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
                  :placeholder="$t('QuotationVoucherModel.selectCurrency')"
                  :reduce="option => option.id"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            

            <!-- 轉入單號 -->
            <b-form-group
              :label="$t('QuotationVoucherList.transferNo')"
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
                  :placeholder="$t('QuotationVoucherModel.selectTransferNo')"
                  :reduce="option => option.id"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

      

            <!-- 業務人員 -->
            <b-form-group
              :label="$t('QuotationVoucherList.businessPeople')"
              label-for="businessPeople"
              class="col-12 col-sm-4"
            >
              <validation-provider
                #default="{ errors }"
                name="businessPeople"
              >
                <v-select
                  id="businessPeople"
                  label="name"
                  v-model="showData.businessPeople_id"
                  :options="staffOption"
                  :placeholder="$t('QuotationVoucherModel.businessPeople')"
                  :reduce="option => option.id"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 部門 -->
            <b-form-group
              :label="$t('QuotationVoucherList.quotationdepartment')"
              label-for="quotationdepartment"
              class="col-12 col-sm-4"
            >
              <validation-provider
                #default="{ errors }"
                name="quotationdepartment"
              >
                <v-select
                  id="quotationdepartment"
                  label="name"
                  v-model="showData.quotationDepartment_id"
                  :options="quotationdepartmentOption"
                  :placeholder="$t('QuotationVoucherModel.quotationdepartment')"
                  :reduce="option => option.id"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

             <!-- 有效日期 -->
             <b-form-group
              :label="$t('QuotationVoucherList.quotationEffectiveDate')"
              label-for="quotationEffectiveDate"
              class="col-12 col-sm-4"
            >
              <validation-provider
                #default="{ errors }"
                name="effective_date"
                rules="required"
              >
                <flat-pickr
                  id="quotationEffectiveDate"
                  v-model="showData.effective_date"
                  class="form-control"
                  :placeholder="$t('QuotationVoucherList.quotationEffectiveDate')"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

             <!-- 失效日期 -->
             <b-form-group
              :label="$t('QuotationVoucherList.quotationExpirationDate')"
              label-for="quotationExpirationDate"
              class="col-12 col-sm-4"
            >
              <validation-provider
                #default="{ errors }"
                name="quotationExpirationDate"
              >
                <flat-pickr
                  id="quotationExpirationDate"
                  v-model="showData.expiration_date"
                  class="form-control"
                  :placeholder="$t('QuotationVoucherList.quotationExpirationDate')"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>


            <!-- 扣稅類別 -->
            <b-form-group
              :label="$t('QuotationVoucherList.taxDeductionCategory')"
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
                  v-model="showData.tax_type"
                  :options="[
                    { label: '不計稅', value: 'taxFree' },
                    { label: '應稅內含', value: 'taxableIncluded' },
                    { label: '應稅外加', value: 'taxablePlus' },
                  ]"
                  :placeholder="$t('QuotationVoucherList.selectTaxDeductionCategory')"
                  :reduce="option => option.value"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>



             <!-- 專案編號 -->
             <b-form-group
              :label="$t('QuotationVoucherList.projectNo')"
              label-for="projectNo"
              class="col-12 col-sm-4"
            >
              <validation-provider
                #default="{ errors }"
                name="projectNo"
              >
                <b-form-input
                  id="projectNo"
                  v-model="showData.project_id"
                  type="text"
                  :placeholder="$t('QuotationVoucherList.projectNo')"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

              <!-- 專案名稱 -->
              <b-form-group
              :label="$t('QuotationVoucherList.project')"
              label-for="project"
              class="col-12 col-sm-4"
            >
              <validation-provider
                #default="{ errors }"
                name="projectName"
                rules="required"
              >
                <b-form-input
                  id="project"
                  v-model="showData.project_naem"
                  type="text"
                  :placeholder="$t('QuotationVoucherList.project')"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            

            <!-- 客戶訂單 -->
            <b-form-group
              :label="$t('QuotationVoucherList.customerReservation')"
              label-for="customerReservation"
              class="col-12 col-sm-4"
            >
              <validation-provider
                #default="{ errors }"
                name="order"
              >
                <b-form-input
                  id="customerReservation"
                  v-model="showData.customerReservation"
                  type="text"
                  :placeholder="$t('QuotationVoucherList.customerReservation')"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            

            <!-- 未稅本幣 -->
            <b-form-group
              :label="$t('QuotationVoucherList.untaxedLocalCurrency')"
              label-for="untaxedAmount"
              class="col-12 col-sm-4"
            >
              <validation-provider
                #default="{ errors }"
                name="untaxedLocalCurrency"
              >
                <b-form-input
                  id="untaxedLocalCurrency"
                  v-model="showData.untaxedlocalcurrency"
                  type="text"
                  :placeholder="$t('QuotationVoucherList.untaxedLocalCurrency')"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 本幣稅額 -->
            <b-form-group
              :label="$t('QuotationVoucherList.localCurrencyTax')"
              label-for="localCurrencyTax"
              class="col-12 col-sm-4"
            >
              <validation-provider
                #default="{ errors }"
                name="localCurrencyTax"
              >
                <b-form-input
                  id="localCurrencyTax"
                  v-model="showData.localcurrencytax"
                  type="text"
                  :placeholder="$t('QuotationVoucherList.localCurrencyTax')"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 本幣合計 -->
            <b-form-group
              :label="$t('QuotationVoucherList.totalLocalCurrency')"
              label-for="totalLocalCurrency"
              class="col-12 col-sm-4"
            >
              <validation-provider
                #default="{ errors }"
                name="totalLocalCurrency"
              >
                <b-form-input
                  id="totalLocalCurrency"
                  v-model="showData.totallocalcurrency"
                  type="text"
                  :placeholder="$t('QuotationVoucherList.totalLocalCurrency')"
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
          :title="$t('QuotationVoucherModel.productInformation')"
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
                <b-th class="text-nowrap"> {{$t('QuotationVoucherList.ProductList.productNo') }} </b-th>
                <b-th class="text-nowrap"> {{$t('QuotationVoucherList.ProductList.productName') }} </b-th>
                <b-th class="text-nowrap"> {{$t('QuotationVoucherList.ProductList.specification') }} </b-th>
                <b-th class="text-nowrap"> {{$t('QuotationVoucherList.ProductList.unit') }} </b-th>
                <b-th class="text-nowrap"> {{$t('QuotationVoucherList.ProductList.storehouse') }} </b-th>
                <b-th class="text-nowrap"> {{$t('QuotationVoucherList.ProductList.quantity') }} </b-th>
                <b-th class="text-nowrap"> {{$t('QuotationVoucherList.ProductList.unitPrice') }} </b-th>
                <b-th class="text-nowrap"> {{$t('QuotationVoucherList.ProductList.amount') }} </b-th>
                <b-th class="text-nowrap"> {{$t('QuotationVoucherList.ProductList.numberOfTransfers') }} </b-th>
                <b-th class="text-nowrap"> {{$t('QuotationVoucherList.ProductList.untransferredQuantity') }} </b-th>
                <b-th class="text-nowrap"> {{$t('QuotationVoucherList.ProductList.productRemark') }} </b-th>
                <b-th class="text-nowrap"> {{$t('QuotationVoucherList.ProductList.action') }} </b-th>
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
                  <v-select
                    :id="`product-` + index"
                    label="name"
                    v-model="item.product_id"
                    :options="productOption"
                    :placeholder="$t('QuotationVoucherModel.selectProductName')"
                    :filterable="false"
                    style="width: 300px;"
                    @search="onSearchProduct"
                    @input="val => selectProduct(val, item)"
                  >
                    <template slot="no-options">
                      輸入關鍵字搜索 產品資料...
                    </template>
                  </v-select>
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
                    v-model="item.storehouse_id"
                    :options="storehouseOption"
                    :placeholder="$t('QuotationVoucherModel.selectStorehouse')"
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
                      :placeholder="$t('QuotationVoucherList.ProductList.quantity')"
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
                      :placeholder="$t('QuotationVoucherList.ProductList.unitPrice')"
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
                  <b-form-input
                   v-model="item.numberOfTransfers"   
                  disabled />
                </b-td>
                <!-- 未轉數量 -->
                <b-td>
                  <b-form-input 
                  v-model="item.untransferredQuantity" 
                  disabled
                  />
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
       
          </b-table-simple>
        </b-card>
        <!-- 操作按鈕 -->
        <div class="d-sm-flex align-items-center justify-content-center">
          <b-button
            variant="outline-danger"
            type="button"
            :block="$store.getters['app/currentBreakPoint'] === 'xs'"
            class="mb-1 mb-sm-0 mr-0 mr-sm-1"
            :to="{ name: 'OrderRoutine-QuotationVoucherList' }"
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
      axios.get(`/requisitions-orders/${root.$route.query.id}`)
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
              .put(`/requisitions-orders/${showData.value.id}`, showData.value)
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
                root.$router.push({ name: 'OrderRoutine-QuotationVoucherList' });
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
              .post('requisitions-orders', showData.value)
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
                root.$router.push({ name: 'OrderRoutine-QuotationVoucherList' });
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
    const quotationdepartmentOption = ref([])
    axios.post('/departments/options')
      .then(response => {
        quotationdepartmentOption.value = response.data
      })

    // 人員
    const staffOption = ref([])
    axios.post('/staffs/options')
      .then(response => {
        staffOption.value = response.data
      })

    // 客戶廠商
    const customerOption = ref([])
    axios.post('/customer-manufacturers/options')
      .then(response => {
        customerOption.value = response.data
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
      quotationdepartmentOption,
      staffOption,
      customerOption,
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
