<template>
<div class="Nav">
    <p>Home</p>
    <Icon icon="mdi-light:chevron-down" />
</div>
</template>
<script>
import {Icon} from '@iconify/vue'
export default{
    name:"NavLink",
    components: {
        Icon}
}
</script>
<style>
.Nav{
    display: flex;
    align-items: center;
}
p{
    margin:0;
}
</style>