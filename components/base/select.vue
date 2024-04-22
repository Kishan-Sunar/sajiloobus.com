<script setup>
import { useField } from 'vee-validate'
import Input from './Input.vue';

defineOptions({
  inheritAttrs: true
})
// const emit = defineEmits(['update:modelValue'])

const props = defineProps({
  name: String,
  input: String
})

const { setValue, value, errorMessage, handleChange } = useField(() => props.name)
if (props.input) {
  setValue(props.input)
}
</script>

<template>
  <div class="relative flex items-center space-x-5">
    <select v-bind="$attrs" :name="name"
      class="pl-14 appearance-none focus:border-primary-700 focus:ring-primary-100 w-full rounded-lg border border-gray-300 py-4 bg-white text-black outline-none placeholder:font-light placeholder:text-black focus:ring-2"
      :value="value" @change="handleChange">
      <slot name="options"></slot>
    </select>
    <slot name="icon"></slot>
    <Icon name="i-heroicons:chevron-down-solid" size="20" class="absolute right-4 w-5 text-gray-500" />
  </div>
  <BaseError class="-mt-2">
    {{ errorMessage }}
  </BaseError>
</template>

<style scoped></style>
