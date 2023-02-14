export default [
    {
        path: '/OrderRoutine/QuotationVoucherList',
        name: 'OrderRoutine-QuotationVoucherList',
        component: () => import('@/views/order-routine/QuotationVoucher/List.vue'),
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
        component: () => import('@/views/order-routine/QuotationVoucher/CrudEdit.vue'),
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
        component: () => import('@/views/order-routine/QuotationVoucher/CrudEdit.vue'),
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
    {
        path: '/OrderRoutine/QuotationVoucherDetail',
        name: 'OrderRoutine-QuotationVoucherDetail',
        component: () => import('@/views/order-routine/QuotationVoucher/Detail.vue'),
        meta: {
            pageTitle: 'Quotation Voucher',
            navActiveLink: 'OrderRoutine-QuotationVoucherList',
            breadcrumb: [
                { text: 'Order Routine' },
                { text: 'Quotation Voucher', to: { name: 'OrderRoutine-QuotationVoucherList' } },
                { text: 'detail', active: true },
            ],
        },
    },

    {
        path: '/OrderRoutine/OrderVoucherList',
        name: 'OrderRoutine-OrderVoucherList',
        component: () => import('@/views/order-routine/OrderVoucher/List.vue'),
        meta: {
            pageTitle: 'Order Voucher',
            breadcrumb: [
                { text: 'Order Routine' },
                { text: 'Order Voucher', active: true },
            ],
        },
    },

    {
        path: '/OrderRoutine/OrderVoucherCreate',
        name: 'OrderRoutine-OrderVoucherCreate',
        component: () => import('@/views/order-routine/OrderVoucher/CrudEdit.vue'),
        meta: {
            pageTitle: 'Order Voucher',
            navActiveLink: 'OrderRoutine-OrderVoucherList',
            breadcrumb: [
                { text: 'Order Routine' },
                { text: 'Order Voucher', to: { name: 'OrderRoutine-OrderVoucherList' } },
                { text: 'create', active: true },

            ],
        },
    },

    {
        path: '/OrderRoutine/OrderVoucherEdit',
        name: 'OrderRoutine-OrderVoucherEdit',
        component: () => import('@/views/order-routine/OrderVoucher/CrudEdit.vue'),
        meta: {
            pageTitle: 'Order Voucher',
            navActiveLink: 'OrderRoutine-OrderVoucherList',
            breadcrumb: [
                { text: 'Order Routine' },
                { text: 'Order Voucher', to: { name: 'OrderRoutine-OrderVoucherList' } },
                { text: 'edit', active: true },

            ],
        },
    },

    {
        path: '/OrderRoutine/OrderVoucherDetail',
        name: 'OrderRoutine-OrderVoucherDetail',
        component: () => import('@/views/order-routine/OrderVoucher/Detail.vue'),
        meta: {
            pageTitle: 'Order Voucher',
            navActiveLink: 'OrderRoutine-OrderVoucherList',
            breadcrumb: [
                { text: 'Order Routine' },
                { text: 'Order Voucher', to: { name: 'OrderRoutine-OrderVoucherList' } },
                { text: 'Detail', active: true },

            ],
        },
    },
]