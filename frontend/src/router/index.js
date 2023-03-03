import Vue from 'vue'
import VueRouter from 'vue-router'
import store from '@/store'

// Routes
import { isUserLoggedIn } from '@/auth/utils'

import systemManagement from './routes/systemManagement'
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
    ...systemManagement,
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

export default router
