<script setup>
defineOptions({
    inheritAttrs: false
})
</script>

<template>
    <button v-bind="$attrs" @click="$emit('action')"
        class="h-10 w-10 text-slate-600 hover:text-black hover:bg-slate-100 rounded-full flex justify-center items-center">
        <slot></slot>
    </button>
</template>