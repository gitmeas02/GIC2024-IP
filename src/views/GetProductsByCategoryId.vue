<template>
    <div>
      <h1>Products by Category ID: {{ categoryId }}</h1>
      <ul>
        <li v-for="product in getProductsByCategoryId(categoryId)" :key="product.id">
          {{ product.name }} - Price: ${{ product.price }}
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  import { useProductStore } from '@/stores/Product';
  
  export default {
    data() {
      return {
        categoryId: 1, // You can change the category ID dynamically
      };
    },
    computed: {
      getProductsByCategoryId() {
        const store = useProductStore();
        return store.getProductsByCategoryId;
      },
    },
    mounted() {
      const store = useProductStore();
      store.fetchProducts();
    },
  };
  </script>
  