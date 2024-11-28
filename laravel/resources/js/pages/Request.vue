<template>
<div>Requests Made</div>

<button @click="createRequest">Create a Request</button>
<button @click="goToItem">Search In Items Inventory</button>
<div class="grid-cols-2">

<div>
<RequestList :requestId="requestId" @update:selectedRequest="updateSelectedRequest" />
</div>

<div>
<RetrieveRequest :selectedRequest="requestedId"  v-if="showRequestedItem" />
ssss
</div>


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
            showRequestedItem:false,

        }



    },
    components: {
        RequestList,
        RetrieveRequest,
    },
    methods: {
        createRequest() {
            console.log(this.requestId);
            Inertia.visit(`/createRequest/${this.requestId}`,['userID',this.requestId]);


        },
        goToItem() {
            Inertia.visit("/dashboardItem");


        },
        updateSelectedRequest(selected){
//            this.requestedId="";
            if(!this.showRequestedItem) { this.showRequestedItem=true; } else { this.showRequestedItem=false; this.showRequestedItem=true; }

            this.requestedId=selected;

        },


    }



}



</script>
<style>




</style>