<template>

<!-- Main navigation container -->
<nav id="nav_menu"
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
            class="transition duration-200 hover:ease-in-out  motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2"
            href="#"
            data-twe-nav-link-ref  @click="checkRequestList"
            >Your Missing Items</a
          >
          <a
            class="transition duration-200  hover:ease-in-out  motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2"
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
      <a class="me-4  text-white" v-on:click="logout">
        <span class="[&>svg]:w-5">

          <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-door-open-fill" viewBox="0 0 16 16">
  <path d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15zM11 2h.5a.5.5 0 0 1 .5.5V15h-1zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1"/>
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
  #nav_menu {
  background: rgb(255,0,0);
  background: linear-gradient(90deg, rgba(255,0,0,1) 0%, rgba(198,0,0,1) 35%, rgba(155,0,0,1) 100%);
  color:whitesmoke;


}




  </style>