<template>
  <section class="bg-white w-full max-w-screen-xl">
    <div class="grid grid-cols-2 gap-6 p-6">
      <!-- Grid Items -->
      <div
        v-for="request in localRequests"
        :key="request.id"
        @click="retrieveRequest(request.id)"
        class="bg-gradient-to-br from-white to-gray-50 rounded-xl shadow-sm 
               hover:shadow-lg transition-all duration-300 border border-gray-100 
               cursor-pointer overflow-hidden group"
      >
        <div class="p-5">
          <!-- Category Badge -->
          <div class="inline-flex items-center space-x-2 bg-blue-50 text-blue-800 
                      px-3 py-1.5 rounded-full text-sm font-medium mb-4">
            <span>{{ request.category?.type }}</span>
          </div>


          <!-- Main Content Area -->
          <div class="flex gap-6">
            <!-- Text Content -->
            <div class="flex-1 space-y-3">
              <h3 class="text-lg font-semibold text-gray-900 group-hover:text-blue-800 
                         transition-colors">
                {{ request.title }}
              </h3>
              <p class="text-gray-600 text-sm line-clamp-2">
                {{ request.description }}
              </p>
              
              <!-- Date and View Details -->
              <div class="flex items-center justify-between pt-2">
                <span class="text-sm text-gray-500">
                  {{ request.request_date_label }}
                </span>
                <span class="inline-flex items-center text-sm text-blue-600 
                           font-medium group-hover:translate-x-1 transition-transform">
                  View Details →
                </span>
              </div>
            </div>


            <!-- Image Area -->
            <div class="w-1/3">
              <div v-if="request?.details?.picture" 
                   class="aspect-square bg-white rounded-lg p-2 border border-gray-100">
                <img
                  :src="getImagePath(request.details.picture)"
                  alt="Item Image"
                  class="w-full h-full object-contain rounded-md"
                />
              </div>
              <div
                v-else
                class="aspect-square flex items-center justify-center 
                       bg-gray-50 rounded-lg border border-gray-100"
              >
                <span class="text-sm text-gray-400">No Image Available</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>





   
  </template>
<script>
import axios from 'axios';
import { useCookies } from 'vue3-cookies';

export default {
    setup() {
        const { cookies } = useCookies();
        return { cookies };
    },
    props: {
        requests: Array,
        requestId: String,
        selectedRequest: String
    },
    data() {
        return {
            showRetrieveRequest: false,
            requestedId: this.requestId,
            localRequests: [],
            // Use data for local selection, no need to define selectedRequest here since it's already a prop
            selectedRequestLocal: this.selectedRequest // Optionally copy the prop into local state if needed
        };
    },
    methods: {
        // Method to update the selected request
        retrieveRequest(selected) {
            this.$emit('update:showRetrieveRequest',true);
            this.selectedRequestLocal = selected; // Update local state
            this.$emit('update:selectedRequest', selected); // Emit the updated value to the parent component if needed
        },
        getImagePath(selected) {
            if (selected) {
//                return require(`@images/${selected}`);

                  return `/images/${selected}`;  

            }
            return ''; // Fallback if no picture
        },   

    },
    mounted() {
        const reqid=this.cookies.get('requestid');
        if(reqid){
            this.requestedId=reqid;
            console.log(reqid);
        }


        axios.get(`/requests/${this.requestedId}`)
            .then(response => {
                console.log(response.data);
                this.localRequests = response.data; // Store the response data in the localRequests property
            })
            .catch(error => {
                console.error(error);
            });
    }
}

</script>
<style>




</style>




