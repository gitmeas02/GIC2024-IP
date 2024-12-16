<template>
<div class="container-nav-hero">
<div class="Menu-Nav">
    <div class="All-Menu">
        <Icon icon="material-symbols-light:border-all-rounded" width="24" height="24" />
    <MenuItems label="Browse All Categories" :i="`material-symbols:keyboard-arrow-down`" :reverse="true"/>
   </div>
<MenuItems label="Home" :reverse="true"/>
<MenuItems label="Food" :i="`material-symbols:keyboard-arrow-down`" :reverse="true"/>
<MenuItems label="Vegetables" :i="`material-symbols:keyboard-arrow-down`" :reverse="true"/>
<MenuItems label="Drink" :reverse="true"/>
<MenuItems label="Cookies" :reverse="true"/>
<MenuItems label="Meat & Seafood" :i="`material-symbols:keyboard-arrow-down`" :reverse="true"/>
<MenuItems label="Bakery" :reverse="true"/>
</div>
 <div class="call">
    <MenuItems label="" :i="`uil:headphones`"/>
    <div class="call-phone">
        <p class="phone">086510091</p>
        <p><span>24/7</span>Support Center</p>
    </div>
 </div>
</div>
</template>
<script >
import { Icon } from '@iconify/vue';
import MenuItems from './MenuItems.vue';
export default{
    components:{
    MenuItems,Icon
    }
}
</script>
<style scoped>
.All-Menu{
    display: flex;
    align-items: center;
    background-color: #34a853;
    padding:  8px 13px;
    border-radius: 10px;
    color:white;
    gap: 4px;
}
.Menu-Nav{
 display: flex;
 align-items: center;
 gap:14px;
}
.call{
    gap: 10px;
    display: flex;
    align-items: center;
}
.call-phone p{
margin: 0;
}
.container-nav-hero{
    display: flex;
    justify-content: space-between;
   margin: 0px 107px;
   padding: 14px 0px;
}
</style>