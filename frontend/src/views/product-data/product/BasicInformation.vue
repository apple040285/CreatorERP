<template>
    <b-card>
        <b-card-body>
            <b-row class="my-2">
                <!-- Left: Product Image Container -->
                <b-col
                    cols="12"
                    md="5"
                    class="d-flex align-items-center justify-content-center mb-2 mb-md-0"
                >
                    <div class="d-flex align-items-center justify-content-center">
                    <b-img
                        src="https://pixinvent.com/demo/vuexy-vuejs-admin-dashboard-template/demo-1/img/1.3b312012.png"
                        :alt="basicInformation.name"
                        class="product-img"
                        fluid
                    />
                    </div>
                </b-col>

                <!-- Right: Product Details -->
                <b-col
                    cols="12"
                    md="7"
                >
                    <b-row>
                        <b-col cols="6">
                            <!-- Code -->
                            <b-form-group :label="$t('ProductList.code')">
                                <b-form-input
                                    :value="basicInformation.code"
                                    :placeholder="$t('ProductList.code')"
                                    type="text"
                                    readonly
                                />
                            </b-form-group>
                        </b-col>
                        <b-col cols="6">
                            <!-- name -->
                            <b-form-group :label="$t('ProductList.name')">
                                <b-form-input
                                    :value="basicInformation.name"
                                    :placeholder="$t('ProductList.name')"
                                    type="text"
                                    readonly
                                />
                            </b-form-group>
                        </b-col>
                    </b-row>
                    <b-row>
                        <b-col cols="6">
                            <!-- alias -->
                            <b-form-group :label="$t('ProductList.englishName')">
                                <b-form-input
                                    :value="basicInformation.alias"
                                    :placeholder="$t('ProductList.englishName')"
                                    type="text"
                                    readonly
                                />
                            </b-form-group>
                        </b-col>
                        <b-col cols="6">
                            <!-- invoiceName -->
                            <b-form-group :label="$t('ProductList.invoiceName')">
                                <b-form-input
                                    :value="basicInformation.invoice_name"
                                    :placeholder="$t('ProductList.invoiceName')"
                                    type="text"
                                    readonly
                                />
                            </b-form-group>
                        </b-col>
                    </b-row>
                    <b-row>
                        <b-col cols="6">
                            <!-- specification -->
                            <b-form-group :label="$t('ProductList.specification')">
                                <b-form-input
                                    :value="basicInformation.sku"
                                    :placeholder="$t('ProductList.specification')"
                                    type="text"
                                    readonly
                                />
                            </b-form-group>
                        </b-col>
                        <b-col cols="6">
                            <!-- category -->
                            <b-form-group :label="$t('ProductList.category')">
                                <b-form-input
                                    :value="basicInformation.category && basicInformation.category.name"
                                    :placeholder="$t('ProductList.category')"
                                    type="text"
                                    readonly
                                />
                            </b-form-group>
                        </b-col>
                    </b-row>
                    <b-row>
                        <b-col cols="6">
                            <!-- unit -->
                            <b-form-group :label="$t('ProductList.unit')">
                                <b-form-input
                                    :value="basicInformation.unit"
                                    :placeholder="$t('ProductList.unit')"
                                    type="text"
                                    readonly
                                />
                            </b-form-group>
                        </b-col>
                        <b-col cols="6">
                            <!-- barcode -->
                            <b-form-group :label="$t('ProductList.barcode')">
                                <b-form-input
                                    :value="basicInformation.barcode"
                                    :placeholder="$t('ProductList.barcode')"
                                    type="text"
                                    readonly
                                />
                            </b-form-group>
                        </b-col>
                    </b-row>
                    <b-row>
                        <b-col cols="6">
                            <!-- averageCost -->
                            <b-form-group :label="$t('ProductList.averageCost')">
                                <b-form-input
                                    :value="basicInformation.average_cost"
                                    :placeholder="$t('ProductList.averageCost')"
                                    type="text"
                                    readonly
                                />
                            </b-form-group>
                        </b-col>
                        <b-col cols="6">
                            <!-- currentTotalCost -->
                            <b-form-group :label="$t('ProductList.currentTotalCost')">
                                <b-form-input
                                    :value="basicInformation.current_total_cost"
                                    :placeholder="$t('ProductList.currentTotalCost')"
                                    type="text"
                                    readonly
                                />
                            </b-form-group>
                        </b-col>
                    </b-row>
                    <b-row>
                        <b-col cols="6">
                            <!-- price -->
                            <b-form-group :label="$t('ProductList.price')">
                                <b-form-input
                                    :value="basicInformation.price"
                                    :placeholder="$t('ProductList.price')"
                                    type="text"
                                    readonly
                                />
                            </b-form-group>
                        </b-col>
                    </b-row>
                </b-col>
            </b-row>
        </b-card-body>
    </b-card>
</template>

<script>
import {
    BButton, BForm, BFormGroup, BFormInput, BRow, BCol, BCard, BCardBody, BImg
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
        BCardBody,
        BImg
    },
    props: {
        basicInformation: {
            type: Object,
            default: () => {},
        },
    },
}
</script>
