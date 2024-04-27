<script setup>
definePageMeta({
    layout: 'operator',
    middleware: ["operator-auth"],
})
// Tab
const currentTab = ref('buses');
</script>

<template>
    <header class="py-4 border-b">
        <div class="container mx-auto flex flex-col justify-between">
            <h3 class="text-xl mb-8 font-semibold">Manage Bus</h3>
            <div class="overflow-x-auto w-full pb-2">
                <div class="flex gap-x-5">
                    <button @click="currentTab = 'buses'"
                        class="relative hover:opacity-80 transition-all-300 pb-2 font-medium">
                        <i v-if="currentTab == 'buses'"
                            class="rounded-full absolute left-1/2 -translate-x-1/2 w-1/2 top-full h-1.5 bg-green-500"></i>
                        <span>Bus</span>
                    </button>
                    <button @click="currentTab = 'types'"
                        class="relative hover:opacity-80 transition-all-300 pb-2 font-medium">
                        <i v-if="currentTab == 'types'"
                            class="rounded-full absolute left-1/2 -translate-x-1/2 w-1/2 top-full h-1.5 bg-green-500"></i>
                        <span>Bus Type</span>
                    </button>
                </div>
            </div>
        </div>
    </header>
    <div class="bg-white">
        <div v-if="currentTab == 'buses'">
            <PanelBusPanel />
        </div>
        <div v-if="currentTab == 'types'">
            <PanelBusTypePanel />
        </div>
    </div>
</template>