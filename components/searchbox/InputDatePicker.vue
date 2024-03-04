<script setup>
import { onClickOutside } from '@vueuse/core'
import VueDatePicker from '@vuepic/vue-datepicker'
import '@vuepic/vue-datepicker/dist/main.css'
import '~/assets/css/calendar.css'

defineProps({
    label: String,
    value: String
})

const isFocus = ref(false)
const targetInputBox = ref(null)
onClickOutside(targetInputBox, () => isFocus.value = false)
let currentDate = new Date();
const nextDate = computed(() => new Date(currentDate.setDate(currentDate.getDate() + 1)))
const format = (date) => {
    const day = date.getDate();
    const month = date.getMonth() + 1;
    const year = date.getFullYear();
    return `${day}/${month}/${year}`;
}
</script>

<template>
    <div class="flex w-full relative" ref="targetInputBox">
        <div class="py-2 pointer-events-none px-4 absolute left-0 top-1/2 -translate-y-1/2">
            <IconCalendar v-if="isFocus || value" class="h-10 w-14" />
            <IconCalendarInactive v-else class="h-10 w-14" />
        </div>
        <span
            class="py-2 pointer-events-none text-xs px-4 absolute pl-20 left-0 top-2.5 text-slate-400">{{ label }}</span>
        <input readonly :value="value" placeholder="Pick Date" type="text" @click="isFocus = true"
            :class="isFocus ? 'bg-white shadow-[0px_0px_4px_rgba(0,0,0,.15)]' : 'bg-transparent'"
            class="transition-all duration-300 pb-5 w-full outline-none placeholder:text-black pt-9 pl-20 text-base rounded-xl" />
        <Transition enter-from-class="transition duration-400 scale-95 opacity-0"
            enter-to-class="transition duration-300 scale-100 opacity-100"
            leave-from-class="transition duration-400 scale-100 opacity-100"
            leave-to-class="transition duration-300 scale-95 opacity-0">
            <div ref="inputDropbox" v-if="isFocus"
                class="absolute top-full left-0 sm:left-1/2 sm:-translate-x-1/2 pt-5">
                <div class="bg-white overflow-hidden rounded-2xl shadow-[0px_12px_51px_-5px_rgba(0,0,0,0.25)]">
                    <div class="flex gap-x-4 items-center justify-center pt-4">
                        <div class="flex gap-2 flex-col sm:flex-row">
                            <button @click="$emit('action', format(currentDate)); isFocus = false"
                                class="px-4 py-1 text-sm font-semibold rounded-full text-slate-600 bg-slate-200 hover:text-green-600 hover:bg-green-200">Today</button>
                            <button @click="$emit('action', format(nextDate)); isFocus = false"
                                class="px-4 py-1 text-sm font-semibold rounded-full text-slate-600 bg-slate-200 hover:text-green-600 hover:bg-green-200">Tomorrow</button>
                        </div>
                    </div>
                    <VueDatePicker :value="value"
                        @update:model-value="(selectedDate) => { $emit('action', format(selectedDate)); isFocus = false }"
                        class=" border-0" inline auto-apply :enable-time-picker="false"></VueDatePicker>
                </div>
            </div>
        </Transition>
    </div>
</template>