<template>
  <div class="product-container">
    <HeaderBar
      :title="'Popular Products'"
      :ListBar="groups"
      @change-nav="updateCurrentGroup"
    />
    <div class="product">
      <CardProduct
        v-for="(product,index) in filteredProducts"
        :key="product.index"
        :id="product.id"
        :promotionAsPercentage="product.promotionAsPercentage"
        :image="product.image"
        :name="product.name"
        :rating="product.rating"
        :size="product.size"
        :price="product.price"
      />
    </div>
  </div>
</template>

<script>
import CardProduct from "@/components/CardProduct.vue";
import HeaderBar from "@/components/HeaderBar.vue";
import { useProductStore } from "@/stores/Product";
import { mapState } from "pinia";

export default {
  name: "Product",
  components: { CardProduct, HeaderBar },
  setup() {
    const store = useProductStore();
    return { store };
  },
  data() {
    return {
      currentGroupName: "All", // Default group to display all products
    };
  },
  computed: {
    ...mapState(useProductStore, {
      groups: "groups",
      products: "products",
    }),
    filteredProducts() {
      return this.currentGroupName === "All"
        ? this.products
        : this.products.filter(
            (product) => product.group === this.currentGroupName
          );
    },
  },
  methods: {
    updateCurrentGroup(groupName) {
      this.currentGroupName = groupName;
    },
  },
  async mounted() {
    await this.store.fetchProducts();
    await this.store.fetchGroups();
  },
};
</script>

<style scoped>
.product-container{
  display: flex;
  justify-content: center;
  flex-direction: column;
  padding-bottom: 7rem;
}
.product {
  display: flex;
  flex-wrap: wrap;
  padding-left: 7rem;
  padding-right: 7rem;
  justify-content: start;
  gap: 10px;
}
</style>