<template>
  <div>
    <h2>Popular Products</h2>
    <div class="popular-products">
      <CardProduct
        v-for="product in popularProducts"
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
  name: "GetPopularProductsByCountSold",
  components: {
    CardProduct,
  },
  setup() {
    const store = useProductStore();
    const popularProducts = ref([]);

    const fetchPopularProducts = async () => {
      await store.fetchPopularProducts();
      popularProducts.value = store.popularProducts;
    };

    fetchPopularProducts();

    return { popularProducts };
  },
};
</script>
