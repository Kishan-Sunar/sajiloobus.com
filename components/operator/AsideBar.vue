<script setup></script>

<template>
    <div class="flex px-2 py-4 flex-col gap-y-4 justify-between h-[100vh] border-r">
        <div class="flex flex-col gap-y-4">
            <header class="z-10 mb-2 relative px-4">
                <IconLogo class="h-10" />
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
        <div class="flex flex-col items-center">
            <h4 class="font-medium text-md">Sajiloobus.com</h4>
            <span class="opacity-60 text-sm">for bus owner</span>
        </div>
    </div>
</template>