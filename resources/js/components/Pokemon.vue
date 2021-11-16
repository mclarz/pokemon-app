<template>
  <div v-if="pokemon">
    <b-card img-alt="Image" img-top style="max-width: 15rem" class="m-2">
      <b-card-img
        v-if="pokemon"
        :src="`${pokeImage}${pokemonId}.png`"
      ></b-card-img>
      <b-card-title class="text-center">{{
        pokemon.name.toUpperCase()
      }}</b-card-title>
      <b-card-text>
        <b-button block variant="primary" @click="receiveDetail">
          <b-icon-eye></b-icon-eye>
          view
        </b-button>
      </b-card-text>
    </b-card>
  </div>
</template>
<script>
export default {
  data() {
    return {
      pokemonDetails: {},
      pokemonId: '',
      pokeImage:
        "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/home/",
    };
  },
  props: {
    pokemon: Object,
  },
  watch: {
    pokemon() {
      let urlSplit = this.pokemon.url.split("/");
      let id = urlSplit[urlSplit.length - 2];
      this.pokemonId = id;
    },
  },
  methods: {
    async getPokemonById() {
      let urlSplit = this.pokemon.url.split("/");
      let id = urlSplit[urlSplit.length - 2];
      this.pokemonId = id;
    },
    receiveDetail() {
      this.$store.dispatch("fetchPokemonById", this.pokemonId).then((res) => {
        this.$emit("clicked", this.$store.state.pokemon_details);
        this.$bvModal.show("modal-1");
      });
    },
  },
  mounted() {
    this.getPokemonById();
  },
};
</script>