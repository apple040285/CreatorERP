<template>
  <div>
    <b-form @submit.prevent>
      <validation-observer ref="simpleRules">
        <!-- 基本資料 -->
        <b-card
          v-if="showData"
          :title="showData.id ? $t('edit') : $t('create')"
        >
          <b-row>
            <!-- 專案代號 -->
            <b-form-group
              :label="$t('ProjectList.code')"
              label-for="code"
              class="col-12 col-sm-4"
            >
              <b-form-input
                v-model="showData.code"
                name="code"
                type="text"
                :placeholder="$t('ProjectList.code')"
              />
            </b-form-group>

            <!-- 專案名稱 -->
            <b-form-group
              :label="$t('ProjectList.name')"
              label-for="name"
              class="col-12 col-sm-4"
            >
              <b-form-input
                v-model="showData.name"
                name="name"
                type="text"
                :placeholder="$t('ProjectList.name')"
              />
            </b-form-group>

            <!-- 施工地址 -->
            <b-form-group
              :label="$t('ProjectList.address')"
              label-for="name"
              class="col-12 col-sm-4"
            >
              <b-form-input
                v-model="showData.address"
                name="name"
                type="text"
                :placeholder="$t('ProjectList.address')"
              />
            </b-form-group>

            <!-- 開工日期 -->
            <b-form-group
              :label="$t('ProjectList.startDate')"
              label-for="expiration_date"
              class="col-12 col-sm-4"
            >
              <flat-pickr
                v-model="showData.start_date"
                name="expiration_date"
                class="form-control"
                :placeholder="$t('ProjectList.startDate')"
              />
            </b-form-group>

            <!-- 預定完工日期 -->
            <b-form-group
              :label="$t('ProjectList.reserveDate')"
              label-for="expiration_date"
              class="col-12 col-sm-4"
            >
              <flat-pickr
                v-model="showData.reserve_date"
                name="expiration_date"
                class="form-control"
                :placeholder="$t('ProjectList.reserveDate')"
              />
            </b-form-group>

            <!-- 實際完工日期 -->
            <b-form-group
              :label="$t('ProjectList.actualDate')"
              label-for="expiration_date"
              class="col-12 col-sm-4"
            >
              <flat-pickr
                v-model="showData.actual_date"
                name="expiration_date"
                class="form-control"
                :placeholder="$t('ProjectList.actualDate')"
              />
            </b-form-group>

            <!-- 是否保固 -->
            <b-form-group
              label-for="accountSettingMethod"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('ProjectList.warranty') }}
                <span class="text-danger">*</span>
              </template>

              <validation-provider
                #default="{ errors }"
                name="warranty"
              >
                <v-select
                  id="warranty"
                  label="label"
                  v-model="showData.billing_type"
                  :placeholder="$t('ProjectList.selectWarranty')"
                  :options="[
                    { label: '是', value: 'Y' },
                    { label: '否', value: 'N' },
                  ]"
                  :reduce="option => option.value"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 保固截止日期 -->
            <b-form-group
              :label="$t('ProjectList.cutoffDate')"
              label-for="expiration_date"
              class="col-12 col-sm-4"
            >
              <flat-pickr
                v-model="showData.cutoff_date"
                name="expiration_date"
                class="form-control"
                :placeholder="$t('ProjectList.cutoffDate')"
              />
            </b-form-group>

            <!-- 失效日期 -->
            <b-form-group
              :label="$t('ProjectList.expiration_date')"
              label-for="expiration_date"
              class="col-12 col-sm-4"
            >
              <flat-pickr
                v-model="showData.expiration_date"
                name="expiration_date"
                class="form-control"
                :placeholder="$t('ProjectList.expiration_date')"
              />
            </b-form-group>

            <!-- 客戶窗口 -->
            <b-form-group
              label-for="customer"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('ProjectList.customer') }}
                <span class="text-danger">*</span>
              </template>

              <validation-provider
                #default="{ errors }"
                name="customer"
              >
                <v-select
                  id="customer"
                  label="name"
                  v-model="showData.customer_manufacturer_id"
                  :options="manufacturerCustomerOption"
                  :placeholder="$t('ProjectList.customer')"
                  :reduce="option => option.id"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 業務員 -->
            <b-form-group
              label-for="projectStaff"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('ProjectList.projectStaff') }}
                <span class="text-danger">*</span>
              </template>

              <validation-provider
                #default="{ errors }"
                name="projectStaff"
              >
                <v-select
                  id="projectStaff"
                  label="name"
                  v-model="showData.staff_id"
                  :options="staffOption"
                  :placeholder="$t('ProjectList.selectProjectStaff')"
                  :reduce="option => option.id"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 專案預定總額 -->
            <b-form-group
              label-for="untaxedAmount"
              class="col-12 col-sm-4"
            >
              <template #label>
                {{ $t('ProjectList.reserveTotal') }}
              </template>

              <validation-provider
                #default="{ errors }"
                name="untaxedAmount"
              >
                <b-form-input
                  v-model="showData.scheduled_amount"
                  id="untaxedAmount"
                  type="text"
                  :placeholder="$t('ProjectList.reserveTotal')"
                />
                <small class="text-danger">{{ errors[0] }}</small>
              </validation-provider>
            </b-form-group>

            <!-- 預估獲利 -->
            <b-form-group
              :label="$t('ProjectList.reserveProfit')"
              label-for="name"
              class="col-12 col-sm-4"
            >
              <b-form-input
                v-model="showData.estimated_profit"
                name="name"
                type="text"
                :placeholder="$t('ProjectList.reserveProfit')"
              />
            </b-form-group>

            <!-- 專案毛利 -->
            <b-form-group
              :label="$t('ProjectList.grossMargin')"
              label-for="name"
              class="col-12 col-sm-4"
            >
              <b-form-input
                name="name"
                type="text"
                disabled
                :placeholder="$t('ProjectList.grossMargin')"
                :value="showData.gross_profit"
              />
            </b-form-group>

            <!-- 專案實際總額 -->
            <b-form-group
              :label="$t('ProjectList.actualTotal')"
              label-for="name"
              class="col-12 col-sm-4"
            >
              <b-form-input
                name="name"
                type="text"
                disabled
                :placeholder="$t('ProjectList.actualTotal')"
                :value="showData.quotationSum"
              />
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

        <!-- 其他資訊 -->
        <b-card
          v-if="showData && $route.params.id !== 'add'"
          :title="$t('ProjectList.projectDetails')"
        >
          <b-table-simple
            responsive
            bordered
          >
            <b-thead>
              <b-tr>
                <b-th class="text-nowrap"> # </b-th>
                <b-th class="text-nowrap"> 日期 </b-th>
                <b-th class="text-nowrap"> 單據別 </b-th>
                <b-th class="text-nowrap"> 單據號碼 </b-th>
                <b-th class="text-nowrap"> 型態 </b-th>
                <b-th class="text-nowrap"> 金額 </b-th>
                <b-th class="text-nowrap"> 預估支出 </b-th>
                <b-th class="text-nowrap"> 實際支出 </b-th>
                <b-th class="text-nowrap"> 預估收入 </b-th>
                <b-th class="text-nowrap"> 實際收入 </b-th>
              </b-tr>
            </b-thead>

            <b-tbody>
              <!-- items -->
              <b-tr
                v-for="(order, orderIndex) in projectOrders"
                :key="orderIndex"
              >
                <b-th>{{ orderIndex + 1 }}</b-th>
                <!-- 日期 -->
                <b-td>
                  <small class="text-center text-nowrap">
                    {{ order.date }}
                  </small>
                </b-td>
                <b-td>
                  <small class="text-center text-nowrap">
                    {{ order.document_type }}
                  </small>
                </b-td>
                <b-td>
                  <small class="text-center text-nowrap">
                    {{ order.order_no }}
                  </small>
                </b-td>
                <b-td>
                  <small class="text-center text-nowrap">
                    {{ resolveOrderType(order.document_type) }}
                  </small>
                </b-td>
                <b-td class="text-right">
                  <small class="text-center text-nowrap">
                    {{ order.total_amount }}
                  </small>
                </b-td>
                <b-td class="text-right">
                  <small class="text-center text-nowrap">
                    {{ isEstimatedExpenditure(order.document_type) && parseFloat(order.total_amount).toFixed(0) || '' }}
                  </small>
                </b-td>
                <b-td class="text-right">
                  <small class="text-center text-nowrap">
                    {{ isActualExpenditure(order.document_type) && parseFloat(order.total_amount).toFixed(0) || '' }}
                  </small>
                </b-td>
                <b-td class="text-right">
                  <small class="text-center text-nowrap">
                    {{ isEstimatedIncome(order.document_type) && parseFloat(order.total_amount).toFixed(0) || '' }}
                  </small>
                </b-td>
                <b-td class="text-right">
                  <small class="text-center text-nowrap">
                    {{ isActualIncome(order.document_type) && parseFloat(order.total_amount).toFixed(0) || '' }}
                  </small>
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
            :to="{ name: 'ProjectData-ProjectDataSetting' }"
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
import { ref, computed } from '@vue/composition-api'
import vSelect from 'vue-select'
import flatPickr from 'vue-flatpickr-component'
import { VueGoodTable } from 'vue-good-table'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'
import axios from '@axios'

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

    // 專案的訂單列表
    const projectOrders = ref([])

    // 讀取
    if (root.$route.params.id === 'add') {
      showData.value = {
        items: [],
      }
    } else {
      axios.get(`/projects/${root.$route.params.id}`)
        .then(response => {
          const data = response.data
          showData.value = JSON.parse(JSON.stringify(data))
        })

      axios.post(`/projects/relationships`, { project_id: root.$route.params.id })
        .then(response => {
          const data = response.data
          projectOrders.value = JSON.parse(JSON.stringify(data))
        })
    }

    // 驗證表單
    const validationForm = () => {
      refs.simpleRules.validate()
        .then(success => {
          if (!success) return

          if (showData.value.id) {
            axios
              .put(`/projects/${showData.value.id}`, showData.value)
              .then(() => {
                root.$toast({
                  component: ToastificationContent,
                  position: 'top-right',
                  props: {
                    title: `${root.$t('updatedSuccess')}`,
                    icon: 'CoffeeIcon',
                    variant: 'success',
                    text: `${root.$t('Project Data Setting')} ${root.$t('updatedSuccess')}!`,
                  },
                })
                root.$router.push({ name: 'ProjectData-ProjectDataSetting' });
              })
              .catch(error => {
                const response = error.response

                root.$toast({
                  component: ToastificationContent,
                  position: 'top-right',
                  props: {
                    title: `${root.$t('updatedFailed')}`,
                    icon: 'XIcon',
                    variant: 'danger',
                    text: (response ? response.data.message : error.message),
                  },
                })
              })

          } else {
            axios
              .post('projects', showData.value)
              .then(() => {
                root.$toast({
                  component: ToastificationContent,
                  position: 'top-right',
                  props: {
                    title: `${root.$t('createdSuccess')}`,
                    icon: 'CoffeeIcon',
                    variant: 'success',
                    text: `${root.$t('Project Data Setting')} ${root.$t('createdSuccess')}!`,
                  },
                })
                root.$router.push({ name: 'ProjectData-ProjectDataSetting' });
              })
              .catch(error => {
                const response = error.response

                root.$toast({
                  component: ToastificationContent,
                  position: 'top-right',
                  props: {
                    title: `${root.$t('createdFailed')}`,
                    icon: 'XIcon',
                    variant: 'danger',
                    text: (response ? response.data.message : error.message),
                  },
                })
              })
          }
        })
    }

    // 新增產品
    const addItem = items => {
      if (showData.value.items === null) {
        root.$set(showData.value, 'items', [])
        showData.value.items.push({})
      } else {
        items.push({})
      }
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

    // 人員
    const staffOption = ref([])
    axios.post('/staffs/options')
      .then(response => {
        staffOption.value = response.data
      })

    const manufacturerOption = ref([])
    axios.post('/customer-manufacturers/options', { type: 'manufacturer' })
      .then(response => {
        manufacturerOption.value = response.data
      })

    const customerOption = ref([])
    axios.post('/customer-manufacturers/options', { type: 'customer' })
      .then(response => {
        customerOption.value = response.data
      })

    // 客戶廠商
    const manufacturerCustomerOption = computed(() => manufacturerOption.value.concat(customerOption.value))

    // 解析轉單類型
    const resolveOrderType = type => {
      if (type === '請購憑單') return '支出'
      if (type === '詢價憑單') return '支出'
      if (type === '採購憑單') return '支出'
      if (type === '進貨憑單') return '支出'
      if (type === '報價憑單') return '收入'
      if (type === '訂購憑單') return '收入'
      if (type === '銷貨憑單') return '收入'
      return '不明'
    }

    // 預估支出
    const isEstimatedExpenditure = type => type === '採購憑單'

    // 實際支出
    const isActualExpenditure = type => type === '進貨憑單'

    // 預估收入
    const isEstimatedIncome = type => type === '訂購憑單'

    // 實際收入
    const isActualIncome = type => type === '銷貨憑單'

    return {
      showData,
      projectOrders,
      staffOption,
      manufacturerCustomerOption,

      validationForm,

      addItem,
      removeItem,

      resolveOrderType,
      isEstimatedExpenditure,
      isActualExpenditure,
      isEstimatedIncome,
      isActualIncome,

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
