import { defineStore } from "pinia";
export const useBookingStore = defineStore("booking-store", {
    state: () => ({
        selectedSeat: [],
        selected: [],
        pending: false,
    }),
    actions: {
        selectSeat(data) {
            if (this.selectedSeat.includes(data)) {
                this.selectedSeat = this.selectedSeat.filter(item => item !== data);
            } else {
                this.selectedSeat.push(data);
            }
        }
    }
});