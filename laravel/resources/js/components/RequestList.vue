<template>
<div>
    <div v-for="request in requests" :key="request.id"></div>
    <div>{{ request["category"].type }}</div>
    <div @click="retrieveRequest(request.id)">{{ request.description }}</div>
    <div>{{ request.request_date_label }}</div>
    <div>
        <div>Requested By: {{ request["user_info"]["name"] }}</div>
        <div>{{ request["latest_status"]["status"]["type"] }}</div>

    </div>
</div>
</template>
<script>
import axios from 'axios';

export default {
    props: {
        requests:Array
        requestId:''
    },
    data(){
        return {
            showRetrieveRequest:false;
            requestedId:null;
        };
    },
    methods:{
        retrieveRequest(requestId){
            showRetrieveRequest:true;
            requestedId:requestId;
        };


    },
}

</script>
<style>




</style>




