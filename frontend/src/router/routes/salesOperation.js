export default [
    {
        path: '/SalesOperation/SalesVoucherList',
        name: 'SalesOperation-SalesVoucherList',
        component: () => import('@/views/sales-operation/sales-voucher/List.vue'),
        meta: {
            pageTitle: 'Sales Voucher',
            breadcrumb: [
                { text: 'Sales Operation' },
                { text: 'Sales Voucher', active: true },
            ],
        },
    },
    {
        path: '/SalesOperation/SalesVoucherCreate',
        name: 'SalesOperation-SalesVoucherCreate',
        component: () => import('@/views/sales-operation/sales-voucher/Crud.vue'),
        meta: {
            pageTitle: 'Sales Voucher',
            navActiveLink: 'SalesOperation-SalesVoucherList',
            breadcrumb: [
                { text: 'Sales Operation' },
                { text: 'Sales Voucher', to: { name: 'SalesOperation-SalesVoucherList' } },
                { text: 'create', active: true },
            ],
        },
    },
    {
        path: '/SalesOperation/SalesVoucherEdit',
        name: 'SalesOperation-SalesVoucherEdit',
        component: () => import('@/views/sales-operation/sales-voucher/Crud.vue'),
        meta: {
            pageTitle: 'Sales Voucher',
            navActiveLink: 'SalesOperation-SalesVoucherList',
            breadcrumb: [
                { text: 'Sales Operation' },
                { text: 'Sales Voucher', to: { name: 'SalesOperation-SalesVoucherList' } },
                { text: 'edit', active: true },
            ],
        },
    },
    {
        path: '/SalesOperation/SalesVoucherDetail',
        name: 'SalesOperation-SalesVoucherDetail',
        component: () => import('@/views/sales-operation/sales-voucher/Detail.vue'),
        meta: {
            pageTitle: 'Sales Voucher',
            navActiveLink: 'SalesOperation-SalesVoucherList',
            breadcrumb: [
                { text: 'Sales Operation' },
                { text: 'Sales Voucher', to: { name: 'SalesOperation-SalesVoucherList' } },
                { text: 'detail', active: true },
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
                { text: 'Sales Operation' },
                { text: 'Returned Sales Invoice', active: true },
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
                { text: 'Sales Operation' },
                { text: 'Sales Discount Voucher', active: true },
            ],
        },
    },
]