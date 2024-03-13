<script setup>
defineProps({
    show: {
        required: true,
        type: Boolean
    }
})
</script>

<template>
    <TheModal @close-current-modal="$emit('close')" :show="show">
        <template #content>
            <div
                class="w-full relative sm:w-[550px] bg-white shadow-2xl shadow-black/50 px-6 sm:px-8 rounded-3xl py-8 overflow-hidden">
                <div class="relative flex flex-col gap-y-4">
                    <header class="relative mb-3 w-full flex flex-row justify-between items-start gap-y-4">
                        <div class="flex flex-col gap-y-1">
                            <h3 class="text-xl font-semibold">Signup</h3>
                            <p class="text-sm">
                                Already have an account?
                                <span @click="$emit('openLogin'); $emit('close')"
                                    class="cursor-pointer text-green-600 hover:text-green-600 font-semibold">Login</span>
                            </p>
                        </div>
                        <button
                            class="w-10 h-10 bg-transparent hover:bg-zinc-100 flex justify-center items-center rounded-full"
                            @click="$emit('close')">
                            <IconX class="w-4" />
                        </button>
                    </header>
                    <div class="flex flex-col gap-y-3 mb-5">
                        <div class="relative">
                            <IconUser class="absolute left-4 top-3.5 h-7 text-slate-700" />
                            <input placeholder="Username"
                                class="px-6 py-4 pl-14 w-full text-black placeholder:text-black outline-none focus:border-green-600 focus:ring focus:ring-green-200 rounded-xl border-[1.4px] border-slate-300" />
                        </div>
                        <div class="relative">
                            <IconUser class="absolute left-4 top-3.5 h-7 text-slate-700" />
                            <input placeholder="info@domain.com"
                                class="px-6 py-4 pl-14 w-full text-black placeholder:text-black outline-none focus:border-green-600 focus:ring focus:ring-green-200 rounded-xl border-[1.4px] border-slate-300" />
                        </div>
                        <div class="relative">
                            <IconLock class="absolute left-4 top-3.5 h-7 text-slate-700" />
                            <div class="absolute top-5 right-4">
                                <IconEyeOff v-if="false" class="h-6 text-slate-600" />
                                <IconEye v-if="true" class="h-6 text-green-600" />
                            </div>
                            <input placeholder="Password"
                                class="px-6 py-4 pl-14 w-full text-black placeholder:text-black outline-none focus:border-green-600 focus:ring focus:ring-green-200 rounded-xl border-[1.4px] border-slate-300" />
                        </div>
                        <div class="flex gap-4 flex-col sm:flex-row items-center justify-between">
                            <div class="flex items-center gap-x-4">
                                <input id="tandc" type="checkbox" class="h-6 w-6 accent-green-600" />
                                <label for="tandc" class="text-sm cursor-pointer select-none">
                                    Agree to
                                    <router-link to="#" class="text-green-600 font-semibold hover:text-green-600">terms
                                        and
                                        conditions</router-link>
                                </label>
                            </div>
                            <button
                                class="px-8 py-4 rounded-full text-white bg-green-600 hover:bg-green-600 flex justify-between gap-x-6 items-center">
                                <span class="text-base font-medium">Next</span>
                                <IconChevronRight class="h-4" />
                            </button>
                        </div>
                    </div>
                    <TheSocialLogin />
                </div>
            </div>
        </template>
    </TheModal>
</template>