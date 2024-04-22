<script setup>
defineOptions({
  inheritAttrs: true
})
defineProps({
  loader: {
    type: Boolean
  }
})
</script>
<template>
  <button
    class="flex w-36 items-center justify-center rounded-full bg-primary-900 px-6 py-3 text-white"
    v-bind="$attrs"
    :disabled="loader"
  >
    <span v-if="!loader" class="flex w-full justify-between"
      ><span class="font-bold"> Next</span>
      <Icon name="heroicons:chevron-right" size="24" />
    </span>
    <Icon v-else name="svg-spinners:ring-resize" size="24" />
  </button>
</template>
<style scoped></style>
