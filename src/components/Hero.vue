<template>
    <LogoHeader/>
    <NavHero/>
    <BannerHero/>
  </template>
  <script>
  import BannerHero from "./BannerHero.vue";
import LogoHeader from "./LogoHeader.vue";

import NavHero from "./NavHero.vue";

  
  export default {
    name: "SearchMenu",
    components: {
     NavHero,LogoHeader,BannerHero
    },
  };
  </script>
<style scoped>

</style>