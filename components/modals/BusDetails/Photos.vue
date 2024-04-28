<script setup>
const modalStore = useModalStore();
const { currentModal } = storeToRefs(modalStore);
const searchStore = useSearchStore();
const { selected: selectedData } = storeToRefs(searchStore)
defineProps({
    show: {
        required: true,
    },
});
const photos = computed(() => {
    return selectedData.value.photos
})
</script>
<template>
    <TheModal @close-current-modal="$emit('close')" :show="show">
        <template #content>
            <div
                class="w-full relative sm:max-w-3xl bg-white shadow-2xl shadow-black/50 rounded-3xl overflow-y-auto max-h-[100vh]">
                <div class="relative">
                    <header
                        class="absolute z-10 right-5 top-5 mb-3 w-full flex flex-row justify-end items-start gap-y-4">
                        <button
                            class="w-10 h-10 bg-transparent hover:bg-zinc-100 flex justify-center items-center rounded-full"
                            @click="modalStore.toggleModal('none')">
                            <IconX class="w-4" />
                        </button>
                    </header>
                    <div>
                        <div class="hidden text-white">
                            <Button class="text-white" icon="pi pi-minus" @click="prev" />
                            <Button icon="pi pi-plus" @click="next" severity="secondary" class="ml-2 text-white" />
                        </div>

                        <Galleria v-model:activeIndex="activeIndex" :value="photos"
                            :responsiveOptions="responsiveOptions" :numVisible="5" containerStyle="max-width: 100%">
                            <template #item="slotProps">
                                <img :src="$config.public.apiURL + '/storage/' + slotProps.item.photo_path"
                                    :alt="slotProps.item.title" style="width: 100%" />
                            </template>
                            <template #thumbnail="slotProps">
                                <img :src="$config.public.apiURL + '/storage/' + slotProps.item.photo_path"
                                    :alt="slotProps.item.title" class="h-20" />
                            </template>
                        </Galleria>
                    </div>
                </div>
            </div>
        </template>
    </TheModal>
</template>