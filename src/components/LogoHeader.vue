<template>
      <div class="search-menu">
      <img src="../assets/logoShop.svg" alt="Logo" />
      <SearchBoxComponent />
      <div class="ACWC">
        <MenuItems label="Account" i="line-md:account" :reverse="false" />
        <MenuItems label="Compare" i="material-symbols-light:cached-rounded" :reverse="false"/>
        <MenuItems label="WishList" i="line-md:heart" :reverse="false"/>
        <MenuItems label="Cart" i="material-symbols:shopping-cart-outline-sharp" :reverse="false" />
      </div>
    </div>
</template>
<script>
import MenuItems from './MenuItems.vue';
import SearchBoxComponent from './SearchBoxComponent.vue';

export default{
    components:{
        MenuItems,SearchBoxComponent
    }
}
</script>
<style>
.ACWC{
    display:flex;
    gap:24px;
}
.search-menu{
    display: flex;
    justify-content: space-between;
    padding-left: 100px;
    padding-right: 107px;
    align-items: center;
}
</style>