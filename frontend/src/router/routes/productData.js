export default [
    {
        path: '/ProductData/ProductDataSetting',
        name: 'ProductData-ProductDataSetting',
        component: () => import('@/views/product-data/ProductDataSetting.vue'),
        meta: {
            pageTitle: 'Product Data Setting',
            breadcrumb: [
                {
                text: 'Product Data',
                },
                {
                text: 'Product Data Setting',
                active: true,
                },
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
                {
                text: 'Product Data',
                },
                {
                text: 'Warehouse Data Setting',
                active: true,
                },
            ],
        },
    },
    {
        path: '/ProductData/ProductPrimaryCategorySetting',
        name: 'ProductData-ProductPrimaryCategorySetting',
        component: () => import('@/views/product-data/ProductPrimaryCategorySetting.vue'),
        meta: {
            pageTitle: 'Product Primary Category Setting',
            breadcrumb: [
                {
                text: 'Product Data',
                },
                {
                text: 'Product Primary Category Setting',
                active: true,
                },
            ],
        },
    },
    {
        path: '/ProductData/ProductSecondaryCategorySetting',
        name: 'ProductData-ProductSecondaryCategorySetting',
        component: () => import('@/views/product-data/ProductSecondaryCategorySetting.vue'),
        meta: {
            pageTitle: 'Product Secondary Category Setting',
            breadcrumb: [
                {
                text: 'Product Data',
                },
                {
                text: 'Product Secondary Category Setting',
                active: true,
                },
            ],
        },
    },
    {
        path: '/ProductData/ProductMinorCategorySetting',
        name: 'ProductData-ProductMinorCategorySetting',
        component: () => import('@/views/product-data/ProductMinorCategorySetting.vue'),
        meta: {
            pageTitle: 'Product Minor Category Setting',
            breadcrumb: [
                {
                text: 'Product Data',
                },
                {
                text: 'Product Minor Category Setting',
                active: true,
                },
            ],
        },
    },
]