<script setup>
const modalStore = useModalStore();
const { $notificationStore, $passengerStore } = useNuxtApp();
const { currentModal } = storeToRefs(modalStore);
const searchStore = useSearchStore();
const { selected: selectedData } = storeToRefs(searchStore)
defineProps({
    show: {
        required: true,
    },
});
const reviewStore = useReviewStore();
const { selectedRating, review, stars, pending } = storeToRefs(reviewStore);
function submitReview() {
    const data = {
        'bus_no': selectedData.value.bus.bus_no,
        'passenger_id': $passengerStore.passenger.id,
        'ratings': selectedRating.value,
        'comments': review.value
    }
    const response = reviewStore.save(data)
    if (response) {
        $notificationStore.pushNotification(response.message)
    }

}
</script>
<template>
    <TheModal @close-current-modal="$emit('close')" :show="show">
        <template #content>
            <div
                class="w-full relative sm:w-[550px] bg-white shadow-2xl shadow-black/50 px-6 sm:px-8 rounded-3xl py-8 overflow-y-auto max-h-[80vh]">
                <div class="relative flex flex-col gap-y-4">
                    <header class="relative mb-3 w-full flex flex-row justify-between items-start gap-y-4">
                        <div class="flex flex-col gap-y-1">
                            <h3 class="text-xl font-semibold">Bus Review/Ratings</h3>
                        </div>
                        <button
                            class="w-10 h-10 bg-transparent hover:bg-zinc-100 flex justify-center items-center rounded-full"
                            @click="modalStore.toggleModal('none')">
                            <IconX class="w-4" />
                        </button>
                    </header>
                    <div class="flex flex-col gap-y-3 mb-5">
                        <form @submit.prevent="submitReview">
                            <div class="mb-5">
                                <span v-for="star in stars" :key="star" @click="reviewStore.rate(star)"
                                    :class="{ 'text-yellow-500': star <= selectedRating }"
                                    class="text-4xl cursor-pointer">&#9733;</span>
                                <span class="ml-2 text-2xl font-bold">{{ selectedRating }}</span>
                            </div>
                            <textarea class="px-4 py-2 w-full border mb-2 rounded" v-model="review" rows="3"
                                name="review" type="text" placeholder="Enter review"></textarea>
                            <div class="flex justify-end">
                                <button type="submit" class="bg-green-600 text-white px-8 py-3 rounded-lg">Submit
                                    Review</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </template>
    </TheModal>
</template>