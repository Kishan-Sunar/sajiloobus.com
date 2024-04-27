export const useLocationService = () => {
    const runtimeConfig = useRuntimeConfig();
    return {
        async getData() {
            return useApiFetch("/api/locations");
        },
        async saveData(data) {
            return useApiFetch("/api/locations", {
                method: "POST",
                body: data
            })
        },
        async update(data, id) {
            return useApiFetch("/api/locations/"+id, {
                method: "PATCH",
                body: data
            })
        },
        async delete(id) {
            return useApiFetch("/api/locations/"+id, {
                method: "DELETE"
            })
        }
    };
};
