<template>
<div class="C-category">
  <div class="container">
      <CardCategory
      v-for="category in categories"
      :key="category.id"
      :fruitName="category.fruitName"
      :item="category.items"
      :image="category.image"
      :background="category.background"
    />
  </div>
</div>
</template>

<script>
import { ref } from 'vue';
import CardCategory from '../components/CardCategory.vue';

 export default {
  components: { CardCategory},

  setup() {
    const categories = ref([
      { id: 1, fruitName: 'Peach', items: 14, image: './src/assets/svg/Peach.svg' ,background:'#F2FCE4'},
      { id: 2, fruitName: 'Apple', items: 16, image: './src/assets/svg/RedApple.svg',background:'#FFFCEB'},
      { id: 3, fruitName: 'Snack', items: 17, image: './src/assets/svg/snacks.svg', background:'#ECFFEC'},
      { id: 4, fruitName: 'Black Plum', items: 27, image: './src/assets/svg/BlackPulm.svg',background:'#FEEFEA' },
      { id: 5, fruitName: 'Vegetables', items: 21, image: './src/assets/svg/Vegetables.svg',background:'#FFF3EB' },
      { id: 6, fruitName: 'Headphone', items: 41, image: './src/assets/svg/HeadPhone.svg',background:'#FFF3FF' },
      { id: 7, fruitName: 'Cake & Milk', items: 89, image: './src/assets/svg/CakeAndMilk.svg',background:'#F2FCE4' },
      { id: 8, fruitName: 'Orange', items: 13, image: './src/assets/svg/Orange.svg',background:'#FFFCEB' },
      { id: 9, fruitName: 'Hamburger', items: 23, image: './src/assets/svg/Hamburger.svg',background:'#F2FCE4' },
      { id: 10, fruitName: 'Kiwi', items: 13, image: './src/assets/svg/Kiwi.svg',background:'#FFF3FF' },
    ]);
    return { categories };
  },
};
</script>
<style>
.container {
  display: flex;
  flex-wrap: wrap;
  gap: 12px;
  justify-content:start; /* Center items on larger screens by default */
  align-items: center;
  padding: 20px;
}
.C-category{
  display: flex;
  justify-content: center;
}

</style>
<!-- My file card name CardCategory and big file that contain Card name Category.vue -->