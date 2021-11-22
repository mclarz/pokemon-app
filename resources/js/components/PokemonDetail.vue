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
        <b-card-title class="text-center">{{ pokeDetails.name }}</b-card-title>
        <b-list-group>
          <b-list-group-item
            v-for="(type, key) in pokeDetails.types"
            :key="key"
            class="text-center"
            >{{ type.type.name }}</b-list-group-item
          >
        </b-list-group>
      </b-card>
      <b-button block size="lg" variant="primary" @click="onFavorite()"
        >Set as Favorite</b-button
      >
      <b-button block size="lg" variant="danger" @click="onDislike()"
        >Set as DisLike</b-button
      >
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
      this.$store
        .dispatch("onFavoritePokemon", this.pokeDetails.id)
        .then((res) => {
          let data = res.data;
          if (data.success) {
            Vue.swal({
              title: "Success",
              text: "Set as favorite pokemon",
              icon: "success",
            });
          } else {
            Vue.swal({
              title: "Error",
              text: data.error,
              icon: "error",
            });
          }

          this.$bvModal.hide("modal-1");
        });
    },
    onDislike() {
      this.$store
        .dispatch("onDislikePokemon", this.pokeDetails.id)
        .then((res) => {
          let data = res.data;
          if (data.success) {
            Vue.swal({
              title: "Success",
              html: 'Set as <b style="color:red">hated</b> pokemon.',
              icon: "success",
            });
          } else {
            Vue.swal({
              title: "Error",
              text: data.error,
              icon: "error",
            });
          }

          this.$bvModal.hide("modal-1");
        });
    },
  },
  computed: {
    pokeDetails() {
      return this.$store.getters.pokemon_details;
    },
  },
};
</script>