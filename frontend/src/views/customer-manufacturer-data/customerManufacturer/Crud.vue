<template>
    <div>
        <b-card-code :title="$route.name == 'CustomerManufacturerData-CustomerManufacturerDataCreate' ?  $t('CustomerManufacturerList.createCustomerManufacturer') : $t('CustomerManufacturerList.editCustomerManufacturer')">
            <b-form @submit.prevent>
                <validation-observer ref="simpleRules">
                    <b-row>
                        <!-- code -->
                        <b-col cols="4">
                            <b-form-group id="customerManufacturerCode">
                                <label for="code">{{ $t('CustomerManufacturerList.code') }}</label>
                                <validation-provider
                                    #default="{ errors }"
                                    name="customerManufacturerCode"
                                    rules="required"
                                >
                                    <b-form-input
                                        v-model="showData.code"
                                        type="text"
                                        :placeholder="$t('CustomerManufacturerList.code')"
                                        :state="errors.length > 0 ? false:null"
                                    />
                                    <small class="text-danger">{{ errors[0] }}</small>
                                </validation-provider>
                            </b-form-group>
                        </b-col>
                        <!-- fullName -->
                        <b-col cols="4">
                            <b-form-group id="customerManufacturerFullName">
                                <label for="customerManufacturerFullName">{{ $t('CustomerManufacturerList.fullName') }}</label>
                                <validation-provider
                                    #default="{ errors }"
                                    name="customerManufacturerFullName"
                                    rules="required"
                                >
                                    <b-form-input
                                        v-model="showData.fullName"
                                        type="text"
                                        :placeholder="$t('CustomerManufacturerList.fullName')"
                                        :state="errors.length > 0 ? false:null"
                                    />
                                    <small class="text-danger">{{ errors[0] }}</small>
                                </validation-provider>
                            </b-form-group>
                        </b-col>
                        <!-- shortName -->
                        <b-col cols="4">
                            <b-form-group id="shortName">
                                <label for="shortName">{{ $t('CustomerManufacturerList.shortName') }}</label>
                                <b-form-input
                                    v-model="showData.shortName"
                                    type="text"
                                    :placeholder="$t('CustomerManufacturerList.shortName')"
                                />
                            </b-form-group>
                        </b-col>
                    </b-row>
                    <b-row>
                        <!-- englishName -->
                        <b-col cols="4">
                            <b-form-group id="englishName">
                                <label for="englishName">{{ $t('CustomerManufacturerList.englishName') }}</label>
                                <b-form-input
                                    v-model="showData.englishName"
                                    type="text"
                                    :placeholder="$t('CustomerManufacturerList.englishName')"
                                />
                            </b-form-group>
                        </b-col>
                        <!-- belong -->
                        <b-col cols="4">
                            <b-form-group id="customerManufacturerBelong">
                                <label for="customerManufacturerBelong">{{ $t('CustomerManufacturerList.belong') }}</label>
                                <validation-provider
                                    #default="{ errors }"
                                    name="customerManufacturerBelong"
                                    rules="required"
                                >
                                    <v-select
                                        v-model="showData.belong"
                                        :options="belongOption"
                                        :placeholder="$t('CustomerManufacturerList.selectBelong')"
                                    />
                                    <small class="text-danger">{{ errors[0] }}</small>
                                </validation-provider>
                            </b-form-group>
                        </b-col>
                        <!-- category -->
                        <b-col cols="4">
                            <b-form-group id="customerManufacturerCategory">
                                <label for="customerManufacturerCategory">{{ $t('CustomerManufacturerList.category') }}</label>
                                <validation-provider
                                    #default="{ errors }"
                                    name="customerManufacturerCategory"
                                    rules="required"
                                >
                                    <v-select
                                        v-model="showData.category"
                                        :options="categoryOption"
                                        :placeholder="$t('CustomerManufacturerList.selectCategory')"
                                    />
                                    <small class="text-danger">{{ errors[0] }}</small>
                                </validation-provider>
                            </b-form-group>
                        </b-col>
                    </b-row>
                    <b-row>
                        <!-- industry -->
                        <b-col cols="4">
                            <b-form-group id="industry">
                                <label for="industry">{{ $t('CustomerManufacturerList.industry') }}</label>
                                <b-form-input
                                    v-model="showData.industry"
                                    type="text"
                                    :placeholder="$t('CustomerManufacturerList.industry')"
                                />
                            </b-form-group>
                        </b-col>
                        <!-- personInCharge -->
                        <b-col cols="4">
                            <b-form-group id="personInCharge">
                                <label for="personInCharge">{{ $t('CustomerManufacturerList.personInCharge') }}</label>
                                <b-form-input
                                    v-model="showData.personInCharge"
                                    type="text"
                                    :placeholder="$t('CustomerManufacturerList.personInCharge')"
                                />
                            </b-form-group>
                        </b-col>
                        <!-- contactPersonOne -->
                        <b-col cols="4">
                            <b-form-group id="contactPersonOne">
                                <label for="contactPersonOne">{{ $t('CustomerManufacturerList.contactPersonOne') }}</label>
                                <b-form-input
                                    v-model="showData.contactPersonOne"
                                    type="text"
                                    :placeholder="$t('CustomerManufacturerList.contactPersonOne')"
                                />
                            </b-form-group>
                        </b-col>
                    </b-row>
                    <b-row>
                        <!-- contactPersonTwo -->
                        <b-col cols="4">
                            <b-form-group id="contactPersonTwo">
                                <label for="contactPersonTwo">{{ $t('CustomerManufacturerList.contactPersonTwo') }}</label>
                                <b-form-input
                                    v-model="showData.contactPersonTwo"
                                    type="text"
                                    :placeholder="$t('CustomerManufacturerList.contactPersonTwo')"
                                />
                            </b-form-group>
                        </b-col>
                        <!-- phoneOne -->
                        <b-col cols="4">
                            <b-form-group id="phoneOne">
                                <label for="phoneOne">{{ $t('CustomerManufacturerList.phoneOne') }}</label>
                                <b-form-input
                                    v-model="showData.phoneOne"
                                    type="text"
                                    :placeholder="$t('CustomerManufacturerList.phoneOne')"
                                />
                            </b-form-group>
                        </b-col>
                        <!-- phoneTwo -->
                        <b-col cols="4">
                            <b-form-group id="phoneTwo">
                                <label for="phoneTwo">{{ $t('CustomerManufacturerList.phoneTwo') }}</label>
                                <b-form-input
                                    v-model="showData.phoneTwo"
                                    type="text"
                                    :placeholder="$t('CustomerManufacturerList.phoneTwo')"
                                />
                            </b-form-group>
                        </b-col>
                    </b-row>
                    <b-row>
                        <!-- email -->
                        <b-col cols="4">
                            <b-form-group id="email">
                                <label for="email">{{ $t('CustomerManufacturerList.email') }}</label>
                                <b-form-input
                                    v-model="showData.email"
                                    type="text"
                                    :placeholder="$t('CustomerManufacturerList.email')"
                                />
                            </b-form-group>
                        </b-col>
                        <!-- fax -->
                        <b-col cols="4">
                            <b-form-group id="fax">
                                <label for="fax">{{ $t('CustomerManufacturerList.fax') }}</label>
                                <b-form-input
                                    v-model="showData.fax"
                                    type="text"
                                    :placeholder="$t('CustomerManufacturerList.fax')"
                                />
                            </b-form-group>
                        </b-col>
                        <!-- unicode -->
                        <b-col cols="4">
                            <b-form-group id="unicode">
                                <label for="unicode">{{ $t('CustomerManufacturerList.unicode') }}</label>
                                <b-form-input
                                    v-model="showData.unicode"
                                    type="text"
                                    :placeholder="$t('CustomerManufacturerList.unicode')"
                                />
                            </b-form-group>
                        </b-col>
                    </b-row>
                    <b-row>
                        <!-- invoiceName -->
                        <b-col cols="4">
                            <b-form-group id="invoiceName">
                                <label for="invoiceName">{{ $t('CustomerManufacturerList.invoiceName') }}</label>
                                <b-form-input
                                    v-model="showData.invoiceName"
                                    type="text"
                                    :placeholder="$t('CustomerManufacturerList.invoiceName')"
                                />
                            </b-form-group>
                        </b-col>
                        <!-- invoiceAddress -->
                        <b-col cols="4">
                            <b-form-group id="invoiceAddress">
                                <label for="invoiceAddress">{{ $t('CustomerManufacturerList.invoiceAddress') }}</label>
                                <b-form-input
                                    v-model="showData.invoiceAddress"
                                    type="text"
                                    :placeholder="$t('CustomerManufacturerList.invoiceAddress')"
                                />
                            </b-form-group>
                        </b-col>
                        <!-- companyAddress -->
                        <b-col cols="4">
                            <b-form-group id="companyAddress">
                                <label for="companyAddress">{{ $t('CustomerManufacturerList.companyAddress') }}</label>
                                <b-form-input
                                    v-model="showData.companyAddress"
                                    type="text"
                                    :placeholder="$t('CustomerManufacturerList.companyAddress')"
                                />
                            </b-form-group>
                        </b-col>
                    </b-row>
                    <b-row>
                        <!-- zipCode -->
                        <b-col cols="4">
                            <b-form-group id="zipCode">
                                <label for="zipCode">{{ $t('CustomerManufacturerList.zipCode') }}</label>
                                <b-form-input
                                    v-model="showData.zipCode"
                                    type="text"
                                    :placeholder="$t('CustomerManufacturerList.zipCode')"
                                />
                            </b-form-group>
                        </b-col>
                        <!-- disable_at -->
                        <b-col cols="4">
                            <b-form-group
                            label-for="disable_at-datepicker"
                            id="disable_at"
                            >
                                <label for="disable_at">{{ $t('CustomerManufacturerList.disable_at') }}</label>
                                <flat-pickr
                                    v-model="showData.disable_at"
                                    class="form-control"
                                    :placeholder="$t('CustomerManufacturerList.disable_at')"
                                    id="disable_at-datepicker"
                                />
                            </b-form-group>
                        </b-col>
                        <!-- currency -->
                        <b-col cols="4">
                            <b-form-group id="currency">
                                <label for="currency">{{ $t('CustomerManufacturerList.currency') }}</label>
                                <validation-provider
                                    #default="{ errors }"
                                    name="currency"
                                    rules="required"
                                >
                                    <v-select
                                        v-model="showData.currency"
                                        :options="currencyOption"
                                        :placeholder="$t('CustomerManufacturerList.selectCurrency')"
                                    />
                                    <small class="text-danger">{{ errors[0] }}</small>
                                </validation-provider>
                            </b-form-group>
                        </b-col>
                    </b-row>
                    <b-row>
                        <!-- taxDeductionCategory -->
                        <b-col cols="4">
                            <b-form-group id="customerManufacturerTaxDeductionCategory">
                                <label for="customerManufacturerTaxDeductionCategory">{{ $t('CustomerManufacturerList.taxDeductionCategory') }}</label>
                                <validation-provider
                                    #default="{ errors }"
                                    name="customerManufacturerTaxDeductionCategory"
                                    rules="required"
                                >
                                    <v-select
                                        label="label"
                                        v-model="showData.taxDeductionCategory"
                                        :options="taxDeductionCategoryOption"
                                        :placeholder="$t('CustomerManufacturerList.selectTaxDeductionCategory')"
                                        :reduce="option => option.value"
                                    >
                                        <template v-slot:option="{ label }">
                                        {{ $t('CustomerManufacturerList.'+label) }}
                                        </template>
                                        <template #selected-option="{ label }">
                                            {{ $t('CustomerManufacturerList.'+label) }}
                                        </template>
                                    </v-select>
                                    <small class="text-danger">{{ errors[0] }}</small>
                                </validation-provider>
                            </b-form-group>
                        </b-col>
                        <!-- accountSettingMethod -->
                        <b-col cols="4">
                            <b-form-group id="customerManufacturerAccountSettingMethod">
                                <label for="customerManufacturerAccountSettingMethod">{{ $t('CustomerManufacturerList.accountSettingMethod') }}</label>
                                <validation-provider
                                    #default="{ errors }"
                                    name="customerManufacturerAccountSettingMethod"
                                    rules="required"
                                >
                                    <v-select
                                        label="label"
                                        v-model="showData.accountSettingMethod"
                                        :options="accountSettingMethodOption"
                                        :placeholder="$t('CustomerManufacturerList.selectAccountSettingMethod')"
                                        :reduce="option => option.value"
                                    >
                                        <template v-slot:option="{ label }">
                                        {{ $t('CustomerManufacturerList.'+label) }}
                                        </template>
                                        <template #selected-option="{ label }">
                                            {{ $t('CustomerManufacturerList.'+label) }}
                                        </template>
                                    </v-select>
                                    <small class="text-danger">{{ errors[0] }}</small>
                                </validation-provider>
                            </b-form-group>
                        </b-col>
                        <!-- businessPeople -->
                        <b-col cols="4">
                            <b-form-group id="businessPeople">
                                <label for="businessPeople">{{ $t('CustomerManufacturerList.businessPeople') }}</label>
                                <v-select
                                    v-model="showData.businessPeople"
                                    :options="businessPeopleOption"
                                    :placeholder="$t('CustomerManufacturerList.selectBusinessPeople')"
                                />
                            </b-form-group>
                        </b-col>
                    </b-row>
                    <b-row>
                        <!-- paymentMethod -->
                        <b-col cols="4">
                            <b-form-group id="paymentMethod">
                                <label for="paymentMethod">{{ $t('CustomerManufacturerList.paymentMethod') }}</label>
                                <v-select
                                    label="label"
                                    v-model="showData.paymentMethod"
                                    :options="paymentMethodOption"
                                    :placeholder="$t('CustomerManufacturerList.selectPaymentMethod')"
                                    :reduce="option => option.value"
                                    @input="paymentMethodChange"
                                >
                                    <template v-slot:option="{ label }">
                                    {{ $t('CustomerManufacturerList.'+label) }}
                                    </template>
                                    <template #selected-option="{ label }">
                                        {{ $t('CustomerManufacturerList.'+label) }}
                                    </template>
                                </v-select>
                            </b-form-group>
                        </b-col>
                        <!-- monthlyBillingDate -->
                        <b-col cols="4">
                            <b-form-group id="monthlyBillingDate">
                                <label for="monthlyBillingDate">{{ $t('CustomerManufacturerList.monthlyBillingDate') }}</label>
                                <b-form-input
                                    v-model="showData.monthlyBillingDate"
                                    type="number"
                                    min="1"
                                    max="31"
                                    :placeholder="$t('CustomerManufacturerList.monthlyBillingDate')"
                                    :readonly="showData.paymentMethod != '月結'"
                                />
                            </b-form-group>
                        </b-col>
                        <!-- days -->
                        <b-col cols="4">
                            <b-form-group id="days">
                                <label for="days">{{ $t('CustomerManufacturerList.days') }}</label>
                                <b-form-input
                                    v-model="showData.days"
                                    type="number"
                                    min="1"
                                    :placeholder="$t('CustomerManufacturerList.days')"
                                    :readonly="showData.paymentMethod != '月結' && showData.paymentMethod != '貨到付款'"
                                />
                            </b-form-group>
                        </b-col>
                    </b-row>
                    <b-row>
                        <!-- otherInstructions -->
                        <b-col cols="4">
                            <b-form-group id="otherInstructions">
                                <label for="otherInstructions">{{ $t('CustomerManufacturerList.otherInstructions') }}</label>
                                <b-form-input
                                    v-model="showData.otherInstructions"
                                    type="text"
                                    :placeholder="$t('CustomerManufacturerList.otherInstructions')"
                                    :readonly="showData.paymentMethod != '其他'"
                                />
                            </b-form-group>
                        </b-col>
                        <!-- electronicInvoiceType -->
                        <b-col cols="4">
                            <b-form-group id="electronicInvoiceType">
                                <label for="electronicInvoiceType">{{ $t('CustomerManufacturerList.electronicInvoiceType') }}</label>
                                <v-select
                                    v-model="showData.electronicInvoiceType"
                                    :options="electronicInvoiceTypeOption"
                                    :placeholder="$t('CustomerManufacturerList.selectElectronicInvoiceType')"
                                />
                            </b-form-group>
                        </b-col>
                        <!-- remark -->
                        <b-col cols="4">
                            <b-form-group>
                                <label for="remark">{{ $t('CustomerManufacturerList.remark') }}</label>
                                <b-form-textarea
                                    :placeholder="$t('CustomerManufacturerList.remark')"
                                    rows="3"
                                    v-model="showData.remark"
                                    autocomplete="off"
                                />
                            </b-form-group>
                        </b-col>
                    </b-row>
                </validation-observer>
            </b-form>
        </b-card-code>
        <b-card-code :title="$t('CustomerManufacturerModal.addressInformation')">

            <!-- search input -->
            <div class="custom-search d-flex justify-content-end">
                <b-button
                    v-ripple.400="'rgba(113, 102, 240, 0.15)'"
                    v-b-modal.modalForm
                    variant="outline-primary"
                    class="mb-2 mr-2"
                    @click="resetModal()"
                >
                    {{ $t('create')}}
                </b-button>
                <b-form-group>
                    <div class="d-flex align-items-center">
                        <b-form-input
                            v-model="searchTerm"
                            :placeholder="$t('table.Search')"
                            type="text"
                            class="d-inline-block"
                        />
                    </div>
                </b-form-group>
            </div>

            <!-- table -->
            <vue-good-table
                :columns="columns"
                :rows="rows"
                :search-options="{
                    enabled: true,
                    externalQuery: searchTerm
                }"
                :pagination-options="{
                    enabled: true,
                    perPage:pageLength
                }"
            >
                <template #loadingContent>
                    <div class="text-center">
                        <b-spinner variant="primary" label="Text Centered" />
                    </div>
                </template>
                <template
                    slot="table-column"
                    slot-scope="props"
                >
                    <span class="text-nowrap" v-if="props.column.label !== '#'">
                        {{$t('CustomerManufacturerModal.' + props.column.label) }}
                    </span>
                </template>
                <template
                    slot="table-row"
                    slot-scope="props"
                >
                    <!-- Column: index -->
                    <span v-if="props.column.field === 'id'" class="text-nowrap">
                        {{ props.row.originalIndex + 1 }}
                    </span>
                    <span v-else-if="props.column.field === 'detail'" class="text-nowrap">
                        <span>
                            <b-button
                                v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                variant="outline-primary"
                                size="sm"
                                class="mr-50"
                                @click="showDetail(props.row)"
                            >
                                <feather-icon
                                    icon="EyeIcon"
                                />
                                <span>{{ $t('detail') }}</span>
                            </b-button>
                        </span>
                    </span>
                    <!-- Column: Action -->
                    <span v-else-if="props.column.field === 'action'" class="text-nowrap">
                        <span>
                            <b-button
                                v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                variant="outline-success"
                                size="sm"
                                class="mr-50"
                                @click="editData(props.row)"
                            >
                                <feather-icon
                                    icon="Edit2Icon"
                                />
                                <span>{{ $t('edit') }}</span>
                            </b-button>
                            <b-button
                                v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                variant="outline-danger"
                                size="sm"
                                @click="removeData(props.row)"
                            >
                                <feather-icon
                                    icon="Trash2Icon"
                                />
                                <span>{{ $t('delete') }}</span>
                            </b-button>
                        </span>
                    </span>

                    <!-- Column: Common -->
                    <span v-else class="text-nowrap">
                        {{ props.formattedRow[props.column.field] }}
                    </span>
                </template>
                <!-- pagination -->
                <template
                    slot="pagination-bottom"
                    slot-scope="props"
                >
                    <div class="d-flex justify-content-between flex-wrap">
                        <div class="d-flex align-items-center mb-0 mt-1">
                            <span class="text-nowrap ">
                                {{ $t('table.Showing') }} 1 {{ $t('table.to') }}
                            </span>
                            <b-form-select
                                v-model="pageLength"
                                :options="['5','10']"
                                class="mx-1"
                                @input="(value)=>props.perPageChanged({currentPerPage:value})"
                            />
                            <span class="text-nowrap"> {{ $t('table.of') }} {{ props.total }} {{ $t('table.entries') }} </span>
                        </div>
                        <div>
                            <b-pagination
                                :value="1"
                                :total-rows="props.total"
                                :per-page="pageLength"
                                first-number
                                last-number
                                align="right"
                                prev-class="prev-item"
                                next-class="next-item"
                                class="mt-1 mb-0"
                                @input="(value)=>props.pageChanged({currentPage:value})"
                            >
                                <template #prev-text>
                                    <feather-icon
                                        icon="ChevronLeftIcon"
                                        size="18"
                                    />
                                </template>
                                <template #next-text>
                                    <feather-icon
                                        icon="ChevronRightIcon"
                                        size="18"
                                    />
                                </template>
                            </b-pagination>
                        </div>
                    </div>
                </template>
            </vue-good-table>
        </b-card-code>
        <template>
            <div class="demo-spacing-0">
                <b-row>
                    <!-- submit -->
                    <b-col class="text-right">
                        <b-button
                            v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                            type="submit"
                            variant="primary"
                            @click.prevent="validationForm"
                        >
                            {{ $t('Submit') }}
                        </b-button>
                    </b-col>
                    <b-col>
                        <b-button
                            v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                            type="button"
                            variant="secondary"
                            :to="{ name: 'CustomerManufacturerData-CustomerManufacturerDataList' }"
                        >
                            {{ $t('back') }}
                        </b-button>
                    </b-col>
                </b-row>
            </div>
        </template>
        <!-- create & edit modal -->
        <b-modal
            id="modalForm"
            cancel-variant="outline-secondary"
            :title="addressModalId != null ? $t('edit') : $t('create')"
            :cancel-title="$t('back')"
            :ok-title="$t('Submit')"
            @ok.prevent="validationModalForm"
            ref="modalForm"
        >
            <b-form @submit.prevent>
                <validation-observer ref="modalRules">
                    <b-form-group id="addressName">
                        <label for="addressName">{{ $t('CustomerManufacturerModal.addressName') }}</label>
                        <validation-provider
                            #default="{ errors }"
                            name="addressName"
                            rules="required"
                        >
                            <b-form-input
                                v-model="addressData.address_name"
                                type="text"
                                :placeholder="$t('CustomerManufacturerModal.addressName')"
                            />
                            <small class="text-danger">{{ errors[0] }}</small>
                        </validation-provider>
                    </b-form-group>
                    <b-form-group>
                        <label for="postalCode">{{ $t('CustomerManufacturerModal.postalCode') }}</label>
                        <b-form-input
                            v-model="addressData.postal_code"
                            type="text"
                            :placeholder="$t('CustomerManufacturerModal.postalCode')"
                        />
                    </b-form-group>
                    <b-form-group id="address">
                        <label for="address">{{ $t('CustomerManufacturerModal.address') }}</label>
                        <b-form-input
                            v-model="addressData.address"
                            type="text"
                            :placeholder="$t('CustomerManufacturerModal.address')"
                        />
                    </b-form-group>
                    <b-form-group>
                        <label for="contactPerson">{{ $t('CustomerManufacturerModal.contactPerson') }}</label>
                        <b-form-input
                            v-model="addressData.contact_person"
                            type="text"
                            :placeholder="$t('CustomerManufacturerModal.contactPerson')"
                        />
                    </b-form-group>
                    <b-form-group>
                        <label for="department">{{ $t('CustomerManufacturerModal.department') }}</label>
                        <b-form-input
                            v-model="addressData.department"
                            type="text"
                            :placeholder="$t('CustomerManufacturerModal.department')"
                        />
                    </b-form-group>
                    <b-form-group>
                        <label for="telephone">{{ $t('CustomerManufacturerModal.telephone') }}</label>
                        <b-form-input
                            v-model="addressData.telephone"
                            type="text"
                            :placeholder="$t('CustomerManufacturerModal.telephone')"
                        />
                    </b-form-group>
                    <b-form-group>
                        <label for="cellphone">{{ $t('CustomerManufacturerModal.cellphone') }}</label>
                        <b-form-input
                            v-model="addressData.cellphone"
                            type="text"
                            :placeholder="$t('CustomerManufacturerModal.cellphone')"
                        />
                    </b-form-group>
                    <b-form-group>
                        <label for="line">{{ $t('CustomerManufacturerModal.line') }}</label>
                        <b-form-input
                            v-model="addressData.line"
                            type="text"
                            :placeholder="$t('CustomerManufacturerModal.line')"
                        />
                    </b-form-group>
                    <b-form-group>
                        <label for="email">{{ $t('CustomerManufacturerModal.email') }}</label>
                        <b-form-input
                            v-model="addressData.email"
                            type="text"
                            :placeholder="$t('CustomerManufacturerModal.email')"
                        />
                    </b-form-group>
                    <b-form-group>
                        <label for="remark">{{ $t('CustomerManufacturerModal.remark') }}</label>
                        <b-form-textarea
                            :placeholder="$t('CustomerManufacturerList.remark')"
                            rows="3"
                            v-model="addressData.remark"
                            autocomplete="off"
                        />
                    </b-form-group>
                </validation-observer>
            </b-form>
        </b-modal>
        <!-- detail modal -->
        <b-modal
            :title="$t('detail')"
            ok-only
            :ok-title="$t('back')"
            ref="contactDetail"
            ok-variant="secondary"
        >
            <b-form>
                <b-form-group id="contactPerson">
                    <label for="contactPerson">{{ $t('CustomerManufacturerModal.contactPerson') }}</label>
                    <b-form-input
                        v-model="contactDetail.contact_person"
                        type="text"
                        readonly
                    />
                </b-form-group>
                <b-form-group id="telephone">
                    <label for="telephone">{{ $t('CustomerManufacturerModal.telephone') }}</label>
                    <b-form-input
                        v-model="contactDetail.telephone"
                        type="text"
                        readonly
                    />
                </b-form-group>
                <b-form-group id="cellphone">
                    <label for="cellphone">{{ $t('CustomerManufacturerModal.cellphone') }}</label>
                    <b-form-input
                        v-model="contactDetail.cellphone"
                        type="text"
                        readonly
                    />
                </b-form-group>
                <b-form-group id="line">
                    <label for="line">{{ $t('CustomerManufacturerModal.line') }}</label>
                    <b-form-input
                        v-model="contactDetail.line"
                        type="text"
                        readonly
                    />
                </b-form-group>
                <b-form-group id="email">
                    <label for="email">{{ $t('CustomerManufacturerModal.email') }}</label>
                    <b-form-input
                        v-model="contactDetail.email"
                        type="text"
                        readonly
                    />
                </b-form-group>
            </b-form>
        </b-modal>
    </div>
</template>

<script>
import BCardCode from '@core/components/b-card-code/BCardCode.vue'
import {
    BRow, BCol, BFormGroup, BForm, BFormInput, BFormSelect, BFormTextarea, BButton, BSpinner, BPagination,
} from 'bootstrap-vue'
import { VueGoodTable } from 'vue-good-table'
import vSelect from 'vue-select'
import flatPickr from 'vue-flatpickr-component'
import { ValidationProvider, ValidationObserver } from 'vee-validate'
import { required, email } from '@validations'
import Ripple from 'vue-ripple-directive'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'
import axios from "@axios";

export default {
    components: {
        BCardCode,
        BRow,
        BCol,
        BFormGroup,
        BForm,
        BFormInput,
        BFormSelect,
        BFormTextarea,
        BButton,
        vSelect,
        flatPickr,
        ValidationProvider,
        ValidationObserver,
        ToastificationContent,
        VueGoodTable,
        BSpinner,
        BPagination,
    },
    directives: {
        Ripple,
    },
    data() {
        return {
            apiPath: '/customerManufacturers',
            required,
            email,
            showData: {},
            addressModalId: null,
            addressData: {},
            defaultData: {
                id : null,
                code: '',
                fullName: '',
                shortName: '',
                englishName: '',
                belong: '',
                category: '',
                industry: '',
                personInCharge: '',
                contactPersonOne: '',
                contactPersonTwo: '',
                phoneOne: '',
                phoneTwo: '',
                email: '',
                fax: '',
                unicode: '',
                invoiceName: '',
                invoiceAddress: '',
                companyAddress: '',
                zipCode: '',
                disable_at: '',
                currency: '',
                taxDeductionCategory: '',
                accountSettingMethod: '',
                businessPeople: '',
                paymentMethod: '',
                monthlyBillingDate: '',
                days: '',
                otherInstructions: '',
                electronicInvoiceType: '',
                remark: '',
                address: []
            },
            defaultAddressData: {
                address_name: '',
                postal_code: '',
                address: '',
                contact_person: '',
                department: '',
                telephone: '',
                cellphone: '',
                line: '',
                email: '',
                remark: '',
            },
            belongOption: ['customer', 'manufacturer'],
            categoryOption: ['原料商'],
            currencyOption: ['美金'],
            taxDeductionCategoryOption: [
                {label: 'taxFree', value: 'taxFree'},
                {label: 'taxableIncluded', value: 'taxableIncluded'},
                {label: 'taxablePlus', value: 'taxablePlus'}
            ],
            accountSettingMethodOption: [
                {label: 'singleBill', value: 'singleBill'},
                {label: 'noBill', value: 'noBill'},
                {label: 'billingAfterReceiptOfInvoice', value: 'billingAfterReceiptOfInvoice'}
            ],
            businessPeopleOption: ['dennis'],
            paymentMethodOption: [
                {label: 'monthly', value: 'monthly'},
                {label: 'cashOnDelivery', value: 'cashOnDelivery'},
                {label: 'other', value: 'other'}
            ],
            electronicInvoiceTypeOption: ['B2B', 'B2C'],

            pageLength: 5,
            searchTerm: '',
            columns: [
                { label: '#', field: 'id', type: 'number' },
                { label: 'addressName', field: 'address_name' },
                { label: 'postalCode', field: 'postal_code' },
                { label: 'address', field: 'address' },
                { label: 'contactDetails', field: 'detail' },
                { label: 'action', field: 'action' },
            ],
            rows: [],
            contactDetail: {}
        }
    },
    methods: {
        paymentMethodChange() {
            this.showData.monthlyBillingDate = '';
            this.showData.days = '';
            this.showData.otherInstructions = '';
        },
        validationForm() {
            this.$refs.simpleRules.validate().then(success => {
                if (success) {
                    if(this.showData.id) {
                        this.updateMethod();
                    }else {
                        this.createMethod();
                    }
                }else {
                    const simpleRulesErrors = Object.keys(this.$refs.simpleRules.errors);
                    simpleRulesErrors.some(element => {
                        if(this.$refs.simpleRules.errors[element].length > 0){
                            document.querySelector(`#${element} input`).focus();
                            return true;
                        }
                    });
                }
            })
        },
        validationModalForm() {
            this.$refs.modalRules.validate().then(success => {
                if (success) {
                    this.dataPush();
                }else {
                    const modalRulesErrors = Object.keys(this.$refs.modalRules.errors);
                    modalRulesErrors.some(element => {
                        if(this.$refs.modalRules.errors[element].length > 0){
                            document.querySelector(`#${element} input`).focus();
                            return true;
                        }
                    });
                }
            })
        },
        createMethod() {
            axios
            .post(`${this.apiPath}`, this.showData)
            .then(() => {
                this.$toast({
                    component: ToastificationContent,
                    position: 'top-right',
                    props: {
                    title: `${this.$t('createdSuccess')}`,
                    icon: 'CoffeeIcon',
                    variant: 'success',
                    text: `${this.$t('Customer/Manufacturer Data')} ${this.$t('createdSuccess')}!`,
                    },
                })
                this.$router.push({name:'CustomerManufacturerData-CustomerManufacturerDataList'});
            })
            .catch(error => {
                this.$toast({
                    component: ToastificationContent,
                    position: 'top-right',
                    props: {
                    title: `${this.$t('createdFailed')}`,
                    icon: 'XIcon',
                    variant: 'danger',
                    text: error.response.data.message,
                    },
                })
            })
        },
        editMethod() {
            axios
            .get(`${this.apiPath}/${this.showData.id}`)
            .then(response => {
                let data = response.data;
                data.address = data.address.map(item => ({
                    ...item,
                }))

                this.showData = JSON.parse(JSON.stringify(data));
                this.rows = JSON.parse(JSON.stringify(data.address));
            })
            .catch(error => console.error (error))
        },
        updateMethod() {
            axios
            .put(`${this.apiPath}/${this.showData.id}`, this.showData)
            .then(() => {
                this.$toast({
                    component: ToastificationContent,
                    position: 'top-right',
                    props: {
                    title: `${this.$t('updatedSuccess')}`,
                    icon: 'CoffeeIcon',
                    variant: 'success',
                    text: `${this.$t('Customer/Manufacturer Data')} ${this.$t('updatedSuccess')}!`,
                    },
                })
                this.$router.push({name:'CustomerManufacturerData-CustomerManufacturerDataList'});
            })
            .catch(error => {
                this.$toast({
                    component: ToastificationContent,
                    position: 'top-right',
                    props: {
                    title: `${this.$t('updatedFailed')}`,
                    icon: 'XIcon',
                    variant: 'danger',
                    text: error.response.data.message,
                    },
                })
            })
        },
        resetModal() {
            this.addressModalId = null
            this.addressData = Object.assign({}, this.addressData, this.defaultAddressData)
        },
        editData(data) {
            this.addressModalId = data.originalIndex;
            this.addressData = data;
            this.$refs['modalForm'].show();
        },
        dataPush() {
            if (this.addressModalId == null) {
                this.showData.address.push(this.addressData);
                this.rows = JSON.parse(JSON.stringify(this.showData.address));
            } else {
                Object.assign(this.showData.address[this.addressModalId], this.addressData);
            }
            this.$nextTick(() => {
                this.$refs['modalForm'].toggle('#toggle-btn')
            })
        },
        removeData(row) {
            this.$bvModal
                .msgBoxConfirm(this.$t('checkDelete'), {
                    size: 'sm',
                    okVariant: 'primary',
                    okTitle: this.$t('yes'),
                    cancelTitle: this.$t('no'),
                    cancelVariant: 'outline-secondary',
                    hideHeaderClose: false,
                    centered: true,
                    footerClass: "d-block mx-auto"
                })
                .then(value => {
                    if (value) {
                        const tableRowIndex = this.rows.hasOwnProperty(row.originalIndex);
                        if (tableRowIndex) {
                            this.showData.address.splice(row.originalIndex, 1);
                            this.rows.splice(row.originalIndex, 1);
                        }
                    }
                })
        },
        showDetail(value) {
            this.contactDetail = value;
            this.$refs['contactDetail'].show();
        }
    },
    mounted() {
        this.showData = this.defaultData;
        if(this.$route.query.id) {
            this.showData.id = this.$route.query.id;
            this.editMethod();
        }
    },
}
</script>

<style lang="scss">
@import '@core/scss/vue/libs/vue-select.scss';
@import '@core/scss/vue/libs/vue-flatpicker.scss';
@import '@core/scss/vue/libs/vue-good-table.scss';
</style>