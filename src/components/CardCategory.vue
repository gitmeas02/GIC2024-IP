<template>
  <router-link :to="'/lists/' + id"  class="fruits" :style="{ backgroundColor: color }">
    <img :src="'http://localhost:3000/'+image" :alt="name" />
    <div class="name-price">
      <p>{{ name }}</p>
      <p class="price"><span>{{ productCount }}</span> items</p>
    </div>
  </router-link>
</template>

<script>
export default {
  props: {
    id: { type: Number, required: true },
    image: { type: String, required: true },
    name: { type: String, required: true },
    color:{type:String,required:true},
    productCount:{type:String,required:true}
  },

};
</script>

<style scoped>
@import url('https://fonts.googleapis.com/css2?family=Itim&display=swap');
   .fruits{
    border: 1px solid;
    display: flex;
    width: 102px;
    flex-direction: column;
    justify-content: center;
    align-items: center;
   }
   img{
  padding: 0;
  margin: 0;
  gap: 0;
  width: 98px;
  height: 98px;
   }
   .container{
    margin: 10px;
   }
   p{
    margin: 0;
    
   }
  p.price{
    display: flex;
   column-gap:10px;
   align-items: center;
   }
   .name-price{
    display: flex;
    flex-direction: column;
    align-items: center;
   }
   body{
  margin: 0;
  padding: 0;}
   p{
    padding: 0;
  margin: 0;
  font-size: 16px;
  font-family:"Itim", cursive;
  font-style:oblique;
   }
   span{
  font-size: 12px;
  color: rgb(0, 0, 0);
}
.fruits{
  border: 1px solid #81b13d;
  background: #F2FCE4;
  border-radius: 10px;
 transition:all 0.2s ease-in-out;
}
.container{
  display: flex;
  flex-wrap: wrap;
  gap: 10px;
  padding-top: 10px;
}

.fruits:hover{
border: 1px solid #ca7878;
transform: scale(1.1);
transition: 0.2s;
}
</style>
