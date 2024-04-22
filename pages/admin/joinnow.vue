<script setup>
definePageMeta({
    layout: 'nolayout',
})

import { object, string } from "yup";
const { $notificationStore, $userStore } = useNuxtApp();
const { type, pending } = storeToRefs($userStore);

const { handleSubmit, setErrors, resetForm } = useForm({
    validationSchema: object({
        name: string(),
        contact: string().required("Contact is required"),
        address: string().required("Address is required"),
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
        await $userStore.registerAdmin({
            name: values.name,
            full_name: values.full_name,
            email: values.email,
            password: values.password,
            address: values.address,
            contact: values.contact,
        });
        $notificationStore.pushNotification(
            "Registered successfully!",
            "success"
        );
        navigateTo('/admin/dashboard');
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
    <main>
        <div class="h-dvh w-dvw pt-10 sm:pt-20 pb-10 overflow-y-auto bg-[#181D31]">
            <div class="container mx-auto">
                <div class="grid sm:px-16 sm:grid-cols-2 gap-x-8 gap-y-10">
                    <div>
                        <header class="space-y-2 mb-6">
                            <h3 class="text-2xl text-white font-medium">Join Sajiloobus</h3>
                            <p>
                                <span class="opacity-70 text-white mr-2">Already a member?</span>
                                <nuxt-link to="/admin" class="text-green-600 text-sm font-medium hover:opacity-90">
                                    Login Now
                                </nuxt-link>
                            </p>
                        </header>
                        <div class="space-y-4">
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

                            <base-input name="contact" type="text" placeholder="Enter your contact" class="h-14 px-14">
                                <template #icon>
                                    <Icon name="i-heroicons:phone" size="25" class="absolute text-gray-500" />
                                </template>
                            </base-input>

                            <base-input name="address" type="text" placeholder="Enter your address" class="h-14 px-14">
                                <template #icon>
                                    <Icon name="i-heroicons:map" size="25" class="absolute text-gray-500" />
                                </template>
                            </base-input>

                            <base-input name="password" :type="type" placeholder="Password" class="h-14 px-14">
                                <template #icon>
                                    <Icon
                                        :name="type === 'password' ? 'i-heroicons:lock-closed' : 'i-heroicons:lock-open'"
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
                                    <label for="tandc" class="text-sm text-white cursor-pointer select-none">
                                        Agree to
                                        <router-link to="#"
                                            class="text-green-600 font-semibold hover:text-green-600">terms
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
                    </div>
                    <div class="sticky top-32">
                        <OperatorPromoCard />
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>