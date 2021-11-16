<template>
  <b-container>
    <b-modal
      id="modal-1"
      title="Pokemon Details"
      ok-only
      ok-variant="secondary"
      ok-title="Close"
      hide-backdrop
    >
      <b-card img-alt="Image" img-top>
        <b-card-img
          v-if="pokeDetails"
          :src="`${pokeImage}${pokeDetails.id}.png`"
        ></b-card-img>
        <b-card-title class="text-center">{{
          pokeDetails.name
        }}</b-card-title>
        <b-list-group>
          <b-list-group-item v-for="(type,key) in pokeDetails.types" :key="key" class="text-center">{{ type.type.name }}</b-list-group-item>
        </b-list-group>
      </b-card>
      <b-button block size="lg" variant="primary" @click="onFavorite()"
        >Favorite</b-button
      >
      <b-button block size="lg" variant="danger" @click="onDislike()">DisLike</b-button>
    </b-modal>
  </b-container>
</template>
<script>
export default {
  data() {
    return {
      pokeImage:
        "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/home/",
    };
  },
  methods: {
    onFavorite() {
        this.$store.dispatch('onFavoritePokemon',this.pokeDetails.id)
    },
    dislikePokemon() {
        this.$store.dispatch('onDislikePokemon',this.pokeDetails.id)
    },
  },
  computed: {
    pokeDetails() {
      return this.$store.getters.pokemon_details;
    },
  },
};
</script>