let mutations = {

    ALL_POKEMON(state, data) {
        state.pokemon = data;
    },
    POKEMON_DETAILS(state, data) {
        state.pokemon_details = data
        state.showDetail = true
    },
    fetchLikedPokemon(state) {

    }

}

export default mutations;