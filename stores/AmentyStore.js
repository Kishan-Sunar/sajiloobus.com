import { defineStore } from "pinia";
import { useAmentyService } from "~/services/AmentyService.js";

export const useAmentyStore = defineStore("amenty-store", {
    state: () => ({
        data: [],
        selected: [],
        pending: false,
    }),

    actions: {
        async getData() {
            this.pending = true;
            const response = await useAmentyService().getData();
            if (response.data) {
                this.data = response.data;
            }
            this.pending = false;
            return response;
        },

        async save(data) {
            this.pending = true;
            const response = await useAmentyService().saveData(data);
            if (response.data) {
                this.getData();
            }
            this.pending = false;
            return response;
        },

         async update(data, id) {
            this.pending = true;
            const response = await useAmentyService().update(data, id);
            if (response.data) {
                this.getData();
            }
            this.pending = false;
            return response;
        },

        async delete(id) {
            this.pending = true;
            const response = await useAmentyService().delete(id);
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
