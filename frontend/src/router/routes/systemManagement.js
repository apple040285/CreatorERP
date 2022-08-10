export default [
    {
        path: '/SystemManagement/RoleManagementList',
        name: 'SystemManagement-RoleManagementList',
        component: () => import('@/views/system-management/RoleManagementList.vue'),
        meta: {
            pageTitle: 'Role Management',
            breadcrumb: [
            { text: 'SYSTEM MANAGEMENT' },
            { text: 'Role Management', active: true },
            ],
        },
    },
    {
        path: '/SystemManagement/RoleManagementCreate',
        name: 'SystemManagement-RoleManagementCreate',
        component: () => import('@/views/system-management/RoleManagementCrud.vue'),
        meta: {
            pageTitle: 'Role Management',
            navActiveLink: 'SystemManagement-RoleManagementList',
            breadcrumb: [
                { text: 'SYSTEM MANAGEMENT' },
                { text: 'Role Management', to: { name: 'SystemManagement-RoleManagementList' } },
                { text: 'create', active: true },
            ],
        },
    },
    {
        path: '/SystemManagement/RoleManagementEdit',
        name: 'SystemManagement-RoleManagementEdit',
        component: () => import('@/views/system-management/RoleManagementCrud.vue'),
        meta: {
            pageTitle: 'Role Management',
            navActiveLink: 'SystemManagement-RoleManagementList',
            breadcrumb: [
                { text: 'SYSTEM MANAGEMENT' },
                { text: 'Role Management', to: { name: 'SystemManagement-RoleManagementList' } },
                { text: 'edit', active: true },
            ],
        },
    },
    {
        path: '/SystemManagement/AccountManagementList',
        name: 'SystemManagement-AccountManagementList',
        component: () => import('@/views/system-management/AccountManagementList.vue'),
        meta: {
            pageTitle: 'Account Management',
            breadcrumb: [
            { text: 'SYSTEM MANAGEMENT' },
            { text: 'Account Management', active: true },
            ],
        },
    },
    {
        path: '/SystemManagement/AccountManagementCreate',
        name: 'SystemManagement-AccountManagementCreate',
        component: () => import('@/views/system-management/AccountManagementCrud.vue'),
        meta: {
            pageTitle: 'Role Management',
            navActiveLink: 'SystemManagement-AccountManagementList',
            breadcrumb: [
                { text: 'SYSTEM MANAGEMENT' },
                { text: 'Account Management', to: { name: 'SystemManagement-AccountManagementList' } },
                { text: 'create', active: true },
            ],
        },
    },
    {
        path: '/SystemManagement/AccountManagementEdit',
        name: 'SystemManagement-AccountManagementEdit',
        component: () => import('@/views/system-management/AccountManagementCrud.vue'),
        meta: {
            pageTitle: 'Role Management',
            navActiveLink: 'SystemManagement-AccountManagementList',
            breadcrumb: [
                { text: 'SYSTEM MANAGEMENT' },
                { text: 'Account Management', to: { name: 'SystemManagement-AccountManagementList' } },
                { text: 'edit', active: true },
            ],
        },
    },
]
