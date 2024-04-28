<script setup>
const modalStore = useModalStore();
const { currentModal } = storeToRefs(modalStore);
const currentTab = ref('basic');
</script>

<template>
    <TheModal @close-current-modal="$emit('close')" :show="show">
        <template #content>
            <div
                class="relative w-full max-w-4xl bg-white shadow-2xl shadow-black/50 px-6 sm:px-8 rounded-3xl py-8 overflow-y-auto max-h-[80vh]">
                <div class="relative flex flex-col gap-y-4">
                    <header class="relative border-b mb-3 w-full flex flex-row justify-between items-start gap-y-4">
                        <div class="flex flex-col gap-y-1">
                            <h3 class="text-xl font-semibold mb-4">Manage bus details</h3>
                            <div class="overflow-x-auto w-full pb-2">
                                <div class="flex gap-x-5">
                                    <button @click="currentTab = 'basic'"
                                        class="relative hover:opacity-80 transition-all-300 pb-2 font-medium">
                                        <i v-if="currentTab == 'basic'"
                                            class="rounded-full absolute left-1/2 -translate-x-1/2 w-1/2 top-full h-1.5 bg-black"></i>
                                        <span>Basic</span>
                                    </button>
                                    <button @click="currentTab = 'amenity'"
                                        class="relative hover:opacity-80 transition-all-300 pb-2 font-medium">
                                        <i v-if="currentTab == 'amenity'"
                                            class="rounded-full absolute left-1/2 -translate-x-1/2 w-1/2 top-full h-1.5 bg-black"></i>
                                        <span>Amenities</span>
                                    </button>
                                    <button @click="currentTab = 'photos'"
                                        class="relative hover:opacity-80 transition-all-300 pb-2 font-medium">
                                        <i v-if="currentTab == 'photos'"
                                            class="rounded-full absolute left-1/2 -translate-x-1/2 w-1/2 top-full h-1.5 bg-black"></i>
                                        <span>Photos</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button
                            class="w-10 h-10 bg-transparent hover:bg-zinc-100 flex justify-center items-center rounded-full"
                            @click="modalStore.toggleModal('none')">
                            <IconX class="w-4" />
                        </button>
                    </header>
                    <div class="flex flex-col gap-y-3 mb-5">
                        <div v-if="currentTab == 'basic'">
                            <ModalsBusManageBasic />
                        </div>
                        <div v-if="currentTab == 'amenity'">
                            <ModalsBusManageAmenity />
                        </div>
                        <div v-if="currentTab == 'photos'">
                            <ModalsBusManagePhoto />
                        </div>
                    </div>
                </div>
            </div>
        </template>
    </TheModal>
</template>
