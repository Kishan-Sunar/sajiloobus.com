<script setup>
definePageMeta({
    layout: 'admin'
})
</script>

<template>
    <header class="py-4 border-b">
        <div class="container mx-auto flex justify-between items-center">
            <h3 class="text-xl text-white font-semibold">Manage Schedule</h3>
            <button
                class="flex items-center gap-x-1 px-1 pr-4 text-sm font-medium py-1.5 transition-all duration-300 hover:bg-white/90 bg-white rounded-full shadow-md">
                <IconPlus class="h-9" />
                New Schedule
            </button>
        </div>
    </header>
    <div class="bg-white py-5">
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
                <div v-for="item in ['Pokhara', 'Kathmandu', 'Birgunj', 'Surkhet', 'Hetauda']" :key="item" class="py-4">
                    <div class="pb-4 border-b">
                        <div class="grid grid-cols-2 sm:grid-cols-5 gap-y-2 gap-x-6">
                            <div class="flex flex-col gap-y-1">
                                <h2 class="text-sm font-medium text-slate-500">Service Name</h2><span
                                    class="text-base font-medium">{{ item }}</span>
                            </div>
                            <div class="flex flex-col gap-y-1">
                                <h2 class="text-sm font-medium text-slate-500">Source</h2><span
                                    class="text-base font-medium">00002223EEE</span>
                            </div>
                            <div class="flex flex-col gap-y-1">
                                <h2 class="text-sm font-medium text-slate-500">Destination</h2><span
                                    class="text-base font-medium">000022277EE</span>
                            </div>
                            <div class="flex flex-col gap-y-1">
                                <h2 class="text-sm font-medium text-slate-500">Depo Name</h2><span
                                    class="text-base font-medium">000022277EE</span>
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
</template>