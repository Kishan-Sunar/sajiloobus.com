import { defineStore } from "pinia";
import { useBusPhotoService } from "~/services/BusPhotoService.js";

export const useBusPhotoStore = defineStore("bus-photo-store", {
    state: () => ({
        data: [],
        selected: [],
        pending: false,
    }),

    actions: {
        async getData() {
            this.pending = true;
            const busStore = useBusStore();
            const {selected} = storeToRefs(busStore);
            const response = await useBusPhotoService().getData(selected.value.bus_no);
            if (response.data) {
                this.data = response.data;
            }
            this.pending = false;
            return response;
        },

        async save(data) {
            this.pending = true;
            const response = await useBusPhotoService().saveData(data);
            if (response.data) {
                this.getData();
            }
            this.pending = false;
            return response;
        },

        async delete(id) {
            this.pending = true;
            const response = await useBusPhotoService().delete(id);
            if (response.data) {
                this.getData();
            }
            this.pending = false;
            return response;
        },

        selectData(data) {
            this.selected = data
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
