export const useBusService = () => {
    const runtimeConfig = useRuntimeConfig();
    return {
        async getData() {
            return useApiFetch("/api/bus");
        },
        async saveData(data) {
            return useApiFetch("/api/bus", {
                method: "POST",
                body: data
            })
        },
        async update(data, id) {
            return useApiFetch("/api/bus/"+id, {
                method: "PATCH",
                body: data
            })
        },
        async delete(id) {
            return useApiFetch("/api/bus/"+id, {
                method: "DELETE"
            })
        }
    };
};
