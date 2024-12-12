<template>
 <div class="Menu-View-Page">
    <MenuSection/>
  <div>
    <RouterView/>
  </div>
 </div>
</template>
<script>
import MenuSection from "@/components/MenuSection.vue"; 
import {RouterView} from 'vue-router'
export default{
    components:{
        MenuSection,RouterView
    }
}

</script>
<style>
.Menu-View-Page{
display: flex;
align-items: center;
justify-content: space-around;
}
</style>