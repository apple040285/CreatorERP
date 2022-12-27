<template>
    <b-row>
        <b-col cols="12">
            <b-card-code :title="$t('Purchase Voucher')">

                <!-- search input -->
                <div class="custom-search d-flex justify-content-end">
                    <b-button
                        v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                        variant="outline-primary"
                        :to="{ name: 'PurchaseOperation-PurchaseVoucherCreate' }"
                        class="mb-2 mr-2"
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

                <!-- table -->
                    <vue-good-table
                        mode="remote"
                        @on-page-change="onPageChange"
                        @on-sort-change="onSortChange"
                        @on-per-page-change="onPerPageChange"
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
                            {{$t('PurchaseVoucherList.' + props.column.label) }}
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
                                {{ $t('PurchaseVoucherList.' + props.row.approvalStatus) }}
                            </b-badge>
                        </span>

                        <span v-else-if="props.column.field === 'status'" class="text-nowrap">
                            <b-badge :variant="statusVariant(props.row.status)">
                                {{ $t('PurchaseVoucherList.' + props.row.status) }}
                            </b-badge>
                        </span>

                        <!-- Column: Action -->
                        <span v-else-if="props.column.field === 'action'" class="text-nowrap">
                            <span>
                                <b-button
                                    v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                    variant="outline-primary"
                                    size="sm"
                                    :to="{ name: 'PurchaseOperation-PurchaseVoucherDetail', query: { id: props.row.id } }"
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
                                    :to="{ name: 'PurchaseOperation-PurchaseVoucherEdit', query: { id: props.row.id } }"
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
import {
    BRow, BCol, BBadge, BPagination, BFormGroup, BFormInput, BFormSelect, BButton, BSpinner
} from 'bootstrap-vue'
import { VueGoodTable } from 'vue-good-table'
import Ripple from 'vue-ripple-directive'
import axios from "@axios";

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
        BSpinner
    },
    directives: {
        Ripple,
    },
    data() {
        return {
            apiPath: '/purchaseVoucher',
            columns: [
                { label: '#', field: 'id' },
                { label: 'purchaseDate', field: 'purchaseDate' },
                { label: 'purchaseNo', field: 'purchaseNo' },
                { label: 'manufacturer', field: 'manufacturer' },
                { label: 'purchaseStaff', field: 'purchaseStaff' },
                { label: 'invoice', field: 'invoice' },
                { label: 'preDeliveryDate', field: 'preDeliveryDate' },
                { label: 'project', field: 'project' },
                { label: 'status', field: 'status' },
                { label: 'approvalStatus', field: 'approvalStatus' },
                { label: 'action', field: 'action' },
            ],
            rows: [
                {
                    id: 1,
                    purchaseDate: "2022/06/22",
                    purchaseNo: '20220622001',
                    manufacturer: '廠商A',
                    purchaseStaff: 'dennis',
                    invoice: 'tees',
                    preDeliveryDate: '2022/06/30',
                    project: 'ABC123',
                    status: 'openCase',
                    approvalStatus: 'void',
                },
                {
                    id: 2,
                    purchaseDate: "2022/06/22",
                    purchaseNo: '20220622001',
                    manufacturer: '廠商A',
                    purchaseStaff: 'dennis',
                    invoice: 'tees',
                    preDeliveryDate: '2022/06/30',
                    project: 'ABC123',
                    status: 'openCase',
                    approvalStatus: 'underReview',
                },
                {
                    id: 3,
                    purchaseDate: "2022/06/22",
                    purchaseNo: '20220622001',
                    manufacturer: '廠商A',
                    purchaseStaff: 'dennis',
                    invoice: 'tees',
                    preDeliveryDate: '2022/06/30',
                    project: 'ABC123',
                    status: 'invalid',
                    approvalStatus: 'audited',
                },
                {
                    id: 4,
                    purchaseDate: "2022/06/22",
                    purchaseNo: '20220622001',
                    manufacturer: '廠商A',
                    purchaseStaff: 'dennis',
                    invoice: 'tees',
                    preDeliveryDate: '2022/06/30',
                    project: 'ABC123',
                    status: 'caseClosed',
                    approvalStatus: 'audited',
                },
                {
                    id: 5,
                    purchaseDate: "2022/06/22",
                    purchaseNo: '20220622001',
                    manufacturer: '廠商A',
                    purchaseStaff: 'dennis',
                    invoice: 'tees',
                    preDeliveryDate: '2022/06/30',
                    project: 'ABC123',
                    status: 'caseClosed',
                    approvalStatus: 'audited',
                },
                {
                    id: 6,
                    purchaseDate: "2022/06/22",
                    purchaseNo: '20220622001',
                    manufacturer: '廠商A',
                    purchaseStaff: 'dennis',
                    invoice: 'tees',
                    preDeliveryDate: '2022/06/30',
                    project: 'ABC123',
                    status: 'invalid',
                    approvalStatus: 'audited',
                },
            ],
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
</style>