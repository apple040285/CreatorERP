<template>
  <div>
    <b-button
      v-ripple.400="'rgba(255, 255, 255, 0.15)'"
      variant="outline-success"
      size="sm"
      class="mr-50"
      :to="{ name: 'SystemManagement-RoleManagementCreate', query: { id: 1 } }"
    >
      <feather-icon
        icon="Edit2Icon"
        class="mr-25"
      />
      <span>測試</span>
    </b-button>
  </div>
</template>

<script>
import {
  BButton,
} from 'bootstrap-vue'

export default {
  components: {
    BButton,
  },
}
</script>

<style>
</style>