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
                    <span class="font-weight-bold">{{ $t('RequisitionModal.productInformation') }}</span>
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
            id: '',
            data: {
                requisitionDate: '2022-06-23',
                requisitionNo: '20220624001',
                manufacturer: '台積電',
                currency: 'NTD',
                transferNo: 'A123',
                project: '母親節專案',
                buyer: 'dennis',
                purchaseDepartment: '人事部',
                preDeliveryDate: '2022-06-30',
                totalEstimatedAmount: '1,000',
                estimatedTotalInLocalCurrency: '1,000',
                status: 'draft',
                approvalStatus: 'audited',
                created_by: 'dennis',
                created_at: '2022-06-27',
                updated_by: 'dennis',
                updated_at: '2022-06-27',
                remark: 'test',
                id: ''
            },
            productListData: {
                pageLength: 5,
                searchTerm: '',
                columns: [
                    { label: '#', field: 'index' },
                    { label: 'productNo', field: 'productNo' },
                    { label: 'productName', field: 'productName' },
                    { label: 'specification', field: 'specification' },
                    { label: 'unit', field: 'unit' },
                    { label: 'storehouse', field: 'storehouse' },
                    { label: 'quantity', field: 'quantity' },
                    { label: 'unitPrice', field: 'unitPrice' },
                    { label: 'amount', field: 'amount' },
                    { label: 'productPreDeliveryDate', field: 'productPreDeliveryDate' },
                    { label: 'productRemark', field: 'productRemark' },
                ],
                rows: [
                    {
                        productNo: 'A123456',
                        productName : '麥香',
                        specification : '小',
                        unit : '箱',
                        storehouse : '北',
                        quantity : 10,
                        unitPrice : 500,
                        amount : 100,
                        productPreDeliveryDate : '2022-06-30',
                        productRemark : 'test',
                    }
                ]
            },
        }
    },
    mounted() {
        if(this.$route.query.id) this.id = this.$route.query.id;
    },
}
</script>

<style lang="scss">
@import '@core/scss/vue/libs/vue-good-table.scss';
</style>