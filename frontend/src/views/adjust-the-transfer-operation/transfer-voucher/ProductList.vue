<template>
    <div>
        <b-row>
            <b-col cols="12">
                <b-card-code :title="$t('TransferVoucherModal.productInformation')">

                    <!-- search input -->
                    <div class="custom-search d-flex justify-content-end">
                        <b-form-group>
                            <div class="d-flex align-items-center">
                                <b-form-input
                                    v-model="productList.searchTerm"
                                    :placeholder="$t('table.Search')"
                                    type="text"
                                    class="d-inline-block"
                                />
                            </div>
                        </b-form-group>
                    </div>
                    <vue-good-table
                        :columns="productList.columns"
                        :rows="productList.rows"
                        :search-options="{
                            enabled: true,
                            externalQuery: productList.searchTerm
                        }"
                        :pagination-options="{
                            enabled: true,
                            perPage:productList.pageLength
                        }"
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
                                {{$t('TransferVoucherList.ProductList.' + props.column.label) }}
                            </span>
                        </template>
                        <template
                            slot="table-row"
                            slot-scope="props"
                        >
                            <!-- Column: index -->
                            <span v-if="props.column.field === 'id'" class="text-nowrap">
                                {{ props.row.originalIndex + 1 }}
                            </span>

                            <!-- <span v-if="props.column.field === 'untransferredQuantity'" class="text-nowrap">
                                {{ props.row.current_quantity + props.row.quantity }}
                            </span> -->

                            <span v-else-if="props.column.field === 'remark'" class="text-nowrap">
                                <span>
                                    <b-button
                                        v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                        variant="outline-primary"
                                        size="sm"
                                        @click="showRemark(productList.rows[props.row.originalIndex].remark)"
                                    >
                                        <feather-icon
                                            icon="EyeIcon"
                                        />
                                        <span>{{ $t('detail') }}</span>
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
                                        v-model="productList.pageLength"
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
                                        :per-page="productList.pageLength"
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
        <!-- remark modal -->
        <b-modal
            :title="$t('remark')"
            ok-only
            :ok-title="$t('back')"
            ref="remarkDetail"
            ok-variant="secondary"
            scrollable
        >
            <b-card-text>
                {{ remarkDetail }}
            </b-card-text>
        </b-modal>
    </div>
</template>

<script>
import BCardCode from '@core/components/b-card-code/BCardCode.vue'
import { BRow, BCol, BBadge, BPagination, BFormGroup, BForm, BFormInput, BFormSelect, BButton, BSpinner } from 'bootstrap-vue'
import { VueGoodTable } from 'vue-good-table'
import Ripple from 'vue-ripple-directive'
import { heightFade } from '@core/directives/animations'

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
        BSpinner
    },
    directives: {
        Ripple,
        'height-fade': heightFade,
    },
    props: {
        productList: {
            type: Object,
            default: () => {},
        },
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
    },
    data() {
        return {
            remarkDetail: ''
        }
    },
    methods: {
        showRemark(value) {
            this.remarkDetail = value;
            this.$refs['remarkDetail'].show();
        }
    },
}
</script>
