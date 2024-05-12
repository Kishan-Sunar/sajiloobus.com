<script setup>
definePageMeta({
    middleware: ["passenger-auth"],
});
const route = useRoute()
const query = route.query;
const { $modalStore, $notificationStore } = useNuxtApp();
const { currentModal } = storeToRefs($modalStore)
const bookingStore = useBookingStore();
bookingStore.getData();
const { bookings: bookingData } = storeToRefs(bookingStore);
</script>
<template>
    <section class="h-[15rem] bg-green-600 relative"></section>
    <section class="py-10 relative bg-slate-100">
        <div class="container mx-auto">
            <TheProfileCard class="mb-10" />
            <div>
                <h3 class="text-xl font-semibold mb-5">My Tickets</h3>
                <div class="flex flex-col gap-y-6">
                    <div v-for="item in bookingData" :key="item">
                        <div :class="{
                            'bg-sky-800': (item.status == 'BOOKED' || item.status == 'PENDING'),
                            'bg-slate-400 select-none': (item.status == 'DECLINED' || item.status == 'CANCELLED_BY_CUSTOMER' || item.status == 'CANCELLED_BY_OPERATOR'),
                        }" class="rounded-2xl px-3 py-4">
                            <div class="mb-1 flex justify-between px-4">
                                <h3 class="text-white font-medium mb-2">
                                    #Bus{{ item.id }}
                                </h3>
                                <span class="text-white">Date: {{ useFormatDateDMY(item.created_at) }}</span>
                            </div>
                            <div class="bg-white py-5 px-4 rounded-2xl">
                                <div
                                    class="grid grid-cols-2 divide-y sm:divide-y-0 sm:divide-dashed sm:divide-x-2 sm:grid-cols-3">
                                    <div class="col-span-2">
                                        <div class="grid gap-y-3 gap-x-6 sm:grid-cols-[minmax(min-content,100px)_1fr]">
                                            <div>
                                                <div
                                                    class="w-[100px] h-[100px] bg-slate-400 block rounded-full overflow-hidden shadow-lg">
                                                    <img class="w-full h-full object-cover"
                                                        :src="$config.public.apiURL + '/storage/' + item.schedule.bus.featured_photo_path ?? '/avatar/bus-placeholder.webp'"
                                                        alt="logo" />
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <h3 class="text-lg mb-2 font-medium">
                                                    {{ item.schedule.bus.name }} -
                                                    {{ item.schedule.bus.bus_no }}
                                                </h3>
                                                <div class="grid grid-cols-2 sm:grid-cols-3 gap-y-2 gap-x-6">
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
                                                            Seats
                                                        </h2>
                                                        <div class="text-base font-medium">
                                                            <span v-for="item in item.booked_seats">
                                                                {{ item.seat_no }},
                                                            </span>
                                                        </div>
                                                    </div>
                                                    <div class="flex flex-col gap-y-1">
                                                        <h2 class="text-sm font-medium text-slate-500">
                                                            Name of Passenger
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
                                    <div class="px-4">
                                        <div class="flex flex-col gap-y-4">
                                            <div class="flex flex-col">
                                                <h2 class="text-sm font-medium text-slate-500">
                                                    Contact
                                                </h2>
                                                <span class="text-base font-medium">
                                                    {{ item.passenger_phone }}
                                                </span>
                                            </div>
                                            <div class="flex flex-col">
                                                <h2 class="text-sm font-medium text-slate-500">
                                                    Mail
                                                </h2>
                                                <span class="text-base font-medium">
                                                    {{ item.passenger_email }}
                                                </span>
                                            </div>
                                            <div class="flex flex-col">
                                                <h2 class="text-sm font-medium text-slate-500">
                                                    Notes
                                                </h2>
                                                <p class="text-base italic">
                                                    Please arrive at the
                                                    boarding point by {{ useFormatDate(item.schedule.arrival) }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center">
                        <TheEmptyMessage message="No tickets available" />
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
