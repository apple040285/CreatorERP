export default [
    {
        path: '/ProductData/ProductDataSettingList',
        name: 'ProductData-ProductDataSettingList',
        component: () => import('@/views/product-data/product/List.vue'),
        meta: {
            pageTitle: 'Product Data Setting',
            breadcrumb: [
                { text: 'Product Data' },
                { text: 'Product Data Setting', active: true },
            ],
        },
    },
    {
        path: '/ProductData/ProductDataSettingDetail',
        name: 'ProductData-ProductDataSettingDetail',
        component: () => import('@/views/product-data/product/Detail.vue'),
        meta: {
            pageTitle: 'Product Data Setting',
            navActiveLink: 'ProductData-ProductDataSettingList',
            breadcrumb: [
                { text: 'Product Data' },
                { text: 'Product Data Setting', to: { name: 'ProductData-ProductDataSettingList' } },
                { text: 'detail', active: true },
            ],
        },
    },
    {
        path: '/ProductData/ProductDataSettingCreate',
        name: 'ProductData-ProductDataSettingCreate',
        component: () => import('@/views/product-data/product/Crud.vue'),
        meta: {
            pageTitle: 'Product Data Setting',
            navActiveLink: 'ProductData-ProductDataSettingList',
            breadcrumb: [
                { text: 'Product Data' },
                { text: 'Product Data Setting', to: { name: 'ProductData-ProductDataSettingList' } },
                { text: 'create', active: true },
            ],
        },
    },
    {
        path: '/ProductData/ProductDataSettingEdit',
        name: 'ProductData-ProductDataSettingEdit',
        component: () => import('@/views/product-data/product/Crud.vue'),
        meta: {
            pageTitle: 'Product Data Setting',
            navActiveLink: 'ProductData-ProductDataSettingList',
            breadcrumb: [
                { text: 'Product Data' },
                { text: 'Product Data Setting', to: { name: 'ProductData-ProductDataSettingList' } },
                { text: 'edit', active: true },
            ],
        },
    },
    {
        path: '/ProductData/WarehouseDataSettingList',
        name: 'ProductData-WarehouseDataSettingList',
        component: () => import('@/views/product-data/warehouse/List.vue'),
        meta: {
            pageTitle: 'Warehouse Data Setting',
            breadcrumb: [
                { text: 'Product Data' },
                { text: 'Warehouse Data Setting', active: true },
            ],
        },
    },
    {
        path: '/ProductData/WarehouseDataSettingDetail',
        name: 'ProductData-WarehouseDataSettingDetail',
        component: () => import('@/views/product-data/warehouse/Detail.vue'),
        meta: {
            pageTitle: 'Warehouse Data Setting',
            navActiveLink: 'ProductData-WarehouseDataSettingList',
            breadcrumb: [
                { text: 'Product Data' },
                { text: 'Warehouse Data Setting', to: { name: 'ProductData-WarehouseDataSettingList' } },
                { text: 'detail', active: true },
            ],
        },
    },
    {
        path: '/ProductData/WarehouseDataSettingCreate',
        name: 'ProductData-WarehouseDataSettingCreate',
        component: () => import('@/views/product-data/warehouse/Crud.vue'),
        meta: {
            pageTitle: 'Warehouse Data Setting',
            navActiveLink: 'ProductData-WarehouseDataSettingList',
            breadcrumb: [
                { text: 'Product Data' },
                { text: 'Warehouse Data Setting', to: { name: 'ProductData-WarehouseDataSettingList' } },
                { text: 'create', active: true },
            ],
        },
    },
    {
        path: '/ProductData/WarehouseDataSettingEdit',
        name: 'ProductData-WarehouseDataSettingEdit',
        component: () => import('@/views/product-data/warehouse/Crud.vue'),
        meta: {
            pageTitle: 'Warehouse Data Setting',
            navActiveLink: 'ProductData-WarehouseDataSettingList',
            breadcrumb: [
                { text: 'Product Data' },
                { text: 'Warehouse Data Setting', to: { name: 'ProductData-WarehouseDataSettingList' } },
                { text: 'edit', active: true },
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
    {
        path: '/ProductData/InventorySetting',
        name: 'ProductData-InventorySetting',
        component: () => import('@/views/product-data/inventory/InventoryList.vue'),
        meta: {
            pageTitle: '庫存總管設定',
            breadcrumb: [
                { text: 'Product Data' },
                { text: '庫存總管設定', active: true },
            ],
        },
    },
]