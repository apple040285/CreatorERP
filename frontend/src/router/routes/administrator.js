export default [
    {
        path: '/Administrator/Information',
        name: 'Administrator-Information',
        component: () => import('@/views/administrator/Information.vue'),
        meta: {
            pageTitle: 'Information',
            breadcrumb: [
                {
                text: 'Administrator',
                },
                {
                text: 'Information',
                active: true,
                },
            ],
        },
    },
]