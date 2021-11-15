<template>
    <div class="">
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
