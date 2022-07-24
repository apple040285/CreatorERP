<template>
    <b-form @submit.prevent>
        <validation-observer ref="simpleRules">
            <b-card-code :title="$route.name == 'CustomerManufacturerData-CustomerManufacturerDataCreate' ?  $t('CustomerManufacturerList.createCustomerManufacturer') : $t('CustomerManufacturerList.editCustomerManufacturer')">
                <b-row>
                    <!-- code -->
                    <b-col cols="4">
                        <b-form-group id="customerManufacturerCode">
                            <label for="code">{{ $t('CustomerManufacturerList.code') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="customerManufacturerCode"
                                rules="required"
                            >
                                <b-form-input
                                    v-model="defaultData.code"
                                    type="text"
                                    :placeholder="$t('CustomerManufacturerList.code')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- fullName -->
                    <b-col cols="4">
                        <b-form-group id="customerManufacturerFullName">
                            <label for="customerManufacturerFullName">{{ $t('CustomerManufacturerList.fullName') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="customerManufacturerFullName"
                                rules="required"
                            >
                                <b-form-input
                                    v-model="defaultData.fullName"
                                    type="text"
                                    :placeholder="$t('CustomerManufacturerList.fullName')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- shortName -->
                    <b-col cols="4">
                        <b-form-group id="shortName">
                            <label for="shortName">{{ $t('CustomerManufacturerList.shortName') }}</label>
                            <b-form-input
                                v-model="defaultData.shortName"
                                type="text"
                                :placeholder="$t('CustomerManufacturerList.shortName')"
                            />
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <!-- englishName -->
                    <b-col cols="4">
                        <b-form-group id="englishName">
                            <label for="englishName">{{ $t('CustomerManufacturerList.englishName') }}</label>
                            <b-form-input
                                v-model="defaultData.englishName"
                                type="text"
                                :placeholder="$t('CustomerManufacturerList.englishName')"
                            />
                        </b-form-group>
                    </b-col>
                    <!-- belong -->
                    <b-col cols="4">
                        <b-form-group id="customerManufacturerBelong">
                            <label for="customerManufacturerBelong">{{ $t('CustomerManufacturerList.belong') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="customerManufacturerBelong"
                                rules="required"
                            >
                                <v-select
                                    v-model="defaultData.belong"
                                    :options="defaultData.belongOption"
                                    :placeholder="$t('CustomerManufacturerList.belong')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- category -->
                    <b-col cols="4">
                        <b-form-group id="customerManufacturerCategory">
                            <label for="customerManufacturerCategory">{{ $t('CustomerManufacturerList.category') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="customerManufacturerCategory"
                                rules="required"
                            >
                                <v-select
                                    v-model="defaultData.category"
                                    :options="defaultData.categoryOption"
                                    :placeholder="$t('CustomerManufacturerList.category')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <!-- industry -->
                    <b-col cols="4">
                        <b-form-group id="industry">
                            <label for="industry">{{ $t('CustomerManufacturerList.industry') }}</label>
                            <b-form-input
                                v-model="defaultData.industry"
                                type="text"
                                :placeholder="$t('CustomerManufacturerList.industry')"
                            />
                        </b-form-group>
                    </b-col>
                    <!-- personInCharge -->
                    <b-col cols="4">
                        <b-form-group id="personInCharge">
                            <label for="personInCharge">{{ $t('CustomerManufacturerList.personInCharge') }}</label>
                            <b-form-input
                                v-model="defaultData.personInCharge"
                                type="text"
                                :placeholder="$t('CustomerManufacturerList.personInCharge')"
                            />
                        </b-form-group>
                    </b-col>
                    <!-- contactPersonOne -->
                    <b-col cols="4">
                        <b-form-group id="contactPersonOne">
                            <label for="contactPersonOne">{{ $t('CustomerManufacturerList.contactPersonOne') }}</label>
                            <b-form-input
                                v-model="defaultData.contactPersonOne"
                                type="text"
                                :placeholder="$t('CustomerManufacturerList.contactPersonOne')"
                            />
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <!-- contactPersonTwo -->
                    <b-col cols="4">
                        <b-form-group id="contactPersonTwo">
                            <label for="contactPersonTwo">{{ $t('CustomerManufacturerList.contactPersonTwo') }}</label>
                            <b-form-input
                                v-model="defaultData.contactPersonTwo"
                                type="text"
                                :placeholder="$t('CustomerManufacturerList.contactPersonTwo')"
                            />
                        </b-form-group>
                    </b-col>
                    <!-- phoneOne -->
                    <b-col cols="4">
                        <b-form-group id="phoneOne">
                            <label for="phoneOne">{{ $t('CustomerManufacturerList.phoneOne') }}</label>
                            <b-form-input
                                v-model="defaultData.phoneOne"
                                type="text"
                                :placeholder="$t('CustomerManufacturerList.phoneOne')"
                            />
                        </b-form-group>
                    </b-col>
                    <!-- phoneTwo -->
                    <b-col cols="4">
                        <b-form-group id="phoneTwo">
                            <label for="phoneTwo">{{ $t('CustomerManufacturerList.phoneTwo') }}</label>
                            <b-form-input
                                v-model="defaultData.phoneTwo"
                                type="text"
                                :placeholder="$t('CustomerManufacturerList.phoneTwo')"
                            />
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <!-- email -->
                    <b-col cols="4">
                        <b-form-group id="email">
                            <label for="email">{{ $t('CustomerManufacturerList.email') }}</label>
                            <b-form-input
                                v-model="defaultData.email"
                                type="text"
                                :placeholder="$t('CustomerManufacturerList.email')"
                            />
                        </b-form-group>
                    </b-col>
                    <!-- fax -->
                    <b-col cols="4">
                        <b-form-group id="fax">
                            <label for="fax">{{ $t('CustomerManufacturerList.fax') }}</label>
                            <b-form-input
                                v-model="defaultData.fax"
                                type="text"
                                :placeholder="$t('CustomerManufacturerList.fax')"
                            />
                        </b-form-group>
                    </b-col>
                    <!-- unicode -->
                    <b-col cols="4">
                        <b-form-group id="unicode">
                            <label for="unicode">{{ $t('CustomerManufacturerList.unicode') }}</label>
                            <b-form-input
                                v-model="defaultData.unicode"
                                type="text"
                                :placeholder="$t('CustomerManufacturerList.unicode')"
                            />
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <!-- invoiceName -->
                    <b-col cols="4">
                        <b-form-group id="invoiceName">
                            <label for="invoiceName">{{ $t('CustomerManufacturerList.invoiceName') }}</label>
                            <b-form-input
                                v-model="defaultData.invoiceName"
                                type="text"
                                :placeholder="$t('CustomerManufacturerList.invoiceName')"
                            />
                        </b-form-group>
                    </b-col>
                    <!-- invoiceAddress -->
                    <b-col cols="4">
                        <b-form-group id="invoiceAddress">
                            <label for="invoiceAddress">{{ $t('CustomerManufacturerList.invoiceAddress') }}</label>
                            <b-form-input
                                v-model="defaultData.invoiceAddress"
                                type="text"
                                :placeholder="$t('CustomerManufacturerList.invoiceAddress')"
                            />
                        </b-form-group>
                    </b-col>
                    <!-- companyAddress -->
                    <b-col cols="4">
                        <b-form-group id="companyAddress">
                            <label for="companyAddress">{{ $t('CustomerManufacturerList.companyAddress') }}</label>
                            <b-form-input
                                v-model="defaultData.companyAddress"
                                type="text"
                                :placeholder="$t('CustomerManufacturerList.companyAddress')"
                            />
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <!-- zipCode -->
                    <b-col cols="4">
                        <b-form-group id="zipCode">
                            <label for="zipCode">{{ $t('CustomerManufacturerList.zipCode') }}</label>
                            <b-form-input
                                v-model="defaultData.zipCode"
                                type="text"
                                :placeholder="$t('CustomerManufacturerList.zipCode')"
                            />
                        </b-form-group>
                    </b-col>
                    <!-- disable_at -->
                    <b-col cols="4">
                        <b-form-group
                        label-for="disable_at-datepicker"
                        id="disable_at"
                        >
                            <label for="disable_at">{{ $t('CustomerManufacturerList.disable_at') }}</label>
                            <flat-pickr
                                v-model="defaultData.disable_at"
                                class="form-control"
                                :placeholder="$t('CustomerManufacturerList.disable_at')"
                                id="disable_at-datepicker"
                            />
                        </b-form-group>
                    </b-col>
                    <!-- currency -->
                    <b-col cols="4">
                        <b-form-group id="currency">
                            <label for="currency">{{ $t('CustomerManufacturerList.currency') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="currency"
                                rules="required"
                            >
                                <v-select
                                    v-model="defaultData.currency"
                                    :options="defaultData.currencyOption"
                                    :placeholder="$t('CustomerManufacturerList.currency')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <!-- taxDeductionCategory -->
                    <b-col cols="4">
                        <b-form-group id="customerManufacturerTaxDeductionCategory">
                            <label for="customerManufacturerTaxDeductionCategory">{{ $t('CustomerManufacturerList.taxDeductionCategory') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="customerManufacturerTaxDeductionCategory"
                                rules="required"
                            >
                                <v-select
                                    v-model="defaultData.taxDeductionCategory"
                                    :options="defaultData.taxDeductionCategoryOption"
                                    :placeholder="$t('CustomerManufacturerList.taxDeductionCategory')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- accountSettingMethod -->
                    <b-col cols="4">
                        <b-form-group id="customerManufacturerAccountSettingMethod">
                            <label for="customerManufacturerAccountSettingMethod">{{ $t('CustomerManufacturerList.accountSettingMethod') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="customerManufacturerAccountSettingMethod"
                                rules="required"
                            >
                                <v-select
                                    v-model="defaultData.accountSettingMethod"
                                    :options="defaultData.accountSettingMethodOption"
                                    :placeholder="$t('CustomerManufacturerList.accountSettingMethod')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- businessPeople -->
                    <b-col cols="4">
                        <b-form-group id="businessPeople">
                            <label for="businessPeople">{{ $t('CustomerManufacturerList.businessPeople') }}</label>
                            <v-select
                                v-model="defaultData.businessPeople"
                                :options="defaultData.businessPeopleOption"
                                :placeholder="$t('CustomerManufacturerList.businessPeople')"
                            />
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <!-- paymentMethod -->
                    <b-col cols="4">
                        <b-form-group id="paymentMethod">
                            <label for="paymentMethod">{{ $t('CustomerManufacturerList.paymentMethod') }}</label>
                            <v-select
                                v-model="defaultData.paymentMethod"
                                :options="defaultData.paymentMethodOption"
                                :placeholder="$t('CustomerManufacturerList.paymentMethod')"
                                @input="paymentMethodChange"
                            />
                        </b-form-group>
                    </b-col>
                    <!-- monthlyBillingDate -->
                    <b-col cols="4">
                        <b-form-group id="monthlyBillingDate">
                            <label for="monthlyBillingDate">{{ $t('CustomerManufacturerList.monthlyBillingDate') }}</label>
                            <b-form-input
                                v-model="defaultData.monthlyBillingDate"
                                type="number"
                                min="1"
                                max="31"
                                :placeholder="$t('CustomerManufacturerList.monthlyBillingDate')"
                                :readonly="defaultData.paymentMethod != '月結'"
                            />
                        </b-form-group>
                    </b-col>
                    <!-- days -->
                    <b-col cols="4">
                        <b-form-group id="days">
                            <label for="days">{{ $t('CustomerManufacturerList.days') }}</label>
                            <b-form-input
                                v-model="defaultData.days"
                                type="number"
                                min="1"
                                :placeholder="$t('CustomerManufacturerList.days')"
                                :readonly="defaultData.paymentMethod != '月結' && defaultData.paymentMethod != '貨到付款'"
                            />
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <!-- otherInstructions -->
                    <b-col cols="4">
                        <b-form-group id="otherInstructions">
                            <label for="otherInstructions">{{ $t('CustomerManufacturerList.otherInstructions') }}</label>
                            <b-form-input
                                v-model="defaultData.otherInstructions"
                                type="text"
                                :placeholder="$t('CustomerManufacturerList.otherInstructions')"
                                :readonly="defaultData.paymentMethod != '其他'"
                            />
                        </b-form-group>
                    </b-col>
                    <!-- electronicInvoiceType -->
                    <b-col cols="4">
                        <b-form-group id="electronicInvoiceType">
                            <label for="electronicInvoiceType">{{ $t('CustomerManufacturerList.electronicInvoiceType') }}</label>
                            <v-select
                                v-model="defaultData.electronicInvoiceType"
                                :options="defaultData.electronicInvoiceTypeOption"
                                :placeholder="$t('CustomerManufacturerList.electronicInvoiceType')"
                            />
                        </b-form-group>
                    </b-col>
                    <!-- remark -->
                    <b-col cols="4">
                        <b-form-group>
                            <label for="remark">{{ $t('CustomerManufacturerList.remark') }}</label>
                            <b-form-textarea
                                :placeholder="$t('CustomerManufacturerList.remark')"
                                rows="3"
                                v-model="defaultData.remark"
                                autocomplete="off"
                            />
                        </b-form-group>
                    </b-col>
                </b-row>
            </b-card-code>
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
                        :to="{ name: 'CustomerManufacturerData-CustomerManufacturerDataList' }"
                    >
                        {{ $t('back') }}
                    </b-button>
                </b-col>
            </b-row>
        </validation-observer>
    </b-form>
</template>

<script>
import BCardCode from '@core/components/b-card-code/BCardCode.vue'
import {
    BRow, BCol, BFormGroup, BForm, BFormInput, BFormSelect, BFormTextarea, BButton
} from 'bootstrap-vue'
import vSelect from 'vue-select'
import flatPickr from 'vue-flatpickr-component'
import { ValidationProvider, ValidationObserver } from 'vee-validate'
import { required } from '@validations'
import Ripple from 'vue-ripple-directive'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'
import axios from "@axios";

export default {
    components: {
        BCardCode,
        BRow,
        BCol,
        BFormGroup,
        BForm,
        BFormInput,
        BFormSelect,
        BFormTextarea,
        BButton,
        vSelect,
        flatPickr,
        ValidationProvider,
        ValidationObserver,
        ToastificationContent
    },
    directives: {
        Ripple,
    },
    data() {
        return {
            apiPath: '/customerManufacturers',
            required,
            defaultData: {
                id : null,
                code: '',
                fullName: '',
                shortName: '',
                englishName: '',
                belong: '',
                belongOption: ['客戶', '廠商'],
                category: '',
                categoryOption: ['原料商'],
                industry: '',
                personInCharge: '',
                contactPersonOne: '',
                contactPersonTwo: '',
                phoneOne: '',
                phoneTwo: '',
                email: '',
                fax: '',
                unicode: '',
                invoiceName: '',
                invoiceAddress: '',
                companyAddress: '',
                zipCode: '',
                disable_at: '',
                currency: '',
                currencyOption: ['美金'],
                taxDeductionCategory: '',
                taxDeductionCategoryOption: ['不計稅', '應稅內含', '應稅外加'],
                accountSettingMethod: '',
                accountSettingMethodOption: ['單張立帳', '不立帳', '收到發票才立帳'],
                businessPeople: '',
                businessPeopleOption: ['dennis'],
                paymentMethod: '',
                paymentMethodOption: ['月結', '貨到付款', '其他'],
                monthlyBillingDate: '',
                days: '',
                otherInstructions: '',
                electronicInvoiceType: '',
                electronicInvoiceTypeOption: ['B2B', 'B2C'],
                remark: '',
            },
        }
    },
    methods: {
        paymentMethodChange() {
            this.defaultData.monthlyBillingDate = '';
            this.defaultData.days = '';
            this.defaultData.otherInstructions = '';
        },
        validationForm() {
            this.$refs.simpleRules.validate().then(success => {
                if (success) {
                    if(this.defaultData.id) {
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
        createMethod() {
            axios
            .post(`${this.apiPath}`, this.defaultData)
            .then(() => {
                this.$toast({
                    component: ToastificationContent,
                    position: 'top-right',
                    props: {
                    title: `${this.$t('createdSuccess')}`,
                    icon: 'CoffeeIcon',
                    variant: 'success',
                    text: `${this.$t('Customer/Manufacturer Data')} ${this.$t('createdSuccess')}!`,
                    },
                })
                this.$router.push({name:'CustomerManufacturerData-CustomerManufacturerDataList'});
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
            .get(`${this.apiPath}/${this.defaultData.id}`)
            .then(response => {
                this.defaultData = response.data;
            })
            .catch(error => console.error (error))
        },
        updateMethod() {
            axios
            .put(`${this.apiPath}/${this.defaultData.id}`, this.defaultData)
            .then(() => {
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
                this.$router.push({name:'CustomerManufacturerData-CustomerManufacturerDataList'});
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
    mounted() {
        if(this.$route.query.id) {
            this.defaultData.id = this.$route.query.id;
            this.editMethod();
        }
    },
}
</script>

<style lang="scss">
@import '@core/scss/vue/libs/vue-select.scss';
@import '@core/scss/vue/libs/vue-flatpicker.scss';
</style>