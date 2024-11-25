<template>
    <div>
      <div>
        <SearchItem @update:searchFromItems="proceedSearch"  />
      </div>
  
      <div>
        <ItemList :selectedSearchObject="searchObject" v-if="enableItemSearch" @update:selectedItem="retrieveSelectedItem" />
      </div>
  
      <div>
        <RetrieveItem :selectedItem="itemID" v-if="getItem" />
      </div>
    </div>
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