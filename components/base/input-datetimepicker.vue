<script setup>
import { useField } from 'vee-validate'
import Input from './Input.vue';

defineOptions({
    inheritAttrs: true
})
// const emit = defineEmits(['update:modelValue'])

const props = defineProps({
    data: Array,
    name: String,
    input: String,
    placeholder: String
})

const { setValue, value, errorMessage, handleChange } = useField(() => props.name)
if (props.input) {
    setValue(props.input)
}
</script>

<template>
    <Calendar v-bind="$attrs" :value="value" @change="(target) => { handleChange(target.value) }" v-model="value"
        showTime hourFormat="24" :placeholder="placeholder" showIcon class="rounded-md px-4 calendar" />
    <BaseError class="mt-1">
        {{ errorMessage }}
    </BaseError>
</template>
<style scoped>
.p-inputtext {
    border: 0 !important;
    box-shadow: none !important
}
</style>