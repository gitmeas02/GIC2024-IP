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
  }
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
  justify-content: center;
  padding-left: 100px;
  padding-right: 100px;
  align-content: center;
  gap:300px;
}

ul {
  display: flex;
  flex-direction: row;
  gap: 24px;
  list-style: none;
  margin: 12px;
}
</style>
