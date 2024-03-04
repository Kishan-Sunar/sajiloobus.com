<script setup>
import { onClickOutside } from '@vueuse/core'
defineProps({
    label: String,
    value: String
})
let isFocus = ref(false)
const targetInputBox = ref(null)
onClickOutside(targetInputBox, () => isFocus.value = false)


</script>

<template>
    <div class="flex relative" ref="targetInputBox">
        <div class="py-2 pointer-events-none px-4 absolute left-0 top-1/2 -translate-y-1/2">
            <span v-if="(isFocus || value.length)">
                <slot name="icon"></slot>
            </span>
            <span v-else>
                <slot name="iconActive"></slot>
            </span>

        </div>
        <span
            class="py-2 pointer-events-none text-xs px-4 absolute pl-20 left-0 top-2.5 text-slate-400">{{ label }}</span>
        <input readonly :value="value" placeholder="Pick Location" type="text" @click="isFocus = true"
            :class="isFocus ? 'bg-white shadow-[0px_0px_4px_rgba(0,0,0,.15)]' : 'bg-transparent'"
            class="transition-all duration-300 pb-5 w-full outline-none placeholder:text-black pt-9 pl-20 text-base rounded-xl" />
        <span
            class="divider absolute -right-[.55rem] top-1/2 -translate-y-1/2 w-0.5 rounded-full h-2/3 bg-slate-200"></span>
        <Transition enter-from-class="transition duration-400 scale-95 opacity-0"
            enter-to-class="transition duration-300 scale-100 opacity-100"
            leave-from-class="transition duration-400 scale-100 opacity-100"
            leave-to-class="transition duration-300 scale-95 opacity-0">
            <SearchboxDropBox @select-city="(city) => $emit('action', city)" @close-dropbox="(isFocus = false)"
                v-if="isFocus" />
        </Transition>
    </div>
</template>