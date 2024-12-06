<template>

<!-- Main navigation container -->
<nav
  class="flex-no-wrap relative flex w-full items-center justify-between bg-zinc-50 py-2 shadow-dark-mild dark:bg-neutral-700 lg:flex-wrap lg:justify-start lg:py-4">
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
            class="text-black/60 transition duration-200 hover:text-black/80 hover:ease-in-out focus:text-black/80 active:text-black/80 motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2"
            href="#"
            data-twe-nav-link-ref  @click="checkRequestList"
            >Your Missing Items</a
          >
          <a
            class="text-black/60 transition duration-200 hover:text-black/80 hover:ease-in-out focus:text-black/80 active:text-black/80 motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2"
            href="#"
            data-twe-nav-link-ref  @click="createRequest"
            >Create a Request</a
          >




        </li>
        <!-- Team link -->
 
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
  </div>
</nav>

    <section class="bg-white w-full max-w-screen-xl">
	<div class="py-4 px-2 mx-auto max-w-screen-xl sm:py-4 lg:px-6 w-full">
			<div class="col-span-2 sm:col-span-2 md:col-span-2 bg-stone-50 w-full">
        <SearchItem @update:searchFromItems="proceedSearch"  />
			</div>




	</div>
	<div class="py-4 px-2 grid-cols-2 sm:grid-cols-2 lg:grid-cols-2 mx-auto max-w-screen-xl sm:py-4 lg:px-6 w-full inline-flex">


    <div class=" gap-4 w-2/3 " >
          <ItemList :selectedSearchObject="searchObject" v-if="enableItemSearch" @update:selectedItem="retrieveSelectedItem" />
				</div>
     <div class=" bg-sky-50 h-auto w-1/3 p-2 md:h-full flex flex-col">
       <RetrieveItem :selectedItem="itemID" v-if="getItem" />
			</div>
    </div>
</section>








  </template>
  
  <script>
  import SearchItem from '@components/SearchItem.vue';
  import ItemList from '@components/ItemList.vue';
  import RetrieveItem from '@components/RetrieveItem.vue';
  import { Inertia } from '@inertiajs/inertia';
  import { useCookies } from 'vue3-cookies';

  export default {
    name:"Item",
    setup() {
        const { cookies } = useCookies();
        return { cookies };
    },  
    props: {
      items: Array,
      requestedId: String,
      requestId:String
    },
    data(){
      return {
        enableItemSearch:false,
        getItem:false,
        searchObject:{
          dateLost:"",
          searchClass:"",
          searchWord:"",
          itemID:""

        },

      }

    },  
    components: {
      SearchItem,
      ItemList,
      RetrieveItem,
    },
    methods:{
        proceedSearch(selected){
           if(!this.enableItemSearch) 
           { this.enableItemSearch=true; 
            console.log('enableItemSearch set to:', this.enableItemSearch);



           }

            this.getItem=false;
            this.searchObject=selected;
            console.log(selected);

        },
        retrieveSelectedItem(selected){

            if(!this.getItem) { this.getItem=true; } else { this.getItem=false; this.getItem=true; }

            this.itemID=selected;

        },
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
        checkRequestList() {


            Inertia.visit(`/dashboard/${this.requestId}`);


        },
        goToItem() {

            Inertia.visit(`/dashboardItem`);


        },
        logout(){
            Inertia.visit(`/logout`);


        }

    }
  };
  </script>
  
  <style scoped>
  /* You can add your styles here if needed */
  </style>