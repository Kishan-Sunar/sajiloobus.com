<script setup></script>

<template>
    <main class="h-dvh w-dvw py-2 px-2  overflow-y-auto bg-[#181D31]">
        <div class="grid gap-x-6 grid-cols-[320px_1fr] mx-auto">
            <OperatorAsideBar />
            <div
                class="flex flex-col justify-between relative bg-white h-[calc(100vh-25px)] w-full overflow-hidden rounded-3xl">
                <div class="h-full  overflow-y-auto">
                    <div class="bg-white">
                        <slot></slot>
                    </div>
                </div>
                <footer class="w-full sticky left-0 bottom-0">
                    <div id="infobar"></div>
                </footer>
            </div>
        </div>
    </main>
</template>