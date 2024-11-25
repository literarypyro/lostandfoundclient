<template>
<div>Search Item</div>
<div><datepicker v-model="searchDate"></datepicker></div>
<div>
    Search By:
<select v-model="searchClass">
    <option value="itemname">Item Description</option>
    <option value="category">Category</option>
</select>
</div>
<div>
    Search Term:
    <input type="text" v-model="searchWord" />


</div>
<div>
<button @click="searchItemList">Search Items</button>

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