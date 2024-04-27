<script setup lang="ts">
definePageMeta({
    layout: 'nolayout',
})
const modalStore = useModalStore();
const { currentModal } = storeToRefs(modalStore);
const { $notificationStore, $userStore } = useNuxtApp();
import { object, string } from "yup";
const { type, pending } = storeToRefs($userStore);
const { handleSubmit, setErrors, resetForm } = useForm({
    validationSchema: object({
        email: string()
            .required("Email is required")
            .email("Please enter valid email address"),
        password: string()
            .required("Password is required")
            .min(8, "Password must be at least 8 characters"),
    }),
});
const login = handleSubmit(async (values) => {
    try {
        await $userStore.signIn({
            email: values.email,
            password: values.password,
        });
        navigateTo("/admin/dashboard");
        $notificationStore.pushNotification(
            "Logged in successfully!",
            "success"
        );
        useAdminStore().adminDetails()
        resetForm();
    } catch (error) {
        console.log(error);
        $notificationStore.pushNotification(
            "Invalid email or password",
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
    <main>
        <div class="h-dvh w-dvw pt-10 sm:pt-40 pb-10 overflow-y-auto bg-[#181D31]">
            <div class="container mx-auto">
                <div class="grid sm:px-16 sm:grid-cols-2 gap-x-8 gap-y-10">
                    <div>
                        <header class="space-y-2 mb-6">
                            <h3 class="text-2xl text-white font-medium">Login</h3>
                            <p>
                                <span class="opacity-70 text-white mr-2">Don’t have an account yet?</span>
                                <nuxt-link to="/admin/joinnow"
                                    class="text-green-600 text-sm font-medium hover:opacity-90">Join
                                    Now</nuxt-link>
                            </p>
                        </header>
                        <div class="space-y-4">
                            <base-input name="email" type="email" placeholder="Enter your email" class="h-14 px-14">
                                <template #icon>
                                    <Icon name="i-heroicons:user" size="25" class="absolute text-gray-500" />
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
                            <div>
                                <button @click="modalStore.toggleModal('reset-email')"
                                    class="font-medium text-sm text-white hover:opacity-60">
                                    Forgot Password ?
                                </button>
                            </div>
                            <div>
                                <button @click="login"
                                    class="py-5 font-medium text-md w-full flex justify-center items-center px-2 rounded-2xl text-white bg-green-600 hover:bg-green-600 transition-all duration-300">
                                    Login
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="sticky top-32">
                        <AdminPromoCard class=" sm:-mt-[40px]" />
                    </div>
                </div>
            </div>
        </div>
    </main>
    <AdminResetEmail :show="currentModal == 'reset-email'" />
    <AdminResetCode :show="currentModal == 'reset-code'" />
    <AdminResetPassword :show="currentModal == 'reset-password'" />
</template>