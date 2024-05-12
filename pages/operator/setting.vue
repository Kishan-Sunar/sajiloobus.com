<script setup>
definePageMeta({
    layout: 'operator',
    middleware: ["operator-auth"],
});
import { object, string } from "yup";
const { $notificationStore, $userStore } = useNuxtApp();
const passengerStore = usePassengerStore();
const { passenger } = storeToRefs(passengerStore);
const { user } = storeToRefs($userStore)

const dobInput = ref(passenger.value.dob);
const { handleSubmit, setErrors, resetForm } = useForm({
    validationSchema: object({
        full_name: string()
            .required('Full name is required'),
        address: string(),
        contact: string(),
        gender: string(),
        email: string()
            .required("Email is required")
            .email("Please enter valid email address"),
    }),
});


const updateProfile = handleSubmit(async (values) => {
    try {
        await passengerStore.changeProfile({
            full_name: values.full_name ?? '',
            address: values.address ?? '',
            contact: values.contact ?? '',
            gender: values.gender ?? '',
            dob: dobInput.value ?? '',
            email: values.email,
        }, user.value.id);
        $notificationStore.pushNotification(
            "Profile successfully updated!",
            "success"
        );
    } catch (error) {
        if (error.data.errors) {
            setErrors(error.data.errors);
        }
        $notificationStore.pushNotification(
            error.data.erros,
            "danger"
        );
    } finally {
    }
});
</script>

<template>
    <header class="py-4 bg-green-500 border-b">
        <div class="container mx-auto flex justify-between items-center">
            <h3 class="text-xl text-white font-semibold">Settings</h3>
        </div>
    </header>
    <div class="bg-white py-5">
        <div class="container mx-auto">
            <div class="flex flex-col gap-y-1">
                <div>
                    <div class="bg-white rounded-xl shadow-2xl shadow-black/10">
                        <div class="grid divide-x sm:grid-cols-3">
                            <div class="mb-4 col-span-2">
                                <div class="border-b px-4 sm:px-6 py-6">
                                    <h3 class="text-xl font-semibold">Edit Profile</h3>
                                </div>
                                <div class="px-4 sm:px-6 py-5">
                                    <div class="grid grid-cols-2 gap-x-4 gap-y-6">
                                        <div>
                                            <label class="text-slate-500 mb-2 block font-medium text-sm">Full
                                                Name</label>
                                            <base-input :input="user.full_name" name="full_name" type="text"
                                                placeholder="Full name" class="h-14 px-14">
                                                <template #icon>
                                                    <Icon name="i-heroicons:user" size="25"
                                                        class="absolute text-gray-500" />
                                                </template>
                                            </base-input>
                                        </div>
                                        <div>
                                            <label class="text-slate-500 mb-2 block font-medium text-sm">Address</label>
                                            <base-input :input="passenger.address" name="address" type="text"
                                                placeholder="Address" class="h-14 px-14">
                                                <template #icon>
                                                    <Icon name="i-heroicons:map" size="25"
                                                        class="absolute text-gray-500" />
                                                </template>
                                            </base-input>
                                        </div>
                                        <div>
                                            <label class="text-slate-500 mb-2 block font-medium text-sm">Email
                                                Address</label>
                                            <base-input :input="user.email" name="email" type="email"
                                                placeholder="Email" class="h-14 px-14">
                                                <template #icon>
                                                    <Icon name="i-heroicons:envelope-open" size="25"
                                                        class="absolute text-gray-500" />
                                                </template>
                                            </base-input>
                                        </div>
                                        <div>
                                            <label class="text-slate-500 mb-2 block font-medium text-sm">Gender</label>
                                            <base-select name="gender">
                                                <template #icon>
                                                    <IconGender class="absolute h-6 text-gray-500" />
                                                </template>
                                                <template #options>
                                                    <option disabled>Gender</option>
                                                    <option value="male" :selected="passenger.gender == 'male'">Male
                                                    </option>
                                                    <option value="female" :selected="passenger.gender == 'female'">
                                                        Female
                                                    </option>
                                                    <option value="other" :selected="passenger.gender == 'other'">Other
                                                    </option>
                                                </template>
                                            </base-select>
                                        </div>
                                        <div>
                                            <label class="text-slate-500 mb-2 block font-medium text-sm">
                                                Date of birth
                                            </label>
                                            <base-input-datepicker label="Date" @action="(date) => dobInput = date"
                                                :value="dobInput" class="h-14 px-14">
                                                <template #icon>
                                                    <Icon name="i-heroicons:map" size="25"
                                                        class="absolute text-gray-500" />
                                                </template>
                                            </base-input-datepicker>
                                        </div>
                                        <div>
                                            <label class="text-slate-500 mb-2 block font-medium text-sm">Phone
                                                Number</label>
                                            <base-input :input="passenger.contact" name="contact" type="text"
                                                placeholder="Phone Number" class="h-14 px-14">
                                                <template #icon>
                                                    <Icon name="i-heroicons:phone" size="25"
                                                        class="absolute text-gray-500" />
                                                </template>
                                            </base-input>
                                        </div>
                                        <div class="col-span-2 flex justify-end">
                                            <button @click="updateProfile"
                                                class="font-medium transition-all duration-300 text-white/80 bg-green-600 py-4 px-10 shadow rounded-2xl flex items-center justify-center hover:bg-green-700">
                                                Update Now
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <TheChangePassword />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>