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
import RetrieveRequest from '@components/RetrieveRequest.vue';
import RequestList from '@components/RequestList.vue';

export default {
    props: {
        requests:Array,
        requestedId:String,
    },
    data() {
        return  {


        }



    },
    components: {
        RequestList,
        RetrieveRequest,
    }
}



</script>
<style>




</style>