import Vue from 'vue'
import VueI18n from 'vue-i18n'
import { localize, localeChanged, configure } from 'vee-validate'

Vue.use(VueI18n)
function loadLocaleMessages() {
  const locales = require.context('./locales', true, /[A-Za-z0-9-_,\s]+\.json$/i)
  const messages = {}
  locales.keys().forEach(key => {
    const matched = key.match(/([A-Za-z0-9-_]+)\./i)
    if (matched && matched.length > 1) {
      const locale = matched[1]
      messages[locale] = locales(key)
    }
  })
  return messages
}

const i18n = new VueI18n({
  locale: 'zh_TW',
  fallbackLocale: 'en',
  messages: loadLocaleMessages(),
})

localize(loadLocaleMessages());

configure({
  // this will be used to generate messages.
  defaultMessage: (field, values) => {
    values._field_ = i18n.t(`validations.names.${field}`);
    return i18n.t(`validations.messages.${values._rule_}`, values);
  }
});

localeChanged(); // notify vee-validate of localization changes

export default i18n
