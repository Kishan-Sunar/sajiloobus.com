<script setup>
const route = useRoute();
const currentPath = ref(route.path);
const props = defineProps({
    href: String,
    label: String,
    badge: String
})
const isActive = computed(() => currentPath.value.startsWith(`${props.href}`) ?? false);
watchEffect(() => {
    currentPath.value = route.path;
});
</script>

<template>
    <nuxt-link :to="href" :class="{ '!bg-white/10': isActive }"
        class="flex group/link gap-x-4 items-center rounded-3xl text-white hover:bg-white/5 px-4 py-1">
        <slot name="icon"></slot>
        <span class="text-sm group-hover/link:opacity-100 opacity-70 font-semibold">{{ label }}</span>
        <div class="ml-auto">
            <span v-if="badge"
                class="min-w-6 h-6 shadow-md text-xs font-semibold flex justify-center items-center bg-white text-black rounded-full">{{ badge }}</span>
        </div>
    </nuxt-link>
</template>