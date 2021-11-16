<template>
  <div>
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-8">
          <div class="col-md-12">
            <h2 class="mt-2">List of Pokemon</h2>
            <b-input-group size="lg" class="mt-3">
              <b-form-input
                type="text"
                v-model="pokemonName"
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
                <pokemon @clicked="onClickChild"
                  :pokemon="item"
                  v-for="(item, idx) in pokemon"
                  :key="idx"
                ></pokemon>
              </div>
              <pagination :pages="20" :current-page="1" :per-page-size="10" />
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
            <user-pokemon ></user-pokemon>
          </b-card>
        </div>
      </div>
    </div>
    <pokemon-detail></pokemon-detail>
  </div>
</template>
<script>
import Pokemon from "./Pokemon.vue";
import PokemonDetail from "./PokemonDetail.vue";
import { mapGetters } from "vuex";
import UserPokemon from "./UserPokemon.vue";
export default {
  data() {
    return {
      pokemonName: '',
      sendDetail: {},
      showModal: false
    };
  },
  components: { Pokemon, UserPokemon ,PokemonDetail},
  mounted() {
    this.$store.dispatch("fetchAllPokemon");
  },
  methods: {
    searchPokemon() {
      if (this.pokemonName != "") {
        this.$store.dispatch("searchPokemon", this.pokemonName.toLowerCase());
      } else {
        this.$store.dispatch("fetchAllPokemon");
      }
    },
    onClickChild(data) {
      this.sendDetail = data
    }

  },
  computed: {
    ...mapGetters(["pokemon"]),
  },
};
</script>