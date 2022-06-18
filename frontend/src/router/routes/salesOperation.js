export default [
    {
        path: '/SalesOperation/SalesVoucher',
        name: 'SalesOperation-SalesVoucher',
        component: () => import('@/views/sales-operation/SalesVoucher.vue'),
        meta: {
            pageTitle: 'Sales Voucher',
            breadcrumb: [
                {
                text: 'Sales Operation',
                },
                {
                text: 'Sales Voucher',
                active: true,
                },
            ],
        },
    },
    {
        path: '/SalesOperation/ReturnedSalesInvoice',
        name: 'SalesOperation-ReturnedSalesInvoice',
        component: () => import('@/views/sales-operation/ReturnedSalesInvoice.vue'),
        meta: {
            pageTitle: 'Returned Sales Invoice',
            breadcrumb: [
                {
                text: 'Sales Operation',
                },
                {
                text: 'Returned Sales Invoice',
                active: true,
                },
            ],
        },
    },
    {
        path: '/SalesOperation/SalesDiscountVoucher',
        name: 'SalesOperation-SalesDiscountVoucher',
        component: () => import('@/views/sales-operation/SalesDiscountVoucher.vue'),
        meta: {
            pageTitle: 'Sales Discount Voucher',
            breadcrumb: [
                {
                text: 'Sales Operation',
                },
                {
                text: 'Sales Discount Voucher',
                active: true,
                },
            ],
        },
    },
]