export default [
  {
    header: 'INVENTORY MANAGEMENT',
    action: 'adjust_order.read',
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
        action: 'adjust_order.read',
      },
      {
        title: 'Transfer Voucher',
        route: 'AdjustTheTransferOperation-TransferVoucherList',
        action: 'adjust_order.read',
      },
    ],
  },
]
