<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link } from "@inertiajs/vue3";
</script>

<template>
    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="text-xl font-semibold leading-tight text-gray-800">
                Dashboard
            </h2>
        </template>

        <div class="py-6 sm:py-12">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                    <div class="p-4 sm:p-6 text-gray-900">
                        <h3
                            class="text-lg sm:text-xl font-semibold mb-3 sm:mb-4"
                        >
                            Welcome to Note App! 🚀
                        </h3>
                        <p class="mb-4 text-sm sm:text-base text-gray-700">
                            You're logged in! Manage your tasks efficiently.
                        </p>

                        <div class="mt-4 sm:mt-6">
                            <Link
                                :href="route('tasks.index')"
                                class="inline-flex items-center px-4 py-2 sm:px-6 sm:py-3 bg-blue-600 border border-transparent rounded-md font-semibold text-xs sm:text-sm text-white uppercase tracking-widest hover:bg-blue-700 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150"
                            >
                                View My Tasks
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
