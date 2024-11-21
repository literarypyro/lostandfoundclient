<template>
    <div>
      <!-- SearchItem component -->
      <div>
        <SearchItem />
      </div>
  
      <!-- ItemList component with props -->
      <div>
        <ItemList />
      </div>
  
      <!-- RetrieveItem component -->
      <div>
        <RetrieveItem />
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
    components: {
      SearchItem,
      ItemList,
      RetrieveItem,
    },
  };
  </script>
  
  <style scoped>
  /* You can add your styles here if needed */
  </style>