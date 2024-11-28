<template>
<div class="inline-flex flex-row ">
<div class="flex flex-col mt-3 gap-4 grid-rows-1  px-3">
    <label for="large" class="block mb-3 text-base font-medium text-gray-900 dark:text-white">Search Date</label>

    <div><datepicker class='block' v-model="searchDate"></datepicker></div>


</div>

<div>


    <form  class="flex flex-col px-3 gap-4 grid-rows-1 ">
  <label for="large" class="block  py-3 text-base font-medium text-gray-900 dark:text-white">Search By</label>
  <select v-model="searchClass" id="large" class="block w-full px-4 py-3 text-base text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
    <option value="itemname">Item Description</option>
    <option value="category">Category</option>
  </select>
</form>

</div>
<div class="flex flex-col gap-4 grid-rows-1 ">
    <label for="large" class="block mt-3 mb-1 text-base font-medium text-gray-900 dark:text-white">Search Term</label>

    <input class="p-1 mt-1 rounded-xl border h-full" v-model="searchWord" type="text"  name="searchWord" />


</div>
<div class="flex flex-col mt-3   px-3 gap-3 grid-rows-2 row-span-2">
<button class="bg-[#002D74] mt-auto text-white py-3 px-5 items-end rounded-xl hover:scale-105 duration-300 hover:bg-[#206ab1] font-medium w-full" @click="searchItemList" type="submit">Search</button>

</div>
</div>

</template>
<script>
 import ItemList from '@components/ItemList.vue';
 import RetrieveItem from '@components/RetrieveItem.vue';
 import Datepicker from 'vuejs3-datepicker';
 import { format } from 'date-fns';

export default {
    props: {
        items:Array,
        requestedId:String,

    },
    data(){
        return {
            dateLost: "",
            searchType: "",
            searchTerm: "",
            searchDate:"",
            searchClass:"",
            searchWord:"",
            dateRange:"",
        }    
    },
    components: {
        ItemList,
        RetrieveItem,
        Datepicker,
    },
    methods: {
        searchItemList(){
            var formattedDate=format(this.searchDate,"yyyy-MM-dd");
            this.dateRange=formattedDate+" to "+formattedDate;

            console.log("Date is "+formattedDate);
            this.$emit('update:searchFromItems',
            {
               dateLost:this.dateRange,
               searchClass:this.searchClass,
               searchTerm:this.searchWord,
            });


        }



    }

}


</script>
<style>




</style>