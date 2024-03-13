<script setup>
defineProps({
    activePage: String
})
</script>

<template>
    <section class="pt-10 sm:py-50 bg-slate-400 relative z-10">
        <div>
            <ClientOnly>
                <img class="absolute shadow-xl top-0 left-0 bottom-0 h-full w-full object-cover"
                    src="~/assets/backgrounds/bg-blur-1.png" alt="background" />
            </ClientOnly>
        </div>
        <div class="relative pt-20 pb-8">
            <div class="container mx-auto">
                <div class="max-w-3xl mx-auto">
                    <div class="flex flex-row justify-between gap-5">
                        <div class="w-full">
                            <nuxt-link to="/search"
                                class="text-center text-white flex gap-y-3 flex-col items-center justify-center  rounded-full">
                                <div class="w-full flex justify-center relative">
                                    <div :class="(activePage == 'seat-selection' || activePage == 'payment') ? 'text-sky-950 bg-white' : 'text-white'"
                                        class="w-12 h-12 sm:w-20 sm:h-20 transition-all duration-300 flex shadow-2xl shadow-black/50 justify-center items-center rounded-full">
                                        <IconBusSelection class="w-8 sm:w-10" />
                                    </div>
                                    <div class="absolute -right-5 top-1/2 -translate-y-1/2">
                                        <IconArrowRight class="w-10 text-white/60" />
                                    </div>
                                </div>
                                <span class="hidden sm:block opacity-80 font-regular whitespace-nowrap">
                                    BUS SELECTION
                                </span>
                            </nuxt-link>
                        </div>
                        <div class="w-full">
                            <nuxt-link to="/search/seat-selection"
                                class="text-center  text-white flex gap-y-3 flex-col items-center justify-center  rounded-full">
                                <div class="w-full flex justify-center relative">
                                    <div :class="(activePage == 'seat-selection' || activePage == 'payment') ? 'text-sky-950 bg-white' : 'text-white'"
                                        class="w-12 h-12 sm:w-20 sm:h-20 transition-all duration-300 flex shadow-2xl shadow-black/50 justify-center items-center rounded-full">
                                        <IconSeatSelection class="w-8 sm:w-10" />
                                    </div>
                                    <div class="absolute -right-5 top-1/2 -translate-y-1/2">
                                        <IconArrowRight class="w-10 text-white/60" />
                                    </div>
                                </div>
                                <span class="hidden sm:block opacity-80 font-regular whitespace-nowrap">
                                    SEATS SELECTION
                                </span>
                            </nuxt-link>
                        </div>
                        <div class="w-full">
                            <nuxt-link to="/search/payment"
                                class="text-center text-white flex gap-y-3 flex-col items-center justify-center  rounded-full">
                                <div :class="activePage == 'payment' ? 'text-sky-950 bg-white' : 'text-white'"
                                    class="w-12 h-12 sm:w-20 sm:h-20 transition-all duration-300 flex justify-center items-center rounded-full">
                                    <IconPayment class="w-8 sm:w-10" />
                                </div>
                                <span class="hidden sm:block opacity-80 font-regular whitespace-nowrap">
                                    PAYMENTS
                                </span>
                            </nuxt-link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>