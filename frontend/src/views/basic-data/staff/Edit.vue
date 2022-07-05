<template>
    <b-card-code :title="$route.name == 'BasicData-StaffCreate' ?  $t('StaffList.createStaff') : $t('StaffList.editStaff')">
        <b-form @submit.prevent>
            <validation-observer ref="simpleRules">
                <b-row>
                    <!-- code -->
                    <b-col cols="4">
                        <b-form-group id="code">
                            <label for="code">{{ $t('StaffList.code') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="code"
                                rules="required"
                            >
                                <b-form-input
                                    v-model="showData.code"
                                    type="text"
                                    :placeholder="$t('StaffList.code')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- name -->
                    <b-col cols="4">
                        <b-form-group id="name">
                            <label for="name">{{ $t('StaffList.name') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="name"
                                rules="required"
                            >
                                <b-form-input
                                    v-model="showData.name"
                                    type="text"
                                    :placeholder="$t('StaffList.name')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- english_name -->
                    <b-col cols="4">
                        <b-form-group id="english_name">
                            <label for="english_name">{{ $t('StaffList.english_name') }}</label>
                            <b-form-input
                                v-model="showData.english_name"
                                type="text"
                                :placeholder="$t('StaffList.english_name')"
                            />
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <!-- department -->
                    <b-col cols="4">
                        <b-form-group id="department">
                            <label for="department">{{ $t('StaffList.department') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="department"
                                rules="required"
                            >
                                <v-select
                                    v-model="showData.department"
                                    :options="departmentOption"
                                    :placeholder="$t('StaffList.department')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- telephone -->
                    <b-col cols="4">
                        <b-form-group id="telephone">
                            <label for="telephone">{{ $t('StaffList.telephone') }}</label>
                            <b-form-input
                                v-model="showData.telephone"
                                type="text"
                                :placeholder="$t('StaffList.telephone')"
                            />
                        </b-form-group>
                    </b-col>
                    <!-- cellphone -->
                    <b-col cols="4">
                        <b-form-group id="cellphone">
                            <label for="cellphone">{{ $t('StaffList.cellphone') }}</label>
                            <b-form-input
                                v-model="showData.cellphone"
                                type="text"
                                :placeholder="$t('StaffList.cellphone')"
                            />
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <!-- jobName -->
                    <b-col cols="4">
                        <b-form-group id="jobName">
                            <label for="jobName">{{ $t('StaffList.jobName') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="jobName"
                                rules="required"
                            >
                                <v-select
                                    v-model="showData.jobName"
                                    :options="jobNameOption"
                                    :placeholder="$t('StaffList.jobName')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- residenceAddress -->
                    <b-col cols="4">
                        <b-form-group id="residenceAddress">
                            <label for="residenceAddress">{{ $t('StaffList.residenceAddress') }}</label>
                            <b-form-input
                                v-model="showData.residenceAddress"
                                type="text"
                                :placeholder="$t('StaffList.residenceAddress')"
                            />
                        </b-form-group>
                    </b-col>
                    <!-- mailingAddress -->
                    <b-col cols="4">
                        <b-form-group id="mailingAddress">
                            <label for="mailingAddress">{{ $t('StaffList.mailingAddress') }}</label>
                            <b-form-input
                                v-model="showData.mailingAddress"
                                type="text"
                                :placeholder="$t('StaffList.mailingAddress')"
                            />
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <!-- emergencyContactOne -->
                    <b-col cols="4">
                        <b-form-group id="emergencyContactOne">
                            <label for="emergencyContactOne">{{ $t('StaffList.emergencyContactOne') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="emergencyContactOne"
                                rules="required"
                            >
                                <b-form-input
                                    v-model="showData.emergencyContactOne"
                                    type="text"
                                    :placeholder="$t('StaffList.emergencyContactOne')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- emergencyContactOneNumber -->
                    <b-col cols="4">
                        <b-form-group id="emergencyContactOneNumber">
                            <label for="emergencyContactOneNumber">{{ $t('StaffList.emergencyContactOneNumber') }}</label>
                            <validation-provider
                                #default="{ errors }"
                                name="emergencyContactOneNumber"
                                rules="required"
                            >
                                <b-form-input
                                    v-model="showData.emergencyContactOneNumber"
                                    type="text"
                                    :placeholder="$t('StaffList.emergencyContactOneNumber')"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- emergencyContactTwo -->
                    <b-col cols="4">
                        <b-form-group id="emergencyContactTwo">
                            <label for="emergencyContactTwo">{{ $t('StaffList.emergencyContactTwo') }}</label>
                            <b-form-input
                                v-model="showData.emergencyContactTwo"
                                type="text"
                                :placeholder="$t('StaffList.emergencyContactTwo')"
                            />
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <!-- emergencyContactTwoNumber -->
                    <b-col cols="4">
                        <b-form-group id="emergencyContactTwoNumber">
                            <label for="emergencyContactTwoNumber">{{ $t('StaffList.emergencyContactTwoNumber') }}</label>
                            <b-form-input
                                v-model="showData.emergencyContactTwoNumber"
                                type="text"
                                :placeholder="$t('StaffList.emergencyContactTwoNumber')"
                            />
                        </b-form-group>
                    </b-col>
                    <!-- appointmentDate -->
                    <b-col cols="4">
                        <b-form-group
                            label-for="appointmentDate-datepicker"
                            id="appointmentDate"
                        >
                            <validation-provider
                                #default="{ errors }"
                                name="appointmentDate"
                                rules="required"
                            >
                                <flat-pickr
                                    v-model="showData.appointmentDate"
                                    class="form-control"
                                    :placeholder="$t('StaffList.appointmentDate')"
                                    id="appointmentDate-datepicker"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                    <!-- resignationDate -->
                    <b-col cols="4">
                        <b-form-group
                            label-for="resignationDate-datepicker"
                            id="resignationDate"
                        >
                            <validation-provider
                                #default="{ errors }"
                                name="resignationDate"
                                rules="required"
                            >
                                <flat-pickr
                                    v-model="showData.resignationDate"
                                    class="form-control"
                                    :placeholder="$t('StaffList.resignationDate')"
                                    id="resignationDate-datepicker"
                                />
                                <small class="text-danger">{{ errors[0] }}</small>
                            </validation-provider>
                        </b-form-group>
                    </b-col>
                </b-row>
                <b-row>
                    <!-- email -->
                    <b-col cols="4">
                        <b-form-group id="email">
                            <label for="email">{{ $t('StaffList.email') }}</label>
                            <b-form-input
                                v-model="showData.email"
                                type="text"
                                :placeholder="$t('StaffList.email')"
                            />
                        </b-form-group>
                    </b-col>
                    <!-- remark -->
                    <b-col cols="4">
                        <b-form-group>
                            <b-form-textarea
                                :placeholder="$t('remark')"
                                rows="3"
                                v-model="remark"
                                autocomplete="off"
                            />
                        </b-form-group>
                    </b-col>
                </b-row>
            </validation-observer>
        </b-form>
    </b-card-code>
</template>