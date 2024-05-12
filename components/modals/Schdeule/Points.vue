<script setup>
const { $notificationStore } = useNuxtApp();
const modalStore = useModalStore();
const { currentModal } = storeToRefs(modalStore);
const locationStore = useLocationStore()
locationStore.getData();
const { data: locationData } = storeToRefs(locationStore);
const routePointStore = useRoutePointStore();
routePointStore.getData()
const { pending, data: routePointData } = storeToRefs(routePointStore);
const scheduleStore = useScheduleStore();
const { selected: selectedSchedule } = storeToRefs(scheduleStore);
import { object, string } from "yup";
const { handleSubmit, setErrors, resetForm } = useForm({
    validationSchema: object({
        location_id: string()
            .required("Location is required"),
        type: string()
            .required("Location type is required")
    }),
});
const save = handleSubmit(async (values) => {
    try {
        await routePointStore.save({
            schedule_id: selectedSchedule.value.id,
            location_id: values.location_id,
            type: values.type,
        });
        $notificationStore.pushNotification(
            "Added successfully!",
            "success"
        );
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
const locationTypes = [
    {
        value: "board",
        label: "Boarding Point"
    },
    {
        value: "drop",
        label: "Drop Point"
    }
]
const dropPoints = computed(() => {
    return routePointData.value.filter((data) => {
        return data.type === "drop"
    })
})
const boardPoints = computed(() => {
    return routePointData.value.filter((data) => {
        return data.type === "board"
    })
})
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
                class="w-full relative sm:max-w-2xl bg-white shadow-2xl shadow-black/50 px-6 sm:px-8 rounded-3xl py-8 overflow-y-auto max-h-[80vh]">
                <div class="relative flex flex-col gap-y-4">
                    <header class="relative mb-3 w-full flex flex-row justify-between items-start gap-y-4">
                        <div class="flex flex-col gap-y-1">
                            <h3 class="text-xl font-semibold">Manage Points</h3>
                        </div>
                        <button
                            class="w-10 h-10 bg-transparent hover:bg-zinc-100 flex justify-center items-center rounded-full"
                            @click="modalStore.toggleModal('none')">
                            <IconX class="w-4" />
                        </button>
                    </header>
                    <div class="grid sm:grid-cols-2 rounded-md">
                        <div class="sm:col-span-2 border rounded-md p-4 mb-4">
                            <span class="block font-semibold text-sm mb-2">New Point</span>
                            <div class="flex justify-between gap-2">
                                <div class="w-full">
                                    <base-dropdown-select :input="locationData[0].id" :data="locationData"
                                        name="location_id" class="w-full h-14 border items-center" optionValue="id"
                                        optionLabel="name" />
                                </div>
                                <div class="w-full">
                                    <base-dropdown-select :input="locationTypes[0].value" :data="locationTypes"
                                        name="type" class="w-full h-14 border items-center" optionValue="value"
                                        optionLabel="label" />
                                </div>
                                <button @click="save()"
                                    class="min-w-14 h-14 flex justify-center items-center rounded-md text-white bg-green-600 hover:bg-green-600">
                                    <IconPlusStroked class="h-6" />
                                </button>
                            </div>
                        </div>
                        <div class="p-2 border">
                            <span class="font-semibold mb-2 block text-sm">Boarding Points</span>
                            <ul v-if="boardPoints.length">
                                <li v-for="item in boardPoints" :key="item.id" class="flex gap-x-1 justify-between">

                                    {{ item.location[0].name }}
                                    <IconDelete @click="routePointStore.delete(item.id)"
                                        class="h-5 cursor-pointer hover:text-red-600 text-slate-500" />
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
                                    <IconDelete @click="routePointStore.delete(item.id)"
                                        class="h-5 cursor-pointer hover:text-red-600 text-slate-500" />
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
