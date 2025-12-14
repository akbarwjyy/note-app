<script setup>
import { Head, Link } from "@inertiajs/vue3";
import { ref } from "vue";

defineProps({
    canLogin: {
        type: Boolean,
    },
    canRegister: {
        type: Boolean,
    },
});

const showMobileMenu = ref(false);
</script>

<template>
    <Head title="Welcome to Note App" />

    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100">
        <!-- Navigation -->
        <nav class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center h-16">
                    <!-- Logo -->
                    <div class="flex items-center">
                        <h1
                            class="text-xl sm:text-2xl font-bold text-indigo-600 flex items-center gap-2"
                        >
                            <svg class="w-6 h-6 sm:w-7 sm:h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Note App
                        </h1>
                    </div>

                    <!-- Desktop Navigation -->
                    <div
                        class="hidden sm:flex items-center space-x-4"
                        v-if="canLogin"
                    >
                        <Link
                            v-if="canLogin"
                            :href="route('login')"
                            class="text-gray-700 hover:text-indigo-600 font-medium transition"
                        >
                            Login
                        </Link>
                        <Link
                            v-if="canRegister"
                            :href="route('register')"
                            class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition"
                        >
                            Daftar Gratis
                        </Link>
                    </div>

                    <!-- Mobile Menu Button -->
                    <div class="sm:hidden" v-if="canLogin">
                        <button
                            @click="showMobileMenu = !showMobileMenu"
                            class="inline-flex items-center justify-center p-2 rounded-md text-gray-700 hover:text-indigo-600 hover:bg-gray-100 focus:outline-none transition"
                        >
                            <svg
                                class="h-6 w-6"
                                stroke="currentColor"
                                fill="none"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    :class="{
                                        hidden: showMobileMenu,
                                        'inline-flex': !showMobileMenu,
                                    }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"
                                />
                                <path
                                    :class="{
                                        hidden: !showMobileMenu,
                                        'inline-flex': showMobileMenu,
                                    }"
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M6 18L18 6M6 6l12 12"
                                />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu -->
                <div
                    v-if="canLogin"
                    :class="{ block: showMobileMenu, hidden: !showMobileMenu }"
                    class="sm:hidden pb-3 pt-2 space-y-1"
                >
                    <Link
                        v-if="canLogin"
                        :href="route('login')"
                        class="block px-3 py-2 rounded-md text-base font-medium text-gray-700 hover:text-indigo-600 hover:bg-gray-50 transition"
                    >
                        Login
                    </Link>
                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="block px-3 py-2 rounded-md text-base font-medium bg-indigo-600 text-white hover:bg-indigo-700 transition text-center"
                    >
                        Daftar Gratis
                    </Link>
                </div>
            </div>
        </nav>

        <!-- Hero Section - Full Screen -->
        <section class="min-h-[calc(100vh-64px)] flex items-center px-4 py-8 md:py-0">
            <div class="max-w-7xl mx-auto w-full">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 lg:gap-12 items-center">
                    <!-- Left Content -->
                    <div class="text-center lg:text-left order-2 lg:order-1">
                        <h2
                            class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-4 sm:mb-6 leading-tight"
                        >
                            Kelola Task Anda dengan
                            <span class="text-indigo-600">Mudah & Efisien</span>
                        </h2>
                        <p
                            class="text-base sm:text-lg md:text-xl text-gray-600 mb-6 sm:mb-8 max-w-xl mx-auto lg:mx-0"
                        >
                            Aplikasi manajemen task yang membantu Anda tetap
                            terorganisir dan produktif. Catat, pantau, dan selesaikan
                            semua task Anda di satu tempat.
                        </p>
                        <div
                            class="flex flex-col sm:flex-row justify-center lg:justify-start gap-3 sm:gap-4"
                        >
                            <Link
                                v-if="canRegister"
                                :href="route('register')"
                                class="bg-indigo-600 text-white px-6 sm:px-8 py-3 rounded-lg text-base sm:text-lg font-semibold hover:bg-indigo-700 transition shadow-lg hover:shadow-xl transform hover:-translate-y-0.5"
                            >
                                Mulai Sekarang - Gratis!
                            </Link>
                            <Link
                                v-if="canLogin"
                                :href="route('login')"
                                class="bg-white text-indigo-600 px-6 sm:px-8 py-3 rounded-lg text-base sm:text-lg font-semibold hover:bg-gray-50 transition border-2 border-indigo-600"
                            >
                                Login
                            </Link>
                        </div>

                        <!-- Stats -->
                        <div class="mt-10 sm:mt-12 grid grid-cols-3 gap-4 sm:gap-8 max-w-md mx-auto lg:mx-0">
                            <div class="text-center lg:text-left">
                                <div class="text-2xl sm:text-3xl font-bold text-indigo-600">100+</div>
                                <div class="text-xs sm:text-sm text-gray-500">Pengguna Aktif</div>
                            </div>
                            <div class="text-center lg:text-left">
                                <div class="text-2xl sm:text-3xl font-bold text-indigo-600">500+</div>
                                <div class="text-xs sm:text-sm text-gray-500">Task Selesai</div>
                            </div>
                            <div class="text-center lg:text-left">
                                <div class="text-2xl sm:text-3xl font-bold text-indigo-600">99%</div>
                                <div class="text-xs sm:text-sm text-gray-500">Kepuasan User</div>
                            </div>
                        </div>
                    </div>

                    <!-- Right Illustration -->
                    <div class="order-1 lg:order-2 flex justify-center lg:justify-end">
                        <div class="relative w-full max-w-lg">
                            <!-- Main Card -->
                            <div class="bg-white rounded-2xl shadow-2xl p-6 sm:p-8 relative z-10">
                                <!-- Task List Header -->
                                <div class="flex items-center justify-between mb-6">
                                    <div class="flex items-center gap-3">
                                        <div class="w-10 h-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                            <svg class="w-5 h-5 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                                            </svg>
                                        </div>
                                        <span class="font-semibold text-gray-800">My Tasks</span>
                                    </div>
                                    <div class="flex gap-2">
                                        <div class="w-3 h-3 rounded-full bg-red-400"></div>
                                        <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                                        <div class="w-3 h-3 rounded-full bg-green-400"></div>
                                    </div>
                                </div>

                                <!-- Task Items -->
                                <div class="space-y-4">
                                    <!-- Task 1 - Completed -->
                                    <div class="flex items-center gap-4 p-3 bg-green-50 rounded-lg border border-green-100">
                                        <div class="w-6 h-6 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div class="text-sm font-medium text-gray-700 line-through">Buat desain homepage</div>
                                            <div class="text-xs text-gray-400">Selesai</div>
                                        </div>
                                        <span class="px-2 py-1 text-xs bg-green-100 text-green-700 rounded-full">Done</span>
                                    </div>

                                    <!-- Task 2 - In Progress -->
                                    <div class="flex items-center gap-4 p-3 bg-indigo-50 rounded-lg border border-indigo-100">
                                        <div class="w-6 h-6 bg-indigo-500 rounded-full flex items-center justify-center flex-shrink-0 animate-pulse">
                                            <svg class="w-4 h-4 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div class="text-sm font-medium text-gray-700">Implementasi fitur login</div>
                                            <div class="text-xs text-gray-400">Deadline: Hari ini</div>
                                        </div>
                                        <span class="px-2 py-1 text-xs bg-indigo-100 text-indigo-700 rounded-full">In Progress</span>
                                    </div>

                                    <!-- Task 3 - Pending -->
                                    <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg border border-gray-100">
                                        <div class="w-6 h-6 bg-gray-300 rounded-full flex items-center justify-center flex-shrink-0">
                                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div class="text-sm font-medium text-gray-700">Review code backend</div>
                                            <div class="text-xs text-gray-400">Deadline: Besok</div>
                                        </div>
                                        <span class="px-2 py-1 text-xs bg-gray-100 text-gray-600 rounded-full">Pending</span>
                                    </div>

                                    <!-- Task 4 - Pending -->
                                    <div class="flex items-center gap-4 p-3 bg-gray-50 rounded-lg border border-gray-100">
                                        <div class="w-6 h-6 bg-gray-300 rounded-full flex items-center justify-center flex-shrink-0">
                                            <svg class="w-4 h-4 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                        </div>
                                        <div class="flex-1 min-w-0">
                                            <div class="text-sm font-medium text-gray-700">Buat dokumentasi API</div>
                                            <div class="text-xs text-gray-400">Deadline: 3 hari lagi</div>
                                        </div>
                                        <span class="px-2 py-1 text-xs bg-gray-100 text-gray-600 rounded-full">Pending</span>
                                    </div>
                                </div>

                                <!-- Add Task Button -->
                                <button class="mt-6 w-full py-3 border-2 border-dashed border-gray-300 rounded-lg text-gray-500 hover:border-indigo-400 hover:text-indigo-600 transition flex items-center justify-center gap-2">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                    </svg>
                                    <span class="text-sm font-medium">Tambah Task Baru</span>
                                </button>
                            </div>

                            <!-- Decorative Elements -->
                            <div class="absolute -top-4 -right-4 w-20 h-20 bg-indigo-200 rounded-full opacity-60 blur-xl"></div>
                            <div class="absolute -bottom-6 -left-6 w-32 h-32 bg-blue-200 rounded-full opacity-60 blur-xl"></div>
                            <div class="absolute top-1/2 -right-8 w-16 h-16 bg-purple-200 rounded-full opacity-60 blur-xl"></div>

                            <!-- Floating Icons -->
                            <div class="absolute -top-6 -left-6 bg-white p-3 rounded-xl shadow-lg animate-bounce" style="animation-duration: 3s;">
                                <svg class="w-6 h-6 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="absolute -bottom-4 right-10 bg-white p-3 rounded-xl shadow-lg animate-bounce" style="animation-duration: 4s; animation-delay: 0.5s;">
                                <svg class="w-6 h-6 text-indigo-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <div class="absolute top-1/3 -right-6 bg-white p-3 rounded-xl shadow-lg animate-bounce" style="animation-duration: 3.5s; animation-delay: 1s;">
                                <svg class="w-6 h-6 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.519 4.674a1 1 0 00.95.69h4.915c.969 0 1.371 1.24.588 1.81l-3.976 2.888a1 1 0 00-.363 1.118l1.518 4.674c.3.922-.755 1.688-1.538 1.118l-3.976-2.888a1 1 0 00-1.176 0l-3.976 2.888c-.783.57-1.838-.197-1.538-1.118l1.518-4.674a1 1 0 00-.363-1.118l-3.976-2.888c-.784-.57-.38-1.81.588-1.81h4.914a1 1 0 00.951-.69l1.519-4.674z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="py-12 sm:py-16 px-4 bg-white">
            <div class="max-w-7xl mx-auto">
                <h3
                    class="text-2xl sm:text-3xl font-bold text-center text-gray-900 mb-8 sm:mb-12"
                >
                    Fitur Unggulan
                </h3>
                <div
                    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 sm:gap-8"
                >
                    <!-- Feature 1 -->
                    <div
                        class="text-center p-4 sm:p-6 rounded-lg hover:shadow-lg transition"
                    >
                        <div class="w-12 h-12 sm:w-14 sm:h-14 mx-auto mb-3 sm:mb-4 bg-green-100 rounded-full flex items-center justify-center">
                            <svg class="w-7 h-7 sm:w-8 sm:h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h4
                            class="text-lg sm:text-xl font-bold mb-2 text-gray-900"
                        >
                            Manajemen Task Mudah
                        </h4>
                        <p class="text-sm sm:text-base text-gray-600">
                            Buat, edit, dan hapus task dengan interface yang
                            intuitif dan user-friendly
                        </p>
                    </div>

                    <!-- Feature 2 -->
                    <div
                        class="text-center p-4 sm:p-6 rounded-lg hover:shadow-lg transition"
                    >
                        <div class="w-12 h-12 sm:w-14 sm:h-14 mx-auto mb-3 sm:mb-4 bg-indigo-100 rounded-full flex items-center justify-center">
                            <svg class="w-7 h-7 sm:w-8 sm:h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                            </svg>
                        </div>
                        <h4
                            class="text-lg sm:text-xl font-bold mb-2 text-gray-900"
                        >
                            Status Tracking
                        </h4>
                        <p class="text-sm sm:text-base text-gray-600">
                            Pantau progress task Anda dengan status: Pending, In
                            Progress, dan Done
                        </p>
                    </div>

                    <!-- Feature 3 -->
                    <div
                        class="text-center p-4 sm:p-6 rounded-lg hover:shadow-lg transition"
                    >
                        <div class="w-12 h-12 sm:w-14 sm:h-14 mx-auto mb-3 sm:mb-4 bg-orange-100 rounded-full flex items-center justify-center">
                            <svg class="w-7 h-7 sm:w-8 sm:h-8 text-orange-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <h4
                            class="text-lg sm:text-xl font-bold mb-2 text-gray-900"
                        >
                            Deadline Management
                        </h4>
                        <p class="text-sm sm:text-base text-gray-600">
                            Set deadline untuk setiap task agar tidak ada yang
                            terlewat
                        </p>
                    </div>

                    <!-- Feature 4 -->
                    <div
                        class="text-center p-4 sm:p-6 rounded-lg hover:shadow-lg transition"
                    >
                        <div class="w-12 h-12 sm:w-14 sm:h-14 mx-auto mb-3 sm:mb-4 bg-yellow-100 rounded-full flex items-center justify-center">
                            <svg class="w-7 h-7 sm:w-8 sm:h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <h4
                            class="text-lg sm:text-xl font-bold mb-2 text-gray-900"
                        >
                            Private & Secure
                        </h4>
                        <p class="text-sm sm:text-base text-gray-600">
                            Data task Anda aman dan hanya bisa diakses oleh Anda
                        </p>
                    </div>

                    <!-- Feature 5 -->
                    <div
                        class="text-center p-4 sm:p-6 rounded-lg hover:shadow-lg transition"
                    >
                        <div class="w-12 h-12 sm:w-14 sm:h-14 mx-auto mb-3 sm:mb-4 bg-purple-100 rounded-full flex items-center justify-center">
                            <svg class="w-7 h-7 sm:w-8 sm:h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                            </svg>
                        </div>
                        <h4
                            class="text-lg sm:text-xl font-bold mb-2 text-gray-900"
                        >
                            Responsive Design
                        </h4>
                        <p class="text-sm sm:text-base text-gray-600">
                            Akses dari desktop, tablet, atau smartphone dengan
                            tampilan optimal
                        </p>
                    </div>

                    <!-- Feature 6 -->
                    <div
                        class="text-center p-4 sm:p-6 rounded-lg hover:shadow-lg transition"
                    >
                        <div class="w-12 h-12 sm:w-14 sm:h-14 mx-auto mb-3 sm:mb-4 bg-blue-100 rounded-full flex items-center justify-center">
                            <svg class="w-7 h-7 sm:w-8 sm:h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                            </svg>
                        </div>
                        <h4
                            class="text-lg sm:text-xl font-bold mb-2 text-gray-900"
                        >
                            Fast & Modern
                        </h4>
                        <p class="text-sm sm:text-base text-gray-600">
                            Dibangun dengan Laravel 12 dan Vue.js untuk performa
                            maksimal
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- How It Works Section -->
        <section
            class="py-12 sm:py-16 px-4 bg-gradient-to-br from-indigo-50 to-blue-50"
        >
            <div class="max-w-7xl mx-auto">
                <h3
                    class="text-2xl sm:text-3xl font-bold text-center text-gray-900 mb-8 sm:mb-12"
                >
                    Cara Menggunakan
                </h3>
                <div
                    class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6 sm:gap-8"
                >
                    <div class="bg-white p-5 sm:p-6 rounded-lg shadow-md">
                        <div
                            class="text-2xl sm:text-3xl font-bold text-indigo-600 mb-3 sm:mb-4"
                        >
                            1
                        </div>
                        <h4 class="text-lg sm:text-xl font-bold mb-2">
                            Daftar/Login
                        </h4>
                        <p class="text-sm sm:text-base text-gray-600">
                            Buat akun gratis atau login jika sudah memiliki akun
                        </p>
                    </div>
                    <div class="bg-white p-5 sm:p-6 rounded-lg shadow-md">
                        <div
                            class="text-2xl sm:text-3xl font-bold text-indigo-600 mb-3 sm:mb-4"
                        >
                            2
                        </div>
                        <h4 class="text-lg sm:text-xl font-bold mb-2">
                            Buat Task
                        </h4>
                        <p class="text-sm sm:text-base text-gray-600">
                            Tambahkan task baru dengan judul, deskripsi, dan
                            deadline
                        </p>
                    </div>
                    <div class="bg-white p-5 sm:p-6 rounded-lg shadow-md">
                        <div
                            class="text-2xl sm:text-3xl font-bold text-indigo-600 mb-3 sm:mb-4"
                        >
                            3
                        </div>
                        <h4 class="text-lg sm:text-xl font-bold mb-2">
                            Kelola & Selesaikan
                        </h4>
                        <p class="text-sm sm:text-base text-gray-600">
                            Update status task dan tandai sebagai selesai saat
                            sudah dikerjakan
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-12 sm:py-16 px-4 bg-indigo-600">
            <div class="max-w-4xl mx-auto text-center">
                <h3
                    class="text-2xl sm:text-3xl font-bold text-white mb-3 sm:mb-4"
                >
                    Siap untuk lebih produktif?
                </h3>
                <p class="text-base sm:text-xl text-indigo-100 mb-6 sm:mb-8">
                    Mulai kelola task Anda hari ini, GRATIS!
                </p>
                <Link
                    v-if="canRegister"
                    :href="route('register')"
                    class="bg-white text-indigo-600 px-6 sm:px-8 py-2.5 sm:py-3 rounded-lg text-base sm:text-lg font-semibold hover:bg-gray-100 transition inline-block shadow-lg"
                >
                    Daftar Sekarang
                </Link>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white py-6 sm:py-8 px-4">
            <div class="max-w-7xl mx-auto text-center">
                <div class="mb-3 sm:mb-4">
                    <h4 class="text-lg sm:text-xl font-bold mb-2 flex items-center justify-center gap-2">
                        <svg class="w-5 h-5 sm:w-6 sm:h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Note App
                    </h4>
                    <p class="text-sm sm:text-base text-gray-400">
                        Aplikasi manajemen task yang mudah dan efisien
                    </p>
                </div>
                <div class="border-t border-gray-800 pt-3 sm:pt-4">
                    <p class="text-xs sm:text-sm text-gray-400">
                        &copy; {{ new Date().getFullYear() }} Note App. Built
                        with Laravel & Vue.js
                    </p>
                </div>
            </div>
        </footer>
    </div>
</template>

<style scoped>
/* Add any custom styles here if needed */
</style>
