import { defineStore } from "pinia";
import { useBusService } from "~/services/BusService.js";
export const useBusStore = defineStore("bus-store", {
    state: () => ({
        data: [],
        selected: [],
        uploadingFeaturedPhoto: false,
        pending: false,
    }),

    actions: {
        async getData() {
            const operatorStore = useOperatorStore();
            const { operator } = storeToRefs(operatorStore);
            this.pending = true;
            const response = await useBusService().getData(operator.value.id);
            if (response.data) {
                this.data = response.data;
            }
            this.pending = false;
            return response;
        },

        async save(data) {
            this.pending = true;
            const response = await useBusService().saveData(data);
            if (response) {
                this.getData();
            }
            this.pending = false;
            return response;
        },

         async update(data, id) {
            this.pending = true;
            const response = await useBusService().update(data, id);
            if (response) {
                this.getData();
            }
            this.pending = false;
            return response;
        },

        async delete(id) {
            this.pending = true;
            const response = await useBusService().delete(id);
            if (response) {
                this.getData();
            }
            this.pending = false;
            return response;
        },

        async updateFeaturedPhoto(data) {
            this.uploadingFeaturedPhoto = true
            try {
                await this.csrf();
                const response = await useBusService().updateFeaturedPhoto(data)
                this.getData()
                selectData(response.data)
                return response
            } catch (error) {
                throw error
            } finally {
                this.uploadingFeaturedPhoto = false
            }
        },

        selectData(data) {
            this.selected = data
        },

         async csrf() {
            await useApiFetch("/sanctum/csrf-cookie");
        }

    },

  getters: {
    searchData({ data }) {
      return (query) => {
        console.log(query)
        return data.filter(item => item.name.toLowerCase().includes(query.toLowerCase()))
      }
    }
  }
});
