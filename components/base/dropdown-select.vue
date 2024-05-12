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
    placeholder: String,
    optionLabel: String,
    optionValue: String,
})

const { setValue, value, errorMessage, handleChange } = useField(() => props.name)
if (props.input) {
    setValue(props.input)
}
</script>
<template>
    <Dropdown v-bind="$attrs" :value="value" v-model="value" @change="(target) => { handleChange(target.value) }"
        :options="data" :optionValue="optionValue" :optionLabel="optionLabel" :placeholder="placeholder" />
    <BaseError class="mt-1">
        {{ errorMessage }}
    </BaseError>
</template>