<template>
    <LogoHeader/>
    <NavHero/>
    <ListCategorieEmpty/>
</template>
<script>
import ListCategorieEmpty from '@/components/ListCategorieEmpty.vue';
import LogoHeader from '@/components/LogoHeader.vue';
import NavHero from '@/components/NavHero.vue';

export default{
    components:{
       ListCategorieEmpty,
       NavHero,LogoHeader,
    }
}
</script>