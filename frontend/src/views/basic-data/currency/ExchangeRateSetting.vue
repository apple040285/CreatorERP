<template>
    <b-card>
        <b-form @submit.prevent>
            <validation-observer ref="simpleRules">
                <b-row>
                    <!-- Currency Code -->
                    <b-col cols="6">
                        <b-form-group
                            :label="$t('CurrencyList.currencyCode')"
                            id="currencyCode"
                        >
                            <validation-provider
                                #default="{ errors }"
                                name="currencyCode"
                                rules="required"
                            >
                                <b-form-input
                                    :value="exchangeRateSetting.currencyCode"
                                    :placeholder="$t('CurrencyList.currencyCode')"
                                    type="text"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <b-col cols="6">
                        <b-form-group
                            :label="$t('CurrencyList.adjustTheDate')"
                            label-for="adjustTheDate-datepicker"
                            id="adjustTheDate"
                        >
                            <validation-provider
                                #default="{ errors }"
                                name="adjustTheDate"
                                rules="required"
                            >
                                <flat-pickr
                                    :value="exchangeRateSetting.adjustTheDate"
                                    class="form-control"
                                    :placeholder="$t('CurrencyList.adjustTheDate')"
                                    id="adjustTheDate-datepicker"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- Default Rate -->
                    <b-col cols="6">
                        <b-form-group
                            :label="$t('CurrencyList.defaultRate')"
                            id="defaultRate"
                        >
                            <validation-provider
                                #default="{ errors }"
                                name="defaultRate"
                                rules="required"
                            >
                                <b-form-input
                                    :value="exchangeRateSetting.defaultRate"
                                    :placeholder="$t('CurrencyList.defaultRate')"
                                    type="text"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- Buying Rate -->
                    <b-col cols="6">
                        <b-form-group
                            :label="$t('CurrencyList.buyingRate')"
                            id="defaultRate"
                        >
                            <validation-provider
                                #default="{ errors }"
                                name="buyingRate"
                                rules="required"
                            >
                                <b-form-input
                                    :value="exchangeRateSetting.buyingRate"
                                    :placeholder="$t('CurrencyList.buyingRate')"
                                    type="text"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- Selling Rate -->
                    <b-col cols="6">
                        <b-form-group
                            :label="$t('CurrencyList.sellingRate')"
                            id="defaultRate"
                        >
                            <validation-provider
                                #default="{ errors }"
                                name="sellingRate"
                                rules="required"
                            >
                                <b-form-input
                                    :value="exchangeRateSetting.sellingRate"
                                    :placeholder="$t('CurrencyList.sellingRate')"
                                    type="text"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                </b-row>
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
                            :to="{ name: 'BasicData-CurrencyDataSettingList' }"
                        >
                            {{ $t('back') }}
                        </b-button>
                    </b-col>
                </b-row>
            </validation-observer>
        </b-form>
    </b-card>
</template>

<script>
import {
    BButton, BForm, BFormGroup, BFormInput, BRow, BCol, BCard, BFormTextarea
} from 'bootstrap-vue'
import flatPickr from 'vue-flatpickr-component'
import { ValidationProvider, ValidationObserver } from 'vee-validate'
import { required } from '@validations'
import Ripple from 'vue-ripple-directive'
import store from '@/store/index'

export default {
    components: {
        BButton,
        BForm,
        BFormGroup,
        BFormInput,
        BRow,
        BCol,
        BCard,
        BFormTextarea,
        flatPickr,
        ValidationProvider,
        ValidationObserver,
    },
    directives: {
        Ripple,
    },
    props: {
        exchangeRateSetting: {
            type: Object,
            default: () => {},
        },
    },
    data() {
        return {
            required,
        }
    },
    computed: {
        direction() {
            if (store.state.appConfig.isRTL) {
                // eslint-disable-next-line vue/no-side-effects-in-computed-properties
                this.dir = true
                return this.dir
            }
            // eslint-disable-next-line vue/no-side-effects-in-computed-properties
            this.dir = false
        return this.dir
        },
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
                    //
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
    },
    mounted() {
        if(this.$route.query.id) this.id = this.$route.query.id;
    },
}
</script>

<style lang="scss">
@import '@core/scss/vue/libs/vue-flatpicker.scss';
</style>