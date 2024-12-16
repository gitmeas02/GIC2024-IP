<template>
  <div class="C-category">
    <HeaderBar
      :title="'Featured Products'"
      :ListBar="groups"
      @change-nav="updateCurrentGroup"
    />
    <div class="container">
      <CardCategory
        v-for="(category,index) in filteredCategories"
        :key="category.index"
        :id="category.id"
        :name="category.name"
        :productCount="category.productCount"
        :image="category.image"
        :color="category.color"
      />
    </div>
  </div>
</template>

<script>
import CardCategory from '@/components/CardCategory.vue';
import HeaderBar from '@/components/HeaderBar.vue';
import { mapState } from 'pinia';
import { useProductStore } from '@/stores/Product';

export default {
  components: { CardCategory, HeaderBar },
  setup() {
    const store = useProductStore();
    return { store };
  },
  data() {
    return {
      currentGroupName: "All" // Default to 'All' to show all categories initially
    };
  },
  computed: {
    ...mapState(useProductStore, {
      groups: "groups",
      categories: "categories"
    }),
    filteredCategories() {
      // Filter categories based on the selected group
      if (this.currentGroupName === "All") {
        return this.categories;
      }
      return this.categories.filter(
        (category) => category.group === this.currentGroupName
      );
    }
  },
  methods: {
    updateCurrentGroup(groupName) {
      this.currentGroupName = groupName; // Update the selected group
    }
  },
  async mounted() {
    await this.store.fetchCategories();
    await this.store.fetchGroups();
  }
};
</script>

<style>
.container {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
  justify-content: center; /* Center items on larger screens by default */
  align-items: center;
  padding: 20px;
}
.C-category {
  display: flex;
  justify-content: center;
  flex-direction: column;
}
</style>
