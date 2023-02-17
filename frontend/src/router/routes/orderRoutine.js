export default [
    //報價單
    {
        path: '/OrderRoutine/QuotationVoucherList',
        name: 'OrderRoutine-QuotationVoucherList',
        component: () => import('@/views/order-routine/QuotationVoucher/QuotationVoucherList.vue'),
        meta: {
            pageTitle: 'Quotation Voucher',
            breadcrumb: [
                { text: 'Order Routine' },
                { text: 'Quotation Voucher', active: true },
            ],
        },
    },
    {
        path: '/OrderRoutine/QuotationVoucherEdit',
        name: 'OrderRoutine-QuotationVoucherEdit',
        component: () => import('@/views/order-routine/QuotationVoucher/QuotationVoucherEdit.vue'),
        meta: {
            pageTitle: 'Quotation Voucher',
            navActiveLink: 'OrderRoutine-QuotationVoucherList',
            breadcrumb: [
                { text: 'Order Routine' },
                { text: 'Quotation Voucher', to: { name: 'OrderRoutine-QuotationVoucherList' } },
                { text: 'edit', active: true },

            ],
        },
    },
    {
        path: '/OrderRoutine/QuotationVoucherCreate',
        name: 'OrderRoutine-QuotationVoucherCreate',
        component: () => import('@/views/order-routine/QuotationVoucher/QuotationVoucherEdit.vue'),
        meta: {
            pageTitle: 'Quotation Voucher',
            navActiveLink: 'OrderRoutine-QuotationVoucherList',
            breadcrumb: [
                { text: 'Order Routine' },
                { text: 'Quotation Voucher', to: { name: 'OrderRoutine-QuotationVoucherList' } },
                { text: 'create', active: true },

            ],
        },
    },
    //請購單
    {
        path: '/OrderRoutine/SubscriberList',
        name: 'OrderRoutine-SubscriberVoucherList',
        component: () => import('@/views/order-routine/SubscriberVoucher/SubscriberVoucherList.vue'),
        meta: {
            pageTitle: 'Subscriber Voucher',
            breadcrumb: [
                { text: 'Order Routine' },
                { text: 'Subscriber Voucher', active: true },
            ],
        },
    },

    {
        path: '/OrderRoutine/SubscriberCreate',
        name: 'OrderRoutine-SubscriberVoucherCreate',
        component: () => import('@/views/order-routine/SubscriberVoucher/SubscriberVoucherEdit.vue'),
        meta: {
            pageTitle: 'Subscriber Voucher',
            navActiveLink: 'OrderRoutine-SubscriberVoucherList',
            breadcrumb: [
                { text: 'Order Routine' },
                { text: 'Subscriber Voucher', to: { name: 'OrderRoutine-SubscriberVoucherList' } },
                { text: 'create', active: true },

            ],
        },
    },

    {
        path: '/OrderRoutine/SubscriberEdit',
        name: 'OrderRoutine-SubscriberVoucherEdit',
        component: () => import('@/views/order-routine/SubscriberVoucher/SubscriberVoucherEdit.vue'),
        meta: {
            pageTitle: 'Subscriber Voucher',
            navActiveLink: 'OrderRoutine-SubscriberVoucherList',
            breadcrumb: [
                { text: 'Order Routine' },
                { text: 'Subscriber Voucher', to: { name: 'OrderRoutine-SubscriberVoucherList' } },
                { text: 'edit', active: true },

            ],
        },
    },
]