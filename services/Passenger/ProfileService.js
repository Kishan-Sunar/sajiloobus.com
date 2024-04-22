export const useProfileService = () => {
    const runtimeConfig = useRuntimeConfig();
    return {
        async login(user_id) {
            return useApiFetch("/api/passenger", {
                method: "GET",
                body: user_id
            });
        },
        async changeProfile(data,user_id) {
            console.log([data, user_id])
            return await useApiFetch('/api/passenger/'+user_id, {
                method: 'PATCH',
                body: data
            })
        },
    };
};
