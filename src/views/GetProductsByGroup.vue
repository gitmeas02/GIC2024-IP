<template>
 <div class="container-products">
  <div class="product-group">
  <CardProduct
    v-for="product in productsByGroup(currentGroupCategname)"
    :key="product.id"
    :name="product.name"
    :promotionAsPercentage="product.promotionAsPercentage"
    :image="product.image"
    :rating="product.rating"
    :size="product.size"
    :price="product.price"
    />
   </div>
 </div>
  <div class="container-category">
    <div class="categories-group">
    <CardCategory
      v-for="category in categoriesByGroup(currentGroupCategname)"
      :key="category.id"
      :name="category.name"
      :productCount="category.productCount"
      :image="category.image"
      :color="category.color"
      />
  </div>
  </div>

</template>
<style>
.container-products,
.container-category{
  display: flex;
  justify-content: start;
}
.categories-group,.product-group{
  display: flex;
  flex-wrap: wrap;
  padding-left: 7rem;
  padding-right: 7rem;
  justify-content: start;
  gap: 10px;
}
.container-category{
padding-top: 20px;
}
</style>
<script>
import CardCategory from "@/components/CardCategory.vue";
import CardProduct from "@/components/CardProduct.vue";
import { useProductStore } from "@/stores/Product";
import { mapState } from "pinia";
// import { computed, onMounted } from "vue";

export default {
  data() {
    return {
      currentGroupCategname: "Fruits", // Set initial group name
    };
  },
 components:{
 CardProduct,
 CardCategory
 },
  computed: {
    ...mapState(useProductStore, {
      productsByGroup(store) {
        return (groupName) => store.getProductsByGroup(groupName);
      },
      categoriesByGroup(store){
        return (groupName)=> store.getCategoriesByGroup(groupName);
      },
    }),
  },

  mounted() {
    const productStore = useProductStore();
    productStore.fetchCategories(); // Fetch categories when the component is mounted
    productStore.fetchProducts(); // Fetch products when the component is mounted
    productStore.fetchGroup(); // Fetch available groups (if applicable)
  },
};
</script>

