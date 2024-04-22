<script setup>
const route = useRoute();
const currentPath = ref(route.path);
const props = defineProps({
    href: String,
    label: String,
    badge: String,
});
const isActive = computed(
    () => currentPath.value.startsWith(`${props.href}`) ?? false
);
watchEffect(() => {
    currentPath.value = route.path;
});
</script>

<template>
    <nuxt-link :to="href" :class="{ '!bg-slate-100 !text-green-700': isActive }"
        class="flex group/link gap-x-2 items-center rounded-md hover:bg-white/5 px-4 py-2.5">
        <span>
            <slot name="icon"></slot>
        </span>
        <span class="text-sm font-medium">{{ label }}</span>
        <div class="ml-auto">
            <span v-if="badge"
                class="min-w-6 h-6 text-white bg-green-600 text-xs font-semibold flex justify-center items-center hover:bg-slate-50 rounded-full">{{ badge }}</span>
        </div>
    </nuxt-link>
</template>
