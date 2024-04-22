export const useUserService = () => {
    const runtimeConfig = useRuntimeConfig();
    return {
        async updateProfilePhoto(data) {
            return useApiFetch("/api/update-user-photo", {
                method: "post",
                body: data,
            });
        },
        async changePassword(data) {
            return useApiFetch("/api/change-password", {
                method: "post",
                body: data,
            });
        },
        async sendResetCode(data) {
            return useApiFetch("/api/reset-code", {
                method: "post",
                body: data,
            });
        },
    };
};
