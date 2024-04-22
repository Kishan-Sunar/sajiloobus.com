export const useAuthService = () => {
    const runtimeConfig = useRuntimeConfig();
    return {
        async login(user_id) {
            return useApiFetch("/api/passenger", {
                method: "GET",
                body: user_id
            });
        },
        async updateProfilePhoto(data) {
            return await useApiFetch('/api/update-passenger-photo', {
                method: 'POST',
                body: data
            })
        },
    };
};
