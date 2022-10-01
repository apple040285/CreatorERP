<template>
    <div>
        <b-tabs
            content-class="col-12 mt-1 mt-md-0"
            pills
            nav-wrapper-class="col-12"
        >
            <!-- Basic Information -->
            <b-tab>

                <!-- title -->
                <template #title>
                    <feather-icon
                        icon="FileTextIcon"
                        size="18"
                        class="mr-50"
                    />
                    <span class="font-weight-bold">{{ $t('Basic Information') }}</span>
                </template>

                <basic-information
                    v-if="data"
                    :basic-information="data"
                />
            </b-tab>

            <!-- Product List -->
            <b-tab>

                <!-- title -->
                <template #title>
                    <feather-icon
                        icon="ShoppingCartIcon"
                        size="18"
                        class="mr-50"
                    />
                    <span class="font-weight-bold">{{ $t('SalesVoucherModal.productInformation') }}</span>
                </template>

                <product-list
                    v-if="productListData"
                    :product-list="productListData"
                />
            </b-tab>

            <!-- Other Remark -->
            <b-tab>

                <!-- title -->
                <template #title>
                    <feather-icon
                        icon="EditIcon"
                        size="18"
                        class="mr-50"
                    />
                    <span class="font-weight-bold">{{ $t('Other Remark') }}</span>
                </template>

                <other-remark
                    v-if="data"
                    :other-remark="data"
                />
            </b-tab>
        </b-tabs>
    </div>
</template>

<script>
import axios from "@axios";
import { BTabs, BTab } from 'bootstrap-vue'
import BasicInformation from './BasicInformation.vue'
import OtherRemark from './OtherRemark.vue'
import ProductList from './ProductList.vue'

export default {
    components: {
        BTabs,
        BTab,
        BasicInformation,
        OtherRemark,
        ProductList
    },
    data() {
        return {
            data: {},
            productListData: {
                pageLength: 5,
                searchTerm: '',
                columns: [
                    { label: '#', field: 'id', type: 'number' },
                    { label: 'productNo', field: 'product.code' },
                    { label: 'productName', field: 'product.name' },
                    { label: 'specification', field: 'specification' },
                    { label: 'unit', field: 'product.unit' },
                    { label: 'storehouse', field: 'storehouse' },
                    { label: 'quantity', field: 'quantity', type: 'number' },
                    { label: 'unitPrice', field: 'price', type: 'number' },
                    { label: 'amount', field: 'amount', type: 'number' },
                    { label: 'numberOfTransfers', field: 'numberOfTransfers', type: 'number' },
                    { label: 'untransferredQuantity', field: 'untransferredQuantity', type: 'number' },
                    { label: 'productRemark', field: 'remark' },
                ],
                rows: []
            },
        }
    },
    mounted() {
        if(this.$route.query.id) {
            axios
            .get(`sales-orders/${this.$route.query.id}`)
            .then(response => {
                const data = response.data
                this.data = data;
                this.productListData.rows = JSON.parse(JSON.stringify(data.items));
            })
            .catch(error => console.error (error))
        }
    },
}
</script>

<style lang="scss">
@import '@core/scss/vue/libs/vue-good-table.scss';
</style>
