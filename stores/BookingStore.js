export const useBookingStore = defineStore("booking-store", {
    state: () => ({
        selectedSeat: [],
        selected: [],
        pending: false,
    }),
    actions: {
        selectSeat(data) {
            this.selectedSeat = data
        }
    }
});