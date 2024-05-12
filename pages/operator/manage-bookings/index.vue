<script setup>
definePageMeta({
    layout: 'operator',
    middleware: ["operator-auth"],
})
const bookingStore = useBookingStore();
bookingStore.getDataByOperator();
const { bookings: bookingData } = storeToRefs(bookingStore);
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import { FilterMatchMode } from 'primevue/api';
const filters = ref({
    global: { value: null, matchMode: FilterMatchMode.CONTAINS },
});
</script>

<template>
    <header class="py-4 border-b">
        <div class="container mx-auto flex justify-between items-center">
            <h3 class="text-xl font-semibold">Manage Bookings</h3>
        </div>
    </header>
    <div class="bg-white py-5 pb-28">
        <div class="container mx-auto">
            <DataTable editMode="cell" v:globalFilterFields="['passenger_name']" paginator :rows="10"
                v-if="bookingData.length" :value="bookingData" :loading="loading" tableStyle="min-width: 50rem">
                <Column field="id" header="Id"></Column>
                <Column field="passenger_name" header="Passenger"></Column>
                <Column field="schedule.name" header="From - To"></Column>
                <Column field="total_amount" header="Total">
                    <template #body="slotProps">
                        Rs. {{ slotProps.data.total_amount }}
                    </template>
                </Column>
                <Column field="payment_method" header="Payment Method"></Column>
                <Column field="created_at" header="Booked at">
                    <template #body="slotProps">
                        {{ useFormatDateDMY(slotProps.data.created_at) }}
                    </template>
                </Column>
                <Column field="payment_status" header="Status">
                    <template #body="slotProps">
                        <select @change="bookingStore.changeStatus(slotProps.data.id, $event.target.value)">
                            <option :selected="slotProps.data.payment_status == 'PENDING'" value="PENDING">Pending
                            </option>
                            <option :selected="slotProps.data.payment_status == 'PAID'" value="PAID">Paid</option>
                            <option :selected="slotProps.data.payment_status == 'UNPAID'" value="UNPAID">Un Paid
                            </option>
                            <option :selected="slotProps.data.payment_status == 'REFUNDED'" value="REFUNDED">Refunded
                            </option>
                        </select>
                    </template>
                </Column>
            </DataTable>
            <div v-if="!bookingData.length" class="flex justify-center">
                <TheEmptyMessage message="No bookings done" />
            </div>
        </div>
    </div>
    <ClientOnly>
        <Teleport to="#infobar">
            <nuxt-link to="/search" target="_blank"
                class="absolute transitional-all duration-300 flex justify-center gap-x-2 shadow-md shadow-black/20 bg-green-700 hover:bg-green-800 text-white font-semibold rounded-2xl px-7 py-5 bottom-12 right-5">
                <IconSearch class="h-6" />
                <span>Book New</span>
            </nuxt-link>
        </Teleport>
    </ClientOnly>
</template>