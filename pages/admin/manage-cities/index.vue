<script setup>
definePageMeta({
    layout: "admin",
});
</script>

<template>
    <header class="py-4 border-b">
        <div class="container mx-auto flex justify-between items-center">
            <h3 class="text-xl font-semibold">Manage Cities</h3>
        </div>
    </header>
    <div class="bg-white py-5">
        <div class="container mx-auto">
            <header class="flex items-center justify-between">
                <h4 class="font-medium text-lg">20/ 200 Cities</h4>
                <div class="relative">
                    <IconSearchV2 class="h-6 text-slate-600 absolute top-1/2 -translate-y-1/2 left-4" />
                    <input type="text"
                        class="py-3 text-sm font-medium outline-none focus:border-slate-300 placeholder:text-slate-600 pl-12 pr-2 rounded-full border bg-slate-50 w-full"
                        placeholder="Search query here" />
                </div>
            </header>
            <div class="flex flex-col gap-y-1">
                <div v-for="item in [
                    'Pokhara',
                    'Kathmandu',
                    'Birgunj',
                    'Surkhet',
                    'Hetauda',
                ]" :key="item" class="py-4">
                    <div class="pb-4 border-b">
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-y-2 gap-x-6">
                            <div class="flex flex-col gap-y-1">
                                <h2 class="text-sm font-medium text-slate-500">
                                    District
                                </h2>
                                <span class="text-base font-medium">Gandaki</span>
                            </div>
                            <div class="flex flex-col gap-y-1">
                                <h2 class="text-sm font-medium text-slate-500">
                                    City
                                </h2>
                                <span class="text-base font-medium">{{
                                    item
                                }}</span>
                            </div>
                            <div class="flex flex-col gap-y-1">
                                <h2 class="text-sm font-medium text-slate-500">
                                    Boarding / Dropping Point
                                </h2>
                                <nuxt-link to="/operator/manage-cities/1/"
                                    class="text-base text-blue-600 hover:underline">
                                    Manage
                                </nuxt-link>
                            </div>
                            <div class="flex justify-end gap-y-1">
                                <SharedActionButton @action="
                                    navigateTo(
                                        '/operator/manage-cities/edit-1'
                                    )
                                    ">
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
