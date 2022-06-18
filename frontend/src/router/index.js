import Vue from 'vue'
import VueRouter from 'vue-router'
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
      name: 'login',
      component: () => import('@/views/Login.vue'),
      meta: {
        layout: 'full',
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
