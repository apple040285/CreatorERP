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
          v-if="showData"
          :title="`其他資訊`"
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
          >
            <b-thead>
              <b-tr>
                <b-th class="text-nowrap">#</b-th>
                <b-th class="text-nowrap"> 施工地址 </b-th>
                <b-th class="text-nowrap"> 開工日期 </b-th>
                <b-th class="text-nowrap"> 預定完工日期 </b-th>
                <b-th class="text-nowrap"> 實際完工日期 </b-th>
                <b-th class="text-nowrap"> 是否保固 </b-th>
                <b-th class="text-nowrap"> 保固截止日期 </b-th>
                <b-th class="text-nowrap"> 客戶窗口 </b-th>
                <b-th class="text-nowrap"> 業務員 </b-th>
                <b-th class="text-nowrap"> 專案預定總額 </b-th>
                <b-th class="text-nowrap"> 專案實際總額 </b-th>
                <b-th class="text-nowrap"> 預估獲利 </b-th>
                <b-th class="text-nowrap"> 備註 </b-th>
                <b-th class="text-nowrap"> </b-th>
              </b-tr>
            </b-thead>

            <b-tbody>
              <!-- items -->
              <b-tr
                v-for="(item, index) in showData.items"
                :key="index"
              >
                <b-th>{{ index + 1 }}</b-th>
                <!-- 施工地址 -->
                <b-td>
                  <b-form-input v-model="item.code" />
                </b-td>
                <!-- 開工日期 -->
                <b-td>
                  <b-form-input v-model="item.code" />
                </b-td>
                <!-- 預定完工日期 -->
                <b-td>
                  <b-form-input v-model="item.code" />
                </b-td>
                <!-- 實際完工日期 -->
                <b-td>
                  <b-form-input v-model="item.code" />
                </b-td>
                <!-- 是否保固 -->
                <b-td>
                  <b-form-input v-model="item.code" />
                </b-td>
                <!-- 保固截止日期 -->
                <b-td>
                  <b-form-input v-model="item.code" />
                </b-td>
                <!-- 客戶窗口 -->
                <b-td>
                  <b-form-input v-model="item.code" />
                </b-td>
                <!-- 業務員 -->
                <b-td>
                  <b-form-input v-model="item.code" />
                </b-td>
                <!-- 專案預定總額 -->
                <b-td>
                  <b-form-input v-model="item.code" />
                </b-td>
                <!-- 專案實際總額 -->
                <b-td>
                  <b-form-input v-model="item.code" />
                </b-td>
                <!-- 預估獲利 -->
                <b-td>
                  <b-form-input v-model="item.code" />
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
            :to="{ name: 'BasicData-ProjectDataSetting' }"
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
                root.$router.push({ name: 'BasicData-ProjectDataSetting' });
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
                root.$router.push({ name: 'BasicData-ProjectDataSetting' });
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

    // 轉入單號
    const transferNoOption = ref([])

    return {
      showData,

      validationForm,

      addItem,
      removeItem,

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
