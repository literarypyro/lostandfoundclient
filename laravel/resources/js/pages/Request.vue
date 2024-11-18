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
import RequestList from '@components/RequestList.vue';
import RetrieveRequest from '@components/RetrieveRequest.vue';

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