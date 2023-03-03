<template>
  <div>
    <b-table-simple
      responsive
      bordered
      style1="overflow-x: visible"
      style="height: 400px"
    >
      <b-thead>
        <b-tr>
          <b-th class="text-nowrap">#</b-th>
          <b-th class="text-nowrap">倉庫商品</b-th>
          <b-th class="text-nowrap">預設倉庫</b-th>
          <b-th class="text-nowrap">實體倉庫1</b-th>
        </b-tr>
      </b-thead>

      <b-tbody>
        <!-- items -->
        <b-tr
          v-for="(transfer, index) in []"
          :key="index"
        >
          <b-th>
            {{ index + 1 }}
          </b-th>
          <b-td class="d-flex justify-content-between align-items-center">
            {{ transfer.no }}
            <b-button
              variant="primary"
              size="sm"
              class="text-right"
              @click="selectTransfer(transfer.id)"
            >
              選擇
            </b-button>
          </b-td>
        </b-tr>
      </b-tbody>
    </b-table-simple>
  </div>
</template>

<script>
import {
  BTableSimple, BThead, BTbody, BTfoot, BTh, BTr, BTd,
} from 'bootstrap-vue'

export default {
  components: {
    BTableSimple,
    BThead,
    BTbody,
    BTfoot,
    BTh,
    BTr,
    BTd,
  },
}
</script>

<style>
</style>