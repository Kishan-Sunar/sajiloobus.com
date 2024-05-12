<script setup>
const modalStore = useModalStore();
const { currentModal } = storeToRefs(modalStore);
const searchStore = useSearchStore();
const { selected: selectedData } = storeToRefs(searchStore)
defineProps({
    show: {
        required: true,
    },
});
const amenities = computed(() => {
    return selectedData.value.bus.bus_amenity
})
</script>
<template>
    <TheModal @close-current-modal="$emit('close')" :show="show">
        <template #content>
            <div
                class="w-full relative sm:w-[550px] bg-white shadow-2xl shadow-black/50 px-6 sm:px-8 rounded-3xl py-8 overflow-y-auto max-h-[80vh]">
                <div class="relative flex flex-col gap-y-4">
                    <header class="relative mb-3 w-full flex flex-row justify-between items-start gap-y-4">
                        <div class="flex flex-col gap-y-1">
                            <h3 class="text-xl font-semibold">Amenities</h3>
                        </div>
                        <button
                            class="w-10 h-10 bg-transparent hover:bg-zinc-100 flex justify-center items-center rounded-full"
                            @click="modalStore.toggleModal('none')">
                            <IconX class="w-4" />
                        </button>
                    </header>
                    <div class="grid grid-cols-2 gap-3 mb-5">
                        <div v-if="amenities.length" v-for="item in amenities" :key="item">
                            <div class="px-4 py-2 rounded-xl border">
                                <div
                                    class="grid grid-cols-2 items-center sm:grid-cols-[40px_repeat(2,1fr)] gap-y-2 gap-x-2">
                                    <div class="flex items-center text-green-600">
                                        <div class="h-8 w-8" v-html="item.amenity.svg_icon"></div>
                                    </div>
                                    <div>
                                        <span class="text-sm font-medium">{{ item.amenity.name }}</span>
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
        </template>
    </TheModal>
</template>