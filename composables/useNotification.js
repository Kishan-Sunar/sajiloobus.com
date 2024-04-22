import { ref } from 'vue'

export function useNotification() {
  let notifications = ref([])

  function addNotification(message, type = 'success') {
    notifications.value.push({
      message: message,
      type: type
    })
  }
  return { notifications, addNotification }
}
