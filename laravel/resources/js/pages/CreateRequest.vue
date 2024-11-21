<template>
    <template v-if="formStep===1">
        <div><label>Category</label><div><input type='text' /></div></div>
        <div><label>Title</label><div><input type='text' /></div></div>
        <div><label>Description</label><div><input type='text' /></div></div>
        <div><label>Date Lost</label><div><datepicker></datepicker></div></div>

        <button @click='goForward'>Next</button>

    </template>
    <template v-else-if="formStep===2">
        <div><label>Where was it Last seen? (optional)</label>
        <div>

            <select
      v-model="item_category"
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
        <div><label>Shape (optional)</label><div><input type='text' /></div></div>
        <div><label>Color (optional)</label><div><input type='text' /></div></div>
        <div><label>Length (optional)</label><div><input type='text' /></div></div>
        <div><label>Width (optional)</label><div><input type='text' /></div></div>

        <button @click='goBack'>Previous</button>
        <button @click='goForward'>Next</button>


    </template>
    <template v-else-if="formStep===3">
        <div><label>Do you have a previous picture for reference purposes? (Optional)</label>
            
            <div>

                <input type="text" v-model="form.name" />

                <input type="file" @input="form.avatar = $event.target.files[0]" />


            </div>
        </div>
        
        <button @click='goBack'>Previous</button>
        <button @click='goForward'>Next</button>



    </template>
    <template v-else>
           dsadfd 
        <button @click='goBack'>Previous</button>
        <button @click=''>Submit</button>


        
    </template>
</template>
<script>
import Datepicker from 'vuejs3-datepicker';
import { ref } from "vue";
import axios from 'axios';
const selected = ref("");

export default {
props: {
        requests:Array,
        requestedId:String,
    },
    components: {
        Datepicker,
    },
    data() {
        return {
            formStep: 1,
            item_location:"",
            form: {
                name:""

            },
            locations: [],
        }    
    },
    methods: {
        goForward(){
            this.formStep++;

        },
        goBack(){
            this.formStep--;
        }

    },
    mounted() {
        axios.get('/locations')
        .then(response=> {
            console.log(response.data);
            this.locations=response.data;
        })
        .catch(error=>{ console.error(error)});
    },

}

</script>
<style>







</style>