export const useBookingService = () => {
    const runtimeConfig = useRuntimeConfig();
    return {
        async getData(passenger_id) {
            return useApiFetch("/api/booking-by-passenger/"+passenger_id);
        },
        async getDataOperator(operator_id) {
            return useApiFetch("/api/booking-by-operator/"+operator_id);
        },
        async getPayment(passenger_id) {
            return useApiFetch("/api/all-payment-history-by-passenger/"+passenger_id);
        },
        async cancelByPassenger(passenger_id) {
            return useApiFetch("/api/booking/cancel-by-passenger/"+passenger_id);
        },
        async isSeatBooked(schedule) {
            return useApiFetch("/api/booking/is-seat-booked/"+schedule);
        },
        async countLastBooking(passenger_id) {
            return useApiFetch("/booking/check-booking-limit/"+passenger_id);
        },
        async confirmBooking(data) {
            return useApiFetch("/api/confirm-booking", {
                method: "POST",
                body: data
            })
        },
        async changeStatus(booking_id, status) {
            return useApiFetch("/api/change-status/"+booking_id+"/"+status)
        },
        async delete(bus_no, amenity_id) {
            return useApiFetch("/api/delete-bus-amenities/"+bus_no+"/"+amenity_id, {
                method: "POST"
            })
        }
    };
};
