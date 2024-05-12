export function useAuthentication() {
    const store = useUserStore();
    const { user } = storeToRefs(store);
    const isLoggedIn = computed(() => {
        return !!user.value.id;
    });
    return { isLoggedIn };
}
