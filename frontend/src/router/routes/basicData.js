export default [
    {
        path: '/BasicData/DepartmentDataSetting',
        name: 'BasicData-DepartmentDataSetting',
        component: () => import('@/views/basic-data/DepartmentDataSetting.vue'),
        meta: {
            pageTitle: 'Department Data Setting',
            breadcrumb: [
                { text: 'Basic Data' },
                { text: 'Department Data Setting', active: true },
            ],
        },
    },
    {
        path: '/BasicData/JobDataSetting',
        name: 'BasicData-JobDataSetting',
        component: () => import('@/views/basic-data/JobDataSetting.vue'),
        meta: {
            pageTitle: 'Job Data Setting',
            breadcrumb: [
                { text: 'Basic Data' },
                { text: 'Job Data Setting', active: true },
            ],
        },
    },
    {
        path: '/BasicData/StaffList',
        name: 'BasicData-StaffList',
        component: () => import('@/views/basic-data/staff/List.vue'),
        meta: {
            pageTitle: 'Staff Data Setting',
            breadcrumb: [
                { text: 'Basic Data' },
                { text: 'Staff Data Setting', active: true },
            ],
        },
    },
    {
        path: '/BasicData/StaffCreate',
        name: 'BasicData-StaffCreate',
        component: () => import('@/views/basic-data/staff/Create.vue'),
        meta: {
            pageTitle: 'Staff Data Setting',
            breadcrumb: [
                { text: 'Basic Data' },
                { text: 'Staff Data Setting', to: { name: 'BasicData-StaffList' } },
                { text: 'create', active: true },
            ],
        },
    },
    {
        path: '/BasicData/StaffEdit',
        name: 'BasicData-StaffEdit',
        component: () => import('@/views/basic-data/staff/Edit.vue'),
        meta: {
            pageTitle: 'Staff Data Setting',
            breadcrumb: [
                { text: 'Basic Data' },
                { text: 'Staff Data Setting', to: { name: 'BasicData-StaffList' } },
                { text: 'edit', active: true },
            ],
        },
    },
    {
        path: '/BasicData/CurrencyDataSettingList',
        name: 'BasicData-CurrencyDataSettingList',
        component: () => import('@/views/basic-data/currency/List.vue'),
        meta: {
            pageTitle: 'Currency Data Setting',
            breadcrumb: [
                { text: 'Basic Data' },
                { text: 'Currency Data Setting', active: true },
            ],
        },
    },
    {
        path: '/BasicData/CurrencyDataSettingDetail',
        name: 'BasicData-CurrencyDataSettingDetail',
        component: () => import('@/views/basic-data/currency/Detail.vue'),
        meta: {
            pageTitle: 'Currency Data Setting',
            breadcrumb: [
                { text: 'Basic Data' },
                { text: 'Currency Data Setting', to: { name: 'BasicData-CurrencyDataSettingList' } },
                { text: 'detail', active: true },
            ],
        },
    },
    {
        path: '/BasicData/ProjectDataSetting',
        name: 'BasicData-ProjectDataSetting',
        component: () => import('@/views/basic-data/ProjectDataSetting.vue'),
        meta: {
            pageTitle: 'Project Data Setting',
            breadcrumb: [
                { text: 'Basic Data' },
                { text: 'Project Data Setting', active: true },
            ],
        },
    },
    {
        path: '/BasicData/BankDataSetting',
        name: 'BasicData-BankDataSetting',
        component: () => import('@/views/basic-data/BankDataSetting.vue'),
        meta: {
            pageTitle: 'Bank Data Setting',
            breadcrumb: [
                { text: 'Basic Data' },
                { text: 'Bank Data Setting', active: true },
            ],
        },
    },
    {
        path: '/BasicData/AccountDataSetting',
        name: 'BasicData-AccountDataSetting',
        component: () => import('@/views/basic-data/AccountDataSetting.vue'),
        meta: {
            pageTitle: 'Account Data Setting',
            breadcrumb: [
                { text: 'Basic Data' },
                { text: 'Account Data Setting', active: true },
            ],
        },
    },
]