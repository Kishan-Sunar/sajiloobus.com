export const useBusTypeService = () => {
    const runtimeConfig = useRuntimeConfig();
    return {
        async getData() {
            return useApiFetch("/api/bus-types");
        },
        async saveData(data) {
            return useApiFetch("/api/bus-types", {
                method: "POST",
                body: data
            })
        },
        async update(data, id) {
            return useApiFetch("/api/bus-types/"+id, {
                method: "PATCH",
                body: data
            })
        },
        async delete(id) {
            return useApiFetch("/api/bus-types/"+id, {
                method: "DELETE"
            })
        }
    };
};
