<script setup>
const modalStore = useModalStore();
const { currentModal } = storeToRefs(modalStore);
const busTypeStore = useBusTypeStore();
const { $notificationStore, $operatorStore } = useNuxtApp();
import { object, string } from "yup";
const { type, pending } = storeToRefs(busTypeStore);
const { operator } = storeToRefs($operatorStore)
const { handleSubmit, setErrors, resetForm } = useForm({
    validationSchema: object({
        name: string()
            .required("City is required"),
        model: string()
            .required("City code is required"),
        company: string()
            .required("Company is required"),
        type: string()
            .required("Type is required"),
        grid_size: string().
            required("Grid Size is required")
            .test('grid-size', 'Grid size must be in the format "number x number', function (value) {
                const regex = /^\d+\s*x\s*\d+$/;
                return regex.test(value);
            })
    }),
});
const save = handleSubmit(async (values) => {
    try {
        await busTypeStore.save({
            operator_id: operator.value.id,
            name: values.name,
            model: values.model,
            company: values.company,
            type: values.type,
            grid_size: values.grid_size,
        });
        $notificationStore.pushNotification(
            "Added successfully!",
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
                            <h3 class="text-xl font-semibold">New bus type</h3>
                        </div>
                        <button
                            class="w-10 h-10 bg-transparent hover:bg-zinc-100 flex justify-center items-center rounded-full"
                            @click="modalStore.toggleModal('none')">
                            <IconX class="w-4" />
                        </button>
                    </header>
                    <div class="flex flex-col gap-y-3 mb-5">
                        <base-input name="name" type="text" placeholder="Enter name" class="h-14 px-14">
                            <template #icon>
                                <Icon name="i-heroicons:pencil" size="25" class="absolute text-gray-500" />
                            </template>
                        </base-input>
                        <base-input name="model" type="text" placeholder="Enter model" class="h-14 px-14">
                            <template #icon>
                                <Icon name="i-heroicons:pencil" size="25" class="absolute text-gray-500" />
                            </template>
                        </base-input>
                        <base-input name="company" type="text" placeholder="Enter company" class="h-14 px-14">
                            <template #icon>
                                <Icon name="i-heroicons:pencil" size="25" class="absolute text-gray-500" />
                            </template>
                        </base-input>
                        <base-input name="type" type="text" placeholder="Enter type" class="h-14 px-14">
                            <template #icon>
                                <Icon name="i-heroicons:pencil" size="25" class="absolute text-gray-500" />
                            </template>
                        </base-input>
                        <base-input name="grid_size" type="text" placeholder="Enter grid size 2 x 3" class="h-14 px-14">
                            <template #icon>
                                <Icon name="i-heroicons:pencil" size="25" class="absolute text-gray-500" />
                            </template>
                        </base-input>
                        <div class="flex gap-4 flex-col sm:flex-row items-center justify-between">
                            <button @click="save()"
                                class="px-8 py-4 rounded-xl w-full text-white bg-green-600 hover:bg-green-600 flex justify-center gap-x-6 items-center">
                                <span class="text-base font-medium">
                                    {{ pending ? "Adding" : "Add" }}
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
