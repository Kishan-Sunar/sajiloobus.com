<script setup>
definePageMeta({
    middleware: ["passenger-auth"],
});
const route = useRoute()
const query = route.query;
const { $modalStore, $notificationStore } = useNuxtApp();
const { currentModal } = storeToRefs($modalStore)
if (query.status == 'success') {
    $modalStore.toggleModal('khati-success')
}
const bookingStore = useBookingStore();
bookingStore.getData();
const { bookings: bookingData } = storeToRefs(bookingStore);

if (query.status == 'success') {
    const total_amount = 0;
    total_amount = selectedSeat.value.length * selectedData.value.fare
    if (lastBookings.value > 5) {
        total_amount = total_amount - (total_amount * 5) / 100
    }
    const data = {
        'booked_by': passenger.value.id,
        'schedule_id': selectedData.value.id,
        'passenger_name': passengerName.value,
        'passenger_email': passengerEmail.value,
        'passenger_phone': passengerMobile.value,
        'board_point': boardingPoint.value,
        'drop_point': droppingPoint.value,
        'comments': comments.value,
        'total_amount': total_amount,
        'payment_method': 'khalti',
        'comments': 'No comments',
        'payment_status': 'PAID',
        'selected_seats': selectedSeat.value,
        'seat_status': "BOOKED"
    }
    const response = bookingStore.confirmBooking(data);
    if (response) {
        $notificationStore.pushNotification('Your booking has been confirmed, please pay while travelling', 'success')
        $userNotificationStore.pushNotification({
            title: "Booking Confirmed",
            message: `Your booking for ${selectedData.value.origin.name} - ${selectedData.value.destination.name} has been confirmed, please pay while travelling`,
            type: "success",
            userId: $userStore.user.id,
            created_at: $userNotificationStore.notificationsWithTimeAgo(new Date().getTime()),
            read: false,
        })
        navigateTo('/dashboard/bookings')
    } else {
        $notificationStore.pushNotification('Unable to book for now. Please try again', 'danger')
    }
}
</script>

<template>
    <section class="h-[15rem] bg-green-600 relative"></section>
    <section class="py-10 relative bg-slate-100">
        <div class="container mx-auto">
            <TheProfileCard class="mb-10" />
            <div class="bg-white rounded-xl shadow-2xl shadow-black/10">
                <div class="border-b px-4 sm:px-6 py-6">
                    <h3 class="text-xl font-semibold">My Bookings</h3>
                </div>
                <div>
                    <div class="flex flex-col pb-10">
                        <div v-for="item in bookingData" :key="item">
                            <div class="px-4 sm:px-6 relative hover:bg-slate-50">
                                <div class="grid gap-y-3 sm:grid-cols-[minmax(min-content,80px)_1fr]">
                                    <div class="py-2">
                                        <div
                                            class="w-[80px] h-[80px] bg-slate-400 block rounded-full overflow-hidden shadow-lg">
                                            <img class="w-full h-full object-cover"
                                                :src="$config.public.apiURL + '/storage/' + item.schedule.bus.featured_photo_path ?? '/avatar/bus-placeholder.webp'"
                                                alt="logo" />
                                        </div>
                                    </div>
                                    <div class="px-0 py-4 sm:px-6 border-b">
                                        <div
                                            class="flex sm:flex-row gap-y-2 flex-col sm:items-center sm:justify-between mb-2.5">
                                            <div class="flex items-center gap-x-3">
                                                <h3 class="font-semibold text-base">
                                                    {{ item.schedule.bus.name }}
                                                </h3>
                                                <span
                                                    class="py-0.5 px-2.5 sm:px-4 block rounded-full text-xs font-semibold border-[1.5px] border-green-700 bg-green-50 text-green-700"
                                                    :class="{ '!border-red-700 !bg-red-50 !text-red-700': item.status == 'DECLINED' || item.status == 'CANCELLED_BY_CUSTOMER' || item.status == 'CANCELLED_BY_OPERATOR' }">
                                                    {{ useBookingStatus(item.status) }}
                                                </span>
                                            </div>
                                            <div>
                                                <button v-if="item.status == 'BOOKED' || item.status == 'PENDING'"
                                                    @click="bookingStore.cancelBookingByPassenger(item.id)"
                                                    class="flex hover:text-red-500 text-sm gap-x-2 px-2 justify-between items-center">
                                                    <IconX class="h-3 text-red-500" />
                                                    <span class="font-medium text-sm">Cancel Booking</span>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-2 sm:grid-cols-5 gap-y-2 gap-x-6">
                                            <div class="flex flex-col gap-y-1">
                                                <h2 class="text-sm font-medium text-slate-500">
                                                    From
                                                </h2>
                                                <span class="text-base font-medium">
                                                    {{ item.schedule.origin.name }}
                                                </span>
                                            </div>
                                            <div class="flex flex-col gap-y-1">
                                                <h2 class="text-sm font-medium text-slate-500">
                                                    To
                                                </h2>
                                                <span class="text-base font-medium">

                                                    {{ item.schedule.destination.name }}
                                                </span>
                                            </div>
                                            <div class="flex flex-col gap-y-1">
                                                <h2 class="text-sm font-medium text-slate-500">
                                                    <span class="font-semibold">RS:
                                                        {{ item.total_amount }}</span>
                                                </h2>
                                                <div class="text-base font-medium">
                                                    <span v-for="item in item.booked_seats">
                                                        {{ item.seat_no }},
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="flex flex-col gap-y-1">
                                                <h2 class="text-sm font-medium text-slate-500">
                                                    Name. of Passenger
                                                </h2>
                                                <span class="text-base font-medium">
                                                    {{ item.passenger.user.full_name }}
                                                </span>
                                            </div>
                                            <div class="flex flex-col gap-y-1">
                                                <h2 class="text-sm font-medium text-slate-500">
                                                    Price Per
                                                </h2>
                                                <span class="text-base font-medium">
                                                    Rs. {{ item.total_amount / item.booked_seats.length }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div v-if="!bookingData.length" class="flex justify-center">
                            <TheEmptyMessage message="No booking found" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <ModalsStatusAlert message="Payment done" description="Payment successfully done. And your booking is confirmed"
        :show="currentModal == 'khati-success'">
    </ModalsStatusAlert>
</template>
