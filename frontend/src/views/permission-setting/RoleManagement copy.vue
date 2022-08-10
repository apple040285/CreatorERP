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

    {{ permissionList }}
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
            <b-th>{{ $t("PermissionSetting.menu") }}</b-th>
            <b-th>{{ $t("PermissionSetting.permission") }}</b-th>
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
                ref="treeselect"
                :value-consists-of="`ALL`"
                :multiple="true"
                :options="group.children"
                placeholder="尚未選擇權限"
                :show-count="true"
                :value="test(group)"
                @select="handleSelect"
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

    <b-button
      v-ripple.400="'rgba(255, 255, 255, 0.15)'"
      type="submit"
      variant="primary"
      class="mr-1 text-right"
      @click="update"
    >
      {{ $t("Submit") }}
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
} from "bootstrap-vue";
import Ripple from "vue-ripple-directive";
import { computed, ref } from "@vue/composition-api";
import AppCollapse from "@core/components/app-collapse/AppCollapse.vue";
import AppCollapseItem from "@core/components/app-collapse/AppCollapseItem.vue";
// import the component
import Treeselect from "@riophae/vue-treeselect";
// import the styles
import "@riophae/vue-treeselect/dist/vue-treeselect.css";
import VJstree from "vue-jstree";
import ToastificationContent from "@core/components/toastification/ToastificationContent.vue";

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
    ToastificationContent,
  },
  directives: {
    Ripple,
  },
  setup(_, ctx) {
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

    const showData = ref({});

    const permissionAll = ref([]);

    const permissionOld = computed({
      get: () => {
        if (!showData.value) return [];
        if (!showData.value.names) return [];
        return showData.value.names;
      },
      // get: () => permission.value,
      // set: (val) => {
      //   count.value = val - 1;
      // },
    });

    const permissionList = computed({
      get: () => {
        if (!showData.value) return [];
        if (!showData.value.allPermission) return [];
        return showData.value.allPermission.map((m) => m.id);
      },
      // get: () => permission.value,
      // set: (val) => {
      //   count.value = val - 1;
      // },
    });

    ctx.root.$http.get("/auth/roles/1").then((response) => {
      const data = response.data;
      showData.value = JSON.parse(JSON.stringify(data));
    });

    const update = () => {
      ctx.root.$http.put("/auth/roles/1", showData.value);
    };

    const test = (tree) => {
      if (!showData.value) return [];
      if (!showData.value.names) return [];

      let flat = [];
      flatten(tree, null, 0, "id", flat, (root) => ({
        title: root.id,
      }));

      // [1, 2, 3].includes(2);
      const ids = flat.map((m) => m.id);

      return showData.value.names.filter((value) => ids.includes(value));
    };

    const handleSelect = ({ id }) => {
      const treeselect = ctx.refs.treeselect[1];
      // console.log(treeselect);
      const node = treeselect.getNode(id);
      let newValue;

      if (node.isLeaf) {
        console.log(44);

        const { parentNode } = node;
        if (parentNode && !treeselect.isSelected(parentNode)) {
          newValue = [id];
        }
      } else {
        console.log(222);
        newValue = [id];
        treeselect.traverseDescendantsBFS(node, (descendant) => {
          newValue.push(descendant.id);
        });
      }

      // console.log(newValue);
    }

    const updateValue = (values, index) => {
      permissionAll.value[index] = values;

      const { treeselect } = ctx.refs;

      let sumWithInitial = [];
      treeselect.forEach((element) => {
        sumWithInitial = sumWithInitial.concat(element.internalValue);
      });
      console.log(sumWithInitial, "ok");
    };

    return {
      showData,
      update,

      updateValue,

      permissionList,
      permissionOld,

      test,
      handleSelect,
    };
  },
};
</script>

<style></style>
