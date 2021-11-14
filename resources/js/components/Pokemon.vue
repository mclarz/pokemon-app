<template>
    <div class="pokemon-list">
        <div class="row">
            <b-card
                title="Card Title"
                img-src="https://picsum.photos/600/300/?image=25"
                img-alt="Image"
                img-top
                tag="article"
                style="max-width: 20rem;"
                class="mb-2 mr-2"
            >
                <b-card-text>
                Some quick example text to build on the card title and make up the bulk of the card's content.
                </b-card-text>

                <b-link class="mr-2"><i class="fas fa-heart fa-2x"></i></b-link>
                <b-link class="mr-2"><i class="fa fa-thumbs-down fa-2x" aria-hidden="true"></i></b-link> 
        </b-card>
        </div>
       
    </div>
</template>
<script>
export default {
    
    props: ['pokemon']

}
</script>