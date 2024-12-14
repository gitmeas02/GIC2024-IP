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
import { ref, computed, onMounted } from "vue";
import { useRoute } from "vue-router";
import { useProductStore } from "@/stores/Product";
import axios from "axios";

export default {
  name: "ProductDetails",
  setup() {
    const store = useProductStore();
    const route = useRoute();
    const productId = route.params.id;
    const loading = ref(true);

    const product = computed(() => {
      const foundProduct = store.products.find((product) => product.id == productId);
      if (foundProduct) {
        foundProduct.images = JSON.parse(foundProduct.image);
      }
      return foundProduct;
    });

    onMounted(() => {
      if (store.products.length === 0) {
        axios
          .get("http://localhost:3000/api/products")
          .then((response) => {
            store.products = response.data;
          })
          .catch((error) => {
            console.error("Error fetching products:", error);
          });
      } else if (!product.value) {
        axios
          .get(`http://localhost:3000/api/products/${productId}`)
          .then((response) => {
            const fetchedProduct = response.data;
            fetchedProduct.images = JSON.parse(fetchedProduct.image);
            store.products.push(fetchedProduct);
          })
          .catch((error) => {
            console.error("Error fetching product:", error);
          });
      }

      // Simulate 3-minute loading delay
      setTimeout(() => {
        loading.value = false;
      }, 180); // 3 minutes in milliseconds
    });

    return { product, loading };
  },
};
</script>
