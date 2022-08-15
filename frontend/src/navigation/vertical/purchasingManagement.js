export default [
    {
        header: 'PURCHASING MANAGEMENT',
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
            },
        ],
    },
    {
        title: 'Purchase Operation',
        icon: 'FileTextIcon',
        children: [
            {
                title: 'Purchase Voucher',
                route: 'PurchaseOperation-PurchaseVoucher',
            },
            {
                title: 'Returned Purchase Invoice',
                route: 'PurchaseOperation-ReturnedPurchaseInvoice',
            },
            {
                title: 'Purchase Discount Voucher',
                route: 'PurchaseOperation-PurchaseDiscountVoucher',
            },
        ],
    },
]