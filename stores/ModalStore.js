import { defineStore } from 'pinia'

export const useModalStore = defineStore('modal-store', {
    state: () => ({
        currentModal: ''
    }),
    actions: {
        toggleModal(name) {
            this.currentModal = name
        }
    }
});