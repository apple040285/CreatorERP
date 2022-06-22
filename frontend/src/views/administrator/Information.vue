<template>
    <b-card-code :title="$t('Update Administrator Information')">
        <validation-observer ref="simpleRules">
            <b-form @submit.prevent>
                <b-row>
                    <!-- username -->
                    <b-col cols="12">
                        <b-form-group
                            :label="$t('validations.names.Name')"
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
                                        :placeholder="$t('validations.names.Name')"
                                        v-model="name"
                                        :state="errors.length > 0 ? false:null"
                                    />
                                </b-input-group>
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>

                    <!-- email -->
                    <b-col cols="12">
                        <b-form-group
                            :label="$t('validations.names.Email')"
                            label-for="fh-email"
                        >
                            <b-input-group class="input-group-merge">
                                <b-input-group-prepend is-text>
                                    <feather-icon icon="MailIcon"/>
                                </b-input-group-prepend>
                                <b-form-input
                                    id="fh-email"
                                    type="email"
                                    :placeholder="$t('validations.names.Email')"
                                    v-model="emailValue"
                                    readonly
                                />
                            </b-input-group>
                        </b-form-group>
                    </b-col>

                    <!-- Old Password -->
                    <b-col cols="12">
                        <b-form-group
                            :label="$t('validations.names.Old Password')"
                            label-for="fh-old-password"
                        >
                            <validation-provider
                                #default="{ errors }"
                                name="Old Password"
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
                                        id="fh-old-password"
                                        v-model="oldPassword"
                                        type="password"
                                        :placeholder="$t('validations.names.Old Password')"
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
                            :label="$t('validations.names.New Password')"
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
                                        v-model="newPassword"
                                        type="password"
                                        :placeholder="$t('validations.names.New Password')"
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
                            :label="$t('validations.names.Confirm the new password')"
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
                                        v-model="newPasswordConfirm"
                                        type="password"
                                        :placeholder="$t('validations.names.Confirm the new password')"
                                        :state="errors.length > 0 ? false:null"
                                    />
                                </b-input-group>
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>

                    <!-- submit and reset -->
                    <b-col>
                        <b-button
                            v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                            type="submit"
                            variant="primary"
                            class="mr-1 text-right"
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
    required, email, confirmed, password,
} from '@validations'

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
            name: '',
            oldPassword: '',
            newPassword: '',
            newPasswordConfirm: '',
            emailValue: '',
            required,
            password,
            email,
            confirmed,
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
        this.$store.dispatch('auth/checkUser')
            .then(response => {
                this.name = response.data.name;
                this.emailValue = response.data.email;
            })
    },
}
</script>
