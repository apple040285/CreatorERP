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

            <!-- storehousesList -->
            <b-tab>

                <!-- title -->
                <template #title>
                    <feather-icon
                        icon="PackageIcon"
                        size="18"
                        class="mr-50"
                    />
                    <span class="font-weight-bold">{{ $t('ProductModal.warehouseInformation') }}</span>
                </template>

                <storehouse-list
                    v-if="storehouseListData"
                    :storehouse-list="storehouseListData"
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
import StorehouseList from './StorehouseList.vue';

export default {
    components: {
        BTabs,
        BTab,
        BasicInformation,
        OtherRemark,
        StorehouseList,
    },
    data() {
        return {
            data: {},
            storehouseListData: {
                pageLength: 5,
                searchTerm: '',
                columns: [
                    { label: '#', field: 'id', type: 'number'},
                    { label: 'warehouse', field: 'name' },
                    { label: 'stock', field: 'pivot.stock', type: 'number' },
                    { label: 'expectedToEnter', field: 'expectedToEnter', type: 'number' },
                    { label: 'predict', field: 'predict', type: 'number' },
                    { label: 'estimatedStock', field: 'estimatedStock', type: 'number' },
                    { label: 'safetyStock', field: 'pivot.safety_stock', type: 'number' },
                ],
                rows: []
            },
        }
    },
    mounted() {
        if(this.$route.query.id) {
            axios
            .get(`products/${this.$route.query.id}`)
            .then(response => {
                const data = response.data
                this.data = data;
                this.storehouseListData.rows = JSON.parse(JSON.stringify(data.storehouses));
            })
            .catch(error => console.error (error))
        }
    },
}
</script>