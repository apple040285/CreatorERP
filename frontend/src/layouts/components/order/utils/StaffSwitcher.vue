<template>
  <v-select
    id="purchaseStaff"
    label="name"
    v-model="showData.staff_id"
    :options="staffOption"
    placeholder="請選擇人員"
    :reduce="option => option.id"
    @input="selectStaff"
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
  },
  setup(props, { root }) {
    // 人員
    const staffOption = ref([])
    axios.post('/staffs/options')
      .then(response => {
        staffOption.value = response.data
      })

    // 選擇人員
    const selectStaff = staff_id => {
      if (staff_id) {
        const staff = staffOption.value.find(f => f.id === staff_id)

        root.$set(props.showData, 'staff_id', staff.id);
        root.$set(props.showData, 'department_id', staff.department_id);
      }
    }

    return {
      staffOption,

      selectStaff,
    }
  }
}
</script>
<style>
</style>