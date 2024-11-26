<template>
  <div>
    <!-- Dropdown or Select to choose the group -->
    <label for="groupSelect">Select Group:</label>
    <select v-model="currentGroupCategname" id="groupSelect">
      <option v-for="group in allGroups" :key="group.name" :value="group.name">{{ group.name }}</option>
    </select>

    <!-- Display Categories for the selected group -->
    <h1>Categories in Group {{ currentGroupCategname }}</h1>
    <ul>
      <li v-for="category in categoriesByGroup(currentGroupCategname)" :key="category.id">{{ category.name }}</li>
    </ul>

    <!-- Display Products in the selected group -->
    <h1>Products in Group {{ currentGroupCategname }}</h1>
    <ul>
      <li v-for="product in productsByGroup(currentGroupCategname)" :key="product.id">{{ product.name }}</li>
    </ul>

    <!-- Display Popular Products -->
    <h1>Popular Products</h1>
    <ul>
      <li v-for="product in popularProducts" :key="product.id">{{ product.name }}</li>
    </ul>

    <!-- Display Products by Category (Example: Category 1) -->
    <h1>Products in Category 1</h1>
    <ul>
      <li v-for="product in productsByCategory(1)" :key="product.id">{{ product.name }}</li>
    </ul>
  </div>
</template>

<script>
import { useProductStore } from "@/stores/Product";
import { mapState } from "pinia";
// import { computed, onMounted } from "vue";

export default {
  data() {
    return {
      currentGroupCategname: "Fruits", // Set initial group name
    };
  },

  computed: {
    ...mapState(useProductStore, {
      // Get all categories
      allCategories(store) {
        return store.getAllCategories;
      },

      // Get all products
      allProducts(store) {
        return store.getAllProducts;
      },

      // Get popular products (products with countSold > 10)
      popularProducts(store) {
        return store.getPopularProducts;
      },

      // Get products by category ID
      productsByCategory(store) {
        return (categoryId) => store.getProductsByCategory(categoryId);
      },

      // Get products by group name
      productsByGroup(store) {
        return (groupName) => store.getProductsByGroup(groupName);
      },

      // Get categories by group name
      categoriesByGroup(store) {
        return (groupName) => store.getCategoriesByGroup(groupName);
      },

      // Get all available groups (for the dropdown menu)
      allGroups(store) {
        return store.groups; // Assuming groups are fetched and stored in the store
      },
    }),
  },

  mounted() {
    const productStore = useProductStore();
    productStore.fetchCategories(); // Fetch categories when the component is mounted
    productStore.fetchProducts(); // Fetch products when the component is mounted
    productStore.fetchPromotions(); // Fetch promotions when the component is mounted
    productStore.fetchGroup(); // Fetch available groups (if applicable)
  },
};
</script>
