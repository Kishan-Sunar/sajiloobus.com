<script setup></script>

<template>
    <div class="flex flex-col gap-y-4 justify-between h-[calc(100vh-25px)]">
        <div class="flex flex-col gap-y-4">
            <header class="z-10 relative group/action-btn">
                <div
                    class="flex bg-white/10 group-hover/action-btn:shadow-none cursor-pointer  group-hover/action-btn:bg-[#303446] py-4 px-4 text-white rounded-3xl relative z-10  gap-x-4 items-center">
                    <div class="relative">
                        <div class="bg-white rounded-full p-2">
                            <IconLogoIcon class="h-8" />
                        </div>
                    </div>
                    <div class="w-full">
                        <span
                            class="block w-[165px] text-sm leading-[initial] font-semibold whitespace-nowrap overflow-hidden text-ellipsis">
                            Sajiloobus.com
                        </span>
                        <span class="text-xs opacity-60">For Bus Operator</span>
                    </div>
                    <div class="ml-auto">
                        <div class="relative">
                            <div class="bg-white rounded-full h-10 w-10"></div>
                            <icon-chevron-fill
                                class="w-5 absolute bottom-0 right-0 text-green-600 group-hover/action-btn:rotate-180 transition-all duration-300" />
                        </div>
                    </div>
                </div>
                <div
                    class="absolute hidden shadow-2xl shadow-black/40 text-white rounded-3xl group-hover/action-btn:block top-0 pt-20 left-0 w-full bg-[#303446]">
                    <div class="pb-4">
                        <nuxt-link to="/operator" class="flex gap-x-4 items-center hover:bg-white/5 px-4 py-4">
                            <span>
                                <IconLogout class="h-6" />
                            </span>
                            <span class="text-sm opacity-70 font-semibold">Logout</span>
                        </nuxt-link>
                    </div>
                </div>
            </header>
        </div>
        <div class="mb-auto  overflow-y-auto">
            <div class="relative space-y-2">
                <OperatorAsideLink label="Dashboard" href="/operator/dashboard">
                    <template #icon>
                        <IconDashboard class="h-[3rem]" />
                    </template>
                </OperatorAsideLink>
                <OperatorAsideLink label="Manage Bus" href="/operator/manage-bus">

                    <template #icon>
                        <IconBus class="h-[3rem]" />
                    </template>
                </OperatorAsideLink>
                <OperatorAsideLink label="Manage Amenties" href="/operator/manage-amenties">

                    <template #icon>
                        <IconAmenties class="h-[3rem]" />
                    </template>
                </OperatorAsideLink>
                <OperatorAsideLink label="Manage Cities" href="/operator/manage-cities">

                    <template #icon>
                        <IconCities class="h-[3rem]" />
                    </template>
                </OperatorAsideLink>
                <OperatorAsideLink label="Manage Schedules" href="/operator/manage-schedules">

                    <template #icon>
                        <IconSchedule class="h-[3rem]" />
                    </template>
                </OperatorAsideLink>
                <OperatorAsideLink label="Manage Bookings" href="/operator/manage-bookings" badge="12">

                    <template #icon>
                        <IconBooking class="h-[3rem]" />
                    </template>
                </OperatorAsideLink>
                <OperatorAsideLink label="Settings" href="/operator/setting">

                    <template #icon>
                        <IconCog class="h-[3rem]" />
                    </template>
                </OperatorAsideLink>
            </div>
        </div>
        <div class="flex text-white flex-col items-center">
            <h4 class="font-medium text-md">Sajiloobus.com</h4>
            <span class="opacity-60 text-sm">for bus owner</span>
        </div>
    </div>
</template>