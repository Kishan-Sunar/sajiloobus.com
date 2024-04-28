<script setup>
const { $notificationStore, $operatorStore } = useNuxtApp();
const busStore = useBusStore();
const { selected: selectedBus } = storeToRefs(busStore);
const busPhotoStore = useBusPhotoStore();
busPhotoStore.getData();
const { data, pending } = storeToRefs(busPhotoStore);
import { object, string } from "yup";
const photoPath = ref('');
const { handleSubmit, setErrors, resetForm } = useForm({
    validationSchema: object({
        title: string()
            .required("Photo title is required"),
    }),
});

const save = handleSubmit(async (values) => {
    try {
        const formData = new FormData()
        formData.append('title', values.title)
        formData.append('bus_no', selectedBus.value.bus_no)
        formData.append('photo_path', photoPath.value)
        await busPhotoStore.save(formData);
        $notificationStore.pushNotification(
            "Added successfully!",
            "success"
        );
        photoPath.value = ''
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
                <div class="grid grid-cols-2 gap-2 min-h-[50vh] max-h-[50vh] overflow-y-auto">
                    <div v-if="data.length" v-for="item in data" :key="item">
                        <div class="px-4 py-2 rounded-xl border">
                            <div class="space-y-2">
                                <div class="flex items-center text-green-600">
                                    <img :src="item.photo_path ? $config.public.apiURL + '/storage/' + item.photo_path : '/avatar/bus-placeholder.webp'"
                                        class="h-40 w-full object-cover" alt="Bus Avatar" />
                                </div>
                                <div class="flex border-t py-2 items-center justify-between gap-x-1">
                                    <span class="text-sm font-medium">{{ item.title }}</span>
                                    <SharedActionButton @action="() => (busPhotoStore.delete(item.id))" title="Delete">
                                        <IconDelete class="h-4" />
                                    </SharedActionButton>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div v-else class="flex col-span-3 flex-col items-center justify-center w-full">
                        <TheEmptyMessage class="w-full" message="No photo available" />
                    </div>
                </div>
            </div>
            <div class="sm:pl-4">
                <div class="gap-2 flex flex-col">
                    <div class="border-b mb-2 px-2 pb-4" data-v-inspector="pages/dashboard/profile.vue:19:25">
                        <h3 class="text-xl font-semibold" data-v-inspector="pages/dashboard/profile.vue:20:29">
                            New Photo
                        </h3>
                    </div>
                    <base-input name="title" type="text" placeholder="Enter photo title" class="h-14 px-14">
                        <template #icon>
                            <Icon name="i-heroicons:pencil" size="25" class="absolute text-gray-500" />
                        </template>
                    </base-input>
                    <base-file :input="photoPath" @action="(photo) => photoPath = photo" class="pl-4"></base-file>
                    <div class="flex gap-4 flex-col sm:flex-row items-center justify-end">
                        <button @click="save()"
                            class="px-8 w-full py-4 rounded-xl text-white bg-green-600 hover:bg-green-600 flex justify-between gap-x-6 items-center">
                            <span class="text-base font-medium">
                                Upload Now
                            </span>
                            <IconUpload class="h-4" />
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>