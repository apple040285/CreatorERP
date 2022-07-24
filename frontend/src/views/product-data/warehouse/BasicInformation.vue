<template>
    <b-card>
        <b-row>
            <!-- Code -->
            <b-col cols="6">
                <b-form-group :label="$t('WarehouseList.code')">
                    <b-form-input
                        :value="basicInformation.code"
                        :placeholder="$t('WarehouseList.code')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- name -->
            <b-col cols="6">
                <b-form-group :label="$t('WarehouseList.name')">
                    <b-form-input
                        :value="basicInformation.name"
                        :placeholder="$t('WarehouseList.name')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
        </b-row>
        <b-row>
            <!-- contactPerson -->
            <b-col cols="6">
                <b-form-group :label="$t('WarehouseList.contactPerson')">
                    <b-form-input
                        :value="basicInformation.contact_person"
                        :placeholder="$t('WarehouseList.contactPerson')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- phoneNumber -->
            <b-col cols="6">
                <b-form-group :label="$t('WarehouseList.phoneNumber')">
                    <b-form-input
                        :value="basicInformation.phone"
                        :placeholder="$t('WarehouseList.phoneNumber')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
        </b-row>
        <b-row>
            <!-- fax -->
            <b-col cols="6">
                <b-form-group :label="$t('WarehouseList.fax')">
                    <b-form-input
                        :value="basicInformation.fax"
                        :placeholder="$t('WarehouseList.fax')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- address -->
            <b-col cols="6">
                <b-form-group :label="$t('WarehouseList.address')">
                    <b-form-input
                        :value="basicInformation.address"
                        :placeholder="$t('WarehouseList.address')"
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
