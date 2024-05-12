import { defineStore } from "pinia";
import { useBusAmenityService } from "~/services/BusAmenityService.js";

export const useBusAmenitiesStore = defineStore("bus-amenty-store", {
    state: () => ({
        data: [],
        selected: [],
        pending: false,
    }),

    actions: {
        async getData() {
            const busStore = useBusStore();
            const { selected:selectedBus } = storeToRefs(busStore);
            this.pending = true;
            const response = await useBusAmenityService().getData(selectedBus.value.bus_no);
            if (response.data) {
                this.data = response.data;
            }
            this.pending = false;
            return response;
        },

        async save(data) {
            this.pending = true;
            const response = await useBusAmenityService().saveData(data);
            if (response.data) {
                this.getData();
            }
            this.pending = false;
            return response;
        },

         async update(data, id) {
            this.pending = true;
            const response = await useBusAmenityService().update(data, id);
            if (response.data) {
                this.getData();
            }
            this.pending = false;
            return response;
        },

        async delete(bus_no, amenity_id) {
            this.pending = true;
            const response = await useBusAmenityService().delete(bus_no, amenity_id);
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
