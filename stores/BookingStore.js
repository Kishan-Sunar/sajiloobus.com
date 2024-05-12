import { defineStore } from "pinia";
import { useBookingService } from "~/services/BookingService";
export const useBookingStore = defineStore("booking-store", {
    state: () => ({
        bookings: [],
        payments: [],
        selectedSeat: [],
        selected: [],
        pending: false,
        passengerName: '',
        passengerEmail: '',
        passengerMobile: '',
        comments: '',
        boardingPoint: null,
        droppingPoint: null,
        seatsStatus: [],
        lastBookings: 0,
    }),
    persist: {
        paths: ["selected", "selectedSeat", "passengerName", "passengerEmail", "passengerMobile", "boardingPoint", "droppingPoint"],
    },
    actions: {
        selectSeat(data) {
            if (this.selectedSeat.includes(data)) {
                this.selectedSeat = this.selectedSeat.filter(item => item !== data);
            } else {
                this.selectedSeat.push(data);
            }
        },
        async getData() {
            this.pending = true;
            const passengerStore = usePassengerStore();
            const { passenger } = storeToRefs(passengerStore);
            const response = await useBookingService().getData(passenger.value.id);
            if (response.data) {
                this.bookings = response.data;
            }
            this.pending = false;
            return response;
        },
        async getDataByOperator() {
            this.pending = true;
            const operatorStore = useOperatorStore();
            const { operator } = storeToRefs(operatorStore);
            const response = await useBookingService().getDataOperator(operator.value.id);
            if (response.data) {
                this.bookings = response.data;
            }
            this.pending = false;
            return response;
        },
         async getPayments() {
            this.pending = true;
            const passengerStore = usePassengerStore();
            const { passenger } = storeToRefs(passengerStore);
            const response = await useBookingService().getPayment(passenger.value.id);
            if (response.data) {
                this.payments = response.data;
            }
            this.pending = false;
            return response;
        },
        async confirmBooking(data) {
            this.pending = true;
            const response = await useBookingService().confirmBooking(data);
            if (response.data) {
                this.getData();
            }
            this.pending = false;
            return response;
        },
        async changeStatus(booking_id, status) {
            this.pending = true;
            const response = await useBookingService().changeStatus(booking_id, status);
            if (response.data) {
                this.getData();
            }
            this.pending = false;
            return response;
        },
        async isSeatBooked(schedule) {
            this.pending = true;
            const response = await useBookingService().isSeatBooked(schedule);
            if (response.data) {
                this.seatsStatus = response.data
            }
            this.pending = false;
            return response;
        },
        async cancelBookingByPassenger(bookingId) {
            this.pending = true;
            const response = await useBookingService().cancelByPassenger(bookingId);
            if (response.data) {
                this.getData();
            } 
            this.pending = false;
            return response;
        },
        async countLastBooking () {
            this.pending = true;
            const passengerStore = usePassengerStore();
            const { passenger } = storeToRefs(passengerStore);
            const response = await useBookingService().countLastBooking(passenger.id);
            if (response.data) {
                this.lastBookings = response.data
            } 
            this.pending = false;
            return response;
        }
    }
});