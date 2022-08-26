export default [
    {
        header: 'INVENTORY MANAGEMENT',
    },
    {
        title: 'Adjust The Transfer Operation',
        icon: 'FileTextIcon',
        children: [
            {
                title: 'Adjustment Category',
                route: 'AdjustTheTransferOperation-AdjustmentCategory',
            },
            {
                title: 'Adjustment Voucher',
                route: 'AdjustTheTransferOperation-AdjustmentVoucherList',
            },
            {
                title: 'Transfer Voucher',
                route: 'AdjustTheTransferOperation-TransferVoucherList',
            },
        ],
    },
]