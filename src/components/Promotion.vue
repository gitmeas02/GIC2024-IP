<template>
  <div class="P-con">
    <div class="main">
      <CardPromotion
        v-for="promotion in promotions"
        :key="promotion.id"
        :title="promotion.title"
        :url="promotion.url"
        :color="promotion.color"
        :buttonColor="promotion.buttonColor"
        :image="promotion.image"
      />
    </div>
  </div>
</template>

<script>
import { ref, onMounted } from 'vue';
import axios from 'axios';
import CardPromotion from '../components/CardPromotion.vue';

export default {
  components: { CardPromotion },
  setup() {
    const promotions = ref([]);

    const fetchPromotions = async () => {
      try {
        const response = await axios.get('http://localhost:3000/api/promotions'); // Corrected endpoint
        promotions.value = response.data.map((item) => ({
          id: item.id,
          title: item.title,
          url: item.url,
          color: item.color,
          buttonColor: item.buttonColor,
          image: item.image,
        }));
      } catch (error) {
        console.error('Error fetching promotions:', error);
      }
    };

    onMounted(fetchPromotions);

    return { promotions };
  },
};
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