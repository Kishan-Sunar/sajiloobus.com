<script setup>
defineOptions({
    inheritAttrs: false
})
defineProps({
    message: {
        required: true,
    }
})
</script>
<template>
    <div v-bind="$attrs" class="flex flex-col gap-y-4 py-4 items-center justify-center">
        <IconEmptyRecord class="w-28" />
        <span class="font-normal text-slate-400">{{ message }}</span>
    </div>
</template>