<template>
  <div class="accordion" role="tablist">
    <b-card no-body class="mb-1" v-for="(item, idx) in userPokemon" :key="idx">
      <b-card-header header-tag="header" class="p-1" role="tab">
        <b-button
          block
          v-b-toggle="'accordion-'+ idx"
          variant="default"
          class="text-left"
          >{{ item.name }}</b-button
        >
      </b-card-header>
      <b-collapse :id="`accordion-${idx}`" accordion="my-accordion" role="tabpanel">
        <b-card-body>
          <b-card-text
            ><b class="text-success">Favorite</b> Pokemons:</b-card-text
          >
          <b-card-text>
            <div class="mb-4 justify-content-center" style="display:flex">
               <b-avatar
                v-for="(pokemon, key) in item.favorite"
                :key="key"
                :src="`${pokeImage}${pokemon.pokemon_id}.png`"
              ></b-avatar>
            </div>
          </b-card-text>
          <b-card-text><b class="text-danger">Hated</b> Pokemons:</b-card-text>
          <b-card-text>
           <div class="mb-4 justify-content-center" style="display:flex">
               <b-avatar
                v-for="(pokemon, key) in item.hated"
                :key="key"
                :src="`${pokeImage}${pokemon.pokemon_id}.png`"
              ></b-avatar>
            </div>
          </b-card-text>
        </b-card-body>
      </b-collapse>
    </b-card>
  </div>
</template>
<script>
import BAvatar from "bootstrap-vue";
import { mapGetters } from "vuex";
export default {
  data() {
    return {
      pokeImage:
        "https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/home/",
    };
  },
  mounted() {
    this.$store.dispatch("fetchPokemonByUser");
    console.log("@userPokemon", this.userPokemon);
  },
  computed: {
    ...mapGetters(["userPokemon"]),
  },
};
</script>