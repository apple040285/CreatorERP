<template>
    <b-card-code :title="$route.name == 'SystemManagement-FrontendAccountManagementCreate' ?  $t('Create Account') : $t('Edit Account')">
        <validation-observer ref="simpleRules">
            <b-form @submit.prevent>
                <b-row>
                    <!-- staff -->
                    <b-col cols="12">
                        <b-form-group id="staff">
                            <label for="staff">{{ $t('PermissionSetting.staff') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="staff"
                                rules="required"
                            >
                                <v-select
                                    label="name"
                                    v-model="defaultData.staff_id"
                                    :options="staff_option"
                                    :placeholder="$t('PermissionSetting.selectStaff')"
                                    :reduce="option => option.id"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- storehouse -->
                    <b-col cols="12">
                        <b-form-group id="storehouse">
                            <label for="storehouse">{{ $t('PermissionSetting.storehouse') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="storehouse"
                                rules="required"
                            >
                                <v-select
                                    label="name"
                                    v-model="defaultData.storehouse_id"
                                    :options="storehouse_option"
                                    :placeholder="$t('PermissionSetting.selectStorehouse')"
                                    :reduce="option => option.id"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>

                    <!-- account -->
                    <b-col cols="12">
                        <b-form-group
                            :label="$t('PermissionSetting.account')"
                            label-for="fh-account"
                        >
                            <validation-provider
                                #default="{ errors }"
                                name="Account"
                                rules="required"
                            >
                                <b-input-group
                                    class="input-group-merge"
                                    :class="errors.length > 0 ? 'is-invalid' : ''"
                                >
                                    <b-input-group-prepend is-text>
                                        <feather-icon icon="UserIcon"/>
                                    </b-input-group-prepend>
                                    <b-form-input
                                        id="fh-account"
                                        type="text"
                                        v-model="defaultData.email"
                                        :readonly="defaultData.id ? true : false"
                                        :placeholder="$t('PermissionSetting.account')"
                                        :state="errors.length > 0 ? false:null"
                                    />
                                </b-input-group>
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>

                    <!-- Password -->
                    <b-col cols="12">
                        <b-form-group
                            :label="$t('PermissionSetting.password')"
                            label-for="fh-old-password"
                        >
                            <validation-provider
                                #default="{ errors }"
                                name="Password"
                                ref="password"
                                vid="password"
                                :rules="defaultData.id ? '' : 'required'"
                            >
                                <b-input-group
                                    class="input-group-merge"
                                    :class="errors.length > 0 ? 'is-invalid' : ''"
                                >
                                    <b-input-group-prepend is-text>
                                        <feather-icon icon="LockIcon" />
                                    </b-input-group-prepend>
                                    <b-form-input
                                        ref="password"
                                        id="fh-password"
                                        v-model="defaultData.password"
                                        type="password"
                                        :placeholder="$t('PermissionSetting.password')"
                                        :state="errors.length > 0 ? false:null"
                                    />
                                </b-input-group>
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>

                    <!-- Password Confirm -->
                    <b-col cols="12">
                        <b-form-group
                            :label="$t('PermissionSetting.confirmPassword')"
                            label-for="fh-password-confirm"
                        >
                            <validation-provider
                                #default="{ errors }"
                                name="Confirm the password"
                                :rules="defaultData.id ? 'confirmed:password' : 'required|confirmed:password'"
                            >
                                <b-input-group
                                    class="input-group-merge"
                                    :class="errors.length > 0 ? 'is-invalid' : ''"
                                >
                                    <b-input-group-prepend is-text>
                                        <feather-icon icon="LockIcon" />
                                    </b-input-group-prepend>
                                    <b-form-input
                                        id="fh-password-confirm"
                                        v-model="defaultData.password_confirm"
                                        type="password"
                                        :placeholder="$t('PermissionSetting.confirmPassword')"
                                        :state="errors.length > 0 ? false:null"
                                    />
                                </b-input-group>
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- submit -->
                    <b-col>
                        <b-button
                            v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                            type="submit"
                            variant="primary"
                            class="d-block mx-auto"
                            @click.prevent="validationForm"
                        >
                            {{ $t('Submit') }}
                        </b-button>
                    </b-col>
                </b-row>
            </b-form>
        </validation-observer>
    </b-card-code>
</template>

<script>
import BCardCode from '@core/components/b-card-code'
import {
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
} from 'bootstrap-vue'
import vSelect from 'vue-select'
import Ripple from 'vue-ripple-directive'
import { ValidationProvider, ValidationObserver } from 'vee-validate'
import {
    required, confirmed, password,
} from '@validations'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'
import axios from "@axios";

export default {
    components: {
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
        vSelect,
        ToastificationContent
    },
    directives: {
        Ripple,
    },
    data() {
        return {
            apiPath: '/p-members',
            required,
            password,
            confirmed,
            defaultData: {
                email: '',
                password: '',
                password_confirm: '',
                staff_id: '',
                storehouse_id: '',
            },
            staff_option: [],
            storehouse_option: [],
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
                    text: `${this.$t('Frontend Account Management')} ${this.$t('createdSuccess')}!`,
                    },
                })
                this.$router.push({name:'SystemManagement-FrontendAccountManagementList'});
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
                this.defaultData.password = '';
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
                    text: `${this.$t('Frontend Account Management')} ${this.$t('updatedSuccess')}!`,
                    },
                })
                this.$router.push({name:'SystemManagement-FrontendAccountManagementList'});
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
        axios
        .post('staffs/options')
        .then(response => {
            this.staff_option = response.data;
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
            this.storehouse_option = response.data;
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
            this.defaultData.id = this.$route.query.id;
            this.editMethod();
        }
    },
}
</script>

<style lang="scss">
@import '@core/scss/vue/libs/vue-select.scss';
</style>
