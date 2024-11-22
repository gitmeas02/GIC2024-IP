import axios from 'axios';
import { defineStore } from 'pinia';

export const useProductStore = defineStore('Product', {
  state: () => ({
    groups: [], // List of all groups
    promotions: [], // List of promotions
    categories: [], // List of categories
    products: [], // List of products
  }),
  getters: {
    // Get all categories by a specific group name
    getCategoriesByGroup: (state) => (groupName) => {
      return state.categories.filter((category) => category.groupName === groupName);
    },
    // Get all products by a specific group name
    getProductsByGroup: (state) => (groupName) => {
      return state.products.filter((product) => product.groupName === groupName);
    },
    // Get all products by a specific category ID
    getProductsByCategory: (state) => (categoryId) => {
      return state.products.filter((product) => product.categoryId === categoryId);
    },
    // Get popular products with countSold > 10
    getPopularProducts: (state) => {
      return state.products.filter((product) => product.countSold > 10);
    },
  },
  actions: {
    // Fetch all groups
    async fetchGroups() {
      try {
        const response = await axios.get('http://localhost:3000/api/groups'); // Replace with your API URL
        this.groups = response.data;
      } catch (error) {
        console.error('Error fetching groups:', error);
      }
    },
    // Fetch all categories
    async fetchCategories() {
      try {
        const response = await axios.get('http://localhost:3000/api/categories'); // Replace with your API URL
        this.categories = response.data;
      } catch (error) {
        console.error('Error fetching categories:', error);
      }
    },
    // Fetch all products
    async fetchProducts() {
      try {
        const response = await axios.get('http://localhost:3000/api/products'); // Replace with your API URL
        this.products = response.data;
      } catch (error) {
        console.error('Error fetching products:', error);
      }
    },
    // Fetch products by a specific group name
    async fetchProductsByGroup(groupName) {
      try {
        const response = await axios.get(`http://localhost:3000/api/products`); // Replace with your API URL
        this.products = response.data;
      } catch (error) {
        console.error('Error fetching products by group:', error);
      }
    },
    // Fetch promotions
    async fetchPromotions() {
      try {
        const response = await axios.get('http://localhost:3000/api/promotions'); // Replace with your API URL
        this.promotions = response.data;
      } catch (error) {
        console.error('Error fetching promotions:', error);
      }
    },
  },
});