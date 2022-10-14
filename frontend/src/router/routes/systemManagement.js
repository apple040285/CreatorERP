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
        path: '/SystemManagement/FrontendAccountManagementList',
        name: 'SystemManagement-FrontendAccountManagementList',
        component: () => import('@/views/system-management/FrontendAccountManagementList.vue'),
        meta: {
            pageTitle: 'Frontend Account Management',
            breadcrumb: [
            { text: 'SYSTEM MANAGEMENT' },
            { text: 'Frontend Account Management', active: true },
            ],
        },
    },
    {
        path: '/SystemManagement/FrontendAccountManagementCreate',
        name: 'SystemManagement-FrontendAccountManagementCreate',
        component: () => import('@/views/system-management/FrontendAccountManagementCrud.vue'),
        meta: {
            pageTitle: 'Frontend Account Management',
            navActiveLink: 'SystemManagement-FrontendAccountManagementList',
            breadcrumb: [
                { text: 'SYSTEM MANAGEMENT' },
                { text: 'Frontend Account Management', to: { name: 'SystemManagement-FrontendAccountManagementList' } },
                { text: 'create', active: true },
            ],
        },
    },
    {
        path: '/SystemManagement/FrontendAccountManagementEdit',
        name: 'SystemManagement-FrontendAccountManagementEdit',
        component: () => import('@/views/system-management/FrontendAccountManagementCrud.vue'),
        meta: {
            pageTitle: 'Frontend Account Management',
            navActiveLink: 'SystemManagement-FrontendAccountManagementList',
            breadcrumb: [
                { text: 'SYSTEM MANAGEMENT' },
                { text: 'Frontend Account Management', to: { name: 'SystemManagement-FrontendAccountManagementList' } },
                { text: 'edit', active: true },
            ],
        },
    },
    {
        path: '/SystemManagement/BackendAccountManagementList',
        name: 'SystemManagement-BackendAccountManagementList',
        component: () => import('@/views/system-management/BackendAccountManagementList.vue'),
        meta: {
            pageTitle: 'Backend Account Management',
            breadcrumb: [
            { text: 'SYSTEM MANAGEMENT' },
            { text: 'Backend Account Management', active: true },
            ],
        },
    },
    {
        path: '/SystemManagement/BackendAccountManagementCreate',
        name: 'SystemManagement-BackendAccountManagementCreate',
        component: () => import('@/views/system-management/BackendAccountManagementCrud.vue'),
        meta: {
            pageTitle: 'Backend Account Management',
            navActiveLink: 'SystemManagement-BackendAccountManagementList',
            breadcrumb: [
                { text: 'SYSTEM MANAGEMENT' },
                { text: 'Backend Account Management', to: { name: 'SystemManagement-BackendAccountManagementList' } },
                { text: 'create', active: true },
            ],
        },
    },
    {
        path: '/SystemManagement/BackendAccountManagementEdit',
        name: 'SystemManagement-BackendAccountManagementEdit',
        component: () => import('@/views/system-management/BackendAccountManagementCrud.vue'),
        meta: {
            pageTitle: 'Backend Account Management',
            navActiveLink: 'SystemManagement-BackendAccountManagementList',
            breadcrumb: [
                { text: 'SYSTEM MANAGEMENT' },
                { text: 'Backend Account Management', to: { name: 'SystemManagement-BackendAccountManagementList' } },
                { text: 'edit', active: true },
            ],
        },
    },
]
