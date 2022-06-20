<template>
  <b-nav-item-dropdown
    id="dropdown-grouped"
    variant="link"
    class="dropdown-language"
    right
  >
    <template #button-content>
      <b-img
        :src="currentLocale.img"
        height="14px"
        width="22px"
        :alt="currentLocale.locale"
      />
      <span class="ml-50 text-body">{{ currentLocale.name }}</span>
    </template>
    <b-dropdown-item
      v-for="localeObj in $store.state.auth.locales"
      :key="localeObj.locale"
      @click="$store.dispatch('auth/changeLocale', localeObj)"
    >
      <b-img
        :src="localeObj.img"
        height="14px"
        width="22px"
        :alt="localeObj.locale"
      />
      <span class="ml-50">{{ localeObj.name }}</span>
    </b-dropdown-item>
  </b-nav-item-dropdown>
</template>

<script>
import { BNavItemDropdown, BDropdownItem, BImg } from 'bootstrap-vue'

export default {
  components: {
    BNavItemDropdown,
    BDropdownItem,
    BImg,
  },
  // ! Need to move this computed property to comp function once we get to Vue 3
  computed: {
    currentLocale() {
      return this.$store.state.auth.locales.find(l => l.locale === this.$i18n.locale)
    },
  },
}
</script>

<style>

</style>
