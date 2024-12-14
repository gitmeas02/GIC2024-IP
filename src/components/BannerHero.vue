<template>
    
<div class="Hero"> 
    <img src="../assets/images/Hero.png" alt="" srcset="" class="hero"> <!-- Background -->
    <img src="../assets/images/fruitsHero.png" alt="" class="fruits-hero"><!-- on background -->
   <div class="text-subscribe"> <!-- text-subscribe on fruits-hero-->
    <div class="container-text">
        <h1 class="text">Don't miss amazing grocery deals</h1>
        <p class="text">Sign up for the daily newsletter</p>
    </div>
    <div class="subscribe-container">
        <div class="subscribe-input">
          <MenuItems   i="majesticons:send-line" />
        <input type="text" placeholder="Your email address" />
        </div>
      <button type="submit">Subscribe</button>
    </div>
   </div>
   </div>
</template>
<script>
import MenuItems from './MenuItems.vue';

export default{
    components:{
        MenuItems
    }
}
</script >
<style scoped>
.subscribe-container {
  display: flex;
  align-items: center;
  background-color: #fff;
  border-radius: 50px;
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
  margin-top: 30px;
  width: 450px;
  height: fit-content;
}

.subscribe-input {
  display: flex;
  align-items: center;
  flex-grow: 1;
  padding: 0 10px;
}
p{
  font-size: 30px;
  color: #aaa;
}
.subscribe-input .icon {
  margin-right: 8px;
  color: #aaa;
  font-size: 16px;
}

.subscribe-input input {
  border: none;
  outline: none;
  flex-grow: 1;
  font-size: 14px;
  color: #555;
  height: 45px;
}

.subscribe-container button {
  background-color: #34a853;
  color: #fff;
  border: none;
  padding: 10px 20px;
  font-size: 14px;
  border-radius: 50px;
  height: 45px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.subscribe-container button:hover {
  background-color: #2c8a45;
}
.container-text{
  width:auto;
}
h1{
     font-size: 50px;
      font-family: Roboto;
      font-weight: 400;
      width: 500px;
      margin:0px 0px 17px 0px;
}
.Hero {
  position: relative;
  height: 500px; /* Adjust the height as needed */
  background-color: #fdf7e6; /* Background color matching the Hero section */
  overflow: hidden;
  display: flex;
  align-items: center;
  justify-content: center;
  margin-left: 107px;
  margin-right: 107px;
  border-radius: 10px;
}
.fruits-hero{
  height: 500px;
  right: 0px;
}
.text-subscribe {
  position: absolute;
  z-index: 3;
  top: 120px;
  left: 120px;
  display: flex;
  flex-direction: column;
}
.hero {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover; /* Ensures the image fills the Hero section */
  z-index: 1; /* Background layer */
}
.fruits-hero{
  position: absolute;
}
.ACWC{
    display:flex;
    gap:24px;
}
.search-menu{
    display: flex;
    justify-content: space-between;
    padding-left: 100px;
    padding-right: 107px;
    align-items: center;
}
</style>