<template>
    <b-card>
        <b-row>
            <!-- purchaseDate -->
            <b-col cols="6">
                <b-form-group :label="$t('PurchaseVoucherList.purchaseDate')">
                    <b-form-input
                        :value="basicInformation.purchaseDate"
                        :placeholder="$t('PurchaseVoucherList.purchaseDate')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- purchaseNo -->
            <b-col cols="6">
                <b-form-group :label="$t('PurchaseVoucherList.purchaseNo')">
                    <b-form-input
                        :value="basicInformation.purchaseNo"
                        :placeholder="$t('PurchaseVoucherList.purchaseNo')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Manufacturer -->
            <b-col cols="6">
                <b-form-group :label="$t('PurchaseVoucherList.manufacturer')">
                    <b-form-input
                        :value="basicInformation.manufacturer"
                        :placeholder="$t('PurchaseVoucherList.manufacturer')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Currency -->
            <b-col cols="6">
                <b-form-group :label="$t('PurchaseVoucherList.currency')">
                    <b-form-input
                        :value="basicInformation.currency"
                        :placeholder="$t('PurchaseVoucherList.currency')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Transfer No -->
            <b-col cols="6">
                <b-form-group :label="$t('PurchaseVoucherList.transferNo')">
                    <b-form-input
                        :value="basicInformation.transferNo"
                        :placeholder="$t('PurchaseVoucherList.transferNo')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Project No -->
            <b-col cols="6">
                <b-form-group :label="$t('PurchaseVoucherList.project')">
                    <b-form-input
                        :value="basicInformation.project"
                        :placeholder="$t('PurchaseVoucherList.project')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  purchaseStaff -->
            <b-col cols="6">
                <b-form-group :label="$t('PurchaseVoucherList.purchaseStaff')">
                    <b-form-input
                        :value="basicInformation.purchaseStaff"
                        :placeholder="$t('PurchaseVoucherList.purchaseStaff')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Purchase Department -->
            <b-col cols="6">
                <b-form-group :label="$t('PurchaseVoucherList.purchaseDepartment')">
                    <b-form-input
                        :value="basicInformation.purchaseDepartment"
                        :placeholder="$t('PurchaseVoucherList.purchaseDepartment')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  taxDeductionCategory -->
            <b-col cols="6">
                <b-form-group :label="$t('PurchaseVoucherList.taxDeductionCategory')">
                    <b-form-input
                        :value="basicInformation.taxDeductionCategory"
                        :placeholder="$t('PurchaseVoucherList.taxDeductionCategory')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  accountSettingMethod -->
            <b-col cols="6">
                <b-form-group :label="$t('PurchaseVoucherList.accountSettingMethod')">
                    <b-form-input
                        :value="basicInformation.accountSettingMethod"
                        :placeholder="$t('PurchaseVoucherList.accountSettingMethod')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Pre-Delivery Date -->
            <b-col cols="6">
                <b-form-group :label="$t('PurchaseVoucherList.preDeliveryDate')">
                    <b-form-input
                        :value="basicInformation.preDeliveryDate"
                        :placeholder="$t('PurchaseVoucherList.preDeliveryDate')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  discount -->
            <b-col cols="6">
                <b-form-group :label="$t('PurchaseVoucherList.discount')">
                    <b-form-input
                        :value="basicInformation.discount"
                        :placeholder="$t('PurchaseVoucherList.discount')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  subpoena -->
            <b-col cols="6">
                <b-form-group :label="$t('PurchaseVoucherList.subpoena')">
                    <b-form-input
                        :value="basicInformation.subpoena"
                        :placeholder="$t('PurchaseVoucherList.subpoena')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  otherExpenses -->
            <b-col cols="6">
                <b-form-group :label="$t('PurchaseVoucherList.otherExpenses')">
                    <b-form-input
                        :value="basicInformation.otherExpenses"
                        :placeholder="$t('PurchaseVoucherList.otherExpenses')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  untaxedAmount -->
            <b-col cols="6">
                <b-form-group :label="$t('PurchaseVoucherList.untaxedAmount')">
                    <b-form-input
                        :value="basicInformation.untaxedAmount"
                        :placeholder="$t('PurchaseVoucherList.untaxedAmount')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  tax -->
            <b-col cols="6">
                <b-form-group :label="$t('PurchaseVoucherList.tax')">
                    <b-form-input
                        :value="basicInformation.tax"
                        :placeholder="$t('PurchaseVoucherList.tax')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  total -->
            <b-col cols="6">
                <b-form-group :label="$t('PurchaseVoucherList.total')">
                    <b-form-input
                        :value="basicInformation.total"
                        :placeholder="$t('PurchaseVoucherList.total')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  totalLocalCurrency -->
            <b-col cols="6">
                <b-form-group :label="$t('PurchaseVoucherList.totalLocalCurrency')">
                    <b-form-input
                        :value="basicInformation.totalLocalCurrency"
                        :placeholder="$t('PurchaseVoucherList.totalLocalCurrency')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Status -->
            <b-col cols="6">
                <b-form-group :label="$t('PurchaseVoucherList.status')">
                    <b-form-input
                        :value="basicInformation.status"
                        :placeholder="$t('PurchaseVoucherList.status')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Approval Status -->
            <b-col cols="6">
                <b-form-group :label="$t('PurchaseVoucherList.approvalStatus')">
                    <b-form-input
                        :value="basicInformation.approvalStatus"
                        :placeholder="$t('PurchaseVoucherList.approvalStatus')"
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
                        {{ $t('PurchaseVoucherList.submitBtn')}}
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
                        {{ $t('PurchaseVoucherList.void')}}
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
