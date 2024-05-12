<script setup>
const { $modalStore, $notificationStore } = useNuxtApp();
const bookingStore = useBookingStore();
const { bookings } = storeToRefs(bookingStore)
bookingStore.getData();
import Chart from 'primevue/chart';
import { ref, onMounted } from "vue";
definePageMeta({
    layout: "operator",
    middleware: ["operator-auth"],
});
// Tab
const currentTab = ref("basic");

onMounted(() => {
    chartData.value = setChartData();
    chartOptions.value = setChartOptions();
});

const chartData = ref();
const chartOptions = ref();

const setChartData = () => {
    const documentStyle = getComputedStyle(document.documentElement);

    return {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
        datasets: [
            {
                label: 'Revenues',
                backgroundColor: documentStyle.getPropertyValue('--cyan-500'),
                borderColor: documentStyle.getPropertyValue('--cyan-500'),
                data: [65, 59, 4, 81, 56, 55, 40]
            },
            {
                label: 'Bookings',
                backgroundColor: documentStyle.getPropertyValue('--gray-500'),
                borderColor: documentStyle.getPropertyValue('--gray-500'),
                data: [28, 48, 40, 19, 86, 27, 90]
            },
            {
                label: 'Schedules',
                backgroundColor: documentStyle.getPropertyValue('--green-500'),
                borderColor: documentStyle.getPropertyValue('--green-500'),
                data: [10, 4, 5, 6, 2, 8, 10]
            }
        ]
    };
};
const setChartOptions = () => {
    const documentStyle = getComputedStyle(document.documentElement);
    const textColor = documentStyle.getPropertyValue('--text-color');
    const textColorSecondary = documentStyle.getPropertyValue('--text-color-secondary');
    const surfaceBorder = documentStyle.getPropertyValue('--surface-border');

    return {
        maintainAspectRatio: false,
        aspectRatio: 0.8,
        plugins: {
            legend: {
                labels: {
                    color: textColor
                }
            }
        },
        scales: {
            x: {
                ticks: {
                    color: textColorSecondary,
                    font: {
                        weight: 500
                    }
                },
                grid: {
                    display: false,
                    drawBorder: false
                }
            },
            y: {
                ticks: {
                    color: textColorSecondary
                },
                grid: {
                    color: surfaceBorder,
                    drawBorder: false
                }
            }
        }
    };
}
const totalRevenue = computed(() => {
    return bookings.value.reduce((total, booking) => total + booking.total_amount, 0);
})
const totalBooking = computed(() => {
    return bookings.value.length
})
const newBookings = computed(() => {
    return bookings.value.filter(booking => booking.created_at === new Date().toISOString().split('T')[0]).length
})
</script>

<template>
    <div class="bg-slate-50 py-5">
        <div class="container mx-auto">

            <div class="border bg-white mb-5 grid sm:grid-cols-3 rounded-xl">
                <div class="rounded-t-xl sm:rounded-t-0 sm:rounded-l-xl py-5 px-4">
                    <span class="font-medium">Total Revenue</span>
                    <div>
                        <h4 class="text-2xl font-semibold">NPR {{ totalRevenue }}</h4>
                    </div>
                </div>
                <div class="sm:border-r sm:border-l border-t border-b sm:border-t-0 sm:border-b-0 py-5 px-4">
                    <span class="font-medium">New Bookings</span>
                    <div>
                        <h4 class="text-2xl font-semibold">{{ newBookings }}+</h4>
                    </div>
                </div>
                <div class="rounded-b-xl sm:rounded-b-0 sm:rounded-r-xl py-5 px-4">
                    <span class="font-medium">Total Bookings</span>
                    <div>
                        <h4 class="text-2xl font-semibold">{{ totalBooking }}+</h4>
                    </div>
                </div>
            </div>
            <div class="py-5">
                <Chart type="bar" :data="chartData" :options="chartOptions" class="h-[30rem]" />
            </div>
        </div>
    </div>
</template>
