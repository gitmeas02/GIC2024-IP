import { defineStore } from 'pinia';
import axios from 'axios';

export const useProductStore = defineStore('Product', {
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
    getProductsByCategoryId: (state) => {
      return (categoryId) =>
        state.products.filter((product) => product.categoryId === categoryId);
    },
    getPopularProductsByCountSold: (state) => {
      return state.products.filter((product) => product.countSold > 10);
    },
  },
  actions: {
    fetchCategory() {
      axios
        .get('http://localhost:3000/api/categories')
        .then((response) => {
          console.log(response.data);
          this.categories = response.data;
        })
        .catch((error) => {
          console.error('Error fetching categories:', error);
        });
    },
    fetchPromotion() {
      axios
        .get('http://localhost:3000/api/promotions')
        .then((response) => {
          console.log(response.data);
          this.promotions = response.data;
        })
        .catch((error) => {
          console.error('Error fetching promotions:', error);
        });
    },
    fetchGroup() {
      axios
        .get('http://localhost:3000/api/groups')
        .then((response) => {
          console.log(response.data);
          this.groups = response.data;
        })
        .catch((error) => {
          console.error('Error fetching groups:', error);
        });
    },
    fetchProduct() {
      axios
        .get('http://localhost:3000/api/products')
        .then((response) => {
          console.log(response.data);
          this.products = response.data;
        })
        .catch((error) => {
          console.error('Error fetching products:', error);
        });
    },
  },
});
