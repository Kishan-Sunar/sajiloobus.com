<script setup></script>

<template>
    <section class="pt-16 pb-4 bg-slate-400 relative z-10">
        <div>
            <img class="absolute shadow-xl top-0 left-0 bottom-0 h-full w-full object-cover"
                src="~/assets/backgrounds/bg-blur.png" alt="background" />
        </div>
        <div class="relative pt-20">
            <div class="container mx-auto">
                <SearchboxCard class="mb-4" />
                <div class="flex flex-col gap-4 sm:items-center sm:flex-row justify-between">
                    <h3 class="text-lg text-white/70">
                        <strong class="text-white">174 Buses</strong>
                        found
                    </h3>
                    <div class="flex gap-x-2">
                        <button
                            class="flex items-center gap-x-2 py-3 px-6 rounded-full bg-white/20 hover:bg-white/15 transition-all duration-300 text-white shadow-xl">
                            <IconFilter class="w-6" />
                            <span>Filter</span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-10 bg-slate-100">
        <div class="container mx-auto">
            <div class="flex flex-col gap-y-6">
                <div v-for="item in [1, 2, 3, 4, 5, 6]" :key="item"
                    class="bg-white transition-all duration-300 hover:scale-[1.01] hover:-translate-y-1 shadow shadow-black/5 rounded-xl">
                    <div class="grid gap-x-5 gap-y-4 sm:grid-cols-4">
                        <div class="bg-slate-400 rounded-xl sm:rounded-r-none overflow-hidden relative">
                            <div class="absolute top-0 left-0 w-full h-full bg-black/20"></div>
                            <span
                                class="bg-white font-semibold shadow-lg py-1 px-3 rounded-full absolute bottom-2 right-5">2</span>
                            <img src="https://www.gracefuladventure.com/wp-content/uploads/2019/03/Tourist-bus.jpg"
                                class="h-full w-full object-cover" alt="bus logo" />
                        </div>
                        <div class="sm:col-span-2">
                            <div class="py-4 px-4">
                                <h3 class="font-semibold text-sky-950 mb-1 text-xl">Sanjog Tours and Travels</h3>
                                <div class="flex items-center gap-x-4 mb-3">
                                    <div class="font-regular text-slate-600">Deluxe</div>
                                    <div class="flex items-center gap-x-2">
                                        <div class="flex items-center gap-x-2">
                                            <IconStar class="w-6 text-green-600"></IconStar>
                                            <span class="font-medium">4.2</span>
                                        </div>
                                        <span class="text-slate-400 text-sm">(389 reviews)</span>
                                    </div>
                                </div>
                                <div class="grid gap-4 gap-y-1 sm:grid-cols-2 justify-between mb-5">
                                    <div class="relative">
                                        <div
                                            class="absolute transition-all duration-300 flex h-full sm:h-min flex-col justify-center sm:justify-start sm:flex-row items-center gap-2 sm:w-full top-0 left-0">
                                            <i class="min-w-4 min-h-4 bg-white border-2 border-red-500"></i>
                                            <div
                                                class="h-full transition-al duration-300 w-[2px] sm:w-full sm:h-[2px] bg-sky-900">
                                            </div>
                                        </div>
                                        <div class="pt-0 pl-8 sm:pt-6 sm:pl-0 pb-3 sm:pb-0 transition-all duration-300">
                                            <span class="text-sm mb-2 text-slate-600">Departure</span>
                                            <h3 class="font-semibold">Pokhara | 8:30 PM (NIGHT)</h3>
                                        </div>
                                    </div>
                                    <div class="relative">
                                        <div
                                            class="absolute transition-all duration-300 flex h-full sm:h-min flex-col sm:flex-row items-center gap-2 sm:w-full top-0 left-0">
                                            <i
                                                class="min-w-4 min-h-4 bg-white rounded-full border-2 border-green-500"></i>
                                        </div>
                                        <div class="pt-0 pl-8 sm:pt-6 sm:pl-0 pb-3 sm:pb-0 transition-all duration-300">
                                            <span class="text-sm mb-2 text-slate-600">Arrival</span>
                                            <h3 class="font-semibold">Surkhet | 8:30 AM (23 MAY)</h3>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="flex flex-col sm:flex-row gap-4">
                                        <nuxt-link to="/"
                                            class="whitespace-nowrap text-sm text-slate-600 hover:text-green-700">Amenties</nuxt-link>
                                        <nuxt-link to="/"
                                            class="whitespace-nowrap text-sm text-slate-600 hover:text-green-700">Photos</nuxt-link>
                                        <nuxt-link to="/"
                                            class="whitespace-nowrap text-sm text-slate-600 hover:text-green-700">Boarding
                                            |
                                            Dropping Points</nuxt-link>
                                        <nuxt-link to="/"
                                            class="whitespace-nowrap text-sm text-slate-600 hover:text-green-700">Policies</nuxt-link>
                                        <nuxt-link to="/"
                                            class="whitespace-nowrap text-sm text-slate-600 hover:text-green-700">Reviews</nuxt-link>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div
                            class="text-white text-center flex flex-col justify-between h-full rounded-xl sm:rounded-l-none bg-sky-900 py-4 px-4">
                            <div class="mb-2 flex flex-col gap-y-4">
                                <h3 class="font-medium">Amenties</h3>
                                <div class="px-4">
                                    <div class="grid justify-center items-center grid-cols-4 gap-x-2">
                                        <IconAmentiesBottle class="w-8 text-white/60" />
                                        <IconAmentiesWifi class="w-8 text-white/60" />
                                        <IconAmentiesTV class="w-8 text-white/60" />
                                        <span class="text-xl font-medium">
                                            + 5
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h4 class="font-medium mb-3">Rs. 1600 / person</h4>
                                <nuxt-link to="/search/seat-selection"
                                    class="cursor-pointer flex justify-center items-center rounded-full transition-all duration-300 text-black py-3 px-4 shadow-lg bg-green-300 hover:bg-green-400 font-medium">
                                    View Seats
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
