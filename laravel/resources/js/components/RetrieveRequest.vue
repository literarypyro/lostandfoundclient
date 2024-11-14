<template>
<div>

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
        requestid:''

    },
    mounted() {
        axios.get('/request/{requestid}')
        .then(response=> {
            this.item=response.data;
        })
        .catch(error=>{ console.error(error)});
    },

}


</script>
<style>







</style>