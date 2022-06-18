export default [
    {
        path: '/BasicData/DepartmentDataSetting',
        name: 'BasicData-DepartmentDataSetting',
        component: () => import('@/views/basic-data/DepartmentDataSetting.vue'),
        meta: {
            pageTitle: 'Department Data Setting',
            breadcrumb: [
                {
                text: 'Basic Data',
                },
                {
                text: 'Department Data Setting',
                active: true,
                },
            ],
        },
    },
    {
        path: '/BasicData/PersonnelDataSetting',
        name: 'BasicData-PersonnelDataSetting',
        component: () => import('@/views/basic-data/PersonnelDataSetting.vue'),
        meta: {
            pageTitle: 'Personnel Data Setting',
            breadcrumb: [
                {
                text: 'Basic Data',
                },
                {
                text: 'Personnel Data Setting',
                active: true,
                },
            ],
        },
    },
    {
        path: '/BasicData/CurrencyDataSetting',
        name: 'BasicData-CurrencyDataSetting',
        component: () => import('@/views/basic-data/CurrencyDataSetting.vue'),
        meta: {
            pageTitle: 'Currency Data Setting',
            breadcrumb: [
                {
                text: 'Basic Data',
                },
                {
                text: 'Currency Data Setting',
                active: true,
                },
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
                {
                text: 'Basic Data',
                },
                {
                text: 'Project Data Setting',
                active: true,
                },
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
                {
                text: 'Basic Data',
                },
                {
                text: 'Bank Data Setting',
                active: true,
                },
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
                {
                text: 'Basic Data',
                },
                {
                text: 'Account Data Setting',
                active: true,
                },
            ],
        },
    },
]