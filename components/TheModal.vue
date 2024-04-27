<script setup>
const modalStore = useModalStore();
const { currentModal } = storeToRefs(modalStore);
defineProps({
    show: {
        required: true,
        type: Boolean,
    },
});
</script>

<template>
    <div :class="{ '!pointer-events-auto': show }"
        class="pointer-events-none fixed top-0 left-0 w-full h-full overflow-y-hidden z-50">
        <Transition enter-from-class="transition duration-400 opacity-0"
            enter-to-class="transition duration-300 opacity-100" leave-from-class="transition duration-400 opacity-100"
            leave-to-class="transition duration-300 opacity-0">
            <div v-if="show" @click="modalStore.toggleModal('none')"
                class="fixed top-0 left-0 w-full bottom-0 bg-black/60"></div>
        </Transition>
        <div class="px-4 sm:px-0 h-full flex justify-center items-center">
            <Transition enter-from-class="transition duration-400 scale-90 opacity-0"
                enter-to-class="transition duration-300 scale-100 opacity-100"
                leave-from-class="transition duration-400 scale-100 opacity-100"
                leave-to-class="transition duration-300 scale-90 opacity-0">
                <slot v-if="show" name="content"></slot>
            </Transition>
        </div>
    </div>
</template>
