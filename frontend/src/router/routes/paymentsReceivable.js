export default [
    {
        path: '/PaymentsReceivable/ReceiptAndPaymentVoucher',
        name: 'PaymentsReceivable-ReceiptAndPaymentVoucher',
        component: () => import('@/views/payments-receivable/ReceiptAndPaymentVoucher.vue'),
        meta: {
            pageTitle: 'Receipt And Payment Voucher',
            breadcrumb: [
                {
                text: 'Payments Receivable',
                },
                {
                text: 'Receipt And Payment Voucher',
                active: true,
                },
            ],
        },
    },
]