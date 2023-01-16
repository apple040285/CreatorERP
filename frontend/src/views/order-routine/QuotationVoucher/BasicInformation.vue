<template>
    <b-card>
        <b-row>
            <!-- 日期 -->
            <b-col cols="6">
                <b-form-group :label="$t('QuotationVoucherList.quotationDate')">
                    <b-form-input
                        :value="basicInformation.quotationDate"
                        :placeholder="$t('QuotationVoucherList.quotationDate')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- 單號 -->
            <b-col cols="6">
                <b-form-group :label="$t('QuotationVoucherList.quotationNo')">
                    <b-form-input
                        :value="basicInformation.quotationNo"
                        :placeholder="$t('QuotationVoucherList.quotationNo')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- 轉入單號 -->
            <b-col cols="6">
                <b-form-group :label="$t('QuotationVoucherList.transferNo')">
                    <b-form-input
                        :value="basicInformation.transferNo"
                        :placeholder="$t('QuotationVoucherList.transferNo')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- 幣別 -->
            <b-col cols="6">
                <b-form-group :label="$t('QuotationVoucherList.currency')">
                    <b-form-input
                        :value="basicInformation.currency"
                        :placeholder="$t('QuotationVoucherList.currency')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--編號 -->
            <b-col cols="6">
                <b-form-group :label="$t('QuotationVoucherList.projectNo')">
                    <b-form-input
                        :value="basicInformation.projectNo"
                        :placeholder="$t('QuotationVoucherList.projectNo')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- 客戶 -->
            <b-col cols="6">
                <b-form-group :label="$t('QuotationVoucherList.customerReservation')">
                    <b-form-input
                        :value="basicInformation.project"
                        :placeholder="$t('QuotationVoucherList.customerReservation')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  有效 -->
            <b-col cols="6">
                <b-form-group :label="$t('QuotationVoucherList.quotationEffectiveDate')">
                    <b-form-input
                        :value="basicInformation.quotationEffectiveDate"
                        :placeholder="$t('QuotationVoucherList.quotationEffectiveDate')"
                        type="date"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  失效 -->
            <b-col cols="6">
                <b-form-group :label="$t('QuotationVoucherList.quotationExpirationDate')">
                    <b-form-input
                        :value="basicInformation.quotationExpirationDate"
                        :placeholder="$t('QuotationVoucherList.quotationExpirationDate')"
                        type="date"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  taxDeductionCategory -->
            <b-col cols="6">
                <b-form-group :label="$t('QuotationVoucherList.taxDeductionCategory')">
                    <b-form-input
                        :value="basicInformation.taxDeductionCategory"
                        :placeholder="$t('QuotationVoucherList.taxDeductionCategory')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
          
            <!--  未稅本幣 -->
            <b-col cols="6">
                <b-form-group :label="$t('QuotationVoucherList.untaxedLocalCurrency')">
                    <b-form-input
                        :value="basicInformation.untaxedLocalCurrency"
                        :placeholder="$t('QuotationVoucherList.untaxedLocalCurrency')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  本幣稅額 -->
            <b-col cols="6">
                <b-form-group :label="$t('QuotationVoucherList.localCurrencyTax')">
                    <b-form-input
                        :value="basicInformation.tax"
                        :placeholder="$t('QuotationVoucherList.localCurrencyTax')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  totalLocalCurrency -->
            <b-col cols="6">
                <b-form-group :label="$t('QuotationVoucherList.totalLocalCurrency')">
                    <b-form-input
                        :value="basicInformation.totalLocalCurrency"
                        :placeholder="$t('QuotationVoucherList.totalLocalCurrency')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Status -->
            <b-col cols="6">
                <b-form-group :label="$t('QuotationVoucherList.status')">
                    <b-form-input
                        :value="basicInformation.status"
                        :placeholder="$t('QuotationVoucherList.status')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Approval Status -->
            <b-col cols="6">
                <b-form-group :label="$t('QuotationVoucherList.approvalStatus')">
                    <b-form-input
                        :value="basicInformation.approvalStatus"
                        :placeholder="$t('QuotationVoucherList.approvalStatus')"
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
                        {{ $t('QuotationVoucherList.submitBtn')}}
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
                        {{ $t('QuotationVoucherList.void')}}
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
