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

            <!-- addressList -->
            <b-tab>

                <!-- title -->
                <template #title>
                    <feather-icon
                        icon="HomeIcon"
                        size="18"
                        class="mr-50"
                    />
                    <span class="font-weight-bold">{{ $t('CustomerManufacturerModal.addressInformation') }}</span>
                </template>

                <address-list
                    v-if="addressListData"
                    :address-list="addressListData"
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
import AddressList from './AddressList.vue';

export default {
    components: {
        BTabs,
        BTab,
        BasicInformation,
        OtherRemark,
        AddressList
    },
    data() {
        return {
            data: {},
            addressListData: {
                pageLength: 5,
                searchTerm: '',
                contactDetail: '',
                columns: [
                    { label: '#', field: 'id', type: 'number' },
                    { label: 'addressName', field: 'address_name' },
                    { label: 'postalCode', field: 'postal_code' },
                    { label: 'address', field: 'address' },
                    { label: 'contactDetails', field: 'detail' },
                ],
                rows: []
            },
        }
    },
    mounted() {
        if(this.$route.query.id) {
            axios
            .get(`customer-manufacturers/${this.$route.query.id}`)
            .then(response => {
                const data = response.data;
                console.log(data)
                this.data = data;
                this.addressListData.rows = JSON.parse(JSON.stringify(data.address));
            })
            .catch(error => console.error (error))
        }
    },
}
</script>