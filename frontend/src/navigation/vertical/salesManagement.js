export default [
    {
        header: 'SALES MANAGEMENT',
    },
    {
        title: 'Order Routine',
        icon: 'FileTextIcon',
        children: [
            {
                title: 'Quotation Voucher',
                route: 'OrderRoutine-QuotationVoucherList',
            },
            {
                title: 'Order Voucher',
                route: 'OrderRoutine-OrderVoucherList',
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