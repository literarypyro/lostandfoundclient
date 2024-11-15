<template>
    <div>
        <label></label>
        <input type="text" />
    </div>
    <div>
        <label></label>
        <input type="text" />
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
        SearchItem,
        ItemList,
        RetrieveItem,
    },
    methods: {
        loginUser: function(){
            


        },


    }

}

</script>
<style>




</style>