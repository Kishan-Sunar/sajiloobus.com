<script setup>
definePageMeta({
    middleware: ["passenger-auth"],
});
const route = useRoute()
const query = route.query;
const { $modalStore, $notificationStore } = useNuxtApp();
const { currentModal } = storeToRefs($modalStore)
if (query.status == 'success') {
    $modalStore.toggleModal('khati-success')
}
const bookingStore = useBookingStore();
bookingStore.getPayments();
const { payments: paymentData } = storeToRefs(bookingStore);
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import ColumnGroup from 'primevue/columngroup';   // optional
import Row from 'primevue/row';  
</script>

<template>
    <section class="h-[15rem] bg-green-600 relative"></section>
    {{ payments }}
    <section class="py-10 relative bg-slate-100">
        <div class="container mx-auto">
            <TheProfileCard class="mb-10" />
            <div class="bg-white rounded-xl shadow-2xl shadow-black/10">
                <div class="border-b px-4 sm:px-6 py-6">
                    <h3 class="text-xl font-semibold">My Payments</h3>
                </div>
                <div>
                    <div class="flex flex-col pb-10">
                        <DataTable v-if="paymentData.length" :value="paymentData" tableStyle="min-width: 50rem">
                            <Column field="id" header="Id"></Column>
                            <Column field="passenger_name" header="Passenger"></Column>
                            <Column field="schedule.name" header="From - To"></Column>
                            <Column field="total_amount" header="Total">
                                <template #body="slotProps">
                                    Rs. {{ slotProps.data.total_amount }}
                                </template>
                            </Column>
                            <Column field="payment_method" header="Payment Method"></Column>
                            <Column field="payment_status" header="Status"></Column>
                        </DataTable>
                        <div v-if="!paymentData.length" class="flex justify-center">
                            <TheEmptyMessage message="No payment done" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <ModalsStatusAlert message="Payment done" description="Payment successfully done. And your booking is confirmed"
        :show="currentModal == 'khati-success'">
    </ModalsStatusAlert>
</template>
