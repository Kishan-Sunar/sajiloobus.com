export const useAuthService = () => {
    const runtimeConfig = useRuntimeConfig();
    return {
        async login(data) {
            return useApiFetch("/api/login", {
                method: "POST",
                body: data,
                headers: {},
            });
        },

        async googleLogin(data) {
            return useApiFetch("/api/auth-google", {
                method: "POST",
                body: data,
            });
        },

        async register(data) {
            return useApiFetch("/api/register-passenger", {
                method: "POST",
                body: data,
            });
        },
        async logout(data) {
            return await useApiFetch("/api/logout", {
                method: "POST",
                body: data,
            }).catch((error) => {
                throw error;
            });
        },
        async sendVerificationLink() {
            return await useApiFetch("/email/verification-notification", {
                method: "POST",
            }).catch((error) => {
                throw error;
            });
        },
    };
};
