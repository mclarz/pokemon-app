import Home from './components/Home.vue'
import Favorite from './components/Favorite.vue'
import DisLike from './components/DisLike.vue'
import Profile from './components/Profile.vue'
let routes = [
    {
        path: '/',
        component: Home,
    },
    {
        path: '/favorite',
        component: Favorite,
    },
    {
        path: '/dislike',
        component: DisLike,
    },
    {
        path: '/profile',
        component: Profile,
    },

    
]

export default routes;