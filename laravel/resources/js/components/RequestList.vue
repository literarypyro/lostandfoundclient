<template>
    <section class="bg-white w-full max-w-screen-xl">
        <div class="mt-2 pt-3 flex flex-wrap w-full">

      <!-- Loop through each request in localRequests -->
      <div v-for="request in localRequests" :key="request.id"  class="h-auto w-1/2">
        <!-- Display request properties -->
        <div class="inline-flex flex-row ">
        <div class="p3 size-48 ">

        <div class="font-bold text-[#002D74]">{{ request.category?.type }}</div>
        <div class="bg-stone-100  h-auto p-1">    


            <div class="inline-flex flex-row">{{ request.title }}
                    <svg @click="retrieveRequest(request.id)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Zm8.25-3.75a.75.75 0 0 1 .75.75v2.25h2.25a.75.75 0 0 1 0 1.5h-2.25v2.25a.75.75 0 0 1-1.5 0v-2.25H7.5a.75.75 0 0 1 0-1.5h2.25V7.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
                    </svg>
            </div>


            <div>{{ request.description }}</div>
            <div>{{ request.request_date_label }}</div>
            <div>{{ request.latest_status?.status?.type }}</div>
        </div>


        </div  class="p3 h-auto size-20 text-wrap">
        <!-- Display user information and latest status, ensuring safety for undefined properties -->
            <img :src="getImagePath(request?.details?.picture)"  v-if="request?.details?.picture" alt="Image Item" />
            <div class="font-bold text-[#002D74] row-span-5 text-center text-md text-wrap" v-else-if="!item?.details?.picture">
                No Image for Reference available
            </div>
        </div>
        </div>

   </div>
   
   </section>    
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
        },
        getImagePath(selected) {
            if (selected) {
//                return require(`@images/${selected}`);

                  return `/images/${selected}`;  

            }
            return ''; // Fallback if no picture
        },   

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




