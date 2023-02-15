export default [
  {
    header: 'PURCHASING MANAGEMENT',
    action: 'purchase_order.read',
  },
  {
    title: 'Procurement Operation',
    icon: 'FileTextIcon',
    children: [
      {
        title: 'Requisition',
        route: 'ProcurementOperation-RequisitionList',
      },
      {
        title: 'Inquiry Voucher',
        route: 'ProcurementOperation-InquiryVoucher',
      },
      {
        title: 'Procurement Voucher',
        route: 'ProcurementOperation-ProcurementVoucherList',
        action: 'procurement_order.read',
      },
    ],
  },
  {
    title: 'Purchase Operation',
    icon: 'FileTextIcon',
    children: [
      {
        title: 'Purchase Voucher',
        route: 'PurchaseOperation-PurchaseVoucherList',
        action: 'purchase_order.read',
      },
      {
        title: 'Returned Purchase Invoice',
        route: 'PurchaseOperation-ReturnedPurchaseInvoiceList',
      },
      {
        title: 'Purchase Discount Voucher',
        route: 'PurchaseOperation-PurchaseDiscountVoucher',
      },
    ],
  },
]
