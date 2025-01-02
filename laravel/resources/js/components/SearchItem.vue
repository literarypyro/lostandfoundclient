<template>
    <div class="bg-white rounded-xl shadow-lg p-6 max-w-4xl mx-auto">
      <div class="grid grid-cols-4 gap-6">
        <!-- Search Date -->
        <div class="space-y-2">
          <label class="block text-gray-700 font-medium text-sm">
            Search Date
          </label>
          <Datepicker
            v-model="searchDate"
            format="dd MMM yyyy"
            :clearable="false"
            inputClassName="w-full p-2.5 rounded-lg border border-gray-200 focus:ring-2 focus:ring-[#002D74] focus:border-[#002D74] bg-gray-50 text-sm text-gray-700"
          />
        </div>
  
  
        <!-- Search By -->
        <div class="space-y-2">
          <label class="block text-gray-700 font-medium text-sm">
            Search By
          </label>
          <select
            v-model="searchClass"
            class="w-full p-2.5 rounded-lg border border-gray-200 focus:ring-2
                   focus:ring-[#002D74] focus:border-[#002D74] bg-gray-50
                   text-sm text-gray-700"
          >
            <option value="itemname">Item Description</option>
            <option value="category">Category</option>
          </select>
        </div>
  
  
        <!-- Search Term -->
        <div class="space-y-2">
          <label class="block text-gray-700 font-medium text-sm">
            Search Term
          </label>
          <input
            v-model="searchWord"
            type="text"
            class="w-full p-2.5 rounded-lg border border-gray-200 focus:ring-2
                   focus:ring-[#002D74] focus:border-[#002D74] bg-gray-50
                   text-sm text-gray-700"
          />
        </div>
  
  
        <!-- Search Button -->
        <div class="flex items-end">
          <button
            @click="searchItemList"
            type="submit"
            class="w-full px-6 py-2.5 bg-[#002D74] text-white rounded-lg
                   hover:bg-[#206ab1] transition-all duration-200 flex
                   items-center justify-center space-x-2 text-sm"
          >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
              <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd" />
            </svg>
            <span>Search</span>
          </button>
        </div>
      </div>
    </div>
  </template>
  
  
  


<script>
import ItemList from '@components/ItemList.vue';
import RetrieveItem from '@components/RetrieveItem.vue';
import Datepicker from 'vuejs3-datepicker';
import { format } from 'date-fns';


export default {
  props: {
	items: Array,
	requestedId: String,
  },
  data() {
	return {
  	dateLost: "",
  	searchType: "",
  	searchTerm: "",
  	searchDate: null,
  	searchClass: "",
  	searchWord: "",
  	dateRange: "",
	}
  },
  components: {
	ItemList,
	RetrieveItem,
	Datepicker,
  },
  methods: {
	searchItemList() {
  	if (this.searchDate) {
    	var formattedDate = format(this.searchDate, "yyyy-MM-dd");
    	this.dateRange = formattedDate + " to " + formattedDate;


    	console.log("Date is " + formattedDate);
    	this.$emit('update:searchFromItems', {
      	dateLost: this.dateRange,
      	searchClass: this.searchClass,
      	searchTerm: this.searchWord,
    	});
  	}
	}
  }
}
</script>



<style>
/* Custom styles for vuejs3-datepicker */
.datepicker {
  font-family: inherit;
}


.datepicker-input {
  width: 100%;
  padding: 0.625rem;
  border-radius: 0.5rem;
  border: 1px solid #e5e7eb;
  background-color: #f9fafb;
}


.datepicker-input:focus {
  outline: none;
  border-color: #002D74;
  box-shadow: 0 0 0 2px rgba(0, 45, 116, 0.2);
}


.datepicker-calendar {
  border: 1px solid #e5e7eb;
  border-radius: 0.5rem;
  box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
}


.datepicker-header {
  background-color: #002D74;
  color: white;
  border-top-left-radius: 0.5rem;
  border-top-right-radius: 0.5rem;
}


.datepicker-day.selected {
  background-color: #002D74 !important;
  color: white;
}
</style>
