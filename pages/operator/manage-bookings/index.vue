<script setup>
definePageMeta({
    layout: 'operator',
    middleware: ["operator-auth"],
})
</script>

<template>
    <header class="py-4 border-b">
        <div class="container mx-auto flex justify-between items-center">
            <h3 class="text-xl font-semibold">Manage Bookings</h3>
        </div>
    </header>
    <div class="bg-white py-5 pb-28">
        <div class="container mx-auto">
            <header class="flex items-center justify-between">
                <h4 class="font-medium text-lg">20/ 200 Records</h4>
                <div class="relative">
                    <IconSearchV2 class="h-6 text-slate-600 absolute top-1/2 -translate-y-1/2 left-4" />
                    <input type="text"
                        class="py-3 text-sm font-medium outline-none focus:border-slate-300 placeholder:text-slate-600 pl-12 pr-2 rounded-full border bg-slate-50 w-full"
                        placeholder="Search query here" />
                </div>
            </header>
            <div class="flex flex-col gap-y-1">
                <div v-for="item in ['Kishan Sunar', 'Biraj Bhatta', 'Anupam Hital', 'Asshish Gurung', 'Asmit Pariyar', 'Asmit Pariyar', 'Asmit Pariyar', 'Asmit Pariyar', 'Asmit Pariyar', 'Asmit Pariyar']"
                    :key="item" class="py-4">
                    <div class="pb-4 border-b">
                        <div class="grid grid-cols-2 sm:grid-cols-6 gap-y-2 gap-x-6">
                            <div class="flex flex-col gap-y-1">
                                <h2 class="text-sm font-medium text-slate-500">Bookind ID</h2>
                                <span class="text-base font-medium">#1234DDD</span>
                            </div>
                            <div class="flex flex-col gap-y-1">
                                <h2 class="text-sm font-medium text-slate-500">By</h2>
                                <span class="text-base font-medium">{{ item }}</span>
                            </div>
                            <div class="flex flex-col gap-y-1">
                                <h2 class="text-sm font-medium text-slate-500">Bus</h2>
                                <span class="text-base font-medium">000022277EE</span>
                            </div>
                            <div class="flex flex-col gap-y-1">
                                <h2 class="text-sm font-medium text-slate-500">Seats</h2>
                                <span class="text-base font-medium">A1, A2, B4</span>
                            </div>
                            <div class="flex flex-col gap-y-1">
                                <h2 class="text-sm font-medium text-slate-500">Total</h2>
                                <span class="text-base font-medium">NPR 34000</span>
                            </div>
                            <div class="flex justify-end gap-y-1">
                                <SharedActionButton>
                                    <IconEdit class="h-5" />
                                </SharedActionButton>
                                <SharedActionButton>
                                    <IconEllipseV class="h-5" />
                                </SharedActionButton>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ClientOnly>
        <Teleport to="#infobar">
            <nuxt-link to="/search" target="_blank"
                class="absolute transitional-all duration-300 flex justify-center gap-x-2 shadow-md shadow-black/20 bg-green-700 hover:bg-green-800 text-white font-semibold rounded-2xl px-7 py-5 bottom-12 right-5">
                <IconSearch class="h-6" />
                <span>Book New</span>
            </nuxt-link>
        </Teleport>
    </ClientOnly>
</template>