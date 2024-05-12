export default defineNuxtPlugin((NuxtApp) => {
    return {
        provide: {
            notificationStore: useNotificationStore(),
            userNotificationStore: useUserNotificationStore(),
            modalStore: useModalStore(),
            userStore: useUserStore(),
            adminStore: useAdminStore(),
            operatorStore: useOperatorStore(),
            passengerStore: usePassengerStore(),
        },
    };
});
