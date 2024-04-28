export const useBusPhotoService = () => {
    const runtimeConfig = useRuntimeConfig();
    return {
        async getData(bus_no) {
            return useApiFetch("/api/bus-gallery/"+bus_no);
        },
        async saveData(data) {
            return useApiFetch("/api/bus-photos", {
                method: "POST",
                body: data
            })
        },
        async delete(id) {
            return useApiFetch("/api/bus-photos/"+id, {
                method: "DELETE"
            })
        }
    };
};
