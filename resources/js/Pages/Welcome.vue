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
                            class="text-xl sm:text-2xl font-bold text-indigo-600"
                        >
                            📝 Note App
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

        <!-- Hero Section -->
        <!-- Hero Section -->
        <section class="py-12 sm:py-16 md:py-20 px-4">
            <div class="max-w-7xl mx-auto text-center">
                <h2
                    class="text-3xl sm:text-4xl md:text-5xl font-bold text-gray-900 mb-4 sm:mb-6 leading-tight"
                >
                    Kelola Task Anda dengan
                    <span class="text-indigo-600">Mudah & Efisien</span>
                </h2>
                <p
                    class="text-base sm:text-lg md:text-xl text-gray-600 mb-6 sm:mb-8 max-w-2xl mx-auto px-4"
                >
                    Aplikasi manajemen task yang membantu Anda tetap
                    terorganisir dan produktif. Catat, pantau, dan selesaikan
                    semua task Anda di satu tempat.
                </p>
                <div
                    class="flex flex-col sm:flex-row justify-center gap-3 sm:gap-4 px-4"
                >
                    <Link
                        v-if="canRegister"
                        :href="route('register')"
                        class="bg-indigo-600 text-white px-6 sm:px-8 py-3 rounded-lg text-base sm:text-lg font-semibold hover:bg-indigo-700 transition shadow-lg"
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
                        <div class="text-4xl sm:text-5xl mb-3 sm:mb-4">✅</div>
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
                        <div class="text-4xl sm:text-5xl mb-3 sm:mb-4">📊</div>
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
                        <div class="text-4xl sm:text-5xl mb-3 sm:mb-4">⏰</div>
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
                        <div class="text-4xl sm:text-5xl mb-3 sm:mb-4">🔒</div>
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
                        <div class="text-4xl sm:text-5xl mb-3 sm:mb-4">📱</div>
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
                        <div class="text-4xl sm:text-5xl mb-3 sm:mb-4">⚡</div>
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
                    <h4 class="text-lg sm:text-xl font-bold mb-2">
                        📝 Note App
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
