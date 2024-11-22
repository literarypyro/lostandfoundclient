<template>
<div>sssfdfgdfg
    <div v-for="item in items" :key="item.id"></div>
    <div>{{ item.id }}</div>
    <div @click="retrieveRequest(item.id)">{{ item.category.type }}</div>
    <div>{{ item.description }}</div>
</div>


asdasdasd
</template>
<script>

import axios from 'axios';

export default {
    props: {
        requestid: String,
        selectedSearchObject: Object,

    },
    data() {
        return {
            item:"",
            items: {},  // Initialize items array
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
                    this.items = response.data; // Store the response in the items array
                })
                .catch(error => {
                    console.error(error);
                    this.errorMessage = 'There was an issue with the search. Please try again later.';
                });
            } 
            else {
                axios.get(`/categorysearch/daily/${term}/range/${searchDay}`)
                .then(response => {
                    console.log(response.data);
                    this.items = response.data; // Store the response in the items array
                })
                .catch(error => {
                    console.error(error);
                    this.errorMessage = 'There was an issue with the search. Please try again later.';
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
                            this.items = response.data; // Store the response in the items array
                        })
                        .catch(error => {
                            console.error(error);
                            this.errorMessage = 'There was an issue with the search. Please try again later.';
                        });
                } else {
                    axios.get(`/categorysearch/daily/${objectTerm}/range/${searchDay}`)
                        .then(response => {
                            console.log(response.data);
                            this.items = response.data; // Store the response in the items array
                        })
                        .catch(error => {
                            console.error(error);
                            this.errorMessage = 'There was an issue with the search. Please try again later.';
                        });
                }

    }
};
</script>

<style>




</style>




