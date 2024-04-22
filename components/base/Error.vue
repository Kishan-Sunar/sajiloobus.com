<script setup>
defineOptions({
  inheritAttrs: true
})
</script>

<template>
  <div class="text-xs text-red-500" v-bind="$attrs">
    <slot />
  </div>
</template>

<style scoped></style>
