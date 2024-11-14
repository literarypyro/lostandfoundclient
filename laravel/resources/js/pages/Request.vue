<template>
<div>
<RequestList :messages="messages" />




</div>

<div>
<RetrieveRequest />




</div>
</template>
<script>
import RequestList from '/@Components/RequestList.vue';
import RetrieveRequest from '/@Components/RetrieveRequest.vue';

export default {
    props: {
        messages:Array,

    },
    components: {
        RequestList,
        RetrieveRequest,
    }



}



</script>
<style>




</style>