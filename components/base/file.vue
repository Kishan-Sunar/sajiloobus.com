<script setup>
defineOptions({
  inheritAttrs: true
})
const props = defineProps({
  name: String,
  input: String,
  type: String
})

const preview = ref(null)
const photo = ref('')
function previewImage() {
  photo.value = event.target.files[0]
}
function getPath(currentFile) {
  return URL.createObjectURL(currentFile);
}
</script>

<template>
  <img :src="!input || !photo ? '' : getPath(photo)"
    class="max-h-40 rounded block outline-none object-contain bg-slate-100" ref="preview" />
  <div class="relative flex items-center space-x-5">
    <input autocomplete="off" accept="image/*" v-bind="$attrs" :name="name" type="file"
      class="bg-white accent:bg-white focus:border-primary-700 focus:ring-primary-100 w-full rounded-lg border border-gray-300 py-3 text-black outline-none placeholder:font-light placeholder:text-black focus:ring-2"
      :value="input" @input="previewImage" @change="$emit('action', $event.target.files[0])" />
    <slot name="icon"></slot>
  </div>
  <BaseError class="mt-1">
    {{ errorMessage }}
  </BaseError>
</template>

<style scoped></style>
