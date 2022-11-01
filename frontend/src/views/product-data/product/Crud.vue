<template>
    <div>
        <b-card-code :title="$route.name == 'ProductData-ProductDataSettingCreate' ?  $t('ProductList.createProduct') : $t('ProductList.editProduct')">
            <b-form @submit.prevent>
                <validation-observer ref="simpleRules">
                    <b-row>
                        <!-- code -->
                        <b-col cols="4">
                            <b-form-group id="productCode">
                                <label for="code">{{ $t('ProductList.code') }}</label>
                                <validation-provider
                                    #default="{ errors }"
                                    name="productCode"
                                    rules="required"
                                >
                                    <b-form-input
                                        v-model="showData.code"
                                        type="text"
                                        :placeholder="$t('ProductList.code')"
                                        :state="errors.length > 0 ? false:null"
                                    />
                                    <small class="text-danger">{{ errors[0] }}</small>
                                </validation-provider>
                            </b-form-group>
                        </b-col>
                        <!-- name -->
                        <b-col cols="4">
                            <b-form-group id="productName">
                                <label for="name">{{ $t('ProductList.name') }}</label>
                                <validation-provider
                                    #default="{ errors }"
                                    name="productName"
                                    rules="required"
                                >
                                    <b-form-input
                                        v-model="showData.name"
                                        type="text"
                                        :placeholder="$t('ProductList.name')"
                                        :state="errors.length > 0 ? false:null"
                                    />
                                    <small class="text-danger">{{ errors[0] }}</small>
                                </validation-provider>
                            </b-form-group>
                        </b-col>
                        <!-- englishName -->
                        <b-col cols="4">
                            <b-form-group>
                                <label for="englishName">{{ $t('ProductList.englishName') }}</label>
                                <b-form-input
                                    v-model="showData.alias"
                                    type="text"
                                    :placeholder="$t('ProductList.englishName')"
                                />
                            </b-form-group>
                        </b-col>
                    </b-row>
                    <b-row>
                        <!-- img -->
                        <b-col cols="4">
                            <b-form-group>
                                <label for="img">{{ $t('ProductList.img') }}</label>
                                <b-form-file
                                    accept="image/*"
                                    v-model="showData.picture"
                                    :placeholder="$t('ProductList.imgPlaceHolder')"
                                    :drop-placeholder="$t('ProductList.imgDropPlaceHolder')"
                                />
                            </b-form-group>
                        </b-col>
                        <!-- invoice_name -->
                        <b-col cols="4">
                            <b-form-group>
                                <label for="invoiceName">{{ $t('ProductList.invoiceName') }}</label>
                                <b-form-input
                                    v-model="showData.invoice_name"
                                    type="text"
                                    :placeholder="$t('ProductList.invoiceName')"
                                />
                            </b-form-group>
                        </b-col>
                        <!-- specification -->
                        <b-col cols="4">
                            <b-form-group id="productSpecification">
                                <label for="productSpecification">{{ $t('ProductList.specification') }}</label>
                                <validation-provider
                                    #default="{ errors }"
                                    name="productSpecification"
                                    rules="required"
                                >
                                    <b-form-input
                                        v-model="showData.sku"
                                        type="text"
                                        :placeholder="$t('ProductList.specification')"
                                        :state="errors.length > 0 ? false:null"
                                    />
                                    <small class="text-danger">{{ errors[0] }}</small>
                                </validation-provider>
                            </b-form-group>
                        </b-col>
                    </b-row>
                    <b-row>
                        <!-- category -->
                        <b-col cols="4">
                            <b-form-group id="productCategory">
                                <label for="productCategory">{{ $t('ProductList.category') }}</label>
                                <validation-provider
                                    #default="{ errors }"
                                    name="productCategory"
                                    rules="required"
                                >
                                    <v-select
                                        label="name"
                                        v-model="showData.product_category_id"
                                        :options="categoryOption"
                                        :placeholder="$t('ProductList.selectCategory')"
                                        :reduce="option => option.id"
                                    />
                                    <small class="text-danger">{{ errors[0] }}</small>
                                </validation-provider>
                            </b-form-group>
                        </b-col>
                        <!-- price -->
                        <b-col cols="4">
                            <b-form-group id="productPrice">
                                <label for="productPrice">{{ $t('ProductList.price') }}</label>
                                <validation-provider
                                    #default="{ errors }"
                                    name="productPrice"
                                    rules="required"
                                >
                                    <b-form-input
                                        v-model="showData.price"
                                        type="text"
                                        :placeholder="$t('ProductList.price')"
                                        :state="errors.length > 0 ? false:null"
                                    />
                                    <small class="text-danger">{{ errors[0] }}</small>
                                </validation-provider>
                            </b-form-group>
                        </b-col>
                        <!-- unit -->
                        <b-col cols="4">
                            <b-form-group id="productUnit">
                                <label for="productUnit">{{ $t('ProductList.unit') }}</label>
                                <validation-provider
                                    #default="{ errors }"
                                    name="productUnit"
                                    rules="required"
                                >
                                    <b-form-input
                                        v-model="showData.unit"
                                        type="text"
                                        :placeholder="$t('ProductList.unit')"
                                        :state="errors.length > 0 ? false:null"
                                    />
                                    <small class="text-danger">{{ errors[0] }}</small>
                                </validation-provider>
                            </b-form-group>
                        </b-col>
                    </b-row>
                    <b-row>
                        <!-- barcode -->
                        <b-col cols="4">
                            <b-form-group>
                                <label for="barcode">{{ $t('ProductList.barcode') }}</label>
                                <b-form-input
                                    v-model="showData.barcode"
                                    type="text"
                                    :placeholder="$t('ProductList.barcode')"
                                />
                            </b-form-group>
                        </b-col>
                        <!--  Remark -->
                        <b-col cols="4">
                            <b-form-group>
                                <label for="remark">{{ $t('ProductList.remark') }}</label>
                                <b-form-textarea
                                    :placeholder="$t('ProductList.remark')"
                                    rows="3"
                                    v-model="showData.remark"
                                    autocomplete="off"
                                />
                            </b-form-group>
                        </b-col>
                    </b-row>
                </validation-observer>
            </b-form>
        </b-card-code>
        <b-card-code :title="$t('ProductModal.warehouseInformation')">

            <!-- search input -->
            <div class="custom-search d-flex justify-content-end">
                <b-button
                    v-ripple.400="'rgba(113, 102, 240, 0.15)'"
                    v-b-modal.modalForm
                    variant="outline-primary"
                    class="mb-2 mr-2"
                    @click="resetModal()"
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
                :search-options="{
                    enabled: true,
                    externalQuery: searchTerm
                }"
                :pagination-options="{
                    enabled: true,
                    perPage:pageLength
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
                    <!-- Column: Action -->
                    <span v-else-if="props.column.field === 'action'" class="text-nowrap">
                        <span>
                            <b-button
                                v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                variant="outline-success"
                                size="sm"
                                class="mr-50"
                                @click="editData(props.row)"
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
                                @click="removeData(props.row)"
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
                        <span>{{ $t('ProductList.warehouseDataCheck') }}</span>
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
                            :to="{ name: 'ProductData-ProductDataSettingList' }"
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
            :title="storehousesData.id ? $t('edit') : $t('create')"
            :cancel-title="$t('back')"
            :ok-title="$t('Submit')"
            @ok.prevent="validationModalForm"
            ref="modalForm"
        >
            <b-form @submit.prevent>
                <validation-observer ref="modalRules">
                    <b-form-group id="productWarehouse">
                        <label for="productWarehouse">{{ $t('ProductList.warehouse') }}</label>
                        <validation-provider
                            #default="{ errors }"
                            name="productWarehouse"
                            rules="required"
                        >
                            <v-select
                                label="name"
                                v-model="storehousesData.id"
                                :options="storehouseOption"
                                :placeholder="$t('ProductModal.selectWarehouse')"
                                :reduce="option => option.id"
                                :disabled="storehouseModalId ? true : false"
                            />
                            <small class="text-danger">{{ errors[0] }}</small>
                        </validation-provider>
                    </b-form-group>
                    <b-form-group id="productStock">
                        <label for="productStock">{{ $t('ProductList.stock') }}</label>
                        <validation-provider
                            #default="{ errors }"
                            name="productStock"
                            rules="required"
                        >
                            <b-form-input
                                v-model="storehousesData.stock"
                                type="number"
                                :placeholder="$t('ProductList.stock')"
                                :state="errors.length > 0 ? false:null"
                            />
                            <small class="text-danger">{{ errors[0] }}</small>
                        </validation-provider>
                    </b-form-group>
                    <b-form-group>
                        <label for="safetyStock">{{ $t('ProductList.safetyStock') }}</label>
                        <b-form-input
                            v-model="storehousesData.safety_stock"
                            type="number"
                            :placeholder="$t('ProductList.safetyStock')"
                        />
                    </b-form-group>
                </validation-observer>
            </b-form>
        </b-modal>
    </div>
</template>

<script>
import BCardCode from '@core/components/b-card-code'
import vSelect from 'vue-select'
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
    BCardText,
    BFormFile,
    BSpinner
} from 'bootstrap-vue'
import Ripple from 'vue-ripple-directive'
import { ValidationProvider, ValidationObserver } from 'vee-validate'
import { required } from '@validations'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'
import axios from "@axios";

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
        BPagination,
        BFormSelect,
        VueGoodTable,
        BCardText,
        BFormFile,
        BSpinner
    },
    directives: {
        Ripple,
        'height-fade': heightFade,
    },
    data() {
        return {
            apiPath: '/products',
            required,
            alertShow: 'false',
            showData: {},
            storehouseModalId: null,
            storehousesData: {},
            defaultData: {
                id : null,
                code: '',
                name: '',
                alias: '',
                picture: null,
                invoice_name: '',
                sku: '',
                product_category_id: '',
                unit: '',
                barcode: '',
                remark: '',
                storehouses: []
            },
            defaultStorehouseData: {
                id: null,
                stock: 0,
                safety_stock: 0,
            },
            categoryOption: [],
            storehouseOption: [],
            pageLength: 5,
            searchTerm: '',
            columns: [
                { label: '#', field: 'id', type: 'number' },
                { label: 'warehouse', field: 'name' },
                { label: 'stock', field: 'stock', type: 'number' },
                { label: 'expectedToEnter', field: 'expectedToEnter', type: 'number' },
                { label: 'predict', field: 'predict', type: 'number' },
                { label: 'estimatedStock', field: 'estimatedStock', type: 'number' },
                { label: 'safetyStock', field: 'safety_stock', type: 'number' },
                { label: 'action', field: 'action' },
            ],
            rows: [],
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
                    if(this.showData.id) {
                        this.updateMethod();
                    }else {
                        this.createMethod();
                    }
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
                    this.dataPush();
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
        createMethod() {
            axios
            .post(`${this.apiPath}`, this.showData, { mimeType: 'multipart/form-data' })
            .then(() => {
                this.$toast({
                    component: ToastificationContent,
                    position: 'top-right',
                    props: {
                    title: `${this.$t('createdSuccess')}`,
                    icon: 'CoffeeIcon',
                    variant: 'success',
                    text: `${this.$t('Product Data Setting')} ${this.$t('createdSuccess')}!`,
                    },
                })
                this.$router.push({name:'ProductData-ProductDataSettingList'});
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
        editMethod() {
            axios
            .get(`${this.apiPath}/${this.showData.id}`)
            .then(response => {
                let product = response.data
                product.storehouses = product.storehouses.map(item => ({
                    ...item,
                    stock: item.pivot.stock,
                    safety_stock: item.pivot.safety_stock,
                }))

                this.showData = JSON.parse(JSON.stringify(product));
                this.rows = JSON.parse(JSON.stringify(product.storehouses));
            })
            .catch(error => console.error (error))
        },
        updateMethod() {
            axios
            .put(`${this.apiPath}/${this.showData.id}`, this.showData)
            .then(() => {
                this.$toast({
                    component: ToastificationContent,
                    position: 'top-right',
                    props: {
                    title: `${this.$t('updatedSuccess')}`,
                    icon: 'CoffeeIcon',
                    variant: 'success',
                    text: `${this.$t('Product Data Setting')} ${this.$t('updatedSuccess')}!`,
                    },
                })
                this.$router.push({name:'ProductData-ProductDataSettingList'});
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
        resetModal() {
            this.storehouseModalId = null
            this.storehousesData = Object.assign({}, this.storehousesData, this.defaultStorehouseData)
        },
        editData(data) {
            this.storehouseModalId = data.id
            this.storehousesData = data;
            this.$refs['modalForm'].show();
        },
        dataPush() {
            const storehouseFind = this.storehouseOption.find(storehouse => storehouse.id === this.storehousesData.id)
            const storehouseIndex = this.showData.storehouses.findIndex((element) => element.id == this.storehousesData.id);
            if (storehouseIndex === -1) {
                this.storehousesData = Object.assign(this.storehousesData, storehouseFind)
                this.showData.storehouses.push(this.storehousesData);
                this.rows = JSON.parse(JSON.stringify(this.showData.storehouses));
            } else if (storehouseIndex !== -1 && this.storehouseModalId === null) {
                this.$toast({
                    component: ToastificationContent,
                    position: 'top-right',
                    props: {
                    title: `${this.$t('createdFailed')}`,
                    icon: 'XIcon',
                    variant: 'danger',
                    text: `${this.$t('ProductList.storehousesCreatedFailed')}`,
                    },
                })
            } else {
                Object.assign(this.showData.storehouses[storehouseIndex], this.storehousesData);
            }
            this.$nextTick(() => {
                this.$refs['modalForm'].toggle('#toggle-btn')
            })
        },
        removeData(row) {
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
                    if (value) {
                        const storehouseIndex = this.showData.storehouses.findIndex(storehouse => storehouse.id === row.id)
                        const tableRowIndex = this.rows.findIndex(tableRow => tableRow.id === row.id)
                        if (storehouseIndex !== -1) this.showData.storehouses.splice(storehouseIndex, 1);
                        if (tableRowIndex !== -1) this.rows.splice(tableRowIndex, 1);
                    }
                })
        },
    },
    mounted() {
        this.showData = this.defaultData;
        axios
        .post('categories/options')
        .then(response => {
            this.categoryOption = response.data;
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
        axios
        .post('storehouses/options')
        .then(response => {
            this.storehouseOption = response.data;
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
        if(this.$route.query.id) {
            this.showData.id = this.$route.query.id;
            this.editMethod();
        }
    },
}
</script>

<style lang="scss">
@import '@core/scss/vue/libs/vue-select.scss';
@import '@core/scss/vue/libs/vue-good-table.scss';
</style>
