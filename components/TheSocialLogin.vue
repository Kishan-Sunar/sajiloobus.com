<script setup lang="ts">
const { $notificationStore, $userStore } = useNuxtApp();
const { type, pending } = storeToRefs($userStore);
const modalStore = useModalStore();
import {
    useTokenClient,
    type AuthCodeFlowSuccessResponse,
    type AuthCodeFlowErrorResponse,
} from "vue3-google-signin";
const handleOnSuccess = async (response: AuthCodeFlowSuccessResponse) => {
    try {
        await $userStore.googleSignIn(response);
        $notificationStore.pushNotification(
            "Logged in successfully!",
            "success"
        );
        modalStore.toggleModal("none");
    } catch (error) {
        console.log(error);
        $notificationStore.pushNotification(
            "Invalid email or password",
            "danger"
        );
    } finally {
        pending.value = false;
    }

};

const handleOnError = (errorResponse: AuthCodeFlowErrorResponse) => {
    $notificationStore.pushNotification(
        errorResponse,
        "danger"
    );
};

const { isReady, login } = useTokenClient({
    onSuccess: handleOnSuccess,
    onError: handleOnError,
    // other options
});
</script>
<template>
    <div class="flex flex-col gap-y-4">
        <div class="relative gap-x-5 flex items-center justify-center">
            <span class="bg-gradient-to-l rounded-full from-zinc-200 h-0.5 w-full"></span>
            <span class="font-medium text-zinc-600 text-sm whitespace-nowrap">or continue</span>
            <span class="bg-gradient-to-r rounded-full from-zinc-200 h-0.5 w-full"></span>
        </div>
        <div class="flex flex-col sm:flex-row gap-5">
            <button :disabled="!isReady" @click="() => login()"
                class="px-4 py-4 font-medium w-full hover:bg-green-100 hover:text-green-600 bg-zinc-100 rounded-full flex gap-x-4 justify-center items-center">
                <svg class="h-5 w-5" viewBox="0 0 30 31" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M29.7341 12.7067C29.9125 13.7471 30.0015 14.8011 30 15.857C30 20.5727 28.3359 24.56 25.4399 27.2588H25.4438C22.9112 29.6283 19.43 31 15.3022 31C11.2438 31 7.35163 29.367 4.48191 26.4603C1.61219 23.5536 0 19.6112 0 15.5005C0 11.3898 1.61219 7.44744 4.48191 4.54072C7.35163 1.634 11.2438 0.00102275 15.3022 0.00102275C19.1009 -0.0440388 22.7694 1.40146 25.5394 4.03476L21.1706 8.45987C19.5914 6.93506 17.4837 6.10005 15.3022 6.13494C11.3102 6.13494 7.91889 8.86285 6.71002 12.5362C6.06906 14.4611 6.06906 16.5457 6.71002 18.4706H6.71576C7.93037 22.1382 11.316 24.8661 15.3079 24.8661C17.3699 24.8661 19.1412 24.3313 20.5145 23.3859H20.5088C21.3062 22.8508 21.9884 22.1575 22.5141 21.3481C23.0397 20.5386 23.398 19.6296 23.5673 18.676H15.3022V12.7087L29.7341 12.7067Z"
                        fill="currentColor" />
                </svg>
                <span class="text-sm">with Google</span>
            </button>
        </div>
    </div>
</template>
