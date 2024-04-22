import { defineStore } from 'pinia'

export const useNotificationStore = defineStore('notification', {
  state() {
    return {
      notifications: [],
      nextId: 1
    }
  },
  actions: {
    pushNotification(message, type = 'success') {
      this.notifications.push({
        message: message,
        type: type,
        id: this.nextId++
      })
    },
    remove(id) {
      this.notifications = this.notifications.filter((item) => item.id !== id)
    }
  }
})
