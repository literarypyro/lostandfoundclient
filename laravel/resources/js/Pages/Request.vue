<template>
  
<div class="w-full bg-[#0A2647] text-white"> 

  <div class="max-w-7xl mx-auto px-6 py-2">
      <h1 class="text-white text-2xl font-semibold tracking-wide">Lost and Found System</h1>
    </div>

  </div> 
 

  <nav class="w-full bg-gradient-to-r from-[#0A2647] via-[#144272] to-[#205295] mb-8">
    <div class="max-w-7xl mx-auto px-6 py-1">
      <div class="flex items-center justify-between">
        <!-- Left side: Navigation Items -->
        <div class="flex items-center space-x-6">
   


                
          <button  @click="checkRequestList"  class="px-3 py-1.5 text-white text-sm rounded-lg bg-white/20 flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/>
            </svg>
            <span>Your Missing Items</span>
          </button>


          <button @click="createRequest" class="px-3 py-1.5 text-white text-sm hover:bg-white/10 rounded-lg transition-all duration-200 flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
            </svg>
            <span>Create a Request</span>
          </button>

          <button  @click="goToItem" class="px-3 py-1.5 text-white text-sm hover:bg-white/10 rounded-lg transition-all duration-200 flex items-center space-x-2">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
              <circle cx="11" cy="11" r="8"/>
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35"/>
            </svg>
            <span>Search In Items Inventory</span>
          </button>


        </div>

        <!-- Right side: Logout -->
        <button   @click="logout" class="text-white hover:bg-white/10 p-2 rounded-lg transition-all duration-200">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
          </svg>
        </button>
      </div>
    </div>
  </nav>


     <section class="bg-white w-full max-w-screen-xl">
   
      <div class="px-6 py-4"> <!-- Added padding container --> <h1 class="text-2xl font-semibold text-gray-900">My Lost Item Requests</h1> <p class="text-gray-600 mt-1">Track and manage your submitted items</p> </div>

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
import { useCookies } from 'vue3-cookies';


export default {
    name:"Request",
    setup() {
        const { cookies } = useCookies();
        return { cookies };
    },
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
            var reqident=this.requestId;
            const reqid=this.cookies.get('requestid');
            if(reqid){
                reqident=reqid;
                console.log(reqid);
            }


            Inertia.visit(`/createRequest/${reqident}`,['userID',reqident]);


        },
        goToItem() {
            Inertia.visit("/dashboardItem");


        },
        updateSelectedRequest(selected){
//            this.requestedId="";
            if(!this.showRequestedItem) { this.showRequestedItem=true; } else { this.showRequestedItem=false; this.showRequestedItem=true; }

            this.requestedId=selected;

        },
        logout(){
            Inertia.visit(`/logout`);


        }


    },
    mounted(){

        const reqid=this.cookies.get('requestid');
        if(!reqid){

            this.cookies.set('requestid',this.requestId);

        }


     }


}



</script>
<style>
#nav_menu {

  background: linear-gradient(135deg, #0A2647, #144272, #205295);


  color:whitesmoke;


}

.head {

  font-family: 'Inter', sans-serif;
}

</style>