import Home from './components/Home.vue'
import Favorite from './components/Favorite.vue'
import DisLike from './components/DisLike.vue'
let routes = [
    {
        path: '/home',
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

    
]

export default routes;