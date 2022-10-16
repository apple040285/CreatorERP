<template>
    <b-row>
        <b-col cols="12">
            <b-card-code :title="$t('Returned Sales Invoice')">
                <!-- search input -->
                <div class="custom-search d-md-flex justify-content-between">
                    <div class="d-flex">
                      <b-form-group
                            label-for="startDate-datepicker"
                            id="startDate"
                            class="mr-2"
                        >
                          <flat-pickr
                              class="form-control"
                              id="startDate-datepicker"
                              :placeholder="$t('table.start_date')"
                              :config="{ mode: 'range'}"
                              value=""
                              @on-close="(selectedDates, dateStr, instance) => updateParams({ columnFilters: { sales_date: dateStr } })"
                          />
                        </b-form-group>
                        <b-button
                            v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                            variant="outline-primary"
                            class="mb-2 mr-2 text-nowrap"
                            @click="getList"
                        >
                            {{ $t('table.Search')}}
                        </b-button>

                        <!-- Excel 匯出 -->
                        <ExcelExportAction
                          name="sales-return-orders"
                          import-url="/sales-return-orders/import"
                          export-url="/sales-return-orders/export"
                          :params="serverParams"
                        />
                    </div>
                    <div class="d-flex">
                        <b-button
                            v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                            variant="outline-primary"
                            :to="{ name: 'SalesOperation-ReturnedSalesInvoiceCreate' }"
                            class="mb-2 mr-2 text-nowrap"
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
                            {{$t('ReturnedSalesInvoiceList.' + props.column.label) }}
                        </span>
                    </template>
                    <template
                        slot="table-row"
                        slot-scope="props"
                    >
                        <!-- Column: id -->
                        <span v-if="props.column.field === 'id'" class="text-nowrap">
                            {{ props.row.originalIndex + 1 }}
                        </span>
                        <!-- Column: Status -->
                        <span v-else-if="props.column.field === 'approvalStatus'" class="text-nowrap">
                            <b-badge :variant="statusVariant(props.row.approvalStatus)">
                                {{ $t('ReturnedSalesInvoiceList.' + props.row.approvalStatus) }}
                            </b-badge>
                        </span>

                        <span v-else-if="props.column.field === 'status'" class="text-nowrap">
                            <b-badge :variant="statusVariant(props.row.status)">
                                {{ $t('ReturnedSalesInvoiceList.' + props.row.status) }}
                            </b-badge>
                        </span>

                        <!-- Column: Action -->
                        <span v-else-if="props.column.field === 'action'" class="text-nowrap">
                            <span>
                                <b-button
                                    v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                    variant="outline-primary"
                                    size="sm"
                                    :to="{ name: 'SalesOperation-ReturnedSalesInvoiceDetail', query: { id: props.row.id } }"
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
                                    v-if="props.row.approvalStatus=='underReview'"
                                    :to="{ name: 'SalesOperation-ReturnedSalesInvoiceEdit', query: { id: props.row.id } }"
                                >
                                    <feather-icon
                                        icon="Edit2Icon"
                                    />
                                    <span>{{ $t('edit') }}</span>
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
</template>

<script>
import BCardCode from '@core/components/b-card-code/BCardCode.vue'
import flatPickr from 'vue-flatpickr-component'
import {
    BRow, BCol, BBadge, BPagination, BFormGroup, BFormInput, BFormSelect, BButton, BSpinner
} from 'bootstrap-vue'
import { VueGoodTable } from 'vue-good-table'
import Ripple from 'vue-ripple-directive'
import axios from "@axios";
import ExcelExportAction from '@/layouts/components/ExcelExportAction.vue'

export default {
    components: {
        BCardCode,
        BRow,
        BCol,
        VueGoodTable,
        BBadge,
        BPagination,
        BFormGroup,
        BFormInput,
        BFormSelect,
        BButton,
        BSpinner,
        flatPickr,
        ExcelExportAction,
    },
    directives: {
        Ripple,
    },
    data() {
        return {
            apiPath: '/sales-return-orders',
            columns: [
                { label: '#', field: 'id' },
                { label: 'returnedDate', field: 'sales_date' },
                { label: 'returnedNo', field: 'sales_order_no' },
                { label: 'customer', field: 'customer_manufacturer.full_name' },
                { label: 'originalSalesNo', field: 'originalSalesNo' },
                { label: 'businessPeople', field: 'staff.name' },
                { label: 'project', field: 'project' },
                { label: 'status', field: 'status' },
                { label: 'approvalStatus', field: 'status_approval' },
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
                audited : 'light-success',
                underReview     : 'light-warning',
                void     : 'light-danger',
                caseClosed     : 'light-success',
                openCase     : 'light-warning',
                invalid     : 'light-secondary',
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
    },
    created() {
        this.getList();
    },
}
</script>

<style lang="scss" >
@import '@core/scss/vue/libs/vue-good-table.scss';
@import '@core/scss/vue/libs/vue-flatpicker.scss';
</style>
