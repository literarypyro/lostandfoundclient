<template>
<section>
<div >
<div></div>
<div class='animate-fade-in-right items-center'><img :src="getImagePath(item?.details?.picture)"  alt="Image Item" /></div>
<div class="font-bold text-center">{{  item?.title }}</div>
<div class="font-bold  text-center">{{  item?.description }}</div>
<div class='ml-4'>
<div>{{ item?.details?.shape }}</div>
<div>{{ item?.details?.color }}</div>
<div>{{ item?.details?.length }}</div>
<div>{{ item?.details?.width }}</div>
<div>{{ item?.details?.other_details }}</div>

</div>

<div></div>

</div>
</section>
</template>
<script>
import axios from 'axios';
import { ref, watch } from 'vue'

const retrievedRequest=null;

export default {
    props: {
        requestid:String,
        selectedItem:String
    },
    data(){
        return {
            item:{},
            showRetrieveRequest:false,
            request:"",
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


    },
    watch: {
    // Watching the selectedRequest prop
    selectedItem(newSelectedItem, oldSelectedItem) {
        // `newSelectedRequest` is the updated value of selectedRequest
        // `oldSelectedRequest` is the previous value of selectedRequest before it was updated

        console.log("New Value:", newSelectedItem);
        console.log("Old Value:", oldSelectedItem);
        
        // You can now use these values to perform some logic, such as making an API call
        axios.get(`/item/${newSelectedItem}`)
        .then(response => {
            console.log(response.data);
            this.item = response.data; // Store the response in the local request data
        })
        .catch(error => {
            console.error(error);
        });
    }
    },
    mounted() {
        // Optionally, fetch the data when the component is mounted
        if (this.selectedItem) {
        axios.get(`/item/${this.selectedItem}`)
            .then(response => {
            console.log("Fetched request data on mount:", response.data);
            this.item = response.data;
            })
            .catch(error => {
            console.error("Error fetching data on mount:", error);
            });
        }
    }


}


</script>
<style>




</style>
