<template>
            <div :style="{backgroundColor:backgroundColor}" class="cardPromotion" >
             <img :src="image" :alt="description" class="image">
          <!--    //battleStrawberry -->
            <div class="contents">
            <label>{{ description }}</label>
            <button @click="onClick">{{ button }}<span><i class="fa-solid fa-arrow-right"></i></span></button>
            </div>
        </div>
</template>
<script>
export default {
    props:{
        image:String,
        description:String,
        button:String, 
        backgroundColor:String,
        onClick:Function
    },
    methods:{
        btn_promotion(){
            alert("Hello");
        }
    }
}
</script>
<style scoped>

@import url('https://fonts.googleapis.com/css2?family=Itim&display=swap');
.cardPromotion{
    width:380px;
    height: 280px;
    position: relative;
    border-radius: 10px;
}
img{
        width: auto;
         height: 200px;
         position: absolute;
         right: 0;
         bottom: 0;
         border-radius: 10px;
}
label{
         display: block;
         margin-bottom: 20px;
         font-size: 26px;
         font-family: Roboto;
         font-weight:400;
     }
     .contents{
         width: 220px;
         position:absolute;
         left: 48px;
         bottom: 80px;
     
     }
     button{
         padding: 8.5px 16px;
         border-radius: 2px;
         border: none;
         background: #3BB77E;
         font-size: 16px;
         font-weight: 100;
         color: white;
         display: flex;
         justify-content: center;
         align-items: center;
         gap: 10px;
         cursor: pointer;
     }
  
</style>
