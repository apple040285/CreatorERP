<template>
    <div>
        <b-row>
            <b-col cols="12">
                <b-card-code :title="$t('Customer/Manufacturer Data')">
                    <div class="d-sm-flex justify-content-between align-items-center">
                        <b-button-group class="d-block mb-2">
                            <b-button
                                v-ripple.400="'rgba(113, 102, 240, 0.15)'"
                                variant="outline-primary"
                                @click="onColumnFilter({ columnFilters: { type:'customer' } })"
                            >
                                客戶
                            </b-button>
                            <b-button
                                v-ripple.400="'rgba(113, 102, 240, 0.15)'"
                                variant="outline-primary"
                                @click="onColumnFilter({ columnFilters: { type:'manufacturer' } })"
                            >
                                廠商
                            </b-button>
                        </b-button-group>
                        <!-- search input -->
                        <div class="custom-search d-flex">
                            <!-- Excel 匯入 匯出 -->
                            <ExcelAction
                              name="customers"
                              import-url="/customer-manufacturers/import"
                              export-url="/customer-manufacturers/export"
                            >
                              <template #default="{ exportExcel, importExcel }">
                                <b-dropdown-divider @click="importExcel"/>

                                <b-dropdown-item disabled>客製化功能</b-dropdown-item>

                                <b-dropdown-group id="dropdown-group-2">
                                  <b-dropdown-item @click.stop.prevent="exportExcel('/customer-manufacturers-address/export', 'customer-manufacturers-address.xls')">
                                    Excel 上傳地址範例下載
                                  </b-dropdown-item>
                                </b-dropdown-group>

                                <input
                                  ref="refInputElAddress"
                                  type="file"
                                  accept=".xls"
                                  class="d-none"
                                  @change="importExcel($event, '/customer-manufacturers-address/import', $refs.refInputElAddress)"
                                >
                                <b-dropdown-item @click="$refs.refInputElAddress.click()">
                                  Excel 上傳地址匯入
                                </b-dropdown-item>
                              </template>

                            </ExcelAction>

                            <b-button
                                v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                variant="outline-primary"
                                class="mb-2 mr-2 text-nowrap"
                                :to="{ name: 'CustomerManufacturerData-CustomerManufacturerDataCreate' }"
                            >
                                {{ $t('create')}}
                            </b-button>
                            <b-form-group>
                                <div class="d-flex align-items-center">
                                    <b-form-input
                                        v-model="serverParams.searchTerm"
                                        :placeholder="$t('table.Search')"
                                        type="text"
                                        class="d-inline-block"
                                    />
                                </div>
                            </b-form-group>
                        </div>
                    </div>

                    <!-- table -->
                    <vue-good-table
                        mode="remote"
                        @on-page-change="onPageChange"
                        @on-sort-change="onSortChange"
                        @on-per-page-change="onPerPageChange"
                        @on-column-filter="onColumnFilter"
                        :totalRows="totalRecords"
                        :isLoading.sync="isLoading"
                        :pagination-options="{
                            enabled: true,
                        }"
                        :search-options="{
                            enabled: true,
                            externalQuery: serverParams.searchTerm
                        }"
                        @on-search="onSearch"
                        :sort-options="{
                            enabled: true,
                        }"
                        :rows="rows"
                        :columns="columns"
                    >
                        <template #loadingContent>
                            <div class="text-center">
                                <b-spinner variant="primary" label="Text Centered" />
                            </div>
                        </template>
                        <template
                            slot="table-column"
                            slot-scope="props"
                        >
                            <span class="text-nowrap" v-if="props.column.label !== '#'">
                                {{ $t('CustomerManufacturerList.' + props.column.label) }}
                            </span>
                        </template>
                        <template
                            slot="table-row"
                            slot-scope="props"
                        >
                            <!-- Column: index -->
                            <span v-if="props.column.field === 'index'" class="text-nowrap">
                                {{ props.row.originalIndex + 1 }}
                            </span>

                            <span v-else-if="props.column.field === 'type'" class="text-nowrap">
                                {{ $t('CustomerManufacturerList.'+props.row.type) }}
                            </span>

                            <span v-else-if="props.column.field === 'status'" class="text-nowrap">
                                <b-badge
                                    :variant="statusVariant(props.row.status)"
                                    @click="updateStatus(props.row.id, props.row.status)"
                                    style="cursor:pointer"
                                >
                                    {{ $t(props.row.status) }}
                                </b-badge>
                            </span>

                            <!-- Column: Action -->
                            <span v-else-if="props.column.field === 'action'" class="text-nowrap">
                                <span>
                                    <b-button
                                        v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                        variant="outline-primary"
                                        size="sm"
                                        :to="{ name: 'CustomerManufacturerData-CustomerManufacturerDataDetail', query: { id: props.row.id } }"
                                        class="mr-1"
                                    >
                                        <feather-icon
                                            icon="FilePlusIcon"
                                        />
                                        <span>{{ $t('detail') }}</span>
                                    </b-button>
                                    <b-button
                                        v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                        variant="outline-success"
                                        size="sm"
                                        class="mr-50"
                                        :to="{ name: 'CustomerManufacturerData-CustomerManufacturerDataEdit', query: { id: props.row.id } }"
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
                                        @click="deleteMethod(props.row.id)"
                                    >
                                        <feather-icon
                                            icon="Trash2Icon"
                                            class="mr-25"
                                        />
                                        <span>{{ $t('delete') }}</span>
                                    </b-button>
                                </span>
                            </span>

                            <!-- Column: Common -->
                            <span v-else class="text-nowrap">
                                {{ props.formattedRow[props.column.field] }}
                            </span>
                        </template>

                        <!-- pagination -->
                        <template
                            slot="pagination-bottom"
                            slot-scope="props"
                        >
                            <div class="d-flex justify-content-between flex-wrap">
                                <div class="d-flex align-items-center mb-0 mt-1">
                                    <span class="text-nowrap ">
                                        {{ $t('table.Showing') }} 1 {{ $t('table.to') }}
                                    </span>
                                    <b-form-select
                                        v-model="serverParams.perPage"
                                        :options="['5','10']"
                                        class="mx-1"
                                        @input="(value)=>props.perPageChanged({currentPerPage:value})"
                                    />
                                    <span class="text-nowrap"> {{ $t('table.of') }} {{ props.total }} {{ $t('table.entries') }} </span>
                                </div>
                                <div>
                                    <b-pagination
                                        :value="1"
                                        :total-rows="props.total"
                                        :per-page="serverParams.perPage"
                                        first-number
                                        last-number
                                        align="right"
                                        prev-class="prev-item"
                                        next-class="next-item"
                                        class="mt-1 mb-0"
                                        @input="(value)=>props.pageChanged({currentPage:value})"
                                    >
                                        <template #prev-text>
                                            <feather-icon
                                                icon="ChevronLeftIcon"
                                                size="18"
                                            />
                                        </template>
                                        <template #next-text>
                                            <feather-icon
                                                icon="ChevronRightIcon"
                                                size="18"
                                            />
                                        </template>
                                    </b-pagination>
                                </div>
                            </div>
                        </template>
                    </vue-good-table>
                </b-card-code>
            </b-col>
        </b-row>
    </div>
</template>

<script>
import BCardCode from '@core/components/b-card-code/BCardCode.vue'
import {
    BRow, BCol, BBadge, BPagination, BFormGroup, BForm, BFormInput, BFormSelect, BButton, BButtonGroup, BSpinner,
    BDropdownDivider, BDropdownItem, BDropdownGroup,
} from 'bootstrap-vue'
import { VueGoodTable } from 'vue-good-table'
import Ripple from 'vue-ripple-directive'
import axios from "@axios";
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'
import ExcelAction from '@/layouts/components/ExcelAction.vue'

export default {
    components: {
        BCardCode,
        BRow,
        BCol,
        BBadge,
        VueGoodTable,
        BPagination,
        BFormGroup,
        BForm,
        BFormInput,
        BFormSelect,
        BButton,
        BButtonGroup,
        ToastificationContent,
        BSpinner,

        BDropdownDivider,
        BDropdownItem,
        BDropdownGroup,

        ExcelAction,
    },
    directives: {
        Ripple,
    },
    data() {
        return {
            apiPath: '/customer-manufacturers',
            columns: [
                { label: '#', field: 'id' },
                { label: 'code', field: 'code' },
                { label: 'fullName', field: 'full_name' },
                { label: 'shortName', field: 'short_name' },
                { label: 'category', field: 'type' },
                { label: 'contactPersonOne', field: 'contact_person_one' },
                { label: 'phoneOne', field: 'phone_one' },
                { label: 'status', field: 'status' },
                { label: 'action', field: 'action' },
            ],
            rows: [],
            isLoading: false,
            totalRecords: 0,
            serverParams: {
                sort: [
                    {
                        field: '',
                        type: ''
                    }
                ],
                page: 1,
                perPage: 10,
                searchTerm: '',
            }
        }
    },
    computed: {
        statusVariant() {
            const statusColor = {
                /* eslint-disable key-spacing */
                active     : 'light-success',
                disable     : 'light-danger',
                /* eslint-enable key-spacing */
            }

            return status => statusColor[status]
        },
    },
    methods: {
        onSearch({searchTerm}) {
            this.serverParams.searchTerm = searchTerm
            this.getList()
        },
        updateParams(newProps) {
            this.serverParams = Object.assign({}, this.serverParams, newProps);
        },
        onPageChange(params) {
            this.updateParams({page: params.currentPage});
            this.getList();
        },
        onPerPageChange(params) {
            this.updateParams({perPage: params.currentPerPage});
            this.getList();
        },
        onColumnFilter(params) {
          this.updateParams(params);
          this.getList();
        },
        onSortChange(params) {
            this.updateParams({
                sort: params,
            });
            this.getList();
        },
        getList() {
            axios
            .post(`${this.apiPath}/list`, this.serverParams)
            .then(response => {
                const { data, meta } = response.data
                this.rows = data;
                this.totalRecords = meta.total;
            })
            .catch(error => console.error (error))
        },
        deleteMethod(id) {
            this.$swal({
                title: `${this.$t('checkDelete')}`,
                text: `${this.$t('cantRevert')}`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: `${this.$t('yes')}`,
                cancelButtonText: `${this.$t('no')}`,
                customClass: {
                    confirmButton: 'btn btn-primary',
                    cancelButton: 'btn btn-outline-danger ml-1',
                },
                buttonsStyling: false,
            }).then(result => {
                if (result.value) {
                    axios
                    .delete(`${this.apiPath}/${id}`)
                    .then(() => {
                        this.getList();
                        this.$toast({
                            component: ToastificationContent,
                            position: 'top-right',
                            props: {
                            title: `${this.$t('deletedSuccess')}`,
                            icon: 'CoffeeIcon',
                            variant: 'success',
                            text: `${this.$t('Customer/Manufacturer Data')} ${this.$t('deletedSuccess')}!`,
                            },
                        })
                    })
                    .catch(error => {
                        this.$toast({
                            component: ToastificationContent,
                            position: 'top-right',
                            props: {
                            title: `${this.$t('deletedFailed')}`,
                            icon: 'XIcon',
                            variant: 'danger',
                            text: error.response.data.message,
                            },
                        })
                    })
                }
            })
        },
        updateStatus(id, oldStatus) {
            this.status = (oldStatus == 'active') ? 'disable' : 'active';
            axios
            .post(`${this.apiPath}/${id}/status`, { status : this.status })
            .then(() => {
                this.getList();
                this.$toast({
                    component: ToastificationContent,
                    position: 'top-right',
                    props: {
                    title: `${this.$t('updatedSuccess')}`,
                    icon: 'CoffeeIcon',
                    variant: 'success',
                    text: `${this.$t('Customer/Manufacturer Data')} ${this.$t('updatedSuccess')}!`,
                    },
                })
            })
            .catch(error => {
                this.$toast({
                    component: ToastificationContent,
                    position: 'top-right',
                    props: {
                    title: `${this.$t('updatedFailed')}`,
                    icon: 'XIcon',
                    variant: 'danger',
                    text: error.response.data.message,
                    },
                })
            })
        },
    },
    created() {
        this.getList();
    },
}
</script>

<style lang="scss" >
@import '@core/scss/vue/libs/vue-good-table.scss';
</style>
