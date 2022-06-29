<template>
    <div>
        <b-row>
            <b-col cols="12">
                <b-card-code :title="$t('Position Data Setting')">

                    <!-- search input -->
                    <div class="custom-search d-flex justify-content-end">
                        <b-button
                            v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                            variant="outline-primary"
                            v-b-modal.modalForm
                            @click="modalCreateFlag=true;resetModal()"
                            class="mb-2 mr-2"
                        >
                            {{ $t('create')}}
                        </b-button>
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
                            slot="table-column"
                            slot-scope="props"
                        >
                            <span class="text-nowrap" v-if="props.column.label !== '#'">
                                {{$t('PositionList.' + props.column.label) }}
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

                            <span v-else-if="props.column.field === 'status'" class="text-nowrap">
                                <!-- 暫時先放originalIndex 之後改id -->
                                <b-badge
                                    :variant="statusVariant(props.row.status)"
                                    @click="changeValue(props.row.originalIndex, props.row.status)"
                                    style="cursor:pointer"
                                >
                                    {{ $t(props.row.status) }}
                                </b-badge>
                            </span>

                            <span v-else-if="props.column.field === 'remark'" class="text-nowrap">
                                <span>
                                    <b-button
                                        v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                        variant="outline-primary"
                                        size="sm"
                                        @click="showRemark(rows[props.row.originalIndex].remark)"
                                    >
                                        <feather-icon
                                            icon="EyeIcon"
                                        />
                                        <span>{{ $t('detail') }}</span>
                                    </b-button>
                                </span>
                            </span>

                            <!-- Column: Action -->
                            <span v-else-if="props.column.field === 'action'" class="text-nowrap">
                                <span>
                                    <b-button
                                        v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                        variant="outline-success"
                                        size="sm"
                                        @click="modalCreateFlag=false;editModal(props.row.originalIndex)"
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
        <!-- create & edit modal -->
        <b-modal
            id="modalForm"
            cancel-variant="outline-secondary"
            :title="modalCreateFlag ? $t('create') : $t('edit')"
            :cancel-title="$t('back')"
            scrollable
            :ok-title="$t('Submit')"
            @ok.prevent="validationModalForm"
            ref="modalForm"
        >
            <b-form @submit.prevent>
                <validation-observer ref="modalRules">
                    <b-form-group id="positionCode">
                        <label for="positionCode">{{ $t('PositionList.positionCode') }}</label>
                        <validation-provider
                            #default="{ errors }"
                            name="positionCode"
                            rules="required"
                        >
                            <b-form-input
                                v-model="positionCode"
                                type="text"
                                :placeholder="$t('PositionList.positionCode')"
                            />
                            <small class="text-danger">{{ errors[0] }}</small>
                        </validation-provider>
                    </b-form-group>
                    <b-form-group id="positionName">
                        <label for="positionName">{{ $t('PositionList.positionName') }}</label>
                        <validation-provider
                            #default="{ errors }"
                            name="positionName"
                            rules="required"
                        >
                            <b-form-input
                                v-model="positionName"
                                type="text"
                                :placeholder="$t('PositionList.positionName')"
                            />
                            <small class="text-danger">{{ errors[0] }}</small>
                        </validation-provider>
                    </b-form-group>
                    <b-form-group>
                        <label for="remark">{{ $t('remark') }}</label>
                        <b-form-textarea
                            id="remark"
                            :placeholder="$t('remark')"
                            rows="3"
                            v-model="remark"
                            autocomplete="off"
                        />
                    </b-form-group>
                </validation-observer>
            </b-form>
        </b-modal>
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
import {
    BRow, BCol, BBadge, BPagination, BFormGroup, BForm, BFormInput, BFormSelect, BFormTextarea, BButton, BCardText
} from 'bootstrap-vue'
import { VueGoodTable } from 'vue-good-table'
import { ValidationProvider, ValidationObserver } from 'vee-validate'
import { required } from '@validations'
import store from '@/store/index'
import Ripple from 'vue-ripple-directive'

export default {
    components: {
        BCardCode,
        BRow,
        BCol,
        VueGoodTable,
        BBadge,
        BPagination,
        BFormGroup,
        BForm,
        BFormInput,
        BFormSelect,
        BFormTextarea,
        BButton,
        BCardText,
        ValidationProvider,
        ValidationObserver,
    },
    directives: {
        Ripple,
    },
    data() {
        return {
            required,
            pageLength: 5,
            dir: false,
            columns: [
                { label: '#', field: 'index' },
                { label: 'positionCode', field: 'positionCode' },
                { label: 'positionName', field: 'positionName' },
                { label: 'retirementDate', field: 'retirementDate' },
                { label: 'created_by', field: 'created_by' },
                { label: 'created_at', field: 'created_at' },
                { label: 'updated_by', field: 'updated_by' },
                { label: 'updated_at', field: 'updated_at' },
                { label: 'remark', field: 'remark' },
                { label: 'status', field: 'status' },
                { label: 'action', field: 'action' },
            ],
            rows: [
                {
                    id: 1,
                    positionCode: "ABC123",
                    positionName: '主管',
                    retirementDate: '2022/06/30',
                    created_by: 'Dennis',
                    created_at: '2022/06/30',
                    updated_by: 'Dennis',
                    updated_at: '2022/06/30',
                    remark: 'test',
                    status: 'active',
                },
            ],
            searchTerm: '',
            remark: '',
            remarkDetail: '',
            modalCreateFlag: true,
            changeStatus: 'active',
        }
    },
    computed: {
        statusVariant() {
            const statusColor = {
                /* eslint-disable key-spacing */
                active     : 'light-success',
                inactive     : 'light-danger',
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
    methods: {
        validationModalForm() {
            this.$refs.modalRules.validate().then(success => {
                if (success) {
                    this.productDataPush();
                }else {
                    const modalRulesErrors = Object.keys(this.$refs.modalRules.errors);
                    modalRulesErrors.some(element => {
                        if(this.$refs.modalRules.errors[element].length > 0){
                            document.querySelector(`#${element} input`).focus();
                            return true;
                        }
                    });
                }
            })
        },
        resetModal() {
            this.positionCode = '';
            this.positionName = '';
            this.retirementDate = '';
            this.status = 0;
            this.remark = '';
        },
        editModal(key) {
            this.positionCode = this.rows[key].positionCode;
            this.positionName = this.rows[key].positionName;
            this.retirementDate = this.rows[key].retirementDate;
            this.status = this.rows[key].status;
            this.remark = this.rows[key].remark;
            this.$refs['modalForm'].show();
        },
        showRemark(value) {
            this.remarkDetail = value;
            this.$refs['remarkDetail'].show();
        },
        changeValue(editId, status) {
            this.changeStatus = (status == 'active') ? 'inactive' : 'active';
            this.rows[editId].status = this.changeStatus;
        }
    },
}
</script>

<style lang="scss" >
@import '@core/scss/vue/libs/vue-good-table.scss';
</style>