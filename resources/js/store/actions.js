import axios from "axios";
// getLikedPokemon
// getHatePokemon
// usersPokemon
// pokemonById
// allPokemon


let actions = {

    
    onLike({commit}, id) {

    },

    onDisLike({commit}, id) {

    },

    searchPokemon({commit},name) {
        return new Promise( (resolve, reject) => {
            axios.post('/api/searchPokemon', {'pokemon_name' : name})
            .then((res) => {
                console.log("res", res)
                let data = res.data.result
                commit('ALL_POKEMON', data)
                resolve('SUCCESS')

            }).catch(err => {
                console.log('Error Found: ' + err)
            })
        } )
    },

    fetchPokemonByUser({commit}, userId) {

    },

    fetchPokemonById({commit}, pokemonId) {
        return new Promise((resolve, reject) => {
            axios.post('/api/pokemonById',{'pokemon_id' : pokemonId})
            .then(res => {
                let data = res.data.result
                commit('POKEMON_DETAILS',data)
                resolve('Success')
            }).catch(err => {
                console.log('Error Found: ' + err)
            })
        })
      
    },

    fetchAllPokemon({commit}) {
        axios.get('/api/allPokemon')
        .then(res => {
            let data = res.data.result.results
            commit('ALL_POKEMON', data)

        }).catch(err => {
            console.log('Error Found: ' + err)
        })
    }
    
}

export default actions;
