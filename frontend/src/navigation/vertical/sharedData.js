export default [
    {
        header: 'SHARED DATA',
    },
    {
        title: 'Basic Data',
        icon: 'FileTextIcon',
        children: [
            {
                title: 'Department Data Setting',
                route: 'BasicData-DepartmentDataSetting',
            },
            {
                title: 'Personnel Data Setting',
                route: 'BasicData-PersonnelDataSetting',
            },
            {
                title: 'Currency Data Setting',
                route: 'BasicData-CurrencyDataSetting',
            },
            {
                title: 'Project Data Setting',
                route: 'BasicData-ProjectDataSetting',
            },
            {
                title: 'Bank Data Setting',
                route: 'BasicData-BankDataSetting',
            },
            {
                title: 'Account Data Setting',
                route: 'BasicData-AccountDataSetting',
            },
        ],
    },
    {
        title: 'Product Data',
        icon: 'ShoppingCartIcon',
        children: [
            {
                title: 'Product Data Setting',
                route: 'ProductData-ProductDataSetting',
            },
            {
                title: 'Warehouse Data Setting',
                route: 'ProductData-WarehouseDataSetting',
            },
            {
                title: 'Product Primary Category Setting',
                route: 'ProductData-ProductPrimaryCategorySetting',
            },
            {
                title: 'Product Secondary Category Setting',
                route: 'ProductData-ProductSecondaryCategorySetting',
            },
            {
                title: 'Product Minor Category Setting',
                route: 'ProductData-ProductMinorCategorySetting',
            },
        ],
    },
    {
        title: 'Customer/Manufacturer Data',
        icon: 'UsersIcon',
        children: [
            {
                title: 'Customer/Manufacturer Category',
                route: 'CustomerManufacturerData-CustomerManufacturerCategory',
            },
            {
                title: 'Customer/Manufacturer Data',
                route: 'CustomerManufacturerData-CustomerManufacturerData',
            },
        ],
    },
]