<template>
    <b-form @submit.prevent>
        <validation-observer ref="simpleRules">
            <b-card-code :title="$route.name == 'BasicData-AccountDataSettingCreate' ?  $t('AccountList.createAccount') : $t('AccountList.editAccount')">
                <b-row>
                    <!-- code -->
                    <b-col cols="4">
                        <b-form-group id="accountCode">
                            <label for="code">{{ $t('AccountList.code') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="accountCode"
                                rules="required"
                            >
                                <b-form-input
                                    v-model="defaultData.code"
                                    type="text"
                                    :placeholder="$t('AccountList.code')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- category -->
                    <b-col cols="4">
                        <b-form-group id="category">
                            <label for="category">{{ $t('AccountList.category') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="accountCategory"
                                rules="required"
                            >
                                <v-select
                                    v-model="defaultData.category"
                                    :options="defaultData.categoryOption"
                                    :placeholder="$t('AccountList.category')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- bank -->
                    <b-col cols="4">
                        <b-form-group id="bank">
                            <label for="bank">{{ $t('AccountList.bank') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="accountBank"
                                rules="required"
                            >
                                <v-select
                                    v-model="defaultData.bank"
                                    :options="defaultData.bankOption"
                                    :placeholder="$t('AccountList.bank')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <!-- name -->
                    <b-col cols="4">
                        <b-form-group id="name">
                            <label for="name">{{ $t('AccountList.name') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="accountName"
                                rules="required"
                            >
                                <b-form-input
                                    v-model="defaultData.name"
                                    type="text"
                                    :placeholder="$t('AccountList.name')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- currency -->
                    <b-col cols="4">
                        <b-form-group id="currency">
                            <label for="currency">{{ $t('AccountList.currency') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="accountCurrency"
                                rules="required"
                            >
                                <v-select
                                    v-model="defaultData.currency"
                                    :options="defaultData.currencyOption"
                                    :placeholder="$t('AccountList.currency')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- amount -->
                    <b-col cols="4">
                        <b-form-group id="amount">
                            <label for="amount">{{ $t('AccountList.amount') }}</label>
                            <b-form-input
                                v-model="defaultData.amount"
                                type="number"
                                :placeholder="$t('AccountList.amount')"
                            />
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                <!-- remark -->
                    <b-col cols="4">
                        <b-form-group>
                            <label for="remark">{{ $t('AccountList.remark') }}</label>
                            <b-form-textarea
                                :placeholder="$t('AccountList.remark')"
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
                        :to="{ name: 'BasicData-AccountDataSettingList' }"
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
import { ValidationProvider, ValidationObserver } from 'vee-validate'
import { required } from '@validations'
import Ripple from 'vue-ripple-directive'
import axios from "@axios";
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'

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
        ValidationProvider,
        ValidationObserver,
        ToastificationContent
    },
    directives: {
        Ripple,
    },
    data() {
        return {
            apiPath: '/accounts',
            required,
            defaultData: {
                id : null,
                code: '',
                category: '',
                categoryOption: ['現金帳戶', '銀行帳戶'],
                bank: '',
                bankOption: ['中國信託', '土地銀行'],
                name: '',
                currency: '',
                currencyOption: ['台幣', '美金'],
                amount: 0,
                remark: '',
            },
        }
    },
    methods: {
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
                    text: `${this.$t('Bank Data Setting')} ${this.$t('createdSuccess')}!`,
                    },
                })
                this.$router.push({name:'BasicData-BankDataSettingList'});
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
                    text: `${this.$t('Department Data Setting')} ${this.$t('updatedSuccess')}!`,
                    },
                })
                this.$router.push({name:'BasicData-BankDataSettingList'});
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
</style>