<template>
    <div v-if="pokemon">
        <b-card
            img-alt="Image"
            img-top
            style="max-width: 15rem;"
            class="m-2"
        >
            <b-card-img v-if="pokemonDetails.sprites" :src="pokemonDetails.sprites.other.home.front_default"></b-card-img>
            <b-card-title  v-if="pokemonDetails">{{ pokemon.name.toUpperCase() }}</b-card-title>
            <b-card-text v-if="pokemonDetails">
                <li v-for="(allTypes, id) in pokemonDetails.types" :key="id">
                    {{allTypes.type.name}}
                </li>
                <b-button v-b-modal.modal-1 :pokemon="pokemonDetails">Select</b-button>
            </b-card-text>
        </b-card>
    </div>
</template>
<script>
export default {
    data() {
        return {
            pokemonDetails : {}
        }
    },
    props: ['pokemon'],

    methods: {
        async getPokemonById() {
            console.log("asd", this.pokemon)
            let urlSplit = this.pokemon.url.split('/')
            let pokemonId = urlSplit[urlSplit.length - 2] 
            await this.$store.dispatch('fetchPokemonById',pokemonId).then(() => {
                this.pokemonDetails = this.$store.getters.pokemon_details
            })
        }
    },
    mounted() {
        this.getPokemonById()
    }
}
</script>