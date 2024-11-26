<template>
  <div class="product-container">
          <HeaderBar
    title="Popular Product"
    paddingTop="10px"
    paddingBottom="0px"/>
    <div class="product">

        <CardProduct 
          v-for="product in products" 
          :key="product.id" 
          :promotionAsPercentage="product.promotionAsPercentage" 
          :image="product.image" 
          :name="product.name" 
          :rating="product.rating" 
          :size="product.size" 
          :price="product.price" 
        />
      </div>
  </div>
  </template>
  
  <script>
  import { ref, onMounted } from 'vue';
  import axios from 'axios';
  import CardProduct from '@/components/CardProduct.vue';
import HeaderBar from '@/components/HeaderBar.vue';
  
  export default {
    name: 'Product',
    components: { CardProduct, HeaderBar },
    setup() {
      const products = ref([]);
  
      const fetchProducts = async () => {
        try {
          const response = await axios.get('http://localhost:3000/api/products'); 
          products.value = response.data; 
        } catch (error) {
          console.error('Error loading products:', error);
        }
      };
  
      onMounted(fetchProducts);
  
      return { products };
    },
  };
  </script>
  
  <style scoped>
  .product-container{
    display: flex;
    justify-content: center;
    flex-direction: column;
  }
  .product {
    display: flex;
    flex-wrap: wrap;
    padding-left: 7rem;
    padding-right: 7rem;
    justify-content: start;
    gap: 10px;
  }
  </style>
  
  
    <!-- data() {
        return {
          groupName: 'default-group',  Default group name
          categoryId: null,  Default category ID
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
      },  -->