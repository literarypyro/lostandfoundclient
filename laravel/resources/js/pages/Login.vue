<template>
    <div>
        <label>Username</label>
        <input type="text" />
    </div>
    <div>
        <label>Password</label>
        <input type="password" />
    </div>
    <button @click="loginUser">Log In
    </button>
</template>
<script>
export default {
    props: {
        requests:Array,
        requestedId:String,
    },
    components: {

    },
    methods: {
        loginUser: function(){
            


        },


    }

}

</script>
<style>




</style>