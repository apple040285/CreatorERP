<template>
    <b-card>
        <b-row>
            <!-- salesDate -->
            <b-col cols="6">
                <b-form-group :label="$t('SalesVoucherList.salesDate')">
                    <b-form-input
                        :value="basicInformation.sales_date"
                        :placeholder="$t('SalesVoucherList.salesDate')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- salesNo -->
            <b-col cols="6">
                <b-form-group :label="$t('SalesVoucherList.salesNo')">
                    <b-form-input
                        :value="basicInformation.sales_order_no"
                        :placeholder="$t('SalesVoucherList.salesNo')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- customer -->
            <b-col cols="6">
                <b-form-group :label="$t('SalesVoucherList.customer')">
                    <b-form-input
                        :value="basicInformation.customer_manufacturer.full_name"
                        :placeholder="$t('SalesVoucherList.customer')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Transfer No -->
            <b-col cols="6">
                <b-form-group :label="$t('SalesVoucherList.transferNo')">
                    <b-form-input
                        :value="basicInformation.transferNo"
                        :placeholder="$t('SalesVoucherList.transferNo')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  businessPeople -->
            <b-col cols="6">
                <b-form-group :label="$t('SalesVoucherList.businessPeople')">
                    <b-form-input
                        :value="basicInformation.businessPeople"
                        :placeholder="$t('SalesVoucherList.businessPeople')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Project No -->
            <b-col cols="6">
                <b-form-group :label="$t('SalesVoucherList.project')">
                    <b-form-input
                        :value="basicInformation.project"
                        :placeholder="$t('SalesVoucherList.project')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Department -->
            <b-col cols="6">
                <b-form-group :label="$t('SalesVoucherList.department')">
                    <b-form-input
                        :value="basicInformation.department"
                        :placeholder="$t('SalesVoucherList.department')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  taxDeductionCategory -->
            <b-col cols="6">
                <b-form-group :label="$t('SalesVoucherList.taxDeductionCategory')">
                    <b-form-input
                        :value="basicInformation.taxDeductionCategory"
                        :placeholder="$t('SalesVoucherList.taxDeductionCategory')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  accountSettingMethod -->
            <b-col cols="6">
                <b-form-group :label="$t('SalesVoucherList.accountSettingMethod')">
                    <b-form-input
                        :value="basicInformation.accountSettingMethod"
                        :placeholder="$t('SalesVoucherList.accountSettingMethod')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Currency -->
            <b-col cols="6">
                <b-form-group :label="$t('SalesVoucherList.currency')">
                    <b-form-input
                        :value="basicInformation.currency"
                        :placeholder="$t('SalesVoucherList.currency')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- subpoena -->
            <b-col cols="6">
                <b-form-group :label="$t('SalesVoucherList.subpoena')">
                    <b-form-input
                        :value="basicInformation.subpoena"
                        :placeholder="$t('SalesVoucherList.subpoena')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  untaxedAmount -->
            <b-col cols="6">
                <b-form-group :label="$t('SalesVoucherList.untaxedAmount')">
                    <b-form-input
                        :value="basicInformation.untaxedAmount"
                        :placeholder="$t('SalesVoucherList.untaxedAmount')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  tax -->
            <b-col cols="6">
                <b-form-group :label="$t('SalesVoucherList.tax')">
                    <b-form-input
                        :value="basicInformation.tax"
                        :placeholder="$t('SalesVoucherList.tax')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  total -->
            <b-col cols="6">
                <b-form-group :label="$t('SalesVoucherList.total')">
                    <b-form-input
                        :value="basicInformation.total_amount"
                        :placeholder="$t('SalesVoucherList.total')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  totalLocalCurrency -->
            <b-col cols="6">
                <b-form-group :label="$t('SalesVoucherList.totalLocalCurrency')">
                    <b-form-input
                        :value="basicInformation.totalLocalCurrency"
                        :placeholder="$t('SalesVoucherList.totalLocalCurrency')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Status -->
            <b-col cols="6">
                <b-form-group :label="$t('SalesVoucherList.status')">
                    <b-form-input
                        :value="basicInformation.status"
                        :placeholder="$t('SalesVoucherList.status')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Approval Status -->
            <b-col cols="6">
                <b-form-group :label="$t('SalesVoucherList.approvalStatus')">
                    <b-form-input
                        :value="basicInformation.approvalStatus"
                        :placeholder="$t('SalesVoucherList.approvalStatus')"
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
                        {{ $t('SalesVoucherList.submitBtn')}}
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
                        {{ $t('SalesVoucherList.void')}}
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
