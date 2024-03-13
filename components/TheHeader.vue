<script setup>
let showLoginModal = ref(false)
let showRegisterModal = ref(false)
</script>

<template>
    <header class="fixed z-40 top-0 left-0 right-0">
        <div class="container mx-auto">
            <div class="bg-sky-950 rounded-b-lg shadow-xl">
                <div class="flex gap-x-2">
                    <div class="py-3 rounded-bl-lg active:opacity-90 bg-white px-6">
                        <nuxt-link to="/">
                            <IconLogo class="w-[14rem] hidden sm:block" />
                            <IconLogoIcon class="w-[2.5rem] block sm:hidden" />
                        </nuxt-link>
                    </div>
                    <div class="flex items-center justify-between w-full px-2">
                        <div class="hidden sm:flex">
                            <ul class="flex gap-x-4">
                                <li>
                                    <nuxt-link to="/search"
                                        class="text-white/80 py-6 px-1 flex items-center hover:text-green-600">Browse</nuxt-link>
                                </li>
                                <li>
                                    <a href=""
                                        class="text-white/80 py-6 px-1 flex items-center hover:text-green-600">Offer</a>
                                </li>
                                <li>
                                    <a href=""
                                        class="text-white/80 py-6 px-1 flex items-center hover:text-green-600">Help
                                        Desk</a>
                                </li>
                            </ul>
                        </div>
                        <div class="ml-auto">
                            <ul class="flex items-center gap-x-4">
                                <li>
                                    <button @click.self="showLoginModal = true"
                                        class="text-white/80 py-4 px-1 flex items-center hover:text-green-600">Login</button>
                                </li>
                                <li>
                                    <button @click.self="showRegisterModal = true"
                                        class="transition-all duration-300 text-white/80 bg-green-600 py-4 px-8 shadow rounded-lg flex items-center hover:bg-green-700">Register</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <TheLogin @open-register="showRegisterModal = true" @close="showLoginModal = false" :show="showLoginModal" />
    <TheRegister @open-login="showLoginModal = true" @close="showRegisterModal = false" :show="showRegisterModal" />
</template>