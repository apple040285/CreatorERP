<template>
  <!-- 產品資料 -->
  <b-card :title="$t('PurchaseVoucherModal.productInformation')">
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
      style="height: 400px"
    >
      <b-thead>
        <b-tr>
          <b-th class="text-nowrap text-center">#</b-th>
          <b-th class="text-nowrap text-center"> {{ $t('ProcurementVoucherList.ProductList.productNo') }} </b-th>
          <b-th class="text-nowrap"> {{ $t('ProcurementVoucherList.ProductList.productName') }} </b-th>
          <b-th class="text-nowrap"> {{ $t('ProcurementVoucherList.ProductList.specification') }} </b-th>
          <b-th class="text-nowrap"> {{ $t('ProcurementVoucherList.ProductList.unit') }} </b-th>
          <b-th class="text-nowrap"> 已交數量 </b-th>
          <b-th class="text-nowrap"> 未交數量 </b-th>
          <b-th class="text-nowrap"> {{ $t('ProcurementVoucherList.ProductList.quantity') }} </b-th>
          <b-th class="text-nowrap"> {{ $t('ProcurementVoucherList.ProductList.unitPrice') }} </b-th>
          <b-th class="text-nowrap"> {{ $t('ProcurementVoucherList.ProductList.amount') }} </b-th>
          <b-th class="text-nowrap"> {{ $t('ProcurementVoucherList.ProductList.storehouse') }} </b-th>
          <b-th class="text-nowrap"> {{ $t('ProcurementVoucherList.ProductList.productPreDeliveryDate') }} </b-th>
          <b-th class="text-nowrap"> {{ $t('ProcurementVoucherList.ProductList.productRemark') }} </b-th>
          <b-th class="text-nowrap"> {{ $t('ProcurementVoucherList.ProductList.action') }} </b-th>
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
          <b-td class="text-center">
            <small class="text-nowrap">
              {{ item.product_code || (item.product && item.product.code) }}
            </small>
          </b-td>
          <!-- 產品 -->
          <b-td>
            <ProductSwitcher
              :key="`product-${index}`"
              :item="item"
            />
            <!-- <v-select
              :id="`product-` + index"
              label="name"
              :options="productOption"
              :placeholder="$t('ProcurementVoucherModal.selectProductName')"
              :filterable="false"
              :value="(item.product && item.product.name)"
              style="width: 200px;"
              class="text-nowrap select-size-sm"
              @search="onSearchProduct"
              @input="val => selectProduct(val, item)"
            >
              <template slot="no-options">
                輸入關鍵字搜索 產品資料...
              </template>
            </v-select> -->
          </b-td>
          <!-- 規格 -->
          <b-td>
            <b-form-input
              size="sm"
              disabled
              plaintext
              :value="item.product_sku || (item.product && item.product.sku)"
              class="text-center"
            />
          </b-td>
          <!-- 單位 -->
          <b-td>
            <b-form-input
              size="sm"
              disabled
              plaintext
              :value="item.product_unit || (item.product && item.product.unit)"
              class="text-center"
            />
          </b-td>
          <!-- 已轉數量 -->
          <b-td class="text-center">
            <small class="text-center text-nowrap">
              {{ item.transferred_quantity }}
            </small>
          </b-td>
          <!-- 未轉數量 -->
          <b-td class="text-center">
            <small class="text-nowrap">
              {{ item.untransferred_quantity }}
            </small>
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
                :placeholder="$t('ProcurementVoucherList.ProductList.quantity')"
                size="sm"
                style="width: 60px;"
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
                :placeholder="$t('ProcurementVoucherList.ProductList.unitPrice')"
                size="sm"
                style="width: 100px;"
                class="text-nowrap"
              />
              <small class="text-danger">{{ errors[0] }}</small>
            </validation-provider>
          </b-td>
          <!-- 金額 -->
          <b-td class="text-center">
            <small class="text-nowrap">
              {{ parseFloat(item.quantity * item.price).toFixed(2) }}
            </small>
          </b-td>
          <!-- 倉庫 -->
          <b-td>
            <v-select
              :id="`storehouse-` + index"
              label="name"
              v-model="item.storehouse_id"
              :options="storehouseOption"
              :placeholder="$t('ProcurementVoucherModal.selectStorehouse')"
              :reduce="option => option.id"
              style="width: 130px;"
              class="text-nowrap select-size-sm"
            />
          </b-td>
          <!-- 預交日期 -->
          <b-td class="text-center">
            <flat-pickr
              v-model="item.delivery_date"
              style="width: 100px;"
              class="form-control form-control-sm"
            />
          </b-td>
          <!-- 備註 -->
          <b-td>
            <b-form-input
              v-model="item.remark"
              size="sm"
              style="width: 150px;"
            />
          </b-td>
          <!-- 操作 -->
          <b-td>
            <b-button
              variant="gradient-danger"
              class="ml-50 btn-sm"
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
</template>

<script>
import { ValidationProvider, ValidationObserver } from 'vee-validate'
import {
  BCard, BTabs, BTab, BRow, BCol,
  BForm, BFormGroup, BFormInput, BFormTextarea, BFormSelect,
  BInputGroup, BInputGroupPrepend, BInputGroupAppend, BInputGroupText,
  BTableSimple, BThead, BTbody, BTfoot, BTh, BTr, BTd,
  BButton,
} from 'bootstrap-vue'
import { ref } from '@vue/composition-api'
import vSelect from 'vue-select'
import flatPickr from 'vue-flatpickr-component'
import ProductSwitcher from './utils/ProductSwitcher.vue'
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
    ProductSwitcher,
  },
  props: {
    showData: {
      type: Object,
      required: true,
    },
  },
  setup(_, { root }) {
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
        loading(true)

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
        root.$set(item, 'product', { name: select.name });
        root.$set(item, 'product_id', select.id);
        root.$set(item, 'product_code', select.code);
        root.$set(item, 'product_sku', select.sku);
        root.$set(item, 'product_unit', select.unit);
        root.$set(item, 'quantity', 1);
        root.$set(item, 'price', select.price);
      }
    }

    // 添加項目
    const addItem = items => items.push({})

    // 刪除項目
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

    return {
      // 
      storehouseOption,
      productOption,

      // 
      onSearchProduct,
      selectProduct,

      addItem,
      removeItem,
    }
  }
}
</script>

<style>
</style>