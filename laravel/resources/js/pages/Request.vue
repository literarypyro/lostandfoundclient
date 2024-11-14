<template>
<div>Requests Made</div>
<div>
<RequestList :requests="requests" />
</div>

<div>
<RetrieveRequest :requestedId="requestedId" />

</div>
</template>
<script>
import RequestList from '/@Components/RequestList.vue';
import RetrieveRequest from '/@Components/RetrieveRequest.vue';

export default {
    props: {
        requests:Array,
        requestedId:String,
    },
    components: {
        RequestList,
        RetrieveRequest,
    }



}



</script>
<style>




</style>