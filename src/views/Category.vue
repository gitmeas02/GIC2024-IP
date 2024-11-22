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
import { useProductStore } from "../stores/Product";
import { mapState } from "pinia";
export default {
  components: { CardCategory },

  // setup() {
  //   const categories = ref([]);
  //   const fetchCategories = async () => {
  //     try {
  //       const response = await axios.get('http://localhost:3000/api/categories');
  //       categories.value = response.data;
  //     } catch (error) {
  //       console.error('Error fetching categories:', error);
  //     }
  //   };

  //   onMounted(fetchCategories); // Fetch categories when the component is mounted

  //   return { categories };
  // },
  data() {
    return {
      currentGroupname: "A",
    };
  },
  methods: {},
  mounted() {
    const productStore = useProductStore();
    productStore.fetchCategories();
  },
  computed: {
    ...mapState(useProductStore, {
      categories(store) {
        return store.getCategoriesByGroup(this.currentGroupname);
      },
    }),
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