<template>
<div>
    <template v-if="formStep===1">
        <div><label>Username</label><div><input type='text' v-model="username" id="username" /></div><span id='userverification' style="color:red;"></span></div>
        <div><label>Password</label><div><input type='password' v-model="password" id="pass" /></div></div>
        <div><label>Confirm Password</label><div><input type='password' v-model="confirmpass" id="confirmpass" /></div></div>

        <button @click='goForward'>Next</button>

    </template>
    <template v-else-if="formStep===2">
        <div><label>First Name</label><div><input type='text' v-model="firstname" id="firstname" /></div></div>
        <div><label>Middle Name</label><div><input type='text' v-model="middlename" id="middlename" /></div></div>
 
        <div><label>Last Name</label><div><input type='text' v-model="lastname" id="lastname" /></div></div>
        <div><label>Age</label><div><input type='text' v-model="age" id="age" /></div></div>
        <div><label>Sex</label><div>
            
            
            <select v-model="sex" id="sex">
                <option value="M">Male</option>
                <option value="F">Female</option>
                <option value="NB">Non-Binary</option>
            </select>
        </div></div>
        <div><label>Civil Status</label><div>
            
            
            
            <select v-model="status" id="status" >
                <option value="S">Single</option>
                <option value="M">Married</option>
                <option value="A">Annuled</option>
                <option value="SE">Separated</option>
                <option value="CL">Common Law/Live In</option>
                <option value="W">Widow</option>

                </select>
        
        
        
        
        </div></div>

        <button @click='goBack'>Previous</button>
        <button @click='goForward'>Next</button>


    </template>
    <template v-else-if="formStep===3">
        <div><label>Unit</label><div><input type='text' v-model="unit" id="unit" /></div></div>
        <div><label>Street Address</label><div><input type='text' v-model="street" id="street" /></div></div>
        <div><label>City</label><div><input type='text' v-model="city" id="city" /></div></div>
        <div><label>Province</label><div><input type='text' v-model="province" id="province" /></div></div>
        <div><label>Country</label>
        <div>

            <select id="country"
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
        <div><label>Zip Code</label><div><input type='text' v-model="zipcode" id="zipcode" /></div></div>
        
        <button @click='goBack'>Previous</button>
        <button @click='goForward'>Next</button>



    </template>
    <template v-else-if="formStep===4">
        <div><label>Home Phone</label>
            <div><input type='text' v-model="landline" id="landline" /></div>
        </div>
        <div><label>Mobile Phone</label>
            <div><input type='text' v-model="mobile" id="mobile" /></div>
        </div>

        <div><label>Email</label>
            <div><input type='text' v-model="email" id="email" /></div>
        </div>
        
        <button @click='goBack'>Previous</button>
        <button @click='goForward'>Next</button>

    </template>
    <template v-else>
           dsadfd 
        <button @click='goBack'>Previous</button>
        <button @click='registerUser'>Submit</button>


        
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