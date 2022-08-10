export default [
    {
      header: 'SYSTEM MANAGEMENT',
    },
    {
      title: 'Role Management',
      route: 'SystemManagement-RoleManagementList',
      icon: 'UserCheckIcon',
      action: 'roles.read',
    },
    {
      title: 'Account Management',
      route: 'SystemManagement-AccountManagementList',
      icon: 'UsersIcon',
      action: 'users.read',
    },
]
