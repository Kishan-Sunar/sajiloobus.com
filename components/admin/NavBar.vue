<script setup>
import { onClickOutside } from "@vueuse/core";
const { $notificationStore, $userNotificationStore, $userStore } = useNuxtApp();
const { notifications: userNotification, notificationsWithTimeAgo } = storeToRefs($userNotificationStore);
const user_notification = computed(() => {
    // also where user id is passenger and sort by desc
    return userNotification.value.filter((item) => item.message.userId === $userStore.user.id).sort((a, b) => b.id - a.id)
})
const { user } = storeToRefs($userStore);
const userDropdown = ref(false);
const notificationDropdown = ref(false);
const userDropPanel = ref("");
const notificationDropPanel = ref("");
onClickOutside(userDropPanel, () => (userDropdown.value = false));
onClickOutside(
    notificationDropPanel,
    () => (notificationDropdown.value = false)
);
</script>
<template>
    <header class="w-full relative z-50 py-2 left-0 bottom-0">
        <div class="container mx-auto">
            <div class="flex items-center justify-between">
                <div>
                    <button>
                        <Icon name="i-solar:hamburger-menu-line-duotone" size="30"></Icon>
                    </button>
                </div>
                <div>
                    <div class="flex items-center gap-x-6">
                        <div class="flex items-center gap-x-2">
                            <div class="relative" ref="notificationDropPanel">
                                <button @click="
                                    notificationDropdown =
                                    !notificationDropdown
                                    "
                                    class="rounded-full h-12 w-12 flex justify-center items-center hover:bg-white/20">
                                    <Icon class="text-black" name="i-heroicons:bell" size="30" />
                                </button>

                                <div v-if="notificationDropdown"
                                    class="absolute flex flex-col justify-between w-[20rem] right-0 top-full mt-2 rounded-xl bg-white shadow-[0_4px_24px_0_rgba(62,57,107,0.18)]">
                                    <div
                                        class="flex items-center justify-between gap-x-1.5 flex-shrink-0 border-b border-gray-200 dark:border-gray-800 h-[--header-height] p-4">
                                        <p
                                            class="text-gray-900 dark:text-white font-semibold flex items-center gap-x-1.5 min-w-0">
                                            <span class="truncate">Notifications</span>
                                        </p>
                                        <button v-if="user_notification.length"
                                            @click="$userNotificationStore.clearAll($userStore.user.id)" type="button"
                                            class="px-4 py-2 font-semibold rounded-full bg-slate-50 hover:bg-slate-100 flex items-center justify-center text-xs gap-2"
                                            aria-label="action">
                                            Clear all
                                            <IconX class="w-2" />
                                        </button>
                                    </div>
                                    <div class="flex-1 overflow-y-auto max-h-[70vh] p-4">
                                        <a v-for="i in user_notification" href="#"
                                            class="p-3 rounded-md hover:bg-gray-50 dark:hover:bg-gray-800/50 cursor-pointer flex items-center gap-3 relative">
                                            <div class="text-sm flex-1">
                                                <p class="flex items-center justify-between">
                                                    <span class="text-gray-900 dark:text-white font-medium">
                                                        {{ i.message.title }}
                                                    </span>
                                                    <time :datetime="i.created_at"
                                                        class="text-gray-500 dark:text-gray-400 text-xs">
                                                        {{ i.message.created_at }}
                                                    </time>
                                                </p>
                                                <p class="text-gray-500 dark:text-gray-400">
                                                    {{ i.message.message }}
                                                </p>
                                            </div>
                                        </a>
                                        <div v-if="user_notification.length == 0">
                                            <TheEmptyMessage message="No notification available" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div ref="userDropPanel" class="relative">
                                <button @click="
                                    userDropdown = !userDropdown
                                    "
                                    class="rounded-full relative h-12 w-12 flex justify-center items-center hover:opacity-90">
                                    <img :src="user.profile_photo_path ?? '/avatar/1.webp'"
                                        class="text-[0] border-2 border-white rounded-full h-12 w-12" alt="profile" />
                                    <span
                                        class="absolute flex justify-center items-center top-1/2 -translate-y-1/2 -right-2 h-5 w-5 bg-white rounded-full">
                                        <Icon name="i-heroicons:chevron-down-solid" class="h-9"></Icon>
                                    </span>
                                </button>

                                <div v-if="userDropdown"
                                    class="absolute flex flex-col justify-between w-[20rem] right-0 top-full mt-2 rounded-xl bg-white shadow-[0_4px_24px_0_rgba(62,57,107,0.18)]">
                                    <div class="py-4 px-4 border-b">
                                        <span class="font-medium">
                                            Profile
                                        </span>
                                    </div>
                                    <div class="overflow-y-auto pb-2">
                                        <div class="px-4 py-2">
                                            <ul>
                                                <base-dropdown-item @action="userDropdown = false" label="Settings"
                                                    link="/admin/setting">
                                                    <template #icon>
                                                        <IconCog class="h-6">
                                                        </IconCog>
                                                    </template>
                                                </base-dropdown-item>
                                                <base-dropdown-item @action="$userStore.logout()" label="Logout"
                                                    link="#">
                                                    <template #icon>
                                                        <IconLogout class="h-6">
                                                        </IconLogout>
                                                    </template>
                                                </base-dropdown-item>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>
