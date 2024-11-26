<template>
    <Category />
    <Promotion />
    <Products />
    <!-- <GetCategoriesByGroup/> -->
    <!-- <GetProductsByGroup/> -->
</template>

<script>
import Category from './views/Category.vue';
import Promotion from './views/Promotion.vue';
import Products from './views/Products.vue';
// import GetCategoriesByGroup from './views/GetCategoriesByGroup.vue';
// import GetProductsByGroup from './views/GetProductsByGroup.vue';

export default {
  components: {
    Category,
    Promotion,
    Products,
    // GetCategoriesByGroup,
    // GetProductsByGroup,
    
  }
}
</script>
