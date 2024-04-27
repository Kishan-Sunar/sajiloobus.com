<script setup>
const modalStore = useModalStore();
const { currentModal } = storeToRefs(modalStore);
const busStore = useBusStore();
const { $notificationStore } = useNuxtApp();
import { object, string } from "yup";
const { type, selected, pending } = storeToRefs(busStore);
const { handleSubmit, setErrors, resetForm } = useForm({
    validationSchema: object({
    }),
});
const deleteData = handleSubmit(async (values) => {
    try {
        await busStore.delete(selected.value.bus_no);
        $notificationStore.pushNotification(
            "Deleted successfully!",
            "success"
        );
        modalStore.toggleModal("none");
        resetForm();
    } catch (error) {
        console.log(error);
        $notificationStore.pushNotification(
            "Something went wrong try again",
            "danger"
        );
    } finally {
        pending.value = false;
    }
});
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
                            <h3 class="text-xl font-semibold">Delete</h3>
                        </div>
                        <button
                            class="w-10 h-10 bg-transparent hover:bg-zinc-100 flex justify-center items-center rounded-full"
                            @click="modalStore.toggleModal('none')">
                            <IconX class="w-4" />
                        </button>
                    </header>
                    <div class="flex flex-col gap-y-3 mb-5">
                        <p class=" text-lg mb-4 text-zinc-500">
                            Are you sure you want to delete this bus type?
                        </p>
                        <div class="flex gap-4 flex-col sm:flex-row items-center justify-between">
                            <button @click="deleteData()"
                                class="px-8 py-4 rounded-xl w-full text-white bg-red-600 hover:bg-red-600 flex justify-center gap-x-6 items-center">
                                <IconDelete class="h-6" />
                                <span class="text-base font-medium">
                                    {{ pending ? "Deleting" : "Delete Now" }}
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </TheModal>
</template>
