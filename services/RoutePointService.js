export const useRoutePointService = () => {
    const runtimeConfig = useRuntimeConfig();
    return {
        async getData(schedule_id) {
            return useApiFetch("/api/route-points-by-schedule/"+schedule_id);
        },
        async saveData(data) {
            return useApiFetch("/api/route-point", {
                method: "POST",
                body: data
            })
        },
        async update(data, id) {
            return useApiFetch("/api/route-point/"+id, {
                method: "PATCH",
                body: data
            })
        },
        async delete(id) {
            return useApiFetch("/api/route-point/"+id, {
                method: "DELETE"
            })
        }
    };
};
