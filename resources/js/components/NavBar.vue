<template>
    <div>
         <b-navbar type="dark" variant="primary" dark>
            <b-navbar-brand to="/"  tag="h1" class="mb-0">Home</b-navbar-brand>
            <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
            <b-collapse id="nav-collapse" is-nav>
            <b-navbar-nav>
                <b-nav-item to="/favorite">Favorites</b-nav-item>
                <b-nav-item to="/dislike" >Hated</b-nav-item>
            </b-navbar-nav>
             <b-navbar-nav class="ml-auto">
                   <b-nav-item-dropdown right>
                       <template slot="button-content">
                            <i class="fa fa-user"></i>
                        </template>
                    <b-dropdown-item to="/profile">Profile</b-dropdown-item>
                    <b-dropdown-item href="/logout">Logout</b-dropdown-item>
                </b-nav-item-dropdown>
             </b-navbar-nav>
           
            </b-collapse>
        </b-navbar>
    </div>

</template>

<script>
export default {
    
}
</script>