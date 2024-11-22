<template>
  <div class="product-page">
    <h1>Products</h1>

    <!-- Categories Section -->
    <div class="categories">
      <h2>Categories</h2>
      <ul>
        <li 
          v-for="category in categories" 
          :key="category.id" 
          @click="fetchProductsByCategory(category.id)"
        >
          {{ category.name }}
        </li>
      </ul>
    </div>

    <!-- Product List Section -->
    <div class="products">
      <h2>Products</h2>
      <div class="product-grid">
        <CardProduct 
          v-for="product in products" 
          :key="product.id" 
          :promotionAsPercentage="product.promotionAsPercentage" 
          :image="product.images" 
          :name="product.name" 
          :rating="product.rating" 
          :size="product.size" 
          :price="product.price" 
        />
      </div>
    </div>

    <!-- Popular Products Section -->
    <div class="popular-products">
      <h2>Popular Products</h2>
      <div class="product-grid">
        <CardProduct
          v-for="product in products" 
          :key="product.id" 
          :promotionAsPercentage="product.promotionAsPercentage" 
          :image="product.images" 
          :name="product.name" 
          :rating="product.rating" 
          :size="product.size" 
          :price="product.price" 
        />
      </div>
    </div>
  </div>
</template>

<script>
import CardProduct from '@/components/CardProduct.vue';
import { useProductStore } from '@/stores/Product';
import { defineComponent, onMounted } from 'vue';

export default defineComponent({
  name: 'Product',
  components: { CardProduct },
  data() {
    return {
      groupName: 'default-group', // Default group name
      categoryId: null, // Default category ID
    };
  },
  computed: {
    categories() {
      return this.productStore.getCategoriesByGroup(this.groupName);
    },
    products() {
      if (this.categoryId) {
        return this.productStore.getProductsByCategory(this.categoryId);
      }
      return this.productStore.getProductsByGroup(this.groupName);
    },
    popularProducts() {
      return this.productStore.getPopularProducts();
    },
  },
  methods: {
    async fetchCategories() {
      await this.productStore.fetchCategories();
    },
    async fetchProducts() {
      await this.productStore.fetchProducts();
    },
    async fetchProductsByCategory(categoryId) {
      this.categoryId = categoryId;
    },
  },
  mounted() {
    this.fetchCategories();
    this.fetchProducts();
  },
  setup() {
    const productStore = useProductStore();
    onMounted(() => {
      productStore.fetchGroups();
      productStore.fetchPromotions();
    });

    return { productStore };
  },
});
</script>

<style>
.product-page {
  margin: 20px;
}
.categories ul {
  list-style: none;
  padding: 0;
}
.product-grid {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 20px;
}
</style>

<!-- setup() {
   const products = ref([]);
  
   const fetchProducts = async () => {
     try {
       const response = await axios.get('http:localhost:3000/api/products');
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

   onMounted(fetchProducts);  Fetch products when the component is mounted

   return { products };  Return products to the template
}, -->