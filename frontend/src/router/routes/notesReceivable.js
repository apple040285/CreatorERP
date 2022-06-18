export default [
    {
        path: '/NotesReceivable/NotesReceivableVoucher',
        name: 'NotesReceivable-NotesReceivableVoucher',
        component: () => import('@/views/notes-receivable/NotesReceivableVoucher.vue'),
        meta: {
            pageTitle: 'Notes Receivable Voucher',
            breadcrumb: [
                {
                text: 'Notes Receivable',
                },
                {
                text: 'Notes Receivable Voucher',
                active: true,
                },
            ],
        },
    },
]