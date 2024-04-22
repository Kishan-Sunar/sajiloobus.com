<script setup>
const modalStore = useModalStore();
const { currentModal } = storeToRefs(modalStore);
const { $notificationStore } = useNuxtApp();
import { object, string } from "yup";
const userStore = useUserStore();
const { pendingResetCode } = storeToRefs(userStore);

const { handleSubmit, setErrors, resetForm } = useForm({
    validationSchema: object({
        token: string()
            .required("Token is required")
    }),
});
const verify = handleSubmit(async (values) => {
    try {
        await userStore.tokenVerify({
            token: values.token
        })
        modalStore.toggleModal('reset-password');
        $notificationStore.pushNotification(
            "Code verified!",
            "success"
        );
        resetForm();
    } catch (error) {
        console.log(error);
        $notificationStore.pushNotification(
            "Invalid code",
            "danger"
        );
    } finally {
        pendingResetCode.value = false;
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
                            <h3 class="text-xl font-semibold">Enter code</h3>
                            <p class="text-sm">
                                Didn't get a token?
                                <span @click="modalStore.toggleModal('reset-email')"
                                    class="cursor-pointer text-green-600 hover:text-green-600 font-semibold">Change
                                    email</span>
                            </p>
                        </div>
                        <button
                            class="w-10 h-10 bg-transparent hover:bg-zinc-100 flex justify-center items-center rounded-full"
                            @click="modalStore.toggleModal('none')">
                            <IconX class="w-4" />
                        </button>
                    </header>
                    <div class="flex flex-col gap-y-3 mb-5">
                        <base-input name="token" type="text" placeholder="Enter your token" class="h-14 px-14">
                            <template #icon>
                                <Icon name="i-heroicons:key" size="25" class="absolute text-gray-500" />
                            </template>
                        </base-input>
                        <div class="flex gap-4 flex-col sm:flex-row items-center justify-end">
                            <button @click="verify"
                                class="px-8 py-4 rounded-full text-white bg-green-600 hover:bg-green-600 flex justify-between gap-x-6 items-center">
                                <span class="text-base font-medium">
                                    {{ !pendingResetCode ? 'Verify' : 'Verifying' }}
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
