export const useBusService = () => {
    const runtimeConfig = useRuntimeConfig();
    return {
        async getData(operator_id) {
            return useApiFetch("/api/bus-by-operator/"+operator_id);
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
        async updateFeaturedPhoto(data, id) {
            return useApiFetch("/api/update-bus-photo", {
                method: "post",
                body: data,
            });
        },
        async delete(id) {
            return useApiFetch("/api/bus/"+id, {
                method: "DELETE"
            })
        }
    };
};
