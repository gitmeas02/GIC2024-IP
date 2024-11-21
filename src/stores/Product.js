import { defineStore } from 'pinia';
import axios from 'axios';

export const useProductStore = defineStore('Product', {
  state: () => ({
    categories: [],
    products: [],
    groups: [],
    promotions: [],
  }),
  getters: {
    getCategoriesByGroup: (state) => (groupName) =>
      state.categories.filter(category => category.group === groupName),
    getProductsByCategoryId: (state) => (categoryId) =>
      state.products.filter(product => product.categoryId === categoryId),
    getProductsByGroup: (state) => (groupName) =>
      state.products.filter(product => product.group === groupName),
    getPopularProductsByCountSold: (state) =>
      state.products.filter(product => product.countSold > 10), // Example condition
  },
  actions: {
    fetchCategories() {
      axios.get('http://localhost:3000/api/categories')
        .then(response => {
          this.categories = response.data;
        })
        .catch(error => {
          console.error('Error fetching categories:', error);
        });
    },
    fetchProducts() {
      axios.get('http://localhost:3000/api/products')
        .then(response => {
          this.products = response.data;
        })
        .catch(error => {
          console.error('Error fetching products:', error);
        });
    },
    fetchGroups() {
      axios.get('http://localhost:3000/api/groups')
        .then(response => {
          this.groups = response.data;
        })
        .catch(error => {
          console.error('Error fetching groups:', error);
        });
    },
    fetchPromotions() {
      axios.get('http://localhost:3000/api/promotions')
        .then(response => {
          this.promotions = response.data;
        })
        .catch(error => {
          console.error('Error fetching promotions:', error);
        });
    },
  },
});
