<template>
   
<div class="w-full bg-[#0A2647] text-white"> 

<div class="max-w-7xl mx-auto px-6 py-2">
    <h1 class="text-white text-2xl font-semibold tracking-wide">Lost and Found System</h1>
  </div>

</div> 


<nav class="w-full bg-gradient-to-r from-[#0A2647] via-[#144272] to-[#205295]">
  <div class="max-w-7xl mx-auto px-6 py-1">
    <div class="flex items-center justify-between">
      <!-- Left side: Navigation Items -->
      <div class="flex items-center space-x-6">
 
<!-- Your Missing Items - not active --> 
<button @click="checkRequestList" class="px-3 py-1.5 text-white/80 text-sm hover:text-white hover:bg-white/10 rounded-lg transition-all duration-200 flex items-center space-x-2"> 
<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"/> </svg> 


<span>Your Missing Items</span> </button> 


<!-- Create a Request - active --> 
<button  @click="createRequest" class="px-3 py-1.5 text-white bg-white/20 rounded-lg text-sm flex items-center space-x-2"> 
<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"> <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/> </svg> <span>Create a Request</span> 


</button>



        <button  @click="goToItem" class="px-3 py-1.5 text-white text-sm hover:bg-white/10 rounded-lg transition-all duration-200 flex items-center space-x-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 24 24" fill="none" stroke="currentColor">
            <circle cx="11" cy="11" r="8"/>
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-4.35-4.35"/>
          </svg>
          <span>Search In Items Inventory</span>
        </button>


      </div>

      <!-- Right side: Logout -->
      <button   @click="logout" class="text-white hover:bg-white/10 p-2 rounded-lg transition-all duration-200">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24" fill="none" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
        </svg>
      </button>
    </div>
  </div>
</nav>
<section class="bg-gradient-to-br from-blue-50 to-blue-100 min-h-dvh flex flex-col">	<!-- Progress Steps -->
  <div class="pt-6 pb-4 flex justify-center">
	<div class="flex space-x-4">
  	<template v-for="step in 4" :key="step">
    	<div class="flex items-center">
      	<div
        	class="w-8 h-8 rounded-full flex items-center justify-center text-sm font-medium transition-colors"
        	:class="[formStep >= step ? 'bg-[#002D74] text-white' : 'bg-white text-gray-400 border border-gray-200']"
      	>
        	{{ step }}
      	</div>
      	<div
        	v-if="step < 4"
        	class="w-16 h-1 mx-2 rounded transition-colors"
        	:class="[formStep > step ? 'bg-[#002D74]' : 'bg-gray-200']"
      	></div>
    	</div>
  	</template>
	</div>
</div>

	<!-- Form Container -->
  <div class="flex-1 flex justify-center px-4">
	<div class="bg-white rounded-xl shadow-lg min-w-[24rem] max-w-2xl w-full h-fit">
  	<!-- Form Header -->
  	<div class="bg-[#002D74]  rounded-t-xl p-4">
      <h2 class="text-white text-lg font-semibold">Create a Request</h2>  
      <p class="text-blue-100 text-sm">
      	{{ formStep === 1 ? 'Basic Information' :
         	formStep === 2 ? 'Item Details' :
         	formStep === 3 ? 'Additional Information' : 'Review Details' }}
    	</p>
  	</div>


  	<!-- Form Content -->
  	<div class="p-6">
    	<!-- Step 1: Basic Information -->
    	<template v-if="formStep === 1">
      	<div class="space-y-4">
        	<!-- Your existing Step 1 fields with updated styling -->
        	<div>
          	<label class="block text-gray-700 font-medium mb-2">Category</label>
          	<select
            	v-model="form.item_category"
            	class="w-full p-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#002D74] bg-gray-50"
          	>
            	<option v-for="category in categories" :key="category.id" :value="category.id">
              	{{ category.type }}
            	</option>
          	</select>
        	</div>
        	<!-- Continue with other Step 1 fields -->
          <div class="w-auto px-1 "> <div class="mt-3"><label>Item Name</label> <input class="p-1 mt-2 min-w-12 rounded-xl border h-auto w-80" type='text' id='title' v-model="form.title" /> </div> </div> <div class="w-full px-1 "> <div class="mt-3"><label>Date Lost</label>
            
            <div class="space-y-2">
          <label class="block text-gray-700 font-medium text-sm">
            Search Date
          </label>
          <Datepicker
            id="datelost"
            v-model="form.datelost"
            format="dd MMM yyyy"
            :clearable="false"
            inputClassName="w-full p-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#002D74] focus:border-[#002D74] bg-gray-50 text-sm text-gray-700"
          />
        </div>
  
            
            </div> </div> 
            <div class="md:w-2/2 px-1"> <div class="mt-3 w-auto"><label>Description</label></div>
            <div > <textarea rows="4" class="p-1 mt-1 rounded-xl border h-full w-80 min-w-12" id='description' v-model="form.description"></textarea></div> 
          </div>
      	</div>
    	</template>


    	<!-- Step 2: Item Details -->
    	<template v-else-if="formStep === 2">
      	<div class="space-y-4">
        	<div>
          	<label class="block text-gray-700 font-medium mb-2">Where was it Last seen? (optional)</label>
          	<select
            	v-model="form.item_location"
            	class="w-full p-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#002D74] bg-gray-50"
          	>
            	<option v-for="location in locations" :key="location.id" :value="location.id">
              	{{ location.location }}
            	</option>
          	</select>
        	</div>


        	<div class="grid grid-cols-2 gap-4">
          	<div>
            	<label class="block text-gray-700 font-medium mb-2">Shape (optional)</label>
            	<input
              	type="text"
              	v-model="form.shape"
              	class="w-full p-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#002D74] bg-gray-50"
            	/>
          	</div>
          	<div>
            	<label class="block text-gray-700 font-medium mb-2">Color (optional)</label>
            	<input
              	type="text"
              	v-model="form.color"
              	class="w-full p-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#002D74] bg-gray-50"
            	/>
          	</div>
        	</div>


        	<div class="grid grid-cols-2 gap-4">
          	<div>
            	<label class="block text-gray-700 font-medium mb-2">Length (optional)</label>
            	<input
              	type="text"
              	v-model="form.length"
              	class="w-full p-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#002D74] bg-gray-50"
            	/>
          	</div>
          	<div>
            	<label class="block text-gray-700 font-medium mb-2">Width (optional)</label>
            	<input
              	type="text"
              	v-model="form.width"
              	class="w-full p-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#002D74] bg-gray-50"
            	/>
          	</div>
        	</div>
      	</div>
    	</template>


    	<!-- Step 3: Additional Information -->
    	<template v-else-if="formStep === 3">
      	<div class="space-y-4">
        	<div>
          	<label class="block text-gray-700 font-medium mb-2">
            	Do you have a previous picture for reference purposes? (Optional)
          	</label>
          	<div class="flex space-x-4">
            	<input
              	type="text"
              	v-model="form.picture"
              	class="flex-1 p-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#002D74] bg-gray-50"
            	/>
            	<input
              	type="file"
              	@change="handleFileUpload"
              	class="file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0
                     	file:text-sm file:font-medium file:bg-blue-50 file:text-blue-700
                     	hover:file:bg-blue-100"
            	/>
          	</div>
        	</div>


        	<div>
          	<label class="block text-gray-700 font-medium mb-2">
            	Do you have any further details or comments on the request?
          	</label>
          	<textarea
            	v-model="form.otherdetails"
            	rows="4"
            	class="w-full p-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#002D74] bg-gray-50"
          	></textarea>
        	</div>
      	</div>
    	</template>


    	<!-- Step 4: Review -->
    	<template v-else>
      	<div class="space-y-4">
        	<div class="bg-gray-50 rounded-lg p-4">
          	<dl class="space-y-2">
            	<div class="flex justify-between">
              	<dt class="font-medium text-gray-700">Item Name:</dt>
              	<dd>{{ form.title }}</dd>
            	</div>
            	<div class="flex justify-between">
              	<dt class="font-medium text-gray-700">Description:</dt>
              	<dd>{{ form.description }}</dd>
            	</div>
            	<div class="flex justify-between">
              	<dt class="font-medium text-gray-700">Shape:</dt>
              	<dd>{{ form.shape }}</dd>
            	</div>            	<div class="flex justify-between">
              	<dt class="font-medium text-gray-700">Color:</dt>
              	<dd>{{ form.color }}</dd>
            	</div>            	<div class="flex justify-between">
              	<dt class="font-medium text-gray-700">Length:</dt>
              	<dd>{{ form.length }}</dd>
            	</div>            	<div class="flex justify-between">
              	<dt class="font-medium text-gray-700">Width:</dt>
              	<dd>{{ form.width }}</dd>
            	</div>            	<div class="flex justify-between">
              	<dt class="font-medium text-gray-700">Other Details:</dt>
              	<dd>{{ form.otherdetails }}</dd>
            	</div>            	


            	<!-- Add other review fields -->
          	</dl>
        	</div>
      	</div>
    	</template>


    	<!-- Navigation Buttons -->
    	<div class="flex justify-between mt-6">
      	<button
        	v-if="formStep > 1"
        	@click="goBack"
        	class="px-6 py-2.5 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50
               	transition-colors duration-200 flex items-center space-x-2"
      	>
        	<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
          	<path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
        	</svg>
        	<span>Previous</span>
      	</button>
     	 
      	<button
        	@click="formStep === 4 ? submitForm() : goForward()"
        	class="px-6 py-2.5 bg-[#002D74]  text-white rounded-lg
               	transition-colors duration-200 flex items-center space-x-2"
      	>
        	<span>{{ formStep === 4 ? 'Submit' : 'Next' }}</span>
        	<svg v-if="formStep !== 4" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
          	<path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
        	</svg>
      	</button>
    	</div>
  	</div>
    </div>
	</div>
  </section>



</template>




<script>
import Datepicker from 'vuejs3-datepicker';
import { ref } from "vue";
import axios from 'axios';
import { Inertia } from "@inertiajs/inertia";
import { useCookies } from 'vue3-cookies';

const selected = ref("");

export default {
    name:"CreateRequest",
    setup() {
        const { cookies } = useCookies();
        return { cookies };
    },  
props: {
        requests:Array,
        requestedId:String,
        title: String,
        description: String,
        dateLost:String,
        user:String



    },
    components: {
        Datepicker,
    },
    data() {
        return {
            formStep: 1,
            form: this.$inertia.form( {
                picture:"",
                title:"",
                description:"",
                datelost:"",
                shape:"",
                color:"",
                length:"",
                width:"",
                otherdetails:"",
                item_category:"",
                item_location:"",

            }),
            locations: [],
            categories:[],
        }    
    },
    methods: {

        checkRequestList() {


            Inertia.visit(`/dashboard/${this.requestId}`);


        },
        goToItem() {
            Inertia.visit("/dashboardItem");


        },
        goForward(){
            this.formStep++;

        },
        goBack(){
            this.formStep--;
        },
        submitForm() {

      // When form is submitted, post the data
        try {

            const formData=new FormData();
            
            formData.append('title',this.form.title);
            formData.append('file',this.form.file);
            formData.append('description',this.form.description);
            formData.append('datelost',this.form.datelost);
            formData.append('shape',this.form.shape);
            formData.append('color',this.form.color);
            formData.append('length',this.form.length);
            formData.append('width',this.form.width);
            formData.append('otherdetails',this.form.otherdetails);
            formData.append('item_category',this.form.item_category);
            formData.append('item_location',this.form.item_location);
            formData.append('picture',this.form.picture);


            axios.post(`/addrequest/${this.user}`,formData).then(response=>{
                Inertia.visit(`/dashboard/${this.user}`);

            });



        }
        catch(error){ console.log(error); }    


    },        
      handleFileUpload(event) {
       this.form.file = event.target.files[0];
    },
      logout(){
            Inertia.visit(`/logout`);


        }

    },
    mounted() {
        axios.get('/locations')
        .then(response=> {
            console.log(response.data);
            this.locations=response.data;
        })
        .catch(error=>{ console.error(error)});

        axios.get('/category')
        .then(response=> {
            console.log(response.data);
            this.categories=response.data;
        })
        .catch(error=>{ console.error(error)});
    },

}

</script>
<style>

/* Custom styles for vuejs3-datepicker */
.datepicker {
  font-family: inherit;
}


.datepicker-input {
  width: 100%;
  padding: 0.625rem;
  border-radius: 0.5rem;
  border: 1px solid #e5e7eb;
  background-color: #f9fafb;
}


.datepicker-input:focus {
  outline: none;
  border-color: #002D74;
  box-shadow: 0 0 0 2px rgba(0, 45, 116, 0.2);
}


.datepicker-calendar {
  border: 1px solid #e5e7eb;
  border-radius: 0.5rem;
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
}


.datepicker-header {
  background-color: #002D74;
  color: white;
  border-top-left-radius: 0.5rem;
  border-top-right-radius: 0.5rem;
}


.datepicker-day.selected {
  background-color: #002D74 !important;
  color: white;
}




</style>