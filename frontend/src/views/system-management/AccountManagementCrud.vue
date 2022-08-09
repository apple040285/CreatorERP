<template>
    <b-card-code :title="$t('Create Account')">
        <validation-observer ref="simpleRules">
            <b-form @submit.prevent>
                <b-row>
                    <!-- role -->
                    <b-col cols="12">
                        <b-form-group id="role">
                            <label for="role">{{ $t('PermissionSetting.role') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="role"
                                rules="required"
                            >
                                <v-select
                                    label="name"
                                    v-model="role_id"
                                    :options="roleOption"
                                    :placeholder="$t('PermissionSetting.selectRole')"
                                    :reduce="option => option.id"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- username -->
                    <b-col cols="12">
                        <b-form-group
                            :label="$t('PermissionSetting.name')"
                            label-for="fh-name"
                        >
                            <validation-provider
                                #default="{ errors }"
                                name="Name"
                                rules="required"
                            >
                                <b-input-group
                                    class="input-group-merge"
                                    :class="errors.length > 0 ? 'is-invalid' : ''"
                                >
                                    <b-input-group-prepend is-text>
                                        <feather-icon icon="UserIcon" />
                                    </b-input-group-prepend>
                                    <b-form-input
                                        id="fh-name"
                                        :placeholder="$t('PermissionSetting.name')"
                                        v-model="name"
                                        :state="errors.length > 0 ? false:null"
                                    />
                                </b-input-group>
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
                                        :placeholder="$t('PermissionSetting.account')"
                                        v-model="account"
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
                                rules="required|password"
                            >
                                <b-input-group
                                    class="input-group-merge"
                                    :class="errors.length > 0 ? 'is-invalid' : ''"
                                >
                                    <b-input-group-prepend is-text>
                                        <feather-icon icon="LockIcon" />
                                    </b-input-group-prepend>
                                    <b-form-input
                                        id="fh-password"
                                        v-model="password"
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
                                rules="required|confirmed:password"
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
                                        v-model="passwordConfirm"
                                        type="password"
                                        :placeholder="$t('PermissionSetting.confirmPassword')"
                                        :state="errors.length > 0 ? false:null"
                                    />
                                </b-input-group>
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- staff -->
                    <b-col cols="12">
                        <b-form-group id="staff">
                            <label for="staff">{{ $t('PermissionSetting.staff') }}</label>
                            <v-select
                                label="staff"
                                v-model="staff"
                                :options="staffOption"
                                :placeholder="$t('PermissionSetting.selectStaff')"
                                :reduce="option => option.id"
                            />
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
            role_id: '',
            name: '',
            account: '',
            password: '',
            passwordConfirm: '',
            required,
            password,
            confirmed,
            roleOption: [],
            staff: '',
            staffOption: [],
        }
    },
    methods: {
        validationForm() {
            this.$refs.simpleRules.validate().then(success => {
                if (success) {
                // eslint-disable-next-line
                // alert('form submitted!')
                }
            })
        },
    },
    mounted() {
        axios
        .post('departments/options')
        .then(response => {
            this.roleOption = response.data;
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
        .post('staff/options')
        .then(response => {
            this.staffOption = response.data;
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
}
</script>

<style lang="scss">
@import '@core/scss/vue/libs/vue-select.scss';
</style>