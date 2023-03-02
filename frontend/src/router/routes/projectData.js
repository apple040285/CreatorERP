export default [
  {
    path: '/ProjectData/ProjectDataSetting',
    name: 'ProjectData-ProjectDataSetting',
    component: () => import('@/views/project-data/project/ProjectList.vue'),
    meta: {
      pageTitle: 'Project Data Setting',
      breadcrumb: [
        { text: 'Project Data' },
        { text: 'Project Data Setting', active: true },
      ],
    },
  },
  {
    path: '/ProjectData/ProjectDataSetting/:id',
    name: 'ProjectData-ProjectEdit',
    component: () => import('@/views/project-data/project/ProjectEdit.vue'),
    meta: {
      pageTitle: 'Project Data Setting',
      navActiveLink: 'ProjectData-ProjectDataSetting',
      breadcrumb: [
        { text: 'Project Data' },
        { text: 'Project Data Setting', active: true },
      ],
    },
  },
]
