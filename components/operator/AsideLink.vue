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
    <nuxt-link :to="href" :class="{ '!bg-slate-100': isActive }"
        class="flex group/link gap-x-4 items-center rounded-md hover:bg-white/5 px-4 py-1">
        <span :class="{ '!text-green-500': isActive }">
            <slot name="icon"></slot>
        </span>
        <span class="text-sm group-hover/link:opacity-100 opacity-70 font-semibold">{{ label }}</span>
        <div class="ml-auto">
            <span v-if="badge"
                class="min-w-6 h-6 border bg-blue-200 text-xs font-semibold flex justify-center items-center hover:bg-slate-50 text-black rounded-full">{{ badge }}</span>
        </div>
    </nuxt-link>
</template>