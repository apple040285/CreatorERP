<template>
    <b-card>
        <b-row>
            <!-- 日期 -->
            <b-col cols="6">
                <b-form-group :label="$t('OrderVoucherList.OrderDate')">
                    <b-form-input
                        :value="basicInformation.OrderDate"
                        :placeholder="$t('OrderVoucherList.OrderDate')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- 單號 -->
            <b-col cols="6">
                <b-form-group :label="$t('OrderVoucherList.OrderNo')">
                    <b-form-input
                        :value="basicInformation.OrderNo"
                        :placeholder="$t('OrderVoucherList.OrderNo')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- 轉入單號 -->
            <b-col cols="6">
                <b-form-group :label="$t('OrderVoucherList.transferNo')">
                    <b-form-input
                        :value="basicInformation.transferNo"
                        :placeholder="$t('OrderVoucherList.transferNo')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- 幣別 -->
            <b-col cols="6">
                <b-form-group :label="$t('OrderVoucherList.currency')">
                    <b-form-input
                        :value="basicInformation.currency"
                        :placeholder="$t('OrderVoucherList.currency')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
             <!--專案名稱 -->
             <b-col cols="6">
                <b-form-group :label="$t('OrderVoucherList.project')">
                    <b-form-input
                        :value="basicInformation.project"
                        :placeholder="$t('OrderVoucherList.project')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--編號 -->
            <b-col cols="6">
                <b-form-group :label="$t('OrderVoucherList.projectNo')">
                    <b-form-input
                        :value="basicInformation.projectNo"
                        :placeholder="$t('OrderVoucherList.projectNo')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- 客戶 -->
            <b-col cols="6">
                <b-form-group :label="$t('OrderVoucherList.customerReservation')">
                    <b-form-input
                        :value="basicInformation.project"
                        :placeholder="$t('OrderVoucherList.customerReservation')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  預交日期 -->
            <b-col cols="6">
                <b-form-group :label="$t('OrderVoucherList.OrderEffectiveDate')">
                    <b-form-input
                        :value="basicInformation.OrderEffectiveDate"
                        :placeholder="$t('OrderVoucherList.OrderEffectiveDate')"
                        type="date"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  taxDeductionCategory -->
            <b-col cols="6">
                <b-form-group :label="$t('OrderVoucherList.taxDeductionCategory')">
                    <b-form-input
                        :value="basicInformation.taxDeductionCategory"
                        :placeholder="$t('OrderVoucherList.taxDeductionCategory')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
          
            <!--  未稅本幣 -->
            <b-col cols="6">
                <b-form-group :label="$t('OrderVoucherList.untaxedLocalCurrency')">
                    <b-form-input
                        :value="basicInformation.untaxedLocalCurrency"
                        :placeholder="$t('OrderVoucherList.untaxedLocalCurrency')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  本幣稅額 -->
            <b-col cols="6">
                <b-form-group :label="$t('OrderVoucherList.localCurrencyTax')">
                    <b-form-input
                        :value="basicInformation.tax"
                        :placeholder="$t('OrderVoucherList.localCurrencyTax')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  totalLocalCurrency -->
            <b-col cols="6">
                <b-form-group :label="$t('OrderVoucherList.totalLocalCurrency')">
                    <b-form-input
                        :value="basicInformation.totalLocalCurrency"
                        :placeholder="$t('OrderVoucherList.totalLocalCurrency')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Status -->
            <b-col cols="6">
                <b-form-group :label="$t('OrderVoucherList.status')">
                    <b-form-input
                        :value="basicInformation.status"
                        :placeholder="$t('OrderVoucherList.status')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Approval Status -->
            <b-col cols="6">
                <b-form-group :label="$t('OrderVoucherList.approvalStatus')">
                    <b-form-input
                        :value="basicInformation.approvalStatus"
                        :placeholder="$t('OrderVoucherList.approvalStatus')"
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
                        {{ $t('OrderVoucherList.submitBtn')}}
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
                        {{ $t('OrderVoucherList.void')}}
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
