<template>
    <template v-if="formStep===1">
        <div><label>Category</label><div>
            <select id="item_category"
      v-model="form.item_category"
    >
      <option v-for="category in categories"
        :key="category.id"
        :value="category.id"
      >
        {{ category.type }} 
      </option>
</select></div></div>
        <div><label>Title</label><div><input type='text' id='title' v-model="form.title" /></div></div>
        <div><label>Description</label><div><input type='text' id='description' v-model="form.description" /></div></div>
        <div><label>Date Lost</label><div><datepicker id='datelost' v-model="form.datelost"></datepicker></div></div>

        <button @click='goForward'>Next</button>

    </template>
    <template v-else-if="formStep===2" >
            <div><label>Where was it Last seen? (optional)</label>
        <div>

            <select id="item_location"
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
    
    
        </div>
        <div><label>Shape (optional)</label><div><input type='text' id="shape" v-model="form.shape" /></div></div>
        <div><label>Color (optional)</label><div><input type='text' id="color" v-model="form.color" /></div></div>
        <div><label>Length (optional)</label><div><input type='text' id="length" v-model="form.length" /></div></div>
        <div><label>Width (optional)</label><div><input type='text' id="width" v-model="form.width" /></div></div>

        <button @click='goBack'>Previous</button>
        <button @click='goForward'>Next</button>


    </template>
    <template v-else-if="formStep===3">
        <div><label>Do you have a previous picture for reference purposes? (Optional)</label>
            
            <div>

                <input type="text" id="picture" v-model="form.picture" />

                <input type="file" @change="handleFileUpload" id="fileUpload" />


            </div>
        </div>
        <div><label>Do you have any further details or comments on the request?</label><input type=text v-model="form.otherdetails" /></div>
        
        <button @click='goBack'>Previous</button>
        <button @click='goForward'>Next</button>



    </template>
    <template v-else>
           dsadfd 
        <button @click='goBack'>Previous</button>
        <button @click='submitForm'>Submit</button>


        
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