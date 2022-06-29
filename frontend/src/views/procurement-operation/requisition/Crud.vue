<template>
    <div>
        <b-card-code :title="$route.path == '/ProcurementOperation/RequisitionCreate' ?  $t('RequisitionModal.createRequisition') : $t('RequisitionModal.editRequisition')">
            <b-form @submit.prevent>
                <validation-observer ref="simpleRules">
                    <b-row>
                        <!-- Requisition Date -->
                        <b-col cols="4">
                            <b-form-group
                                label-for="requisitionDate-datepicker"
                                id="requisitionDate"
                            >
                                <validation-provider
                                    #default="{ errors }"
                                    name="requisitionDate"
                                    rules="required"
                                >
                                    <flat-pickr
                                        v-model="requisitionDate"
                                        class="form-control"
                                        :placeholder="$t('RequisitionList.requisitionDate')"
                                        id="requisitionDate-datepicker"
                                    />
                                    <small class="text-danger">{{ errors[0] }}</small>
                                </validation-provider>
                            </b-form-group>
                        </b-col>
                        <!-- Manufacturer -->
                        <b-col cols="4">
                            <b-form-group>
                                <v-select
                                    v-model="manufacturer"
                                    :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                                    :options="manufacturerOption"
                                    :placeholder="$t('RequisitionModal.selectManufacturer')"
                                />
                            </b-form-group>
                        </b-col>
                        <!-- Currency -->
                        <b-col cols="4">
                            <b-form-group id="currency">
                                <validation-provider
                                    #default="{ errors }"
                                    name="currency"
                                    rules="required"
                                >
                                    <v-select
                                        v-model="currency"
                                        :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                                        :options="currencyOption"
                                        :placeholder="$t('RequisitionModal.selectCurrency')"
                                    />
                                    <small class="text-danger">{{ errors[0] }}</small>
                                </validation-provider>
                            </b-form-group>
                        </b-col>
                        <!-- Transfer No -->
                        <b-col cols="4">
                            <b-form-group>
                                <v-select
                                    v-model="transferNo"
                                    :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                                    :options="transferNoOption"
                                    :placeholder="$t('RequisitionModal.selectTransferNo')"
                                />
                            </b-form-group>
                        </b-col>
                        <!-- Project No -->
                        <b-col cols="4">
                            <b-form-group>
                                <v-select
                                    v-model="project"
                                    :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                                    :options="projectOption"
                                    :placeholder="$t('RequisitionModal.selectProject')"
                                />
                            </b-form-group>
                        </b-col>
                        <!--  Buyer -->
                        <b-col cols="4">
                            <b-form-group id="buyer">
                                <validation-provider
                                    #default="{ errors }"
                                    name="buyer"
                                    rules="required"
                                >
                                    <v-select
                                        v-model="buyer"
                                        :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                                        :options="buyerOption"
                                        :placeholder="$t('RequisitionModal.selectBuyer')"
                                    />
                                    <small class="text-danger">{{ errors[0] }}</small>
                                </validation-provider>
                            </b-form-group>
                        </b-col>
                        <!--  Purchase Department -->
                        <b-col cols="4">
                            <b-form-group id="purchaseDepartment">
                                <validation-provider
                                    #default="{ errors }"
                                    name="purchaseDepartment"
                                    rules="required"
                                >
                                    <v-select
                                        v-model="purchaseDepartment"
                                        :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                                        :options="purchaseDepartmentOption"
                                        :placeholder="$t('RequisitionModal.selectPurchaseDepartment')"
                                    />
                                    <small class="text-danger">{{ errors[0] }}</small>
                                </validation-provider>
                            </b-form-group>
                        </b-col>
                        <!--  Pre-Delivery Date -->
                        <b-col cols="4">
                            <b-form-group
                                label-for="preDeliveryDate-datepicker"
                                id="preDeliveryDate"
                            >
                                <validation-provider
                                    #default="{ errors }"
                                    name="preDeliveryDate"
                                    rules="required"
                                >
                                    <flat-pickr
                                        v-model="preDeliveryDate"
                                        class="form-control"
                                        :placeholder="$t('RequisitionList.preDeliveryDate')"
                                        id="preDeliveryDate-datepicker"
                                    />
                                    <small class="text-danger">{{ errors[0] }}</small>
                                </validation-provider>
                            </b-form-group>
                        </b-col>
                        <!--  Remark -->
                        <b-col cols="4">
                            <b-form-group>
                                <b-form-textarea
                                    :placeholder="$t('remark')"
                                    rows="3"
                                    v-model="remark"
                                    autocomplete="off"
                                />
                            </b-form-group>
                        </b-col>
                    </b-row>
                </validation-observer>
            </b-form>
        </b-card-code>
        <b-card-code :title="$t('RequisitionModal.productInformation')">

            <!-- search input -->
            <div class="custom-search d-flex justify-content-end">
                <b-button
                    v-ripple.400="'rgba(113, 102, 240, 0.15)'"
                    v-b-modal.modalForm
                    variant="outline-primary"
                    class="mb-2 mr-2"
                    @click="modalCreateFlag=true;resetModal()"
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
                        {{$t('ProductList.' + props.column.label) }}
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
                    <span v-else-if="props.column.field === 'productRemark'" class="text-nowrap">
                        <span>
                            <b-button
                                v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                variant="outline-primary"
                                size="sm"
                                @click="showRemark(rows[props.row.originalIndex].productRemark)"
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
                                class="mr-1"
                                @click="modalCreateFlag=false;editModal(props.row.originalIndex)"
                            >
                                <feather-icon
                                    icon="Edit2Icon"
                                />
                                <span>{{ $t('edit') }}</span>
                            </b-button>
                            <b-button
                                v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                variant="outline-danger"
                                size="sm"
                                @click="removeProductData(props.row.originalIndex)"
                            >
                                <feather-icon
                                    icon="Trash2Icon"
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
        <template>
            <div class="demo-spacing-0">
                <b-alert
                    v-height-fade.appear
                    fade
                    variant="danger"
                    :show="alertShow"
                    dismissible
                    @dismissed="alertShow = false"
                >
                    <div class="alert-body">
                        <span>{{ $t('ProductList.productDataCheck') }}</span>
                    </div>
                </b-alert>
                <b-row>
                    <!-- submit -->
                    <b-col class="text-right">
                        <b-button
                            v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                            type="submit"
                            variant="primary"
                            @click.prevent="validationForm"
                        >
                            {{ $t('Submit') }}
                        </b-button>
                    </b-col>
                    <b-col>
                        <b-button
                            v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                            type="button"
                            variant="secondary"
                            :to="{ name: 'ProcurementOperation-RequisitionList' }"
                        >
                            {{ $t('back') }}
                        </b-button>
                    </b-col>
                </b-row>
            </div>
        </template>
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
                    <b-form-group>
                        <label for="productName">{{ $t('ProductList.productName') }}</label>
                        <validation-provider
                            #default="{ errors }"
                            name="productName"
                            rules="required"
                        >
                            <v-select
                                v-model="productName"
                                :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                                :options="productOption"
                                :placeholder="$t('RequisitionModal.selectProductName')"
                                id="productName"
                            />
                            <small class="text-danger">{{ errors[0] }}</small>
                        </validation-provider>
                    </b-form-group>
                    <b-form-group>
                        <label for="productNo">{{ $t('ProductList.productNo') }}</label>
                        <b-form-input
                            v-model="productNo"
                            type="text"
                            :placeholder="$t('ProductList.productNo')"
                            readonly
                        />
                    </b-form-group>
                    <b-form-group>
                        <label for="specification">{{ $t('ProductList.specification') }}</label>
                        <b-form-input
                            v-model="specification"
                            type="text"
                            :placeholder="$t('ProductList.specification')"
                            readonly
                        />
                    </b-form-group>
                    <b-form-group>
                        <label for="unit">{{ $t('ProductList.unit') }}</label>
                        <b-form-input
                            v-model="unit"
                            type="text"
                            :placeholder="$t('ProductList.unit')"
                            readonly
                        />
                    </b-form-group>
                    <b-form-group>
                        <label for="storehouse">{{ $t('ProductList.storehouse') }}</label>
                        <v-select
                            v-model="storehouse"
                            :dir="$store.state.appConfig.isRTL ? 'rtl' : 'ltr'"
                            :options="storehouseOption"
                            :placeholder="$t('RequisitionModal.selectStorehouse')"
                        />
                    </b-form-group>
                    <b-form-group id="quantity">
                        <label for="quantity">{{ $t('ProductList.quantity') }}</label>
                        <validation-provider
                            #default="{ errors }"
                            name="quantity"
                            rules="required"
                        >
                            <b-form-input
                                type="number"
                                v-model="quantity"
                                min="0"
                            />
                            <small class="text-danger">{{ errors[0] }}</small>
                        </validation-provider>
                    </b-form-group>
                    <b-form-group id="unitPrice">
                        <label for="unitPrice">{{ $t('ProductList.unitPrice') }}</label>
                        <validation-provider
                            #default="{ errors }"
                            name="unitPrice"
                            rules="required"
                        >
                            <b-form-input
                                type="number"
                                v-model="unitPrice"
                                min="0"
                            />
                            <small class="text-danger">{{ errors[0] }}</small>
                        </validation-provider>
                    </b-form-group>
                    <b-form-group>
                        <label for="amount">{{ $t('ProductList.amount') }}</label>
                        <b-form-input
                            id="amount"
                            type="number"
                            v-model="amount"
                            min="0"
                            autocomplete="off"
                        />
                    </b-form-group>
                    <b-form-group id="productPreDeliveryDate">
                        <label for="productPreDeliveryDate-datepicker">{{ $t('ProductList.productPreDeliveryDate') }}</label>
                        <validation-provider
                            #default="{ errors }"
                            name="productPreDeliveryDate"
                            rules="required"
                        >
                            <flat-pickr
                                v-model="productPreDeliveryDate"
                                class="form-control"
                                :placeholder="$t('ProductList.productPreDeliveryDate')"
                                id="productPreDeliveryDate-datepicker"
                            />
                            <small class="text-danger">{{ errors[0] }}</small>
                        </validation-provider>
                    </b-form-group>
                    <b-form-group>
                        <label for="productRemark">{{ $t('remark') }}</label>
                        <b-form-textarea
                            id="productRemark"
                            :placeholder="$t('remark')"
                            rows="3"
                            v-model="productRemark"
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
import BCardCode from '@core/components/b-card-code'
import vSelect from 'vue-select'
import flatPickr from 'vue-flatpickr-component'
import { VueGoodTable } from 'vue-good-table'
import { heightFade } from '@core/directives/animations'
import {
    BAlert,
    BRow,
    BCol,
    BFormGroup,
    BFormInput,
    BFormCheckbox,
    BForm,
    BButton,
    BFormText,
    BFormDatalist,
    BInputGroup,
    BInputGroupPrepend,
    BInputGroupAppend,
    BFormTextarea,
    BPagination,
    BFormSelect,
    BCardText
} from 'bootstrap-vue'
import Ripple from 'vue-ripple-directive'
import { ValidationProvider, ValidationObserver } from 'vee-validate'
import { required } from '@validations'
import store from '@/store/index'

export default {
    components: {
        BAlert,
        BCardCode,
        BRow,
        BCol,
        BFormGroup,
        BInputGroup,
        BInputGroupPrepend,
        BFormInput,
        BFormCheckbox,
        BForm,
        BFormText,
        BButton,
        BFormDatalist,
        ValidationProvider,
        ValidationObserver,
        BInputGroupAppend,
        vSelect,
        BFormTextarea,
        flatPickr,
        BPagination,
        BFormSelect,
        VueGoodTable,
        BCardText
    },
    directives: {
        Ripple,
        'height-fade': heightFade,
    },
    data() {
        return {
            editId: 0,
            required,
            requisitionDate: '',
            manufacturer: '',
            manufacturerOption: ['台積電', '日月光', '環球晶'],
            currency: '',
            currencyOption: ['NTD', 'USD', 'RMB', 'JPY'],
            transferNo: '',
            transferNoOption: ['A123', 'B123', 'C123'],
            project: '',
            projectOption: ['母親節專案', '父親節專案'],
            buyer: '',
            buyerOption: ['dennis', 'ryan'],
            purchaseDepartment: '',
            purchaseDepartmentOption: ['人事部', '會計部'],
            preDeliveryDate: '',
            remark: '',
            remarkDetail: '',
            alertShow: 'false',

            productsData: {},
            //modal form
            modalCreateFlag : true,
            productNo: '',
            productName: '',
            productOption: ['桌子', '椅子'],
            specification: '',
            unit: '',
            storehouse: '',
            storehouseOption: ['北', '中', '南'],
            quantity: 0,
            unitPrice: '',
            amount: '',
            productPreDeliveryDate: '',
            productRemark: '',
            editRowId: '',

            pageLength: 5,
            dir: false,
            searchTerm: '',
            columns: [
                { label: '#', field: 'index' },
                { label: 'productNo', field: 'productNo' },
                { label: 'productName', field: 'productName' },
                { label: 'specification', field: 'specification' },
                { label: 'unit', field: 'unit' },
                { label: 'storehouse', field: 'storehouse' },
                { label: 'quantity', field: 'quantity' },
                { label: 'unitPrice', field: 'unitPrice' },
                { label: 'amount', field: 'amount' },
                { label: 'productPreDeliveryDate', field: 'productPreDeliveryDate' },
                { label: 'productRemark', field: 'productRemark' },
                { label: 'action', field: 'action' },
            ],
            rows: [
                {
                    productNo : 'A123456',
                    productName : '麥香',
                    specification : '小',
                    unit : '箱',
                    storehouse : '北',
                    quantity : 10,
                    unitPrice : 500,
                    amount : 100,
                    productPreDeliveryDate : '2022-06-30',
                    productRemark : 'test',
                }
            ]
        }
    },
    methods: {
        validationForm() {
            this.$refs.simpleRules.validate().then(success => {
                if(this.rows.length > 0) {
                    this.alertShow = 'false';
                }else {
                    this.alertShow = '';
                }
                if (success && this.rows.length > 0) {
                    //
                }else {
                    const simpleRulesErrors = Object.keys(this.$refs.simpleRules.errors);
                    simpleRulesErrors.some(element => {
                        if(this.$refs.simpleRules.errors[element].length > 0){
                            document.querySelector(`#${element} input`).focus();
                            return true;
                        }
                    });
                }
            })
        },
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
            this.productName = '';
            this.specification = '';
            this.unit = '';
            this.storehouse = '';
            this.quantity = 0;
            this.unitPrice = '';
            this.amount = '';
            this.productPreDeliveryDate = this.preDeliveryDate;
            this.productRemark = '';
        },
        editModal(key) {
            this.editRowId = key;
            this.productName = this.rows[key].productName;
            this.specification = this.rows[key].specification;
            this.unit = this.rows[key].unit;
            this.storehouse = this.rows[key].storehouse;
            this.quantity = this.rows[key].quantity;
            this.unitPrice = this.rows[key].unitPrice;
            this.amount = this.rows[key].amount;
            this.productPreDeliveryDate = this.rows[key].productPreDeliveryDate;
            this.productRemark = this.rows[key].productRemark;
            this.$refs['modalForm'].show();
        },
        productDataPush() {
            this.productsData = {
                productName : this.productName,
                specification : this.specification,
                unit : this.unit,
                storehouse : this.storehouse,
                quantity : this.quantity,
                unitPrice : this.unitPrice,
                amount : this.amount,
                productPreDeliveryDate : this.productPreDeliveryDate,
                productRemark : this.productRemark,
            };
            if(this.modalCreateFlag){
                this.rows.push(this.productsData);
            }else{
                Object.assign(this.rows[this.editRowId], this.productsData);
            }
            this.$nextTick(() => {
                this.$refs['modalForm'].toggle('#toggle-btn')
            })
        },
        removeProductData(key) {
            this.$bvModal
                .msgBoxConfirm(this.$t('checkDelete'), {
                    size: 'sm',
                    okVariant: 'primary',
                    okTitle: this.$t('yes'),
                    cancelTitle: this.$t('no'),
                    cancelVariant: 'outline-secondary',
                    hideHeaderClose: false,
                    centered: true,
                    footerClass: "d-block mx-auto"
                })
                .then(value => {
                    if(value) this.rows.splice(key,1);
                })
        },
        showRemark(value) {
            this.remarkDetail = value;
            this.$refs['remarkDetail'].show();
        }
    },
    computed: {
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
    mounted() {
        if(this.$route.query.id) this.editId = this.$route.query.id;
    },
}
</script>

<style lang="scss">
@import '@core/scss/vue/libs/vue-select.scss';
@import '@core/scss/vue/libs/vue-flatpicker.scss';
@import '@core/scss/vue/libs/vue-good-table.scss';
</style>