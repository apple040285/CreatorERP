export default [
    {
        path: '/OrderRoutine/QuotationVoucher',
        name: 'OrderRoutine-QuotationVoucher',
        component: () => import('@/views/order-routine/QuotationVoucher.vue'),
        meta: {
            pageTitle: 'Quotation Voucher',
            breadcrumb: [
                { text: 'Order Routine' },
                { text: 'Quotation Voucher', active: true },
            ],
        },
    },
    {
        path: '/OrderRoutine/OrderVoucher',
        name: 'OrderRoutine-OrderVoucher',
        component: () => import('@/views/order-routine/OrderVoucher.vue'),
        meta: {
            pageTitle: 'Order Voucher',
            breadcrumb: [
                { text: 'Order Routine' },
                { text: 'Order Voucher', active: true },
            ],
        },
    },
]