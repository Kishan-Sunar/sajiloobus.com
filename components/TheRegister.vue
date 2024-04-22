<script setup>
import { object, string } from "yup";
const { $notificationStore, $userStore } = useNuxtApp();
const { type, pending } = storeToRefs($userStore);
const modalStore = useModalStore();
const { currentModal } = storeToRefs(modalStore);
defineProps({
    show: {
        required: true,
        type: Boolean
    }
})
const { handleSubmit, setErrors, resetForm } = useForm({
    validationSchema: object({
        name: string(),
        email: string()
            .required("Email is required")
            .email("Please enter valid email address"),
        password: string()
            .required("Password is required")
            .min(8, "Password must be at least 8 characters"),
    }),
});

const register = handleSubmit(async (values) => {
    try {
        await $userStore.registerPassenger({
            name: values.name,
            full_name: values.full_name,
            email: values.email,
            password: values.password,
            gender: values.gender,
            address: values.address,
        });
        $notificationStore.pushNotification(
            "Registered successfully!",
            "success"
        );
        modalStore.toggleModal("none");
        resetForm();
    } catch (error) {
        if (error.data.errors) {
            setErrors(error.data.errors);
        }
        $notificationStore.pushNotification(
            "Something went wrong!",
            "danger"
        );
    } finally {
        pending.value = false;
    }
});
</script>

<template>
    <TheModal @close-current-modal="$emit('close')" :show="show">
        <template #content>
            <div
                class="w-full relative sm:w-[550px] bg-white shadow-2xl shadow-black/50 px-6 sm:px-8 rounded-3xl py-8  overflow-y-auto max-h-[80vh]">
                <div class="relative flex flex-col gap-y-4">
                    <header class="relative mb-3 w-full flex flex-row justify-between items-start gap-y-4">
                        <div class="flex flex-col gap-y-1">
                            <h3 class="text-xl font-semibold">Signup</h3>
                            <p class="text-sm">
                                Already have an account?
                                <span @click="modalStore.toggleModal('login')"
                                    class="cursor-pointer text-green-600 hover:text-green-600 font-semibold">Login</span>
                            </p>
                        </div>
                        <button
                            class="w-10 h-10 bg-transparent hover:bg-zinc-100 flex justify-center items-center rounded-full"
                            @click="modalStore.toggleModal('none')">
                            <IconX class="w-4" />
                        </button>
                    </header>
                    <div class="flex flex-col gap-y-3 mb-5">
                        <base-input name="name" type="text" placeholder="Username" aria-autocomplete="false"
                            class="h-14 px-14">
                            <template #icon>
                                <Icon name="i-heroicons:user" size="25" class="absolute text-gray-500" />
                            </template>
                        </base-input>
                        <base-input name="full_name" type="text" placeholder="Fullname" class="h-14 px-14">
                            <template #icon>
                                <Icon name="i-heroicons:user-circle" size="25" class="absolute text-gray-500" />
                            </template>
                        </base-input>

                        <base-input name="email" type="email" placeholder="Enter your email" class="h-14 px-14">
                            <template #icon>
                                <Icon name="i-heroicons:envelope-open" size="25" class="absolute text-gray-500" />
                            </template>
                        </base-input>

                        <base-select name="gender" selected="male">
                            <template #icon>
                                <IconGender class="absolute h-6 text-gray-500" />
                            </template>
                            <template #options>
                                <option value="" disabled selected>Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Other</option>
                            </template>
                        </base-select>
                        <base-input name="password" :type="type" placeholder="Password" class="h-14 px-14">
                            <template #icon>
                                <Icon :name="type === 'password' ? 'i-heroicons:lock-closed' : 'i-heroicons:lock-open'"
                                    size="25" class="absolute text-gray-500" />
                                <Icon v-if="type === 'password'" name="heroicons:eye" size="24"
                                    class="absolute cursor-pointer right-4 w-5 text-gray-500"
                                    @click="$userStore.togglePassword()" />
                                <Icon v-else name="heroicons:eye-slash" size="24"
                                    class="absolute cursor-pointer right-4 w-5 text-gray-500"
                                    @click="$userStore.togglePassword()" />
                            </template>
                        </base-input>
                        <div class="flex gap-4 flex-col sm:flex-row items-center justify-between">
                            <div class="flex items-center gap-x-4">
                                <input id="tandc" type="checkbox" class="h-6 w-6 accent-green-600" />
                                <label for="tandc" class="text-sm cursor-pointer select-none">
                                    Agree to
                                    <router-link to="#" class="text-green-600 font-semibold hover:text-green-600">terms
                                        and
                                        conditions</router-link>
                                </label>
                            </div>
                            <button @click="register"
                                class="px-8 py-4 rounded-full text-white bg-green-600 hover:bg-green-600 flex justify-between gap-x-6 items-center">
                                <span class="text-base font-medium">Next</span>
                                <IconChevronRight class="h-4" />
                            </button>
                        </div>
                    </div>
                    <TheSocialLogin />
                </div>
            </div>
        </template>
    </TheModal>
</template>