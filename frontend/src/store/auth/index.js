import axios from '@/libs/axios'
import useJwt from '@/auth/jwt/useJwt'
import router from '@/router'
import i18n from '@/libs/i18n'
import { localize } from 'vee-validate';

export default {
  namespaced: true,
  state: {
    name: 'John Doe',
    locales: [
      {
        locale: 'tw',
        img: require('@/assets/images/flags/tw.png'),
        name: '繁體中文',
        code: 'zh_TW',
      },
      {
        locale: 'en',
        img: require('@/assets/images/flags/en.png'),
        name: 'English',
        code: 'en',
      },
      // {
      //   locale: 'fr',
      //   img: require('@/assets/images/flags/fr.png'),
      //   name: 'French',
      // },
      // {
      //   locale: 'de',
      //   img: require('@/assets/images/flags/de.png'),
      //   name: 'German',
      // },
      // {
      //   locale: 'pt',
      //   img: require('@/assets/images/flags/pt.png'),
      //   name: 'Portuguese',
      // },
    ]
  },
  getters: {},
  mutations: {
    UPDATE_NAME(state, val) {
      state.name = val
    },
  },
  actions: {
    changeLocale(ctx, { locale, code }) {
      i18n.locale = locale
      import(`vee-validate/dist/locale/${code}.json`).then(locale => {
        localize(code, locale);
      })
    },
    checkUser({ commit }) {
      return new Promise((resolve, reject) => {
        axios.get('/auth/user')
          .then(response => {
            commit('UPDATE_NAME', response.data.name)
            localStorage.setItem('userData', JSON.stringify(response.data))
            resolve(response)
          })
          .catch(error => {
            localStorage.removeItem(useJwt.jwtConfig.storageTokenKeyName)
            localStorage.removeItem(useJwt.jwtConfig.storageRefreshTokenKeyName)

            // Remove userData from localStorage
            localStorage.removeItem('userData')

            // Reset ability
            // this.$ability.update(initialAbility)

            // Redirect to login page
            // this.$router.push({ name: 'login' })
            reject(error)
          })
      })
    },
    logout() {
      // Remove userData from localStorage
      // ? You just removed token from localStorage. If you like, you can also make API call to backend to blacklist used token
      localStorage.removeItem(useJwt.jwtConfig.storageTokenKeyName)
      localStorage.removeItem(useJwt.jwtConfig.storageRefreshTokenKeyName)

      // Remove userData from localStorage
      localStorage.removeItem('userData')

      // Reset ability
      // this.$ability.update(initialAbility)

      // Redirect to login page
      // this.$router.push({ name: 'login' })
      router.push({ name: 'auth-login' })
    },
  },
}
