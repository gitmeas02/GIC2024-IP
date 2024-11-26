import axios from "axios";
import { defineStore } from "pinia";

export const useProductStore = defineStore("product", {
  state: () => ({
    groups: [],
    promotions: [],
    categories: [],
    products: [],
  }),

  getters: {
    // Get all categories
    getAllCategories: (state) => {
      return state.categories;
    },

    // Get all products
    getAllProducts: (state) => {
      return state.products;
    },

    // Get popular products (products that have been sold more than 10 times)
    getPopularProducts: (state) => {
      return state.products.filter((product) => product.countSold > 10);
    },

    // Get products by category ID
    getProductsByCategory: (state) => {
      return (categoryId) => {
        return state.products.filter((product) => product.categoryId === categoryId);
      };
    },

    // Get products by group name
    getProductsByGroup: (state) => {
      return (groupName) => {
        return state.products.filter((product) => product.group === groupName);
      };
    },

    // Get categories by group name
    getCategoriesByGroup: (state) => {
      return (groupName) => {
        return state.categories.filter((category) => category.group === groupName);
      };
    },
  },

  actions: {
    // Fetch groups from the API
    async fetchGroup() {
      try {
        const response = await axios.get("http://localhost:3000/api/groups");
        this.groups = response.data;
      } catch (error) {
        console.error("Error fetching groups:", error);
      }
    },

    // Fetch categories from the API
    async fetchCategories() {
      try {
        const response = await axios.get("http://localhost:3000/api/categories");
        this.categories = response.data;
      } catch (error) {
        console.error("Error fetching categories:", error);
      }
    },

    // Fetch products from the API
    async fetchProducts() {
      try {
        const response = await axios.get("http://localhost:3000/api/products");
        this.products = response.data;
      } catch (error) {
        console.error("Error fetching products:", error);
      }
    },

    // Fetch promotions from the API
    async fetchPromotions() {
      try {
        const response = await axios.get("http://localhost:3000/api/promotions");
        this.promotions = response.data;
      } catch (error) {
        console.error("Error fetching promotions:", error);
      }
    },
  },
});
