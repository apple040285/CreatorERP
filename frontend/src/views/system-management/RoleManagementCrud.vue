<template>
  <b-card>
    <!-- 角色名 -->
    <b-form-group
      :label="$t('PermissionSetting.role')"
      label-for="name"
    >
      <b-form-input
        id="name"
        v-model="showData.name"
        autofocus
        trim
        placeholder="name"
      />
    </b-form-group>

    <!-- 權限表 -->
    <b-form-group
      :label="$t('PermissionSetting.permission')"
      label-for="permission"
    >
      <b-table-simple
        hover
        responsive
        no-border-collapse
      >
        <b-thead head-variant="light">
          <b-tr>
            <b-th>{{ $t('PermissionSetting.menu') }}</b-th>
            <b-th>{{ $t('PermissionSetting.permission') }}</b-th>
          </b-tr>
        </b-thead>

        <b-tbody v-if="showData.toGroup">
          <b-tr
            v-for="(group, key) in showData.toGroup"
            :key="key"
          >
            <b-th class="text-nowrap">
              {{ group.text || group.label }}
            </b-th>
            <b-td>
              <treeselect
                v-model="group.values"
                :value-consists-of="`ALL`"
                :multiple="true"
                :options="group.children"
                :placeholder="$t('PermissionSetting.selectPermission')"
                :show-count="true"
              >

                <label
                  slot="option-label"
                  slot-scope="{ node, shouldShowCount, count, labelClassName, countClassName }"
                  :class="labelClassName"
                >
                  {{ node.raw.text }}
                  <span
                    v-if="shouldShowCount"
                    :class="countClassName"
                  >
                    ({{ count }})
                  </span>
                </label>

                <div
                  t="value-label"
                  slot-scope="{ node }"
                >
                  {{ node.raw.text }}
                </div>
              </treeselect>
            </b-td>
          </b-tr>

        </b-tbody>

      </b-table-simple>
    </b-form-group>

    <b-button
      v-ripple.400="'rgba(255, 255, 255, 0.15)'"
      type="submit"
      variant="primary"
      class="mr-1 text-right"
      @click="update"
    >
      {{ $t('Submit') }}
    </b-button>

    <app-collapse>
      <app-collapse-item title="演示版">
        <v-jstree
          v-if="showData.toGroup"
          :data="showData.toGroup"
          show-checkbox
          multiple
          collapse
          allow-batch
          allow-transition
          whole-row
        />
      </app-collapse-item>
    </app-collapse>
  </b-card>
</template>

<script>
import {
  BCard, BCardText, BLink, BTableSimple, BThead, BTbody, BTr, BTh, BTd,
  BFormGroup, BFormInput, BButton
} from 'bootstrap-vue'
import Ripple from 'vue-ripple-directive'
import { ref } from '@vue/composition-api'
import AppCollapse from '@core/components/app-collapse/AppCollapse.vue'
import AppCollapseItem from '@core/components/app-collapse/AppCollapseItem.vue'
// import the component
import Treeselect from '@riophae/vue-treeselect'
// import the styles
import '@riophae/vue-treeselect/dist/vue-treeselect.css'
import VJstree from 'vue-jstree'
import ToastificationContent from '@core/components/toastification/ToastificationContent.vue'

export default {
  components: {
    BCard,
    BCardText,
    BLink,
    BTableSimple,
    BThead,
    BTbody,
    BTr,
    BTh,
    BTd,
    BFormGroup,
    BFormInput,
    BButton,

    AppCollapse,
    AppCollapseItem,
    Treeselect,
    VJstree,
    ToastificationContent
  },
  directives: {
    Ripple,
  },
  setup(_, ctx) {
    const showData = ref({})

    ctx.root.$http
      .get('/auth/roles/1')
      .then(response => {
        const data = response.data
        showData.value = JSON.parse(JSON.stringify(data))
      })

    const update = () => {
      ctx.root.$http
        .put('/auth/roles/1', showData.value)
    }

    const updateValue = (state, value) => {
      console.log(state, value);
    }

    return {
      showData,
      update,

      updateValue,
    }
  },
}
</script>

<style>
</style>
