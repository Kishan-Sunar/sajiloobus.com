<script setup>
const modalStore = useModalStore();
const { currentModal } = storeToRefs(modalStore);
const amenityStore = useAmentyStore();
const { $notificationStore } = useNuxtApp();
import { object, string } from "yup";
const { type, selected, pending } = storeToRefs(amenityStore);
const { handleSubmit, setErrors, resetForm } = useForm({
    validationSchema: object({
        name: string()
            .required("Name is required"),
        svg_icon: string()
            .required("Icon svg is required")
    }),
});
const update = handleSubmit(async (values) => {
    try {
        await amenityStore.update({
            name: values.name,
            svg_icon: values.svg_icon,
        }, selected.value.id);
        $notificationStore.pushNotification(
            "Updated successfully!",
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
                            <h3 class="text-xl font-semibold">Edit amenity</h3>
                        </div>
                        <button
                            class="w-10 h-10 bg-transparent hover:bg-zinc-100 flex justify-center items-center rounded-full"
                            @click="modalStore.toggleModal('none')">
                            <IconX class="w-4" />
                        </button>
                    </header>
                    <div class="flex flex-col gap-y-3 mb-5">
                        <base-input :input="selected.name" name="name" type="text" placeholder="Enter amenity name"
                            class="h-14 px-14">
                            <template #icon>
                                <Icon name="i-heroicons:pencil" size="25" class="absolute text-gray-500" />
                            </template>
                        </base-input>
                        <base-textarea :input="selected.svg_icon" rows="5" name="svg_icon" type="text"
                            placeholder="Enter svg code here" class="px-14">
                            <template #icon>
                                <Icon name="i-heroicons:code-bracket" size="25" class="absolute top-3 text-gray-500" />
                            </template>
                        </base-textarea>
                        <div class="flex gap-4 flex-col sm:flex-row items-center justify-between">
                            <button @click="update()"
                                class="px-8 py-4 rounded-xl w-full text-white bg-green-600 hover:bg-green-600 flex justify-center gap-x-6 items-center">
                                <span class="text-base font-medium">
                                    {{ pending ? "Updating" : "Update" }}
                                </span>
                                <IconChevronRight class="h-4" />
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </TheModal>
</template>
