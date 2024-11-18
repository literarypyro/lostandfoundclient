<template>
<div>
<div>
<SearchItem />
</div>
<div>
    <ItemList />
</div>

</div>
<div>
<RetrieveItem />
</div>

</template>
<script>
import SearchItem from '@components/SearchItem.vue';
import ItemList from '@components/RequestList.vue';
import RetrieveItem from '@components/RetrieveRequest.vue';


export default {
    props: {
        requests:Array,
        requestedId:String,
    },
    components: {
        SearchItem,
        ItemList,
        RetrieveItem,
    }
}


</script>
<style>




</style>