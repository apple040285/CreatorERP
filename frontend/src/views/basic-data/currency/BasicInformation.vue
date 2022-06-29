<template>
    <b-card>
        <b-row>
            <!-- Currency Code -->
            <b-col cols="6">
                <b-form-group :label="$t('CurrencyList.currencyCode')">
                    <b-form-input
                        :value="basicInformation.currencyCode"
                        :placeholder="$t('CurrencyList.currencyCode')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Currency Name -->
            <b-col cols="6">
                <b-form-group :label="$t('CurrencyList.currencyName')">
                    <b-form-input
                        :value="basicInformation.currencyName"
                        :placeholder="$t('CurrencyList.currencyName')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Created By -->
            <b-col cols="6">
                <b-form-group :label="$t('CurrencyList.created_by')">
                    <b-form-input
                        :value="basicInformation.created_by"
                        :placeholder="$t('CurrencyList.created_by')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Created At -->
            <b-col cols="6">
                <b-form-group :label="$t('CurrencyList.created_at')">
                    <b-form-input
                        :value="basicInformation.created_at"
                        :placeholder="$t('CurrencyList.created_at')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Update By -->
            <b-col cols="6">
                <b-form-group :label="$t('CurrencyList.updated_by')">
                    <b-form-input
                        :value="basicInformation.updated_by"
                        :placeholder="$t('CurrencyList.updated_by')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Updated At -->
            <b-col cols="6">
                <b-form-group :label="$t('CurrencyList.updated_at')">
                    <b-form-input
                        :value="basicInformation.updated_at"
                        :placeholder="$t('CurrencyList.updated_at')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- remark -->
            <b-col cols="6">
                <b-form-group>
                    <label for="remark">{{ $t('remark') }}</label>
                    <b-form-textarea
                        id="remark"
                        :placeholder="$t('remark')"
                        rows="3"
                        :value="basicInformation.remark"
                        autocomplete="off"
                        readonly
                    />
                </b-form-group>
            </b-col>
        </b-row>
    </b-card>
</template>

<script>
import {
    BButton, BForm, BFormGroup, BFormInput, BRow, BCol, BCard, BFormTextarea
} from 'bootstrap-vue'

export default {
    components: {
        BButton,
        BForm,
        BFormGroup,
        BFormInput,
        BRow,
        BCol,
        BCard,
        BFormTextarea
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
