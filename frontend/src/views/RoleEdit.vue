<template>
  <b-card>
    <!-- 角色名 -->
    <b-form-group
      label="角色名"
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
      label="權限表"
      label-for="permission"
    >
      <b-table-simple
        hover
        responsive
        no-border-collapse
      >
        <b-thead head-variant="light">
          <b-tr>
            <b-th>摩快</b-th>
            <b-th>權限</b-th>
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
                placeholder="尚未選擇權限"
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
                  slot="value-label"
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

    <button @click="update">更新</button>

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
  BFormGroup, BFormInput,
} from 'bootstrap-vue'
import { ref } from '@vue/composition-api'
import AppCollapse from '@core/components/app-collapse/AppCollapse.vue'
import AppCollapseItem from '@core/components/app-collapse/AppCollapseItem.vue'
// import the component
import Treeselect from '@riophae/vue-treeselect'
// import the styles
import '@riophae/vue-treeselect/dist/vue-treeselect.css'
import VJstree from 'vue-jstree'

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

    AppCollapse,
    AppCollapseItem,
    Treeselect,
    VJstree,
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
