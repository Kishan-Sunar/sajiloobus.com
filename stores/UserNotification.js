import { defineStore } from 'pinia'

export const useUserNotificationStore = defineStore('user-notification', {
  state() {
    return {
      notifications: [],
      nextId: 1
    }
  },
  persist: {
    paths: ["notifications"],
  },
  actions: {
    pushNotification(message, type = 'success', userId, read) {
      this.notifications.push({
        message: message,
        created_at: new Date(),
        userId: userId,
        type: type,
        isRead: read,
        id: this.nextId++
      })
    },
    clearAll(userId) {
        this.notifications = this.notifications.filter((item) => item.userId == userId)
    },
    notificationsWithTimeAgo(created_at) {
        const currentTime = new Date().getTime();
        const diff = currentTime - created_at;
        if (diff < 1000) {
        return 'just now';
        } else if (diff < 60 * 1000) {
        const seconds = Math.floor(diff / 1000);
        return `${seconds} second${seconds !== 1 ? 's' : ''} ago`;
        } else if (diff < 60 * 60 * 1000) {
        const minutes = Math.floor(diff / (60 * 1000));
        return `${minutes} minute${minutes !== 1 ? 's' : ''} ago`;
        } else {
        const hours = Math.floor(diff / (60 * 60 * 1000));
        return `${hours} hour${hours !== 1 ? 's' : ''} ago`;
        }
    }
  },
})
