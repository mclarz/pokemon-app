<template>
  <div class="col-md-12">
    <div class="row">
      <div class="col-md-8">
        <div class="col-md-12">
          <h2 class="mt-2">List of Pokemon</h2>
          <b-input-group size="lg" class="mt-3">
            <b-form-input
              type="text"
              v-model="pokemonName"
              @change="searchPokemon"
              placeholder="Search by Name or ID"
            ></b-form-input>
            <b-input-group-append>
              <b-button variant="outline-primary" @click="searchPokemon()"
                >Search</b-button
              >
            </b-input-group-append>
          </b-input-group>
          <div v-if="pokemon">
            <div class="row" v-if="pokemon">
              <pokemon
                :pokemon="item"
                v-for="(item, idx) in pokemon"
                :key="idx"
              ></pokemon>
            </div>
            <pagination :pages="20" :current-page="1" :per-page-size="5" />
          </div>
          <div v-else>
            <div class="row">
              <h3 class="text-center m-auto p-5 text-black-50">
                No Data Available
              </h3>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <h2 class="mt-2">Users Pokemon</h2>
        <b-card>
          <user-pokemon></user-pokemon>
        </b-card>
      </div>
    </div>
    <select-pokemon-modal></select-pokemon-modal>
  </div>
</template>
<script>
import Pokemon from "./Pokemon.vue";
import SelectPokemonModal from "./SelectPokemon.vue";
import { mapGetters } from "vuex";
import UserPokemon from "./UserPokemon.vue";
export default {
  data() {
    return {
      pokemonName: "",
    };
  },
  components: { Pokemon, UserPokemon, SelectPokemonModal },
  mounted() {
    this.$store.dispatch("fetchAllPokemon");
  },
  methods: {
    searchPokemon() {
      if (this.pokemonName != "") {
        this.$store
          .dispatch("searchPokemon", this.pokemonName.toLowerCase())
          .then((res) => {
            let data = res.data.result;
            this.$store.state.pokemon = [data];
          });
      } else {
        this.$store.dispatch("fetchAllPokemon");
      }
    },
  },
  computed: {
    ...mapGetters(["pokemon"]),
  },
};
</script>