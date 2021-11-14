<template>
    
    <div class="container">
        <nav-bar></nav-bar>
        <router-view></router-view>
    </div>
</template>

<script>
    export default {
       components: {
           NavBar: () => import('./NavBar.vue')
       }
    }
</script>
