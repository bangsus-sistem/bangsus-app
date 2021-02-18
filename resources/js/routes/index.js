import page from './page'
import middleware from './middleware'

export default [
    {
        path: '/login',
        name: 'login',
        component: page('Login'),
        beforeEnter: middleware(['unauthenticated']),
    },
    {
        path: '/logout',
        name: 'logout',
        component: page('Logout'),
        beforeEnter: middleware(['authenticated']),
    },
    {
        path: '/dashboard',
        name: 'dashboard',
        component: page('Dashboard'),
        beforeEnter: middleware(['authenticated']),
    },
]