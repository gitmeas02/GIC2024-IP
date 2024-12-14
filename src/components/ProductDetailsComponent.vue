<template>
  <div>
    <p v-if="loading">Loading product details...</p>
    <div v-else>
      <p>{{ product.name }}</p>
      <img :src="'http://localhost:3000/' + product.images[0]" alt="Product Image" />
      <p>Rating: {{ product.rating }}</p>
      <p>Size: {{ product.size }}g</p>
      <p>Price: ${{ product.price }}</p>
    </div>
  </div>
</template>

<script>

import { computed, onMounted } from 'vue';
import { useRoute } from 'vue-router';  // To access route parameters
import { useProductStore } from '@/stores/Product';
import axios from 'axios';
export default {
  name: "ProductDetails",
  setup() {
    const store = useProductStore();
    const route = useRoute();
    const productId = route.params.id;

    const product =computed(()=>{
      const foundProduct= store.products.find(product=> product.id==productId);
      if (foundProduct) {
        foundProduct.images = JSON.parse(foundProduct.image);
      }
      return foundProduct;
    });
    onMounted(()=>{
      if(store.products.length===0){
        axios.get('http://localhost:3000/api/products')
        .then(response=>{
          store.products.response.data;
        })
        .catch(error=>{
          console.error('Error fetching products:', error);
        });
      }
    });
    return {product};
    
  },
}
  
</script>
