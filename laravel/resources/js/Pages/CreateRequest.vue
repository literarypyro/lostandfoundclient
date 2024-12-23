<template>
 
 <!-- Main navigation container -->
<nav  id='nav_menu'
  class="flex-no-wrap relative flex w-full items-center justify-between bg-zinc-50 py-2 shadow-dark-mild dark:bg-neutral-700 lg:flex-wrap lg:justify-start lg:py-4">
  <div class="flex w-full flex-wrap items-center justify-between px-3">

    <!-- Collapsible navigation container -->
    <div
      class="!visible hidden flex-grow basis-[100%] items-center lg:!flex lg:basis-auto"
      id="navbarSupportedContent1"
      data-twe-collapse-item>
      <!-- Logo -->
      <a
        class="mb-4 me-5 ms-2 mt-3 flex items-center text-neutral-900 hover:text-neutral-900 focus:text-neutral-900 dark:text-neutral-200 dark:hover:text-neutral-400 dark:focus:text-neutral-400 lg:mb-0 lg:mt-0"
        href="#">
        <img
          src="https://tecdn.b-cdn.net/img/logo/te-transparent-noshadows.webp"
          style="height: 15px"
          alt="TE Logo"
          loading="lazy" />
      </a>
      <!-- Left navigation links -->
      <ul
        class="list-style-none me-auto flex flex-col ps-0 lg:flex-row"
        data-twe-navbar-nav-ref>
        <li class="mb-4 lg:mb-0 lg:pe-2" data-twe-nav-item-ref>
          <!-- Dashboard link -->
          <a
            class="transition duration-200 motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2"
            href="#"
            data-twe-nav-link-ref  @click="checkRequestList"
            >Your Missing Items</a
          >
        </li>
        <li class="mb-4 lg:mb-0 lg:pe-2" data-twe-nav-item-ref>
          <a 
            class="transition duration-200 hover:ease-in-out  motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2"
            href="#"
            data-twe-nav-link-ref @click="goToItem"
            >Search In Items Inventory</a
          >
        </li>
        <!-- Team link -->
 
      </ul>
      <!-- Left links -->
    </div>

    <!-- Right elements -->
     <!-- Right elements -->
     <div class="relative flex items-center">
      <!-- Icon -->
      <a class="me-4 text-neutral-600 dark:text-white" v-on:click="logout">
        <span class="[&>svg]:w-5">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
      </svg>

        </span>
      </a>
</div>

    <!-- Right elements -->
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