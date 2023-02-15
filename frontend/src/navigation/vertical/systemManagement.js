export default [
  {
    header: 'SYSTEM MANAGEMENT',
    action: 'roles.read',
  },
  {
    title: 'Role Management',
    route: 'SystemManagement-RoleManagementList',
    icon: 'UserCheckIcon',
    action: 'roles.read',
  },
  {
    title: 'Frontend Account Management',
    route: 'SystemManagement-FrontendAccountManagementList',
    icon: 'UsersIcon',
    action: 'users.read',
  },
  {
    title: 'Backend Account Management',
    route: 'SystemManagement-BackendAccountManagementList',
    icon: 'UsersIcon',
    action: 'users.read',
  },
]
