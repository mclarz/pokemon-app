let getters = {

    pokemon: state => {
        return state.pokemon
    },
    pokemon_details: state => {
        return state.pokemon_details
    },
    pokemonId: state => {
        return state.pokemonId   
    }
}

export default getters;
