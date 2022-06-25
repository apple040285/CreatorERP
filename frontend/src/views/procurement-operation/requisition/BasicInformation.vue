<template>
    <b-card>
        <b-row>
            <!-- Requisition Date -->
            <b-col cols="6">
                <b-form-group :label="$t('RequisitionList.requisitionDate')">
                    <b-form-input
                        :value="requisitionDate"
                        :placeholder="$t('RequisitionList.requisitionDate')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Requisition No -->
            <b-col cols="6">
                <b-form-group :label="$t('RequisitionList.requisitionNo')">
                    <b-form-input
                        :value="requisitionNo"
                        :placeholder="$t('RequisitionList.requisitionNo')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Manufacturer -->
            <b-col cols="6">
                <b-form-group :label="$t('RequisitionList.manufacturer')">
                    <b-form-input
                        :value="manufacturer"
                        :placeholder="$t('RequisitionList.manufacturer')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Currency -->
            <b-col cols="6">
                <b-form-group :label="$t('RequisitionList.currency')">
                    <b-form-input
                        :value="currency"
                        :placeholder="$t('RequisitionList.currency')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Transfer No -->
            <b-col cols="6">
                <b-form-group :label="$t('RequisitionList.transferNo')">
                    <b-form-input
                        :value="transferNo"
                        :placeholder="$t('RequisitionList.transferNo')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Project No -->
            <b-col cols="6">
                <b-form-group :label="$t('RequisitionList.project')">
                    <b-form-input
                        :value="project"
                        :placeholder="$t('RequisitionList.project')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Buyer -->
            <b-col cols="6">
                <b-form-group :label="$t('RequisitionList.buyer')">
                    <b-form-input
                        :value="buyer"
                        :placeholder="$t('RequisitionList.buyer')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Purchase Department -->
            <b-col cols="6">
                <b-form-group :label="$t('RequisitionList.purchaseDepartment')">
                    <b-form-input
                        :value="purchaseDepartment"
                        :placeholder="$t('RequisitionList.purchaseDepartment')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Pre-Delivery Date -->
            <b-col cols="6">
                <b-form-group :label="$t('RequisitionList.preDeliveryDate')">
                    <b-form-input
                        :value="preDeliveryDate"
                        :placeholder="$t('RequisitionList.preDeliveryDate')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Total Estimated Amount -->
            <b-col cols="6">
                <b-form-group :label="$t('RequisitionList.totalEstimatedAmount')">
                    <b-form-input
                        :value="totalEstimatedAmount"
                        :placeholder="$t('RequisitionList.totalEstimatedAmount')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Estimated Total In Local Currency -->
            <b-col cols="6">
                <b-form-group :label="$t('RequisitionList.estimatedTotalInLocalCurrency')">
                    <b-form-input
                        :value="estimatedTotalInLocalCurrency"
                        :placeholder="$t('RequisitionList.estimatedTotalInLocalCurrency')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Status -->
            <b-col cols="6">
                <b-form-group :label="$t('RequisitionList.status')">
                    <b-form-input
                        :value="$t('RequisitionList.' + status)"
                        :placeholder="$t('RequisitionList.status')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Approval Status -->
            <b-col cols="6">
                <b-form-group :label="$t('RequisitionList.approvalStatus')">
                    <b-form-input
                        :value="$t('RequisitionList.' + approvalStatus)"
                        :placeholder="$t('RequisitionList.approvalStatus')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Remark -->
            <b-col cols="6">
                <b-form-group :label="$t('RequisitionList.remark')">
                    <b-form-textarea
                        :placeholder="$t('RequisitionList.remark')"
                        rows="3"
                        :value="remark"
                        readonly
                    />
                </b-form-group>
            </b-col>
        </b-row>
    </b-card>
</template>

<script>
import {
    BButton, BForm, BFormGroup, BFormInput, BRow, BCol, BCard, BFormTextarea,
} from 'bootstrap-vue'
import flatPickr from 'vue-flatpickr-component'
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
        BFormTextarea,
        flatPickr,
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
    data() {
        return {
            requisitionDate: '2022-06-23',
            requisitionNo: '20220624001',
            manufacturer: '台積電',
            currency: 'NTD',
            transferNo: 'A123',
            project: '母親節專案',
            buyer: 'dennis',
            purchaseDepartment: '人事部',
            preDeliveryDate: '2022-06-30',
            totalEstimatedAmount: '1,000',
            estimatedTotalInLocalCurrency: '1,000',
            status: 'openCase',
            approvalStatus: 'void',
            remark: 'test',
            id: ''
        }
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
