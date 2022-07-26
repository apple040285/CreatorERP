<template>
    <div>
        <b-row>
            <b-col cols="12">
                <b-card-code :title="$t('ProductModal.warehouseInformation')">

                    <!-- search input -->
                    <div class="custom-search d-flex justify-content-end">
                        <b-form-group>
                            <div class="d-flex align-items-center">
                                <b-form-input
                                    v-model="storehouseList.searchTerm"
                                    :placeholder="$t('table.Search')"
                                    type="text"
                                    class="d-inline-block"
                                />
                            </div>
                        </b-form-group>
                    </div>

                    <!-- table -->
                    <vue-good-table
                        :columns="storehouseList.columns"
                        :rows="storehouseList.rows"
                        :search-options="{
                            enabled: true,
                            externalQuery: storehouseList.searchTerm
                        }"
                        :pagination-options="{
                            enabled: true,
                            perPage:storehouseList.pageLength
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
                                {{$t('ProductList.' + props.column.label) }}
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

                            <span v-else-if="props.column.field === 'status'" class="text-nowrap">
                                <b-badge
                                    :variant="statusVariant(props.row.status)"
                                >
                                    {{ $t(props.row.status) }}
                                </b-badge>
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
                                        v-model="storehouseList.pageLength"
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
                                        :per-page="storehouseList.pageLength"
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
    BRow, BCol, BBadge, BPagination, BFormGroup, BForm, BFormInput, BFormSelect, BButton, BSpinner
} from 'bootstrap-vue'
import { VueGoodTable } from 'vue-good-table'
import Ripple from 'vue-ripple-directive'

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
    },
    props: {
        storehouseList: {
            type: Object,
            default: () => {},
        },
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
}
</script>

<style lang="scss" >
@import '@core/scss/vue/libs/vue-good-table.scss';
</style>