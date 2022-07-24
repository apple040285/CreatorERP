<template>
    <b-form @submit.prevent>
        <validation-observer ref="simpleRules">
            <b-card-code :title="$route.name == 'ProductData-WarehouseDataSettingCreate' ?  $t('WarehouseList.createWarehouse') : $t('WarehouseList.editWarehouse')">
                <b-row>
                    <!-- code -->
                    <b-col cols="4">
                        <b-form-group id="warehouseCode">
                            <label for="code">{{ $t('WarehouseList.code') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="warehouseCode"
                                rules="required"
                            >
                                <b-form-input
                                    v-model="defaultData.code"
                                    type="text"
                                    :placeholder="$t('WarehouseList.code')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- name -->
                    <b-col cols="4">
                        <b-form-group id="warehouseName">
                            <label for="name">{{ $t('WarehouseList.name') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="warehouseName"
                                rules="required"
                            >
                                <b-form-input
                                    v-model="defaultData.name"
                                    type="text"
                                    :placeholder="$t('WarehouseList.name')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- contactPerson -->
                    <b-col cols="4">
                        <b-form-group id="contactPerson">
                            <label for="contactPerson">{{ $t('WarehouseList.contactPerson') }}</label>
                            <b-form-input
                                v-model="defaultData.contact_person"
                                type="text"
                                :placeholder="$t('WarehouseList.contactPerson')"
                            />
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <!-- phoneNumber -->
                    <b-col cols="4">
                        <b-form-group id="phoneNumber">
                            <label for="phoneNumber">{{ $t('WarehouseList.phoneNumber') }}</label>
                            <b-form-input
                                v-model="defaultData.phone"
                                type="text"
                                :placeholder="$t('WarehouseList.phoneNumber')"
                            />
                        </b-form-group>
                    </b-col>
                    <!-- fax -->
                    <b-col cols="4">
                        <b-form-group id="fax">
                            <label for="fax">{{ $t('WarehouseList.fax') }}</label>
                            <b-form-input
                                v-model="defaultData.fax"
                                type="text"
                                :placeholder="$t('WarehouseList.fax')"
                            />
                        </b-form-group>
                    </b-col>
                    <!-- address -->
                    <b-col cols="4">
                        <b-form-group id="address">
                            <label for="address">{{ $t('WarehouseList.address') }}</label>
                            <b-form-input
                                v-model="defaultData.address"
                                type="text"
                                :placeholder="$t('WarehouseList.address')"
                            />
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                <!-- remark -->
                    <b-col cols="4">
                        <b-form-group>
                            <label for="remark">{{ $t('WarehouseList.remark') }}</label>
                            <b-form-textarea
                                :placeholder="$t('WarehouseList.remark')"
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
                        :to="{ name: 'ProductData-WarehouseDataSettingList' }"
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
        ValidationProvider,
        ValidationObserver,
        ToastificationContent
    },
    directives: {
        Ripple,
    },
    data() {
        return {
            apiPath: '/storehouses',
            required,
            defaultData: {
                id : null,
                code: '',
                name: '',
                contact_person: '',
                phone: '',
                fax: '',
                address: '',
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
                    text: `${this.$t('Warehouse Data Setting')} ${this.$t('createdSuccess')}!`,
                    },
                })
                this.$router.push({name:'ProductData-WarehouseDataSettingList'});
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
                    text: `${this.$t('Warehouse Data Setting')} ${this.$t('updatedSuccess')}!`,
                    },
                })
                this.$router.push({name:'ProductData-WarehouseDataSettingList'});
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