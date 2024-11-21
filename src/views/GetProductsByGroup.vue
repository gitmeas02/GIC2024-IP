<template>
    <div>
      <h1>Products by Group: {{ groupName }}</h1>
      <ul>
        <li v-for="product in productsByGroup" :key="product.id">
          {{ product.name }} - Sold: {{ product.countSold }}
        </li>
      </ul>
    </div>
  </template>
  
  <script>
  import { useProductStore } from '@/stores/Product';
  
  export default {
    data() {
      return {
        groupName: 'fruits', // You can change this dynamically
      };
    },
    computed: {
      productsByGroup() {
        const store = useProductStore();
        return store.getProductsByGroup(this.groupName);
      },
    },
    mounted() {
      const store = useProductStore();
      store.fetchProducts();
    },
  };
  </script>
  