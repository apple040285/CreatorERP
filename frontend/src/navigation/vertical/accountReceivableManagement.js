export default [
    {
        header: 'ACCOUNT RECEIVABLE MANAGEMENT',
    },
    {
        title: 'Payments Receivable',
        icon: 'FileTextIcon',
        children: [
            {
                title: 'Receipt And Payment Voucher',
                route: 'PaymentsReceivable-ReceiptAndPaymentVoucher',
            },
        ],
    },
    {
        title: 'Income Expense Operation',
        icon: 'FileTextIcon',
        children: [
            {
                title: 'Other Income Voucher',
                route: 'IncomeExpenseOperation-OtherIncomeVoucher',
            },
            {
                title: 'Other Expense Voucher',
                route: 'IncomeExpenseOperation-OtherExpenseVoucher',
            },
        ],
    },
    {
        title: 'Notes Receivable',
        icon: 'FileTextIcon',
        children: [
            {
                title: 'Notes Receivable Voucher',
                route: 'NotesReceivable-NotesReceivableVoucher',
            },
        ],
    },
]