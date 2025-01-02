<template >
 <section class="bg-white rounded-lg shadow-sm w-96">
    <div class="p-6">
      <!-- Image Section -->
  	<div class="flex flex-col w-full">
    	<div class="w-full flex justify-center mb-6">
      	<div class="max-w-[280px]"> <!-- Constrained max width -->
        	<img
          	v-if="request?.details?.picture"
          	:src="getImagePath(request?.details?.picture)"
          	alt="Image Item"
          	class="rounded-lg w-full h-auto object-contain" 
        	/>
        	<div v-if="request?.details?.picture" class="mt-2 text-gray-500 text-sm text-center">
          	(Image for Reference)
        	</div>
      	</div>
    	</div>


        <!-- Title and Description -->
        <div class="text-center mb-6">
          <h2 class="text-xl font-semibold text-gray-900 mb-2">
            {{ request?.title }}
          </h2>
          <div class="text-lg text-gray-700">
            {{ request?.description }}
          </div>
        </div>


        <!-- Details Section -->
        <div class="space-y-3 text-gray-700">
          <div v-if="request?.details?.shape && request?.details?.shape !== 'N/A'" class="flex">
            <span class="font-medium w-32">SHAPE:</span>
            <span>{{ request?.details?.shape }}</span>
          </div>
          
          <div v-if="request?.details?.color && request?.details?.color !== 'N/A'" class="flex">
            <span class="font-medium w-32">COLOR:</span>
            <span>{{ request?.details?.color }}</span>
          </div>
          
          <div v-if="request?.details?.length && request?.details?.length !== 'N/A'" class="flex">
            <span class="font-medium w-32">LENGTH:</span>
            <span>{{ request?.details?.length }}</span>
          </div>
          
          <div v-if="request?.details?.width && request?.details?.width !== 'N/A'" class="flex">
            <span class="font-medium w-32">WIDTH:</span>
            <span>{{ request?.details?.width }}</span>
          </div>
          
          <div v-if="request?.details?.other_details && request?.details?.other_details !== 'N/A'" class="flex">
            <span class="font-medium w-32">OTHER DETAILS:</span>
            <span>{{ request?.details?.other_details }}</span>
          </div>
        </div>
      </div>
    </div>
  </section>




</template>
<script>
import axios from 'axios';
import {  ref, watch } from 'vue'

const retrievedRequest=null;
export default {
    props: {
        requestid:String,
        selectedRequest:String
    },
    data(){
        return {
            item:null,
            showRetrieveRequest:false,
            request:{},
        };
    },
    methods: {

        getImagePath(selected) {
            if (selected) {
//                return require(`@images/${selected}`);

                  return `/images/${selected}`;  

            }
            return ''; // Fallback if no picture
        },   

    },
    watch: {
    // Watching the selectedRequest prop
    selectedRequest(newSelectedRequest, oldSelectedRequest) {
        // `newSelectedRequest` is the updated value of selectedRequest
        // `oldSelectedRequest` is the previous value of selectedRequest before it was updated

        console.log("New Value:", newSelectedRequest);
        console.log("Old Value:", oldSelectedRequest);
        
        // You can now use these values to perform some logic, such as making an API call
        axios.get(`/request/${newSelectedRequest}`)
        .then(response => {
            console.log(response.data);
            this.request = response.data; // Store the response in the local request data
        })
        .catch(error => {
            console.error(error);
        });
    }
    },
    mounted() {
        // Optionally, fetch the data when the component is mounted
        if (this.selectedRequest) {
        axios.get(`/request/${this.selectedRequest}`)
            .then(response => {
            console.log("Fetched request data on mount:", response.data);
            this.request = response.data;
            })
            .catch(error => {
            console.error("Error fetching data on mount:", error);
            });
        }
    }

}


</script>
<style>







</style>