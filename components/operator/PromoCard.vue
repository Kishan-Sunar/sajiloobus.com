<script setup></script>

<template>
    <div v-bind="$attrs" class="flex flex-col items-center">
        <div class="px-2 w-full">
            <img class="h-36 w-full object-cover rounded-t-2xl" src="@/assets/backgrounds/bg-2.png" alt="background" />
        </div>
        <div class="bg-white flex flex-col gap-y-10 justify-between px-6 py-10 h-full -mt-2 w-full rounded-2xl">
            <div>
                <h4 class="text-xl mb-6 flex flex-col text-center font-semibold">
                    <span>TRUSTED BY OVER <span class="text-green-600">100,000 +</span></span>
                    <span>COMPANIES WORLDWIDE</span>
                </h4>
                <div class="gap-y-2 flex flex-col items-center">
                    <h5 class="font-medium text-slate-600">With sajiloobus you can easily</h5>
                    <div class="flex flex-col sm:flex-row gap-x-4 gap-y-4 sm:justify-center">
                        <div class="flex flex-col items-center">
                            <icon-monitor class="h-20" />
                            <span class="block text-center text-xs text-slate-600 leading-[initial] font-semibold">
                                Monitor Business
                            </span>
                        </div>
                        <div class="flex flex-col items-center">
                            <icon-connect class="h-20" />
                            <span class="block text-center text-xs text-slate-600 leading-[initial] font-semibold">
                                Connect with Passengers
                            </span>
                        </div>
                        <div class="flex flex-col items-center">
                            <icon-service class="h-20" />
                            <span class="block text-center text-xs text-slate-600 leading-[initial] font-semibold">
                                Highlight Service quality
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flex gap-x-2 items-center justify-center">
                <span class="text-sm text-slate-800">Powered by</span>
                <icon-logo class="h-7" />
            </div>
        </div>
    </div>
</template>