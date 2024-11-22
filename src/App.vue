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
  </div>
</template>

<script>
import HeaderBar from './views/HeaderBar.vue';
import Category from './views/Category.vue';
import Promotion from './views/Promotion.vue';
import Products from './views/Products.vue';

export default {
  components: {
    HeaderBar,
    Category,
    Promotion,
    Products,
  }
}
</script>