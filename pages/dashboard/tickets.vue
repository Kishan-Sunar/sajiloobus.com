<script setup>
definePageMeta({
    middleware: ["passenger-auth"],
});
</script>
<template>
    <section class="h-[15rem] bg-green-600 relative"></section>
    <section class="py-10 relative bg-slate-100">
        <div class="container mx-auto">
            <TheProfileCard class="mb-10" />
            <div>
                <h3 class="text-xl font-semibold mb-5">My Tickets</h3>
                <div class="flex flex-col gap-y-6">
                    <div v-for="item in [1, 2, 3, 4, 5]" :key="item">
                        <div
                            :class="{
                                'bg-sky-800': item === 1,
                                'bg-slate-400': item !== 1,
                            }"
                            class="rounded-2xl px-3 py-4"
                        >
                            <div class="mb-1 flex justify-between px-4">
                                <h3 class="text-white font-medium mb-2">
                                    # BUSH01
                                </h3>
                                <span class="text-white">Date: 023/11/12</span>
                            </div>
                            <div class="bg-white py-5 px-4 rounded-2xl">
                                <div
                                    class="grid grid-cols-2 divide-y sm:divide-y-0 sm:divide-dashed sm:divide-x-2 sm:grid-cols-3"
                                >
                                    <div class="col-span-2">
                                        <div
                                            class="grid gap-y-3 gap-x-6 sm:grid-cols-[minmax(min-content,100px)_1fr]"
                                        >
                                            <div>
                                                <div
                                                    class="w-[100px] h-[100px] bg-slate-400 block rounded-full overflow-hidden shadow-lg"
                                                >
                                                    <img
                                                        class="w-full h-full object-cover"
                                                        src="https://www.gracefuladventure.com/wp-content/uploads/2019/03/Tourist-bus.jpg"
                                                        alt="logo"
                                                    />
                                                </div>
                                            </div>
                                            <div class="mt-3">
                                                <h3
                                                    class="text-lg mb-2 font-medium"
                                                >
                                                    Sanjog Tours and Travels -
                                                    BA 4 PA
                                                </h3>
                                                <div
                                                    class="grid grid-cols-2 sm:grid-cols-3 gap-y-2 gap-x-6"
                                                >
                                                    <div
                                                        class="flex flex-col gap-y-1"
                                                    >
                                                        <h2
                                                            class="text-sm font-medium text-slate-500"
                                                        >
                                                            From
                                                        </h2>
                                                        <span
                                                            class="text-base font-medium"
                                                            >Pokhara</span
                                                        >
                                                    </div>
                                                    <div
                                                        class="flex flex-col gap-y-1"
                                                    >
                                                        <h2
                                                            class="text-sm font-medium text-slate-500"
                                                        >
                                                            To
                                                        </h2>
                                                        <span
                                                            class="text-base font-medium"
                                                            >Surkhet</span
                                                        >
                                                    </div>
                                                    <div
                                                        class="flex flex-col gap-y-1"
                                                    >
                                                        <h2
                                                            class="text-sm font-medium text-slate-500"
                                                        >
                                                            Seats
                                                        </h2>
                                                        <span
                                                            class="text-base font-medium"
                                                            >A1, A2</span
                                                        >
                                                    </div>
                                                    <div
                                                        class="flex flex-col gap-y-1"
                                                    >
                                                        <h2
                                                            class="text-sm font-medium text-slate-500"
                                                        >
                                                            No. of Passenger
                                                        </h2>
                                                        <span
                                                            class="text-base font-medium"
                                                            >3</span
                                                        >
                                                    </div>
                                                    <div
                                                        class="flex flex-col gap-y-1"
                                                    >
                                                        <h2
                                                            class="text-sm font-medium text-slate-500"
                                                        >
                                                            Price Per
                                                        </h2>
                                                        <span
                                                            class="text-base font-medium"
                                                            >NPR. 1200</span
                                                        >
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="px-4">
                                        <div class="flex flex-col gap-y-4">
                                            <div class="flex flex-col">
                                                <h2
                                                    class="text-sm font-medium text-slate-500"
                                                >
                                                    Contact
                                                </h2>
                                                <span
                                                    class="text-base font-medium"
                                                    >XXX XXX XXXX</span
                                                >
                                            </div>
                                            <div class="flex flex-col">
                                                <h2
                                                    class="text-sm font-medium text-slate-500"
                                                >
                                                    Mail
                                                </h2>
                                                <span
                                                    class="text-base font-medium"
                                                    >info@domain.com</span
                                                >
                                            </div>
                                            <div class="flex flex-col">
                                                <h2
                                                    class="text-sm font-medium text-slate-500"
                                                >
                                                    Notes
                                                </h2>
                                                <p class="text-base italic">
                                                    Please arrive at the
                                                    boarding point by 7:30 PM.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
