<template>
  <v-select
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
  </v-select>
</template>
<script>
import { ref } from '@vue/composition-api'
import vSelect from 'vue-select'
import axios from '@axios'

export default {
  components: {
    vSelect,
  },
  props: {
    item: {
      type: Object,
      required: true,
    },
  },
  setup(props, { root }) {
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
        root.$set(item, 'product', { name: select.name });
        root.$set(item, 'product_id', select.id);
        root.$set(item, 'product_code', select.code);
        root.$set(item, 'product_sku', select.sku);
        root.$set(item, 'product_unit', select.unit);
        root.$set(item, 'quantity', 1);
        root.$set(item, 'price', select.price);
      }
    }

    return {
      productOption,

      onSearchProduct,
      selectProduct,
    }
  }
}
</script>
<style>
</style>