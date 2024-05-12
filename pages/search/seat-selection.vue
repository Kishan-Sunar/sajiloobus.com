<script setup>
const bookingStore = useBookingStore();
const auth = useAuthentication();
const { isLoggedIn } = storeToRefs(auth);
const {
  selectedSeat,
  passengerName,
  passengerEmail,
  passengerMobile,
  boardingPoint,
  droppingPoint,
  seatsStatus,
  lastBookings,
} = storeToRefs(bookingStore);
bookingStore.countLastBooking();
const searchStore = useSearchStore();
const { selected: selectedData } = storeToRefs(searchStore);
if (!selectedData.value.id) {
  navigateTo('/search')
}
const seats = (col, row) => {
  const sections = ['A', 'B']; // Define the sections
  const seating = [];

  for (let i = 1; i <= row; i++) {
    sections.forEach(section => {
      for (let j = 1; j <= col; j++) {
        const seat_number = `${section}${i}${j}`;
        const show = true;
        const status = 'available';
        seating.push({ seat_number, show, status });
      }
      if (section == 'A') {
        seating.push({ seat_number: 'passage', show: false, status: 'available' });
      }
    });
  }
  return seating;
}
const grid = computed(() => {
  const gridSize = selectedData.value.bus.bus_type.grid_size.split(' x ')
  return [parseInt(gridSize[0]), parseInt(gridSize[1])]
});

const dropPoints = computed(() => {
  return selectedData.value.route_point.filter((data) => {
    return data.type === "drop"
  })
})
const boardPoints = computed(() => {
  return selectedData.value.route_point.filter((data) => {
    return data.type === "board"
  })
})
bookingStore.isSeatBooked(selectedData.value.id)
</script>

<template>
  <TheBookingSteps activePage="seat-selection" />
  <section v-if="selectedData.id" class="pt-10 pb-20 bg-slate-100">
    <div class="container mx-auto">
      <div class="mx-auto">
        <div class="bg-white border border-slate-200 shadow-2xl shadow-black/10 rounded-xl">
          <div class="grid sm:grid-cols-[minmax(min-content,400px)_1fr] divide-x">
            <div>
              <header class="px-6 py-6 border-b border-slate-200">
                <h1 class="text-lg mb-3 font-semibold">Select Seat</h1>
                <div class="flex gap-4 flex-col sm:flex-row">
                  <div class="flex items-center flex-col gap-y-2 text-xs font-medium">
                    <IconSeat class="h-14 text-slate-400" />
                    <span class="text-slate-500">DISABLED</span>
                  </div>
                  <div class="flex items-center flex-col gap-y-2 text-xs font-medium">
                    <IconSeat class="h-14 text-blue-600" />
                    <span class="text-slate-500">SELECTED</span>
                  </div>
                  <div class="flex items-center flex-col gap-y-2 text-xs font-medium">
                    <IconSeat class="h-14 text-green-600" />
                    <span class="text-slate-500">AVAILABLE</span>
                  </div>
                  <div class="flex items-center flex-col gap-y-2 text-xs font-medium">
                    <IconSeat class="h-14 text-red-600" />
                    <span class="text-slate-500">BOOKED</span>
                  </div>
                </div>
              </header>
              <div class="px-6 py-6">
                <div class="bg-slate-100 px-4 py-4 rounded-2xl w-full">
                  <div class="grid grid-cols-[1fr_5%_1fr] gap-4">
                    <!-- Left column for A -->
                    <div class="col-span-1 grid grid-cols-2 gap-4">
                      <template v-for="row in (2 * grid[1])">
                        <button @click="bookingStore.selectSeat('A' + row)"
                          class="flex items-center flex-col gap-y-1s text-xs font-medium"
                          :disabled="seatsStatus.some(seat => seat.seat_no.indexOf('A' + row) !== -1)">
                          <IconSeat
                            :class="{ '!text-blue-600': selectedSeat.includes('A' + row), '!text-red-600': seatsStatus.some(seat => seat.seat_no.indexOf('A' + row) !== -1) }"
                            class="h-14 text-green-600" />
                          <span class="font-medium text-slate-500">A{{ row }}</span>
                        </button>
                      </template>
                    </div>

                    <!-- Middle column for passage -->
                    <div class="col-span-1 flex justify-center items-center">
                      <!-- Passage -->
                    </div>

                    <!-- Right column for B -->
                    <div v-if="grid[0] == 2" class="col-span-1 grid grid-cols-2 gap-4">
                      <template v-for="row in (2 * grid[1])">
                        <button @click="bookingStore.selectSeat('B' + row)"
                          class="flex items-center flex-col gap-y-1s text-xs font-medium"
                          :disabled="seatsStatus.some(seat => seat.seat_no.indexOf('B' + row) !== -1)">
                          <IconSeat
                            :class="{ '!text-blue-600': selectedSeat.includes('B' + row), '!text-red-600': seatsStatus.some(seat => seat.seat_no.indexOf('B' + row) !== -1) }"
                            class="h-14 text-green-600" />
                          <span class="font-medium text-slate-500">B{{ row }}</span>
                        </button>
                      </template>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div>
              <div>
                <div class="flex items-center gap-x-5 px-6 py-6">
                  <div>
                    <div class="w-20 h-20 block rounded-2xl overflow-hidden shadow-lg">
                      <img class="w-full h-full object-cover"
                        :src="$config.public.apiURL + '/storage/' + selectedData.bus.featured_photo_path ?? '/avatar/bus-placeholder.webp'"
                        alt="logo" />
                    </div>
                  </div>
                  <div>
                    <h3 class="font-medium mb-1 text-lg">{{ selectedData.bus.name }}</h3>
                    <div class="flex items-center gap-x-4">
                      <div class="font-medium">{{ selectedData.bus.bus_type.name }}</div>
                      <div class="flex items-center gap-x-2">
                        <div class="flex items-center gap-x-2">
                          <IconStar class="w-6 text-green-600"></IconStar>
                          <span class="font-medium">4.2</span>
                        </div>
                        ( <span class="font-medium text-slate-400 text-sm">389 reviews</span> )
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="px-6 py-6 border-b">
                <div class="flex flex-col gap-y-2 mb-6">
                  <div class="relative pl-11 pb-1">
                    <div class="absolute flex gap-y-2 flex-col items-center top-0 left-0 w-8 h-full">
                      <span class="w-5 min-h-5 block border-[3px] border-red-600"></span>
                      <span class="w-[3px] rounded-xl block h-full bg-slate-300"></span>
                    </div>
                    <div class="flex flex-col gap-y-1">
                      <span class="font-medium mt-0.5 text-sm text-green-700">Departure</span>
                      <span class="text-base font-medium">{{ selectedData.origin.name }} |
                        {{ selectedData.departure }}</span>
                    </div>
                  </div>
                  <div class="relative pl-11 pb-1">
                    <div class="absolute flex gap-y-2 flex-col items-center top-0 left-0 w-8 h-full">
                      <span class="w-5 min-h-5 block rounded-full border-[3px] border-green-600"></span>
                    </div>
                    <div class="flex flex-col gap-y-1">
                      <span class="font-medium mt-0.5 text-sm text-green-700">Arrival</span>
                      <span class="text-base font-medium">{{ selectedData.destination.name }} |
                        {{ selectedData.arrival }}</span>
                    </div>
                  </div>
                </div>
                <div class="flex flex-col gap-y-2">
                  <h3 class="text-green-600 font-medium">Selected Seats</h3>
                  <div class="flex gap-2">
                    <span v-for="item in selectedSeat" :key="item">{{ item }},</span>
                    <span v-if="!selectedSeat.length">Please select any seat to continue</span>
                  </div>
                </div>
              </div>
              <div class="px-6 pt-6 pb-16">
                <h3 class="text-xl mb-4 font-semibold">Passenger Details</h3>
                <div class="grid grid-cols-2 gap-x-4 gap-y-6">
                  <div>
                    <label class="text-green-600 mb-2 block font-medium text-sm">Name of Passenger</label>
                    <input v-model="passengerName" type="text" placeholder="Eg: Harka Bahadur Sunar"
                      class="py-4 px-4 w-full transition-all duration-300 text-base rounded-xl border-[1.5px] focus:border-green-600 focus:outline-2 focus:outline-green-200 outline-offset-0 outline-none" />
                  </div>
                  <div>
                    <label class="text-green-600 mb-2 block font-medium text-sm">Email Address</label>
                    <input v-model="passengerEmail" type="email" placeholder="Eg: username@domain.com"
                      class="py-4 px-4 w-full transition-all duration-300 text-base rounded-xl border-[1.5px] focus:border-green-600 focus:outline-2 focus:outline-green-200 outline-offset-0 outline-none" />
                  </div>
                  <div class="col-span-2">
                    <label class="text-green-600 mb-2 block font-medium text-sm">Mobile Number</label>
                    <div class="relative">
                      <input v-model="passengerMobile" type="text" placeholder="Eg: XXX XXXX XXXX"
                        class="py-4 pr-4 pl-4 w-full transition-all duration-300 text-base rounded-xl border-[1.5px] focus:border-green-600 focus:outline-2 focus:outline-green-200 outline-offset-0 outline-none" />
                    </div>
                  </div>
                  <div class="col-span-2">
                    <label class="text-green-600 mb-2 block font-medium text-sm">Boarding Point</label>
                    <div class="relative">
                      <select v-model="boardingPoint"
                        class="py-4 pl-4 pr-24 bg-white appearance-none w-full transition-all duration-300 rounded-xl border-[1.5px] focus:border-green-600 focus:outline-2 focus:outline-green-200 outline-offset-0 outline-none">
                        <option v-for="item in boardPoints" :value="item.id" :key="item.id">
                          {{ item.location.name }} |
                          {{ useFormatDate(selectedData.departure) }}
                        </option>
                      </select>
                      <IconChevronExpand class="w-6 absolute right-4 top-4 pointer-events-none" />
                    </div>
                  </div>
                  <div class="col-span-2">
                    <label class="text-green-600 mb-2 block font-medium text-sm">Dropping Point</label>
                    <div class="relative">
                      <select v-model="droppingPoint"
                        class="py-4 pl-4 pr-24 bg-white appearance-none w-full transition-all duration-300 rounded-xl border-[1.5px] focus:border-green-600 focus:outline-2 focus:outline-green-200 outline-offset-0 outline-none">
                        <option v-for="item in dropPoints" :value="item.id" :key="item.id">
                          {{ item.location.name }} |
                          {{ useFormatDate(selectedData.arrival) }}
                        </option>
                      </select>
                      <IconChevronExpand class="w-6 absolute right-4 top-4 pointer-events-none" />
                    </div>
                  </div>
                </div>
                <div v-if="lastBookings > 5" class="py-4">
                  <div class=" bg-slate-200 rounded px-4 py-4 text-lg font-regular text-center">
                    As your last booking is more than 5, you get discount of {{ selectedData.fare * 5 / 100 }}
                  </div>
                </div>
              </div>
              <div
                class="px-6 flex flex-col gap-y-2 bg-sky-950 pt-6 pb-16 rounded-b-xl sm:rounded-br-xl sm:rounded-bl-none ">
                <div class="grid grid-cols-2 px-4">
                  <div class="text-white text-lg font-medium">Per Seats</div>
                  <div class="text-white text-lg font-regular text-right">Rs. {{ selectedData.fare }}</div>
                </div>
                <div class="grid grid-cols-2 px-4">
                  <div class="text-white text-lg font-medium">Number of Seats</div>
                  <div class="text-white text-lg font-regular text-right">{{ selectedSeat.length }}</div>
                </div>
                <div class="grid grid-cols-2 px-4">
                  <div class="text-white text-lg font-medium">Total Amount</div>
                  <div class="text-white text-lg font-regular text-right">Rs.
                    {{ selectedSeat.length * selectedData.fare }}
                  </div>
                </div>
                <div class="flex mt-5 flex-col gap-y-2 gap-x-4 sm:flex-row">
                  <nuxt-link to="/search"
                    class="font-semibold w-full flex justify-center py-4 px-6 rounded-full text-white transition-all duration-300 hover:bg-white/5 border-2 border-white">Back</nuxt-link>
                  <nuxt-link v-if="isLoggedIn" :to="!selectedSeat.length ? '' : '/search/payment'"
                    :class="{ '!opacity-80 !pointer-events-none !select-none': !selectedSeat.length }"
                    class="font-semibold w-full flex justify-center py-4 px-6 rounded-full text-black transition-all duration-300 bg-white hover:bg-white/60">Pay
                    now</nuxt-link>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>