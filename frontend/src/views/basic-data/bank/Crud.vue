<template>
    <b-form @submit.prevent>
        <validation-observer ref="simpleRules">
            <b-card-code :title="$route.name == 'BasicData-BankDataSettingCreate' ?  $t('BankList.createBank') : $t('BankList.editBank')">
                <b-row>
                    <!-- code -->
                    <b-col cols="4">
                        <b-form-group id="bankCode">
                            <label for="code">{{ $t('BankList.code') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="bankCode"
                                rules="required"
                            >
                                <b-form-input
                                    v-model="defaultData.code"
                                    type="text"
                                    :placeholder="$t('BankList.code')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- swift code -->
                    <b-col cols="4">
                        <b-form-group id="swiftCode">
                            <label for="name">{{ $t('BankList.swiftCode') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="swiftCode"
                                rules="required"
                            >
                                <b-form-input
                                    v-model="defaultData.swift_code"
                                    type="text"
                                    :placeholder="$t('BankList.swiftCode')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- name -->
                    <b-col cols="4">
                        <b-form-group id="bankName">
                            <label for="name">{{ $t('BankList.name') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="bankName"
                                rules="required"
                            >
                                <b-form-input
                                    v-model="defaultData.name"
                                    type="text"
                                    :placeholder="$t('BankList.name')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <!-- englishName -->
                    <b-col cols="4">
                        <b-form-group id="englishName">
                            <label for="englishName">{{ $t('BankList.englishName') }}</label>
                            <b-form-input
                                v-model="defaultData.alias"
                                type="text"
                                :placeholder="$t('BankList.englishName')"
                            />
                        </b-form-group>
                    </b-col>
                    <!-- telephone -->
                    <b-col cols="4">
                        <b-form-group id="telephone">
                            <label for="telephone">{{ $t('BankList.telephone') }}</label>
                            <b-form-input
                                v-model="defaultData.phone"
                                type="text"
                                :placeholder="$t('BankList.telephone')"
                            />
                        </b-form-group>
                    </b-col>
                    <!-- creditCardFeeRates -->
                    <b-col cols="4">
                        <b-form-group id="creditCardFeeRates">
                            <label for="creditCardFeeRates">{{ $t('BankList.creditCardFeeRates') }}</label>
                            <b-form-input
                                v-model="defaultData.rate"
                                type="number"
                                :placeholder="$t('BankList.creditCardFeeRates')"
                            />
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <!-- remark -->
                    <b-col cols="4">
                        <b-form-group>
                            <label for="remark">{{ $t('BankList.remark') }}</label>
                            <b-form-textarea
                                :placeholder="$t('remark')"
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
                        :to="{ name: 'BasicData-BankDataSettingList' }"
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
        BFormGroup,
        BForm,
        BFormInput,
        BFormSelect,
        BFormTextarea,
        BButton,
        ValidationProvider,
        ValidationObserver,
        ToastificationContent
    },
    directives: {
        Ripple,
    },
    data() {
        return {
            apiPath: '/banks',
            required,
            defaultData: {
                id : null,
                code: '',
                swift_code: '',
                name: '',
                alias: '',
                phone: '',
                rate: '0',
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