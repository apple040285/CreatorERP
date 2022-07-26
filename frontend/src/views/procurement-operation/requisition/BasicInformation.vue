<template>
    <b-card>
        <b-row>
            <!-- Requisition Date -->
            <b-col cols="6">
                <b-form-group :label="$t('RequisitionList.requisitionDate')">
                    <b-form-input
                        :value="basicInformation.requisitionDate"
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
                        :value="basicInformation.requisitionNo"
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
                        :value="basicInformation.manufacturer"
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
                        :value="basicInformation.currency"
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
                        :value="basicInformation.transferNo"
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
                        :value="basicInformation.project"
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
                        :value="basicInformation.buyer"
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
                        :value="basicInformation.purchaseDepartment"
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
                        :value="basicInformation.preDeliveryDate"
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
                        :value="basicInformation.totalEstimatedAmount"
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
                        :value="basicInformation.estimatedTotalInLocalCurrency"
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
                        :value="$t('RequisitionList.' + basicInformation.status)"
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
                        :value="$t('RequisitionList.' + basicInformation.approvalStatus)"
                        :placeholder="$t('RequisitionList.approvalStatus')"
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
                        {{ $t('RequisitionList.submitBtn')}}
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
                        {{ $t('RequisitionList.void')}}
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
