<template>
    <b-tabs
        vertical
        content-class="col-12 col-md-9 mt-1 mt-md-0"
        pills
        nav-wrapper-class="col-md-3 col-12"
        nav-class="nav-left"
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
                v-if="options.basicInformation.data"
                :basic-information="options.basicInformation.data"
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
                v-if="options.otherRemark.data"
                :other-remark="options.otherRemark.data"
            />
        </b-tab>
    </b-tabs>
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
            options: {
                basicInformation: {
                    data: {
                        bio: '',
                        dob: null,
                        country: 'USA',
                        website: '',
                        phone: 6562542568,
                    },
                },
                otherRemark: {
                    data: {
                        bio: '',
                        dob: null,
                        country: 'USA',
                        website: '',
                        phone: 6562542568,
                    },
                },
            }
        }
    },
    mounted() {
        if(this.$route.query.id) this.id = this.$route.query.id;
    },
}
</script>