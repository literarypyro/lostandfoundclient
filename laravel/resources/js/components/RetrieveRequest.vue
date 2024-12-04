<template >
<section>
<div class="flex flex-column flex-wrap w-auto">    
<div class='w-full items-center mt-5 mb-3'>
      
    
    <img :src="getImagePath(request?.details?.picture)" class='items-center' alt="Image Item" v-if="request?.details?.picture"/>
</div>

<div class="w-full text-center">

<div class="mt-4 font-bold">{{  request?.title }}</div>
<div class="font-bold">{{  request?.description }}</div>
</div>
<div class='ml-8 mt-3 p-3'>

<div v-if="request?.details?.shape && request?.details?.shape!='N/A'">SHAPE: {{ request?.details?.shape }}</div>
<div v-if="request?.details?.color && request?.details?.color!='N/A'">COLOR: {{ request?.details?.color }}</div>
<div v-if="request?.details?.length && request?.details?.length!='N/A'">LENGTH: {{ request?.details?.length }}</div>
<div v-if="request?.details?.width && request?.details?.width!='N/A'">WIDTH: {{ request?.details?.width }}</div>
<div v-if="request?.details?.other_details && request?.details?.other_details!='N/A'">OTHER DETAILS: {{ request?.details?.other_details }}</div>
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