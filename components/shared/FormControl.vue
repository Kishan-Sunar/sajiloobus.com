<script setup>
const props = defineProps({
    label: String,
    placeholder: String,
    value: String
})
defineOptions({
    inheritAttrs: false
})
let inputValue = ref(props.value)
</script>

<template>
    <div v-bind="$attrs" class="relative">
        <label class=" text-green-800 font-medium mb-2 block">
            {{ label }}
        </label>
        <input ref="input" v-model="inputValue" @input="$emit('update', inputValue)"
            class="py-5 px-4 rounded-md shadow-sm border border-slate-300 form-control font-medium appearance-none text-sm outline-none w-full"
            :placeholder="placeholder" />
    </div>
</template>