import { useAuthService } from "~/services/Passenger/AuthService.js";
import { useUserService } from "~/services/Passenger/UserService";

export const usePassengerStore = defineStore("passenger-store", {
    state: () => ({
        user: {},
        passenger: {},
        pending: false,
        uploadingProfilePhoto: false,
        isVerified: false,
        accessToken: '',
        showVerifiedModal: false,
        type: "password",
    }),
    persist: {
        paths: ["user", "passenger", "accessToken", "isVerified"],
    },

    actions: {
        async signIn(data) {
            this.pending = true;
            await this.csrf();
            const response = await useAuthService().login(data);
            if (response.data) {
                this.user = response.data;
                this.accessToken = response.access_token;
                this.isVerified = response.is_verified;
            }
            this.pending = false;
            return response;
        },

        async googleSignIn(data) {
            this.pending = true;
            await this.csrf();
            const userInfo = await $fetch('https://www.googleapis.com/oauth2/v3/userinfo?access_token=' + data.access_token, {
                headers: {
                'Content-Type': 'application/json'
                }
            });
            const imageBlob = await useDownloadImage(userInfo.picture);
            const profilePhoto = new File([imageBlob], 'image.jpg', { type: imageBlob.type })
            const formData = new FormData();
            formData.append('authuser', data.authuser);
            formData.append('name', userInfo.name);
            formData.append('email', userInfo.email);
            formData.append('profile_photo', profilePhoto);
            const response = await useAuthService().googleLogin(formData);
            if (response.data) {
                this.user = response.data;
                this.accessToken = response.access_token;
                this.isVerified = response.is_verified;
            }
            this.pending = false;
            return response;
        },
        

        async register(data) {
            this.pending = true;
            try {
                await this.csrf();
                const response = await useAuthService().register(data);

                if (response.data) {
                    this.user = response.data;
                    this.isVerified = response.data.is_verified;
                }
                this.pending = response.pending;
                return response;
            } catch (error) {
                throw error;
            }
        },
        

        async updateUserProfilePhoto(data) {
            this.uploadingProfilePhoto = true
            try {
                await this.csrf();
                const response = await useUserService().updateProfilePhoto(data)
                this.user.profile_photo_path = response.data.profile_photo_path
                return response
            } catch (error) {
                throw error
            } finally {
                this.uploadingProfilePhoto = false
            }
        },

        async sendCode(data) {
            try {
                await this.csrf();
                const response = await useUserService().sendResetCode(data)
                return response
            } catch (error) {
                throw error
            } finally {
            }
        },

        async changePassword(data) {
            try {
                await this.csrf();
                const response = await useUserService().changePassword(data)
                return response
            } catch (error) {
                throw error
            } finally {
            }
        },

        async logout(data) {
            console.log(data);
            try {
                this.user = "";
                navigateTo("/");
            } catch (error) {
                this.user = null;
            }
        },

        async passengerDetails() {
            const response = await useApiFetch("/api/passenger/" + this.user.id, {
                method: "GET",
            });
            this.passenger = response.data;
        },

        async csrf() {
            await useApiFetch("/sanctum/csrf-cookie");
        },
        async sendVerificationLink() {
            this.pending = true;
            try {
                return await useAuthService().sendVerificationLink();
            } catch (error) {
                throw error;
            } finally {
                this.pending = false;
            }
        },

        togglePassword() {
            this.type = this.type === "text" ? "password" : "text";
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
