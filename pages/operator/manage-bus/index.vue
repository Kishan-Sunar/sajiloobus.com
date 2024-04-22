<script setup>
definePageMeta({
    layout: "operator",
});
</script>

<template>
    <header class="py-4 border-b z-10">
        <div class="container mx-auto flex justify-between items-center">
            <h3 class="text-xl font-semibold">Manage bus</h3>
        </div>
    </header>
    <div class="bg-white py-5">
        <div class="container mx-auto">
            <header class="flex items-center justify-between">
                <h4 class="font-medium text-lg">20/ 200 Records</h4>
                <div class="relative">
                    <IconSearchV2
                        class="h-6 text-slate-600 absolute top-1/2 -translate-y-1/2 left-4"
                    />
                    <input
                        type="text"
                        class="py-3 text-sm font-medium outline-none focus:border-slate-300 placeholder:text-slate-600 pl-12 pr-2 rounded-full border bg-slate-50 w-full"
                        placeholder="Search query here"
                    />
                </div>
            </header>
            <div class="flex flex-col gap-y-1">
                <div v-for="item in [1, 2, 3, 4, 5]" :key="item" class="py-4">
                    <div
                        class="grid gap-y-3 sm:grid-cols-[minmax(min-content,80px)_1fr]"
                    >
                        <div>
                            <div
                                class="w-[50px] h-[50px] bg-slate-400 block rounded-full overflow-hidden shadow-lg"
                            >
                                <img
                                    class="w-full h-full object-cover"
                                    src="https://www.gracefuladventure.com/wp-content/uploads/2019/03/Tourist-bus.jpg"
                                    alt="logo"
                                />
                            </div>
                        </div>
                        <div class="pb-4 border-b">
                            <div
                                class="grid grid-cols-2 sm:grid-cols-3 gap-y-2 gap-x-6"
                            >
                                <div class="flex flex-col gap-y-1">
                                    <h2
                                        class="text-sm font-medium text-slate-500"
                                    >
                                        Registration Number
                                    </h2>
                                    <span class="text-base font-medium"
                                        >Ba 4 Pa 2023</span
                                    >
                                </div>
                                <div class="flex flex-col gap-y-1">
                                    <h2
                                        class="text-sm font-medium text-slate-500"
                                    >
                                        Bus Type
                                    </h2>
                                    <span class="text-base font-medium"
                                        >Sleeper seater | 2+ 1</span
                                    >
                                </div>
                                <div class="flex justify-end gap-y-1">
                                    <SharedActionButton>
                                        <IconEdit class="h-5" />
                                    </SharedActionButton>
                                    <SharedActionButton>
                                        <IconEllipseV class="h-5" />
                                    </SharedActionButton>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ClientOnly>
        <Teleport to="#infobar">
            <div class="px-4 bg-amber-100 py-4">
                Your subscription has been expired. Please renew the
                subscription
            </div>
        </Teleport>
    </ClientOnly>
</template>
