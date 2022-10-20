<template>
  <div>
    <input
      ref="refInputEl"
      type="file"
      accept=".xls"
      class="d-none"
      @change="importExcel"
    >

    <b-button
      v-ripple.400="'rgba(255, 255, 255, 0.15)'"
      variant="outline-primary"
      class="mb-2 mr-2 text-nowrap"
      @click="$refs.refInputEl.click()"
    >
      <span v-if="$attrs['title'] !== undefined">{{ $t($attrs['title']) }}</span>
      <span v-else>{{ $t('Excel.import') }}</span>
    </b-button>
  </div>
</template>

<script>
import {
  BButton,
} from 'bootstrap-vue'
import axios from "@axios";
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'
import Ripple from 'vue-ripple-directive'

export default {
  components: {
    BButton,
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
    params: {
      type: Array,
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
        title: `${root.$t('Excel.importing')}`,
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

    const exportExcel = () => {
      root.$swal.fire({
        title: `${root.$t('Excel.exporting')}`,
        allowOutsideClick: false,
        willOpen: () => {
          root.$swal.showLoading();
        },
      });

      axios
        .post(props.exportUrl, props.params, { responseType: 'blob' })
        .then(response => {
          downLoadBlob(response.data, `${props.name}-export.xls`)

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
