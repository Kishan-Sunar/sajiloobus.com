<script setup>
import { date } from 'yup';
const { $notificationStore, $userNotificationStore, $userStore } = useNuxtApp();
const { notifications: userNotification, notificationsWithTimeAgo } = storeToRefs($userNotificationStore);
const passengerStore = usePassengerStore();
const { passenger } = storeToRefs(passengerStore);
const bookingStore = useBookingStore();
const {
    selectedSeat,
    passengerName,
    passengerEmail,
    passengerMobile,
    boardingPoint,
    droppingPoint,
    comments,
    lastBookings
} = storeToRefs(bookingStore);
const searchStore = useSearchStore();
const modalStore = useModalStore()
const { currentModal } = storeToRefs(modalStore);
const { selected: selectedData } = storeToRefs(searchStore);
if (!selectedData.value.id) {
    navigateTo('/search')
}
const isOfflinePay = ref(false);
const payWithKhalti = async () => {
    try {
        const response = await $fetch('https://a.khalti.com/api/v2/epayment/initiate/', {
            method: 'POST',
            headers: {
                'Authorization': 'key 10e8e4832ae244dbac2d0a2727d5c0db',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                "return_url": "http://localhost:3000/dashboard/bookings?status=success",
                "website_url": "http://localhost:3000",
                "amount": "36000",
                "purchase_order_id": "Order100",
                "purchase_order_name": "Ticket Booking",
                "customer_info": {
                    "name": "Sajiloobus.com",
                    "email": "info@sajiloobus.com",
                    "phone": "9824125457"
                }
            })
        });
        const success = await navigateTo(response.payment_url, {
            external: true
        });
    } catch {

    }
}

const payOffine = () => {
    const data = {
        'booked_by': passenger.value.id,
        'schedule_id': selectedData.value.id,
        'passenger_name': passengerName.value,
        'passenger_email': passengerEmail.value,
        'passenger_phone': passengerMobile.value,
        'board_point': boardingPoint.value,
        'drop_point': droppingPoint.value,
        'comments': comments.value,
        'total_amount': selectedSeat.value.length * selectedData.value.fare,
        'payment_method': 'offline',
        'comments': 'No comments',
        'payment_status': 'PENDING',
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
    <TheBookingSteps activePage="payment" />
    <section class="pt-10 pb-20 bg-slate-100">
        <div class="container mx-auto">
            <div class="mx-auto">
                <div class="bg-white border border-slate-200 shadow-2xl shadow-black/10 rounded-xl">
                    <div class="grid sm:grid-cols-2 divide-x">
                        <div>
                            <button
                                class="border-b rounded-t-xl sm:rounded-tr-none active:bg-slate-100 w-full py-4 px-6">
                                <div class="flex justify-start gap-x-4">
                                    <div>
                                        <div
                                            class="bg-gradient-to-br from-green-600 to-green-900 text-white rounded-full w-16 h-16 flex justify-center items-center">
                                            <IconPayment class="w-11" />
                                        </div>
                                    </div>
                                    <div class="flex items-start flex-col justify-center">
                                        <span class="font-medium text-lg">Choose Payment Method</span>
                                        <span class="text-base font-regular text-slate-500">All transactions are
                                            secured and
                                            encrypted</span>
                                    </div>
                                </div>
                            </button>
                            <div class="py-4 px-4">
                                <button type="button" @click="payWithKhalti()"
                                    class="border-b active:bg-slate-100 w-full py-4 px-6">
                                    <div class="flex items-center justify-between gap-x-4">
                                        <div class="flex gap-2 items-center justify-center">
                                            <IconKhalti class="w-8 text-[#5e338d]"></IconKhalti>
                                            <span class="font-medium text-lg">Pay with
                                                Khalti</span>
                                        </div>
                                        <span class="font-semibold">RS:
                                            {{ selectedSeat.length * selectedData.fare }}</span>
                                    </div>
                                </button>
                                <div class="border-b active:bg-slate-100 w-full py-4 px-6">
                                    <div class="flex items-center justify-between gap-x-4">
                                        <div class="flex gap-2 items-center justify-center">
                                            <span class="h-8 w-8 flex justify-center items-center">
                                                <input @change="isOfflinePay = !isOfflinePay" type="checkbox"
                                                    class="h-6 w-6">
                                            </span>
                                            <span class="font-medium text-lg">Pay while travelling</span>
                                        </div>
                                        <span class="font-semibold">RS:
                                            {{ selectedSeat.length * selectedData.fare }}</span>
                                    </div>
                                    <div v-if="isOfflinePay">
                                        <button @click="payOffine()"
                                            class="mt-4 font-semibold w-full flex justify-center py-4 px-6 rounded-full text-white transition-all duration-300 bg-green-500 hover:bg-green-500/60">
                                            Pay now
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <div class="px-6 py-6">
                                <h3 class="text-xl mb-4 font-semibold">Ticket Preview</h3>
                                <div class="flex items-center gap-x-5">
                                    <div>
                                        <div class="w-20 h-20 block rounded-2xl overflow-hidden shadow-lg">
                                            <img class="w-full h-full object-cover"
                                                :src="$config.public.apiURL + '/storage/' + selectedData?.bus?.featured_photo_path ?? '/avatar/bus-placeholder.webp'"
                                                alt="logo" />
                                        </div>
                                    </div>
                                    <div>
                                        <h3 class="font-medium mb-1 text-lg">{{ selectedData.bus?.name }}</h3>
                                        <div class="flex items-center gap-x-4">
                                            <div class="font-medium">{{ selectedData.bus?.bus_type?.name }}</div>
                                            <div class="flex items-center gap-x-2">
                                                <div class="flex items-center gap-x-2">
                                                    <IconStar class="w-6 text-green-600"></IconStar>
                                                    <span class="font-medium">4.2</span>
                                                </div>
                                                ( <span class="font-medium text-slate-400 text-sm">389
                                                    reviews</span> )
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="px-6 py-6 border-b">
                                <div class="flex flex-col gap-y-2 mb-6">
                                    <div class="relative pl-11 pb-1">
                                        <div
                                            class="absolute flex gap-y-2 flex-col items-center top-0 left-0 w-8 h-full">
                                            <span class="w-5 min-h-5 block border-[3px] border-red-600"></span>
                                            <span class="w-[3px] rounded-xl block h-full bg-slate-300"></span>
                                        </div>
                                        <div class="flex flex-col gap-y-1">
                                            <span class="font-medium mt-0.5 text-sm text-green-700">Departure</span>
                                            <span class="text-base font-medium">{{ selectedData.origin?.name }} |
                                                {{ selectedData.departure }}</span>
                                        </div>
                                    </div>
                                    <div class="relative pl-11 pb-1">
                                        <div
                                            class="absolute flex gap-y-2 flex-col items-center top-0 left-0 w-8 h-full">
                                            <span
                                                class="w-5 min-h-5 block rounded-full border-[3px] border-green-600"></span>
                                        </div>
                                        <div class="flex flex-col gap-y-1">
                                            <span class="font-medium mt-0.5 text-sm text-green-700">Arrival</span>
                                            <span class="text-base font-medium">{{ selectedData.destination?.name }} |
                                                {{ selectedData.arrival }}</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-y-2">
                                    <h3 class="text-green-600 font-medium">Selected Seats</h3>
                                    <div class="flex gap-2">
                                        <span v-for="item in selectedSeat" :key="item">{{ item }},</span>
                                    </div>
                                </div>
                            </div>
                            <div class="px-6 pt-6 pb-16">
                                <h3 class="text-xl mb-4 font-semibold">Passenger Details</h3>
                                <div class="grid grid-cols-2 gap-x-4 gap-y-6">
                                    <div>
                                        <label class="text-green-600 mb-2 block font-medium text-sm">Name of
                                            Passenger</label>
                                        <h3 class="text-lg font-medium">{{ passengerName }}</h3>
                                    </div>
                                    <div>
                                        <label class="text-green-600 mb-2 block font-medium text-sm">Email
                                            Address</label>
                                        <h3 class="text-lg font-medium">
                                            {{ passengerEmail }}
                                        </h3>
                                    </div>
                                    <div class="col-span-2">
                                        <label class="text-green-600 mb-2 block font-medium text-sm">
                                            Mobile Number
                                        </label>
                                        <h3 class="text-lg font-medium">
                                            {{ passengerMobile }}
                                        </h3>
                                    </div>
                                    <div class="col-span-2">
                                        <label class="text-green-600 mb-2 block font-medium text-sm">
                                            Boarding Point
                                        </label>
                                        <h3 class="text-lg font-medium">
                                            {{ boardingPoint }}
                                        </h3>
                                    </div>
                                    <div class="col-span-2">
                                        <label class="text-green-600 mb-2 block font-medium text-sm">
                                            Dropping Point
                                        </label>
                                        <h3 class="text-lg font-medium">
                                            {{ droppingPoint }}
                                        </h3>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="px-6 flex flex-col gap-y-2 bg-sky-950 pt-6 pb-16 rounded-b-xl sm:rounded-br-xl sm:rounded-bl-none ">
                                <div class="grid grid-cols-2 px-4">
                                    <div class="text-white text-lg font-medium">Per Seats</div>
                                    <div class="text-white text-lg font-regular text-right">Rs. {{ selectedData.fare }}
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 px-4">
                                    <div class="text-white text-lg font-medium">Number of Seats</div>
                                    <div class="text-white text-lg font-regular text-right">{{ selectedSeat.length }}
                                    </div>
                                </div>
                                <div class="grid grid-cols-2 px-4">
                                    <div class="text-white text-lg font-medium">Total Amount</div>
                                    <div class="text-white text-lg font-regular text-right">Rs.
                                        {{ selectedSeat.length * selectedData.fare }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>