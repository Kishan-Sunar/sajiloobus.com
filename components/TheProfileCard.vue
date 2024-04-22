<script setup>
const passengerStore = usePassengerStore();
passengerStore.passengerDetails();
const { user, passenger } = storeToRefs(passengerStore);
const previewImage = ref('')
async function handelFileUpload(event) {
    const profilePhoto = event.target.files[0]
    const formData = new FormData()
    formData.append('user',)
    formData.append('profile_photo_path', profilePhoto)
    try {
        const response = await passengerStore.updateUserProfilePhoto(formData)
        $notificationStore.pushNotification(response.message)
    } catch (error) {
        if (error.status === 422) $notificationStore.pushNotification(error.data.message, 'danger')
    }
}
</script>

<template>
    <div class="bg-white -mt-[10rem] shadow shadow-black/5 rounded-xl">
        <div class="grid gap-y-4 sm:grid-cols-4">
            <div class="bg-slate-400 h-56 rounded-xl sm:rounded-r-none overflow-hidden relative">
                <span v-if="uploadingProfilePhoto">Uploading</span>
                <img v-else :src="user.profile_photo_path ?? '/avatar/1.webp'" class="h-full w-full object-cover"
                    alt="Profile Avatar" />
                <label for="profile"
                    class="bg-white flex items-center gap-x-1 cursor-pointer hover:bg-white/90 text-sm font-semibold shadow-lg py-2 px-6 rounded-full absolute bottom-2 left-1/2 -translate-x-1/2">Upload
                    <Icon name="i-heroicons:arrow-up-circle-20-solid" size="20" />
                </label>
                <input type="file" id="profile" class="hidden" accept="image/*" @change="handelFileUpload" />
            </div>
            <div class="sm:col-span-2 py-5">
                <div
                    class="flex px-2 sm:px-6 flex-col sm:flex-row gap-4 sm:items-end justify-between border-b pb-4 mb-2">
                    <h3 class="text-lg font-medium">{{ user.full_name }}</h3>
                </div>
                <div class="px-2 sm:px-6">
                    <div class="grid sm:grid-cols-2 gap-x-4 gap-y-6">
                        <div>
                            <label class="text-green-600 mb-1.5 block font-medium text-sm">Fullname</label>
                            <h3 class="text-base font-medium">{{ user.full_name }}</h3>
                        </div>
                        <div>
                            <label class="text-green-600 mb-1.5 block font-medium text-sm">Email Address</label>
                            <h3 class="text-base font-medium">{{ user.email }}</h3>
                        </div>
                        <div>
                            <label class="text-green-600 mb-1.5 block font-medium text-sm">Contact</label>
                            <h3 class="text-base font-medium">{{ passenger.contact }}</h3>
                        </div>
                        <div>
                            <label class="text-green-600 mb-1.5 block font-medium text-sm">Address</label>
                            <h3 class="text-base font-medium">{{ passenger.address }}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rounded-xl sm:rounded-bl-none text-white sm:rounded-tl-none bg-sky-900">
                <div class="flex flex-col">
                    <nuxt-link to="/dashboard/bookings"
                        class="hover:bg-white/10 group/item px-3 py-2 flex items-center justify-start gap-x-1">
                        <span class="w-10 h-10 flex justify-center items-center">
                            <IconMyBookings class="w-7 group-hover/item:text-green-300" />
                        </span>
                        <span class="text-sm opacity-60 font-medium group-hover/item:opacity-100">My Bookings</span>
                    </nuxt-link>
                    <nuxt-link to="/dashboard/tickets"
                        class="hover:bg-white/10 group/item px-3 py-2 flex items-center justify-start gap-x-1">
                        <span class="w-10 h-10 flex justify-center items-center">
                            <IconMyTickets class="w-7 group-hover/item:text-green-300" />
                        </span>
                        <span class="text-sm opacity-60 font-medium group-hover/item:opacity-100">My Tickets</span>
                    </nuxt-link>
                    <nuxt-link to=""
                        class="hover:bg-white/10 group/item px-3 py-2 flex items-center justify-start gap-x-1">
                        <span class="w-10 h-10 flex justify-center items-center">
                            <IconMyPayments class="w-7 group-hover/item:text-green-300" />
                        </span>
                        <span class="text-sm opacity-60 font-medium group-hover/item:opacity-100">My Payments</span>
                    </nuxt-link>
                    <nuxt-link to=""
                        class="hover:bg-white/10 group/item px-3 py-2 flex items-center justify-start gap-x-1">
                        <span class="w-10 h-10 flex justify-center items-center">
                            <IconMyRatings class="w-7 group-hover/item:text-green-300" />
                        </span>
                        <span class="text-sm opacity-60 font-medium group-hover/item:opacity-100">My Ratings</span>
                    </nuxt-link>
                </div>
            </div>
        </div>
    </div>
</template>