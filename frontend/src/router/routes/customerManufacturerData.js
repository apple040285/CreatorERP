export default [
    {
        path: '/CustomerManufacturerData/CustomerManufacturerCategory',
        name: 'CustomerManufacturerData-CustomerManufacturerCategory',
        component: () => import('@/views/customer-manufacturer-data/CustomerManufacturerCategory.vue'),
        meta: {
            pageTitle: 'Customer/Manufacturer Category',
            breadcrumb: [
                {
                text: 'Customer/Manufacturer Data',
                },
                {
                text: 'Customer/Manufacturer Category',
                active: true,
                },
            ],
        },
    },
    {
        path: '/CustomerManufacturerData/CustomerManufacturerData',
        name: 'CustomerManufacturerData-CustomerManufacturerData',
        component: () => import('@/views/customer-manufacturer-data/CustomerManufacturerData.vue'),
        meta: {
            pageTitle: 'Customer/Manufacturer Data',
            breadcrumb: [
                {
                text: 'Customer/Manufacturer Data',
                },
                {
                text: 'Customer/Manufacturer Data',
                active: true,
                },
            ],
        },
    },
]