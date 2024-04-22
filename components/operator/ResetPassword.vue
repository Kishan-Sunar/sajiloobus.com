<script setup>
const modalStore = useModalStore();
const { currentModal } = storeToRefs(modalStore);
const { $notificationStore } = useNuxtApp();
import { object, string } from "yup";
const userStore = useUserStore();
const { resetEmail, pendingResetPassword } = storeToRefs(userStore);

const { handleSubmit, setErrors, resetForm } = useForm({
    validationSchema: object({
        password: string()
            .required("Password is required")
            .min(8, "Minimum password length is 8 characters"),
        confirmPassword: string()
            .required("Confirm password is required")
            .test('passwords-match', 'Passwords do not match', function (value) {
                return value === this.parent.password;
            })
    }),
});
const resetPassword = handleSubmit(async (values) => {
    try {
        await userStore.resetPassword({
            email: resetEmail.value,
            password: values.password
        });
        modalStore.toggleModal('none')
        $notificationStore.pushNotification(
            "Password successfully updated!",
            "success"
        );

        resetForm();
    } catch (error) {
        console.log(error);
        $notificationStore.pushNotification(
            "Something went wrong. try again",
            "danger"
        );
    } finally {
        pendingResetPassword.value = false;
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
                            <h3 class="text-xl font-semibold">New password</h3>
                        </div>
                        <button
                            class="w-10 h-10 bg-transparent hover:bg-zinc-100 flex justify-center items-center rounded-full"
                            @click="modalStore.toggleModal('none')">
                            <IconX class="w-4" />
                        </button>
                    </header>
                    <div class="flex flex-col gap-y-3 mb-5">
                        <base-input name="password" type="password" placeholder="Enter new password" class="h-14 px-14">
                            <template #icon>
                                <Icon name="i-heroicons:key" size="25" class="absolute text-gray-500" />
                            </template>
                        </base-input>
                        <base-input name="confirmPassword" type="password" placeholder="Enter new password"
                            class="h-14 px-14">
                            <template #icon>
                                <Icon name="i-heroicons:key" size="25" class="absolute text-gray-500" />
                            </template>
                        </base-input>
                        <div class="flex gap-4 flex-col sm:flex-row items-center justify-end">
                            <button @click="resetPassword"
                                class="px-8 py-4 rounded-full text-white bg-green-600 hover:bg-green-600 flex justify-between gap-x-6 items-center">
                                <span class="text-base font-medium">
                                    Update password
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
