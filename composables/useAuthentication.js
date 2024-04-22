export function useAuthentication() {
    const store = usePassengerStore();
    const { user } = storeToRefs(store);
    const isLoggedIn = computed(() => {
        return !!user.value.id;
    });
    return { isLoggedIn };
}
