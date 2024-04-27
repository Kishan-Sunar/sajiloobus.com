<script setup>
const modalStore = useModalStore();
const { currentModal } = storeToRefs(modalStore);
const busTypeStore = useBusTypeStore();
busTypeStore.getData();
const { data, selected, searchData } = storeToRefs(busTypeStore);
const addNewItem = ref(false)
const searchQuery = ref('')
</script>

<template>
    <header class="py-4 border-b">
        <div class="container mx-auto flex justify-between items-center">
            <div class="relative">
                <IconSearchV2 class="h-6 text-slate-600 absolute top-1/2 -translate-y-1/2 left-4" />
                <input type="text" v-model="searchQuery"
                    class="py-3 text-sm font-medium outline-none focus:border-slate-300 placeholder:text-slate-600 pl-12 pr-2 rounded-full border bg-slate-50 w-full"
                    placeholder="Search query here" />
            </div>
            <button @click="modalStore.toggleModal('add')"
                class="transition-all duration-300 hover:scale-105 hover:opacity-75 rounded-full">
                <Icon name="i-ph:plus-circle-fill" size="40" color="green" />
            </button>
        </div>
    </header>
    <div class="bg-white py-5">
        <div class="container mx-auto">
            <div class="flex flex-col gap-y-1">
                <div v-if="searchData(searchQuery).length" v-for="item in searchData(searchQuery)" :key="item"
                    class="py-4">
                    <div class="pb-4 border-b">
                        <div class="grid grid-cols-2 sm:grid-cols-6 gap-y-2 gap-x-4">
                            <div class="flex flex-col gap-y-1">
                                <h2 class="text-sm font-medium text-slate-500">
                                    Name
                                </h2>
                                <span class="text-base font-medium">{{ item.name }}</span>
                            </div>
                            <div class="flex flex-col gap-y-1">
                                <h2 class="text-sm font-medium text-slate-500">
                                    Model
                                </h2>
                                <span class="text-base font-medium">
                                    {{ item.model }}
                                </span>
                            </div>
                            <div class="flex flex-col gap-y-1">
                                <h2 class="text-sm font-medium text-slate-500">
                                    Company
                                </h2>
                                <span class="text-base font-medium">
                                    {{ item.company }}
                                </span>
                            </div>
                            <div class="flex flex-col gap-y-1">
                                <h2 class="text-sm font-medium text-slate-500">
                                    Type
                                </h2>
                                <span class="text-base font-medium">
                                    {{ item.type }}
                                </span>
                            </div>
                            <div class="flex flex-col gap-y-1">
                                <h2 class="text-sm font-medium text-slate-500">
                                    Grid Size
                                </h2>
                                <span class="text-base font-medium">
                                    {{ item.grid_size }}
                                </span>
                            </div>
                            <div class="flex justify-end gap-y-1">
                                <SharedActionButton
                                    @action="() => (busTypeStore.selectData(item), modalStore.toggleModal('edit'))"
                                    title="Edit">
                                    <IconEdit class="h-5" />
                                </SharedActionButton>
                                <SharedActionButton
                                    @action="() => (busTypeStore.selectData(item), modalStore.toggleModal('delete'))"
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
    <ModalsBusTypeAdd :show="currentModal == 'add'" />
    <ModalsBusTypeEdit :show="currentModal == 'edit'" />
    <ModalsBusTypeDelete :show="currentModal == 'delete'" />
</template>