export default [
    {
        path: '/ProductData/ProductDataSetting',
        name: 'ProductData-ProductDataSetting',
        component: () => import('@/views/product-data/ProductDataSetting.vue'),
        meta: {
            pageTitle: 'Product Data Setting',
            breadcrumb: [
                { text: 'Product Data' },
                { text: 'Product Data Setting', active: true },
            ],
        },
    },
    {
        path: '/ProductData/WarehouseDataSetting',
        name: 'ProductData-WarehouseDataSetting',
        component: () => import('@/views/product-data/WarehouseDataSetting.vue'),
        meta: {
            pageTitle: 'Warehouse Data Setting',
            breadcrumb: [
                { text: 'Product Data' },
                { text: 'Warehouse Data Setting', active: true },
            ],
        },
    },
    {
        path: '/ProductData/ProductCategorySetting',
        name: 'ProductData-ProductCategorySetting',
        component: () => import('@/views/product-data/ProductCategorySetting.vue'),
        meta: {
            pageTitle: 'Product Category Setting',
            breadcrumb: [
                { text: 'Product Data' },
                { text: 'Product Category Setting', active: true },
            ],
        },
    },
]