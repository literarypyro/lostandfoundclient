<template >
this is here
<div >
<div>Request Here</div>
<div></div>
<div></div>
<div>{{ request.details.shape }}</div>
<div>{{ request.details.color }}</div>
<div>{{ request.details.length }}</div>
<div>{{ request.details.width }}</div>
<div>{{ request.details.other_details }}</div>



<div></div>

</div>


</template>
<script>
import axios from 'axios';
import { ref, watch } from 'vue'

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
            request:"",
        };
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