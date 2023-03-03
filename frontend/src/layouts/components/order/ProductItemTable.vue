<template>
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
      style1="overflow-x: visible"
      style="height: 400px"
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
            <!-- <multiselect
              v-model="selectedCountries"
              id="ajax"
              label="name"
              track-by="code"
              placeholder="Type to search"
              open-direction="bottom"
              :options="productOption"
              :multiple="true"
              :searchable="true"
              :loading="isLoading"
              :internal-search="false"
              :clear-on-select="false"
              :close-on-select="false"
              :options-limit="300"
              :limit="3"
              :limit-text="limitText"
              :max-height="600"
              :show-no-results="false"
              :hide-selected="true"
              @search-change="asyncFind"
              style="width: 200px;"
            >
              <template
                slot="tag"
                slot-scope="{ option, remove }"
              >
                <span class="custom__tag">
                  <span>{{ option.name }}</span>
                  <span
                    class="custom__remove"
                    @click="remove(option)"
                  >
                    ❌
                  </span>
                </span>
              </template>
              <template
                slot="clear"
                slot-scope="props"
              >
                <div
                  class="multiselect__clear"
                  v-if="selectedCountries.length"
                  @mousedown.prevent.stop="clearAll(props.search)"
                ></div>
              </template>
              <span slot="noResult">Oops! No elements found. Consider changing the search query.</span>
            </multiselect> -->

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
</template>

<script>
import {
  BCard, BTabs, BTab, BRow, BCol,
  BForm, BFormGroup, BFormInput, BFormTextarea, BFormSelect,
  BInputGroup, BInputGroupPrepend, BInputGroupAppend, BInputGroupText,
  BTableSimple, BThead, BTbody, BTfoot, BTh, BTr, BTd,
  BButton,
} from "bootstrap-vue"
import vSelect from 'vue-select'

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
  },
}
</script>

<style>
</style>