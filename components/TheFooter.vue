<template>
    <footer class="bg-slate-100 py-20">
        <div class="container mx-auto">
            <div class="flex mb-10 sm:items-center sm:flex-row flex-col gap-4">
                <nuxt-link to="/"
                    class="relative items-center flex gap-x-3 font-medium hover:text-green-600 text-slate-500 transition-all duration-200">
                    <IconLogoIcon class="w-8" />
                    <IconChevronRight class="w-2 text-slate-400" />
                </nuxt-link>
                <nuxt-link to="/"
                    class="relative items-center flex gap-x-3 font-medium hover:text-green-600 text-slate-500 transition-all duration-200">
                    <span class="text-base">Home</span>
                    <IconChevronRight class="w-2 text-slate-400" />
                </nuxt-link>
                <nuxt-link to="/"
                    class="relative items-center flex gap-x-3 font-medium hover:text-green-600 text-slate-500 transition-all duration-200">
                    <span class="text-base">About us</span>
                    <IconChevronRight class="w-2 text-slate-400" />
                </nuxt-link>
                <nuxt-link to="/"
                    class="relative items-center flex gap-x-3 font-medium hover:text-green-600 text-slate-500 transition-all duration-200">
                    <span class="text-base">Offers</span>
                    <IconChevronRight class="w-2 text-slate-400" />
                </nuxt-link>
                <nuxt-link to="/"
                    class="relative items-center flex gap-x-3 font-medium hover:text-green-600 text-slate-500 transition-all duration-200">
                    <span class="text-base">Terms and Conditions</span>
                </nuxt-link>
            </div>
            <div class="mb-16">
                <div class="grid gap-5 grid-cols-2 sm:grid-cols-3">
                    <div class="">
                        <h3 class="text-xl mb-2 font-semibold">Top routes</h3>
                        <ul class="flex flex-col gap-y-2">
                            <li>
                                <nuxt-link to="#" class="hover:text-green-600 text-slate-500 transition-all duration-200">
                                    Kathmandu - Pokhara
                                </nuxt-link>
                            </li>
                            <li>
                                <nuxt-link to="#" class="hover:text-green-600 text-slate-500 transition-all duration-200">
                                    Pokhara - Surkhet
                                </nuxt-link>
                            </li>
                            <li>
                                <nuxt-link to="#" class="hover:text-green-600 text-slate-500 transition-all duration-200">
                                    Pokhara - Nepalgung
                                </nuxt-link>
                            </li>
                            <li>
                                <nuxt-link to="#" class="hover:text-green-600 text-slate-500 transition-all duration-200">
                                    Pokhara - Hetauda
                                </nuxt-link>
                            </li>
                        </ul>
                    </div>
                    <div class="">
                        <h3 class="text-xl mb-2 font-semibold">Top Operators</h3>
                        <ul class="flex flex-col gap-y-2">
                            <li>
                                <nuxt-link to="#" class="hover:text-green-600 text-slate-500 transition-all duration-200">
                                    Lotus Tours and Travels
                                </nuxt-link>
                            </li>
                            <li>
                                <nuxt-link to="#" class="hover:text-green-600 text-slate-500 transition-all duration-200">
                                    Desh Darshan Travels
                                </nuxt-link>
                            </li>
                            <li>
                                <nuxt-link to="#" class="hover:text-green-600 text-slate-500 transition-all duration-200">
                                    Syanjha Tours and Travels
                                </nuxt-link>
                            </li>
                        </ul>
                    </div>
                    <div class="sm:col-span-1 col-span-2">
                        <h3 class="text-xl mb-2 font-semibold">Our Newsletter</h3>
                        <p class="text-slate-500 mb-5">
                            Subscribe to our newsletter and Sign up today for the latest news from our company.
                        </p>
                        <div>
                            <div class="flex items-center relative">
                                <div class="pointer-events-none px-4 absolute left-0 top-1/2 -translate-y-1/2">
                                    <IconMail class="h-6 w-6 ml-2 -mt-0.5 text-slate-500" />
                                </div>
                                <input placeholder="info@domain.com"
                                    class="transition-all duration-300 font-medium text-sm focus:ring-2 focus:ring-green-200 focus:border-green-500 border border-slate-200 py-5 pl-16 w-full outline-none placeholder:text-slate-600 rounded-full" />
                                <button
                                    class="absolute right-2 top-1/2 -translate-y-1/2 bg-green-400 hover:bg-green-300 transition-all duration-300 flex justify-center items-center w-12 h-12 rounded-full">
                                    <IconChevronRight class="w-2" />
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex sm:items-center justify-between flex-col sm:flex-row gap-4">
                <div>
                    <div class="flex gap-x-2">
                        <a href="" class="">
                            <IconFacebook class="h-9 text-slate-600 hover:opacity-80" />
                        </a>
                        <a href="" class="">
                            <IconLinkedIn class="h-9 text-slate-600 hover:opacity-80" />
                        </a>
                    </div>
                </div>
                <span class="text-slate-500 font-medium">© 2022 . All Rights Reserved</span>
            </div>
        </div>
    </footer>
</template>