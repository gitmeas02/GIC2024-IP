<template>
<div class="search-menu">
<img src="../assets/logoShop.svg" alt="">
<SearchBoxComponent/>
<div class="ACWC">
  <MenuItems/>
  <MenuItems/>
  <MenuItems/>
  <MenuItems/>
  </div>
</div>
</template>
<script>
import MenuItems from './MenuItems.vue';
import SearchBoxComponent from './SearchBoxComponent.vue';
import ShowCaseComponent from './ShowCaseComponent.vue';

export default{
    components:{
        MenuItems,
        SearchBoxComponent,
        ShowCaseComponent
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