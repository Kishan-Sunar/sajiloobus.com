import { defineStore } from "pinia";
import { useAuthService } from "~/services/AuthService.js";
import { useProfileService } from "~/services/Admin/ProfileService.js";

export const useAdminStore = defineStore("admin-store", {
    state: () => ({
        admin: {},
        pending: false,
        pendingUpdateProfile: false
    }),
    persist: {
        paths: ["admin"],
    },

    actions: {
       
        async adminDetails() {
            const response = await useApiFetch("/api/admin/" + useUserStore().user.id, {
                method: "GET",
            });
            this.admin = response.data;
        },

        async changeProfile(data, user_id) {
             this.pendingUpdateProfile = true
            try {
                await this.csrf();
                const response = await useProfileService().changeProfile(data, user_id)
                this.user = response.user;
                this.adminDetails();
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
