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
const { payments: paymentData } = storeToRefs(bookingStore);
import DataTable from 'primevue/datatable';
import Column from 'primevue/column';
import ColumnGroup from 'primevue/columngroup';   // optional
import Row from 'primevue/row';
const reviews = [
    {
        "id": 1,
        "username": "Kishan",
        "ratings": 4,
        "bus": "Sanjog Travels",
        "comments": "Nice service provided by bus operator"
    },
    {
        "id": 2,
        "username": "User2",
        "ratings": 3,
        "bus": "Desh Darshan Night Travels",
        "comments": "Good experience overall"
    },
    {
        "id": 3,
        "username": "User3",
        "ratings": 5,
        "bus": "Tahalka Night Travels",
        "comments": "Excellent service and comfortable journey"
    },
    {
        "id": 4,
        "username": "User4",
        "ratings": 2,
        "bus": "MnS Tours and Travels",
        "comments": "Average experience, could be improved"
    }
]
</script>

<template>
    <section class="h-[15rem] bg-green-600 relative"></section>
    {{ payments }}
    <section class="py-10 relative bg-slate-100">
        <div class="container mx-auto">
            <TheProfileCard class="mb-10" />
            <div class="bg-white rounded-xl shadow-2xl shadow-black/10">
                <div class="border-b px-4 sm:px-6 py-6">
                    <h3 class="text-xl font-semibold">My Ratings</h3>
                </div>
                <div>
                    <div class="flex flex-col pb-10">

                        <DataTable v-if="reviews.length" :value="reviews" tableStyle="min-width: 50rem">
                            <Column field="id" header="Id"></Column>
                            <Column field="username" header="User"></Column>
                            <Column field="bus" header="Bus"></Column>
                            <Column field="ratings" header="Ratings"></Column>
                            <Column field="comments" header="Comments"></Column>
                        </DataTable>
                        <div v-if="!reviews.length" class="flex justify-center">
                            <TheEmptyMessage message="No reviews done" />
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
