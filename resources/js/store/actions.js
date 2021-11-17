import axios from "axios";
let actions = {

    
    onFavoritePokemon({commit}, id) {
        return new Promise( (resolve, reject) => {
            axios.post('/setFavoritePokemon', {'pokemon_id' : id})
            .then(({res}) => {
                console.log("res", res)
                resolve('SUCCESS')

            }).catch(err => {
                console.log('Error Found: ' + err)
            })
        } )
    },

    onDislikePokemon({commit}, id) {

        return new Promise( (resolve, reject) => {
            axios.post('/setDislikePokemon', {'pokemon_id' : id})
            .then(({res}) => {
                console.log("res", res)
                resolve('SUCCESS')

            }).catch(err => {
                console.log('Error Found: ' + err)
            })
        } )

    },

    searchPokemon({commit},name) {
        return new Promise( (resolve, reject) => {
            axios.post('/searchPokemon', {'pokemon_name' : name})
            .then((res) => {
                console.log("res", res)
                let data = res.data.result
                let allPokemon = [
                    data.forms[0]
                ]
                commit('ALL_POKEMON', allPokemon)
                resolve('SUCCESS')

            }).catch(err => {
                console.log('Error Found: ' + err)
            })
        } )
    },

    fetchPokemonByUser({commit}, userId) {

    },
    fetchFavoritePokemon({commit}) {

        return new Promise( (resolve, reject) => {
            axios.get('/getLikedPokemon')
            .then((res) => {
                commit('ALL_POKEMON',res.data.result)
                resolve('SUCCESS')
            }).catch(err => {
                console.log('Error Found: ' + err)
            })
        } )

    },

    fetchDislikePokemon({commit}) {
        return new Promise( (resolve, reject) => {
            axios.get('/getDislikePokemon')
            .then((res) => {
                commit('ALL_POKEMON',res.data.result)
                resolve('SUCCESS')
            }).catch(err => {
                console.log('Error Found: ' + err)
            })
        } )
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
