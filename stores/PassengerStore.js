import { defineStore } from "pinia";
import { useAuthService } from "~/services/AuthService.js";
import { useProfileService } from "~/services/Passenger/ProfileService.js";

export const usePassengerStore = defineStore("passenger-store", {
    state: () => ({
        passenger: {},
        pending: false,
        pendingUpdateProfile: false
    }),
    persist: {
        paths: ["passenger"],
    },

    actions: {
       
        async passengerDetails() {
            const response = await useApiFetch("/api/passenger/" + useUserStore().user.id, {
                method: "GET",
            });
            this.passenger = response.data;
        },

        async changeProfile(data, user_id) {
             this.pendingUpdateProfile = true
            try {
                await this.csrf();
                const response = await useProfileService().changeProfile(data, user_id)
                this.user = response.user;
                this.passengerDetails();
                return response
            } catch (error) {
                throw error
            } finally {
                this.pendingUpdateProfile = false
            }
        },

        async csrf() {
            await useApiFetch("/sanctum/csrf-cookie");
        },
    },

    getters: {
        isLoggedIn: (state) => {
            return !!state.user.id;
        },
        verified: (state) => {
            return state.isVerified;
        },
    },
});
