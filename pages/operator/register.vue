<script setup>
definePageMeta({
    layout: 'nolayout',
})
</script>

<template>
    <main>
        <div class="h-dvh w-dvw pt-10 sm:pt-20 pb-10 overflow-y-auto bg-[#181D31]">
            <div class="container mx-auto">
                <div class="grid sm:px-16 sm:grid-cols-2 gap-x-8 gap-y-10">
                    <div>
                        <header class="space-y-2 mb-6">
                            <h3 class="text-2xl text-white font-medium">Join Sajiloobus</h3>
                            <p>
                                <span class="opacity-70 text-white mr-2">Already a member?</span>
                                <nuxt-link to="/operator" class="text-green-600 text-sm font-medium hover:opacity-90">
                                    Login Now
                                </nuxt-link>
                            </p>
                        </header>
                        <div class="space-y-4">
                            <div class="flex bg-white rounded-2xl shadow-sm divide-x">
                                <div class="w-16 py-3 flex justify-center items-center">
                                    <icon-person-v2 class="h-7" />
                                </div>
                                <div class="px-3 py-3">
                                    <span class="block font-medium text-sm">Name</span>
                                    <input class="w-full outline-none" type="text" placeholder="Desh Darshan" />
                                </div>
                            </div>
                            <div class="flex bg-white rounded-2xl shadow-sm divide-x">
                                <div class="w-16 py-3 flex justify-center items-center">
                                    <icon-mail class="h-7" />
                                </div>
                                <div class="px-3 py-3">
                                    <span class="block font-medium text-sm">Email</span>
                                    <input class="w-full outline-none" type="email"
                                        placeholder="info@deshdarshan.com" />
                                </div>
                            </div>
                            <div class="flex bg-white rounded-2xl shadow-sm divide-x">
                                <div class="w-16 py-3 flex justify-center items-center">
                                    <icon-contact class="h-7" />
                                </div>
                                <div class="px-3 py-3">
                                    <span class="block font-medium text-sm">Mobile Number</span>
                                    <input class="w-full outline-none" type="text" placeholder="9824125457" />
                                </div>
                            </div>
                            <div class="flex bg-white rounded-2xl shadow-sm divide-x">
                                <div class="w-16 py-3 flex justify-center items-center">
                                    <icon-map-marker class="h-7" />
                                </div>
                                <div class="px-3 py-3">
                                    <span class="block font-medium text-sm">Location</span>
                                    <input class="w-full outline-none" type="text" placeholder="Surkhet" />
                                </div>
                            </div>
                            <div>
                                <label
                                    class="text-white text-sm font-medium flex items-center gap-x-3 select-none cursor-pointer">
                                    <input type="checkbox" class="accent-green-600 h-6 w-6 cursor-pointer">
                                    <div>
                                        Accept
                                        <nuxt-link to="/" class="text-green-600 hover:opacity-60">
                                            terms and conditions
                                        </nuxt-link>
                                    </div>
                                </label>
                            </div>
                            <div class="pt-6">
                                <nuxt-link to="/operator/login"
                                    class="py-5 font-medium text-md w-full flex justify-center items-center px-2 rounded-2xl text-white bg-green-600 hover:bg-green-600 transition-all duration-300">
                                    Submit
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                    <div class="sticky top-32">
                        <OperatorPromoCard />
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>