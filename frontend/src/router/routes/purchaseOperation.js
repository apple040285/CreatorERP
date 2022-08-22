export default [
    {
        path: '/PurchaseOperation/PurchaseVoucherList',
        name: 'PurchaseOperation-PurchaseVoucherList',
        component: () => import('@/views/purchase-operation/purchase-voucher/List.vue'),
        meta: {
            pageTitle: 'Purchase Voucher',
            breadcrumb: [
                { text: 'Purchase Operation' },
                { text: 'Purchase Voucher', active: true },
            ],
        },
    },
    {
        path: '/PurchaseOperation/PurchaseVoucherCreate',
        name: 'PurchaseOperation-PurchaseVoucherCreate',
        component: () => import('@/views/purchase-operation/purchase-voucher/Crud.vue'),
        meta: {
            pageTitle: 'Purchase Voucher',
            navActiveLink: 'PurchaseOperation-PurchaseVoucherList',
            breadcrumb: [
                { text: 'Purchase Operation' },
                { text: 'Purchase Voucher', to: { name: 'PurchaseOperation-PurchaseVoucherList' } },
                { text: 'create', active: true },
            ],
        },
    },
    {
        path: '/PurchaseOperation/PurchaseVoucherEdit',
        name: 'PurchaseOperation-PurchaseVoucherEdit',
        component: () => import('@/views/purchase-operation/purchase-voucher/Crud.vue'),
        meta: {
            pageTitle: 'Purchase Voucher',
            navActiveLink: 'PurchaseOperation-PurchaseVoucherList',
            breadcrumb: [
                { text: 'Purchase Operation' },
                { text: 'Purchase Voucher', to: { name: 'PurchaseOperation-PurchaseVoucherList' } },
                { text: 'edit', active: true },
            ],
        },
    },
    {
        path: '/PurchaseOperation/PurchaseVoucherDetail',
        name: 'PurchaseOperation-PurchaseVoucherDetail',
        component: () => import('@/views/purchase-operation/purchase-voucher/Detail.vue'),
        meta: {
            pageTitle: 'Purchase Voucher',
            navActiveLink: 'PurchaseOperation-PurchaseVoucherList',
            breadcrumb: [
                { text: 'Purchase Operation' },
                { text: 'Purchase Voucher', to: { name: 'PurchaseOperation-PurchaseVoucherList' } },
                { text: 'detail', active: true },
            ],
        },
    },
    {
        path: '/PurchaseOperation/ReturnedPurchaseInvoice',
        name: 'PurchaseOperation-ReturnedPurchaseInvoice',
        component: () => import('@/views/purchase-operation/ReturnedPurchaseInvoice.vue'),
        meta: {
            pageTitle: 'Returned Purchase Invoice',
            breadcrumb: [
                { text: 'Purchase Operation' },
                { text: 'Returned Purchase Invoice', active: true },
            ],
        },
    },
    {
        path: '/PurchaseOperation/PurchaseDiscountVoucher',
        name: 'PurchaseOperation-PurchaseDiscountVoucher',
        component: () => import('@/views/purchase-operation/PurchaseDiscountVoucher.vue'),
        meta: {
            pageTitle: 'Purchase Discount Voucher',
            breadcrumb: [
                { text: 'Purchase Operation' },
                { text: 'Purchase Discount Voucher', active: true },
            ],
        },
    },
]