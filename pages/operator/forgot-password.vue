<script setup lang="ts"></script>

<template>
    <title>Operator Login</title>
    <main class="relative">
        <section class="pb-20 pt-32 relative bg-slate-100">
            <div class="container mx-auto">
                <div class="grid sm:grid-cols-2 gap-10">
                    <div>
                        <OperatorPromoCard />
                    </div>
                    <div class="w-full md:px-0 sm:px-4">
                        <div
                            class="relative md:w-full bg-white rounded-2xl px-4 md:px-8 py-5 md:py-8"
                        >
                            <div class="mb-10">
                                <h2
                                    class="text-2xl mb-5 font-semibold text-black"
                                >
                                    Reset Password
                                </h2>
                                <p class="leading-6 text-slate-700">
                                    Did you forget your password? reset it by
                                    entering your email below.
                                </p>
                            </div>
                            <form autocomplete="off" action="">
                                <div class="mt-4 space-y-6">
                                    <div class="form-control isInvalid">
                                        <label class="input-label" name="email"
                                            >Email
                                        </label>
                                        <input
                                            name="email"
                                            class="input-box"
                                            placeholder="Enter email"
                                            autocomplete="off"
                                            type="text"
                                        />
                                        <p class="input-error--label">
                                            <span class="font-semibold"
                                                >Oops!</span
                                            >
                                            Email didn't matched any records
                                        </p>
                                    </div>

                                    <div class="col-span-full">
                                        <button
                                            type="submit"
                                            class="flex w-full justify-between group rounded-full text-md font-semibold px-6 py-5 bg-primary-600 hover:bg-primary-700 text-white transition duration-150"
                                        >
                                            Reset Password
                                            <IconChevronRight
                                                class="group-hover:ml-2 h-6 transition-all duration-300"
                                            />
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>
