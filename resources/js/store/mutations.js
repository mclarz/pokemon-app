let mutations = {

    ALL_POKEMON(state, data) {
        return state.pokemon = data;
    },
    POKEMON_DETAILS(state, data) {
        return state.pokemon_details = data
    },
    fetchLikedPokemon(state) {

    }

}

export default mutations;