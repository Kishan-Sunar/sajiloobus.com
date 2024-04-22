<script setup>
import { useNotificationStore } from '@/stores/NotificationStore'
import { storeToRefs } from 'pinia'

let notificationStore = useNotificationStore()
let { notifications } = storeToRefs(notificationStore)

function remove(notificationId) {
  // notificationStore.remove(notificationId)

  notifications.value = notifications.value.filter((item) => item.id !== notificationId)
}
</script>

<template>
  <Transition name="slide-fade">
    <div v-if="notifications.length" class="fixed bottom-5 right-5 z-[61]">
      <TransitionGroup name="slide-fade">
        <div v-for="notification in notifications" :key="notification.id">
          <TheNotificationBar :notification="notification" @remove-notification="remove" />
        </div>
      </TransitionGroup>
    </div>
  </Transition>
</template>

<style scoped>
/*
  Enter and leave animations can use different
  durations and timing functions.
*/
.slide-fade-enter-active {
  transition: all 0.25s ease-out;
  transform: scale(1);
}

.slide-fade-leave-active {
  transition: all 0.25s ease-in-out;
}

.slide-fade-enter-from,
.slide-fade-leave-to {
  transform: translateY(20px) scale(0.95);
  opacity: 0;
}
</style>
