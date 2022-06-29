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

            <!-- Other Remark -->
            <b-tab>

                <!-- title -->
                <template #title>
                    <feather-icon
                        icon="DollarSignIcon"
                        size="18"
                        class="mr-50"
                    />
                    <span class="font-weight-bold">{{ $t('CurrencyList.exchangeRateSetting') }}</span>
                </template>

                <exchange-rate-setting
                    v-if="data"
                    :exchange-rate-setting="data"
                />
            </b-tab>
        </b-tabs>
    </div>
</template>

<script>
import { BTabs, BTab } from 'bootstrap-vue'
import BasicInformation from './BasicInformation.vue'
import ExchangeRateSetting from './ExchangeRateSetting.vue'

export default {
    components: {
        BTabs,
        BTab,
        BasicInformation,
        ExchangeRateSetting,
    },
    data() {
        return {
            id: '',
            data: {
                id: 1,
                currencyCode: "NTD",
                currencyName: '台幣',
                created_by: 'Dennis',
                created_at: '2022/06/30',
                updated_by: 'Dennis',
                updated_at: '2022/06/30',
                remark: 'test',
                defaultRate: '30',
                buyingRate: '30',
                sellingRate: '30',
                adjustTheDate: '2022/06/30',
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