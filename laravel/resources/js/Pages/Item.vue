<template>
  
  <div class="w-full bg-[#0A2647] text-white"> 

<div class="max-w-7xl mx-auto px-6 py-2">
    <h1 class="text-white text-2xl font-semibold tracking-wide">Lost and Found System</h1>
  </div>

</div> 


<nav class="w-full bg-gradient-to-r from-[#0A2647] via-[#144272] to-[#205295]">
  <div class="max-w-7xl mx-auto px-6 py-1">
    <div class="flex items-center justify-between">
      <!-- Left side: Navigation Items -->
      <div class="flex items-center space-x-6">
 
<!-- Your Missing Items - not active --> 
<button @click="checkRequestList" class="px-3 py-1.5 text-white/80 text-sm hover:text-white hover:bg-white/10 rounded-lg transition-all duration-200 flex items-center space-x-2"> 
<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/> </svg> 


<span>Your Missing Items</span> </button> 


<!-- Create a Request - active --> 
<button  @click="createRequest" class="px-3 py-1.5 text-white bg-white/20 rounded-lg text-sm flex items-center space-x-2"> 
<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/> </svg> <span>Create a Request</span> 


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