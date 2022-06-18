export default [
    {
        path: '/AdjustTheTransferOperation/AdjustmentVoucher',
        name: 'AdjustTheTransferOperation-AdjustmentVoucher',
        component: () => import('@/views/adjust-the-transfer-operation/AdjustmentVoucher.vue'),
        meta: {
            pageTitle: 'Adjustment Voucher',
            breadcrumb: [
                {
                text: 'Adjust The Transfer Operation',
                },
                {
                text: 'Adjustment Voucher',
                active: true,
                },
            ],
        },
    },
    {
        path: '/AdjustTheTransferOperation/TransferVoucher',
        name: 'AdjustTheTransferOperation-TransferVoucher',
        component: () => import('@/views/adjust-the-transfer-operation/TransferVoucher.vue'),
        meta: {
            pageTitle: 'Transfer Voucher',
            breadcrumb: [
                {
                text: 'Adjust The Transfer Operation',
                },
                {
                text: 'Transfer Voucher',
                active: true,
                },
            ],
        },
    },
]