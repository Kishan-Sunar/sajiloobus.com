<script setup>
const modalStore = useModalStore();
const { currentModal } = storeToRefs(modalStore);
const locationStore = useLocationStore();
const { $notificationStore } = useNuxtApp();
import { object, string } from "yup";
const { type, selected, pending } = storeToRefs(locationStore);
defineProps({
    show: {
        required: true,
    },
    message: string,
    description: string
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
                            <h3 class="text-xl font-semibold">{{ message }}</h3>
                        </div>
                        <button
                            class="w-10 h-10 bg-transparent hover:bg-zinc-100 flex justify-center items-center rounded-full"
                            @click="modalStore.toggleModal('none')">
                            <IconX class="w-4" />
                        </button>
                    </header>
                    <div class="flex flex-col gap-y-3 mb-5">
                        <p class=" text-lg mb-4 text-zinc-500">
                            {{ description }}
                        </p>
                        <div class="flex gap-4 flex-col sm:flex-row items-center justify-between">
                            <button @click="modalStore.toggleModal('none')"
                                class="px-8 py-4 rounded-xl w-full text-white bg-slate-800 hover:bg-black flex justify-center gap-x-6 items-center">
                                <span class="text-base font-medium">
                                    Okay
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </TheModal>
</template>
