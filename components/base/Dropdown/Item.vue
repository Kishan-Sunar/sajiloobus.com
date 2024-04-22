<script setup>
defineProps({
    label: {
        type: String,
    },
    link: {
        type: String,
    },
});
</script>
<template>
    <li>
        <nuxt-link
            :to="link ?? '#'"
            @click="$emit('action')"
            class="flex font-medium py-3 px-4 transition-all duration-200 rounded-lg gap-x-3 justify-start items-center hover:bg-slate-100"
        >
            <slot name="icon"></slot>
            <span class="text-sm">{{ label }}</span>
        </nuxt-link>
    </li>
</template>
