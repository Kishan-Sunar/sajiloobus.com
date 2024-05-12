<script setup>
const locationStore = useLocationStore();
locationStore.getData();
const { data: locationData } = storeToRefs(locationStore);

const searchInput = ref('');
const filteredCities = computed(() => {
    return locationData.value.filter(city => city.name.toLowerCase().includes(searchInput.value.toLowerCase()));
});
const inputRef = ref(null);
let isSearchFocused = ref(false)

</script>

<template>
    <div class="absolute z-10 top-full w-full left-0 sm:left-1/2 sm:-translate-x-1/2 pt-5">
        <div class="absolute top-3 pointer-events-none rotate-45 h-5 w-5 bg-white rounded -translate-x-1/2 left-1/2">
        </div>
        <div
            class="bg-white overflow-hidden rounded-2xl w-full sm:w-[25rem] pb-2 shadow-[0px_12px_51px_-5px_rgba(0,0,0,0.25)]">
            <div class="sticky py-2 top-0 left-0 w-full">
                <div class="py-2 pl-6 pointer-events-none px-4 absolute left-0 top-1/2 -translate-y-1/2">
                    <IconSearch :class="isSearchFocused ? 'text-green-600' : 'text-slate-400'" class="h-7" />
                </div>
                <input @focusin="isSearchFocused = true" @focusout="isSearchFocused = false" v-model="searchInput"
                    type="text" class="w-full bg-white pb-2 pt-2 pr-4 pl-16 text-slate-700 outline-none"
                    placeholder="Search city" />
            </div>
            <div class="max-h-[20rem] transition-all duration-300 overflow-y-auto">
                <div class="flex flex-col gap-y-0.5 px-2 overflow-y-auto">
                    <div @click="$emit('selectCity', item.name), $emit('closeDropbox')" v-for="item in filteredCities"
                        :key="item.city_code"
                        class="px-4 py-3 cursor-pointer group/item select-none transition-all duration-300 active:bg-green-200 hover:bg-green-100 rounded-md first:rounded-t-xl last:rounded-b-xl bg-slate-100">
                        <div class="flex gap-x-3 justify-start items-center">
                            <IconMapMarker class="w-7 text-slate-500 group-hover/item:text-green-600" />
                            <div class="flex w-full justify-between items-center">
                                <span>{{ item.name }}</span>
                                <span class="text-sm uppercase text-green-700">{{ item.city_code }}</span>
                            </div>
                        </div>
                    </div>
                    <div v-if="filteredCities.length === 0" class="px-4 py-3 text-slate-500">
                        No matching cities found.
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
