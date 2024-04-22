export default defineNuxtPlugin((NuxtApp) => {
    return {
        provide: {
            notificationStore: useNotificationStore(),
        },
    };
});
