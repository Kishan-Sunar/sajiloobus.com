<script setup>
const modalStore = useModalStore();
const { currentModal } = storeToRefs(modalStore);
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
                            <h3 class="text-xl font-semibold">Update Profile</h3>
                        </div>
                        <button
                            class="w-10 h-10 bg-transparent hover:bg-zinc-100 flex justify-center items-center rounded-full"
                            @click="modalStore.toggleModal('none')">
                            <IconX class="w-4" />
                        </button>
                    </header>
                    <div class="flex gap-4 flex-col sm:flex-row items-center justify-between">
                        <button
                            class="px-8 py-4 rounded-full text-white bg-green-600 hover:bg-green-600 flex justify-between gap-x-6 items-center">
                            <span class="text-base font-medium">
                                Update Now
                            </span>
                            <IconChevronRight class="h-4" />
                        </button>
                    </div>
                </div>
            </div>
        </template>
    </TheModal>
</template>
