<template>
    <div>
        <b-row>
            <b-col cols="12">
                <b-card-code :title="$t('Adjustment Category')">

                    <!-- search input -->
                    <div class="custom-search d-flex justify-content-end">
                        <b-button
                            v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                            variant="outline-primary"
                            v-b-modal.modalForm
                            @click="resetModal()"
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
                                {{ $t('AdjustmentCategoryList.' + props.column.label) }}
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

                            <span v-else-if="props.column.field === 'remark'" class="text-nowrap">
                                <span>
                                    <b-button
                                        v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                        variant="outline-primary"
                                        size="sm"
                                        @click="showRemark(props.row.remark)"
                                    >
                                        <feather-icon
                                            icon="EyeIcon"
                                            class="mr-25"
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
                                        class="mr-50"
                                        @click="editMethod(props.row.id)"
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
        <!-- create & edit modal -->
        <b-modal
            id="modalForm"
            cancel-variant="outline-secondary"
            :title="showData.id ? $t('edit') : $t('create')"
            :cancel-title="$t('back')"
            :ok-title="$t('Submit')"
            @ok.prevent="validationModalForm"
            ref="modalForm"
            no-close-on-backdrop
        >
            <b-form @submit.prevent>
                <validation-observer ref="modalRules">
                    <b-form-group id="categoryCode">
                        <label for="categoryCode">{{ $t('AdjustmentCategoryList.code') }}</label>
                        <validation-provider
                            #default="{ errors }"
                            name="categoryCode"
                            rules="required"
                        >
                            <b-form-input
                                v-model="showData.categoryCode"
                                type="text"
                                :placeholder="$t('AdjustmentCategoryList.code')"
                                :state="errors.length > 0 ? false:null"
                            />
                            <small class="text-danger">{{ errors[0] }}</small>
                        </validation-provider>
                    </b-form-group>
                    <b-form-group id="categoryName">
                        <label for="categoryName">{{ $t('AdjustmentCategoryList.name') }}</label>
                        <validation-provider
                            #default="{ errors }"
                            name="categoryName"
                            rules="required"
                        >
                            <b-form-input
                                v-model="showData.name"
                                type="text"
                                :placeholder="$t('AdjustmentCategoryList.name')"
                                :state="errors.length > 0 ? false:null"
                            />
                            <small class="text-danger">{{ errors[0] }}</small>
                        </validation-provider>
                    </b-form-group>
                    <b-form-group id="adjustmentMethod">
                        <label for="adjustmentMethod">{{ $t('AdjustmentCategoryList.adjustmentMethod') }}</label>
                        <validation-provider
                            #default="{ errors }"
                            name="adjustmentMethod"
                            rules="required"
                        >
                            <v-select
                                label="label"
                                v-model="showData.adjustmentMethod"
                                :options="adjustmentMethodOption"
                                :placeholder="$t('AdjustmentCategoryList.selectAdjustmentMethod')"
                                :reduce="option => option.value"
                            >
                                <template v-slot:option="{ label }">
                                {{ $t('AdjustmentCategoryList.'+label) }}
                                </template>
                                <template #selected-option="{ label }">
                                    {{ $t('AdjustmentCategoryList.'+label) }}
                                </template>
                            </v-select>
                            <small class="text-danger">{{ errors[0] }}</small>
                        </validation-provider>
                    </b-form-group>
                    <b-form-group id="accountingSubjects">
                        <label for="accountingSubjects">{{ $t('AdjustmentCategoryList.accountingSubjects') }}</label>
                        <validation-provider
                            #default="{ errors }"
                            name="accountingSubjects"
                            rules="required"
                        >
                            <b-form-input
                                v-model="showData.accountingSubjects"
                                type="text"
                                :placeholder="$t('AdjustmentCategoryList.accountingSubjects')"
                                :state="errors.length > 0 ? false:null"
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
                            v-model="showData.remark"
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
            ref="remark"
            ok-variant="secondary"
            scrollable
        >
            <b-card-text>
                {{ showData.remark }}
            </b-card-text>
        </b-modal>
    </div>
</template>

<script>
import BCardCode from '@core/components/b-card-code/BCardCode.vue'
import {
    BRow, BCol, BPagination, BFormGroup, BForm, BFormInput, BFormSelect, BFormSelectOption, BButton, BCardText, BSpinner
} from 'bootstrap-vue'
import vSelect from 'vue-select'
import { VueGoodTable } from 'vue-good-table'
import axios from "@axios";
import { ValidationProvider, ValidationObserver } from 'vee-validate'
import { required } from '@validations'
import Ripple from 'vue-ripple-directive'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'

export default {
    components: {
        BCardCode,
        BRow,
        BCol,
        VueGoodTable,
        BPagination,
        BFormGroup,
        BForm,
        BFormInput,
        BFormSelect,
        BFormSelectOption,
        vSelect,
        BButton,
        BCardText,
        ValidationProvider,
        ValidationObserver,
        ToastificationContent,
        BSpinner
    },
    directives: {
        Ripple,
    },
    data() {
        return {
            apiPath: '/adjustCategory',
            required,
            columns: [
                { label: '#', field: 'id' },
                { label: 'code', field: 'code' },
                { label: 'name', field: 'name' },
                { label: 'adjustmentMethod', field: 'adjustmentMethod' },
                { label: 'accountingSubjects', field: 'accountingSubjects' },
                { label: 'remark', field: 'remark' },
                { label: 'action', field: 'action' },
            ],
            rows: [],
            showData: {},
            defaultData: {
                id: null,
                code: '',
                name: '',
                adjustmentMethod: '',
                accountingSubjects: '',
                remark: '',
            },
            adjustmentMethodOption: [
                {label: 'justAdjustTheQuantity', value: 'justAdjustTheQuantity'},
                {label: 'justAdjustTheCost', value: 'justAdjustTheCost'},
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
        validationModalForm() {
            this.$refs.modalRules.validate().then(success => {
                if (success) {
                    if(this.showData.id) {
                        this.updateMethod();
                    }else {
                        this.createMethod();
                    }
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
            this.showData = Object.assign({}, this.showData, this.defaultData)
        },
        showRemark(value) {
            this.showData.remark = value;
            this.$refs['remark'].show();
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
        editMethod(id) {
            axios
            .get(`${this.apiPath}/${id}`)
            .then(response => {
                this.showData = response.data;
                this.$refs['modalForm'].show();
            })
            .catch(error => console.error (error))
        },
        updateMethod() {
            axios
            .put(`${this.apiPath}/${this.showData.id}`, this.showData)
            .then(() => {
                this.$refs['modalForm'].hide();
                this.getList();
                this.$toast({
                    component: ToastificationContent,
                    position: 'top-right',
                    props: {
                    title: `${this.$t('updatedSuccess')}`,
                    icon: 'CoffeeIcon',
                    variant: 'success',
                    text: `${this.$t('Adjustment Category')} ${this.$t('updatedSuccess')}!`,
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
        createMethod() {
            axios
            .post(`${this.apiPath}`, this.showData)
            .then(() => {
                this.$refs['modalForm'].hide();
                this.getList();
                this.$toast({
                    component: ToastificationContent,
                    position: 'top-right',
                    props: {
                    title: `${this.$t('createdSuccess')}`,
                    icon: 'CoffeeIcon',
                    variant: 'success',
                    text: `${this.$t('Adjustment Category')} ${this.$t('createdSuccess')}!`,
                    },
                })
            })
            .catch(error => {
                this.$toast({
                    component: ToastificationContent,
                    position: 'top-right',
                    props: {
                    title: `${this.$t('createdFailed')}`,
                    icon: 'XIcon',
                    variant: 'danger',
                    text: error.response.data.message,
                    },
                })
            })
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
                            text: `${this.$t('Adjustment Category')} ${this.$t('deletedSuccess')}!`,
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
    },
    created() {
        this.getList();
    },
}
</script>

<style lang="scss" >
@import '@core/scss/vue/libs/vue-select.scss';
@import '@core/scss/vue/libs/vue-good-table.scss';
</style>