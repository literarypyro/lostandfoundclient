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
import SearchItem from '/@Components/SearchItem.vue';
import ItemList from '/@Components/RequestList.vue';
import RetrieveItem from '/@Components/RetrieveRequest.vue';


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