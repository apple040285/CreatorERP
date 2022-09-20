<template >
  <b-dropdown
    v-ripple.400="'rgba(113, 102, 240, 0.15)'"
    text="Excel 功能"
    variant="outline-primary"
    class="mb-2 mr-2"
  >
    <b-dropdown-item disabled>匯出功能</b-dropdown-item>

    <b-dropdown-divider />

    <b-dropdown-group id="dropdown-group-1">
      <b-dropdown-item @click.stop.prevent="downLoadExample">Excel 上傳範例下載</b-dropdown-item>
      <input
        ref="refInputEl"
        type="file"
        accept=".csv,.xlsx"
        class="d-none"
        @change="importExcel"
      >
      <b-dropdown-item @click="$refs.refInputEl.click()">
        Excel 上傳匯入
      </b-dropdown-item>
    </b-dropdown-group>

    <b-dropdown-divider />

    <b-dropdown-item disabled>匯出功能</b-dropdown-item>

    <b-dropdown-group id="dropdown-group-2">
      <b-dropdown-item @click.stop.prevent="exportExcel">Excel 匯出下載</b-dropdown-item>
    </b-dropdown-group>
  </b-dropdown>
</template>
<script>
import {
  BDropdown, BDropdownItem, BDropdownDivider, BDropdownGroup, BDropdownItemButton,
} from 'bootstrap-vue'
import axios from "@axios";
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'
import Ripple from 'vue-ripple-directive'

export default {
  components: {
    BDropdown,
    BDropdownItem,
    BDropdownDivider,
    BDropdownGroup,
    BDropdownItemButton,
  },
  directives: {
    Ripple,
  },
  props: {
    name: {
      type: String,
      required: true,
    },
    importUrl: {
      type: String,
      required: true,
    },
    exportUrl: {
      type: String,
      required: true,
    },
  },
  setup(props, { root, refs }) {
    const downLoadBlob = (data, filename) => {
      const url = URL.createObjectURL(new Blob([data], {
        type: 'application/vnd.ms-excel',
      }));
      const link = document.createElement('a');
      link.href = url;
      link.setAttribute('download', filename);
      document.body.appendChild(link);
      link.click();
    }

    const importExcel = event => {
      const { files } = event.target
      const form = new FormData();
      form.append('file', files[0]);

      root.$swal.fire({
        title: 'Excel 匯入中，請稍候！',
        allowOutsideClick: false,
        willOpen: () => {
          root.$swal.showLoading();
        }
      });

      axios
        .post(props.importUrl, form)
        .then(response => {
          refs.refInputEl.value = ''

          root.$swal.close();

          root.$toast({
            component: ToastificationContent,
            position: 'top-right',
            props: {
              title: '上傳成功',
              icon: 'CoffeeIcon',
              variant: 'success',
              text: response.data.message,
            },
          })
        })
        .catch(error => {
          root.$swal.fire({
            title: 'Excel 匯入失敗',
            text: error.response.data.message,
            type: 'error',
          })
        })
    }

    const exportExcel = () => {
      root.$swal.fire({
        title: 'Excel 匯出中，請稍候！',
        allowOutsideClick: false,
        willOpen: () => {
          root.$swal.showLoading();
        },
      });

      axios
        .get(props.exportUrl, { responseType: 'blob' })
        .then(response => {
          downLoadBlob(response.data, `${props.name}-export.xlsx`)

          root.$swal.close();
        })
        .catch(error => {
          root.$swal.fire({
            title: 'Excel 匯入失敗',
            text: error.response.data.message,
            type: 'error',
          })
        })
    }

    const downLoadExample = () => {
      root.$swal.fire({
        title: 'Excel 匯出中，請稍候！',
        allowOutsideClick: false,
        willOpen: () => {
          root.$swal.showLoading();
        },
      });

      axios
        .get(props.exportUrl, { responseType: 'blob', params: { type: 'example' } })
        .then(response => {
          downLoadBlob(response.data, `${props.name}-import-example.xlsx`)

          root.$swal.close();
        })
        .catch(error => {
          root.$swal.fire({
            title: 'Excel 匯入失敗',
            text: error.response.data.message,
            type: 'error',
          })
        })
    }

    return {
      importExcel,
      exportExcel,
      downLoadExample,
    }
  }
}
</script>
<style >
</style>
