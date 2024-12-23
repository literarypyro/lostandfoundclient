<template>

<!-- Main navigation container -->
<nav id="nav_menu"
  class="flex-no-wrap relative flex w-full items-center justify-between lg:flex-wrap lg:justify-start lg:py-4">
  <div class="flex w-full flex-wrap items-center justify-between px-3">

    <!-- Collapsible navigation container -->
    <div
      class="!visible hidden flex-grow basis-[100%] items-center lg:!flex lg:basis-auto"
      id="navbarSupportedContent1"
      data-twe-collapse-item>
      <!-- Logo -->
      <a
        class="mb-4 me-5 ms-2 mt-3 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400 lg:mb-0 lg:mt-0"
        href="#">
        <img
          src="https://tecdn.b-cdn.net/img/logo/te-transparent-noshadows.webp"
          style="height: 15px"
          alt="TE Logo"
          loading="lazy" />
      </a>
      <!-- Left navigation links -->
      <ul
        class="list-style-none me-auto flex flex-col ps-0 lg:flex-row"
        data-twe-navbar-nav-ref>
        <li class="mb-4 lg:mb-0 lg:pe-2" data-twe-nav-item-ref>
          <!-- Dashboard link -->
          <a
            class=" transition duration-200  hover:ease-in-out  motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2"
            href="#"
            data-twe-nav-link-ref  @click="createRequest"
            >Create a Request</a
          >
        </li>
        <!-- Team link -->
        <li class="mb-4 lg:mb-0 lg:pe-2" data-twe-nav-item-ref>
          <a
            class="transition duration-200 motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2"
            href="#"
            data-twe-nav-link-ref @click="goToItem"
            >Search In Items Inventory</a
          >
        </li>
      </ul>
      <!-- Left links -->
    </div>

    <!-- Right elements -->
     <div class="relative flex items-center">
      <!-- Icon -->
      <a class="me-4 text-neutral-600 dark:text-white" v-on:click="logout">
        <span class="[&>svg]:w-5">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
      </svg>

        </span>
      </a>
</div>

    <!-- Right elements -->
  </div>
</nav>

     <section class="bg-white w-full max-w-screen-xl">
   


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
  background: rgb(255,0,0);
  background: linear-gradient(90deg, rgba(255,0,0,1) 0%, rgba(198,0,0,1) 35%, rgba(155,0,0,1) 100%);
  color:whitesmoke;


}



</style>