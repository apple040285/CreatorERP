<template>
    <b-row>
        <b-col cols="12">
            <b-card-code>

                <div class="d-flex justify-content-start">
                    <b-button
                        v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                        variant="outline-primary"
                        to="#"
                    >
                        {{ $t('create')}}
                    </b-button>
                </div>

                <!-- search input -->
                <div class="custom-search d-flex justify-content-end">
                    <b-form-group>
                        <div class="d-flex align-items-center">
                            <b-form-input
                                v-model="searchTerm"
                                :placeholder="$t('table.Search')"
                                type="text"
                                class="d-inline-block"
                            />
                        </div>
                    </b-form-group>
                </div>

                <!-- table -->
                <vue-good-table
                    :columns="columns"
                    :rows="rows"
                    :rtl="direction"
                    :search-options="{
                        enabled: true,
                        externalQuery: searchTerm
                    }"
                    :pagination-options="{
                        enabled: true,
                        perPage:pageLength
                    }"
                >
                    <template
                        slot="table-row"
                        slot-scope="props"
                    >
                        <!-- Column: Status -->
                        <span v-if="props.column.field === 'approvalStatus'">
                            <b-badge :variant="statusVariant(props.row.approvalStatus)">
                                {{ $t('RequisitionList.'+props.row.approvalStatus) }}
                            </b-badge>
                        </span>

                        <span v-else-if="props.column.field === 'status'">
                            <b-badge :variant="statusVariant(props.row.status)">
                                {{ $t('RequisitionList.'+props.row.status) }}
                            </b-badge>
                        </span>

                        <!-- Column: Action -->
                        <span v-else-if="props.column.field === 'action'">
                            <span>
                                <b-button
                                    v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                    variant="outline-primary"
                                    size="sm"
                                    to="#"
                                >
                                    <feather-icon
                                        icon="Edit2Icon"
                                    />
                                    <span>{{ $t('detail') }}</span>
                                </b-button>
                                <b-button
                                    v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                    variant="outline-danger"
                                    size="sm"
                                    to="#"
                                >
                                    <feather-icon
                                        icon="TrashIcon"
                                    />
                                    <span>{{ $t('invalid') }}</span>
                                </b-button>
                            </span>
                        </span>

                        <!-- Column: Common -->
                        <span v-else>
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
                                    v-model="pageLength"
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
                                    :per-page="pageLength"
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
    BRow, BCol, BBadge, BPagination, BFormGroup, BFormInput, BFormSelect, BButton
} from 'bootstrap-vue'
import { VueGoodTable } from 'vue-good-table'
import store from '@/store/index'
import i18n from '@/libs/i18n'

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
        BButton
    },
    data() {
        return {
        pageLength: 5,
        dir: false,
        columns: [
            {
            label: i18n.t('RequisitionList.requisitionDate'),
            field: 'requisitionDate',
            },
            {
            label: i18n.t('RequisitionList.requisitionNo'),
            field: 'requisitionNo',
            },
            {
            label: i18n.t('RequisitionList.manufacturer'),
            field: 'manufacturer',
            },
            {
            label: i18n.t('RequisitionList.buyer'),
            field: 'buyer',
            },
            {
            label: i18n.t('RequisitionList.preDeliveryDate'),
            field: 'preDeliveryDate',
            },
            {
            label: i18n.t('RequisitionList.projectNo'),
            field: 'projectNo',
            },
            {
            label: i18n.t('RequisitionList.status'),
            field: 'status',
            },
            {
            label: i18n.t('RequisitionList.approvalStatus'),
            field: 'approvalStatus',
            },
            {
            label: i18n.t('action'),
            field: 'action',
            },
        ],
        rows: [
            {
            id: 1,
            requisitionDate: "2022/06/22",
            requisitionNo: '20220622001',
            manufacturer: '廠商A',
            buyer: 'dennis',
            preDeliveryDate: '2022/06/30',
            projectNo: 'ABC123',
            status: 'openCase',
            approvalStatus: 'void',
            },
            {
            id: 2,
            requisitionDate: "2022/06/22",
            requisitionNo: '20220622001',
            manufacturer: '廠商A',
            buyer: 'dennis',
            preDeliveryDate: '2022/06/30',
            projectNo: 'ABC123',
            status: 'openCase',
            approvalStatus: 'underReview',
            },
            {
            id: 3,
            requisitionDate: "2022/06/22",
            requisitionNo: '20220622001',
            manufacturer: '廠商A',
            buyer: 'dennis',
            preDeliveryDate: '2022/06/30',
            projectNo: 'ABC123',
            status: 'invalid',
            approvalStatus: 'audited',
            },
            {
            id: 4,
            requisitionDate: "2022/06/22",
            requisitionNo: '20220622001',
            manufacturer: '廠商A',
            buyer: 'dennis',
            preDeliveryDate: '2022/06/30',
            projectNo: 'ABC123',
            status: 'caseClosed',
            approvalStatus: 'audited',
            },
            {
            id: 5,
            requisitionDate: "2022/06/22",
            requisitionNo: '20220622001',
            manufacturer: '廠商A',
            buyer: 'dennis',
            preDeliveryDate: '2022/06/30',
            projectNo: 'ABC123',
            status: 'caseClosed',
            approvalStatus: 'draft',
            },
            {
            id: 6,
            requisitionDate: "2022/06/22",
            requisitionNo: '20220622001',
            manufacturer: '廠商A',
            buyer: 'dennis',
            preDeliveryDate: '2022/06/30',
            projectNo: 'ABC123',
            status: 'invalid',
            approvalStatus: 'audited',
            },
        ],
        searchTerm: '',
        }
    },
    computed: {
        statusVariant() {
        const statusColor = {
            /* eslint-disable key-spacing */
            audited : 'light-success',
            draft     : 'light-primary',
            underReview     : 'light-warning',
            void     : 'light-danger',
            caseClosed     : 'light-success',
            openCase     : 'light-warning',
            invalid     : 'light-secondary',
            /* eslint-enable key-spacing */
        }

        return status => statusColor[status]
        },
        direction() {
        if (store.state.appConfig.isRTL) {
            // eslint-disable-next-line vue/no-side-effects-in-computed-properties
            this.dir = true
            return this.dir
        }
        // eslint-disable-next-line vue/no-side-effects-in-computed-properties
        this.dir = false
        return this.dir
        },
    },
}
</script>

<style lang="scss" >
@import '@core/scss/vue/libs/vue-good-table.scss';
</style>