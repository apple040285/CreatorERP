<template>
    <b-card>
        <b-row>
            <!-- Code -->
            <b-col cols="6">
                <b-form-group :label="$t('AccountList.code')">
                    <b-form-input
                        :value="basicInformation.code"
                        :placeholder="$t('AccountList.code')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Category -->
            <b-col cols="6">
                <b-form-group :label="$t('AccountList.category')">
                    <b-form-input
                        :value="$t('AccountList.'+basicInformation.type)"
                        :placeholder="$t('AccountList.category')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
        </b-row>
        <b-row>
            <!-- Bank -->
            <b-col cols="6">
                <b-form-group :label="$t('AccountList.bank')">
                    <b-form-input
                        :value="basicInformation.bank && basicInformation.bank.name"
                        :placeholder="$t('AccountList.bank')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Name -->
            <b-col cols="6">
                <b-form-group :label="$t('AccountList.name')">
                    <b-form-input
                        :value="basicInformation.name"
                        :placeholder="$t('AccountList.name')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
        </b-row>
        <b-row>
            <!-- Currency -->
            <b-col cols="6">
                <b-form-group :label="$t('AccountList.currency')">
                    <b-form-input
                        :value="basicInformation.currency && basicInformation.currency.name"
                        :placeholder="$t('AccountList.currency')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- amount -->
            <b-col cols="6">
                <b-form-group :label="$t('AccountList.amount')">
                    <b-form-input
                        :value="basicInformation.amount"
                        :placeholder="$t('AccountList.amount')"
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
}
</script>
