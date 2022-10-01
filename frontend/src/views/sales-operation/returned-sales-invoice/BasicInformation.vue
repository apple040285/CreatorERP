<template>
    <b-card>
        <b-row>
            <!-- returnedDate -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedSalesInvoiceList.returnedDate')">
                    <b-form-input
                        :value="basicInformation.sales_date"
                        :placeholder="$t('ReturnedSalesInvoiceList.returnedDate')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- returnedNo -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedSalesInvoiceList.returnedNo')">
                    <b-form-input
                        :value="basicInformation.sales_order_no"
                        :placeholder="$t('ReturnedSalesInvoiceList.returnedNo')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- customer -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedSalesInvoiceList.customer')">
                    <b-form-input
                        :value="basicInformation.customer_manufacturer.full_name"
                        :placeholder="$t('ReturnedSalesInvoiceList.customer')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- originalSalesNo -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedSalesInvoiceList.originalSalesNo')">
                    <b-form-input
                        :value="basicInformation.originalSalesNo"
                        :placeholder="$t('ReturnedSalesInvoiceList.originalSalesNo')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  businessPeople -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedSalesInvoiceList.businessPeople')">
                    <b-form-input
                        :value="basicInformation.businessPeople"
                        :placeholder="$t('ReturnedSalesInvoiceList.businessPeople')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Project No -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedSalesInvoiceList.project')">
                    <b-form-input
                        :value="basicInformation.project"
                        :placeholder="$t('ReturnedSalesInvoiceList.project')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Department -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedSalesInvoiceList.department')">
                    <b-form-input
                        :value="basicInformation.department"
                        :placeholder="$t('ReturnedSalesInvoiceList.department')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  taxDeductionCategory -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedSalesInvoiceList.taxDeductionCategory')">
                    <b-form-input
                        :value="basicInformation.taxDeductionCategory"
                        :placeholder="$t('ReturnedSalesInvoiceList.taxDeductionCategory')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  accountSettingMethod -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedSalesInvoiceList.accountSettingMethod')">
                    <b-form-input
                        :value="basicInformation.accountSettingMethod"
                        :placeholder="$t('ReturnedSalesInvoiceList.accountSettingMethod')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Currency -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedSalesInvoiceList.currency')">
                    <b-form-input
                        :value="basicInformation.currency"
                        :placeholder="$t('ReturnedSalesInvoiceList.currency')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- subpoena -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedSalesInvoiceList.subpoena')">
                    <b-form-input
                        :value="basicInformation.subpoena"
                        :placeholder="$t('ReturnedSalesInvoiceList.subpoena')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  untaxedAmount -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedSalesInvoiceList.untaxedAmount')">
                    <b-form-input
                        :value="basicInformation.untaxedAmount"
                        :placeholder="$t('ReturnedSalesInvoiceList.untaxedAmount')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  tax -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedSalesInvoiceList.tax')">
                    <b-form-input
                        :value="basicInformation.tax"
                        :placeholder="$t('ReturnedSalesInvoiceList.tax')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  total -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedSalesInvoiceList.total')">
                    <b-form-input
                        :value="basicInformation.total_amount"
                        :placeholder="$t('ReturnedSalesInvoiceList.total')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  totalLocalCurrency -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedSalesInvoiceList.totalLocalCurrency')">
                    <b-form-input
                        :value="basicInformation.totalLocalCurrency"
                        :placeholder="$t('ReturnedSalesInvoiceList.totalLocalCurrency')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Status -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedSalesInvoiceList.status')">
                    <b-form-input
                        :value="basicInformation.status"
                        :placeholder="$t('ReturnedSalesInvoiceList.status')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Approval Status -->
            <b-col cols="6">
                <b-form-group :label="$t('ReturnedSalesInvoiceList.approvalStatus')">
                    <b-form-input
                        :value="basicInformation.approvalStatus"
                        :placeholder="$t('ReturnedSalesInvoiceList.approvalStatus')"
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
                        {{ $t('ReturnedSalesInvoiceList.submitBtn')}}
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
                        {{ $t('ReturnedSalesInvoiceList.void')}}
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
