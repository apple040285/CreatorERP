<template>
    <b-card>
        <b-row>
            <!-- transferDate -->
            <b-col cols="6">
                <b-form-group :label="$t('TransferVoucherList.transferDate')">
                    <b-form-input
                        :value="basicInformation.transferDate"
                        :placeholder="$t('TransferVoucherList.transferDate')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- transferNo -->
            <b-col cols="6">
                <b-form-group :label="$t('TransferVoucherList.transferNo')">
                    <b-form-input
                        :value="basicInformation.transferNo"
                        :placeholder="$t('TransferVoucherList.transferNo')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  applicants -->
            <b-col cols="6">
                <b-form-group :label="$t('TransferVoucherList.applicants')">
                    <b-form-input
                        :value="basicInformation.applicants"
                        :placeholder="$t('TransferVoucherList.applicants')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- applicationSector -->
            <b-col cols="6">
                <b-form-group :label="$t('TransferVoucherList.applicationSector')">
                    <b-form-input
                        :value="basicInformation.applicationSector"
                        :placeholder="$t('TransferVoucherList.applicationSector')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  peopleInCharge -->
            <b-col cols="6">
                <b-form-group :label="$t('TransferVoucherList.peopleInCharge')">
                    <b-form-input
                        :value="basicInformation.peopleInCharge"
                        :placeholder="$t('TransferVoucherList.peopleInCharge')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  handlingDepartment -->
            <b-col cols="6">
                <b-form-group :label="$t('TransferVoucherList.handlingDepartment')">
                    <b-form-input
                        :value="basicInformation.handlingDepartment"
                        :placeholder="$t('TransferVoucherList.handlingDepartment')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Status -->
            <b-col cols="6">
                <b-form-group :label="$t('TransferVoucherList.status')">
                    <b-form-input
                        :value="basicInformation.status"
                        :placeholder="$t('TransferVoucherList.status')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!--  Approval Status -->
            <b-col cols="6">
                <b-form-group :label="$t('TransferVoucherList.approvalStatus')">
                    <b-form-input
                        :value="basicInformation.approvalStatus"
                        :placeholder="$t('TransferVoucherList.approvalStatus')"
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
                        {{ $t('TransferVoucherList.submitBtn')}}
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
                        {{ $t('TransferVoucherList.void')}}
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
