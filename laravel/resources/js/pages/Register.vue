<template>
<div>
    <template v-if="formStep===1">
        <section class="bg-gray-100 min-h-dvh flex w-full   box-border justify-center items-center">

<div   class="bg-[#dfa674] rounded-2xl  max-w-3xl flex p-5 " >
    <div class="md:w-1/2 px-8">
        
        <div class="mt-3" ><label>Username</label><input type='text' class="p-1 mt-2 rounded-xl border h-auto w-auto" v-model="username" id="username" /><span id='userverification' style="color:red;"></span></div>
        <div class="mt-3" ><label>Password</label><input type='password' class="p-1 mt-2 rounded-xl border h-auto w-auto" v-model="password" id="pass" /></div>
        <div class="mt-3" ><label>Confirm Password</label><input type='password' class="p-1 mt-2 rounded-xl border h-auto w-auto" v-model="confirmpass" id="confirmpass" /></div>

        <button class="mx-2 mt-2 hover:border register text-white bg-[#002D74] hover:border-gray-400 rounded-xl py-2 px-5 hover:scale-110 hover:bg-[#002c7424] font-semibold duration-300" @click='goForward'>Next</button>
</div>
</div>
</section>
    </template>
    <template v-else-if="formStep===2">
        <section class="bg-gray-100 min-h-dvh flex w-full   box-border justify-center items-center">

<div   class="bg-[#dfa674] rounded-2xl  max-w-3xl flex p-5 " >
    <div class="md:w-1/2 px-8">

        <div class="mt-3" ><label>First Name</label></div><div><input type='text' class="p-1 mt-2 rounded-xl border h-auto w-auto" v-model="firstname" id="firstname" /></div>
        <div class="mt-3" ><label>Middle Name</label></div><div><input type='text' class="p-1 mt-2 rounded-xl border h-auto w-auto" v-model="middlename" id="middlename" /></div>
 
        <div class="mt-3" ><label>Last Name</label></div><div><input type='text' class="p-1 mt-2 rounded-xl border h-auto w-auto" v-model="lastname" id="lastname" /></div>
        <div class="mt-3" ><label>Age</label></div><div><input type='text' class="p-1 mt-2 rounded-xl border h-auto w-auto" v-model="age" id="age" /></div>
        <div class="mt-3" ><label>Sex</label></div>
        <div >
            
            
            <select v-model="sex" id="sex"   class="p-1 mt-2 rounded-xl border h-auto w-auto" >
                <option value="M">Male</option>
                <option value="F">Female</option>
                <option value="NB">Non-Binary</option>
            </select>
        </div>
        <div  class="mt-3"><label>Civil Status</label>
            
            
            
            <select v-model="status" id="status"   class="p-1 mt-2 rounded-xl border h-auto w-auto" >
                <option value="S">Single</option>
                <option value="M">Married</option>
                <option value="A">Annulled</option>
                <option value="SE">Separated</option>
                <option value="CL">Common Law/Live In</option>
                <option value="W">Widow</option>

                </select>
        
        
        
        
        </div>

        <div  class="mt-3">
        <button class="mx-2 mt-2 hover:border register text-white bg-[#002D74] hover:border-gray-400 rounded-xl py-2 px-5 hover:scale-110 hover:bg-[#002c7424] font-semibold duration-300" @click='goBack'>Previous</button>
        <button class="mx-2 mt-2 hover:border register text-white bg-[#002D74] hover:border-gray-400 rounded-xl py-2 px-5 hover:scale-110 hover:bg-[#002c7424] font-semibold duration-300" @click='goForward'>Next</button>
    </div>
</div>
</div>
</section>
    </template>
    <template v-else-if="formStep===3">

        <section class="bg-gray-100 min-h-dvh flex w-full   box-border justify-center items-center">

<div   class="bg-[#dfa674] rounded-2xl  max-w-3xl flex p-5 " >
    <div class="md:w-1/2 px-8">

        <div class="mt-3" ><label>Unit</label><div><input type='text' class="p-1 mt-2 rounded-xl border h-auto w-auto" v-model="unit" id="unit" /></div></div>
        <div class="mt-3" ><label>Street Address</label><div><input type='text' class="p-1 mt-2 rounded-xl border h-auto w-auto" v-model="street" id="street" /></div></div>
        <div class="mt-3" ><label>City</label><div><input type='text' v-model="city" class="p-1 mt-2 rounded-xl border h-auto w-auto" id="city" /></div></div>
        <div class="mt-3" ><label>Province</label><div><input type='text' v-model="province" class="p-1 mt-2 rounded-xl border h-auto w-auto" id="province" /></div></div>
        <div class="mt-3" ><label>Country</label>
        <div>

            <select id="country"   class="p-1 mt-2 rounded-xl border h-auto w-auto" 
      v-model="country"
    >
      <option v-for="countent in countries"
        :key="countent?.id"
        :value="countent?.id"
      >
        {{ countent?.name }} 
      </option>
</select>

        </div></div>
        <div class="mt-3" ><label>Zip Code</label><div><input type='text' class="p-1 mt-2 rounded-xl border h-auto w-auto" v-model="zipcode" id="zipcode" /></div></div>
        
        <button class="mx-2 mt-2 hover:border register text-white bg-[#002D74] hover:border-gray-400 rounded-xl py-2 px-5 hover:scale-110 hover:bg-[#002c7424] font-semibold duration-300" @click='goBack'>Previous</button>
        <button class="mx-2 mt-2 hover:border register text-white bg-[#002D74] hover:border-gray-400 rounded-xl py-2 px-5 hover:scale-110 hover:bg-[#002c7424] font-semibold duration-300" @click='goForward'>Next</button>


</div>
</div>
</section>
    </template>
    <template v-else-if="formStep===4">

        <section class="bg-gray-100 min-h-dvh flex w-full   box-border justify-center items-center">

<div   class="bg-[#dfa674] rounded-2xl  max-w-3xl flex p-5 " >
    <div class="md:w-1/2 px-8">       
        <div class="mt-3" ><label>Home Phone</label>
            <input type='text' v-model="landline" class="p-1 mt-2 rounded-xl border h-auto w-auto" id="landline" />
        </div>
        <div class="mt-3" ><label>Mobile Phone</label>
            <input type='text' v-model="mobile" class="p-1 mt-2 rounded-xl border h-auto w-auto" id="mobile" />
        </div>

        <div class="mt-3" ><label>Email</label>
            <input type='text' v-model="email" class="p-1 mt-2 rounded-xl border h-auto w-auto" id="email" />
        </div>
        
        <button class="mx-2 mt-2 hover:border register text-white bg-[#002D74] hover:border-gray-400 rounded-xl py-2 px-5 hover:scale-110 hover:bg-[#002c7424] font-semibold duration-300" @click='goBack'>Previous</button>
        <button class="mx-2 mt-2 hover:border register text-white bg-[#002D74] hover:border-gray-400 rounded-xl py-2 px-5 hover:scale-110 hover:bg-[#002c7424] font-semibold duration-300" @click='goForward'>Next</button>
</div>
</div>
</section>
    </template>
    <template v-else>
        <section class="bg-gray-100 min-h-dvh flex w-full   box-border justify-center items-center">

<div   class="bg-[#dfa674] rounded-2xl  max-w-3xl flex p-5 " >
    <div class="md:w-1/2 px-8">
           dsadfd 
        <button class="mx-2 mt-2 hover:border register text-white bg-[#002D74] hover:border-gray-400 rounded-xl py-2 px-5 hover:scale-110 hover:bg-[#002c7424] font-semibold duration-300" @click='goBack'>Previous</button>
        <button class="mx-2 mt-2 hover:border register text-white bg-[#002D74] hover:border-gray-400 rounded-xl py-2 px-5 hover:scale-110 hover:bg-[#002c7424] font-semibold duration-300" @click='registerUser'>Submit</button>

</div>
</div></section>
        
    </template>




</div>
</template>
<script>
import axios from 'axios';
import { Inertia } from '@inertiajs/inertia';

export default {
    props: {
        requests:Array,
        requestedId:String,
    },
    components: {
    },
    data() {
        return {
            formStep: 1,
            countries:[],
            username:"",
            password:"",
            firstname:"",
            lastname:"",
            middlename:"",
            landline:"",
            mobile:"",
            email:"",
            zipcode:"",
            country:"",
            unit:"",
            street:"",
            city:"",
            province:"",
            age:"",
            sex:"",
            status:"",
        }    
    },
    methods: {
        goForward(){
            this.formStep++;

        },
        goBack(){
            this.formStep--;
        },
        async registerUser(){
            try {
                
                const fullname=this.firstname+" "+this.lastname;
                
                
                const response = await axios.post('/newuser', {
                    username: this.username,
                    password: this.password,
                    name:fullname
                });

                // Assuming the response contains the user ID (e.g., response.data.userid)
                const userId = response.data.user_id;

                if (userId) {
                // Use Inertia's visit method to navigate to /requests/:userId
        //          Inertia.visit(`/requests/${userId}`);

                    axios.post(`/registerProfile/${userId}`, {
                        firstName: this.firstname,
                        middleName: this.middlename,
                        lastName:this.lastname,
                        sex:this.sex,
                        age:this.age,
                        civil:this.status
                    });


                    axios.post(`/registerAddress/${userId}`, {
                        unit: this.username,
                        street: this.password,
                        city:this.city,
                        province:this.province,
                        country:this.country,
                        zip:this.zipcode
                    });

                    axios.post(`/registerContact/${userId}`, {
                        landline: this.landline,
                        mobile: this.mobile,
                        email:this.email
                    });

                    Inertia.visit('/');
        
        
        
                } else {
                console.error('User ID not found in response');
                }
            } catch (error) {
                console.error('Login failed:', error);
            }

        }




    },
    mounted() {
        axios.get('/countries')
        .then(response=> {
            console.log(response.data);
            this.countries=response.data;
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