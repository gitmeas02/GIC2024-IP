<template>
    <div>
      <h1>Categories by Group: {{ groupName }}</h1>
      <ul>
        <li v-for="category in getCategoryByGroup" :key="category.id">
          {{ category.name }}
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  import { useProductStore } from '@/stores/Product';
  
  export default {
    data() {
      return {
        groupName: 'fruits', // Can be dynamic
      };
    },
    computed: {
      getCategoryByGroup() {
        const store = useProductStore();
        return store.getCategoriesByGroup(this.groupName);
      },
    },
    mounted() {
      const store = useProductStore();
      store.fetchCategories();
    },
  };
  </script>
  