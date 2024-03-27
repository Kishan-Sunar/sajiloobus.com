<script setup>
definePageMeta({
    layout: 'operator'
})
// modal
const addNewItem = ref(false)
</script>

<template>
    <header class="py-4 border-b">
        <div class="container mx-auto flex justify-between items-center">
            <h3 class="text-xl font-semibold">Manage Amenties</h3>
            <button @click="addNewItem = true"
                class="transition-all duration-300 hover:scale-105 hover:opacity-75 rounded-full">
                <Icon name="i-ph:plus-circle-fill" size="40" color="green" />
            </button>
        </div>
    </header>
    <div class="bg-white py-5">
        <div class="container mx-auto">
            <div class="flex mb-5 items-center justify-between">
                <h4 class="font-medium text-lg">1 / 5 Amenties</h4>
                <div class="relative">
                    <IconSearchV2 class="h-6 text-slate-600 absolute top-1/2 -translate-y-1/2 left-4" />
                    <input type="text"
                        class="py-3 text-sm font-medium outline-none focus:border-slate-300 placeholder:text-slate-600 pl-12 pr-2 rounded-full border bg-slate-50 w-full"
                        placeholder="Search query here" />
                </div>
            </div>
            <div class="grid sm:grid-cols-3 gap-x-2 gap-y-2">
                <div v-for="item in ['Water Bottle', 'Wifi', 'AC', 'Entertainment', 'Toilet']" :key="item">
                    <div class="px-4 py-2 rounded-xl border">
                        <div class="grid grid-cols-2 items-center sm:grid-cols-[40px_repeat(2,1fr)] gap-y-2 gap-x-2">
                            <div class="flex items-center text-green-600">
                                <IconAmentiesBottle v-if="item == 'Water Bottle'" class="h-8" />
                                <IconAmentiesWifi v-if="item == 'Wifi'" class="h-8" />
                                <IconAmentiesAC v-if="item == 'AC'" class="h-8" />
                                <IconAmentiesTV v-if="item == 'Entertainment'" class="h-8" />
                                <IconAmentiesToilet v-if="item == 'Toilet'" class="h-8" />
                            </div>
                            <div>
                                <span class="text-sm font-medium">{{ item }}</span>
                            </div>
                            <div class="flex justify-end gap-x-1">
                                <SharedActionButton title="Edit">
                                    <IconEdit class="h-5" />
                                </SharedActionButton>
                                <SharedActionButton title="More options">
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
        <Teleport to="body">
            <!-- <AddAmentyModal @close-action="addNewItem = false" :show="addNewItem" /> -->
        </Teleport>
    </ClientOnly>
</template>