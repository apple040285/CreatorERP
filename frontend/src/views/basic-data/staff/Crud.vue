<template>
    <b-form @submit.prevent>
        <validation-observer ref="simpleRules">
            <b-card-code :title="$route.name == 'BasicData-StaffDataSettingCreate' ?  $t('StaffList.createStaff') : $t('StaffList.editStaff')">
                <b-row>
                    <!-- code -->
                    <b-col cols="4">
                        <b-form-group id="staffCode">
                            <label for="code">{{ $t('StaffList.code') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="staffCode"
                                rules="required"
                            >
                                <b-form-input
                                    v-model="code"
                                    type="text"
                                    :placeholder="$t('StaffList.code')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- name -->
                    <b-col cols="4">
                        <b-form-group id="staffName">
                            <label for="name">{{ $t('StaffList.name') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="staffName"
                                rules="required"
                            >
                                <b-form-input
                                    v-model="name"
                                    type="text"
                                    :placeholder="$t('StaffList.name')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- englishName -->
                    <b-col cols="4">
                        <b-form-group id="englishName">
                            <label for="englishName">{{ $t('StaffList.englishName') }}</label>
                            <b-form-input
                                v-model="englishName"
                                type="text"
                                :placeholder="$t('StaffList.englishName')"
                            />
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <!-- departmentName -->
                    <b-col cols="4">
                        <b-form-group id="departmentName">
                            <label for="departmentName">{{ $t('StaffList.departmentName') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="departmentName"
                                rules="required"
                            >
                                <v-select
                                    v-model="departmentName"
                                    :options="departmentNameOption"
                                    :placeholder="$t('StaffList.departmentName')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- telephone -->
                    <b-col cols="4">
                        <b-form-group id="telephone">
                            <label for="telephone">{{ $t('StaffList.telephone') }}</label>
                            <b-form-input
                                v-model="telephone"
                                type="text"
                                :placeholder="$t('StaffList.telephone')"
                            />
                        </b-form-group>
                    </b-col>
                    <!-- cellphone -->
                    <b-col cols="4">
                        <b-form-group id="cellphone">
                            <label for="cellphone">{{ $t('StaffList.cellphone') }}</label>
                            <b-form-input
                                v-model="cellphone"
                                type="text"
                                :placeholder="$t('StaffList.cellphone')"
                            />
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <!-- jobName -->
                    <b-col cols="4">
                        <b-form-group id="jobName">
                            <label for="jobName">{{ $t('StaffList.jobName') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="jobName"
                                rules="required"
                            >
                                <v-select
                                    v-model="jobName"
                                    :options="jobNameOption"
                                    :placeholder="$t('StaffList.jobName')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- residenceAddress -->
                    <b-col cols="4">
                        <b-form-group id="residenceAddress">
                            <label for="residenceAddress">{{ $t('StaffList.residenceAddress') }}</label>
                            <b-form-input
                                v-model="residenceAddress"
                                type="text"
                                :placeholder="$t('StaffList.residenceAddress')"
                            />
                        </b-form-group>
                    </b-col>
                    <!-- mailingAddress -->
                    <b-col cols="4">
                        <b-form-group id="mailingAddress">
                            <label for="mailingAddress">{{ $t('StaffList.mailingAddress') }}</label>
                            <b-form-input
                                v-model="mailingAddress"
                                type="text"
                                :placeholder="$t('StaffList.mailingAddress')"
                            />
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <!-- email -->
                    <b-col cols="4">
                        <b-form-group id="email">
                            <label for="email">{{ $t('StaffList.email') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="Email"
                                rules="email"
                            >
                                <b-form-input
                                    v-model="email"
                                    type="text"
                                    :placeholder="$t('StaffList.email')"
                                />
                            <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- emergencyContactOne -->
                    <b-col cols="4">
                        <b-form-group id="emergencyContactOne">
                            <label for="emergencyContactOne">{{ $t('StaffList.emergencyContactOne') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="emergencyContactOne"
                                rules="required"
                            >
                                <b-form-input
                                    v-model="emergencyContactOne"
                                    type="text"
                                    :placeholder="$t('StaffList.emergencyContactOne')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- emergencyContactOneNumber -->
                    <b-col cols="4">
                        <b-form-group id="emergencyContactOneNumber">
                            <label for="emergencyContactOneNumber">{{ $t('StaffList.emergencyContactOneNumber') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="emergencyContactOneNumber"
                                rules="required"
                            >
                                <b-form-input
                                    v-model="emergencyContactOneNumber"
                                    type="text"
                                    :placeholder="$t('StaffList.emergencyContactOneNumber')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <!-- emergencyContactTwo -->
                    <b-col cols="4">
                        <b-form-group id="emergencyContactTwo">
                            <label for="emergencyContactTwo">{{ $t('StaffList.emergencyContactTwo') }}</label>
                            <b-form-input
                                v-model="emergencyContactTwo"
                                type="text"
                                :placeholder="$t('StaffList.emergencyContactTwo')"
                            />
                        </b-form-group>
                    </b-col>
                    <!-- emergencyContactTwoNumber -->
                    <b-col cols="4">
                        <b-form-group id="emergencyContactTwoNumber">
                            <label for="emergencyContactTwoNumber">{{ $t('StaffList.emergencyContactTwoNumber') }}</label>
                            <b-form-input
                                v-model="emergencyContactTwoNumber"
                                type="text"
                                :placeholder="$t('StaffList.emergencyContactTwoNumber')"
                            />
                        </b-form-group>
                    </b-col>
                    <!-- appointmentDate -->
                    <b-col cols="4">
                        <b-form-group
                            label-for="appointmentDate-datepicker"
                            id="appointmentDate"
                        >
                            <label for="appointmentDate">{{ $t('StaffList.appointmentDate') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="appointmentDate"
                                rules="required"
                            >
                                <flat-pickr
                                    v-model="appointmentDate"
                                    class="form-control"
                                    :placeholder="$t('StaffList.appointmentDate')"
                                    id="appointmentDate-datepicker"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <!-- resignationDate -->
                    <b-col cols="4">
                        <b-form-group
                            label-for="resignationDate-datepicker"
                            id="resignationDate"
                        >
                            <label for="resignationDate">{{ $t('StaffList.resignationDate') }}</label>
                            <flat-pickr
                                v-model="resignationDate"
                                class="form-control"
                                :placeholder="$t('StaffList.resignationDate')"
                                id="resignationDate-datepicker"
                            />
                        </b-form-group>
                    </b-col>
                    <!-- remark -->
                    <b-col cols="4">
                        <b-form-group>
                            <label for="remark">{{ $t('StaffList.remark') }}</label>
                            <b-form-textarea
                                :placeholder="$t('remark')"
                                rows="3"
                                v-model="remark"
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
                        :to="{ name: 'BasicData-StaffDataSettingList' }"
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
import { required, email } from '@validations'
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
            apiPath: '/staffs',
            required,
            email,
            defaultData: {
                code: '',
                name: '',
                englishName: '',
                departmentName: '',
                departmentNameOption: ['人事部', '會計部'],
                telephone: '',
                cellphone: '',
                jobName: '',
                jobNameOption: ['主管', '員工'],
                residenceAddress: '',
                mailingAddress: '',
                emergencyContactOne: '',
                emergencyContactOneNumber: '',
                emergencyContactTwo: '',
                emergencyContactTwoNumber: '',
                appointmentDate: '',
                resignationDate: '',
                email: '',
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
                    text: `${this.$t('Staff Data Setting')} ${this.$t('createdSuccess')}!`,
                    },
                })
                this.$router.push({name:'BasicData-StaffDataSettingList'});
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
                this.$router.push({name:'BasicData-StaffDataSettingList'});
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