export default [
    {
        path: '/CustomerManufacturerData/CustomerManufacturerCategory',
        name: 'CustomerManufacturerData-CustomerManufacturerCategory',
        component: () => import('@/views/customer-manufacturer-data/CustomerManufacturerCategory.vue'),
        meta: {
            pageTitle: 'Customer/Manufacturer Category',
            breadcrumb: [
                { text: 'Customer/Manufacturer Data' },
                { text: 'Customer/Manufacturer Category', active: true },
            ],
        },
    },
    {
        path: '/CustomerManufacturerData/CustomerManufacturerDataList',
        name: 'CustomerManufacturerData-CustomerManufacturerDataList',
        component: () => import('@/views/customer-manufacturer-data/customerManufacturer/List.vue'),
        meta: {
            pageTitle: 'Customer/Manufacturer Data',
            breadcrumb: [
                { text: 'Customer/Manufacturer Data' },
                { text: 'Customer/Manufacturer Data', active: true },
            ],
        },
    },
    {
        path: '/CustomerManufacturerData/CustomerManufacturerDataDetail',
        name: 'CustomerManufacturerData-CustomerManufacturerDataDetail',
        component: () => import('@/views/customer-manufacturer-data/customerManufacturer/Detail.vue'),
        meta: {
            pageTitle: 'Customer/Manufacturer Data',
            breadcrumb: [
                { text: 'Customer/Manufacturer Data' },
                { text: 'Customer/Manufacturer Data', to: { name: 'CustomerManufacturerData-CustomerManufacturerDataList' } },
                { text: 'detail', active: true },
            ],
        },
    },
    {
        path: '/CustomerManufacturerData/CustomerManufacturerDataCreate',
        name: 'CustomerManufacturerData-CustomerManufacturerDataCreate',
        component: () => import('@/views/customer-manufacturer-data/customerManufacturer/Crud.vue'),
        meta: {
            pageTitle: 'Customer/Manufacturer Data',
            breadcrumb: [
                { text: 'Customer/Manufacturer Data' },
                { text: 'Customer/Manufacturer Data', to: { name: 'CustomerManufacturerData-CustomerManufacturerDataList' } },
                { text: 'create', active: true },
            ],
        },
    },
    {
        path: '/CustomerManufacturerData/CustomerManufacturerDataEdit',
        name: 'CustomerManufacturerData-CustomerManufacturerDataEdit',
        component: () => import('@/views/customer-manufacturer-data/customerManufacturer/Crud.vue'),
        meta: {
            pageTitle: 'Customer/Manufacturer Data',
            breadcrumb: [
                { text: 'Customer/Manufacturer Data' },
                { text: 'Customer/Manufacturer Data', to: { name: 'CustomerManufacturerData-CustomerManufacturerDataList' } },
                { text: 'edit', active: true },
            ],
        },
    },
]