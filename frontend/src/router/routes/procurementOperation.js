export default [
    {
        path: '/ProcurementOperation/RequisitionList',
        name: 'ProcurementOperation-RequisitionList',
        component: () => import('@/views/procurement-operation/requisition/List.vue'),
        meta: {
            pageTitle: 'Requisition',
            breadcrumb: [
                {
                text: 'Procurement Operation',
                },
                {
                text: 'Requisition',
                active: true,
                },
            ],
        },
    },
    {
        path: '/ProcurementOperation/InquiryVoucher',
        name: 'ProcurementOperation-InquiryVoucher',
        component: () => import('@/views/procurement-operation/InquiryVoucher.vue'),
        meta: {
            pageTitle: 'Inquiry Voucher',
            breadcrumb: [
                {
                text: 'Procurement Operation',
                },
                {
                text: 'Inquiry Voucher',
                active: true,
                },
            ],
        },
    },
    {
        path: '/ProcurementOperation/ProcurementVoucher',
        name: 'ProcurementOperation-ProcurementVoucher',
        component: () => import('@/views/procurement-operation/ProcurementVoucher.vue'),
        meta: {
            pageTitle: 'Procurement Voucher',
            breadcrumb: [
                {
                text: 'Procurement Operation',
                },
                {
                text: 'Procurement Voucher',
                active: true,
                },
            ],
        },
    },
]