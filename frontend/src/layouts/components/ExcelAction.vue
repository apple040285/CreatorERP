<template >
  <b-dropdown
    v-ripple.400="'rgba(113, 102, 240, 0.15)'"
    variant="outline-primary"
    class="mb-2 mr-2"
    :text="$t('Excel.function')"
  >
    <b-dropdown-item disabled>{{ $t('Excel.importFunction') }}</b-dropdown-item>

    <b-dropdown-divider />

    <b-dropdown-group id="dropdown-group-1">
      <b-dropdown-item @click.stop.prevent="downLoadExample">{{ $t('Excel.uploadSampleDownload') }}</b-dropdown-item>
      <input
        ref="refInputEl"
        type="file"
        accept=".xls"
        class="d-none"
        @change="importExcel"
      >
      <b-dropdown-item @click="$refs.refInputEl.click()">
        {{ $t('Excel.uploadImport') }}
      </b-dropdown-item>
    </b-dropdown-group>

    <b-dropdown-divider />

    <b-dropdown-item disabled>{{ $t('Excel.exportFunction') }}</b-dropdown-item>

    <b-dropdown-group id="dropdown-group-2">
      <b-dropdown-item @click.stop.prevent="exportExcel">{{ $t('Excel.exportDownload') }}</b-dropdown-item>
    </b-dropdown-group>

    <slot
      :export-excel="exportExcel"
      :import-excel="importExcel"
    />
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

    const importExcel = (event, importUrl = null, refInputEl = null) => {
      console.log(event);
      const { files } = event.target
      const form = new FormData();
      form.append('file', files[0]);

      root.$swal.fire({
        title: `${root.$t('Excel.importing')}`,
        allowOutsideClick: false,
        willOpen: () => {
          root.$swal.showLoading();
        }
      });

      axios
        .post(importUrl || props.importUrl, form)
        .then(response => {
          if (refInputEl) refInputEl.value = ''

          refs.refInputEl.value = ''

          root.$swal.close();

          root.$toast({
            component: ToastificationContent,
            position: 'top-right',
            props: {
              title: `${root.$t('Excel.uploadedSuccessfully')}`,
              icon: 'CoffeeIcon',
              variant: 'success',
              text: response.data.message,
            },
          })
        })
        .catch(error => {
          root.$swal.fire({
            title: `${root.$t('Excel.importFailed')}`,
            text: error.response.data.message,
            type: 'error',
          })
        })
    }

    const exportExcel = (exportUrl = null, exportName = null) => {
      root.$swal.fire({
        title: `${root.$t('Excel.exporting')}`,
        allowOutsideClick: false,
        willOpen: () => {
          root.$swal.showLoading();
        },
      });

      axios
        .get(exportUrl || props.exportUrl, { responseType: 'blob' })
        .then(response => {
          downLoadBlob(response.data, exportName || `${props.name}-export.xls`)

          root.$swal.close();
        })
        .catch(error => {
          root.$swal.fire({
            title: `${root.$t('Excel.importFailed')}`,
            text: error.response.data.message,
            type: 'error',
          })
        })
    }

    const downLoadExample = () => {
      root.$swal.fire({
        title: `${root.$t('Excel.exporting')}`,
        allowOutsideClick: false,
        willOpen: () => {
          root.$swal.showLoading();
        },
      });

      axios
        .get(props.exportUrl, { responseType: 'blob', params: { type: 'example' } })
        .then(response => {
          downLoadBlob(response.data, `${props.name}-import-example.xls`)

          root.$swal.close();
        })
        .catch(error => {
          root.$swal.fire({
            title: `${root.$t('Excel.importFailed')}`,
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
