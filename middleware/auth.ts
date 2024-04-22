export default defineNuxtRouteMiddleware((to, from) => {
    const { isLoggedIn } = useAuthentication();
    const userStore = useUserStore();
    const {hasRole} = storeToRefs(userStore);
    if (!isLoggedIn.value && hasRole.value != "admin") {
        return navigateTo("/admin");
    }
});
