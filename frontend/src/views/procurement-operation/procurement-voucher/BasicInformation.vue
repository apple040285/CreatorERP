<template>
    <b-card>
        <b-row>
            <!-- purchaseDate -->
            <b-col cols="6">
                <b-form-group :label="$t('ProcurementVoucherList.purchaseDate')">
                    <b-form-input
                        :value="basicInformation.purchaseDate"
                        :placeholder="$t('ProcurementVoucherList.purchaseDate')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- purchaseNo -->
            <b-col cols="6">
                <b-form-group :label="$t('ProcurementVoucherList.purchaseNo')">
                    <b-form-input
                        :value="basicInformation.purchaseNo"
                        :placeholder="$t('ProcurementVoucherList.purchaseNo')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Manufacturer -->
            <b-col cols="6">
                <b-form-group :label="$t('ProcurementVoucherList.manufacturer')">
                    <b-form-input
                        :value="basicInformation.manufacturer"
                        :placeholder="$t('ProcurementVoucherList.manufacturer')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Currency -->
            <b-col cols="6">
                <b-form-group :label="$t('ProcurementVoucherList.currency')">
                    <b-form-input
                        :value="basicInformation.currency"
                        :placeholder="$t('ProcurementVoucherList.currency')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Transfer No -->
            <b-col cols="6">
                <b-form-group :label="$t('ProcurementVoucherList.transferNo')">
                    <b-form-input
                        :value="basicInformation.transferNo"
                        :placeholder="$t('ProcurementVoucherList.transferNo')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Project No -->
            <b-col cols="6">
                <b-form-group :label="$t('ProcurementVoucherList.project')">
                    <b-form-input
                        :value="basicInformation.project"
                        :placeholder="$t('ProcurementVoucherList.project')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  procurementStaff -->
            <b-col cols="6">
                <b-form-group :label="$t('ProcurementVoucherList.procurementStaff')">
                    <b-form-input
                        :value="basicInformation.procurementStaff"
                        :placeholder="$t('ProcurementVoucherList.procurementStaff')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Purchase Department -->
            <b-col cols="6">
                <b-form-group :label="$t('ProcurementVoucherList.purchaseDepartment')">
                    <b-form-input
                        :value="basicInformation.purchaseDepartment"
                        :placeholder="$t('ProcurementVoucherList.purchaseDepartment')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  taxDeductionCategory -->
            <b-col cols="6">
                <b-form-group :label="$t('ProcurementVoucherList.taxDeductionCategory')">
                    <b-form-input
                        :value="basicInformation.taxDeductionCategory"
                        :placeholder="$t('ProcurementVoucherList.taxDeductionCategory')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  accountSettingMethod -->
            <b-col cols="6">
                <b-form-group :label="$t('ProcurementVoucherList.accountSettingMethod')">
                    <b-form-input
                        :value="basicInformation.accountSettingMethod"
                        :placeholder="$t('ProcurementVoucherList.accountSettingMethod')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Pre-Delivery Date -->
            <b-col cols="6">
                <b-form-group :label="$t('ProcurementVoucherList.preDeliveryDate')">
                    <b-form-input
                        :value="basicInformation.preDeliveryDate"
                        :placeholder="$t('ProcurementVoucherList.preDeliveryDate')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  deposit -->
            <b-col cols="6">
                <b-form-group :label="$t('ProcurementVoucherList.deposit')">
                    <b-form-input
                        :value="basicInformation.deposit"
                        :placeholder="$t('ProcurementVoucherList.deposit')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  discount -->
            <b-col cols="6">
                <b-form-group :label="$t('ProcurementVoucherList.discount')">
                    <b-form-input
                        :value="basicInformation.discount"
                        :placeholder="$t('ProcurementVoucherList.discount')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  untaxedAmount -->
            <b-col cols="6">
                <b-form-group :label="$t('ProcurementVoucherList.untaxedAmount')">
                    <b-form-input
                        :value="basicInformation.untaxedAmount"
                        :placeholder="$t('ProcurementVoucherList.untaxedAmount')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  tax -->
            <b-col cols="6">
                <b-form-group :label="$t('ProcurementVoucherList.tax')">
                    <b-form-input
                        :value="basicInformation.tax"
                        :placeholder="$t('ProcurementVoucherList.tax')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  total -->
            <b-col cols="6">
                <b-form-group :label="$t('ProcurementVoucherList.total')">
                    <b-form-input
                        :value="basicInformation.total"
                        :placeholder="$t('ProcurementVoucherList.total')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  totalLocalCurrency -->
            <b-col cols="6">
                <b-form-group :label="$t('ProcurementVoucherList.totalLocalCurrency')">
                    <b-form-input
                        :value="basicInformation.totalLocalCurrency"
                        :placeholder="$t('ProcurementVoucherList.totalLocalCurrency')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Status -->
            <b-col cols="6">
                <b-form-group :label="$t('ProcurementVoucherList.status')">
                    <b-form-input
                        :value="basicInformation.status"
                        :placeholder="$t('ProcurementVoucherList.status')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Approval Status -->
            <b-col cols="6">
                <b-form-group :label="$t('ProcurementVoucherList.approvalStatus')">
                    <b-form-input
                        :value="basicInformation.approvalStatus"
                        :placeholder="$t('ProcurementVoucherList.approvalStatus')"
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
                        {{ $t('ProcurementVoucherList.submitBtn')}}
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
                        {{ $t('ProcurementVoucherList.void')}}
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
