<script setup>
const modalStore = useModalStore();
const { currentModal } = storeToRefs(modalStore);
const { $notificationStore } = useNuxtApp();
import { object, string } from "yup";
const passengerStore = usePassengerStore();
const { type, pending } = storeToRefs(passengerStore);
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
        await usePassengerStore().signIn({
            email: values.email,
            password: values.password,
        });
        $notificationStore.pushNotification(
            "Logged in successfully!",
            "success"
        );
        modalStore.toggleModal("none");
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
    <TheModal @close-current-modal="$emit('close')" :show="show">
        <template #content>
            <div
                class="w-full relative sm:w-[550px] bg-white shadow-2xl shadow-black/50 px-6 sm:px-8 rounded-3xl py-8 overflow-y-auto max-h-[80vh]">
                <div class="relative flex flex-col gap-y-4">
                    <header class="relative mb-3 w-full flex flex-row justify-between items-start gap-y-4">
                        <div class="flex flex-col gap-y-1">
                            <h3 class="text-xl font-semibold">Login</h3>
                            <p class="text-sm">
                                Don’t have an account?
                                <span @click="modalStore.toggleModal('register')"
                                    class="cursor-pointer text-green-600 hover:text-green-600 font-semibold">Sign
                                    Up</span>
                            </p>
                        </div>
                        <button
                            class="w-10 h-10 bg-transparent hover:bg-zinc-100 flex justify-center items-center rounded-full"
                            @click="modalStore.toggleModal('none')">
                            <IconX class="w-4" />
                        </button>
                    </header>
                    <div class="flex flex-col gap-y-3 mb-5">
                        <base-input name="email" type="email" placeholder="Enter your email" class="h-14 px-14">
                            <template #icon>
                                <Icon name="i-heroicons:user" size="25" class="absolute text-gray-500" />
                            </template>
                        </base-input>
                        <base-input name="password" :type="type" placeholder="Password" class="h-14 px-14">
                            <template #icon>
                                <Icon :name="type === 'password' ? 'i-heroicons:lock-closed' : 'i-heroicons:lock-open'"
                                    size="25" class="absolute text-gray-500" />
                                <Icon v-if="type === 'password'" name="heroicons:eye" size="24"
                                    class="absolute cursor-pointer right-4 w-5 text-gray-500"
                                    @click="passengerStore.togglePassword()" />
                                <Icon v-else name="heroicons:eye-slash" size="24"
                                    class="absolute cursor-pointer right-4 w-5 text-gray-500"
                                    @click="passengerStore.togglePassword()" />
                            </template>
                        </base-input>
                        <div class="mb-2">
                            <button @click="modalStore.toggleModal('reset-email')"
                                class="text-sm font-medium hover:text-green-600">Forgot
                                Password
                                ?</button>
                        </div>
                        <div class="flex gap-4 flex-col sm:flex-row items-center justify-between">
                            <div class="flex items-center gap-x-4">
                                <input id="tandc" type="checkbox" class="h-6 w-6 accent-green-600" />
                                <label for="tandc" class="text-sm cursor-pointer select-none">
                                    Remember Me
                                </label>
                            </div>
                            <button @click="login"
                                class="px-8 py-4 rounded-full text-white bg-green-600 hover:bg-green-600 flex justify-between gap-x-6 items-center">
                                <span class="text-base font-medium">
                                    {{ pending ? "Logging in" : "login" }}
                                </span>
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
