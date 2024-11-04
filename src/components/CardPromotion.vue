<template>
    <div :style="{ background: color }" class="cardPromotion">
      <img :src="image" :alt="title" class="image" /> <!-- Use title for alt text -->
      <div class="contents">
        <label>{{ title }}</label>
        <button @click="onClick">{{ url }} <span><i class="fa-solid fa-arrow-right"></i></span></button>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    props: {
      image: String,
      title: String,
      buttonColor: String,
      url: String,
      color: String,
    },
    methods: {
      onClick() {
        console.log(`Navigating to ${this.url}`); // Example action; replace with your navigation logic
        // Optionally, you can use window.location or a router to navigate
      },
    },
  };
  </script>
  
  <style scoped>
  @import url('https://fonts.googleapis.com/css2?family=Itim&display=swap');
  
  .cardPromotion {
      width: 380px;
      height: 280px;
      position: relative;
      border-radius: 10px;
  }
  
  img {
      width: auto;
      height: 200px;
      position: absolute;
      right: 0;
      bottom: 0;
      border-radius: 10px;
  }
  
  label {
      display: block;
      margin-bottom: 20px;
      font-size: 26px;
      font-family: Roboto;
      font-weight: 400;
  }
  
  .contents {
      width: 220px;
      position: absolute;
      left: 48px;
      bottom: 80px;
  }
  
  button {
      padding: 8.5px 16px;
      border-radius: 2px;
      border: none;
      background: #3BB77E; /* This can be adjusted if buttonColor prop is needed */
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
  