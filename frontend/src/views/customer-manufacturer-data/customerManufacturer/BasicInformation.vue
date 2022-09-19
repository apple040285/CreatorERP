<template>
    <b-card>
        <b-row>
            <!-- Code -->
            <b-col cols="6">
                <b-form-group :label="$t('CustomerManufacturerList.code')">
                    <b-form-input
                        :value="basicInformation.code"
                        :placeholder="$t('CustomerManufacturerList.code')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- fullName -->
            <b-col cols="6">
                <b-form-group :label="$t('CustomerManufacturerList.fullName')">
                    <b-form-input
                        :value="basicInformation.full_name"
                        :placeholder="$t('CustomerManufacturerList.fullName')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
        </b-row>
        <b-row>
            <!-- shortName -->
            <b-col cols="6">
                <b-form-group :label="$t('CustomerManufacturerList.shortName')">
                    <b-form-input
                        :value="basicInformation.short_name"
                        :placeholder="$t('CustomerManufacturerList.shortName')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- englishName -->
            <b-col cols="6">
                <b-form-group :label="$t('CustomerManufacturerList.englishName')">
                    <b-form-input
                        :value="basicInformation.alias"
                        :placeholder="$t('CustomerManufacturerList.englishName')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
        </b-row>
        <b-row>
            <!-- belong -->
            <b-col cols="6">
                <b-form-group :label="$t('CustomerManufacturerList.belong')">
                    <b-form-input
                        :value="$t('CustomerManufacturerList.'+basicInformation.category.type)"
                        :placeholder="$t('CustomerManufacturerList.belong')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- category -->
            <b-col cols="6">
                <b-form-group :label="$t('CustomerManufacturerList.category')">
                    <b-form-input
                        :value="basicInformation.category.name"
                        :placeholder="$t('CustomerManufacturerList.category')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
        </b-row>
        <b-row>
            <!-- industry -->
            <b-col cols="6">
                <b-form-group :label="$t('CustomerManufacturerList.industry')">
                    <b-form-input
                        :value="basicInformation.industry"
                        :placeholder="$t('CustomerManufacturerList.industry')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- personInCharge -->
            <b-col cols="6">
                <b-form-group :label="$t('CustomerManufacturerList.personInCharge')">
                    <b-form-input
                        :value="basicInformation.person_in_charge"
                        :placeholder="$t('CustomerManufacturerList.personInCharge')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
        </b-row>
        <b-row>
            <!-- contactPersonOne -->
            <b-col cols="6">
                <b-form-group :label="$t('CustomerManufacturerList.contactPersonOne')">
                    <b-form-input
                        :value="basicInformation.contact_person_one"
                        :placeholder="$t('CustomerManufacturerList.contactPersonOne')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- contactPersonTwo -->
            <b-col cols="6">
                <b-form-group :label="$t('CustomerManufacturerList.contactPersonTwo')">
                    <b-form-input
                        :value="basicInformation.contact_person_two"
                        :placeholder="$t('CustomerManufacturerList.contactPersonTwo')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
        </b-row>
        <b-row>
            <!-- phoneOne -->
            <b-col cols="6">
                <b-form-group :label="$t('CustomerManufacturerList.phoneOne')">
                    <b-form-input
                        :value="basicInformation.phone_one"
                        :placeholder="$t('CustomerManufacturerList.phoneOne')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- phoneTwo -->
            <b-col cols="6">
                <b-form-group :label="$t('CustomerManufacturerList.phoneTwo')">
                    <b-form-input
                        :value="basicInformation.phone_two"
                        :placeholder="$t('CustomerManufacturerList.phoneTwo')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
        </b-row>
        <b-row>
            <!-- email -->
            <b-col cols="6">
                <b-form-group :label="$t('CustomerManufacturerList.email')">
                    <b-form-input
                        :value="basicInformation.email"
                        :placeholder="$t('CustomerManufacturerList.email')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- fax -->
            <b-col cols="6">
                <b-form-group :label="$t('CustomerManufacturerList.fax')">
                    <b-form-input
                        :value="basicInformation.fax"
                        :placeholder="$t('CustomerManufacturerList.fax')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
        </b-row>
        <b-row>
            <!-- unicode -->
            <b-col cols="6">
                <b-form-group :label="$t('CustomerManufacturerList.unicode')">
                    <b-form-input
                        :value="basicInformation.unicode"
                        :placeholder="$t('CustomerManufacturerList.unicode')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- invoiceName -->
            <b-col cols="6">
                <b-form-group :label="$t('CustomerManufacturerList.invoiceName')">
                    <b-form-input
                        :value="basicInformation.invoice_name"
                        :placeholder="$t('CustomerManufacturerList.invoiceName')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
        </b-row>
        <b-row>
            <!-- invoiceAddress -->
            <b-col cols="6">
                <b-form-group :label="$t('CustomerManufacturerList.invoiceAddress')">
                    <b-form-input
                        :value="basicInformation.invoice_address"
                        :placeholder="$t('CustomerManufacturerList.invoiceAddress')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- companyAddress -->
            <b-col cols="6">
                <b-form-group :label="$t('CustomerManufacturerList.companyAddress')">
                    <b-form-input
                        :value="basicInformation.company_address"
                        :placeholder="$t('CustomerManufacturerList.companyAddress')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
        </b-row>
        <b-row>
            <!-- zipCode -->
            <b-col cols="6">
                <b-form-group :label="$t('CustomerManufacturerList.zipCode')">
                    <b-form-input
                        :value="basicInformation.zip_code"
                        :placeholder="$t('CustomerManufacturerList.zipCode')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- currency -->
            <b-col cols="6">
                <b-form-group :label="$t('CustomerManufacturerList.currency')">
                    <b-form-input
                        :value="basicInformation.currency.name"
                        :placeholder="$t('CustomerManufacturerList.currency')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
        </b-row>
        <b-row>
            <!-- taxDeductionCategory -->
            <b-col cols="6">
                <b-form-group :label="$t('CustomerManufacturerList.taxDeductionCategory')">
                    <b-form-input
                        :value="$t('CustomerManufacturerList.'+basicInformation.tax_deduction_category)"
                        :placeholder="$t('CustomerManufacturerList.taxDeductionCategory')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- accountSettingMethod -->
            <b-col cols="6">
                <b-form-group :label="$t('CustomerManufacturerList.accountSettingMethod')">
                    <b-form-input
                        :value="$t('CustomerManufacturerList.'+basicInformation.account_setting_method)"
                        :placeholder="$t('CustomerManufacturerList.accountSettingMethod')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
        </b-row>
        <b-row>
            <!-- businessPeople -->
            <b-col cols="6">
                <b-form-group :label="$t('CustomerManufacturerList.businessPeople')">
                    <b-form-input
                        :value="basicInformation.staff.name"
                        :placeholder="$t('CustomerManufacturerList.businessPeople')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- monthlyBillingDate -->
            <b-col cols="6">
                <b-form-group :label="$t('CustomerManufacturerList.monthlyBillingDate')">
                    <b-form-input
                        :value="basicInformation.monthly_billing_date"
                        :placeholder="$t('CustomerManufacturerList.monthlyBillingDate')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
        </b-row>
        <b-row>
            <!-- paymentMethod -->
            <b-col cols="6">
                <b-form-group :label="$t('CustomerManufacturerList.paymentMethod')">
                    <b-form-input
                        :value="$t('CustomerManufacturerList.'+basicInformation.payment_type)"
                        :placeholder="$t('CustomerManufacturerList.paymentMethod')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- days -->
            <b-col cols="6">
                <b-form-group :label="$t('CustomerManufacturerList.days')">
                    <b-form-input
                        :value="basicInformation.days"
                        :placeholder="$t('CustomerManufacturerList.days')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
        </b-row>
        <b-row>
            <!-- otherInstructions -->
            <b-col cols="6">
                <b-form-group :label="$t('CustomerManufacturerList.otherInstructions')">
                    <b-form-input
                        :value="basicInformation.other_instructions"
                        :placeholder="$t('CustomerManufacturerList.otherInstructions')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- electronicInvoiceType -->
            <b-col cols="6">
                <b-form-group :label="$t('CustomerManufacturerList.electronicInvoiceType')">
                    <b-form-input
                        :value="basicInformation.invoice_type"
                        :placeholder="$t('CustomerManufacturerList.electronicInvoiceType')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
        </b-row>
    </b-card>
</template>

<script>
import {
    BButton, BForm, BFormGroup, BFormInput, BRow, BCol, BCard
} from 'bootstrap-vue'

export default {
    components: {
        BButton,
        BForm,
        BFormGroup,
        BFormInput,
        BRow,
        BCol,
        BCard
    },
    props: {
        basicInformation: {
            type: Object,
            default: () => {},
        },
    },
    mounted() {
        if(this.$route.query.id) this.id = this.$route.query.id;
    },
}
</script>
