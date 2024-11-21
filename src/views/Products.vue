<template>
  <div class="s">
    <div class="products-container">
      <CardProduct
        v-for="product in products"
        :key="product.id"
        :promotionAsPercentage="product.promotionAsPercentage"
        :name="product.name"
        :image="product.image"
        :rating="product.rating"
        :size="product.size"
        :price="product.price"
      />
    </div>
  </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import CardProduct from '../components/CardProduct.vue';
import axios from 'axios';

export default {
  name: 'Products',
  components: {
    CardProduct,
  },
  setup() {
    const products = ref([]);
    
    const fetchProducts = async () => {
      try {
        const response = await axios.get('http://localhost:3000/api/products');
        products.value = response.data.map((product) => ({
          id: product.id,
          name: product.name,
          rating: product.rating,
          size: product.size,
          image: product.image,
          price: product.price,
          promotionAsPercentage: product.promotionAsPercentage,
        }));
      } catch (error) {
        console.error('Error loading products:', error);
      }
    };

    onMounted(fetchProducts); // Fetch products when the component is mounted

    return { products }; // Return products to the template
  },
};
</script>

<style>
.products-container {
  display: grid;
  grid-template-columns: repeat(5, 1fr); /* Create 5 equal columns */
  gap: 12px; /* Gap between the grid items */
  justify-content: start; /* Align items to the start */
  padding: 22px; /* Padding around the grid */
}

.s {
  display: flex;
  justify-content: center;
  width: 100%;
}

@media (max-width: 1224px) {
  .products-container {
    grid-template-columns: repeat(4, 1fr);
  }
}

@media (max-width: 1010px) {
  .products-container {
    grid-template-columns: repeat(3, 1fr);
  }
}

@media (max-width: 800px) {
  .products-container {
    grid-template-columns: repeat(2, 1fr);
  }
}
@media (max-width: 600px) {
  .products-container {
    grid-template-columns: repeat(1, 1fr);
  }
}
</style> 
