<template>
    <div>
         <b-navbar type="dark" variant="dark">
            <b-navbar-brand to="/">Pokemon</b-navbar-brand>
            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
            <b-collapse id="nav-collapse" is-nav>
            <b-navbar-nav>
                <b-nav-item to="/favorite">Favorites</b-nav-item>
                <b-nav-item to="/dislike" >Dislike</b-nav-item>
            </b-navbar-nav>
           
            </b-collapse>
        </b-navbar>
    </div>

</template>

<script>
export default {
    
}
</script>