export default [
    {
        path: '/PurchaseOperation/PurchaseVoucher',
        name: 'PurchaseOperation-PurchaseVoucher',
        component: () => import('@/views/purchase-operation/PurchaseVoucher.vue'),
        meta: {
            pageTitle: 'Purchase Voucher',
            breadcrumb: [
                {
                text: 'Purchase Operation',
                },
                {
                text: 'Purchase Voucher',
                active: true,
                },
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
                {
                text: 'Purchase Operation',
                },
                {
                text: 'Returned Purchase Invoice',
                active: true,
                },
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
                {
                text: 'Purchase Operation',
                },
                {
                text: 'Purchase Discount Voucher',
                active: true,
                },
            ],
        },
    },
]