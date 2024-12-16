<!-- <template>
  <div v-if="loading">
    <p>Loading...</p>
  </div>
  <div v-else-if="error">
    <p>{{ error }}</p>
  </div>
  <div v-else>
    <div class="image"> Background
      <img :src="BackgroundCategoryRight" alt="">
      <img :src="BackgroundCategoryLeft" alt="">
    </div>
    <h2>{{ category?.name }}</h2>
    <img :src="'http://localhost:3000/'+category?.image" alt="category name" />
    <p>Group: {{ category?.group }}</p>
    <p>Product Count: {{ category?.productCount }}</p>
   
  </div>
</template> -->

<template>
  <div class="breadcrumb-banner">
    <div class="content">
      <h1>{{ category?.group }}</h1>
      <nav class="breadcrumb">
        <span><router-link to="/">Home</router-link></span>
        <span> &gt; </span>
        <span><router-link to="/lists">Categories</router-link></span>
        <span> &gt; </span>
        <span>{{ category?.name }}</span>
      </nav>
      <img :src="'http://localhost:3000/'+category?.image" alt="category name" />
    </div>
  </div>
</template>




<style scoped>
.breadcrumb-banner {
  background-color: #d6f2e2; /* Light green background */
  margin:0px 107px;
  border-radius: 10px;
  position: relative;
  height: 235px;
  background-image: url('./src/assets/images/BackgroundCategoryRight.png'); /* Set the image as background */
  background-repeat: no-repeat;
  background-size: cover; /* Ensure the image covers the entire div */
  background-position: center; /* Center the background image */
}

.content {
  padding-top: 25px;
  padding-left: 45px;
  position: relative;
  z-index: 2; /* Keeps the content above the background */
}

h1 {
  font-size: 2rem;
  font-weight: bold;
  color: #1e1e2c;
  margin: 0 0 10px;
  font-family: "Quicksand";
}

.breadcrumb {
  font-size: 0.9rem;
  color: #6d6d6d;
  font-family: "Lato";
}

.breadcrumb a {
  text-decoration: none;
  color: #6d6d6d;
}

.breadcrumb a:hover {
  text-decoration: underline;
}

.breadcrumb span {
  margin: 0 5px;
}
</style>

<script>

import { ref, computed, onMounted } from "vue";
import { useRoute } from "vue-router";
import { useProductStore } from "@/stores/Product";
import axios from "axios";
import BackgroundCategoryLeft from '@/assets/images/BackgroundCategoryLeft.png'
import BackgroundCategoryRight from '@/assets/images/BackgroundCategoryRight.png'
export default {
  name: "CategoryDetails",
  data(){
  return {BackgroundCategoryLeft,BackgroundCategoryRight}
  },
  setup() {
    const store = useProductStore();
    const route = useRoute();
    const categoryId = route.params.id;
    const loading = ref(true);
    const error = ref(null);

    const category = computed(() => {
      return store.categories.find((cat) => cat.id == categoryId);
    });

    onMounted(() => {
      if (store.categories.length === 0) {
        axios
          .get("http://localhost:3000/api/categories")
          .then((response) => {
            store.categories = response.data;
            loading.value = false;
          })
          .catch((err) => {
            console.error("Error fetching categories:", err);
            error.value = "Failed to load categories.";
            loading.value = false;
          });
      } else if (!category.value) {
        axios
          .get(`http://localhost:3000/api/categories/${categoryId}`)
          .then((response) => {
            const fetchedCategory = response.data;
            store.categories.push(fetchedCategory);
            loading.value = false;
          })
          .catch((err) => {
            console.error("Error fetching category:", err);
            error.value = "Failed to load the category.";
            loading.value = false;
          });
      } else {
        loading.value = false;
      }
    });

    return { category, loading, error };
  },
};
</script>

