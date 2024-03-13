<script setup>
definePageMeta({
    layout: 'operator'
})
let district = ref('')
let city = ref('')
</script>

<template>
    <header class="py-4 pb-10 container mx-auto flex flex-col gap-y-5 bg-green-600">
        <nuxt-link to="./" class="font-medium flex items-center justify-start gap-x-2 hover:opacity-70 text-white">
            <LazyIconChevronRight class="h-4 rotate-180" />
            Back
        </nuxt-link>
        <h3 class="text-2xl text-white font-semibold">Edit City</h3>
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
                        Save Changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>