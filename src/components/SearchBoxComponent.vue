<template>
  <div class="search-bar">
    <select v-model="selectedCategory" class="category-dropdown">
      <option value="All Categories">All Categories</option>
      <option>Category 1</option>
      <option>Category 2</option>
      <option>Category 3</option>
    </select>
    <input
      type="text"
      v-model="searchQuery"
      placeholder="Search for items"
      class="search-input"
    />
    <button @click="performSearch" class="search-button">
      <Icon icon="line-md:search" width="24" height="24" />
    </button>
  </div>
</template>

<script>
import {Icon} from '@iconify/vue'
export default {
  components:{
    Icon
  },
  data() {
    return {
      selectedCategory: "All Categories",
      searchQuery: "",
    };
  },
  methods: {
  performSearch() {
    console.log('Search initiated with query:', this.searchQuery);
    console.log('Selected Category:', this.selectedCategory);
  }
}
};
</script>
<style scoped>
.search-bar {
  display: flex;
  align-items: center;
  border: 1px solid #c9e8d4;
  border-radius: 4px;
  padding: 5px;
  width: 43%;
  margin: 0 auto;
}

.category-dropdown {
  border: none;
  background: none;
  font-size: 14px;
  margin-right: 10px;
  color: #333;
  padding: 5px 10px;
  cursor: pointer;
}

.search-input {
  flex-grow: 1;
  border: none;
  outline: none;
  font-size: 14px;
  padding: 5px;
  color: #333;
}

.search-button {
  background: none;
  border: none;
  cursor: pointer;
  font-size: 16px;
  margin-left: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.search-button i {
  font-size: 20px;
  color: #7e7e7e;
}

.search-button:focus,
.category-dropdown:focus,
.search-input:focus {
  border-color: #66cc66;
  outline: none;
}

.category-dropdown option {
  font-size: 14px;
}
</style>
