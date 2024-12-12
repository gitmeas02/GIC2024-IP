<template>
    <div class="header">
      <h1>Header</h1>
      <div>
        <RouterLink to="/page1" class="nav-link">Page 1</RouterLink>
        <RouterLink to="/page2" class="nav-link">Page 2</RouterLink>
        <RouterLink to="/page3" class="nav-link">Page 3</RouterLink>
      </div>
    </div>
  </template>
  
  <script>
  import { RouterLink } from 'vue-router';
  
  export default {
    components: {
      RouterLink,
    },
  };
  </script>
  
  <style scoped>
  .header {
    display: flex;
    align-items: center;
    justify-content: space-between;
  }
  
  .nav-link {
    text-decoration: none;
    color: black;
    margin: 0 10px;
  }
  
  /* Style for the active RouterLink */
  .router-link-active {
    color: red;
    font-weight: bold;
  }
  </style>
  