<template>
  <div
    class="header"
    :style="{
      paddingTop: paddingTop,
      paddingBottom: paddingBottom
    }"
  >
    <h2>{{ title }}</h2>
    <div class="List">
      <ul>
        <li>All</li>
        <li>Milks & Dairies</li>
        <li>Coffees & Teas</li>
        <li>Pet Foods</li>
        <li>Meats</li>
        <li>Vegetables</li>
        <li>Fruits</li>
      </ul>
    </div>
  </div>
</template>

<script>
import axios from 'axios';
import { ref } from 'vue';

export default {
  props: {
    title: {
      type: String,
      default: 'Featured Categories'
    },
    paddingTop: {
      type: String,
      default: '70px'
    },
    paddingBottom: {
      type: String,
      default: '0px'
    }
  },
  // setup(){
  //   const group= ref([]);
  //     const FetchGroup = async => (){
  //     try{
  //      const res= await axios.get('http://localhost:3000/api/groups');
  //      group.value= res.data.map((item)=>{

  //      })
  //     }catch(error){
  //       console.log(error);
  //     }
  //     return {group};
  //   }
  // }
};
</script>

<style scoped>
.List{
  display: flex;
  align-items: center;
}
.header {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  padding-left: 100px;
  padding-right: 100px;
  align-content:center;
  
}

ul {
  display: flex;
  flex-direction: row;
  gap: 24px;
  list-style: none;
  margin: 12px;
}
</style>
