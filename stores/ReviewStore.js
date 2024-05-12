import { defineStore } from "pinia";
import { useReviewService } from "~/services/ReviewService.js";

export const useReviewStore = defineStore("review-store", {
    state: () => ({
        data: [],
        selectedRating: 0,
        stars: [1, 2, 3, 4, 5],
        review: '',
        pending: false,
    }),

    actions: {
        async getData() {
            this.pending = true;
            const response = await useReviewService().getData();
            if (response.data) {
                this.data = response.data;
            }
            this.pending = false;
            return response;
        },

        async save(data) {
            this.pending = true;
            const response = await useReviewService().saveData(data);
            if (response.data) {
                this.getData();
            }
            this.pending = false;
            return response;
        },

        rate(rating) {
            this.selectedRating = rating;
        },

    },
});
