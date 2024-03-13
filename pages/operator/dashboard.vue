<script setup>
definePageMeta({
    layout: 'operator'
})
// Tab
const currentTab = ref('basic');
</script>

<template>
    <div class="bg-white rounded-t-3xl py-5">
        <div class="container mx-auto">
            <h3 class="text-xl mb-5 pt-2 pb-5">
                <span class="block font-semibold">Overall Balance</span>
                <span
                    class="bg-clip-text font-bold text-4xl text-transparent bg-gradient-to-r from-green-600 to-yellow-600">
                    NPR
                    90,0000
                </span>
            </h3>
            <div class="border mb-5 grid sm:grid-cols-3 rounded-xl">
                <div class="rounded-t-xl sm:rounded-t-0 sm:rounded-l-xl py-5 px-4">
                    <span class="font-medium">Total Revenue</span>
                    <div>
                        <h4 class="text-2xl font-semibold">NPR 22,000</h4>
                    </div>
                </div>
                <div class="sm:border-r sm:border-l border-t border-b sm:border-t-0 sm:border-b-0 py-5 px-4">
                    <span class="font-medium">New Bookings</span>
                    <div>
                        <h4 class="text-2xl font-semibold">22+</h4>
                    </div>
                </div>
                <div class="rounded-b-xl sm:rounded-b-0 sm:rounded-r-xl py-5 px-4">
                    <span class="font-medium">Total Bookings</span>
                    <div>
                        <h4 class="text-2xl font-semibold">12000+</h4>
                    </div>
                </div>
            </div>
            <div class="py-5">
                <div class="grid grid-cols-2">
                    <div class="py-4 px-4 bg-slate-100 rounded-xl">
                        <h3 class="block px-4 mb-4 font-semibold">Active Bus Schedule</h3>
                        <div v-for="item in [1, 2, 3, 4, 5]" :key="item">
                            <div class="px-2 rounded-full relative hover:bg-slate-50">
                                <div class="grid gap-y-3 sm:grid-cols-[minmax(min-content,50px)_1fr]">
                                    <div class="py-2">
                                        <div
                                            class="w-[50px] h-[50px] bg-slate-400 block rounded-full overflow-hidden shadow-lg">
                                            <img class="w-full h-full object-cover"
                                                src="https://www.gracefuladventure.com/wp-content/uploads/2019/03/Tourist-bus.jpg"
                                                alt="logo" />
                                        </div>
                                    </div>
                                    <div class="px-0 py-2 sm:px-6">
                                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-y-2 gap-x-6">
                                            <div class="flex flex-col">
                                                <div class="relative pl-5">
                                                    <i
                                                        class="absolute rounded-full left-0 top-[8px] w-2 h-2 bg-green-600"></i>
                                                    <span class="text-xs font-medium">Kaski, Pokhara</span>
                                                </div>
                                                <div class="relative pl-5">
                                                    <i class="absolute left-0 top-[8px] w-2 h-2 bg-orange-500"></i>
                                                    <span class="text-xs font-medium">Kaski, Pokhara</span>
                                                </div>
                                            </div>
                                            <div class="flex flex-col gap-y-1">
                                                <h2 class="text-xs font-medium text-slate-500">Total Bookings</h2>
                                                <span class="text-base font-medium">12</span>
                                            </div>
                                            <div class="flex flex-col gap-y-1">
                                                <h2 class="text-xs font-medium text-slate-500">Total Earning</h2>
                                                <span class="text-base font-medium">NPR 30,000</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ClientOnly>
        <Teleport to="#infobar">
            <div class="px-4 bg-amber-100 py-4">
                Your subscription has been expired. Please renew the subscription
            </div>
        </Teleport>
    </ClientOnly>
</template>