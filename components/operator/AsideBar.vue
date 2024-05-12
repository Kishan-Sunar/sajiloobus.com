<script setup>
const { $notificationStore, $userNotificationStore, $userStore } = useNuxtApp();
const { notifications: userNotification, notificationsWithTimeAgo } = storeToRefs($userNotificationStore);
const user_notification = computed(() => {
    // also where user id is passenger and sort by desc
    return userNotification.value.filter((item) => item.message.userId === $userStore.user.id).sort((a, b) => b.id - a.id)
})
</script>

<template>
    <div class="flex flex-col pt-4 gap-y-4 justify-between h-[100vh] border-r">
        <header class="z-10 mb-2 relative px-4">
            <IconLogo class="h-10" />
        </header>
        <div class="mb-auto px-4 overflow-y-auto">
            <div class="relative space-y-2">
                <span class="mb-2 text-xs font-semibold pl-4">Main menu</span>
                <OperatorAsideLink label="Dashboard" href="/operator/dashboard">
                    <template #icon>
                        <IconDashboard class="h-6" />
                    </template>
                </OperatorAsideLink>
                <OperatorAsideLink label="Manage Bus" href="/operator/manage-bus">
                    <template #icon>
                        <IconBus class="h-6" />
                    </template>
                </OperatorAsideLink>
                <OperatorAsideLink label="Manage Schedules" href="/operator/manage-schedules">
                    <template #icon>
                        <IconSchedule class="h-6" />
                    </template>
                </OperatorAsideLink>
                <OperatorAsideLink label="Manage Bookings" href="/operator/manage-bookings"
                    :badge="user_notification.length">
                    <template #icon>
                        <IconBooking class="h-6" />
                    </template>
                </OperatorAsideLink>
            </div>
        </div>
        <div class="flex border-t py-4 flex-col items-center">
            <h4 class="font-medium text-md">Sajiloobus.com</h4>
            <span class="opacity-60 text-sm">for bus owner</span>
        </div>
    </div>
</template>
