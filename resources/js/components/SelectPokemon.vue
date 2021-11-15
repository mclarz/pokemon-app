<template>
  <div class="container mt-5">
    <div>
        <b-modal id="modal-1" title="Hit Like or DisLike Pokemon" ok-only ok-variant="secondary" ok-title="Cancel">
            <p><b-button block size="lg" variant="outline-primary">Favorite</b-button></p>
            <p><b-button block size="lg" variant="outline-danger">DisLike</b-button></p>
        </b-modal>
    </div>    
  </div>
</template>
<script>
  export default {
    data() {
      return {
      
      }
    },
    props:['pokemonDetails'],
    methods: {

        likePokemon() {

        },
        disLikePokemon() {
            
        }
    }
  }
</script>