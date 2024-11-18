<template>
    <div>
        <template v-if="formStep===1">
            
    
    
        </template>
        <template v-else-if="formStep===2">
    
    
            
        </template>
        <template v-else-if="formStep===3">
    
    
            
        </template>
        <template v-else>
    
    
            
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
        RequestList,
        RetrieveRequest,
    },
    data: {
        formStep: 1,

    }


}

    
    
    
    
</script>
<style>
    
    
    
    
    
    
    
    </style>