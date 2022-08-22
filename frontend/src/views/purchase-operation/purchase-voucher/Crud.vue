<template>
    <div>
        <b-card-code :title="$route.name == 'PurchaseOperation-PurchaseVoucherCreate' ?  $t('PurchaseVoucherModal.createPurchaseVoucher') : $t('PurchaseVoucherModal.editPurchaseVoucher')">
            <b-form @submit.prevent>
                <validation-observer ref="simpleRules">
                    <b-row>
                        <!-- Purchase Date -->
                        <b-col cols="4">
                            <b-form-group
                                label-for="purchaseDate-datepicker"
                                id="purchaseDate"
                            >
                                <label for="purchaseDate">{{ $t('PurchaseVoucherList.purchaseDate') }}</label>
                                <validation-provider
                                    #default="{ errors }"
                                    name="purchaseDate"
                                    rules="required"
                                >
                                    <flat-pickr
                                        v-model="showData.purchaseDate"
                                        class="form-control"
                                        :placeholder="$t('PurchaseVoucherList.purchaseDate')"
                                        id="purchaseDate-datepicker"
                                    />
                                    <small class="text-danger">{{ errors[0] }}</small>
                                </validation-provider>
                            </b-form-group>
                        </b-col>
                        <!-- Manufacturer -->
                        <b-col cols="4">
                            <b-form-group>
                                <label for="manufacturer">{{ $t('PurchaseVoucherList.manufacturer') }}</label>
                                <validation-provider
                                    #default="{ errors }"
                                    name="manufacturer"
                                    rules="required"
                                >
                                    <v-select
                                        label="name"
                                        v-model="showData.manufacturer_id"
                                        :options="manufacturerOption"
                                        :placeholder="$t('PurchaseVoucherModal.selectManufacturer')"
                                        :reduce="option => option.id"
                                    />
                                    <small class="text-danger">{{ errors[0] }}</small>
                                </validation-provider>
                            </b-form-group>
                        </b-col>
                        <!-- Currency -->
                        <b-col cols="4">
                            <b-form-group id="currency">
                                <label for="currency">{{ $t('PurchaseVoucherList.currency') }}</label>
                                <validation-provider
                                    #default="{ errors }"
                                    name="currency"
                                    rules="required"
                                >
                                    <v-select
                                        label="name"
                                        v-model="showData.currency_id"
                                        :options="currencyOption"
                                        :placeholder="$t('PurchaseVoucherModal.selectCurrency')"
                                        :reduce="option => option.id"
                                    />
                                    <small class="text-danger">{{ errors[0] }}</small>
                                </validation-provider>
                            </b-form-group>
                        </b-col>
                    </b-row>
                    <b-row>
                        <!-- Transfer No -->
                        <b-col cols="4">
                            <b-form-group>
                                <label for="transferNo">{{ $t('PurchaseVoucherList.transferNo') }}</label>
                                <v-select
                                    label="name"
                                    v-model="showData.transferNo_id"
                                    :options="transferNoOption"
                                    :placeholder="$t('PurchaseVoucherModal.selectTransferNo')"
                                    :reduce="option => option.id"
                                />
                            </b-form-group>
                        </b-col>
                        <!-- Project No -->
                        <b-col cols="4">
                            <b-form-group>
                                <label for="project">{{ $t('PurchaseVoucherList.project') }}</label>
                                <v-select
                                    label="name"
                                    v-model="showData.project_id"
                                    :options="projectOption"
                                    :placeholder="$t('PurchaseVoucherModal.selectProject')"
                                    :reduce="option => option.id"
                                />
                            </b-form-group>
                        </b-col>
                        <!--  PurchaseStaff -->
                        <b-col cols="4">
                            <b-form-group id="purchaseStaff">
                                <label for="purchaseStaff">{{ $t('PurchaseVoucherList.purchaseStaff') }}</label>
                                <validation-provider
                                    #default="{ errors }"
                                    name="purchaseStaff"
                                    rules="required"
                                >
                                    <v-select
                                        label="name"
                                        v-model="showData.purchaseStaff_id"
                                        :options="purchaseStaffOption"
                                        :placeholder="$t('PurchaseVoucherModal.selectPurchaseStaff')"
                                        :reduce="option => option.id"
                                    />
                                    <small class="text-danger">{{ errors[0] }}</small>
                                </validation-provider>
                            </b-form-group>
                        </b-col>
                    </b-row>
                    <b-row>
                        <!--  Purchase Department -->
                        <b-col cols="4">
                            <b-form-group id="purchaseDepartment">
                                <label for="purchaseDepartment">{{ $t('PurchaseVoucherList.purchaseDepartment') }}</label>
                                <validation-provider
                                    #default="{ errors }"
                                    name="purchaseDepartment"
                                    rules="required"
                                >
                                    <v-select
                                        label="name"
                                        v-model="showData.Department_id"
                                        :options="DepartmentOption"
                                        :placeholder="$t('PurchaseVoucherModal.selectPurchaseDepartment')"
                                        :reduce="option => option.id"
                                    />
                                    <small class="text-danger">{{ errors[0] }}</small>
                                </validation-provider>
                            </b-form-group>
                        </b-col>
                        <!-- invoice -->
                        <b-col cols="4">
                            <b-form-group id="invoice">
                                <label for="invoice">{{ $t('PurchaseVoucherList.invoice') }}</label>
                                <b-form-input
                                    v-model="showData.invoice"
                                    type="text"
                                    :placeholder="$t('PurchaseVoucherList.invoice')"
                                />
                            </b-form-group>
                        </b-col>
                        <!--  Pre-Delivery Date -->
                        <b-col cols="4">
                            <b-form-group
                                label-for="preDeliveryDate-datepicker"
                                id="preDeliveryDate"
                            >
                                <label for="preDeliveryDate">{{ $t('PurchaseVoucherList.preDeliveryDate') }}</label>
                                <validation-provider
                                    #default="{ errors }"
                                    name="preDeliveryDate"
                                    rules="required"
                                >
                                    <flat-pickr
                                        v-model="showData.preDeliveryDate"
                                        class="form-control"
                                        :placeholder="$t('PurchaseVoucherList.preDeliveryDate')"
                                        id="preDeliveryDate-datepicker"
                                    />
                                    <small class="text-danger">{{ errors[0] }}</small>
                                </validation-provider>
                            </b-form-group>
                        </b-col>
                    </b-row>
                    <b-row>
                        <!-- taxDeductionCategory -->
                        <b-col cols="4">
                            <b-form-group id="purchaseVoucherTaxDeductionCategory">
                                <label for="purchaseVoucherTaxDeductionCategory">{{ $t('PurchaseVoucherList.taxDeductionCategory') }}</label>
                                <validation-provider
                                    #default="{ errors }"
                                    name="purchaseVoucherTaxDeductionCategory"
                                    rules="required"
                                >
                                    <v-select
                                        label="label"
                                        v-model="showData.taxDeductionCategory"
                                        :options="taxDeductionCategoryOption"
                                        :placeholder="$t('PurchaseVoucherList.selectTaxDeductionCategory')"
                                        :reduce="option => option.value"
                                    >
                                        <template v-slot:option="{ label }">
                                        {{ $t('PurchaseVoucherList.'+label) }}
                                        </template>
                                        <template #selected-option="{ label }">
                                            {{ $t('PurchaseVoucherList.'+label) }}
                                        </template>
                                    </v-select>
                                    <small class="text-danger">{{ errors[0] }}</small>
                                </validation-provider>
                            </b-form-group>
                        </b-col>
                        <!-- accountSettingMethod -->
                        <b-col cols="4">
                            <b-form-group id="purchaseVoucherAccountSettingMethod">
                                <label for="purchaseVoucherAccountSettingMethod">{{ $t('PurchaseVoucherList.accountSettingMethod') }}</label>
                                <validation-provider
                                    #default="{ errors }"
                                    name="purchaseVoucherAccountSettingMethod"
                                    rules="required"
                                >
                                    <v-select
                                        label="label"
                                        v-model="showData.accountSettingMethod"
                                        :options="accountSettingMethodOption"
                                        :placeholder="$t('PurchaseVoucherList.selectAccountSettingMethod')"
                                        :reduce="option => option.value"
                                    >
                                        <template v-slot:option="{ label }">
                                        {{ $t('PurchaseVoucherList.'+label) }}
                                        </template>
                                        <template #selected-option="{ label }">
                                            {{ $t('PurchaseVoucherList.'+label) }}
                                        </template>
                                    </v-select>
                                    <small class="text-danger">{{ errors[0] }}</small>
                                </validation-provider>
                            </b-form-group>
                        </b-col>
                        <!-- otherExpenses -->
                        <b-col cols="4">
                            <b-form-group id="otherExpenses">
                                <label for="otherExpenses">{{ $t('PurchaseVoucherList.otherExpenses') }}</label>
                                <v-select
                                    label="name"
                                    v-model="showData.otherExpenses_id"
                                    :options="otherExpensesOption"
                                    :placeholder="$t('PurchaseVoucherModal.selectOtherExpenses')"
                                    :reduce="option => option.id"
                                />
                            </b-form-group>
                        </b-col>
                    </b-row>
                    <b-row>
                        <!-- subpoena -->
                        <b-col cols="4">
                            <b-form-group id="subpoena">
                                <label for="subpoena">{{ $t('PurchaseVoucherList.subpoena') }}</label>
                                <b-form-input
                                    v-model="showData.subpoena"
                                    type="text"
                                    :placeholder="$t('PurchaseVoucherList.subpoena')"
                                />
                            </b-form-group>
                        </b-col>
                        <!-- discount -->
                        <b-col cols="4">
                            <b-form-group id="discount">
                                <label for="discount">{{ $t('PurchaseVoucherList.discount') }}</label>
                                <b-form-input
                                    v-model="showData.discount"
                                    type="text"
                                    :placeholder="$t('PurchaseVoucherList.discount')"
                                />
                            </b-form-group>
                        </b-col>
                        <!-- untaxedAmount -->
                        <b-col cols="4">
                            <b-form-group id="untaxedAmount">
                                <label for="untaxedAmount">{{ $t('PurchaseVoucherList.untaxedAmount') }}</label>
                                <b-form-input
                                    v-model="showData.untaxedAmount"
                                    type="text"
                                    readonly
                                    :placeholder="$t('PurchaseVoucherList.untaxedAmount')"
                                />
                            </b-form-group>
                        </b-col>
                    </b-row>
                    <b-row>
                        <!-- tax -->
                        <b-col cols="4">
                            <b-form-group id="tax">
                                <label for="tax">{{ $t('PurchaseVoucherList.tax') }}</label>
                                <b-form-input
                                    v-model="showData.tax"
                                    type="text"
                                    readonly
                                    :placeholder="$t('PurchaseVoucherList.tax')"
                                />
                            </b-form-group>
                        </b-col>
                        <!-- total -->
                        <b-col cols="4">
                            <b-form-group id="total">
                                <label for="total">{{ $t('PurchaseVoucherList.total') }}</label>
                                <b-form-input
                                    v-model="showData.total"
                                    type="text"
                                    readonly
                                    :placeholder="$t('PurchaseVoucherList.total')"
                                />
                            </b-form-group>
                        </b-col>
                        <!-- totalLocalCurrency -->
                        <b-col cols="4">
                            <b-form-group id="totalLocalCurrency">
                                <label for="totalLocalCurrency">{{ $t('PurchaseVoucherList.totalLocalCurrency') }}</label>
                                <b-form-input
                                    v-model="showData.totalLocalCurrency"
                                    type="text"
                                    readonly
                                    :placeholder="$t('PurchaseVoucherList.totalLocalCurrency')"
                                />
                            </b-form-group>
                        </b-col>
                    </b-row>
                    <b-row>
                        <!--  Remark -->
                        <b-col cols="4">
                            <b-form-group>
                                <label for="remark">{{ $t('remark') }}</label>
                                <b-form-textarea
                                    :placeholder="$t('remark')"
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
        <b-card-code :title="$t('PurchaseVoucherModal.productInformation')">

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
                        {{$t('PurchaseVoucherList.ProductList.' + props.column.label) }}
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
                    <span v-else-if="props.column.field === 'remark'" class="text-nowrap">
                        <span>
                            <b-button
                                v-ripple.400="'rgba(255, 255, 255, 0.15)'"
                                variant="outline-primary"
                                size="sm"
                                class="mr-50"
                                @click="showRemark(props.row)"
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
                                class="mr-1"
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
                <b-alert
                    v-height-fade.appear
                    fade
                    variant="danger"
                    :show="alertShow"
                    dismissible
                    @dismissed="alertShow = false"
                >
                    <div class="alert-body">
                        <span>{{ $t('ProductList.productDataCheck') }}</span>
                    </div>
                </b-alert>
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
                            :to="{ name: 'PurchaseOperation-PurchaseVoucherList' }"
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
            :title="productModalId != null ? $t('edit') : $t('create')"
            :cancel-title="$t('back')"
            :ok-title="$t('Submit')"
            @ok.prevent="validationModalForm"
            ref="modalForm"
        >
            <b-form @submit.prevent>
                <validation-observer ref="modalRules">
                    <b-form-group>
                        <label for="productName">{{ $t('PurchaseVoucherList.ProductList.productName') }}</label>
                        <validation-provider
                            #default="{ errors }"
                            name="productName"
                            rules="required"
                        >
                            <v-select
                                v-model="showData.product"
                                :options="productOption"
                                :placeholder="$t('PurchaseVoucherModal.selectProductName')"
                                id="productName"
                            />
                            <small class="text-danger">{{ errors[0] }}</small>
                        </validation-provider>
                    </b-form-group>
                    <b-form-group>
                        <label for="productNo">{{ $t('PurchaseVoucherList.ProductList.productNo') }}</label>
                        <b-form-input
                            v-model="showData.productNo"
                            type="text"
                            :placeholder="$t('PurchaseVoucherList.ProductList.productNo')"
                            readonly
                        />
                    </b-form-group>
                    <b-form-group>
                        <label for="specification">{{ $t('PurchaseVoucherList.ProductList.specification') }}</label>
                        <b-form-input
                            v-model="showData.specification"
                            type="text"
                            :placeholder="$t('PurchaseVoucherList.ProductList.specification')"
                            readonly
                        />
                    </b-form-group>
                    <b-form-group>
                        <label for="unit">{{ $t('PurchaseVoucherList.ProductList.unit') }}</label>
                        <b-form-input
                            v-model="showData.unit"
                            type="text"
                            :placeholder="$t('PurchaseVoucherList.ProductList.unit')"
                            readonly
                        />
                    </b-form-group>
                    <b-form-group>
                        <label for="storehouse">{{ $t('PurchaseVoucherList.ProductList.storehouse') }}</label>
                        <v-select
                            v-model="showData.storehouse"
                            :options="storehouseOption"
                            :placeholder="$t('PurchaseVoucherModal.selectStorehouse')"
                        />
                    </b-form-group>
                    <b-form-group id="quantity">
                        <label for="quantity">{{ $t('PurchaseVoucherList.ProductList.quantity') }}</label>
                        <validation-provider
                            #default="{ errors }"
                            name="quantity"
                            rules="required"
                        >
                            <b-form-input
                                type="number"
                                v-model="showData.quantity"
                                min="0"
                                :state="errors.length > 0 ? false:null"
                                :placeholder="$t('PurchaseVoucherList.ProductList.quantity')"
                            />
                            <small class="text-danger">{{ errors[0] }}</small>
                        </validation-provider>
                    </b-form-group>
                    <b-form-group id="unitPrice">
                        <label for="unitPrice">{{ $t('PurchaseVoucherList.ProductList.unitPrice') }}</label>
                        <validation-provider
                            #default="{ errors }"
                            name="unitPrice"
                            rules="required"
                        >
                            <b-form-input
                                type="number"
                                v-model="showData.unitPrice"
                                min="0"
                                :state="errors.length > 0 ? false:null"
                                :placeholder="$t('PurchaseVoucherList.ProductList.unitPrice')"
                            />
                            <small class="text-danger">{{ errors[0] }}</small>
                        </validation-provider>
                    </b-form-group>
                    <b-form-group id="untaxedAmount">
                        <label for="untaxedAmount">{{ $t('PurchaseVoucherList.ProductList.untaxedAmount') }}</label>
                        <validation-provider
                            #default="{ errors }"
                            name="untaxedAmount"
                            rules="required"
                        >
                            <b-form-input
                                type="number"
                                v-model="showData.untaxedAmount"
                                min="0"
                                :state="errors.length > 0 ? false:null"
                                :placeholder="$t('PurchaseVoucherList.ProductList.untaxedAmount')"
                            />
                            <small class="text-danger">{{ errors[0] }}</small>
                        </validation-provider>
                    </b-form-group>
                    <b-form-group id="tax">
                        <label for="tax">{{ $t('PurchaseVoucherList.ProductList.tax') }}</label>
                        <validation-provider
                            #default="{ errors }"
                            name="tax"
                            rules="required"
                        >
                            <b-form-input
                                type="number"
                                v-model="showData.tax"
                                min="0"
                                :state="errors.length > 0 ? false:null"
                                :placeholder="$t('PurchaseVoucherList.ProductList.tax')"
                            />
                            <small class="text-danger">{{ errors[0] }}</small>
                        </validation-provider>
                    </b-form-group>
                    <b-form-group>
                        <label for="amount">{{ $t('PurchaseVoucherList.ProductList.amount') }}</label>
                        <b-form-input
                            id="amount"
                            type="number"
                            v-model="showData.amount"
                            min="0"
                            autocomplete="off"
                            :placeholder="$t('PurchaseVoucherList.ProductList.amount')"
                        />
                    </b-form-group>
                    <b-form-group id="untaxedLocalCurrency">
                        <label for="untaxedLocalCurrency">{{ $t('PurchaseVoucherList.ProductList.untaxedLocalCurrency') }}</label>
                        <validation-provider
                            #default="{ errors }"
                            name="untaxedLocalCurrency"
                            rules="required"
                        >
                            <b-form-input
                                type="number"
                                v-model="showData.untaxedLocalCurrency"
                                min="0"
                                :state="errors.length > 0 ? false:null"
                                :placeholder="$t('PurchaseVoucherList.ProductList.untaxedLocalCurrency')"
                            />
                            <small class="text-danger">{{ errors[0] }}</small>
                        </validation-provider>
                    </b-form-group>
                    <b-form-group id="localCurrencyTax">
                        <label for="localCurrencyTax">{{ $t('PurchaseVoucherList.ProductList.localCurrencyTax') }}</label>
                        <validation-provider
                            #default="{ errors }"
                            name="localCurrencyTax"
                            rules="required"
                        >
                            <b-form-input
                                type="number"
                                v-model="showData.localCurrencyTax"
                                min="0"
                                :state="errors.length > 0 ? false:null"
                                :placeholder="$t('PurchaseVoucherList.ProductList.localCurrencyTax')"
                            />
                            <small class="text-danger">{{ errors[0] }}</small>
                        </validation-provider>
                    </b-form-group>
                    <b-form-group id="amountInLocalCurrency">
                        <label for="amountInLocalCurrency">{{ $t('PurchaseVoucherList.ProductList.amountInLocalCurrency') }}</label>
                        <validation-provider
                            #default="{ errors }"
                            name="amountInLocalCurrency"
                            rules="required"
                        >
                            <b-form-input
                                type="number"
                                v-model="showData.amountInLocalCurrency"
                                min="0"
                                :state="errors.length > 0 ? false:null"
                                :placeholder="$t('PurchaseVoucherList.ProductList.amountInLocalCurrency')"
                            />
                            <small class="text-danger">{{ errors[0] }}</small>
                        </validation-provider>
                    </b-form-group>
                    <b-form-group id="productPreDeliveryDate">
                        <label for="productPreDeliveryDate-datepicker">{{ $t('PurchaseVoucherList.ProductList.productPreDeliveryDate') }}</label>
                        <validation-provider
                            #default="{ errors }"
                            name="productPreDeliveryDate"
                            rules="required"
                        >
                            <flat-pickr
                                v-model="showData.preDeliveryDate"
                                class="form-control"
                                :placeholder="$t('PurchaseVoucherList.ProductList.productPreDeliveryDate')"
                                id="productPreDeliveryDate-datepicker"
                            />
                            <small class="text-danger">{{ errors[0] }}</small>
                        </validation-provider>
                    </b-form-group>
                    <b-form-group>
                        <label for="productRemark">{{ $t('remark') }}</label>
                        <b-form-textarea
                            id="productRemark"
                            :placeholder="$t('remark')"
                            rows="3"
                            v-model="showData.productRemark"
                            autocomplete="off"
                        />
                    </b-form-group>
                </validation-observer>
            </b-form>
        </b-modal>
        <!-- remark modal -->
        <b-modal
            :title="$t('remark')"
            ok-only
            :ok-title="$t('back')"
            ref="remarkDetail"
            ok-variant="secondary"
            scrollable
        >
            <b-card-text>
                {{ remarkDetail }}
            </b-card-text>
        </b-modal>
    </div>
</template>

<script>
import BCardCode from '@core/components/b-card-code'
import vSelect from 'vue-select'
import flatPickr from 'vue-flatpickr-component'
import { VueGoodTable } from 'vue-good-table'
import { heightFade } from '@core/directives/animations'
import {
    BAlert,
    BRow,
    BCol,
    BFormGroup,
    BFormInput,
    BFormCheckbox,
    BForm,
    BButton,
    BFormText,
    BFormDatalist,
    BInputGroup,
    BInputGroupPrepend,
    BInputGroupAppend,
    BFormTextarea,
    BPagination,
    BFormSelect,
    BCardText,
    BSpinner
} from 'bootstrap-vue'
import Ripple from 'vue-ripple-directive'
import { ValidationProvider, ValidationObserver } from 'vee-validate'
import { required } from '@validations'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'
import axios from "@axios";

export default {
    components: {
        BAlert,
        BCardCode,
        BRow,
        BCol,
        BFormGroup,
        BInputGroup,
        BInputGroupPrepend,
        BFormInput,
        BFormCheckbox,
        BForm,
        BFormText,
        BButton,
        BFormDatalist,
        ValidationProvider,
        ValidationObserver,
        BInputGroupAppend,
        vSelect,
        BFormTextarea,
        flatPickr,
        BPagination,
        BFormSelect,
        VueGoodTable,
        BCardText,
        BSpinner
    },
    directives: {
        Ripple,
        'height-fade': heightFade,
    },
    data() {
        return {
            apiPath: '/purchaseVoucher',
            required,
            alertShow: 'false',
            showData: {},
            productModalId: null,
            productsData: {},
            defaultData: {
                purchaseDate: '',
                manufacturer: '',
                currency: '',
                transferNo: '',
                project: '',
                purchaseStaff: '',
                invoice: '',
                purchaseDepartment: '',
                taxDeductionCategory: '',
                accountSettingMethod: '',
                deposit: '',
                discount: '',
                untaxedAmount: '',
                tax: '',
                total: '',
                totalLocalCurrency: '',
                preDeliveryDate: '',
                remark: '',
                products: []
            },
            remarkDetail: '',
            manufacturerOption: ['台積電', '日月光', '環球晶'],
            currencyOption: ['NTD', 'USD', 'RMB', 'JPY'],
            transferNoOption: ['A123', 'B123', 'C123'],
            projectOption: ['母親節專案', '父親節專案'],
            purchaseStaffOption: ['dennis', 'ryan'],
            purchaseDepartmentOption: ['人事部', '會計部'],
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

            defaultProductsData: {
                code: '',
                name: '',
                specification: '',
                unit: '',
                storehouse: '',
                quantity: 0,
                unitPrice: '',
                untaxedAmount: '',
                tax: '',
                amount: '',
                untaxedLocalCurrency: '',
                localCurrencyTax: '',
                amountInLocalCurrency: '',
                preDeliveryDate: '',
                remark: '',
            },
            productOption: ['桌子', '椅子'],
            storehouseOption: ['北', '中', '南'],

            pageLength: 5,
            searchTerm: '',
            columns: [
                { label: '#', field: 'id', type: 'number' },
                { label: 'productNo', field: 'code' },
                { label: 'productName', field: 'name' },
                { label: 'specification', field: 'specification' },
                { label: 'unit', field: 'unit' },
                { label: 'storehouse', field: 'storehouse' },
                { label: 'quantity', field: 'quantity', type: 'number' },
                { label: 'unitPrice', field: 'unitPrice', type: 'number' },
                { label: 'amount', field: 'amount', type: 'number' },
                { label: 'numberOfTransfers', field: 'numberOfTransfers', type: 'number' },
                { label: 'untransferredQuantity', field: 'untransferredQuantity', type: 'number' },
                { label: 'productPreDeliveryDate', field: 'preDeliveryDate' },
                { label: 'productRemark', field: 'remark' },
                { label: 'action', field: 'action' },
            ],
            rows: [
                {
                    id: 1,
                    code : 'A123456',
                    name : '麥香',
                    specification : '小',
                    unit : '箱',
                    storehouse : '北',
                    quantity : 10,
                    unitPrice : 500,
                    amount : 100,
                    productPreDeliveryDate : '2022-06-30',
                    remark : 'test',
                }
            ]
        }
    },
    methods: {
        validationForm() {
            this.$refs.simpleRules.validate().then(success => {
                if(this.rows.length > 0) {
                    this.alertShow = 'false';
                }else {
                    this.alertShow = '';
                }
                if (success && this.rows.length > 0) {
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
                    text: `${this.$t('Procurement Voucher')} ${this.$t('createdSuccess')}!`,
                    },
                })
                this.$router.push({name:'ProcurementOperation-ProcurementVoucherList'});
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
                let procurementVoucher = response.data
                procurementVoucher.products = procurementVoucher.products.map(item => ({
                    ...item,
                    // stock: item.pivot.stock,
                    // safety_stock: item.pivot.safety_stock,
                }))

                this.showData = JSON.parse(JSON.stringify(procurementVoucher));
                this.rows = JSON.parse(JSON.stringify(procurementVoucher.products));
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
                    text: `${this.$t('Procurement Voucher')} ${this.$t('updatedSuccess')}!`,
                    },
                })
                this.$router.push({name:'ProcurementOperation-ProcurementVoucherList'});
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
            this.productModalId = null
            this.productsData = Object.assign({}, this.productsData, this.defaultProductsData)
        },
        editData(data) {
            this.productModalId = data.originalIndex;
            this.productsData = data;
            this.$refs['modalForm'].show();
        },
        dataPush() {
            if (this.productModalId == null) {
                this.showData.products.push(this.productsData);
                this.rows = JSON.parse(JSON.stringify(this.showData.products));
            } else {
                Object.assign(this.showData.products[this.productModalId], this.productsData);
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
                            this.showData.products.splice(row.originalIndex, 1);
                            this.rows.splice(row.originalIndex, 1);
                        }
                    }
                })
        },
        showRemark(value) {
            this.remarkDetail = value.remark;
            this.$refs['remarkDetail'].show();
        }
    },
    mounted() {
        this.showData = this.defaultData;
        axios
        .post('manufacturers/options')
        .then(response => {
            this.manufacturerOption = response.data;
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
        axios
        .post('currencies/options')
        .then(response => {
            this.currencyOption = response.data;
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