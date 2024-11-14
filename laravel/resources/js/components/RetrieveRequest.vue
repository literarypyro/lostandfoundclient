<template>
<div v-if="showRetrieveRequest">
<div></div>
<div></div>
<div></div>
<div></div>
<div></div>
<div></div>
<div></div>
<div></div>

</div>


</template>
<script>
import axios from 'axios';

export default {
    props: {
        requestid:String

    },
    data(){
        return {
            item:null
        };
    },
    mounted() {
        axios.get('/request/{$this.requestedId}')
        .then(response=> {
            this.item=response.data;
        })
        .catch(error=>{ console.error(error)});
    },

}


</script>
<style>







</style>