import { defineStore } from "pinia";
import { useRoutePointService } from "~/services/RoutePointService.js";
export const useRoutePointStore = defineStore("route-point-store", {
    state: () => ({
        data: [],
        selected: [],
        uploadingFeaturedPhoto: false,
        pending: false,
    }),

    actions: {
        async getData() {
            const scheduleStore = useScheduleStore();
            const { selected: selectedSchedule } = storeToRefs(scheduleStore);
            this.pending = true;
            const response = await useRoutePointService().getData(selectedSchedule.value.id);
            if (response.data) {
                this.data = response.data;
            }
            this.pending = false;
            return response;
        },

        async save(data) {
            this.pending = true;
            const response = await useRoutePointService().saveData(data);
            if (response) {
                this.getData();
            }
            this.pending = false;
            return response;
        },

         async update(data, id) {
            this.pending = true;
            const response = await useRoutePointService().update(data, id);
            if (response) {
                this.getData();
            }
            this.pending = false;
            return response;
        },

        async delete(id) {
            this.pending = true;
            const response = await useRoutePointService().delete(id);
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
                const response = await useRoutePointService().updateFeaturedPhoto(data)
                this.getData()
                this.selected =  response.data;
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
