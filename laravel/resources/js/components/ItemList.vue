<template>
<div>
    <div>{{ retrievedItems?.length }} Length</div>

    <div v-for="item in retrievedItems" :key="item?.id">
    <div>ID: {{ item?.id }}</div>
    <div><img :src="getImagePath(item?.details?.picture)" alt="Image Item" /></div>
    
    <div>Category: {{ item?.category?.type }}</div>
    <div>Item Type:{{ item?.itemType?.name }}</div>

    <button @click="retrieveItem(item.id)">Retrieve Request</button>
</div>
</div>


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




