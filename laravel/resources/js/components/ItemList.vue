<template>
     <section class="bg-white w-full max-w-screen-xl">
   
<div class="mt-2 pt-3 inline-flex flex-row flex-wrap auto-cols-auto">
    <div v-for="item in retrievedItems" :key="item?.id" class="rounded-md p-1 w-1/4">
    <div class="font-bold text-[#002D74]">{{ item?.category?.type }}</div>
     <div class="bg-stone-100  h-auto p-1">   

    <div class='animate-fade-in-right'><img :src="getImagePath(item?.details?.picture)"  alt="Image Item" /></div>
    
    <div class="">
    <div class="font-bold text-center">{{ item?.description }}</div><div> <svg @click="retrieveItem(item.id)" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
  <path fill-rule="evenodd" d="M10.5 3.75a6.75 6.75 0 1 0 0 13.5 6.75 6.75 0 0 0 0-13.5ZM2.25 10.5a8.25 8.25 0 1 1 14.59 5.28l4.69 4.69a.75.75 0 1 1-1.06 1.06l-4.69-4.69A8.25 8.25 0 0 1 2.25 10.5Zm8.25-3.75a.75.75 0 0 1 .75.75v2.25h2.25a.75.75 0 0 1 0 1.5h-2.25v2.25a.75.75 0 0 1-1.5 0v-2.25H7.5a.75.75 0 0 1 0-1.5h2.25V7.5a.75.75 0 0 1 .75-.75Z" clip-rule="evenodd" />
</svg>
</div>
</div>
</div>



</div>
</div>

</section>
</template>
<script>

import axios from 'axios';

export default {
    props: {
        requestid: String,
        selectedSearchObject: Object,
        items:Array,
    },
    data() {
        return {
            item:{
                category: { type:"" },
                itemType: { name:"" }
            },
            retrievedItems:[],
            url: "",
            searchDay: "",
            searchClass:"",
            term: "",  // Default value for term
            searchType: "",
            searchWord:"",
            objectType:"",
            searchTerm:"",
            itemType:"",
            errorMessage: ""  // For handling errors
        };
    },
    methods: {
        getImagePath(selected) {
            if (selected) {
//                return require(`@images/${selected}`);

                  return `images/${selected}`;  

            }
            return ''; // Fallback if no picture
        },        
        retrieveItem(selected){
            this.$emit('update:selectedItem', selected); // Emit the updated value to the parent component if needed

        }

    },
    watch: {
        selectedSearchObject(newItemObj,oldItemObj){

            var searchDay = newItemObj.dateLost;
            var itemType = newItemObj.searchClass;
            var term = newItemObj.searchTerm;


            console.log(searchDay);
            console.log(itemType);
            console.log(term);


            if (itemType === "itemname") {
                console.log(`/daterangesearch/daily/${term}/range/${searchDay}`);
                axios.get(`/daterangesearch/daily/${term}/range/${searchDay}`)
                .then(response => {
                    console.log(response.data);
                    this.listeditems = response.data; // Store the response in the items array
                    this.retrievedItems=response.data || [];
                
                
                })
                .catch(error => {
                    console.error(error);
                    this.errorMessage = 'There was an issue with the search. Please try again later.';
                
                    this.retrievedItems=[];

                });
            } 
            else {
                axios.get(`/categorysearch/daily/${term}/range/${searchDay}`)
                .then(response => {
                    console.log(response.data);
                    this.listeditems = response.data; // Store the response in the items array
                    this.retrievedItems=response.data[0].items || [];


                })
                .catch(error => {
                    console.error(error);
                    this.errorMessage = 'There was an issue with the search. Please try again later.';
                    this.retrievedItems=[];

                });
            
            }


        }    

    },
    mounted() {

        var searchDay = this.selectedSearchObject.dateLost;
        var objectType = this.selectedSearchObject.searchClass;
        var objectTerm = this.selectedSearchObject.searchTerm;        

                if (objectType === "itemname") {
                    axios.get(`/daterangesearch/daily/${objectTerm}/range/${searchDay}`)
                        .then(response => {
                            console.log(response.data);
                            this.listeditems = response.data; // Store the response in the items array
                            this.retrievedItems=response.data || [];

                        })
                        .catch(error => {
                            console.error(error);
                            this.errorMessage = 'There was an issue with the search. Please try again later.';
                            this.retrievedItems=[];


                        });
                } else {
                    axios.get(`/categorysearch/daily/${objectTerm}/range/${searchDay}`)
                        .then(response => {
                            console.log(response.data.items);
                            this.listeditems = response.data; // Store the response in the items array
                            this.retrievedItems=response.data[0].items || [];

                        })
                        .catch(error => {
                            console.error(error);
                            this.errorMessage = 'There was an issue with the search. Please try again later.';
                            this.retrievedItems=[];

                        });
                }

    }
};
</script>

<style>




</style>




