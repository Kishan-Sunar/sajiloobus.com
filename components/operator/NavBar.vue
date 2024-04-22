<script setup>
let accountDropdown = ref(false);
</script>
<template>
    <header class="w-full relative z-50 py-2 left-0 bottom-0">
        <div class="container mx-auto">
            <div class="flex items-center justify-between">
                <div>
                    <button>
                        <Icon
                            name="i-solar:hamburger-menu-line-duotone"
                            size="30"
                        ></Icon>
                    </button>
                </div>
                <div>
                    <div class="flex items-center gap-x-6">
                        <button>
                            <Icon
                                name="i-solar:bell-linear"
                                size="28"
                                color="green"
                            />
                        </button>
                        <div class="relative">
                            <button @click="accountDropdown = !accountDropdown"
                                class="relative inline-flex items-center justify-center flex-shrink-0 rounded-full h-10 w-10 text-sm"
                            >
                                <img
                                    class="rounded-full text-[0px] bg-slate-100 h-10 w-10"
                                    alt="Avatar"
                                    src="https://images.unsplash.com/photo-1557223562-6c77ef16210f?q=80&w=2940&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                                /><span
                                    class="absolute rounded-full ring-1 ring-white flex items-center justify-center text-white font-medium h-2 min-w-[0.5rem] text-[7px] p-0.5 top-0 right-0 bg-primary-500"
                                >
                                </span>
                            </button>
                            <div v-if="accountDropdown"
                                class="absolute flex flex-col justify-between w-[20rem] right-0 top-full mt-2 rounded-xl bg-white shadow-[0_4px_24px_0_rgba(62,57,107,0.18)]"
                            >
                                <div class="py-4 px-4 border-b">
                                    <span class="font-medium"> Profile </span>
                                </div>
                                <div class="overflow-y-auto pb-2">
                                    <div class="px-4 py-2">
                                        <ul>
                                            <li>
                                                <nuxt-link
                                                    to="#"
                                                    class="flex font-medium py-3 px-4 transition-all duration-200 rounded-lg gap-x-3 justify-start items-center hover:bg-slate-100"
                                                >
                                                    <Icon
                                                        name="i-solar:key-line-duotone"
                                                        size="24"
                                                    ></Icon>
                                                    <span class="text-sm"
                                                        >Change Password</span
                                                    >
                                                </nuxt-link>
                                            </li>
                                            <li>
                                                <nuxt-link
                                                    to="#"
                                                    class="flex font-medium py-3 px-4 transition-all duration-200 rounded-lg gap-x-3 justify-start items-center hover:bg-slate-100"
                                                >
                                                    <Icon
                                                        name="i-solar:settings-line-duotone"
                                                        size="24"
                                                    >
                                                    </Icon>
                                                    <span class="text-sm"
                                                        >Settings</span
                                                    >
                                                </nuxt-link>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>
