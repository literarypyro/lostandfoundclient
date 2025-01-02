<template>
   
<div class="w-full bg-[#0A2647] text-white"> 

<div class="max-w-7xl mx-auto px-6 py-2">
    <h1 class="text-white text-2xl font-semibold tracking-wide">Lost and Found System</h1>
  </div>

</div> 


<nav class="w-full bg-gradient-to-r from-[#0A2647] via-[#144272] to-[#205295] mb-8">
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
 <template v-if="formStep===1"  >
        <section class="bg-gray-100 min-h-dvh flex w-full   box-border justify-center items-center">

        <div   class="bg-[#dfa674] rounded-2xl  min-w-64  max-w-xl flex p-5 " >
            <div class="md:w-1/2 px-8">
   
    
    <div><label>Category</label></div><div>
            <select class="p-1 mt-1 rounded-xl border  w-auto" id="item_category"
      v-model="form.item_category"
    >
      <option class='text-wrap' v-for="category in categories"
        :key="category.id"
        :value="category.id"
      >
        {{ category.type }} 
      </option>
</select></div>
        <div class="w-auto px-1 ">
            <div class="mt-3"><label>Item Name</label>
                <input class="p-1 mt-2 min-w-12 rounded-xl border h-auto w-80" type='text' id='title' v-model="form.title" />

            
            </div>

        </div>
        <div class="w-full px-1 ">

    <div  class="mt-3"><label>Date Lost</label><datepicker class="w-auto" id='datelost' v-model="form.datelost"></datepicker></div>
        </div>

        <div class="md:w-2/2 px-1">

<div  class="mt-3 w-auto"><label>Description</label></div><div >
        
        
        <textarea rows="4" class="p-1 mt-1 rounded-xl border h-full w-80 min-w-12" id='description' v-model="form.description"></textarea></div>

    </div>

        <button class="mx-2 mt-2 hover:border register text-white bg-[#002D74] hover:border-gray-400 rounded-xl py-2 px-5 hover:scale-110 hover:bg-[#002c7424] font-semibold duration-300"  @click='goForward'>Next</button>

    </div>


    </div>

    </section>
    </template>
    <template v-else-if="formStep===2" >
        <section class="bg-gray-100  min-h-dvh w-auto flex box-border justify-center items-center">

<div   class="bg-[#dfa674] rounded-2xl min-w-64 flex max-w-xl p-5 " >    
    <div class="w-auto px-8 m-4">    
            <div><label>Where was it Last seen? (optional)</label></div>
        <div>

            <select id="item_location"  class="p-1 mt-2 min-w-80 rounded-xl border h-auto w-auto"  
      v-model="form.item_location"
    >
      <option v-for="location in locations"
        :key="location.id"
        :value="location.id"
      >
        {{ location.location }} 
      </option>
</select>

        </div>

        <div class=' inline-flex flex-row'>
 
        <div class="mt-3 w-2/5" ><label class="w-full">Shape (optional)</label><input type='text' class=" py-1 pl-2  mt-2   min-h-10 rounded-xl border h-auto w-full"  id="shape" v-model="form.shape" /></div>
        <div class="mt-3 w-3/5" ><label class="w-full">Color (optional)</label><input type='text' class=" pl-2 py-1 ml-2 mt-2 rounded-xl border  min-h-10 h-auto w-auto"  id="color" v-model="form.color" /></div>

        </div>  

        
        <div class="inline-flex flex-row">
        
        <div class="mt-3 w-2/5"><label class="w-full">Length (optional)</label><input type='text' class="pl-2 py-1 min-h-10 mt-1 rounded-xl border h-auto w-full"  id="length" v-model="form.length" /></div>
        <div class="mt-3 w-3/5"><label class="w-full">Width (optional)</label><input type='text' class=" pl-2 py-1  ml-2 min-h-10 mt-1 rounded-xl border h-auto w-auto"  id="width" v-model="form.width" /></div>
        
      
      </div>

      <div class='mt-3 w-auto inline-flex flex-row'>

        <button class="mx-2 mt-2 hover:border register text-white bg-[#002D74] hover:border-gray-400 rounded-xl py-2 px-5 hover:scale-110 hover:bg-[#002c7424] font-semibold duration-300" @click='goBack'>Previous</button>
        <button class="mx-1 mt-2 hover:border register text-white bg-[#002D74] hover:border-gray-400 rounded-xl py-2 px-5 hover:scale-110 hover:bg-[#002c7424] font-semibold duration-300" @click='goForward'>Next</button>
        </div>
</div>
</div>
</section>

    </template>
    <template v-else-if="formStep===3">
        <section class="bg-gray-100 min-h-dvh flex box-border justify-center items-center">

<div   class="bg-[#dfa674] rounded-2xl flex max-w-3xl p-5 " >    
    <div class="md:w-1/2 px-8"> 
        <div><label>Do you have a previous picture for reference purposes? (Optional)</label>
            
            <div class='inline-flex flex-row'>

                <input type="text" id="picture" class="p-1 mt-2 rounded-xl border h-auto w-auto"   v-model="form.picture" />

                <input type="file" class="p1 mt-2" @change="handleFileUpload" id="fileUpload" />


            </div>
        </div>
        <div class="mt-2 w-auto">
          <label>Do you have any further details or comments on the request?</label>
        </div>  
        <div class="p1 w-auto mt-2">  
          <textarea rows="4" class="p-1 mt-1 rounded-xl border h-full w-80" id='otherdetails' v-model="form.otherdetails"></textarea>
        </div>

        <div class='mt-3 w-auto inline-flex flex-row'>

        <button class="mx-2 mt-2 hover:border register text-white bg-[#002D74] hover:border-gray-400 rounded-xl py-2 px-5 hover:scale-110 hover:bg-[#002c7424] font-semibold duration-300"  @click='goBack'>Previous</button>
        <button class="mx-2 mt-2 hover:border register text-white bg-[#002D74] hover:border-gray-400 rounded-xl py-2 px-5 hover:scale-110 hover:bg-[#002c7424] font-semibold duration-300"  @click='goForward'>Next</button>
</div>
</div></div></section>

    </template>
    <template v-else>
        <section class="bg-gray-100  min-h-dvh w-auto flex box-border justify-center items-center">

<div   class="bg-[#dfa674] rounded-2xl min-w-64 flex max-w-xl p-5 " >    
    <div class="w-auto px-8">    


        <div class='flex flex-col'>

        <div class='inline-flex flex-row p-2'><label class="font-bold">ITEM NAME: </label><div>{{ form.title }}</div></div>
        <div class='inline-flex flex-row p-2'><label class="font-bold">DESCRIPTION: </label><div>{{ form.description }}</div></div>
        <div class='inline-flex flex-row p-2'><label class="font-bold">Shape: </label><div>{{ form.shape }}</div></div>
        <div class='inline-flex flex-row p-2'><label class="font-bold">Color: </label><div>{{ form.color }}</div></div>
        <div class='inline-flex flex-row p-2'><label class="font-bold">Length: </label><div>{{ form.length }}</div></div>
        <div class='inline-flex flex-row p-2'><label class="font-bold">Width: </label><div>{{ form.width }}</div></div>
        <div class='inline-flex flex-row p-2'><label class="font-bold">Other Details: </label><div>{{ form.otherdetails }}</div></div>

        </div>
        <div class='mt-3 w-auto inline-flex flex-row'>

        <button class="mx-2 mt-2 hover:border register text-white bg-[#002D74] hover:border-gray-400 rounded-xl py-2 px-5 hover:scale-110 hover:bg-[#002c7424] font-semibold duration-300"  @click='goBack'>Previous</button>
        <button class="mx-2 mt-2 hover:border register text-white bg-[#002D74] hover:border-gray-400 rounded-xl py-2 px-5 hover:scale-110 hover:bg-[#002c7424] font-semibold duration-300"  @click='submitForm'>Submit</button>
</div>
        </div>
        </div>
        </section>


        
    </template>
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

#nav_menu {
  background: rgb(255,0,0);
  background: linear-gradient(90deg, rgba(255,0,0,1) 0%, rgba(198,0,0,1) 35%, rgba(155,0,0,1) 100%);
  color:whitesmoke;


}





</style>