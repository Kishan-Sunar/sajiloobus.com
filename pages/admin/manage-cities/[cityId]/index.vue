<script setup>
definePageMeta({
    layout: "admin",
});
let district = ref("");
let city = ref("");
</script>

<template>
    <header class="py-4 border-b">
        <div class="container mx-auto flex-col flex justify-between">
            <nuxt-link to="./" class="font-medium flex items-center justify-start gap-x-2 hover:opacity-70">
                <LazyIconChevronRight class="h-4 rotate-180" />
                Back
            </nuxt-link>
            <h3 class="text-2xl font-semibold">
                Manage Boarding / Dropping Points
            </h3>
        </div>
    </header>
    <div class="bg-white relative rounded-t-3xl py-5 -mt-6">
        <div class="container mx-auto">
            <header class="flex py-3 border-b mb-5 items-center justify-between">
                <h4 class="font-medium text-lg">Pokhara, Kaski</h4>
                <div class="relative">
                    <nuxt-link to="./add"
                        class="py-2 px-6 rounded-full font-medium bg-slate-200 hover:bg-green-200">New</nuxt-link>
                </div>
            </header>
            <div>
                <div v-for="item in [
                    'Pokhara',
                    'Kathmandu',
                    'Birgunj',
                    'Surkhet',
                    'Hetauda',
                    'Hetauda',
                    'Hetauda',
                    'Hetauda',
                    'Hetauda',
                    'Hetauda',
                ]" :key="item" class="py-2">
                    <div class="pb-4 border-b">
                        <div class="grid grid-cols-2 sm:grid-cols-5 gap-y-2 gap-x-6">
                            <div class="flex flex-col gap-y-1">
                                <h2 class="text-sm font-medium text-slate-500">
                                    Name
                                </h2>
                                <span class="text-base font-medium">Gandaki</span>
                            </div>
                            <div class="flex flex-col gap-y-1">
                                <h2 class="text-sm font-medium text-slate-500">
                                    Address
                                </h2>
                                <span class="text-base font-medium">{{
                                    item
                                }}</span>
                            </div>
                            <div class="flex flex-col gap-y-1">
                                <h2 class="text-sm font-medium text-slate-500">
                                    Latitude
                                </h2>
                                <span class="text-base font-medium">{{
                                    item
                                }}</span>
                            </div>
                            <div class="flex flex-col gap-y-1">
                                <h2 class="text-sm font-medium text-slate-500">
                                    Longitude
                                </h2>
                                <span class="text-base font-medium">{{
                                    item
                                }}</span>
                            </div>
                            <div class="flex justify-end gap-y-1">
                                <SharedActionButton @action="
                                    navigateTo(
                                        '/operator/manage-cities/1/edit'
                                    )
                                    ">
                                    <IconEdit class="h-5" />
                                </SharedActionButton>
                                <SharedActionButton>
                                    <IconDelete class="h-5" />
                                </SharedActionButton>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
