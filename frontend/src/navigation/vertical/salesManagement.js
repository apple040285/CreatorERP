export default [
  {
    header: 'SALES MANAGEMENT',
    action: 'sales_order.read',
  },
  {
    title: 'Order Routine',
    icon: 'FileTextIcon',
    children: [
      {
        title: 'Quotation Voucher',
        route: 'OrderRoutine-QuotationVoucherList',
        action: 'sales_order.read',
      },
      {
        title: 'Order Voucher',
        route: 'OrderRoutine-OrderVoucherList',
        action: 'sales_order.read',
      },
    ],
  },
  {
    title: 'Sales Operation',
    icon: 'FileTextIcon',
    children: [
      {
        title: 'Sales Voucher',
        route: 'SalesOperation-SalesVoucherList',
        action: 'sales_order.read',
      },
      {
        title: 'Returned Sales Invoice',
        route: 'SalesOperation-ReturnedSalesInvoiceList',
      },
      {
        title: 'Sales Discount Voucher',
        route: 'SalesOperation-SalesDiscountVoucher',
      },
    ],
  },
]
