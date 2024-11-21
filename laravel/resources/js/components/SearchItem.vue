<template>
<div>Search Item<input type="text" /></div>


</template>
<script>
 import ItemList from '@components/ItemList.vue';
 import RetrieveItem from '@components/RetrieveItem.vue';


export default {
    props: {
        requests:Array,
        requestedId:String,

    },
    components: {
        ItemList,
        RetrieveItem,
    },
    methods: {
        



    }

}


</script>
<style>




</style>