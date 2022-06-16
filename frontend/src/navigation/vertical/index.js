export default [
  {
    title: 'Home',
    route: 'home',
    icon: 'HomeIcon',
  },
  {
    title: 'Second Page',
    route: 'second-page',
    icon: 'FileIcon',
  },
  {
    title: 'Administrator',
    icon: 'HomeIcon',
    route: 'administrator',
    children: [
      {
        title: 'Profile',
        route: 'profile',
        resource: 'Profile',
        action: 'read',
      },
    ],
  }
]
