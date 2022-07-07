<template>
    <b-card>
        <b-row>
            <!-- Code -->
            <b-col cols="6">
                <b-form-group :label="$t('BankList.code')">
                    <b-form-input
                        :value="basicInformation.code"
                        :placeholder="$t('BankList.code')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Swift Code -->
            <b-col cols="6">
                <b-form-group :label="$t('BankList.swiftCode')">
                    <b-form-input
                        :value="basicInformation.swiftCode"
                        :placeholder="$t('BankList.swiftCode')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
        </b-row>
        <b-row>
            <!-- Name -->
            <b-col cols="6">
                <b-form-group :label="$t('BankList.name')">
                    <b-form-input
                        :value="basicInformation.name"
                        :placeholder="$t('BankList.name')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- English Name -->
            <b-col cols="6">
                <b-form-group :label="$t('BankList.englishName')">
                    <b-form-input
                        :value="basicInformation.englishName"
                        :placeholder="$t('BankList.englishName')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
        </b-row>
        <b-row>
            <!-- Telephone -->
            <b-col cols="6">
                <b-form-group :label="$t('BankList.telephone')">
                    <b-form-input
                        :value="basicInformation.telephone"
                        :placeholder="$t('BankList.telephone')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Credit Card Fee Rates -->
            <b-col cols="6">
                <b-form-group :label="$t('BankList.creditCardFeeRates')">
                    <b-form-input
                        :value="basicInformation.creditCardFeeRates"
                        :placeholder="$t('BankList.creditCardFeeRates')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
        </b-row>
    </b-card>
</template>

<script>
import {
    BButton, BForm, BFormGroup, BFormInput, BRow, BCol, BCard
} from 'bootstrap-vue'

export default {
    components: {
        BButton,
        BForm,
        BFormGroup,
        BFormInput,
        BRow,
        BCol,
        BCard
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
