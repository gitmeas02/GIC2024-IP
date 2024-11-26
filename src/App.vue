<template>
  <div>
    <HeaderBar/>
    <Category />
    
    <Promotion />
    <HeaderBar 
    title="Popular Product"
    paddingTop="10px"
    paddingBottom="0px"/>
    <Products />
    <GetCategoriesByGroup/>
    <GetProductsByGroup/>
    <GetPopularProductsByCountSold/>
    <GetProductsByCategoryId/>
  </div>
</template>

<script>
import HeaderBar from './views/HeaderBar.vue';
import Category from './views/Category.vue';
import Promotion from './views/Promotion.vue';
import Products from './views/Products.vue';
import GetCategoriesByGroup from './views/GetCategoriesByGroup.vue';
import GetPopularProductsByCountSold from './views/GetPopularProductsByCountSold.vue';
import GetProductsByCategoryId from './views/GetProductsByCategoryId.vue';
import GetProductsByGroup from './views/GetProductsByGroup.vue';

export default {
  components: {
    HeaderBar,
    Category,
    Promotion,
    Products,
    GetCategoriesByGroup,
    GetProductsByGroup,
    GetPopularProductsByCountSold,
    GetProductsByCategoryId
    
  }
}
</script>
