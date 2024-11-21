<template>
<div>Requests Made</div>

<button @click="createRequest">Create a Request</button>

<div>
<RequestList :requestId="requestId" />
</div>

<div>
<RetrieveRequest :requestedId="requestedId" />
ssss
</div>



</template>
<script>
import RetrieveRequest from '@components/RetrieveRequest.vue';
import RequestList from '@components/RequestList.vue';
import { Inertia } from '@inertiajs/inertia';


export default {
    props: {
        requests:Array,
        requestId:String,
    },
    data() {
        return  {


        }



    },
    components: {
        RequestList,
        RetrieveRequest,
    },
    methods: {
        createRequest() {
            Inertia.visit("/createRequest");


        }


    }



}



</script>
<style>




</style>