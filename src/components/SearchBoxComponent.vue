<template>
 <input type="text" placeholder="search for items">
</template>
<script>
export default{
}
</script>
<style>
input{
    width:43%;
    height: 32px;
    border-radius: 5px;
    border: 2px solid #BCE3C9;
    outline: 1px solid rgb(255, 255, 255);
    position: relative;
}
input:focus {
  border:  2px solid #BCE3C9;
  border-radius:6px;
}
input:hover {
  outline: 1px solid rgb(255, 255, 255);
}
.input-box:focus ~ .placeholder {
display: none;
}
.placeholder {
position: absolute;
left: 20px;
top: 0px;
background-color: white;
padding: 0 20px;
}
</style>