<script setup></script>

<template>
    <section class="h-[15rem] bg-green-600 relative"></section>
    <section class="py-10 relative bg-slate-100">
        <div class="container mx-auto">
            <TheProfileCard class="mb-10" />
            <div class="bg-white rounded-xl shadow-2xl shadow-black/10">
                <div class="grid divide-x sm:grid-cols-3">
                    <div class="mb-4 col-span-2">
                        <div class="border-b px-4 sm:px-6 py-6">
                            <h3 class="text-xl font-semibold">Edit Profile</h3>
                        </div>
                        <div class="px-4 sm:px-6 py-5">
                            <div class="grid grid-cols-2 gap-x-4 gap-y-6">
                                <div>
                                    <label class="text-slate-500 mb-2 block font-medium text-sm">First Name</label>
                                    <input type="text" placeholder="Tulasi"
                                        class="py-4 px-4 w-full transition-all duration-300 text-base rounded-xl border-[1.5px] focus:border-green-600 focus:outline-2 focus:outline-green-200 outline-offset-0 outline-none">
                                </div>
                                <div>
                                    <label class="text-slate-500 mb-2 block font-medium text-sm">Last Name</label>
                                    <input type="text" placeholder="Sunar"
                                        class="py-4 px-4 w-full transition-all duration-300 text-base rounded-xl border-[1.5px] focus:border-green-600 focus:outline-2 focus:outline-green-200 outline-offset-0 outline-none">
                                </div>
                                <div>
                                    <label class="text-slate-500 mb-2 block font-medium text-sm">First Name</label>
                                    <div class="relative">
                                        <select
                                            class="py-4 pl-4 pr-24 bg-white appearance-none w-full transition-all duration-300 rounded-xl border-[1.5px] focus:border-green-600 focus:outline-2 focus:outline-green-200 outline-offset-0 outline-none">
                                            <option>Male</option>
                                        </select>
                                        <IconChevronExpand class="w-6 absolute right-4 top-4 pointer-events-none" />
                                    </div>
                                </div>
                                <div>
                                    <label class="text-slate-500 mb-2 block font-medium text-sm">Address</label>
                                    <input type="text" placeholder="Pokhara-32, Satmuhane"
                                        class="py-4 px-4 w-full transition-all duration-300 text-base rounded-xl border-[1.5px] focus:border-green-600 focus:outline-2 focus:outline-green-200 outline-offset-0 outline-none">
                                </div>
                                <div>
                                    <label class="text-slate-500 mb-2 block font-medium text-sm">Email
                                        Address</label>
                                    <input type="email" placeholder="username@domain.com"
                                        class="py-4 px-4 w-full transition-all duration-300 text-base rounded-xl border-[1.5px] focus:border-green-600 focus:outline-2 focus:outline-green-200 outline-offset-0 outline-none">
                                </div>
                                <div>
                                    <label class="text-slate-500 mb-2 block font-medium text-sm">Phone
                                        Number</label>
                                    <input type="text" placeholder="XXX XXX XXXX"
                                        class="py-4 px-4 w-full transition-all duration-300 text-base rounded-xl border-[1.5px] focus:border-green-600 focus:outline-2 focus:outline-green-200 outline-offset-0 outline-none">
                                </div>
                                <div class="col-span-2 flex justify-end">
                                    <button
                                        class="font-medium transition-all duration-300 text-white/80 bg-green-600 py-4 px-10 shadow rounded-2xl flex items-center justify-center hover:bg-green-700">Update
                                        Now</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div>
                        <div class="border-b px-4 sm:px-6 py-6">
                            <h3 class="text-xl font-semibold">Change Password</h3>
                        </div>
                        <div class="flex flex-col gap-y-6 px-4 sm:px-6 py-6">
                            <div>
                                <label class="text-slate-500 mb-2 block font-medium text-sm">New Password</label>
                                <input type="password" placeholder="XXXXXXXXXX"
                                    class="py-4 px-4 w-full transition-all duration-300 text-base rounded-xl border-[1.5px] focus:border-green-600 focus:outline-2 focus:outline-green-200 outline-offset-0 outline-none">
                            </div>
                            <div>
                                <label class="text-slate-500 mb-2 block font-medium text-sm">Confirm New
                                    Password</label>
                                <input type="password" placeholder="XXXXXXXXXX"
                                    class="py-4 px-4 w-full transition-all duration-300 text-base rounded-xl border-[1.5px] focus:border-green-600 focus:outline-2 focus:outline-green-200 outline-offset-0 outline-none">
                            </div>
                            <div>
                                <button
                                    class="w-full font-medium transition-all duration-300 text-white/80 bg-green-600 py-4 px-10 shadow rounded-2xl flex items-center justify-center hover:bg-green-700">Update
                                    Now</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>