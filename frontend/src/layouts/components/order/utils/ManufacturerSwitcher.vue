<template>
  <v-select
    :id="$attrs['id']"
    label="full_name"
    v-model="showData.customer_manufacturer_id"
    :options="manufacturerOption"
    placeholder="請選擇廠商"
    :reduce="option => option.id"
    @input="selectManufacturer"
  />
</template>

<script>
import { ref } from '@vue/composition-api'
import { ValidationProvider, ValidationObserver } from 'vee-validate'
import vSelect from 'vue-select'
import axios from '@axios'

export default {
  components: {
    ValidationProvider,
    ValidationObserver,

    vSelect,
  },
  props: {
    showData: {
      type: Object,
      default: () => { },
    },
    type: {
      type: String,
      required: true,
    },
  },
  setup(props, { root }) {
    // 客戶廠商
    const manufacturerOption = ref([])
    axios.post('/customer-manufacturers/options', { type: props.type })
      .then(response => {
        manufacturerOption.value = response.data
      })

    // 選擇廠商
    const selectManufacturer = customer_manufacturer_id => {
      if (customer_manufacturer_id) {
        const manufacturer = manufacturerOption.value.find(f => f.id === customer_manufacturer_id)

        root.$set(props.showData, 'customer_manufacturer_id', manufacturer.id);
        root.$set(props.showData, 'currency_id', manufacturer.currency_id);
        root.$set(props.showData, 'tax_type', manufacturer.tax_deduction_category);
        root.$set(props.showData, 'billing_type', manufacturer.account_setting_method);
      }
    }

    return {
      manufacturerOption,

      selectManufacturer,
    }
  }
}
</script>
<style>
</style>