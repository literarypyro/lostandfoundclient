<template>

    <form @submit.prevent="loginUser">
    
    <div>
    
    <div>
        <label>Username</label>
        <input type="text" v-model="username" name="username" />
    </div>
    <div>
        <label>Password</label>
        <input type="password" v-model="password" name="password"/>
    </div>
    <button type="submit">Log In
    </button>

    </div>
    </form>

</template>
<script>

export default {
    props: {
        requests:Array,
        requestedId:String,
    },
    data(){
        return {
             
            username: '',
            password:'',
            reqId:''
        }
    },
    components: {

    },
    methods: {
        loginUser(){
            this.$inertia.post('/login',
            {
                username:this.username,        
                password:this.password,

            });
            
            /*
            .then(response=> {




            })
            .catch(error=>{
                console.error("Login failed",error);


            });
            */

        }
    },    
}
</script>
<style>




</style>