<template>
  <b-container center>
    <div class="col-md-12">
      <h2 class="mt-2 text-center mx-auto">Dislike Pokemon</h2>
      <div v-if="!isLoading">
        <div class="row" v-if="pokemon">
          <pokemon
            :pokemon="item"
            v-for="(item, idx) in pokemon"
            :key="idx"
          ></pokemon>
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
    </div>
  </b-container>
</template>
<script>
import { mapGetters } from "vuex";
import Pokemon from "./Pokemon.vue";
export default {
  data() {
    return {
      isLoading: true,
    };
  },
  components: { Pokemon },
  mounted() {
    this.$store.dispatch("fetchDislikePokemon").then(() => {
      this.isLoading = false;
    });
  },
  methods: {},
  computed: {
    ...mapGetters(["pokemon"]),
  },
};
</script>