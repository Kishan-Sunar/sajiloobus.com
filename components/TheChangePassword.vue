<script setup>
const { $notificationStore, $userStore } = useNuxtApp();
const { user } = storeToRefs($userStore)
import { object, string } from "yup";
const { handleSubmit, setErrors, resetForm } = useForm({
    validationSchema: object({
        password: string()
            .required("Password is required")
            .min(8, "Minimum password length is 8 characters"),
        confirmPassword: string()
            .required("Confirm password is required")
            .test('passwords-match', 'Passwords doesnot not match', function (value) {
                return value === this.parent.password;
            })
    }),
});
const updatePassword = handleSubmit(async (values) => {
    try {
        console.log(user.value);
        await $userStore.changePassword({
            user_id: user.value.id,
            password: values.password,
        });
        $notificationStore.pushNotification(
            "Password successfully updated!",
            "success"
        );

        resetForm();
    } catch (error) {
        console.log(error);
        $notificationStore.pushNotification(
            "Invalid email",
            "danger"
        );
    } finally {
    }
});
</script>
<template>
    <div class="relative flex flex-col gap-y-4">
        <div class="border-b px-4 sm:px-6 py-6" data-v-inspector="pages/dashboard/profile.vue:19:25">
            <h3 class="text-xl font-semibold" data-v-inspector="pages/dashboard/profile.vue:20:29">
                Change Password
            </h3>
        </div>
        <div class="flex flex-col gap-y-3 mb-5 px-4 sm:px-6 py-5">
            <div>
                <label class="text-slate-500 mb-2 block font-medium text-sm">
                    New Password
                </label>
                <base-input name="password" type="password" placeholder="Enter new password" class="h-14 px-14">
                    <template #icon>
                        <Icon name="i-heroicons:key" size="25" class="absolute text-gray-500" />
                    </template>
                </base-input>
            </div>
            <div>
                <label class="text-slate-500 mb-2 block font-medium text-sm">
                    Confirm Password
                </label>
                <base-input name="confirmPassword" type="password" placeholder="Enter new password" class="h-14 px-14">
                    <template #icon>
                        <Icon name="i-heroicons:key" size="25" class="absolute text-gray-500" />
                    </template>
                </base-input>
            </div>
            <div class="flex gap-4 flex-col sm:flex-row items-center justify-end">
                <button @click="updatePassword"
                    class="px-8 w-full py-4 rounded-xl text-white bg-green-600 hover:bg-green-600 flex justify-between gap-x-6 items-center">
                    <span class="text-base font-medium">
                        Update password
                    </span>
                    <IconChevronRight class="h-4" />
                </button>
            </div>
        </div>
    </div>
</template>