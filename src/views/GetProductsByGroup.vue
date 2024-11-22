<template>
    <div>
      <h2>Products in Group {{ groupName }}</h2>
      <div class="products-list">
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
  import { useProductStore } from "@/stores/Product";
  import CardProduct from '@/components/CardProduct.vue';
  import { ref } from "vue";
  
  export default {
    name: "GetProductsByGroup",
    props: {
      groupName: String,
    },
    components: {
      CardProduct,
    },
    setup(props) {
      const store = useProductStore();
      const products = ref([]);
  
      const fetchProducts = async () => {
        await store.fetchProductsByGroup(props.groupName);
        products.value = store.products;
      };
  
      fetchProducts();
  
      return { products };
    },
  };
  </script>