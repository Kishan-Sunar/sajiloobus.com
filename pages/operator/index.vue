<script setup lang="ts">
definePageMeta({
    layout: 'nolayout',
})
</script>

<template>
    <main>
        <div class="h-dvh w-dvw pt-10 sm:pt-40 pb-10 overflow-y-auto bg-[#181D31]">
            <div class="container mx-auto">
                <div class="grid sm:px-16 sm:grid-cols-2 gap-x-8 gap-y-10">
                    <div>
                        <header class="space-y-2 mb-6">
                            <h3 class="text-2xl text-white font-medium">Login</h3>
                            <p>
                                <span class="opacity-70 text-white mr-2">Don’t have an account yet?</span>
                                <nuxt-link to="/operator/joinnow"
                                    class="text-green-600 text-sm font-medium hover:opacity-90">Join
                                    Now</nuxt-link>
                            </p>
                        </header>
                        <div class="space-y-4">
                            <div class="flex bg-white rounded-2xl shadow-sm divide-x">
                                <div class="w-16 py-3 flex justify-center items-center">
                                    <icon-mail class="h-5" />
                                </div>
                                <div class="px-3 py-3">
                                    <label for="email" class="block font-medium text-sm">Email</label>
                                    <input id="email" class="w-full outline-none" type="email"
                                        placeholder="info@deshdarshan.com" />
                                </div>
                            </div>
                            <div class="flex bg-white rounded-2xl shadow-sm divide-x">
                                <div class="w-16 py-3 flex justify-center items-center">
                                    <icon-lock class="h-6" />
                                </div>
                                <div class="px-3 py-3">
                                    <label for="password" class="block font-medium text-sm">Password</label>
                                    <input id="password" class="w-full outline-none" type="password"
                                        placeholder="password" />
                                </div>
                            </div>
                            <div>
                                <nuxt-link to="/" class="font-medium text-sm text-white hover:opacity-60">
                                    Forgot Password ?
                                </nuxt-link>
                            </div>
                            <div>
                                <nuxt-link to="/operator/manage-bus"
                                    class="py-5 font-medium text-md w-full flex justify-center items-center px-2 rounded-2xl text-white bg-green-600 hover:bg-green-600 transition-all duration-300">
                                    Login
                                </nuxt-link>
                            </div>
                        </div>
                    </div>
                    <div class="sticky top-32">
                        <OperatorPromoCard class=" sm:-mt-[40px]" />
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>