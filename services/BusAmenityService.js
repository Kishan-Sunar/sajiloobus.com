export const useBusAmenityService = () => {
    const runtimeConfig = useRuntimeConfig();
    return {
        async getData(bus_no) {
            return useApiFetch("/api/particular-bus-amenities/"+bus_no);
        },
        async saveData(data) {
            return useApiFetch("/api/bus-amenities", {
                method: "POST",
                body: data
            })
        },
        async delete(bus_no, amenity_id) {
            return useApiFetch("/api/delete-bus-amenities/"+bus_no+"/"+amenity_id, {
                method: "POST"
            })
        }
    };
};
