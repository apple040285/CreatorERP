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
                route: 'OrderRoutine-QuotationVoucher',
            },
            {
                title: 'Order Voucher',
                route: 'OrderRoutine-OrderVoucher',
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
                route: 'SalesOperation-ReturnedSalesInvoice',
            },
            {
                title: 'Sales Discount Voucher',
                route: 'SalesOperation-SalesDiscountVoucher',
            },
        ],
    },
]