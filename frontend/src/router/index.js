import Vue from 'vue'
import VueRouter from 'vue-router'
import store from '@/store'

// Routes
import { isUserLoggedIn } from '@/auth/utils'

import basicData from './routes/basicData'
import productData from './routes/productData'
import customerManufacturerData from './routes/customerManufacturerData'
import procurementOperation from './routes/procurementOperation'
import purchaseOperation from './routes/purchaseOperation'
import orderRoutine from './routes/orderRoutine'
import salesOperation from './routes/salesOperation'
import adjustTheTransferOperation from './routes/adjustTheTransferOperation'
import paymentsReceivable from './routes/paymentsReceivable'
import incomeExpenseOperation from './routes/incomeExpenseOperation'
import notesReceivable from './routes/notesReceivable'
import administrator from './routes/administrator'

Vue.use(VueRouter)

const router = new VueRouter({
  mode: 'history',
  base: process.env.BASE_URL,
  scrollBehavior() {
    return { x: 0, y: 0 }
  },
  routes: [
    {
      path: '/login',
      name: 'auth-login',
      component: () => import('@/views/Login.vue'),
      meta: {
        layout: 'full',
        redirectIfLoggedIn: true,
      },
    },
    {
      path: '/',
      name: 'dashboard',
      component: () => import('@/views/Dashboard.vue'),
      meta: {
        pageTitle: 'Dashboard',
        breadcrumb: [
          {
            text: 'Dashboard',
            active: true,
          },
        ],
      },
    },
    ...basicData,
    ...productData,
    ...customerManufacturerData,
    ...procurementOperation,
    ...purchaseOperation,
    ...orderRoutine,
    ...salesOperation,
    ...adjustTheTransferOperation,
    ...paymentsReceivable,
    ...incomeExpenseOperation,
    ...notesReceivable,
    ...administrator,
    {
      path: '/error-404',
      name: 'error-404',
      component: () => import('@/views/error/Error404.vue'),
      meta: {
        layout: 'full',
      },
    },
    {
      path: '*',
      redirect: 'error-404',
    },
  ],
})

router.beforeEach((routeTo, _, next) => {
  // Check if auth is required on this route
  // (including nested routes).
  const redirectIfLoggedIn = routeTo.matched.some((route) => route.meta.redirectIfLoggedIn)

  // If auth isn't required for the route, just continue.
  if (redirectIfLoggedIn) return next()

  const isLoggedIn = isUserLoggedIn()

  // Redirect to login if not logged in
  if (!isLoggedIn) return next({ name: 'auth-login' })
  store.dispatch('auth/checkUser')
  return next()
})

// ? For splash screen
// Remove afterEach hook if you are not using splash screen
router.afterEach(() => {
  // Remove initial loading
  const appLoading = document.getElementById('loading-bg')
  if (appLoading) {
    appLoading.style.display = 'none'
  }
})

// router.beforeEach((to, _, next) => {
//     // 過濾路由
//     // console.log('next 進入', to.fullPath)
//     // if (to.meta && to.meta.filter) {
//     //   return next()
//     // }

//     // const isLoggedIn = isUserLoggedIn()

//     // if (!isLoggedIn && to.name !== 'auth-login') return next({ name: 'auth-login' })

//     // // 組織方案過期跳轉到方案中心
//     // if (localStorage.getItem('_orgExpired')) {
//     //   localStorage.removeItem('_orgExpired')
//     //   router.app.$swal({
//     //     title: '當前組織方案已過期無法使用',
//     //     customClass: {
//     //       confirmButton: 'btn btn-primary',
//     //     },
//     //     buttonsStyling: false,
//     //   })
//     //   next({ name: 'organization-list' })
//     // }
//     // // 組織方案過期跳轉到方案中心
//     // if (localStorage.getItem('_expired')) {
//     //   localStorage.removeItem('_expired')
//     //   router.app.$swal({
//     //     title: '您的方案已過期',
//     //     customClass: {
//     //       confirmButton: 'btn btn-primary',
//     //     },
//     //     buttonsStyling: false,
//     //   })
//     //   next({ name: 'plan-info-page' })
//     // }

//     // if (isLoggedIn) {
//     //   // 檢查用戶狀態
//     //   store.dispatch('authV2/checkUserState')
//     //     // .then(response => {
//     //     //   console.log(response.data, 'checkUserState')
//     //     // })
//     //     .catch(error => {
//     //       try {
//     //         const { status } = error.response
//     //         // 處理錯誤回傳
//     //         if (to.name !== 'auth-verify') {
//     //           if (status === 402) {
//     //             // 信箱沒通過
//     //             next({ name: 'auth-verify' })
//     //           }
//     //         }
//     //       } catch (e) {
//     //         next({ name: 'auth-login' })
//     //       }
//     //     })

//     //   // 獲得用戶狀態
//     //   getMeHandle(router.app)
//     // }

//     // Redirect if logged in
//     //   if (to.meta.redirectIfLoggedIn && isLoggedIn) {
//     //     next({ name: 'home' })
//     //   }
//     return next()
// })

// // Before each route evaluates...
// router.beforeEach((routeTo, routeFrom, next) => {

//     // Check if auth is required on this route
//     // (including nested routes).
//     const authRequired = routeTo.matched.some((route) => route.meta.authRequired)

//     // If auth isn't required for the route, just continue.
//     if (!authRequired) return next()

//     // If auth is required and the user is logged in...
//     if (store.getters['authSanctum/loggedIn']) {
//         // Validate the local user token...
//         return store.dispatch('authSanctum/authStateChanged')
//             .then((validUser) => {
//                 // If auth isn't required for the route, just continue.
//                 // if (!authRequired) return next()

//                 // Then continue if the token still represents a valid user,
//                 // otherwise redirect to login.
//                 validUser ? next() : redirectToLogin()
//             })
//     }

//     // If auth is required and the user is NOT currently logged in,
//     // redirect to login.
//     redirectToLogin()

//     // eslint-disable-next-line no-unused-vars
//     // eslint-disable-next-line no-inner-declarations
//     function redirectToLogin() {
//         // Pass the original route to the login component
//         next({
//             name: 'login',
//             query: {
//                 redirectFrom: routeTo.fullPath
//             }
//         })
//     }
// })

export default router
