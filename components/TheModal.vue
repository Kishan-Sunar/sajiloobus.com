<script setup>
defineProps({
    show: {
        required: true,
        type: Boolean
    }
})
</script>

<template>
    <div :class="{ '!pointer-events-auto': show }"
        class="pointer-events-none fixed top-0 left-0 w-full h-full overflow-y-auto z-50">
        <Transition enter-from-class="transition duration-400 opacity-0"
            enter-to-class="transition duration-300 opacity-100" leave-from-class="transition duration-400 opacity-100"
            leave-to-class="transition duration-300 opacity-0">
            <div v-if="show" @click="$emit('closeCurrentModal')" class="fixed top-0 left-0 w-full bottom-0 bg-black/60">
            </div>
        </Transition>
        <div class="px-4 sm:px-0 h-full flex justify-center items-center">
            <Transition enter-from-class="transition duration-400 translate-y-48 opacity-0"
                enter-to-class="transition duration-300 translate-y-0 opacity-100"
                leave-from-class="transition duration-400 translate-y-0 opacity-100"
                leave-to-class="transition duration-300 translate-y-48 opacity-0">
                <div v-if="show">
                    <slot name="content"></slot>
                </div>
            </Transition>
        </div>
    </div>
</template>