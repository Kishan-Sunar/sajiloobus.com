<script setup>
definePageMeta({
    layout: 'operator',
    middleware: ["operator-auth"],
})
// Tab
const currentTab = ref('basic');
</script>

<template>
    <header class="py-4 bg-green-600 border-b">
        <div class="container mx-auto flex flex-col justify-between items-start">
            <h3 class="text-xl mb-8 text-white font-semibold">Settings</h3>
            <div class="overflow-x-auto w-full pb-2">
                <div class="flex gap-x-5">
                    <button @click="currentTab = 'basic'"
                        class="relative hover:opacity-80 transition-all-300 pb-2 text-white font-medium">
                        <i v-if="currentTab == 'basic'"
                            class="rounded-full absolute left-1/2 -translate-x-1/2 w-1/2 top-full h-1.5 bg-white/50"></i>
                        <span>Basic Configuration</span>
                    </button>
                    <button @click="currentTab = 'subscription'"
                        class="relative hover:opacity-80 transition-all-300 pb-2 text-white font-medium">
                        <i v-if="currentTab == 'subscription'"
                            class="rounded-full absolute left-1/2 -translate-x-1/2 w-1/2 top-full h-1.5 bg-white/50"></i>
                        <span>Subscription</span>
                    </button>
                    <button @click="currentTab = 'payment'"
                        class="relative hover:opacity-80 transition-all-300 pb-2 text-white font-medium">
                        <i v-if="currentTab == 'payment'"
                            class="rounded-full absolute left-1/2 -translate-x-1/2 w-1/2 top-full h-1.5 bg-white/50"></i>
                        <span>Payment Methods</span>
                    </button>
                </div>
            </div>
        </div>
    </header>
    <div class="bg-white py-5">
        <div class="container mx-auto">
            <div class="flex flex-col gap-y-1">
                <div v-if="currentTab == 'basic'">
                    Basic
                </div>
                <div v-if="currentTab == 'subscription'">
                    Subscription
                </div>
                <div v-if="currentTab == 'payment'">
                    Payment
                </div>
            </div>
        </div>
    </div>
</template>