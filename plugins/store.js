export default defineNuxtPlugin((NuxtApp) => {
    return {
        provide: {
            notificationStore: useNotificationStore(),
            modalStore: useModalStore(),
            userStore: useUserStore(),
            adminStore: useAdminStore(),
            operatorStore: useOperatorStore(),
        },
    };
});
