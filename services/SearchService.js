export const useSearchService = () => {
    const runtimeConfig = useRuntimeConfig();
    return {
        async getData(data) {
            return useApiFetch("/api/search-schedule/", {
                method: "POST",
                body: data
            });
        },
        async saveData(data) {
            return useApiFetch("/api/bus", {
                method: "POST",
                body: data
            })
        },
    };
};
