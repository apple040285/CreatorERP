<template>
    <b-card>
        <b-row>
            <!-- Code -->
            <b-col cols="6">
                <b-form-group :label="$t('StaffList.code')">
                    <b-form-input
                        :value="basicInformation.code"
                        :placeholder="$t('StaffList.code')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Name -->
            <b-col cols="6">
                <b-form-group :label="$t('StaffList.name')">
                    <b-form-input
                        :value="basicInformation.name"
                        :placeholder="$t('StaffList.name')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
        </b-row>
        <b-row>
            <!-- EnglishName -->
            <b-col cols="6">
                <b-form-group :label="$t('StaffList.englishName')">
                    <b-form-input
                        :value="basicInformation.alias"
                        :placeholder="$t('StaffList.englishName')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Department Name -->
            <b-col cols="6">
                <b-form-group :label="$t('StaffList.departmentName')">
                    <b-form-input
                        :value="basicInformation.department && basicInformation.department.name"
                        :placeholder="$t('StaffList.departmentName')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
        </b-row>
        <b-row>
            <!-- Telephone -->
            <b-col cols="6">
                <b-form-group :label="$t('StaffList.telephone')">
                    <b-form-input
                        :value="basicInformation.telephone"
                        :placeholder="$t('StaffList.telephone')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Cellphone -->
            <b-col cols="6">
                <b-form-group :label="$t('StaffList.cellphone')">
                    <b-form-input
                        :value="basicInformation.cellphone"
                        :placeholder="$t('StaffList.cellphone')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
        </b-row>
        <b-row>
            <!-- JobName -->
            <b-col cols="6">
                <b-form-group :label="$t('StaffList.jobName')">
                    <b-form-input
                        :value="basicInformation.job && basicInformation.job.name"
                        :placeholder="$t('StaffList.jobName')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Residence Address -->
            <b-col cols="6">
                <b-form-group :label="$t('StaffList.residenceAddress')">
                    <b-form-input
                        :value="basicInformation.residence_address"
                        :placeholder="$t('StaffList.residenceAddress')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
        </b-row>
        <b-row>
            <!-- Mailing Address -->
            <b-col cols="6">
                <b-form-group :label="$t('StaffList.mailingAddress')">
                    <b-form-input
                        :value="basicInformation.mailing_address"
                        :placeholder="$t('StaffList.mailingAddress')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Email -->
            <b-col cols="6">
                <b-form-group :label="$t('StaffList.email')">
                    <b-form-input
                        :value="basicInformation.email"
                        :placeholder="$t('StaffList.email')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
        </b-row>
        <b-row>
            <!-- Emergency Contact One -->
            <b-col cols="6">
                <b-form-group :label="$t('StaffList.emergencyContactOne')">
                    <b-form-input
                        :value="basicInformation.emergency_contact_one"
                        :placeholder="$t('StaffList.emergencyContactOne')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Emergency Contact One Number -->
            <b-col cols="6">
                <b-form-group :label="$t('StaffList.emergencyContactOneNumber')">
                    <b-form-input
                        :value="basicInformation.emergency_contact_one_number"
                        :placeholder="$t('StaffList.emergencyContactOneNumber')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
        </b-row>
        <b-row>
            <!-- Emergency Contact Two -->
            <b-col cols="6">
                <b-form-group :label="$t('StaffList.emergencyContactTwo')">
                    <b-form-input
                        :value="basicInformation.emergency_contact_two"
                        :placeholder="$t('StaffList.emergencyContactTwo')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Emergency Contact Two Number -->
            <b-col cols="6">
                <b-form-group :label="$t('StaffList.emergencyContactTwoNumber')">
                    <b-form-input
                        :value="basicInformation.emergency_contact_two_number"
                        :placeholder="$t('StaffList.emergencyContactTwoNumber')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
        </b-row>
        <b-row>
            <!-- Appointment Date -->
            <b-col cols="6">
                <b-form-group :label="$t('StaffList.appointmentDate')">
                    <b-form-input
                        :value="basicInformation.arrival_date"
                        :placeholder="$t('StaffList.appointmentDate')"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-col>
            <!-- Resignation Date -->
            <b-col cols="6">
                <b-form-group :label="$t('StaffList.resignationDate')">
                    <b-form-input
                        :value="basicInformation.resignation_date"
                        :placeholder="$t('StaffList.resignationDate')"
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
    }
}
</script>
