import Vue from 'vue'
import store from '@/store'
import i18n from '@/libs/i18n'

// axios
import axios from 'axios'

const axiosIns = axios.create({
  // You can add your headers here
  // ================================
  baseURL: (process.env.NODE_ENV === 'production' ? '/api' : ((process.env.VUE_APP_CORE_API_URL || '') + '/api')),
  // timeout: 1000,
  headers: { 'Accept': 'application/json' }
})

// Request Interceptor
axiosIns.interceptors.request.use(
  config => {
    // eslint-disable-next-line no-param-reassign
    config.headers['Accept-Language'] = i18n.locale
    return config
  },
  error => Promise.reject(error),
)

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
