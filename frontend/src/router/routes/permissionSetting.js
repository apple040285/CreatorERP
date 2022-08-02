export default [
    {
        path: '/PermissionSetting/GroupPermissionSetting',
        name: 'PermissionSetting-GroupPermissionSetting',
        component: () => import('@/views/permission-setting/GroupPermissionSetting.vue'),
        meta: {
            pageTitle: 'Group Permission Setting',
            breadcrumb: [
                { text: 'Permission Setting' },
                { text: 'Group Permission Setting', active: true },
            ],
        },
    },
    {
        path: '/PermissionSetting/RoleManagement',
        name: 'PermissionSetting-RoleManagement',
        component: () => import('@/views/permission-setting/RoleManagement.vue'),
        meta: {
            pageTitle: 'Role Management',
            breadcrumb: [
                { text: 'Permission Setting' },
                { text: 'Role Management', active: true },
            ],
        },
    },
    {
        path: '/PermissionSetting/StaffAccountSetting',
        name: 'PermissionSetting-StaffAccountSetting',
        component: () => import('@/views/permission-setting/StaffAccountSetting.vue'),
        meta: {
            pageTitle: 'Staff Account Setting',
            breadcrumb: [
                { text: 'Permission Setting' },
                { text: 'Staff Account Setting', active: true },
            ],
        },
    },
]