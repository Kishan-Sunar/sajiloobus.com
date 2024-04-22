<script setup>
import { useField } from 'vee-validate'

defineOptions({
  inheritAttrs: true
})
const props = defineProps({
  name: String,
  type: String
})

const { value, errorMessage, handleChange } = useField(() => props.name)
</script>

<template>
  <div class="relative flex items-center space-x-5">
    <input v-bind="$attrs" :name="name" :type="type || 'text'"
      class="focus:border-primary-700 focus:ring-primary-100 w-full rounded-lg border border-gray-300 py-3 text-black outline-none placeholder:font-light placeholder:text-black focus:ring-2"
      :value="value" @change="handleChange" />
    <slot name="icon"></slot>
  </div>
  <BaseError class="mt-1">
    {{ errorMessage }}
  </BaseError>
</template>

<style scoped></style>
