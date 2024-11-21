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
        <button @click="retrieveRequest(request.id)">Retrieve Request</button>
      </div>
    </div>
  </template>
<script>
import axios from 'axios';

export default {
    props: {
        requests: Array,
        requestId: String,
        selectedRequest: String
    },
    data() {
        return {
            showRetrieveRequest: false,
            requestedId: this.requestId,
            localRequests: [],
            // Use data for local selection, no need to define selectedRequest here since it's already a prop
            selectedRequestLocal: this.selectedRequest // Optionally copy the prop into local state if needed
        };
    },
    methods: {
        // Method to update the selected request
        retrieveRequest(selected) {
            this.$emit('update:showRetrieveRequest',true);
            this.selectedRequestLocal = selected; // Update local state
            this.$emit('update:selectedRequest', selected); // Emit the updated value to the parent component if needed
        }
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




