export const useAmentyService = () => {
    const runtimeConfig = useRuntimeConfig();
    return {
        async getData() {
            return useApiFetch("/api/amenities");
        },
        async saveData(data) {
            return useApiFetch("/api/amenities", {
                method: "POST",
                body: data
            })
        },
        async update(data, id) {
            return useApiFetch("/api/amenities/"+id, {
                method: "PATCH",
                body: data
            })
        },
        async delete(id) {
            return useApiFetch("/api/amenities/"+id, {
                method: "DELETE"
            })
        }
    };
};
