<script setup>
const { $modalStore, $notificationStore } = useNuxtApp();
const { currentModal } = storeToRefs($modalStore)
const searchStore = useSearchStore();
searchStore.search();
const { data: searchData } = storeToRefs(searchStore)
</script>

<template>
    <section class="pt-16 pb-4 bg-slate-400 relative z-10">
        <div>
            <ClientOnly>
                <img class="absolute shadow-xl top-0 left-0 bottom-0 h-full w-full object-cover"
                    src="~/assets/backgrounds/bg-blur.png" alt="background" />
            </ClientOnly>
        </div>
        <div class="relative pt-20">
            <div class="container mx-auto">
                <SearchboxCard class="mb-4" />
            </div>
        </div>
    </section>
    <section class="py-10 bg-slate-100">

        <div class="container mx-auto">
            <div v-if="searchData.length" class="flex flex-col gap-y-6">
                <div v-for="item in searchData" :key="item"
                    class="bg-white transition-all duration-300 hover:scale-[1.01] hover:-translate-y-1 shadow shadow-black/5 rounded-xl">
                    <div class="grid gap-x-5 gap-y-4 sm:grid-cols-4">
                        <div @click="() => { searchStore.selectData(item), $modalStore.toggleModal('photos') }"
                            class="bg-slate-400 cursor-pointer rounded-xl sm:rounded-r-none overflow-hidden relative">
                            <div class="absolute top-0 left-0 w-full h-full bg-black/20"></div>
                            <span
                                class="bg-white font-semibold shadow-lg py-1 px-3 rounded-full absolute bottom-2 right-5">{{ item.bus.bus_photo.length }}</span>
                            <img :src="$config.public.apiURL + '/storage/' + item.bus.featured_photo_path ?? '/avatar/bus-placeholder.webp'"
                                class="h-full w-full object-cover" alt="bus logo" />
                        </div>
                        <div class="sm:col-span-2">
                            <div class="py-4 px-4">
                                <h3 class="font-semibold text-sky-950 mb-1 text-xl">{{ item.name }}</h3>
                                <div class="flex items-center gap-x-4 mb-3">
                                    <div class="font-regular text-slate-600">
                                        <span>
                                            {{ item.bus.bus_type.name }}
                                        </span>
                                    </div>
                                    <div class="flex items-center gap-x-2">
                                        <div class="flex items-center gap-x-2">
                                            <IconStar class="w-6 text-green-600"></IconStar>
                                            <span class="font-medium">4.2</span>
                                        </div>
                                        <span class="text-slate-400 text-sm">(389 reviews)</span>
                                    </div>
                                </div>
                                <div class="grid gap-4 gap-y-1 sm:grid-cols-2 justify-between mb-5">
                                    <div class="relative">
                                        <div
                                            class="absolute transition-all duration-300 flex h-full sm:h-min flex-col justify-center sm:justify-start sm:flex-row items-center gap-2 sm:w-full top-0 left-0">
                                            <i class="min-w-4 min-h-4 bg-white border-2 border-red-500"></i>
                                            <div
                                                class="h-full transition-al duration-300 w-[2px] sm:w-full sm:h-[2px] bg-sky-900">
                                            </div>
                                        </div>
                                        <div class="pt-0 pl-8 sm:pt-6 sm:pl-0 pb-3 sm:pb-0 transition-all duration-300">
                                            <span class="text-sm mb-2 text-slate-600">Departure</span>
                                            <h3 class="font-semibold">{{ item.origin.name }}</h3>
                                            <span>{{ item.departure }}</span>
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <div
                                            class="absolute transition-all duration-300 flex h-full sm:h-min flex-col sm:flex-row items-center gap-2 sm:w-full top-0 left-0">
                                            <i
                                                class="min-w-4 min-h-4 bg-white rounded-full border-2 border-green-600"></i>
                                        </div>
                                        <div class="pt-0 pl-8 sm:pt-6 sm:pl-0 pb-3 sm:pb-0 transition-all duration-300">
                                            <span class="text-sm mb-2 text-slate-600">Arrival</span>
                                            <h3 class="font-semibold">{{ item.destination.name }}</h3>
                                            <span>{{ item.arrival }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex flex-col sm:flex-row gap-4">
                                        <span
                                            @click="() => { searchStore.selectData(item), $modalStore.toggleModal('amenities') }"
                                            class="whitespace-nowrap text-sm text-slate-600 hover:text-green-700 hover:cursor-pointer">Amenties</span>
                                        <span
                                            @click="() => { searchStore.selectData(item), $modalStore.toggleModal('photos') }"
                                            class="whitespace-nowrap text-sm text-slate-600 hover:text-green-700 hover:cursor-pointer">Photos</span>
                                        <span
                                            @click="() => { searchStore.selectData(item), $modalStore.toggleModal('points') }"
                                            class="whitespace-nowrap text-sm text-slate-600 hover:text-green-700 hover:cursor-pointer">Boarding
                                            |
                                            Dropping Points</span>
                                        <span
                                            @click="() => { searchStore.selectData(item), $modalStore.toggleModal('policy') }"
                                            class="whitespace-nowrap text-sm text-slate-600 hover:text-green-700 hover:cursor-pointer">Policies</span>
                                        <span
                                            @click="() => { searchStore.selectData(item), $modalStore.toggleModal('reviews') }"
                                            class="whitespace-nowrap text-sm text-slate-600 hover:text-green-700 hover:cursor-pointer">Reviews</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="text-white text-center flex flex-col justify-between h-full rounded-xl sm:rounded-l-none bg-sky-900 py-4 px-4">
                            <div class="mb-2 flex flex-col gap-y-4">
                                <h3 class="font-medium">Amenties</h3>
                                <div class="px-4">
                                    <div class="grid justify-center items-center grid-cols-4 gap-x-2">
                                        <template v-for="(amenity, index) in item.bus.bus_amenity.slice(0, 3)"
                                            :key="index">
                                            <div class="h-8 w-8" v-html="amenity.amenity.svg_icon"></div>
                                        </template>
                                        <span v-if="item.bus.bus_amenity.length > 3" class="text-xl font-medium">+
                                            {{ item.bus.bus_amenity.length - 3 }}</span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-medium mb-3">Rs. {{ item.fare }} / person</h4>
                                <button
                                    @click="() => { searchStore.selectData(item), navigateTo('/search/seat-selection') }"
                                    class="cursor-pointer flex justify-center items-center rounded-full transition-all duration-300 w-full text-black py-3 px-4 shadow-lg bg-green-300 hover:bg-green-400 font-medium">
                                    View Seats
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-else>
                <TheEmptyMessage message="No bus available" class="w-full" />
            </div>
        </div>
    </section>
    <ModalsBusDetailsPhotos :show="currentModal == 'photos'" />
    <ModalsBusDetailsAmenities :show="currentModal == 'amenities'" />
    <ModalsBusDetailsReviews :show="currentModal == 'reviews'" />
    <ModalsBusDetailsPolicy :show="currentModal == 'policy'" />
    <ModalsBusDetailsPoints :show="currentModal == 'points'" />
</template>
