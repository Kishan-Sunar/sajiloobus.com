import { defineStore } from "pinia";
import { useAuthService } from "~/services/AuthService.js";
import { useProfileService } from "~/services/Operator/ProfileService.js";

export const useOperatorStore = defineStore("operator-store", {
    state: () => ({
        operator: {},
        pending: false,
        pendingUpdateProfile: false
    }),
    persist: {
        paths: ["operator"],
    },

    actions: {
       
        async operatorDetails() {
            const response = await useApiFetch("/api/operator/" + useUserStore().user.id, {
                method: "GET",
            });
            this.operator = response.data;
        },

        async changeProfile(data, user_id) {
             this.pendingUpdateProfile = true
            try {
                await this.csrf();
                const response = await useProfileService().changeProfile(data, user_id)
                this.user = response.user;
                this.operatorDetails();
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
