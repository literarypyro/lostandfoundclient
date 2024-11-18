<template>
<div>
    <template v-if="formStep===1">
        <div><label>Username</label><div></div></div>
        <div><label>Password</label><div></div></div>
        <div><label>Confirm Password</label><div></div></div>

        <button @click='goForward'>Next</button>

    </template>
    <template v-else-if="formStep===2">
        <div><label>First Name</label><div></div></div>
        <div><label>Last Name</label><div></div></div>
        <div><label>Age</label><div></div></div>
        <div><label>Sex</label><div></div></div>
        <div><label>Civil Status</label><div></div></div>

        <button @click='goBack'>Previous</button>
        <button @click='goForward'>Next</button>


    </template>
    <template v-else-if="formStep===3">
        <div><label>Unit</label><div></div></div>
        <div><label>Street Address</label><div></div></div>
        <div><label>City</label><div></div></div>
        <div><label>Province</label><div></div></div>
        <div><label>Country</label><div></div></div>
        
        <button @click='goBack'>Previous</button>
        <button @click='goForward'>Next</button>



    </template>
    <template v-else-if="formStep===4">
        <div><label>Work Phone</label><div></div></div>
        <div><label>Home Phone</label><div></div></div>
        <div><label>Email</label><div></div></div>
        
        <button @click='goBack'>Previous</button>
        <button @click='goForward'>Next</button>

    </template>
    <template v-else>
           dsadfd 
        <button @click='goBack'>Previous</button>
        <button @click=''>Submit</button>


        
    </template>




</div>
</template>
<script>



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
        }    
    },
    methods: {
        goForward(){
            this.formStep++;

        },
        goBack(){
            this.formStep--;
        }

    }
}

    
    
    
    
</script>
<style>
    
    
    
    
    
    
    
    </style>