<template>
      <Hero/>
      <Category />
      <Promotion />
      <Products />
  </template>
  <script>
  import Category from '@/components/Category.vue';
  import Promotion from '@/components/Promotion.vue';
  import Products from '@/components/Products.vue';
import Hero from '@/components/Hero.vue';
  export default {
    components: {
      Category,
      Promotion,
      Products,
      Hero
    }
  }
  </script>
  