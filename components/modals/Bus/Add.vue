<script setup>
const modalStore = useModalStore();
const { currentModal } = storeToRefs(modalStore);
const { $notificationStore, $operatorStore } = useNuxtApp();
import { object, string } from "yup";
const { operator } = storeToRefs($operatorStore)
const busStore = useBusStore();
const busTypeStore = useBusTypeStore();
busTypeStore.getData()
const { data } = storeToRefs(busTypeStore);
const { type, pending } = storeToRefs(busStore);
const { handleSubmit, setErrors, resetForm } = useForm({
    validationSchema: object({
        bus_no: string()
            .required("Bus no is required"),
        name: string()
            .required("Bus name is required"),
        bus_type: string()
            .required("Type is required"),
    }),
});
const save = handleSubmit(async (values) => {
    try {
        await busStore.save({
            bus_no: values.bus_no,
            name: values.name,
            operator_id: operator.value.id,
            bus_type: values.bus_type,
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
                            <h3 class="text-xl font-semibold">New bus </h3>
                        </div>
                        <button
                            class="w-10 h-10 bg-transparent hover:bg-zinc-100 flex justify-center items-center rounded-full"
                            @click="modalStore.toggleModal('none')">
                            <IconX class="w-4" />
                        </button>
                    </header>
                    <div class="flex flex-col gap-y-3 mb-5">
                        <base-input name="bus_no" type="text" placeholder="Enter bus number" class="h-14 px-14">
                            <template #icon>
                                <IconBusSelection class="absolute h-6 text-gray-500" />
                            </template>
                        </base-input>
                        <base-input name="name" type="text" placeholder="Enter bus name" class="h-14 px-14">
                            <template #icon>
                                <Icon name="i-heroicons:pencil" size="25" class="absolute text-gray-500" />
                            </template>
                        </base-input>
                        <base-select name="bus_type">
                            <template #icon>
                                <IconBus class="absolute h-6 text-gray-500" />
                            </template>
                            <template #options>
                                <option value="" disabled selected>Bus type</option>
                                <option :value="item.id" v-for="item in data">
                                    {{ item.name }}
                                </option>
                            </template>
                        </base-select>
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
