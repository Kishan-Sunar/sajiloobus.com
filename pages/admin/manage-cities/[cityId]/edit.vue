<script setup>
definePageMeta({
    layout: 'admin'
})
const route = useRoute()
const cityId = ref(route.params.cityId);
let district = ref('')
let city = ref('')
</script>

<template>
    <header class="py-4 border-b">
        <div class="container mx-auto flex justify-between items-center">
            <nuxt-link to="./" class="font-medium flex items-center justify-start gap-x-2 hover:opacity-70">
                <LazyIconChevronRight class="h-4 rotate-180" />
                Back
            </nuxt-link>
            <h3 class="text-2xl font-semibold">Add Boarding / Dropping Points</h3>
        </div>
    </header>
    <div class="bg-white relative rounded-t-3xl py-5 -mt-6">
        <div class="container mx-auto">
            <div class="grid sm:grid-cols-2 sm:gap-x-5 gap-y-5">
                <SharedFormControl @update="(value) => district = value" label="Name" placeholder="Enter name " />
                <SharedFormControl @update="(value) => district = value" label="Address" placeholder="Enter address " />
                <SharedFormControl @update="(value) => district = value" label="Latitude"
                    placeholder="Enter latitude " />
                <SharedFormControl @update="(value) => district = value" label="Longitude"
                    placeholder="Enter longitude " />
                <div class="col-span-2 flex gap-x-3 justify-end">
                    <button
                        class="py-4 font-semibold flex justify-center items-center px-6 rounded-2xl text-white bg-green-600 hover:bg-green-700 transition-all duration-300">
                        Save
                    </button>
                    <nuxt-link to=""
                        class="py-4 font-semibold flex justify-center items-center px-6 rounded-2xl text-white bg-sky-600 hover:bg-sky-700 transition-all duration-300">
                        Save and New
                    </nuxt-link>
                </div>
            </div>
        </div>
    </div>
</template>