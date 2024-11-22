<template>
    <div>
      <h2>Categories in {{ groupName }}</h2>
      <ul>
        <li v-for="category in categories" :key="category.id">{{ category.name }}</li>
      </ul>
    </div>
  </template>
  
  <script>
  import { useProductStore } from "@/stores/Product";
  import { ref } from "vue";
  
  export default {
    name: "GetCategoriesByGroup",
    props: {
      groupName: String,
    },
    setup(props) {
      const store = useProductStore();
      const categories = ref([]);
  
      const fetchCategories = async () => {
        await store.fetchCategoryByGroup(props.groupName);
        categories.value = store.categories;
      };
  
      fetchCategories();
  
      return { categories };
    },
  };
  </script>