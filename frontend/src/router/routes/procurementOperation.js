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
        path: '/ProcurementOperation/RequisitionCreate',
        name: 'ProcurementOperation-RequisitionCreate',
        component: () => import('@/views/procurement-operation/requisition/Create.vue'),
        meta: {
            pageTitle: 'Requisition',
            breadcrumb: [
                {
                text: 'Procurement Operation',
                },
                {
                text: 'Requisition',
                },
                {
                text: 'create',
                active: true,
                },
            ],
        },
    },
    {
        path: '/ProcurementOperation/RequisitionEdit',
        name: 'ProcurementOperation-RequisitionEdit',
        component: () => import('@/views/procurement-operation/requisition/Edit.vue'),
        meta: {
            pageTitle: 'Requisition',
            breadcrumb: [
                {
                text: 'Procurement Operation',
                },
                {
                text: 'Requisition',
                },
                {
                text: 'edit',
                active: true,
                },
            ],
        },
    },
    {
        path: '/ProcurementOperation/RequisitionDetail',
        name: 'ProcurementOperation-RequisitionDetail',
        component: () => import('@/views/procurement-operation/requisition/Detail.vue'),
        meta: {
            pageTitle: 'Requisition',
            breadcrumb: [
                {
                text: 'Procurement Operation',
                },
                {
                text: 'Requisition',
                },
                {
                text: 'detail',
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