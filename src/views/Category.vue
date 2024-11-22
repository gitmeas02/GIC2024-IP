<template>
  <div class="C-category">
    <div class="container">
      <CardCategory
        v-for="category in categories"
        :key="category.id"
        :name="category.name"
        :productCount="category.productCount"
        :image="category.image"
        :color="category.color"
      />
    </div>
  </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import axios from 'axios'; // Import Axios
import CardCategory from '../components/CardCategory.vue';

export default {
  components: { CardCategory },

  setup() {
    const categories = ref([]);
    const fetchCategories = async () => {
      try {
        const response = await axios.get('http://localhost:3000/api/categories');
        categories.value = response.data;
      } catch (error) {
        console.error('Error fetching categories:', error);
      }
    };

    onMounted(fetchCategories); // Fetch categories when the component is mounted

    return { categories };
  },
};
</script>

<style>
.container {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
  justify-content:start; /* Center items on larger screens by default */
  align-items: center;
  padding: 20px;
}
.C-category{
  display: flex;
  justify-content: center;
}

</style>