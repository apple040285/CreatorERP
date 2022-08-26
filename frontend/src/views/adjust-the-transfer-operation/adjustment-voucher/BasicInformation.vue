<template>
    <b-card>
        <b-row>
            <!-- adjustmentDate -->
            <b-col cols="6">
                <b-form-group :label="$t('AdjustmentVoucherList.adjustmentDate')">
                    <b-form-input
                        :value="basicInformation.adjustmentDate"
                        :placeholder="$t('AdjustmentVoucherList.adjustmentDate')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- adjustmentNo -->
            <b-col cols="6">
                <b-form-group :label="$t('AdjustmentVoucherList.adjustmentNo')">
                    <b-form-input
                        :value="basicInformation.adjustmentNo"
                        :placeholder="$t('AdjustmentVoucherList.adjustmentNo')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- adjustmentCategory -->
            <b-col cols="6">
                <b-form-group :label="$t('AdjustmentVoucherList.adjustmentCategory')">
                    <b-form-input
                        :value="basicInformation.adjustmentCategory"
                        :placeholder="$t('AdjustmentVoucherList.adjustmentCategory')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- adjustmentMethod -->
            <b-col cols="6">
                <b-form-group :label="$t('AdjustmentVoucherList.adjustmentMethod')">
                    <b-form-input
                        :value="basicInformation.adjustmentMethod"
                        :placeholder="$t('AdjustmentVoucherList.adjustmentMethod')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  applicants -->
            <b-col cols="6">
                <b-form-group :label="$t('AdjustmentVoucherList.applicants')">
                    <b-form-input
                        :value="basicInformation.applicants"
                        :placeholder="$t('AdjustmentVoucherList.applicants')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- applicationSector -->
            <b-col cols="6">
                <b-form-group :label="$t('AdjustmentVoucherList.applicationSector')">
                    <b-form-input
                        :value="basicInformation.applicationSector"
                        :placeholder="$t('AdjustmentVoucherList.applicationSector')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  peopleInCharge -->
            <b-col cols="6">
                <b-form-group :label="$t('AdjustmentVoucherList.peopleInCharge')">
                    <b-form-input
                        :value="basicInformation.peopleInCharge"
                        :placeholder="$t('AdjustmentVoucherList.peopleInCharge')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  handlingDepartment -->
            <b-col cols="6">
                <b-form-group :label="$t('AdjustmentVoucherList.handlingDepartment')">
                    <b-form-input
                        :value="basicInformation.handlingDepartment"
                        :placeholder="$t('AdjustmentVoucherList.handlingDepartment')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  subpoena -->
            <b-col cols="6">
                <b-form-group :label="$t('AdjustmentVoucherList.subpoena')">
                    <b-form-input
                        :value="basicInformation.subpoena"
                        :placeholder="$t('AdjustmentVoucherList.subpoena')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Status -->
            <b-col cols="6">
                <b-form-group :label="$t('AdjustmentVoucherList.status')">
                    <b-form-input
                        :value="basicInformation.status"
                        :placeholder="$t('AdjustmentVoucherList.status')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Approval Status -->
            <b-col cols="6">
                <b-form-group :label="$t('AdjustmentVoucherList.approvalStatus')">
                    <b-form-input
                        :value="basicInformation.approvalStatus"
                        :placeholder="$t('AdjustmentVoucherList.approvalStatus')"
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
                        {{ $t('AdjustmentVoucherList.submitBtn')}}
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
                        {{ $t('AdjustmentVoucherList.void')}}
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
