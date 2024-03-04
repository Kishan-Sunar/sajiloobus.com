import { defineStore } from "pinia";

export const useSearchStore = defineStore("search-store", {
    state: () => ({
        locationA: "",
        locationB: "",
        pickedDate: "",
    }),
    persist: {
        paths: ["locationA", "locationB", "pickedDate"],
    },
    actions: {
        updateLocationA(city) {
            this.locationA = city;
        },
        updateLocationB(city) {
            this.locationB = city;
        },
        updatePickedDate(date) {
            this.pickedDate = date;
        },
    },
});
