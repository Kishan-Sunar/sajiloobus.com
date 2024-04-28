<script setup>
const { $notificationStore, $operatorStore } = useNuxtApp();
const { operator } = storeToRefs($operatorStore)
import { object, string } from "yup";
const busStore = useBusStore();
const busTypeStore = useBusTypeStore()
const { data: busTypes } = storeToRefs(busTypeStore);
busStore.getData();
const { data, pending, selected, searchData, uploadingFeaturedPhoto } = storeToRefs(busStore);
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
const update = handleSubmit(async (values) => {
    try {
        await busStore.update({
            operator_id: operator.value.id,
            bus_no: values.bus_no,
            name: values.name,
            bus_type: values.bus_type,
        }, selected.value.bus_no);
        $notificationStore.pushNotification(
            "Updated successfully!",
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
async function handelFileUpload(event) {
    const photo = event.target.files[0]
    const formData = new FormData()
    formData.append('bus_no', selected.value.bus_no)
    formData.append('featured_photo_path', photo)
    try {
        const response = await busStore.updateFeaturedPhoto(formData)
        $notificationStore.pushNotification(response.message)
    } catch (error) {
        if (error.status === 422) $notificationStore.pushNotification(error.data.message, 'danger')
    }
}
</script>
<template>
    <div>
        <div class="grid divide grid-cols-2">
            <div class="sm:pr-4">
                <div class="relative">
                    <div class="bg-slate-400 h-60 rounded-xl overflow-hidden relative">
                        <span v-if="uploadingFeaturedPhoto">Uploading</span>
                        <img v-else
                            :src="$config.public.apiURL + '/storage/' + selected.featured_photo_path ?? '/avatar/bus-placeholder.webp'"
                            class="h-full w-full object-cover" alt="Bus Avatar" />
                        <label for="profile"
                            class="bg-white flex items-center gap-x-1 cursor-pointer hover:bg-white/90 text-sm font-semibold shadow-lg py-2 px-6 rounded-full absolute bottom-2 left-1/2 -translate-x-1/2">Upload
                            <Icon name="i-heroicons:arrow-up-circle-20-solid" size="20" />
                        </label>
                        <input type="file" id="profile" class="hidden" accept="image/*" @change="handelFileUpload" />
                    </div>
                </div>
            </div>
            <div class="pl-4">
                <div class="flex flex-col gap-y-2 mb-5">
                    <base-input disabled :input="selected.bus_no" name="bus_no" type="text"
                        placeholder="Enter bus number" class="h-14 px-14">
                        <template #icon>
                            <IconBusSelection class="absolute h-6 text-gray-500" />
                        </template>
                    </base-input>
                    <base-input :input="selected.name" name="name" type="text" placeholder="Enter bus name"
                        class="h-14 px-14">
                        <template #icon>
                            <Icon name="i-heroicons:pencil" size="25" class="absolute text-gray-500" />
                        </template>
                    </base-input>
                    <base-select name="bus_type">
                        <template #icon>
                            <IconBus class="absolute h-6 text-gray-500" />
                        </template>
                        <template #options>
                            <option value="" disabled>Bus type</option>
                            <option :value="item.id" :key="item.id" v-for="item in busTypes"
                                :selected="item.id == selected.bus_type">
                                {{ item.name }}
                            </option>
                        </template>
                    </base-select>
                    <div class="flex gap-4 flex-col sm:flex-row items-center justify-between">
                        <button @click="update()"
                            class="px-8 py-4 rounded-xl w-full text-white bg-green-600 hover:bg-green-600 flex justify-center gap-x-6 items-center">
                            <span class="text-base font-medium">
                                {{ pending ? "Updating" : "update" }}
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>