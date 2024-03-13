<script setup></script>

<template>
    <div class="bg-white -mt-[10rem] shadow shadow-black/5 rounded-xl">
        <div class="grid gap-y-4 sm:grid-cols-4">
            <div class="bg-slate-400 h-56 rounded-xl sm:rounded-r-none overflow-hidden relative">
                <img src="https://images.unsplash.com/photo-1526336024174-e58f5cdd8e13?w=900&auto=format&fit=crop&q=60&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1yZWxhdGVkfDN8fHxlbnwwfHx8fHw%3D"
                    class="h-full w-full object-cover" alt="Profile Avatar" />
                <nuxt-link to="/"
                    class="bg-white hover:bg-white/90 text-sm font-semibold shadow-lg py-2 px-6 rounded-full absolute bottom-2 left-1/2 -translate-x-1/2">Update</nuxt-link>
            </div>
            <div class="sm:col-span-2 py-5">
                <div
                    class="flex px-2 sm:px-6 flex-col sm:flex-row gap-4 sm:items-end justify-between border-b pb-4 mb-2">
                    <h3 class="text-lg font-medium">Username Here !</h3>
                    <nuxt-link to="#" class="text-sm font-medium hover:text-green-600">Log out</nuxt-link>
                </div>
                <div class="px-2 sm:px-6">
                    <div class="grid sm:grid-cols-2 gap-x-4 gap-y-6">
                        <div>
                            <label class="text-green-600 mb-1.5 block font-medium text-sm">Fullname</label>
                            <h3 class="text-base font-medium">Kishan Sunar</h3>
                        </div>
                        <div>
                            <label class="text-green-600 mb-1.5 block font-medium text-sm">Email Address</label>
                            <h3 class="text-base font-medium">username@domain.com</h3>
                        </div>
                        <div>
                            <label class="text-green-600 mb-1.5 block font-medium text-sm">Contact</label>
                            <h3 class="text-base font-medium">+977 XXX XXX XXXX</h3>
                        </div>
                        <div>
                            <label class="text-green-600 mb-1.5 block font-medium text-sm">Address</label>
                            <h3 class="text-base font-medium">Pokhara-32, Satmuhane</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rounded-xl sm:rounded-bl-none text-white sm:rounded-tl-none bg-sky-900">
                <div class="flex flex-col">
                    <nuxt-link to="/dashboard/bookings"
                        class="hover:bg-white/10 group/item px-3 py-2 flex items-center justify-start gap-x-1">
                        <span class="w-10 h-10 flex justify`-center items-center">
                            <IconMyBookings class="w-8 group-hover/item:text-green-300" />
                        </span>
                        <span class="text-sm opacity-60 font-medium group-hover/item:opacity-100">My Bookings</span>
                    </nuxt-link>
                    <nuxt-link to="/dashboard/tickets"
                        class="hover:bg-white/10 group/item px-3 py-2 flex items-center justify-start gap-x-1">
                        <span class="w-10 h-10 flex justify-center items-center">
                            <IconMyTickets class="w-8 group-hover/item:text-green-300" />
                        </span>
                        <span class="text-sm opacity-60 font-medium group-hover/item:opacity-100">My Tickets</span>
                    </nuxt-link>
                    <nuxt-link to=""
                        class="hover:bg-white/10 group/item px-3 py-2 flex items-center justify-start gap-x-1">
                        <span class="w-10 h-10 flex justify-center items-center">
                            <IconMyPayments class="w-8 group-hover/item:text-green-300" />
                        </span>
                        <span class="text-sm opacity-60 font-medium group-hover/item:opacity-100">My Payments</span>
                    </nuxt-link>
                    <nuxt-link to=""
                        class="hover:bg-white/10 group/item px-3 py-2 flex items-center justify-start gap-x-1">
                        <span class="w-10 h-10 flex justify-center items-center">
                            <IconMyRatings class="w-8 group-hover/item:text-green-300" />
                        </span>
                        <span class="text-sm opacity-60 font-medium group-hover/item:opacity-100">My Ratings</span>
                    </nuxt-link>
                </div>
            </div>
        </div>
    </div>
</template>