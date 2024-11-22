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
    getCategoriesByGroup: (state) => {
      return (groupName) =>
        state.categories.filter((category) => category.group === groupName);
    },

    getProductsByGroup: (state) => {
      return (groupName) =>
        state.products.filter((product) => product.group === groupName);
    },
    getProductsByCategory: (state) => {
      return (categoryId) =>
        state.products.filter((product) => product.categoryId === categoryId);
    },

  getPopularProducts: (state) => {
    const popular = () => state.products.filter((product) => product.countSold > 10);
    return popular;
  }


  },

  actions: {
    async fetchGroup() {
   
      try {
        const response = await axios.get("http://localhost:3000/api/groups");
        this.groups = response.data;
      } catch (error) {
        console.error("Error fetching groups:");
      }
    },

    async fetchCategories() {
    
      try {
        const response = await axios.get(
          "http://localhost:3000/api/categories"
        );
        this.categories = response.data;
      } catch (error) {
        console.error("Error fetching categories:", error);
      }
    },

    async fetchProducts() {
      
      try {
        const response = await axios.get("http://localhost:3000/api/products");
        this.products = response.data;
      } catch (error) {
        console.error("Error fetching products:", error);
      }
    },

    async fetchPromotions() {
     
      try {
        const response = await axios.get(
          "http://localhost:3000/api/promotions"
        );
        this.promotions = response.data;
      } catch (error) {
        console.error("Error fetching promotions:", error);
      }
    },
  },
});