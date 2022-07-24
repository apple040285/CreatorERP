<template>
    <b-card>
        <!-- form -->
        <b-form>
            <b-row>
                <!-- Created By -->
                <b-col cols="6">
                    <b-form-group :label="$t('created_by')">
                        <b-form-input
                            :value="otherRemark.creator && otherRemark.creator.name"
                            :placeholder="$t('created_by')"
                            type="text"
                            readonly
                        />
                    </b-form-group>
                </b-col>
                <!-- Created At -->
                <b-col cols="6">
                    <b-form-group :label="$t('created_at')">
                        <b-form-input
                            :value="otherRemark.created_at"
                            :placeholder="$t('created_at')"
                            type="text"
                            readonly
                        />
                    </b-form-group>
                </b-col>
                <!-- Updated By -->
                <b-col cols="6">
                    <b-form-group :label="$t('updated_by')">
                        <b-form-input
                            :value="otherRemark.editor && otherRemark.editor.name"
                            :placeholder="$t('updated_by')"
                            type="text"
                            readonly
                        />
                    </b-form-group>
                </b-col>
                <!-- Updated At -->
                <b-col cols="6">
                    <b-form-group :label="$t('updated_at')">
                        <b-form-input
                            :value="otherRemark.updated_at"
                            :placeholder="$t('updated_at')"
                            type="text"
                            readonly
                        />
                    </b-form-group>
                </b-col>
                <!-- status -->
                <b-col cols="6">
                    <b-form-group :label="$t('AccountList.status')">
                        <b-form-input
                            :value="otherRemark.status"
                            :placeholder="$t('AccountList.status')"
                            type="text"
                            readonly
                        />
                    </b-form-group>
                </b-col>
                <!-- disable_at -->
                <b-col cols="6">
                    <b-form-group :label="$t('AccountList.disable_at')">
                        <b-form-input
                            :value="otherRemark.disable_at"
                            :placeholder="$t('AccountList.disable_at')"
                            type="text"
                            readonly
                        />
                    </b-form-group>
                </b-col>
                <!--  Remark -->
                <b-col cols="6">
                    <b-form-group :label="$t('remark')">
                        <b-form-textarea
                            :placeholder="$t('remark')"
                            rows="3"
                            :value="otherRemark.remark"
                            readonly
                        />
                    </b-form-group>
                </b-col>
            </b-row>
        </b-form>
    </b-card>
</template>

<script>
import {
    BButton, BForm, BFormGroup, BFormInput, BRow, BCol, BCard, BFormTextarea,
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
        BFormTextarea,
    },
    props: {
        otherRemark: {
            type: Object,
            default: () => {},
        },
    },
}
</script>
