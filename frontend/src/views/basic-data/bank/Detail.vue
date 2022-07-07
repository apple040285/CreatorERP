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

export default {
    components: {
        BTabs,
        BTab,
        BasicInformation,
        OtherRemark,
    },
    data() {
        return {
            id: '',
            data: {
                id: 1,
                code: '001',
                swiftCode: '822',
                name: '中國信託',
                englishName: 'CTBC',
                telephone: '0987654321',
                creditCardFeeRates: '0.5',
                created_by: 'Dennis',
                created_at: '2022/06/30',
                updated_by: 'Dennis',
                updated_at: '2022/06/30',
                remark: 'test',
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