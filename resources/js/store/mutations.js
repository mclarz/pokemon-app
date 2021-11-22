let mutations = {

    ALL_POKEMON(state, data) {
        state.pokemon = data;
    },
    POKEMON_DETAILS(state, data) {
        state.pokemon_details = data
        state.showDetail = true
    },
    USER_POKEMON(state, data) {
        state.userPokemon = data
    }

}

export default mutations;