export default [
    {
        path: '/Administrator/profile',
        name: 'Administrator-Profile',
        component: () => import('@/views/administrator/Profile.vue'),
        meta: {
            pageTitle: 'Profile',
            breadcrumb: [
                {
                text: 'Administrator',
                },
                {
                text: 'Profile',
                active: true,
                },
            ],
        },
    },
]