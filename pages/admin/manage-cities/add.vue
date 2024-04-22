<script setup>
definePageMeta({
    layout: 'admin'
})
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
            <h3 class="text-2xl font-semibold">Add City</h3>
        </div>
    </header>
    <div class="bg-white relative rounded-t-3xl py-5 -mt-6">
        <div class="container mx-auto">
            <div class="grid sm:grid-cols-2 sm:gap-x-5 gap-y-5">
                <SharedFormControl @update="(value) => district = value" label="District *"
                    placeholder="Enter district " />
                <SharedFormControl @update="(value) => district = value" label="City  Name *"
                    placeholder="Enter city name " />
                <div class="col-span-2 flex justify-end">
                    <button
                        class="py-4 font-semibold flex justify-center items-center px-6 rounded-full text-white bg-green-600 hover:bg-green-700 transition-all duration-300">
                        Add City
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>