import axios from '@/libs/axios'
import useJwt from '@/auth/jwt/useJwt'
import router from '@/router'

export default {
  namespaced: true,
  state: {
    name: 'John Doe',
  },
  getters: {},
  mutations: {
    UPDATE_NAME(state, val) {
      state.name = val
    },
  },
  actions: {
    updateInfo({ commit }, data) {
      commit('UPDATE_NAME', data.name)
      localStorage.setItem('userData', JSON.stringify(data))
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
