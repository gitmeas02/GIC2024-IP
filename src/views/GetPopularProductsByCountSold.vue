<template>
    <div>
      <h1>Popular Products</h1>
      <ul>
        <li v-for="product in popularProducts" :key="product.id">
          {{ product.name }} - Sold: {{ product.countSold }}
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  import { useProductStore } from '@/stores/Product';
  
  export default {
    computed: {
      popularProducts() {
        const store = useProductStore();
        return store.getPopularProductsByCountSold;
      },
    },
    mounted() {
      const store = useProductStore();
      store.fetchProducts();
    },
  };
  </script>
  