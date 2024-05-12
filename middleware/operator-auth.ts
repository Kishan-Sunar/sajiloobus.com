export default defineNuxtRouteMiddleware((to, from) => {
    const { isLoggedIn } = useAuthentication();
    const userStore = useUserStore();
    const {hasRole} = storeToRefs(userStore);
    if (hasRole.value != "operator") {
        return navigateTo("/operator");
    }
});