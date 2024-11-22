<template>
    <div>
      <div>
        <SearchItem @update:searchFromItems="proceedSearch"  />
      </div>
  
      <div>
        <ItemList :selectedSearchObject="searchObject" v-if="enableItemSearch"  />
      </div>
  
      <div>
        <RetrieveItem v-if="getItem" />
      </div>
    </div>
  </template>
  
  <script>
  import SearchItem from '@components/SearchItem.vue';
  import ItemList from '@components/ItemList.vue';
  import RetrieveItem from '@components/RetrieveItem.vue';
  
  export default {
    props: {
      requests: Array,
      requestedId: String,
    },
    data(){
      return {
        enableItemSearch:false,
        getItem:false,
        searchObject:{
          dateLost:"",
          searchClass:"",
          searchWord:""

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

        }



    }
  };
  </script>
  
  <style scoped>
  /* You can add your styles here if needed */
  </style>