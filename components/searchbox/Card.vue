<script setup>
const searchStore = useSearchStore();
const { locationA, locationB, pickedDate } = storeToRefs(searchStore);
</script>

<template>
    <div class="bg-slate-50 -mt-10 shadow-xl rounded-xl min-h-16">
        <div class="grid sm:grid-cols-3 gap-4">
            <SearchboxInputLocation label="From" @action="searchStore.updateLocationA" :value="locationA">
                <template #icon>
                    <IconBoarding class="h-10 w-14" />
                </template>

                <template #iconActive>
                    <IconBoardingInactive class="h-10 w-14" />
                </template>
            </SearchboxInputLocation>
            <SearchboxInputLocation label="To" @action="searchStore.updateLocationB" :value="locationB">

                <template #icon>
                    <IconDropping class="h-10 w-14" />
                </template>

                <template #iconActive>
                    <IconDroppingInactive class="h-10 w-14" />
                </template>
            </SearchboxInputLocation>
            <div class="flex">
                <SearchboxInputDatePicker label="Date" @action="searchStore.updatePickedDate" :value="pickedDate">
                </SearchboxInputDatePicker>
                <div class="flex relative justify-between">
                    <div class="py-1.5 pr-3 absolute right-0 top-1/2 -translate-y-1/2">
                        <nuxt-link to="/search"
                            class="bg-green-400 hover:bg-green-300 transition-all duration-300 flex justify-center items-center w-16 h-16 rounded-full">
                            <IconSearch class="w-6" />
                        </nuxt-link>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>