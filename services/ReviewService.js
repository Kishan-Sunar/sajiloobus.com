export const useReviewService = () => {
    const runtimeConfig = useRuntimeConfig();
    return {
        async getData(data) {
            return useApiFetch("/api/search-schedule/", {
                method: "POST",
                body: data
            });
        },
        async saveData(data) {
            return useApiFetch("/api/create-review", {
                method: "POST",
                body: data
            })
        },
    };
};
