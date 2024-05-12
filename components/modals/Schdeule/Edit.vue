<script setup>
const scheduleStore = useScheduleStore()
const { data: scheduleData, pending, selected: scheduleSelected } = storeToRefs(scheduleStore)
const locationStore = useLocationStore()
locationStore.getData();
const { data: locationData } = storeToRefs(locationStore);
const busStore = useBusStore()
busStore.getData();
const { data: busData } = storeToRefs(busStore);
const modalStore = useModalStore();
const { currentModal } = storeToRefs(modalStore);
const { $notificationStore } = useNuxtApp();
import { object, string } from "yup";
const { handleSubmit, setErrors, resetForm } = useForm({
    validationSchema: object({
        name: string()
            .required("Schedule name is required"),
        bus: string()
            .required("Bus is required"),
        origin: string()
            .required("Origin is required"),
        destination: string()
            .required("Destination is required"),
        departure: string(),
        arrival: string(),
        fare: string()
            .required("Fare is required")
            .test('is-decimal', 'Fare must be in the decimal number', function (value) {
                const regex = /^\d+(\.\d+)?$/;
                return regex.test(value);
            }),
        policy: string(),
        notes: string()

    }),
});
const update = handleSubmit(async (values) => {
    try {
        await scheduleStore.update({
            name: values.name,
            bus_no: values.bus,
            origin: values.origin,
            departure: values.departure,
            destination: values.destination,
            arrival: values.arrival,
            fare: values.fare,
            policy: values.policy,
            notes: values.notes
        }, scheduleSelected.value.id);
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
                class="w-full relative sm:max-w-3xl bg-white shadow-2xl shadow-black/50 px-6 sm:px-8 rounded-3xl py-8 overflow-y-auto max-h-[80vh]">
                <div class="relative flex flex-col gap-y-4">
                    <header class="relative mb-3 w-full flex flex-row justify-between items-start gap-y-4">
                        <div class="flex flex-col gap-y-1">
                            <h3 class="text-xl font-semibold">Edit schdeule</h3>
                        </div>
                        <button
                            class="w-10 h-10 bg-transparent hover:bg-zinc-100 flex justify-center items-center rounded-full"
                            @click="modalStore.toggleModal('none')">
                            <IconX class="w-4" />
                        </button>
                    </header>
                    <div class="flex flex-col gap-y-3 mb-5">
                        <div>
                            <label class="mb-2 block font-medium text-sm">Schedule Name</label>
                            <base-input :input="scheduleSelected.name" name="name" type="text"
                                placeholder="Enter schdeule name" class="h-14 px-14 pl-4">
                            </base-input>
                        </div>
                        <div>
                            <label class="mb-2 block font-medium text-sm">Choose Bus</label>
                            <base-dropdown-select :input="scheduleSelected.bus.bus_no" :data="busData" name="bus"
                                class="w-full h-14 border items-center" optionValue="bus_no" optionLabel="name" />
                        </div>
                        <div class="grid gap-4 grid-cols-2">
                            <div>
                                <label class="mb-2 block font-medium text-sm">From</label>
                                <base-dropdown-select :input="scheduleSelected.origin.id" :data="locationData"
                                    name="origin" class="w-full h-14 border items-center" optionValue="id"
                                    optionLabel="name" />
                            </div>
                            <div>
                                <label class="mb-2 block font-medium text-sm">Departure Date/Time</label>
                                <base-input-datetimepicker :input="scheduleSelected.departure" name="departure"
                                    label="Departure date" class="w-full h-14 border items-center" />
                            </div>
                        </div>
                        <div class="grid gap-4 grid-cols-2">
                            <div>
                                <label class="mb-2 block font-medium text-sm">To </label>
                                <base-dropdown-select :input="scheduleSelected.destination.id" :data="locationData"
                                    name="destination" class="w-full h-14 border items-center" optionValue="id"
                                    optionLabel="name" />
                            </div>
                            <div>
                                <label class="mb-2 block font-medium text-sm">Arrival Date/Time</label>
                                <base-input-datetimepicker :input="scheduleSelected.arrival" name="arrival"
                                    label="Departure date" class="w-full h-14 border items-center" />
                            </div>
                        </div>
                        <div>
                            <base-input :input="scheduleSelected.fare" name="fare" type="text"
                                placeholder="Enter fare / seat" class="h-14 px-14 pl-4">
                            </base-input>
                        </div>
                        <div>
                            <base-textarea :input="scheduleSelected.policy" rows="5" name="policy" type="text"
                                placeholder="Enter policy text" class="px-14 pl-5">
                            </base-textarea>
                        </div>
                        <div>
                            <base-textarea :input="scheduleSelected.notes" rows="5" name="notes" type="text"
                                placeholder="Write additional notes" class="px-14 pl-5">
                            </base-textarea>
                        </div>
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
