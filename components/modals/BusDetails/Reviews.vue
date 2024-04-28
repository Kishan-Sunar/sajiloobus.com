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
</script>
<template>
    <TheModal @close-current-modal="$emit('close')" :show="show">
        <template #content>
            <div
                class="w-full relative sm:w-[550px] bg-white shadow-2xl shadow-black/50 px-6 sm:px-8 rounded-3xl py-8 overflow-y-auto max-h-[80vh]">
                <div class="relative flex flex-col gap-y-4">
                    <header class="relative mb-3 w-full flex flex-row justify-between items-start gap-y-4">
                        <div class="flex flex-col gap-y-1">
                            <h3 class="text-xl font-semibold">Bus details</h3>
                        </div>
                        <button
                            class="w-10 h-10 bg-transparent hover:bg-zinc-100 flex justify-center items-center rounded-full"
                            @click="modalStore.toggleModal('none')">
                            <IconX class="w-4" />
                        </button>
                    </header>
                    <div class="flex flex-col gap-y-3 mb-5">
                        {{ selectedData }}
                    </div>
                </div>
            </div>
        </template>
    </TheModal>
</template>