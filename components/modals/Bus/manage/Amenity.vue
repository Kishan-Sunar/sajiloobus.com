<script setup>
const { $notificationStore, $operatorStore } = useNuxtApp();
const busStore = useBusStore();
const { selected: selectedBus } = storeToRefs(busStore);
const amenityStore = useAmentyStore();
amenityStore.getData();
const { data: amenitydata } = storeToRefs(amenityStore);
const busAmenityStore = useBusAmenitiesStore();
busAmenityStore.getData();
const { data, pending } = storeToRefs(busAmenityStore);
import { object, string } from "yup";
const { handleSubmit, setErrors, resetForm } = useForm({
    validationSchema: object({
        amenity_id: string()
            .required("Amenity is required"),
    }),
});

const save = handleSubmit(async (values) => {
    try {
        await busAmenityStore.save({
            bus_no: selectedBus.value.bus_no,
            amenity_id: values.amenity_id,
        });
        $notificationStore.pushNotification(
            "Added successfully!",
            "success"
        );
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
</script>
<template>
    <div>

        <div class="grid divide-x grid-cols-2">
            <div class="sm:pr-5">
                <div class="space-y-2 min-h-[50vh] max-h-[50vh] overflow-y-auto">
                    <div v-if="data.length" v-for="item in data" :key="item">
                        <div class="px-4 py-2 rounded-xl border">
                            <div
                                class="grid grid-cols-2 items-center sm:grid-cols-[40px_repeat(2,1fr)] gap-y-2 gap-x-2">
                                <div class="flex items-center text-green-600">
                                    <div class="h-8 w-8" v-html="item.svg_icon"></div>
                                </div>
                                <div>
                                    <span class="text-sm font-medium">{{ item.name }}</span>
                                </div>
                                <div class="flex justify-end gap-x-1">
                                    <SharedActionButton
                                        @action="() => (busAmenityStore.delete(selectedBus.bus_no, item.id))"
                                        title="More options">
                                        <IconX class="h-3" />
                                    </SharedActionButton>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div v-else class="flex col-span-3 flex-col items-center justify-center w-full">
                        <TheEmptyMessage class="w-full" message="No records available" />
                    </div>
                </div>
            </div>
            <div class="sm:pl-4">
                <div class="gap-2 flex flex-col">
                    <div class="border-b mb-2 px-2 pb-4" data-v-inspector="pages/dashboard/profile.vue:19:25">
                        <h3 class="text-xl font-semibold" data-v-inspector="pages/dashboard/profile.vue:20:29">
                            New Amenity
                        </h3>
                    </div>
                    <base-select name="amenity_id" class="pl-4">
                        <template #options>
                            <option value="" disabled selected>Amenities</option>
                            <option :value="item.id" v-for="item in amenitydata">
                                {{ item.name }}
                            </option>
                        </template>
                    </base-select>
                    <div class="flex gap-4 flex-col sm:flex-row items-center justify-end">
                        <button @click="save()"
                            class="px-8 w-full py-4 rounded-xl text-white bg-green-600 hover:bg-green-600 flex justify-between gap-x-6 items-center">
                            <span class="text-base font-medium">
                                Add New
                            </span>
                            <IconChevronRight class="h-4" />
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>