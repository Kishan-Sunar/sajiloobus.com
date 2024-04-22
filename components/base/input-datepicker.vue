<script setup>
import { onClickOutside } from '@vueuse/core'
import VueDatePicker from '@vuepic/vue-datepicker'
import '@vuepic/vue-datepicker/dist/main.css'
import '~/assets/css/calendar.css'

defineOptions({
    inheritAttrs: false
})
defineProps({
    label: String,
    value: String
})

const isFocus = ref(false)
const targetInputBox = ref(null)
onClickOutside(targetInputBox, () => isFocus.value = false)
const format = (date) => {
    const day = date.getDate();
    const month = date.getMonth() + 1;
    const year = date.getFullYear();
    return `${day}/${month}/${year}`;
}
</script>

<template>
    <div class="relative flex items-center space-x-5" ref="targetInputBox">
        <input v-bind="$attrs" readonly :value="value" placeholder="Pick Date" type="text" @click="isFocus = true"
            :class="isFocus ? 'bg-white shadow-[0px_0px_4px_rgba(0,0,0,.15)]' : 'bg-transparent'"
            class="focus:border-primary-700 focus:ring-primary-100 w-full rounded-lg border border-gray-300 py-3 text-black outline-none placeholder:font-light placeholder:text-black focus:ring-2" />
        <Transition enter-from-class="transition duration-400 scale-95 opacity-0"
            enter-to-class="transition duration-300 scale-100 opacity-100"
            leave-from-class="transition duration-400 scale-100 opacity-100"
            leave-to-class="transition duration-300 scale-95 opacity-0">
            <div ref="inputDropbox" v-if="isFocus"
                class="absolute z-50 top-full left-0 sm:left-1/2 sm:-translate-x-1/2 pt-5">
                <div class="bg-white overflow-hidden rounded-2xl shadow-[0px_12px_51px_-5px_rgba(0,0,0,0.25)]">
                    <VueDatePicker :value="value"
                        @update:model-value="(selectedDate) => { $emit('action', format(selectedDate)); isFocus = false }"
                        class=" border-0" inline auto-apply :enable-time-picker="false"></VueDatePicker>
                </div>
            </div>
        </Transition>

        <slot name="icon"></slot>
    </div>
</template>