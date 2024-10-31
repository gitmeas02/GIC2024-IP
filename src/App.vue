<template>
 <HeaderBar/>
<Category/>
<HeaderBar
        title="Popular Product"
        paddingTop="10px"
        paddingBottom="0px"/>
<Promotion/>
<Products/>
</template>
<script>
import Category from './views/Category.vue';
import HeaderBar from './views/HeaderBar.vue';
import Promotion from './views/Promotion.vue';
import Products from './views/Products.vue';
export default{
  components:{
    Category,Promotion,HeaderBar,Products
  }
}
</script>