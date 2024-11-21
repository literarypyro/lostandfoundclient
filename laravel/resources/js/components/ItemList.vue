<template>
<div>sss
    <div v-for="item in items" :key="item.id"></div>
    <div>{{ request["category"].type }}</div>
    <div @click="retrieveRequest(request.id)">{{ request.description }}</div>
    <div>{{ request.request_date_label }}</div>
    <div>
        <div>Requested By: {{ request["user_info"]["name"] }}</div>
        <div>{{ request["latest_status"]["status"]["type"] }}</div>

    </div>
</div>
</template>
<script>

import axios from 'axios';

export default {
    props: {
        requestid:String

    },
    data(){
        return {
            item:null
        };
    },
    mounted() {
        axios.get('/items/{$this.requestedId}')
        .then(response=> {
            this.item=response.data;
        })
        .catch(error=>{ console.error(error)});
    },

}

</script>

<style>




</style>




