<template>
  <div>
    <Header></Header>
    <Body></Body>
    <Footer></Footer>
  </div>
</template>

<script>
import Header from "@/components/Header.vue"; 
import Footer from "@/components/Footer.vue"; 
import Body from "@/components/Body.vue"; 
export default {
  components: {
    Header,Footer,Body
  },
};
</script>

<style scoped>

</style>
