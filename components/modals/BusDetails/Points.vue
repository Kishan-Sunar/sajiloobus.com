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
const dropPoints = computed(() => {
    return selectedData.value.points.filter((data) => {
        return data.type === "drop"
    })
})
const boardPoints = computed(() => {
    return selectedData.value.points.filter((data) => {
        return data.type === "board"
    })
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
                            <h3 class="text-xl font-semibold">Boarding / Dropping Points</h3>
                        </div>
                        <button
                            class="w-10 h-10 bg-transparent hover:bg-zinc-100 flex justify-center items-center rounded-full"
                            @click="modalStore.toggleModal('none')">
                            <IconX class="w-4" />
                        </button>
                    </header>
                    <div class="flex flex-col gap-y-3 mb-5">
                        <div class="p-2 border">
                            <span class="font-semibold mb-2 block text-sm">Boarding Points</span>
                            <ul v-if="boardPoints.length">
                                <li v-for="item in boardPoints" :key="item.id" class="flex gap-x-1 justify-between">

                                    {{ item.location[0].name }}
                                </li>
                            </ul>
                            <div v-else>
                                No record available
                            </div>
                        </div>
                        <div class="p-2 border">
                            <span class="font-semibold mb-2 block text-sm">Dropping Points</span>
                            <ul v-if="dropPoints.length">
                                <li v-for="item in dropPoints" :key="item.id" class="flex gap-x-1 justify-between">
                                    {{ item.location[0].name }}
                                </li>
                            </ul>
                            <div v-else>
                                No record available
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </TheModal>
</template>