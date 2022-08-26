export default [
    {
        path: '/AdjustTheTransferOperation/AdjustmentCategory',
        name: 'AdjustTheTransferOperation-AdjustmentCategory',
        component: () => import('@/views/adjust-the-transfer-operation/AdjustmentCategory.vue'),
        meta: {
            pageTitle: 'Adjustment Category',
            breadcrumb: [
                { text: 'Adjust The Transfer Operation' },
                { text: 'Adjustment Category', active: true },
            ],
        },
    },
    {
        path: '/AdjustTheTransferOperation/AdjustmentVoucherList',
        name: 'AdjustTheTransferOperation-AdjustmentVoucherList',
        component: () => import('@/views/adjust-the-transfer-operation/adjustment-voucher/List.vue'),
        meta: {
            pageTitle: 'Adjustment Voucher',
            breadcrumb: [
                { text: 'Adjust The Transfer Operation' },
                { text: 'Adjustment Voucher', active: true },
            ],
        },
    },
    {
        path: '/AdjustTheTransferOperation/AdjustmentVoucherCreate',
        name: 'AdjustTheTransferOperation-AdjustmentVoucherCreate',
        component: () => import('@/views/adjust-the-transfer-operation/adjustment-voucher/Crud.vue'),
        meta: {
            pageTitle: 'Adjustment Voucher',
            navActiveLink: 'AdjustTheTransferOperation-AdjustmentVoucherList',
            breadcrumb: [
                { text: 'Adjust The Transfer Operation' },
                { text: 'Adjustment Voucher', to: { name: 'AdjustTheTransferOperation-AdjustmentVoucherList' } },
                { text: 'create', active: true },
            ],
        },
    },
    {
        path: '/AdjustTheTransferOperation/AdjustmentVoucherEdit',
        name: 'AdjustTheTransferOperation-AdjustmentVoucherEdit',
        component: () => import('@/views/adjust-the-transfer-operation/adjustment-voucher/Crud.vue'),
        meta: {
            pageTitle: 'Adjustment Voucher',
            navActiveLink: 'AdjustTheTransferOperation-AdjustmentVoucherList',
            breadcrumb: [
                { text: 'Adjust The Transfer Operation' },
                { text: 'Adjustment Voucher', to: { name: 'AdjustTheTransferOperation-AdjustmentVoucherList' } },
                { text: 'edit', active: true },
            ],
        },
    },
    {
        path: '/AdjustTheTransferOperation/AdjustmentVoucherDetail',
        name: 'AdjustTheTransferOperation-AdjustmentVoucherDetail',
        component: () => import('@/views/adjust-the-transfer-operation/adjustment-voucher/Detail.vue'),
        meta: {
            pageTitle: 'Adjustment Voucher',
            navActiveLink: 'AdjustTheTransferOperation-AdjustmentVoucherList',
            breadcrumb: [
                { text: 'Adjust The Transfer Operation' },
                { text: 'Adjustment Voucher', to: { name: 'AdjustTheTransferOperation-AdjustmentVoucherList' } },
                { text: 'detail', active: true },
            ],
        },
    },
    {
        path: '/AdjustTheTransferOperation/TransferVoucherList',
        name: 'AdjustTheTransferOperation-TransferVoucherList',
        component: () => import('@/views/adjust-the-transfer-operation/transfer-voucher/List.vue'),
        meta: {
            pageTitle: 'Transfer Voucher',
            breadcrumb: [
                { text: 'Adjust The Transfer Operation' },
                { text: 'Transfer Voucher', active: true },
            ],
        },
    },
    {
        path: '/AdjustTheTransferOperation/TransferVoucherCreate',
        name: 'AdjustTheTransferOperation-TransferVoucherCreate',
        component: () => import('@/views/adjust-the-transfer-operation/transfer-voucher/Crud.vue'),
        meta: {
            pageTitle: 'Transfer Voucher',
            navActiveLink: 'AdjustTheTransferOperation-TransferVoucherList',
            breadcrumb: [
                { text: 'Adjust The Transfer Operation' },
                { text: 'Transfer Voucher', to: { name: 'AdjustTheTransferOperation-TransferVoucherList' } },
                { text: 'create', active: true },
            ],
        },
    },
    {
        path: '/AdjustTheTransferOperation/TransferVoucherEdit',
        name: 'AdjustTheTransferOperation-TransferVoucherEdit',
        component: () => import('@/views/adjust-the-transfer-operation/transfer-voucher/Crud.vue'),
        meta: {
            pageTitle: 'Transfer Voucher',
            navActiveLink: 'AdjustTheTransferOperation-TransferVoucherList',
            breadcrumb: [
                { text: 'Adjust The Transfer Operation' },
                { text: 'Transfer Voucher', to: { name: 'AdjustTheTransferOperation-TransferVoucherList' } },
                { text: 'edit', active: true },
            ],
        },
    },
    {
        path: '/AdjustTheTransferOperation/TransferVoucherDetail',
        name: 'AdjustTheTransferOperation-TransferVoucherDetail',
        component: () => import('@/views/adjust-the-transfer-operation/transfer-voucher/Detail.vue'),
        meta: {
            pageTitle: 'Transfer Voucher',
            navActiveLink: 'AdjustTheTransferOperation-TransferVoucherList',
            breadcrumb: [
                { text: 'Adjust The Transfer Operation' },
                { text: 'Transfer Voucher', to: { name: 'AdjustTheTransferOperation-TransferVoucherList' } },
                { text: 'detail', active: true },
            ],
        },
    },
]