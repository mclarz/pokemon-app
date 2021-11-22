<template>
  <div class="p-3">
    <br/><br/>
    <div class="col-md-12">
      <div class="row">
        <div class="col-md-9">
          <b-card class="mt-2"
            border-variant="primary"
          >
            <b-card-title>List of Pokemon</b-card-title>
            <b-card-body>
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
              <div v-if="!isLoading">
                <div v-if="pokemon">
                  <div class="row" v-if="pokemon">
                    <pokemon
                      @clicked="onClickChild"
                      :pokemon="item"
                      v-for="(item, idx) in pokemon"
                      :key="idx"
                    ></pokemon>
                  </div>
                  <pagination
                    :pages="pages"
                    :current-page="currentPage"
                    :per-page-size="perPageSize"
                  />
                </div>
                <div v-else>
                  <div class="row">
                    <h3 class="text-center m-auto p-5 text-black-50">
                      No Data Available
                    </h3>
                  </div>
                </div>
              </div>
              <div v-else class="text-center">
                <b-spinner label="Loading..."></b-spinner>
              </div>
            </b-card-body>
          </b-card>
        </div>
        <div class="col-md-3">
          <b-card class="mt-2"  border-variant="primary"
            header="List of Users"
            align="center">
       
            <user-pokemon></user-pokemon>
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
      pokemonName: "",
      currentPage: 1,
      pages: 20,
      perPageSize: 10,
      sendDetail: {},
      showModal: false,
      isLoading: true,
    };
  },
  components: { Pokemon, UserPokemon, PokemonDetail },
  mounted() {
    this.$store.dispatch("fetchAllPokemon").then(() => {
      this.isLoading = false;
    });
  },
  methods: {
    searchPokemon() {
      if (this.pokemonName != "") {
        this.$store
          .dispatch("searchPokemon", this.pokemonName.toLowerCase())
          .then(() => {
            this.isLoading = false;
          });
      } else {
        this.$store.dispatch("fetchAllPokemon").then(() => {
          this.isLoading = false;
        });
      }
    },
    onClickChild(data) {
      this.sendDetail = data;
    },
  },
  computed: {
    ...mapGetters(["pokemon"]),
  },
};
</script>