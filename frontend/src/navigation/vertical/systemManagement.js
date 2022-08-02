export default [
    {
        header: 'SYSTEM MANAGEMENT',
    },
    {
        title: 'Permission Setting',
        icon: 'ToolIcon',
        children: [
            {
                title: 'Group Permission Setting',
                route: 'PermissionSetting-GroupPermissionSetting',
            },
            {
                title: 'Role Management',
                route: 'PermissionSetting-RoleManagement',
            },
            {
                title: 'Staff Account Setting',
                route: 'PermissionSetting-StaffAccountSetting',
            },
        ],
    },
]