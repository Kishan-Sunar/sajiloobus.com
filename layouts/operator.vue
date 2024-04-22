<script setup></script>

<template>
    <main class="h-dvh w-dvw overflow-y-auto">
        <div class="grid grid-cols-[350px_1fr] mx-auto">
            <OperatorAsideBar />
            <div
                class="flex flex-col justify-between relative bg-slate-50 h-[100vh] w-full overflow-hidden"
            >
                <OperatorNavBar />
                <div class="h-full overflow-y-auto">
                    <div>
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
