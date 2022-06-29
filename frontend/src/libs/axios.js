import Vue from 'vue'
import store from '@/store'

// axios
import axios from 'axios'

const axiosIns = axios.create({
  // You can add your headers here
  // ================================
  baseURL: (process.env.VUE_APP_CORE_API_URL || '') + '/api',
  // timeout: 1000,
  headers: {'X-Requested-With': 'XMLHttpRequest'}
})

axiosIns.interceptors.response.use(
  // response => {
  //   // axios 的 data
  //   return response
  // },
  response => response,
  error => {
    // axios 的 data
    const { status } = error.response
    const { message } = error.response.data
    if (status === 403) {
      store.dispatch('auth/logout')
    }
    return Promise.reject(error)
  },
)

Vue.prototype.$http = axiosIns

export default axiosIns
