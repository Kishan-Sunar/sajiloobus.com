<script setup>
import { onBeforeMount, onMounted, ref } from 'vue'

let timeout = ref(null)

const props = defineProps({
  notification: Object
})
const emit = defineEmits(['removeNotification'])
onMounted(() => {
  timeout.value = setTimeout(() => emit('removeNotification', props.notification.id), 3000)
})
onBeforeMount(() => {
  clearTimeout(timeout.value)
})
</script>

<template>
  <Transition name="slide-fade">
    <div
      class="min-w-3xl pointer-events-auto my-2 inline-flex items-center rounded-xl p-4 text-white shadow-2xl"
      :class="
        props.notification.type === 'danger'
          ? 'bg-red-600'
          : props.notification.type === 'warning'
            ? 'bg-amber-600'
            : 'bg-green-600'
      "
      role="alert"
    >
      <Icon name="heroicons:check-circle" size="32" v-if="props.notification.type === 'success'" />

      <Icon name="heroicons:information-circle" size="32" v-else />

      <div class="ml-3 mr-5 text-sm font-normal">{{ props.notification.message }}</div>
      <button
        type="button"
        class="text-whi -my-1.5 ml-4 inline-flex h-6 w-6 items-center justify-center rounded-full bg-black/20 p-1.5 hover:bg-black/40 focus:ring-2 focus:ring-gray-300"
        aria-label="Close"
        @click="$emit('removeNotification', props.notification.id)"
      >
        <svg
          class="h-3 w-3"
          aria-hidden="true"
          xmlns="http://www.w3.org/2000/svg"
          fill="none"
          viewBox="0 0 14 14"
        >
          <path
            stroke="currentColor"
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="2"
            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"
          />
        </svg>
      </button>
    </div>
  </Transition>
</template>

<style scoped>
.notification-bar {
  margin: 1em 0 1em;
}
.slide-fade-move,
.slide-fade-enter-active {
  transition: all 0.3s ease-out;
}

.slide-fade-leave-active {
  transition: all 0.5s cubic-bezier(1, 0.5, 0.8, 1);
}

.slide-fade-enter-from,
.slide-fade-leave-to {
  transform: translateX(20px);
  opacity: 0;
}
</style>
