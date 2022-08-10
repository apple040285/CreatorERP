<template>
  <b-card v-if="showData">
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

        <b-tbody v-if="permissionsGroup">
          <b-tr
            v-for="(group, key) in permissionsGroup"
            :key="key"
          >
            <b-th class="text-nowrap">
              {{ group.name }}
            </b-th>
            <b-td>
              <treeselect
                ref="treeselect"
                :value-consists-of="`ALL`"
                :multiple="true"
                :options="group.children"
                placeholder="尚未選擇權限"
                :show-count="true"
                :value="getValue(group)"
                @input="updateValue($event, key)"
              >
                <label
                  slot="option-label"
                  slot-scope="{
                    node,
                    shouldShowCount,
                    count,
                    labelClassName,
                    countClassName,
                  }"
                  :class="labelClassName"
                >
                  {{ node.raw.name }}
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
                  {{ node.raw.name }}
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
            class="d-block mx-auto"
            @click="onSubmit"
        >
            {{ $t('Submit') }}
        </b-button>
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
  setup(_, { root, refs }) {
    function flatten(
      root,
      parent = null,
      depth = 0,
      key = "id",
      flat = [],
      pick = () => { }
    ) {
      if (Array.isArray(root)) {
        root.forEach((child) => flatten(child, root[key], depth, key, flat, pick));
      } else {
        flat.push({
          parent,
          [key]: root[key],
          depth: depth++,
          ...pick(root, parent, depth, key, flat),
        });

        if (root.children) {
          flatten(root.children, root[key], depth, key, flat, pick);
        }
      }
    }

    const showData = ref(null)

    const permissionsGroup = ref([])

    root.$http
      .get('/permissions/group')
      .then(response => {
        const data = response.data
        permissionsGroup.value = JSON.parse(JSON.stringify(data))
      })

    if (root.$route.query.id) {
      root.$http
        .get(`/roles/${root.$route.query.id}`)
        .then(response => {
          const data = response.data
          showData.value = JSON.parse(JSON.stringify(data))
        })
    } else {
      showData.value = {}
    }

    const onSubmit = () => {
      if (root.$route.query.id) {
        root.$http
          .put(`/roles/${root.$route.query.id}`, showData.value)
          .then(response => {
            this.$toast({
                component: ToastificationContent,
                position: 'top-right',
                props: {
                title: `${this.$t('updatedSuccess')}`,
                icon: 'CoffeeIcon',
                variant: 'success',
                text: `${this.$t('PermissionSetting.permission')} ${this.$t('updatedSuccess')}!`,
                },
            })
          })
      } else {
        root.$http
          .post(`/roles`, showData.value)
          .then(response => {
            this.$toast({
                component: ToastificationContent,
                position: 'top-right',
                props: {
                title: `${this.$t('updatedFailed')}`,
                icon: 'XIcon',
                variant: 'danger',
                text: error.response.data.message,
                },
            })
          })
      }
    }

    // 獲得值
    const getValue = (tree) => {
      if (!showData.value) return [];
      if (!showData.value.permissions) return [];

      let flat = [];

      flatten(tree, null, 0, "id", flat, (root) => ({
        title: root.id,
      }));

      const names = flat.map((m) => m.id);

      return showData.value.permissions.filter((value) => names.includes(value));
    };

    // 更新權限表
    const updateValue = (values, index) => {
      const { treeselect } = refs;

      let sumWithInitial = [];
      treeselect.forEach((element) => {
        sumWithInitial = sumWithInitial.concat(element.internalValue);
      });

      // 更新權限
      showData.value.permissions = sumWithInitial
    };

    return {
      showData,
      permissionsGroup,

      onSubmit,
      getValue,
      updateValue,
    }
  },
}
</script>

<style lang="scss" scoped>
.vue-treeselect--focused::v-deep:not(.vue-treeselect--open) {
  .vue-treeselect__control {
    border-color: #7367f0;
    box-shadow: 0 3px 10px 0 rgb(34 41 47 / 10%);
  }
}

.vue-treeselect::v-deep {
  .vue-treeselect__multi-value-item {
    background-color: #7367f0;
  }

  .vue-treeselect__multi-value-label,
  .vue-treeselect__value-remove {
    color: #fff;
  }

  .vue-treeselect__checkbox--checked {
    background-color: #7367f0;
    border-color: #7367f0;
    box-shadow: 0 3px 10px 0 rgb(34 41 47 / 10%);
  }

  .vue-treeselect__checkbox--unchecked {
    border-color: #7367f0;
    box-shadow: 0 3px 10px 0 rgb(34 41 47 / 10%);
  }
}
</style>
