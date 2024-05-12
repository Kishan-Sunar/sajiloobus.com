<script setup>
definePageMeta({
    layout: 'operator',
    middleware: ["operator-auth"],
})
const { $modalStore } = useNuxtApp();
const { currentModal } = storeToRefs($modalStore)
const scheduleStore = useScheduleStore();
scheduleStore.getData();
const { data: schdeuleData, selected, searchData } = storeToRefs(scheduleStore);
const searchQuery = ref('')
</script>

<template>
    <header class="py-4 border-b">
        <div class="container mx-auto flex justify-between items-center">
            <h3 class="text-xl font-semibold">Manage Schedule</h3>
            <button @click="$modalStore.toggleModal('add')"
                class="transition-all duration-300 hover:scale-105 hover:opacity-75 rounded-full">
                <Icon name="i-ph:plus-circle-fill" size="40" color="green" />
            </button>
        </div>
    </header>
    <div class="bg-white py-5">
        <div class="container mx-auto">
            <header class="flex items-center justify-between">
                <h4 class="font-medium text-lg">{{ schdeuleData.length }} Records</h4>
                <div class="relative">
                    <IconSearchV2 class="h-6 text-slate-600 absolute top-1/2 -translate-y-1/2 left-4" />
                    <input type="text" v-model="searchQuery"
                        class="py-3 text-sm font-medium outline-none focus:border-slate-300 placeholder:text-slate-600 pl-12 pr-2 rounded-full border bg-slate-50 w-full"
                        placeholder="Search query here" />
                </div>
            </header>
            <div class="flex flex-col gap-y-1">
                <div v-for="item in searchData(searchQuery)" :key="item" class="py-4">
                    <div class="pb-4 border-b">
                        <div class="grid grid-cols-2 sm:grid-cols-7 gap-y-2 gap-x-6">
                            <div class="flex flex-col gap-y-1">
                                <h2 class="text-sm font-medium text-slate-500">Service Name</h2><span
                                    class="text-base font-medium">{{ item.name }}</span>
                            </div>
                            <div class="flex flex-col gap-y-1">
                                <h2 class="text-sm font-medium text-slate-500">Source</h2>
                                <span class="text-base block font-medium">{{ item.origin.name }}</span>
                                <span class="text-sm font-medium text-green-600">{{ item.departure }}</span>
                            </div>
                            <div class="flex flex-col gap-y-1">
                                <h2 class="text-sm font-medium text-slate-500">Destination</h2><span
                                    class="text-base block font-medium">{{ item.destination.name }}</span>
                                <span class="text-sm font-medium text-yellow-600">{{ item.arrival }}</span>
                            </div>
                            <div class="flex flex-col gap-y-1">
                                <h2 class="text-sm font-medium text-slate-500">Bus no</h2>
                                <span class="text-base font-medium">{{ item.bus.bus_no }}</span>
                                <span class="text-sm text-slate-600 font-medium">{{ item.bus.name }}</span>
                            </div>
                            <div class="flex flex-col gap-y-1">
                                <h2 class="text-sm font-medium text-slate-500">Fare</h2>
                                <span class="text-base font-medium">Rs. {{ item.fare }} / Seats</span>
                            </div>
                            <div class="flex flex-col gap-y-1">
                                <h2 class="text-sm font-medium text-slate-500">Board/Drop</h2>
                                <button
                                    @click="() => { scheduleStore.selectData(item), useRoutePointStore().getData(), $modalStore.toggleModal('manage-points') }"
                                    class="text-base text-left font-medium underline text-blue-500 hover:text-blue-800">Manage</button>
                            </div>
                            <div class="flex justify-end gap-y-1">
                                <SharedActionButton
                                    @action="() => (scheduleStore.selectData(item), $modalStore.toggleModal('edit'))">
                                    <IconEdit class="h-5" />
                                </SharedActionButton>
                                <SharedActionButton
                                    @action="() => (scheduleStore.selectData(item), $modalStore.toggleModal('delete'))">
                                    <IconDelete class="h-5" />
                                </SharedActionButton>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <ModalsSchdeuleAdd :show="currentModal == 'add'" />
    <ModalsSchdeuleEdit :show="currentModal == 'edit'" />
    <ModalsSchdeuleDelete :show="currentModal == 'delete'" />
    <ModalsSchdeulePoints :show="currentModal == 'manage-points'" />
</template>