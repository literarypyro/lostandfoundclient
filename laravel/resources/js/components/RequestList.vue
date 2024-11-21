<template>
    <div>
      <!-- Loop through each request in localRequests -->
      <div v-for="request in localRequests" :key="request.id">
        <!-- Display request properties -->
        <div>{{ request.category?.type }}</div>
        <div>{{ request.title }}</div>
        <div>{{ request.description }}</div>
        <div>{{ request.request_date_label }}</div>
  
        <!-- Display user information and latest status, ensuring safety for undefined properties -->
        <div>
          <div>Requested By: {{ request.user_info?.name }}</div>
          <div>{{ request.latest_status?.status?.type }}</div>
        </div>
      </div>
    </div>
  </template>
<script>
import axios from 'axios';

export default {
    props: {
        requests:Array,
        requestId:String
    },
    data(){
        return {
            showRetrieveRequest:false,
            requestedId:this.requestId,
            localRequests:[]
        };
    },
    methods:{


    },
    mounted() {
        axios.get(`/requests/${this.requestedId}`)
            .then(response => {
                console.log(response.data);
                this.localRequests = response.data; // Store the response data in the localRequests property
            })
            .catch(error => {
                console.error(error);
            });
    }
}

</script>
<style>




</style>




