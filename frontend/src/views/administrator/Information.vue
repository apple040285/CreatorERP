<template>
    <b-card-code :title="$t('Change Password')">
        <validation-observer ref="simpleRules">
            <b-form @submit.prevent>
                <b-row>
                    <!-- username -->
                    <b-col cols="12">
                        <b-form-group
                            :label="$t('PermissionSetting.name')"
                            label-for="fh-name"
                        >
                            <b-input-group
                                class="input-group-merge"
                            >
                                <b-input-group-prepend is-text>
                                    <feather-icon icon="UserIcon" />
                                </b-input-group-prepend>
                                <b-form-input
                                    id="fh-name"
                                    v-model="defaultData.name"
                                    readonly
                                    :placeholder="$t('PermissionSetting.name')"
                                />
                            </b-input-group>
                        </b-form-group>
                    </b-col>

                    <!-- account -->
                    <b-col cols="12">
                        <b-form-group
                            :label="$t('PermissionSetting.account')"
                            label-for="fh-account"
                        >
                            <b-input-group class="input-group-merge">
                                <b-input-group-prepend is-text>
                                    <feather-icon icon="UserIcon"/>
                                </b-input-group-prepend>
                                <b-form-input
                                    id="fh-account"
                                    type="text"
                                    :placeholder="$t('PermissionSetting.account')"
                                    v-model="defaultData.account"
                                    readonly
                                />
                            </b-input-group>
                        </b-form-group>
                    </b-col>

                    <!-- Old Password -->
                    <b-col cols="12">
                        <b-form-group
                            :label="$t('PermissionSetting.oldPassword')"
                            label-for="fh-old-password"
                        >
                            <validation-provider
                                #default="{ errors }"
                                name="Old Password"
                                rules="required"
                            >
                                <b-input-group
                                    class="input-group-merge"
                                    :class="errors.length > 0 ? 'is-invalid' : ''"
                                >
                                    <b-input-group-prepend is-text>
                                        <feather-icon icon="LockIcon" />
                                    </b-input-group-prepend>
                                    <b-form-input
                                        id="fh-old-password"
                                        v-model="defaultData.currentPassword"
                                        type="password"
                                        :placeholder="$t('PermissionSetting.oldPassword')"
                                        :state="errors.length > 0 ? false:null"
                                    />
                                </b-input-group>
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>

                    <!-- New Password -->
                    <b-col cols="12">
                        <b-form-group
                            :label="$t('PermissionSetting.newPassword')"
                            label-for="fh-new-password"
                        >
                            <validation-provider
                                #default="{ errors }"
                                name="New Password"
                                vid="New Password"
                                rules="required"
                            >
                                <b-input-group
                                    class="input-group-merge"
                                    :class="errors.length > 0 ? 'is-invalid' : ''"
                                >
                                    <b-input-group-prepend is-text>
                                        <feather-icon icon="LockIcon" />
                                    </b-input-group-prepend>
                                    <b-form-input
                                        id="fh-new-password"
                                        v-model="defaultData.newPassword"
                                        type="password"
                                        :placeholder="$t('PermissionSetting.newPassword')"
                                        :state="errors.length > 0 ? false:null"
                                    />
                                </b-input-group>
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>

                    <!-- New Password Confirm -->
                    <b-col cols="12">
                        <b-form-group
                            :label="$t('PermissionSetting.confirmPassword')"
                            label-for="fh-new-password-confirm"
                        >
                            <validation-provider
                                #default="{ errors }"
                                name="Confirm the new password"
                                rules="required|confirmed:New Password"
                            >
                                <b-input-group
                                    class="input-group-merge"
                                    :class="errors.length > 0 ? 'is-invalid' : ''"
                                >
                                    <b-input-group-prepend is-text>
                                        <feather-icon icon="LockIcon" />
                                    </b-input-group-prepend>
                                    <b-form-input
                                        id="fh-new-password-confirm"
                                        v-model="defaultData.newPasswordConfirm"
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
import Ripple from 'vue-ripple-directive'
import { ValidationProvider, ValidationObserver } from 'vee-validate'
import {
    required, confirmed
} from '@validations'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'
import axios from "@axios";
import useJwt from '@/auth/jwt/useJwt'

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
    },
    directives: {
        Ripple,
    },
    data() {
        return {
            apiPath: '/auth/reset/password',
            defaultData: {
                name: '',
                account: '',
                currentPassword: '',
                newPassword: '',
                newPasswordConfirm: '',
            },
            required,
            confirmed,
        }
    },
    methods: {
        validationForm() {
            this.$refs.simpleRules.validate().then(success => {
                console.log(success);
                if (success) {
                    this.updateMethod();
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
        updateMethod() {
            axios
            .post(`${this.apiPath}`, this.defaultData)
            .then(() => {
                this.$toast({
                    component: ToastificationContent,
                    position: 'top-right',
                    props: {
                    title: `${this.$t('updatedSuccess')}`,
                    icon: 'CoffeeIcon',
                    variant: 'success',
                    text: `${this.$t('PermissionSetting.password')} ${this.$t('updatedSuccess')}!`,
                    },
                })
                this.logout();
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
        logout() {
            // Remove userData from localStorage
            // ? You just removed token from localStorage. If you like, you can also make API call to backend to blacklist used token
            localStorage.removeItem(useJwt.jwtConfig.storageTokenKeyName)
            localStorage.removeItem(useJwt.jwtConfig.storageRefreshTokenKeyName)

            // Remove userData from localStorage
            localStorage.removeItem('userData')

            // Reset ability
            // this.$ability.update(initialAbility)

            // Redirect to login page
            this.$router.push({ name: 'auth-login' })
        },
    },
    mounted() {
        this.$store.dispatch('auth/checkUser')
            .then(response => {
                this.defaultData.name = response.data.user.name;
                this.defaultData.account = response.data.user.account;
            })
    },
}
</script>
