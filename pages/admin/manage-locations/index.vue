<script setup>
definePageMeta({
    layout: "admin",
    middleware: ["auth"],
});
const modalStore = useModalStore();
const { currentModal } = storeToRefs(modalStore);
const locationStore = useLocationStore();
locationStore.getData();
const { data, selected, searchData } = storeToRefs(locationStore);
const addNewItem = ref(false)
const searchQuery = ref('')
</script>

<template>
    <header class="py-4 border-b">
        <div class="container mx-auto flex justify-between items-center">
            <h3 class="text-xl font-semibold">Manage Locations</h3>
            <button @click="modalStore.toggleModal('add')"
                class="transition-all duration-300 hover:scale-105 hover:opacity-75 rounded-full">
                <Icon name="i-ph:plus-circle-fill" size="40" color="green" />
            </button>
        </div>
    </header>
    <div class="bg-white py-5">
        <div class="container mx-auto">
            <div class="flex mb-5 items-center justify-between">
                <h4 class="font-medium text-lg">{{ data.length }} Locations</h4>
                <div class="relative">
                    <IconSearchV2 class="h-6 text-slate-600 absolute top-1/2 -translate-y-1/2 left-4" />
                    <input type="text" v-model="searchQuery"
                        class="py-3 text-sm font-medium outline-none focus:border-slate-300 placeholder:text-slate-600 pl-12 pr-2 rounded-full border bg-slate-50 w-full"
                        placeholder="Search query here" />
                </div>
            </div>
            <div class="flex flex-col gap-y-1">
                <div v-if="searchData(searchQuery).length" v-for="item in searchData(searchQuery)" :key="item"
                    class="py-4">
                    <div class="pb-4 border-b">
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-y-2 gap-x-6">
                            <div class="flex flex-col gap-y-1">
                                <h2 class="text-sm font-medium text-slate-500">
                                    Location
                                </h2>
                                <span class="text-base font-medium">{{ item.name }}</span>
                            </div>
                            <div class="flex flex-col gap-y-1">
                                <h2 class="text-sm font-medium text-slate-500">
                                    City / Code
                                </h2>
                                <span class="text-base font-medium">
                                    {{ item.city }} / {{ item.city_code }}
                                </span>
                            </div>
                            <div class="flex flex-col gap-y-1">
                                <h2 class="text-sm font-medium text-slate-500">
                                    Latitude / Longitude
                                </h2>
                                <span class="text-base font-medium">
                                    {{ item.lat }} / {{ item.lng }}
                                </span>
                            </div>
                            <div class="flex justify-end gap-y-1">
                                <SharedActionButton
                                    @action="() => (locationStore.selectData(item), modalStore.toggleModal('edit'))"
                                    title="Edit">
                                    <IconEdit class="h-5" />
                                </SharedActionButton>
                                <SharedActionButton
                                    @action="() => (locationStore.selectData(item), modalStore.toggleModal('delete'))"
                                    title="More options">
                                    <IconDelete class="h-5" />
                                </SharedActionButton>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-else class="flex col-span-3 flex-col items-center justify-center w-full">
                    <TheEmptyMessage class="w-full" message="No records available" />
                </div>
            </div>
        </div>
    </div>
    <ModalsLocationAdd :show="currentModal == 'add'" />
    <ModalsLocationEdit :show="currentModal == 'edit'" />
    <ModalsLocationDelete :show="currentModal == 'delete'" />
    <ClientOnly>
        <Teleport to="body">
            <!-- <AddAmentyModal @close-action="addNewItem = false" :show="addNewItem" /> -->
        </Teleport>
    </ClientOnly>
</template>