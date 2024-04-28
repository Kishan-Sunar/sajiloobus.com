import { defineStore } from "pinia";
import { useSearchService } from "~/services/SearchService.js";

export const useSearchStore = defineStore("search-store", {
    state: () => ({
        locationA: "",
        locationB: "",
        pickedDate: "",
        pending: false,
        data: [],
        selected: [],
    }),
    persist: {
        paths: ["locationA", "locationB", "pickedDate", "selected"],
    },
    actions: {
         async search() {
            this.pending = true;
            const formData = new FormData();
            formData.append('from', this.locationA);
            formData.append('to', this.locationB);
            formData.append('date', this.pickedDate);
            const response = await useSearchService().getData(formData);
            if (response.data) {
                this.data = response.data;
            }
            this.pending = false;
            return response;
        },
        selectData(data) {
            this.selected = data
        },
    },
});
