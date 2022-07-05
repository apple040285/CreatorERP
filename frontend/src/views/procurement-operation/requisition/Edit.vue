<template>
    <b-card-code :title="$t('RequisitionCreate.createRequisition')">
        <validation-observer ref="simpleRules">
            <b-form @submit.prevent>
                <b-row>
                    <!-- Requisition Date -->
                    <b-col cols="6">
                        <b-form-group
                            label-for="requisitionDate-datepicker"
                        >
                            <validation-provider
                                #default="{ errors }"
                                name="requisitionDate"
                                rules="required"
                            >
                                <flat-pickr
                                    v-model="requisitionDate"
                                    class="form-control"
                                    :placeholder="$t('RequisitionList.requisitionDate')"
                                    id="requisitionDate-datepicker"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- Manufacturer -->
                    <b-col cols="6">
                        <b-form-group>
                            <v-select
                                v-model="manufacturer"
                                label="title"
                                :options="manufacturerOption"
                                :placeholder="$t('RequisitionCreate.selectManufacturer')"
                            />
                        </b-form-group>
                    </b-col>
                    <!-- Currency -->
                    <b-col cols="6">
                        <b-form-group>
                            <validation-provider
                                #default="{ errors }"
                                name="currency"
                                rules="required"
                            >
                                <v-select
                                    v-model="currency"
                                    label="title"
                                    :options="currencyOption"
                                    :placeholder="$t('RequisitionCreate.selectCurrency')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- Transfer No -->
                    <b-col cols="6">
                        <b-form-group>
                            <v-select
                                v-model="transferNo"
                                label="title"
                                :options="transferNoOption"
                                :placeholder="$t('RequisitionCreate.selectTransferNo')"
                            />
                        </b-form-group>
                    </b-col>
                    <!-- Project No -->
                    <b-col cols="6">
                        <b-form-group>
                            <v-select
                                v-model="project"
                                label="title"
                                :options="projectOption"
                                :placeholder="$t('RequisitionCreate.selectProject')"
                            />
                        </b-form-group>
                    </b-col>
                    <!--  Buyer -->
                    <b-col cols="6">
                        <b-form-group>
                            <validation-provider
                                #default="{ errors }"
                                name="buyer"
                                rules="required"
                            >
                                <v-select
                                    v-model="buyer"
                                    label="title"
                                    :options="buyerOption"
                                    :placeholder="$t('RequisitionCreate.selectBuyer')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!--  Purchase Department -->
                    <b-col cols="6">
                        <b-form-group>
                            <validation-provider
                                #default="{ errors }"
                                name="purchaseDepartment"
                                rules="required"
                            >
                                <v-select
                                    v-model="purchaseDepartment"
                                    label="title"
                                    :options="purchaseDepartmentOption"
                                    :placeholder="$t('RequisitionCreate.selectPurchaseDepartment')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!--  Pre-Delivery Date -->
                    <b-col cols="6">
                        <b-form-group
                            label-for="preDeliveryDate-datepicker"
                        >
                            <validation-provider
                                #default="{ errors }"
                                name="preDeliveryDate"
                                rules="required"
                            >
                                <flat-pickr
                                    v-model="preDeliveryDate"
                                    class="form-control"
                                    :placeholder="$t('RequisitionList.preDeliveryDate')"
                                    id="preDeliveryDate-datepicker"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!--  Remark -->
                    <b-col cols="6">
                        <b-form-group>
                            <b-form-textarea
                                :placeholder="$t('RequisitionCreate.remark')"
                                rows="3"
                                v-model="remark"
                            />
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
                            :to="{ name: 'ProcurementOperation-RequisitionList' }"
                        >
                            {{ $t('back') }}
                        </b-button>
                    </b-col>
                </b-row>
            </b-form>
        </validation-observer>
    </b-card-code>
</template>

<script>
import BCardCode from '@core/components/b-card-code'
import vSelect from 'vue-select'
import flatPickr from 'vue-flatpickr-component'
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
    BInputGroupAppend,
    BFormTextarea,
} from 'bootstrap-vue'
import Ripple from 'vue-ripple-directive'
import { ValidationProvider, ValidationObserver } from 'vee-validate'
import { required } from '@validations'

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
        BInputGroupAppend,
        vSelect,
        BFormTextarea,
        flatPickr
    },
    directives: {
        Ripple,
    },
    data() {
        return {
            required,
            requisitionDate: '2022-06-23',
            manufacturer: '台積電',
            manufacturerOption: [{ title: '台積電' }, { title: '日月光' }, { title: '環球晶' }],
            currency: 'NTD',
            currencyOption: [{ title: 'NTD' }, { title: 'USD' }, { title: 'RMB' }, { title: 'JPY' }],
            transferNo: 'A123',
            transferNoOption: [{ title: 'A123' }, { title: 'B123' }, { title: 'C123' }],
            project: '母親節專案',
            projectOption: [{ title: '母親節專案' }, { title: '父親節專案' }],
            buyer: 'dennis',
            buyerOption: [{ title: 'dennis' }, { title: 'ryan' }],
            purchaseDepartment: '人事部',
            purchaseDepartmentOption: [{ title: '人事部' }, { title: '會計部' }],
            preDeliveryDate: '2022-06-30',
            remark: 'test',
            id: ''
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
        if(this.$route.query.id) this.id = this.$route.query.id;
    },
}
</script>

<style lang="scss">
@import '@core/scss/vue/libs/vue-select.scss';
@import '@core/scss/vue/libs/vue-flatpicker.scss';
</style>