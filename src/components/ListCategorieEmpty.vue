<template>
    <div class="breadcrumb-banner">
      <div class="content">
        <h1>Coke & Milk</h1>
        <nav class="breadcrumb">
          <span><a href="/">Home</a></span>
          <span> &gt; </span>
          <span><a href="/categories">Categories</a></span>
          <span> &gt; </span>
          <span>Coke & Milk</span>
        </nav>
      </div>
    </div>
  </template>
  
  <script>
  export default {};
  </script>
  
  <style scoped>
  .breadcrumb-banner {
    background-color: #d6f2e2; /* Light green background */
    padding: 20px;
    border-radius: 10px;
    position: relative;
    margin-left: 107px;
    margin-right: 107px;
    height: 235px;
    background-image: url('/src/assets/images/background2.svg'); /* Set the image as background */
    background-repeat: no-repeat;
    background-size: cover; /* Ensure the image covers the entire div */
    background-position: center; /* Center the background image */
  }
  
  .content {
    max-width: 1200px;
    margin: 0 auto;
    position: relative;
    z-index: 2; /* Keeps the content above the background */
  }
  
  h1 {
    font-size: 2rem;
    font-weight: bold;
    color: #1e1e2c;
    margin: 0 0 10px;
    font-family: "Quicksand";
  }
  
  .breadcrumb {
    font-size: 0.9rem;
    color: #6d6d6d;
    font-family: "Lato";
  }
  
  .breadcrumb a {
    text-decoration: none;
    color: #6d6d6d;
  }
  
  .breadcrumb a:hover {
    text-decoration: underline;
  }
  
  .breadcrumb span {
    margin: 0 5px;
  }
  </style>