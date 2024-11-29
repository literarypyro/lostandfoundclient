<template>
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
  
  export default {
    props: {
      items: Array,
      requestedId: String,
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


    }
  };
  </script>
  
  <style scoped>
  /* You can add your styles here if needed */
  </style>