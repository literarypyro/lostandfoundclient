<template>
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
    <div class="md:w-1/2 px-8">    
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
    
        <div class="mt-3" ><label>Shape (optional)</label></div><div><input type='text' class="p-1 mt-2 rounded-xl border h-auto w-auto"  id="shape" v-model="form.shape" /></div>
        <div class="mt-3" ><label>Color (optional)</label></div><div><input type='text' class="p-1 mt-2 rounded-xl border h-auto w-auto"  id="color" v-model="form.color" /></div>
        <div class="mt-3"><label>Length (optional)</label></div><div><input type='text' class="p-1 mt-2 rounded-xl border h-auto w-auto"  id="length" v-model="form.length" /></div>
        <div class="mt-3"><label>Width (optional)</label></div><div><input type='text' class="p-1 mt-2 rounded-xl border h-auto w-auto"  id="width" v-model="form.width" /></div>

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
           dsadfd 
        <button class="mx-2 mt-2 hover:border register text-white bg-[#002D74] hover:border-gray-400 rounded-xl py-2 px-5 hover:scale-110 hover:bg-[#002c7424] font-semibold duration-300"  @click='goBack'>Previous</button>
        <button class="mx-2 mt-2 hover:border register text-white bg-[#002D74] hover:border-gray-400 rounded-xl py-2 px-5 hover:scale-110 hover:bg-[#002c7424] font-semibold duration-300"  @click='submitForm'>Submit</button>


        
    </template>
</template>
<script>
import Datepicker from 'vuejs3-datepicker';
import { ref } from "vue";
import axios from 'axios';
import { Inertia } from "@inertiajs/inertia";

const selected = ref("");

export default {
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


            const response=axios.post(`/addrequest/${this.user}`,formData);

            if(response){
                console.log(response);
    //            Inertia.visit(`/dashboard/${this.user}`);


            }


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