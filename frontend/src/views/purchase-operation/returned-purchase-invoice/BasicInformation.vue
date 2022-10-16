<template>
    <b-card>
        <b-row>
            <!-- returnedDate -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedPurchaseInvoiceList.returnedDate')">
                    <b-form-input
                        :value="basicInformation.returnedDate"
                        :placeholder="$t('ReturnedPurchaseInvoiceList.returnedDate')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- returnedNo -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedPurchaseInvoiceList.returnedNo')">
                    <b-form-input
                        :value="basicInformation.returnedNo"
                        :placeholder="$t('ReturnedPurchaseInvoiceList.returnedNo')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Manufacturer -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedPurchaseInvoiceList.manufacturer')">
                    <b-form-input
                        :value="basicInformation.manufacturer"
                        :placeholder="$t('ReturnedPurchaseInvoiceList.manufacturer')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Currency -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedPurchaseInvoiceList.currency')">
                    <b-form-input
                        :value="basicInformation.currency"
                        :placeholder="$t('ReturnedPurchaseInvoiceList.currency')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Purchase No -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedPurchaseInvoiceList.purchaseNo')">
                    <b-form-input
                        :value="basicInformation.purchaseNo"
                        :placeholder="$t('ReturnedPurchaseInvoiceList.purchaseNo')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Project No -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedPurchaseInvoiceList.project')">
                    <b-form-input
                        :value="basicInformation.project"
                        :placeholder="$t('ReturnedPurchaseInvoiceList.project')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  purchaseStaff -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedPurchaseInvoiceList.purchaseStaff')">
                    <b-form-input
                        :value="basicInformation.purchaseStaff"
                        :placeholder="$t('ReturnedPurchaseInvoiceList.purchaseStaff')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Purchase Department -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedPurchaseInvoiceList.purchaseDepartment')">
                    <b-form-input
                        :value="basicInformation.purchaseDepartment"
                        :placeholder="$t('ReturnedPurchaseInvoiceList.purchaseDepartment')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  taxDeductionCategory -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedPurchaseInvoiceList.taxDeductionCategory')">
                    <b-form-input
                        :value="basicInformation.taxDeductionCategory"
                        :placeholder="$t('ReturnedPurchaseInvoiceList.taxDeductionCategory')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  accountSettingMethod -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedPurchaseInvoiceList.accountSettingMethod')">
                    <b-form-input
                        :value="basicInformation.accountSettingMethod"
                        :placeholder="$t('ReturnedPurchaseInvoiceList.accountSettingMethod')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  subpoena -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedPurchaseInvoiceList.subpoena')">
                    <b-form-input
                        :value="basicInformation.subpoena"
                        :placeholder="$t('ReturnedPurchaseInvoiceList.subpoena')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  otherExpenses -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedPurchaseInvoiceList.otherExpenses')">
                    <b-form-input
                        :value="basicInformation.otherExpenses"
                        :placeholder="$t('ReturnedPurchaseInvoiceList.otherExpenses')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  untaxedAmount -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedPurchaseInvoiceList.untaxedAmount')">
                    <b-form-input
                        :value="basicInformation.untaxedAmount"
                        :placeholder="$t('ReturnedPurchaseInvoiceList.untaxedAmount')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  tax -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedPurchaseInvoiceList.tax')">
                    <b-form-input
                        :value="basicInformation.tax"
                        :placeholder="$t('ReturnedPurchaseInvoiceList.tax')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  total -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedPurchaseInvoiceList.total')">
                    <b-form-input
                        :value="basicInformation.total"
                        :placeholder="$t('ReturnedPurchaseInvoiceList.total')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  totalLocalCurrency -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedPurchaseInvoiceList.totalLocalCurrency')">
                    <b-form-input
                        :value="basicInformation.totalLocalCurrency"
                        :placeholder="$t('ReturnedPurchaseInvoiceList.totalLocalCurrency')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Status -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedPurchaseInvoiceList.status')">
                    <b-form-input
                        :value="basicInformation.status"
                        :placeholder="$t('ReturnedPurchaseInvoiceList.status')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Approval Status -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedPurchaseInvoiceList.approvalStatus')">
                    <b-form-input
                        :value="basicInformation.approvalStatus"
                        :placeholder="$t('ReturnedPurchaseInvoiceList.approvalStatus')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Action -->
            <b-col cols="6">
                <b-form-group :label="$t('action')">
                    <b-button
                        v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                        variant="primary"
                        class="mb-2 mr-2"
                    >
                        {{ $t('ReturnedPurchaseInvoiceList.submitBtn')}}
                    </b-button>
                    <b-button
                        v-if="basicInformation.approvalStatus=='audited'"
                        v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                        variant="danger"
                        class="mb-2 mr-2"
                    >
                        {{ $t('invalid')}}
                    </b-button>
                    <b-button
                        v-if="basicInformation.status=='draft' && basicInformation.approvalStatus!='void'"
                        v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                        variant="secondary"
                        class="mb-2 mr-2"
                    >
                        {{ $t('ReturnedPurchaseInvoiceList.void')}}
                    </b-button>
                </b-form-group>
            </b-col>
        </b-row>
    </b-card>
</template>

<script>
import {
    BButton, BForm, BFormGroup, BFormInput, BRow, BCol, BCard
} from 'bootstrap-vue'
import Ripple from 'vue-ripple-directive'

export default {
    components: {
        BButton,
        BForm,
        BFormGroup,
        BFormInput,
        BRow,
        BCol,
        BCard,
    },
    directives: {
        Ripple,
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
