<template>
  <div class="menu-item">
    <template v-if="reverse">
      <p>{{ label }}</p>
      <Icon :icon="i" width="24" height="24" />
    </template>
    <template v-else>
      <Icon :icon="i" width="24" height="24" />
      <p>{{ label }}</p>
    </template>
  </div>
</template>

<script>
import { Icon } from "@iconify/vue";

export default {
  name: "MenuItems",
  components: {
    Icon,
  },
  props: {
    label: {
      type: String,
      required: true,
    },
    i: {
      type: String,
      required: true,
    },
    reverse: {
      type: Boolean,
      default: false, // Default is Icon first, then P
    },
  },
};
</script>

<style scoped>
.menu-item {
  display: flex;
  align-items: center;
}

p {
  margin: 0;
  font-size: 16px;
}
</style>
