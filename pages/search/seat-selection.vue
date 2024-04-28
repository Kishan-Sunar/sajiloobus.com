<script setup>
const bookingStore = useBookingStore();
const { selectedSeat } = storeToRefs(bookingStore);
const searchStore = useSearchStore();
const { selected: selectedData } = storeToRefs(searchStore);
if (!selectedData.value.id) {
  navigateTo('/search')
}
const seats = (row, col) => {
  return [
    {
      seat_number: 'A1',
      show: true,
      status: 'available'
    },
    {
      seat_number: 'A2',
      show: true,
      status: 'disabled'
    },
    {
      seat_number: '-',
      show: false,
      status: 'disabled'
    },
    {
      seat_number: 'B1',
      show: true,
      status: 'disabled'
    },
    {
      seat_number: 'B2',
      show: true,
      status: 'available'
    },
    {
      seat_number: 'A3',
      show: true,
      status: 'disabled'
    },
    {
      seat_number: 'A4',
      show: true,
      status: 'available'
    },
    {
      seat_number: '-',
      show: false,
      status: 'disabled'
    },
    {
      seat_number: 'B3',
      show: true,
      status: 'available'
    },
    {
      seat_number: 'B4',
      show: true,
      status: 'booked'
    },
    {
      seat_number: 'A5',
      show: true,
      status: 'available'
    },
    {
      seat_number: 'A6',
      show: true,
      status: 'available'
    },
    {
      seat_number: 'A7',
      show: true,
      status: 'available'
    },
    {
      seat_number: 'B5',
      show: true,
      status: 'available'
    },
    {
      seat_number: 'B6',
      show: true,
      status: 'booked'
    }
  ]
}
</script>

<template>
  <TheBookingSteps activePage="seat-selection" />
  <section v-if="selectedData.id" class="pt-10 pb-20 bg-slate-100">
    <div class="container mx-auto">
      <div class="mx-auto">
        <div class="bg-white border border-slate-200 shadow-2xl shadow-black/10 rounded-xl">
          <div class="grid sm:grid-cols-[minmax(min-content,400px)_1fr] divide-x">
            <div>
              {{ seats((selectedData.bus[0].bus_type[0].grid_size).split(' x ')[0], (selectedData.bus[0].bus_type[0].grid_size).split(' x ')[1]) }}
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
                  <div class="grid gap-6 grid-cols-5">
                    <div v-for="seat in seats" :key="seat.seat_number">
                      <button @click="bookingStore.selectSeat(seat)"
                        :disabled="seat.status == 'disabled' || seat.status == 'booked'" v-if="seat.show"
                        class="flex items-center flex-col gap-y-1s text-xs font-medium">
                        <IconSeat
                          :class="{ 'text-green-600': seat.status == 'available', 'text-red-600': seat.status == 'booked', 'text-slate-400': seat.status == 'disabled' }"
                          class="h-14" />
                        <span class="font-medium text-slate-500">{{ seat.seat_number }}</span>
                      </button>
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
                        src="https://www.gracefuladventure.com/wp-content/uploads/2019/03/Tourist-bus.jpg" alt="logo" />
                    </div>
                  </div>
                  <div>
                    <h3 class="font-medium mb-1 text-lg">Sanjog Tours and Travels</h3>
                    <div class="flex items-center gap-x-4">
                      <div class="font-medium">Deluxe</div>
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
                      <span class="text-base font-medium">Pokhara | 8:30 PM (NIGHT)</span>
                    </div>
                  </div>
                  <div class="relative pl-11 pb-1">
                    <div class="absolute flex gap-y-2 flex-col items-center top-0 left-0 w-8 h-full">
                      <span class="w-5 min-h-5 block rounded-full border-[3px] border-green-600"></span>
                    </div>
                    <div class="flex flex-col gap-y-1">
                      <span class="font-medium mt-0.5 text-sm text-green-700">Arrival</span>
                      <span class="text-base font-medium">Surkhet | 8:30 AM (23 MAY)</span>
                    </div>
                  </div>
                </div>
                <div class="flex flex-col gap-y-2">
                  <h3 class="text-green-600 font-medium">Selected Seats</h3>
                  <span class="text-xl font-semibold">
                    <span v-for="item in selectedSeat" :key="item">{{ item.seat_number }}</span>
                  </span>
                </div>
              </div>
              <div class="px-6 pt-6 pb-16">
                <h3 class="text-xl mb-4 font-semibold">Passenger Details</h3>
                <div class="grid grid-cols-2 gap-x-4 gap-y-6">
                  <div>
                    <label class="text-green-600 mb-2 block font-medium text-sm">Name of Passenger</label>
                    <input type="text" placeholder="Eg: Harka Bahadur Sunar"
                      class="py-4 px-4 w-full transition-all duration-300 text-base rounded-xl border-[1.5px] focus:border-green-600 focus:outline-2 focus:outline-green-200 outline-offset-0 outline-none" />
                  </div>
                  <div>
                    <label class="text-green-600 mb-2 block font-medium text-sm">Email Address</label>
                    <input type="email" placeholder="Eg: username@domain.com"
                      class="py-4 px-4 w-full transition-all duration-300 text-base rounded-xl border-[1.5px] focus:border-green-600 focus:outline-2 focus:outline-green-200 outline-offset-0 outline-none" />
                  </div>
                  <div class="col-span-2">
                    <label class="text-green-600 mb-2 block font-medium text-sm">Mobile Number</label>
                    <div class="relative">
                      <div class="absolute left-0 top-4">
                        <select class="appearance-none w-full bg-transparent pl-4 pr-11">
                          <option>+977</option>
                          <option>+1</option>
                          <option>+91</option>
                        </select>
                        <IconChevronExpand class="w-5 absolute right-4 top-0.5 pointer-events-none" />
                      </div>
                      <input type="text" placeholder="Eg: XXX XXXX XXXX"
                        class="py-4 pr-4 pl-24 w-full transition-all duration-300 text-base rounded-xl border-[1.5px] focus:border-green-600 focus:outline-2 focus:outline-green-200 outline-offset-0 outline-none" />
                    </div>
                  </div>
                  <div class="col-span-2">
                    <label class="text-green-600 mb-2 block font-medium text-sm">Boarding Point</label>
                    <div class="relative">
                      <select
                        class="py-4 pl-4 pr-24 bg-white appearance-none w-full transition-all duration-300 rounded-xl border-[1.5px] focus:border-green-600 focus:outline-2 focus:outline-green-200 outline-offset-0 outline-none">
                        <option>Gagangauda | 8:30 PM</option>
                        <option>Power House | 8:30 PM</option>
                        <option>Amarsingh Chowk | 8:30 PM</option>
                      </select>
                      <IconChevronExpand class="w-6 absolute right-4 top-4 pointer-events-none" />
                    </div>
                  </div>
                  <div class="col-span-2">
                    <label class="text-green-600 mb-2 block font-medium text-sm">Dropping Point</label>
                    <div class="relative">
                      <select
                        class="py-4 pl-4 pr-24 bg-white appearance-none w-full transition-all duration-300 rounded-xl border-[1.5px] focus:border-green-600 focus:outline-2 focus:outline-green-200 outline-offset-0 outline-none">
                        <option>Chinchu | 8:30 PM</option>
                        <option>Nepalgunj | 8:30 PM</option>
                        <option>Kohal Pur | 8:30 PM</option>
                      </select>
                      <IconChevronExpand class="w-6 absolute right-4 top-4 pointer-events-none" />
                    </div>
                  </div>
                </div>
              </div>
              <div
                class="px-6 flex flex-col gap-y-2 bg-sky-950 pt-6 pb-16 rounded-b-xl sm:rounded-br-xl sm:rounded-bl-none ">
                <div class="grid grid-cols-2 px-4">
                  <div class="text-white text-lg font-medium">Per Seats</div>
                  <div class="text-white text-lg font-regular text-right">Rs. 1240</div>
                </div>
                <div class="grid grid-cols-2 px-4">
                  <div class="text-white text-lg font-medium">Number of Seats</div>
                  <div class="text-white text-lg font-regular text-right">3</div>
                </div>
                <div class="grid grid-cols-2 px-4">
                  <div class="text-white text-lg font-medium">Total Amount</div>
                  <div class="text-white text-lg font-regular text-right">Rs. 3600</div>
                </div>
                <div class="flex mt-5 flex-col gap-y-2 gap-x-4 sm:flex-row">
                  <nuxt-link to="/search"
                    class="font-semibold w-full flex justify-center py-4 px-6 rounded-full text-white transition-all duration-300 hover:bg-white/5 border-2 border-white">Back</nuxt-link>
                  <nuxt-link to="/search/payment"
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