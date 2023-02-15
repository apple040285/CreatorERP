<template>
  <div>
    <PaginationTable
      ref="table"
      :title="$t('Role Management')"
      :show-loading="showLoading"
      :fetch-all="fetchAll"
      :tableColumns="tableColumns"
      :itemsCount="itemsCount"
      @add-sidebar="() => $router.push({ name: 'SystemManagement-RoleManagementCreate' })"
    >

      <!-- Column: Id -->
      <template #cell(id)="data">
        {{ data.row.originalIndex + 1 }}
      </template>

      <!-- Column: 權限 -->
      <template #cell(permissions)="data">
        <!-- 關鍵字只顯示前五筆 -->
        <b-badge
          v-for="(permission, index) in data.value.filter((f, i) => i < 4)"
          :key="index"
          variant="light-secondary"
          class="mr-25"
        >
          {{ permission.display_name }}
        </b-badge>

        <!-- 關鍵字大於五筆才會顯示 -->
        <template v-if="data.value.length > 4">
          <b-badge
            :id="`popover-keys-${data.id}`"
            href="#"
            variant="dark"
            class="ml-50"
          >
            +{{ data.value.length - 3 }}
          </b-badge>

          <b-popover
            :target="`popover-keys-${data.id}`"
            placement="bottom"
            triggers="focus"
          >
            <template #title>
              權限列表
            </template>
            <b-badge
              v-for="(permission, index) in data.value.filter((f, i) => i >= 4)"
              :key="index"
              variant="light-secondary"
              class="mr-25"
            >
              {{ permission.display_name }}
            </b-badge>
          </b-popover>
        </template>
      </template>

      <!-- Column: Action -->
      <template #cell(action)="data">
        <span class="text-nowrap">
          <b-button
            v-ripple.400="'rgba(255, 255, 255, 0.15)'"
            variant="outline-success"
            size="sm"
            class="mr-50"
            :to="{ name: 'SystemManagement-RoleManagementEdit', query: { id: data.row.id } }"
          >
            <feather-icon
              icon="Edit2Icon"
              class="mr-25"
            />
            <span>{{ $t('edit') }}</span>
          </b-button>
          <b-button
            v-ripple.400="'rgba(255, 255, 255, 0.15)'"
            variant="outline-danger"
            size="sm"
            @click="deleteMethod(data.row.id)"
          >
            <feather-icon
              icon="Trash2Icon"
              class="mr-25"
            />
            <span>{{ $t('delete') }}</span>
          </b-button>
        </span>
      </template>
    </PaginationTable>
  </div>
</template>

<script>
import BCardCode from '@core/components/b-card-code/BCardCode.vue'
import {
  BRow, BCol, BPagination, BFormGroup, BFormInput, BFormSelect, BButton, BSpinner,
  BBadge, BPopover,
} from 'bootstrap-vue'
import { VueGoodTable } from 'vue-good-table'
import axios from "@axios";
import Ripple from 'vue-ripple-directive'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'
import PaginationTable from '@/layouts/components/PaginationTable.vue'
import { ref } from '@vue/composition-api';

export default {
  components: {
    BCardCode,
    BRow,
    BCol,
    VueGoodTable,
    BPagination,
    BFormGroup,
    BFormInput,
    BFormSelect,
    BButton,
    ToastificationContent,
    BSpinner,
    BBadge,
    BPopover,
    PaginationTable,
  },
  directives: {
    Ripple,
  },
  setup(_, { root }) {
    const API_PATH = 'roles'

    // loading 動畫
    const showLoading = ref(false)

    // Column
    const tableColumns = [
      { label: '#', field: 'id' },
      { label: 'RoleManagementList.name', field: 'name' },
      { label: '權限', field: 'permissions' },
      { label: 'RoleManagementList.created_by', field: 'creator.name' },
      { label: 'RoleManagementList.created_at', field: 'created_at' },
      { label: 'RoleManagementList.updated_by', field: 'editor.name' },
      { label: 'RoleManagementList.updated_at', field: 'updated_at' },
      { label: 'RoleManagementList.action', field: 'action' },
    ]

    // 總共筆數
    const itemsCount = ref(0)
    const fetchAll = (ctx, callback) => {
      showLoading.value = true

      axios
        .post(`${API_PATH}/list`, ctx)
        .then(response => {
          const { data, meta } = response.data

          callback(data)
          // 總共筆數
          itemsCount.value = meta.total
          // loading 結束
          showLoading.value = false
        })
        .catch(error => {
          console.log(error);
        })
    }

    const deleteMethod = id => {
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
          axios
            .delete(`${API_PATH}/${id}`)
            .then(() => {
              root.$toast({
                component: ToastificationContent,
                position: 'top-right',
                props: {
                  title: `${root.$t('deletedSuccess')}`,
                  icon: 'CoffeeIcon',
                  variant: 'success',
                  text: `${root.$t('Backend Account Management')} ${root.$t('deletedSuccess')}!`,
                },
              })

              root.fetchAll(root.$refs.table.serverParams, data => root.$refs.table.rows = data);
            })
            .catch(error => {
              root.$toast({
                component: ToastificationContent,
                position: 'top-right',
                props: {
                  title: `${root.$t('deletedFailed')}`,
                  icon: 'XIcon',
                  variant: 'danger',
                  text: error.response.data.message,
                },
              })
            })
        }
      })
    }

    return {
      showLoading,
      tableColumns,
      itemsCount,
      fetchAll,

      deleteMethod,
    }
  },
}
</script>
