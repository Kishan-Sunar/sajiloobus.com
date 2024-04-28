import { defineStore } from "pinia";
import { useScheduleService } from "~/services/ScheduleService.js";
export const useScheduleStore = defineStore("schedule-store", {
    state: () => ({
        data: [],
        selected: [],
        pending: false,
    }),

    actions: {
        async getData() {
            const operatorStore = useOperatorStore();
            const { operator } = storeToRefs(operatorStore);
            this.pending = true;
            const response = await useScheduleService().getData(operator.value.id);
            if (response.data) {
                this.data = response.data;
            }
            this.pending = false;
            return response;
        },

        async save(data) {
            this.pending = true;
            const response = await useScheduleService().saveData(data);
            if (response.data) {
                this.getData();
            }
            this.pending = false;
            return response;
        },

         async update(data, id) {
            this.pending = true;
            const response = await useScheduleService().update(data, id);
            if (response.data) {
                this.getData();
            }
            this.pending = false;
            return response;
        },

        async delete(id) {
            this.pending = true;
            const response = await useScheduleService().delete(id);
            if (response.data) {
                this.getData();
            }
            this.pending = false;
            return response;
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
