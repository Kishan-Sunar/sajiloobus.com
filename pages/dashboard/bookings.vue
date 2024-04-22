<script setup>
definePageMeta({
    middleware: ["passenger-auth"],
});
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
                        <div v-for="item in [1, 2, 3, 4, 5]" :key="item">
                            <div
                                class="px-4 sm:px-6 relative hover:bg-slate-50"
                            >
                                <div
                                    class="grid gap-y-3 sm:grid-cols-[minmax(min-content,80px)_1fr]"
                                >
                                    <div class="py-2">
                                        <div
                                            class="w-[80px] h-[80px] bg-slate-400 block rounded-full overflow-hidden shadow-lg"
                                        >
                                            <img
                                                class="w-full h-full object-cover"
                                                src="https://www.gracefuladventure.com/wp-content/uploads/2019/03/Tourist-bus.jpg"
                                                alt="logo"
                                            />
                                        </div>
                                    </div>
                                    <div class="px-0 py-4 sm:px-6 border-b">
                                        <div
                                            class="flex sm:flex-row gap-y-2 flex-col sm:items-center sm:justify-between mb-2.5"
                                        >
                                            <div
                                                class="flex items-center gap-x-3"
                                            >
                                                <h3
                                                    class="font-semibold text-base"
                                                >
                                                    Bus Company
                                                </h3>
                                                <span
                                                    class="py-0.5 px-2.5 sm:px-4 block rounded-full text-xs font-semibold border-[1.5px] border-green-700 bg-green-50 text-green-700"
                                                    >Active</span
                                                >
                                            </div>
                                            <div>
                                                <button
                                                    class="flex hover:text-red-500 text-sm gap-x-2 px-2 justify-between items-center"
                                                >
                                                    <IconX
                                                        class="h-3 text-red-500"
                                                    />
                                                    <span
                                                        class="font-medium text-sm"
                                                        >Cancel Booking</span
                                                    >
                                                </button>
                                            </div>
                                        </div>
                                        <div
                                            class="grid grid-cols-2 sm:grid-cols-5 gap-y-2 gap-x-6"
                                        >
                                            <div class="flex flex-col gap-y-1">
                                                <h2
                                                    class="text-sm font-medium text-slate-500"
                                                >
                                                    From
                                                </h2>
                                                <span
                                                    class="text-base font-medium"
                                                    >Pokhara</span
                                                >
                                            </div>
                                            <div class="flex flex-col gap-y-1">
                                                <h2
                                                    class="text-sm font-medium text-slate-500"
                                                >
                                                    To
                                                </h2>
                                                <span
                                                    class="text-base font-medium"
                                                    >Surkhet</span
                                                >
                                            </div>
                                            <div class="flex flex-col gap-y-1">
                                                <h2
                                                    class="text-sm font-medium text-slate-500"
                                                >
                                                    Seats
                                                </h2>
                                                <span
                                                    class="text-base font-medium"
                                                    >A1, A2</span
                                                >
                                            </div>
                                            <div class="flex flex-col gap-y-1">
                                                <h2
                                                    class="text-sm font-medium text-slate-500"
                                                >
                                                    No. of Passenger
                                                </h2>
                                                <span
                                                    class="text-base font-medium"
                                                    >3</span
                                                >
                                            </div>
                                            <div class="flex flex-col gap-y-1">
                                                <h2
                                                    class="text-sm font-medium text-slate-500"
                                                >
                                                    Price Per
                                                </h2>
                                                <span
                                                    class="text-base font-medium"
                                                    >NPR. 1200</span
                                                >
                                            </div>
                                        </div>
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
