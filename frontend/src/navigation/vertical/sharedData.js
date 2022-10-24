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
                action: 'departments.read',
            },
            {
                title: 'Job Data Setting',
                route: 'BasicData-JobDataSetting',
                action: 'jobs.read',
            },
            {
                title: 'Staff Data Setting',
                route: 'BasicData-StaffDataSettingList',
                action: 'staffs.read',
            },
            {
                title: 'Currency Data Setting',
                route: 'BasicData-CurrencyDataSetting',
                action: 'currencies.read',
            },
            {
                title: 'Project Data Setting',
                route: 'BasicData-ProjectDataSetting',
                action: 'projects.read',
            },
            {
                title: 'Bank Data Setting',
                route: 'BasicData-BankDataSettingList',
                action: 'banks.read',
            },
            {
                title: 'Account Data Setting',
                route: 'BasicData-AccountDataSettingList',
                action: 'bank_accounts.read',
            },
        ],
    },
    {
        title: 'Product Data',
        icon: 'ShoppingCartIcon',
        children: [
            {
                title: 'Product Category Setting',
                route: 'ProductData-ProductCategorySetting',
                action: 'categories.read',
            },
            {
                title: 'Warehouse Data Setting',
                route: 'ProductData-WarehouseDataSettingList',
                action: 'storehouses.read',
            },
            {
                title: 'Product Data Setting',
                route: 'ProductData-ProductDataSettingList',
                action: 'products.read',
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
                action: 'customer_manufacturer_categories.read',
            },
            {
                title: 'Customer/Manufacturer Data',
                route: 'CustomerManufacturerData-CustomerManufacturerDataList',
                action: 'customer_manufacturers.read',
            },
        ],
    },
]
