<template>
<div>
    <template v-if="formStep===1">
        <div><label>Category</label><div></div></div>
        <div><label>Title</label><div></div></div>
        <div><label>Description</label><div></div></div>
        <div><label>Date Lost</label><div></div></div>

        <button @click='goForward'>Next</button>

    </template>
    <template v-else-if="formStep===2">
        <div><label>Where was it Last seen? (optional)</label><div></div></div>
        <div><label>Shape (optional)</label><div></div></div>
        <div><label>Color (optional)</label><div></div></div>
        <div><label>Length (optional)</label><div></div></div>
        <div><label>Width (optional)</label><div></div></div>

        <button @click='goBack'>Previous</button>
        <button @click='goForward'>Next</button>


    </template>
    <template v-else-if="formStep===3">
        <div><label>Do you have a previous picture for reference purposes? (Optional)</label><div></div></div>
        
        <button @click='goBack'>Previous</button>
        <button @click='goForward'>Next</button>



    </template>
    <template v-else>
           dsadfd 
        <button @click='goBack'>Previous</button>
        <button @click=''>Submit</button>


        
    </template>




</div>
</template>
<script>



export default {
props: {
        requests:Array,
        requestedId:String,
    },
    components: {

    },
    data() {
        return {
            formStep: 1,
        }    
    },
    methods: {
        goForward(){
            this.formStep++;

        },
        goBack(){
            this.formStep--;
        }

    }

}

</script>
<style>







</style>