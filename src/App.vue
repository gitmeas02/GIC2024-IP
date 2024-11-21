<template>
  <div>
    <HeaderBar/>
    <HeaderBar 
    title="Popular Product"
    paddingTop="10px"
    paddingBottom="0px"/>
    <Category />
    <Promotion />
    <Products />
    <GetProductsByGroup />
    <GetProductsByCategoryId />
    <GetPopularProductsByCountSold />
    <GetCategoriesByGroup />
  </div>
</template>

<script>
import HeaderBar from './views/HeaderBar.vue';
import Category from './views/Category.vue';
import Promotion from './views/Promotion.vue';
import Products from './views/Products.vue';
import GetProductsByGroup from './views/GetProductsByGroup.vue'
import GetProductsByCategoryId from './views/GetProductsByCategoryId.vue';
import GetPopularProductsByCountSold from './views/GetPopularProductsByCountSold.vue';
import GetCategoriesByGroup from './views/GetCategoriesByGroup.vue';

export default {
  components: {
    HeaderBar,
    Category,
    Promotion,
    Products,
    GetProductsByGroup,
    GetProductsByCategoryId,
    GetPopularProductsByCountSold,
    GetCategoriesByGroup,
  }
}
</script>
