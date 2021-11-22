<template>
  <div class="p-5">
    <b-container center>
      <div class="col-md-12">
        <h2 class="mt-2 text-center mx-auto">Favorite Pokemon</h2>
        <div v-if="!isLoading">
          <div v-if="pokemon.length > 0" class="row">
            <pokemon
              :pokemon="item"
              v-for="(item, idx) in pokemon"
              :key="idx"
            ></pokemon>
          </div>
          <div v-else class="p-3">
             <b-alert show variant="warning" class="text-center border"> No Data Available</b-alert>
          </div>
        </div>
        <div v-else class="text-center h-100">
          <b-spinner label="Loading..."></b-spinner>
        </div>
      </div>
    </b-container>
    <pokemon-detail></pokemon-detail>
  </div>
</template>
<script>
import { mapGetters } from "vuex";
import Pokemon from "./Pokemon.vue";
import PokemonDetail from "./PokemonDetail.vue";
export default {
  data() {
    return {
      isLoading: true,
    };
  },
  components: { Pokemon,PokemonDetail },
  mounted() {
    this.$store.dispatch("fetchFavoritePokemon").then(() => {
      this.isLoading = false;
    });
  },
  methods: {},
  computed: {
    ...mapGetters(["pokemon"]),
     pokeDetails() {
      return this.$store.getters.pokemon_details;
    },
  },
};
</script>