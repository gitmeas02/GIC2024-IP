
<template>
 <LogoHeader/>
 <NavHero/>
 <ProductDetailsComponent/>
</template>
<script>
import LogoHeader from '@/components/LogoHeader.vue';
import NavHero from '@/components/NavHero.vue';
import ProductDetailsComponent from '@/components/ProductDetailsComponent.vue';



export default{
    components:{
        NavHero,LogoHeader,ProductDetailsComponent
    }
}
</script>