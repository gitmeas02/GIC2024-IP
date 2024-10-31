<template>
<div class="P-con">
  <div class="main">
      <CardPromotion
        v-for="promotion in promotions"
        :key="promotion.id"
        :description="promotion.description"
        :image="promotion.image"
        :button="promotion.button"
        :backgroundColor="promotion.backgroundColor"
      />
    </div>
</div>
  </template>
    <script>
    import { ref} from 'vue';
    import CardPromotion from '../components/CardPromotion.vue'
    export default {
        components: {CardPromotion},
        setup(){
     const promotions=ref([
    {id:1,description: 'Make your Breakfast Healthy and Easy',button: 'Shop Now',image:'./src/assets/images/BattleStrawberry.svg', backgroundColor:'#F3E8E8'},
    {id:2,description: 'Everyday Fresh & Clean with Our Products',button: 'Shop Now',image:'./src/assets/images/Onion.svg',backgroundColor:'#F0E8D5'},
    {id:3,description: 'The best Organic Products Online',button: 'Shop Now',image:'./src/assets/images/Vegetables2.svg',backgroundColor:'#E7EAF3'},
        ]);
        return {promotions};
            },
        }

</script>


    <style>

   
     @import url('https://fonts.googleapis.com/css2?family=Itim&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap'); 
     .main{
         display: flex;
         width: auto;
         flex-wrap: wrap;
         gap: 12px;
         padding-top: 20px;
         padding:20px;
         justify-content: start;
     }
     .P-con{
      display: flex;
      justify-content: center;
     }
    </style>