<template>
     <section class="bg-white w-full max-w-screen-xl">
   
<button @click="createRequest">Create a Request</button>
<button @click="goToItem">Search In Items Inventory</button>


<div>Requests You Have Made</div>


<div class="grid-cols-2 w-full inline-flex flex-row flex-wrap">

<div class="w-2/3">
<RequestList :requestId="requestId" @update:selectedRequest="updateSelectedRequest" />
</div>

<div class="w-1/3">
<RetrieveRequest :selectedRequest="requestedId"  v-if="showRequestedItem" />
</div>


</div>
</section>
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