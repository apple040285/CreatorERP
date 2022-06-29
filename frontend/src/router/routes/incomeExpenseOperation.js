export default [
    {
        path: '/IncomeExpenseOperation/OtherIncomeVoucher',
        name: 'IncomeExpenseOperation-OtherIncomeVoucher',
        component: () => import('@/views/income-expense-operation/OtherIncomeVoucher.vue'),
        meta: {
            pageTitle: 'Other Income Voucher',
            breadcrumb: [
                { text: 'Income Expense Operation' },
                { text: 'Other Income Voucher', active: true },
            ],
        },
    },
    {
        path: '/IncomeExpenseOperation/OtherExpenseVoucher',
        name: 'IncomeExpenseOperation-OtherExpenseVoucher',
        component: () => import('@/views/income-expense-operation/OtherExpenseVoucher.vue'),
        meta: {
            pageTitle: 'Other Expense Voucher',
            breadcrumb: [
                { text: 'Income Expense Operation' },
                { text: 'Other Expense Voucher', active: true },
            ],
        },
    },
]