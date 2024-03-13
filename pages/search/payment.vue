<script setup></script>

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
                        </div>
                        <div>
                            <div class="px-6 py-6">
                                <h3 class="text-xl mb-4 font-semibold">Ticket Preview</h3>
                                <div class="flex items-center gap-x-5">
                                    <div>
                                        <div class="w-20 h-20 block rounded-2xl overflow-hidden shadow-lg">
                                            <img class="w-full h-full object-cover"
                                                src="https://www.gracefuladventure.com/wp-content/uploads/2019/03/Tourist-bus.jpg"
                                                alt="logo" />
                                        </div>
                                    </div>
                                    <div>
                                        <h3 class="font-medium mb-1 text-lg">Sanjog Tours and Travels</h3>
                                        <div class="flex items-center gap-x-4">
                                            <div class="font-medium">Deluxe</div>
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
                                            <span class="text-base font-medium">Pokhara | 8:30 PM (NIGHT)</span>
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
                                            <span class="text-base font-medium">Surkhet | 8:30 AM (23 MAY)</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="flex flex-col gap-y-2">
                                    <h3 class="text-green-600 font-medium">Selected Seats</h3>
                                    <span class="text-xl font-semibold">A13, A14, A15,</span>
                                </div>
                            </div>
                            <div class="px-6 pt-6 pb-16">
                                <h3 class="text-xl mb-4 font-semibold">Passenger Details</h3>
                                <div class="grid grid-cols-2 gap-x-4 gap-y-6">
                                    <div>
                                        <label class="text-green-600 mb-2 block font-medium text-sm">Name of
                                            Passenger</label>
                                        <h3 class="text-lg font-medium">Kishan Sunar</h3>
                                    </div>
                                    <div>
                                        <label class="text-green-600 mb-2 block font-medium text-sm">Email
                                            Address</label>
                                        <h3 class="text-lg font-medium">username@domain.com</h3>
                                    </div>
                                    <div class="col-span-2">
                                        <label class="text-green-600 mb-2 block font-medium text-sm">Mobile
                                            Number</label>
                                        <h3 class="text-lg font-medium">+977 9824125457</h3>
                                    </div>
                                    <div class="col-span-2">
                                        <label class="text-green-600 mb-2 block font-medium text-sm">Boarding
                                            Point</label>
                                        <h3 class="text-lg font-medium">Gagangauda | 8:30 PM</h3>
                                    </div>
                                    <div class="col-span-2">
                                        <label class="text-green-600 mb-2 block font-medium text-sm">Dropping
                                            Point</label>
                                        <h3 class="text-lg font-medium">Chinchu | 8:30 PM</h3>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="px-6 flex flex-col gap-y-2 bg-sky-950 pt-6 pb-16 rounded-b-xl sm:rounded-br-xl sm:rounded-bl-none ">
                                <div class="grid grid-cols-2 px-4">
                                    <div class="text-white text-lg font-medium">Per Seats</div>
                                    <div class="text-white text-lg font-regular text-right">Rs. 1240</div>
                                </div>
                                <div class="grid grid-cols-2 px-4">
                                    <div class="text-white text-lg font-medium">Number of Seats</div>
                                    <div class="text-white text-lg font-regular text-right">3</div>
                                </div>
                                <div class="grid grid-cols-2 px-4">
                                    <div class="text-white text-lg font-medium">Total Amount</div>
                                    <div class="text-white text-lg font-regular text-right">Rs. 3600</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>