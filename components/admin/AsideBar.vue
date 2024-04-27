<script setup></script>

<template>
    <div class="flex flex-col pt-4 gap-y-4 justify-between h-[100vh] border-r">
        <header class="z-10 mb-2 relative px-4">
            <IconLogo class="h-10" />
        </header>
        <div class="mb-auto px-4 overflow-y-auto">
            <div class="relative space-y-2">
                <span class="mb-2 text-xs font-semibold pl-4">Main menu</span>
                <AdminAsideLink label="Dashboard" href="/admin/dashboard">
                    <template #icon>
                        <IconDashboard class="h-6" />
                    </template>
                </AdminAsideLink>
                <AdminAsideLink label="Manage Bus" href="/admin/manage-bus">
                    <template #icon>
                        <IconBus class="h-6" />
                    </template>
                </AdminAsideLink>
                <AdminAsideLink label="Manage Amenties" href="/admin/manage-amenties">
                    <template #icon>
                        <IconAmenties class="h-6" />
                    </template>
                </AdminAsideLink>
                <AdminAsideLink label="Manage Locations" href="/admin/manage-locations">
                    <template #icon>
                        <IconCities class="h-6" />
                    </template>
                </AdminAsideLink>
                <AdminAsideLink label="Manage Schedules" href="/admin/manage-schedules">
                    <template #icon>
                        <IconSchedule class="h-6" />
                    </template>
                </AdminAsideLink>
                <AdminAsideLink label="Manage Bookings" href="/admin/manage-bookings" badge="12">
                    <template #icon>
                        <IconBooking class="h-6" />
                    </template>
                </AdminAsideLink>
                <AdminAsideLink label="Settings" href="/admin/setting">
                    <template #icon>
                        <IconCog class="h-6" />
                    </template>
                </AdminAsideLink>
            </div>
        </div>
        <div class="flex border-t py-4 flex-col items-center">
            <h4 class="font-medium text-md">Sajiloobus.com</h4>
            <span class="opacity-60 text-sm">for Admin</span>
        </div>
    </div>
</template>
