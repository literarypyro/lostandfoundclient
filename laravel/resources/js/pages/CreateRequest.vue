<template>
 
 <!-- Main navigation container -->
<nav
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
            class="text-black/60 transition duration-200 hover:text-black/80 hover:ease-in-out focus:text-black/80 active:text-black/80 motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2"
            href="#"
            data-twe-nav-link-ref  @click="checkRequestList"
            >Your Missing Items</a
          >
        </li>
        <li class="mb-4 lg:mb-0 lg:pe-2" data-twe-nav-item-ref>
          <a
            class="text-black/60 transition duration-200 hover:text-black/80 hover:ease-in-out focus:text-black/80 active:text-black/80 motion-reduce:transition-none dark:text-white/60 dark:hover:text-white/80 dark:focus:text-white/80 dark:active:text-white/80 lg:px-2"
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
    <div class="relative flex items-center">
      <!-- Icon -->
      <a class="me-4 text-neutral-600 dark:text-white" href="#">
        <span class="[&>svg]:w-5">
          <svg
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 24 24"
            fill="currentColor">
            <path
              d="M2.25 2.25a.75.75 0 000 1.5h1.386c.17 0 .318.114.362.278l2.558 9.592a3.752 3.752 0 00-2.806 3.63c0 .414.336.75.75.75h15.75a.75.75 0 000-1.5H5.378A2.25 2.25 0 017.5 15h11.218a.75.75 0 00.674-.421 60.358 60.358 0 002.96-7.228.75.75 0 00-.525-.965A60.864 60.864 0 005.68 4.509l-.232-.867A1.875 1.875 0 003.636 2.25H2.25zM3.75 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0zM16.5 20.25a1.5 1.5 0 113 0 1.5 1.5 0 01-3 0z" />
          </svg>
        </span>
      </a>

      <!-- First dropdown container -->
      <div
        class="relative"
        data-twe-dropdown-ref
        data-twe-dropdown-alignment="end">
        <!-- First dropdown trigger -->
        <a
          class="me-4 flex items-center text-neutral-600 dark:text-white"
          href="#"
          id="dropdownMenuButton1"
          role="button"
          data-twe-dropdown-toggle-ref
          aria-expanded="false">
          <!-- Dropdown trigger icon -->
          <span class="[&>svg]:w-5">
            <svg
              xmlns="http://www.w3.org/2000/svg"
              viewBox="0 0 24 24"
              fill="currentColor">
              <path
                fill-rule="evenodd"
                d="M5.25 9a6.75 6.75 0 0113.5 0v.75c0 2.123.8 4.057 2.118 5.52a.75.75 0 01-.297 1.206c-1.544.57-3.16.99-4.831 1.243a3.75 3.75 0 11-7.48 0 24.585 24.585 0 01-4.831-1.244.75.75 0 01-.298-1.205A8.217 8.217 0 005.25 9.75V9zm4.502 8.9a2.25 2.25 0 104.496 0 25.057 25.057 0 01-4.496 0z"
                clip-rule="evenodd" />
            </svg>
          </span>
          <!-- Notification counter -->
          <span
            class="absolute -mt-4 ms-2.5 rounded-full bg-danger px-[0.35em] py-[0.15em] text-[0.6rem] font-bold leading-none text-white"
            >1</span
          >
        </a>
        <!-- First dropdown menu -->
        <ul
          class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg data-[twe-dropdown-show]:block dark:bg-surface-dark"
          aria-labelledby="dropdownMenuButton1"
          data-twe-dropdown-menu-ref>
          <!-- First dropdown menu items -->
          <li>
            <a
              class="block w-full whitespace-nowrap bg-white px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline dark:bg-surface-dark dark:text-white dark:hover:bg-neutral-800/25 dark:focus:bg-neutral-800/25 dark:active:bg-neutral-800/25"
              href="#"
              data-twe-dropdown-item-ref
              >Action</a
            >
          </li>
          <li>
            <a
              class="block w-full whitespace-nowrap bg-white px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline dark:bg-surface-dark dark:text-white dark:hover:bg-neutral-800/25 dark:focus:bg-neutral-800/25 dark:active:bg-neutral-800/25"
              href="#"
              data-twe-dropdown-item-ref
              >Another action</a
            >
          </li>
          <li>
            <a
              class="block w-full whitespace-nowrap bg-white px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline dark:bg-surface-dark dark:text-white dark:hover:bg-neutral-800/25 dark:focus:bg-neutral-800/25 dark:active:bg-neutral-800/25"
              href="#"
              data-twe-dropdown-item-ref
              >Something else here</a
            >
          </li>
        </ul>
      </div>

      <!-- Second dropdown container -->
      <div
        class="relative"
        data-twe-dropdown-ref
        data-twe-dropdown-alignment="end">
        <!-- Second dropdown trigger -->
        <a
          class="flex items-center whitespace-nowrap transition duration-150 ease-in-out motion-reduce:transition-none"
          href="#"
          id="dropdownMenuButton2"
          role="button"
          data-twe-dropdown-toggle-ref
          aria-expanded="false">
          <!-- User avatar -->
          <img
            src="https://tecdn.b-cdn.net/img/new/avatars/2.jpg"
            class="rounded-full"
            style="height: 25px; width: 25px"
            alt=""
            loading="lazy" />
        </a>
        <!-- Second dropdown menu -->
        <ul
          class="absolute z-[1000] float-left m-0 hidden min-w-max list-none overflow-hidden rounded-lg border-none bg-white bg-clip-padding text-left text-base shadow-lg data-[twe-dropdown-show]:block dark:bg-surface-dark"
          aria-labelledby="dropdownMenuButton2"
          data-twe-dropdown-menu-ref>
          <!-- Second dropdown menu items -->
          <li>
            <a
              class="block w-full whitespace-nowrap bg-white px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline dark:bg-surface-dark dark:text-white dark:hover:bg-neutral-800/25 dark:focus:bg-neutral-800/25 dark:active:bg-neutral-800/25"
              href="#"
              data-twe-dropdown-item-ref
              >Action</a
            >
          </li>
          <li>
            <a
              class="block w-full whitespace-nowrap bg-white px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline dark:bg-surface-dark dark:text-white dark:hover:bg-neutral-800/25 dark:focus:bg-neutral-800/25 dark:active:bg-neutral-800/25"
              href="#"
              data-twe-dropdown-item-ref
              >Another action</a
            >
          </li>
          <li>
            <a
              class="block w-full whitespace-nowrap bg-white px-4 py-2 text-sm font-normal text-neutral-700 hover:bg-zinc-200/60 focus:bg-zinc-200/60 focus:outline-none active:bg-zinc-200/60 active:no-underline dark:bg-surface-dark dark:text-white dark:hover:bg-neutral-800/25 dark:focus:bg-neutral-800/25 dark:active:bg-neutral-800/25"
              href="#"
              data-twe-dropdown-item-ref
              >Something else here</a
            >
          </li>
        </ul>
      </div>
    </div>
    <!-- Right elements -->
  </div>
</nav>
 <template v-if="formStep===1"  >
        <section class="bg-gray-100 min-h-dvh flex w-full   box-border justify-center items-center">

        <div   class="bg-[#dfa674] rounded-2xl  max-w-3xl flex p-5 " >
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
        <div class="w-1/2 px-1 ">
            <div class="mt-3"><label>Title</label></div>

            <div >
                <input class="p-1 mt-2 rounded-xl border h-auto w-auto" type='text' id='title' v-model="form.title" />

            
            </div>

        </div>
        <div class="w-1/2 px-1 ">

    <div  class="mt-3"><label>Date Lost</label></div><div><datepicker class="w-auto" id='datelost' v-model="form.datelost"></datepicker></div>
        </div>

        <div class="md:w-2/2 px-1">

<div  class="mt-3"><label>Description</label></div><div >
        
        
        <textarea rows="4" class="p-1 mt-1 rounded-xl border h-full w-auto" id='description' v-model="form.description"></textarea></div>

    </div>

        <button class="mx-2 mt-2 hover:border register text-white bg-[#002D74] hover:border-gray-400 rounded-xl py-2 px-5 hover:scale-110 hover:bg-[#002c7424] font-semibold duration-300"  @click='goForward'>Next</button>

    </div>


    </div>

    </section>
    </template>
    <template v-else-if="formStep===2" >
        <section class="bg-gray-100  min-h-dvh w-auto flex box-border justify-center items-center">

<div   class="bg-[#dfa674] rounded-2xl flex max-w-3xl p-5 " >    
    <div class="w-auto px-8">    
            <div><label>Where was it Last seen? (optional)</label></div>
        <div>

            <select id="item_location"  class="p-1 mt-2 rounded-xl border h-auto w-auto"  
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
    
        <div class="mt-3" ><label class="w-full">Shape (optional)</label></div><div><input type='text' class="p-1 mt-2 rounded-xl border h-auto w-auto"  id="shape" v-model="form.shape" /></div>
        <div class="mt-3" ><label class="w-full">Color (optional)</label></div><div><input type='text' class="p-1 mt-2 rounded-xl border h-auto w-auto"  id="color" v-model="form.color" /></div>
        <div class="mt-3"><label class="w-full">Length (optional)</label></div><div><input type='text' class="p-1 mt-2 rounded-xl border h-auto w-auto"  id="length" v-model="form.length" /></div>
        <div class="mt-3"><label class="w-full">Width (optional)</label></div><div><input type='text' class="p-1 mt-2 rounded-xl border h-auto w-auto"  id="width" v-model="form.width" /></div>

        <button class="mx-2 mt-2 hover:border register text-white bg-[#002D74] hover:border-gray-400 rounded-xl py-2 px-5 hover:scale-110 hover:bg-[#002c7424] font-semibold duration-300" @click='goBack'>Previous</button>
        <button class="mx-1 mt-2 hover:border register text-white bg-[#002D74] hover:border-gray-400 rounded-xl py-2 px-5 hover:scale-110 hover:bg-[#002c7424] font-semibold duration-300" @click='goForward'>Next</button>
</div>
</div>
</section>

    </template>
    <template v-else-if="formStep===3">
        <section class="bg-gray-100 min-h-dvh flex box-border justify-center items-center">

<div   class="bg-[#dfa674] rounded-2xl flex max-w-3xl p-5 " >    
    <div class="md:w-1/2 px-8"> 
        <div><label>Do you have a previous picture for reference purposes? (Optional)</label>
            
            <div>

                <input type="text" id="picture" class="p-1 mt-2 rounded-xl border h-auto w-auto"   v-model="form.picture" />

                <input type="file" @change="handleFileUpload" id="fileUpload" />


            </div>
        </div>
        <div><label>Do you have any further details or comments on the request?</label><input type=text class="p-1 mt-2 rounded-xl border h-auto w-auto"   v-model="form.otherdetails" /></div>
        
        <button class="mx-2 mt-2 hover:border register text-white bg-[#002D74] hover:border-gray-400 rounded-xl py-2 px-5 hover:scale-110 hover:bg-[#002c7424] font-semibold duration-300"  @click='goBack'>Previous</button>
        <button class="mx-2 mt-2 hover:border register text-white bg-[#002D74] hover:border-gray-400 rounded-xl py-2 px-5 hover:scale-110 hover:bg-[#002c7424] font-semibold duration-300"  @click='goForward'>Next</button>

</div></div></section>

    </template>
    <template v-else>
        <section class="bg-gray-100  min-h-dvh w-auto flex box-border justify-center items-center">

<div   class="bg-[#dfa674] rounded-2xl flex max-w-3xl p-5 " >    
    <div class="w-auto px-8">    


        <div class='flex flex-col'>

        <div class='inline-flex flex-row'><label class="font-bold">TITLE: </label><div>{{ form.title }}</div></div>
        <div class='inline-flex flex-row'><label class="font-bold">DESCRIPTION: </label><div>{{ form.description }}</div></div>
        <div class='inline-flex flex-row'><label class="font-bold">Shape: </label><div>{{ form.shape }}</div></div>
        <div class='inline-flex flex-row'><label class="font-bold">Color: </label><div>{{ form.color }}</div></div>
        <div class='inline-flex flex-row'><label class="font-bold">Length: </label><div>{{ form.length }}</div></div>
        <div class='inline-flex flex-row'><label class="font-bold">Width: </label><div>{{ form.width }}</div></div>
        <div class='inline-flex flex-row'><label class="font-bold">Other Details: </label><div>{{ form.other_details }}</div></div>

        </div>

        <button class="mx-2 mt-2 hover:border register text-white bg-[#002D74] hover:border-gray-400 rounded-xl py-2 px-5 hover:scale-110 hover:bg-[#002c7424] font-semibold duration-300"  @click='goBack'>Previous</button>
        <button class="mx-2 mt-2 hover:border register text-white bg-[#002D74] hover:border-gray-400 rounded-xl py-2 px-5 hover:scale-110 hover:bg-[#002c7424] font-semibold duration-300"  @click='submitForm'>Submit</button>

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







</style>