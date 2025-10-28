<script setup>
import { Head, Link } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { ref, onMounted } from "vue";

defineProps({
    tasks: Array,
});

// Flash message handling
const showFlash = ref(false);
const flashMessage = ref("");

onMounted(() => {
    // Check if there's a flash message from the server
    if (window.Laravel && window.Laravel.flashMessage) {
        flashMessage.value = window.Laravel.flashMessage;
        showFlash.value = true;
        setTimeout(() => {
            showFlash.value = false;
        }, 3000);
    }
});

const confirmDelete = (e) => {
    if (!confirm("Apakah Anda yakin ingin menghapus task ini?")) {
        e.preventDefault();
    }
};
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                My Tasks
            </h2>
        </template>

        <div class="py-6 sm:py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <!-- Flash Message -->
                <div
                    v-if="$page.props.flash?.success"
                    class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative text-sm"
                >
                    {{ $page.props.flash.success }}
                </div>

                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4 sm:p-6 text-gray-900">
                        <div
                            class="flex flex-col sm:flex-row sm:justify-between sm:items-center gap-3 mb-4"
                        >
                            <h1 class="text-xl sm:text-2xl font-bold">
                                My Tasks
                            </h1>
                            <Link
                                :href="route('tasks.create')"
                                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-center text-sm sm:text-base"
                            >
                                + Add Task
                            </Link>
                        </div>

                        <div
                            v-if="tasks.length === 0"
                            class="text-gray-500 text-center py-8"
                        >
                            Belum ada task, klik tombol tambah untuk mulai 🚀
                        </div>

                        <template v-else>
                            <!-- Mobile Card View -->
                            <div class="block md:hidden space-y-4">
                                <div
                                    v-for="task in tasks"
                                    :key="task.id"
                                    class="border rounded-lg p-4 hover:shadow-md transition"
                                >
                                    <div
                                        class="flex justify-between items-start mb-2"
                                    >
                                        <h3 class="font-bold text-gray-900">
                                            {{ task.title }}
                                        </h3>
                                        <span
                                            :class="{
                                                'bg-yellow-100 text-yellow-800':
                                                    task.status === 'pending',
                                                'bg-blue-100 text-blue-800':
                                                    task.status ===
                                                    'in-progress',
                                                'bg-green-100 text-green-800':
                                                    task.status === 'done',
                                            }"
                                            class="px-2 py-1 rounded text-xs font-semibold whitespace-nowrap ml-2"
                                        >
                                            {{ task.status }}
                                        </span>
                                    </div>
                                    <p class="text-gray-600 text-sm mb-2">
                                        {{
                                            task.description
                                                ? task.description.substring(
                                                      0,
                                                      80
                                                  ) + "..."
                                                : "-"
                                        }}
                                    </p>
                                    <p class="text-gray-500 text-xs mb-3">
                                        📅
                                        {{
                                            task.deadline
                                                ? new Date(
                                                      task.deadline
                                                  ).toLocaleDateString("id-ID")
                                                : "Tidak ada deadline"
                                        }}
                                    </p>
                                    <div class="flex gap-2">
                                        <Link
                                            :href="route('tasks.edit', task.id)"
                                            class="flex-1 text-center bg-blue-50 text-blue-600 hover:bg-blue-100 px-3 py-2 rounded font-medium text-sm"
                                        >
                                            Edit
                                        </Link>
                                        <Link
                                            as="button"
                                            method="delete"
                                            :href="
                                                route('tasks.destroy', task.id)
                                            "
                                            class="flex-1 text-center bg-red-50 text-red-600 hover:bg-red-100 px-3 py-2 rounded font-medium text-sm"
                                            @click="confirmDelete"
                                        >
                                            Hapus
                                        </Link>
                                    </div>
                                </div>
                            </div>

                            <!-- Desktop Table View -->
                            <div class="hidden md:block overflow-x-auto">
                                <table class="w-full border-collapse">
                                    <thead>
                                        <tr class="bg-gray-200 text-left">
                                            <th
                                                class="p-3 text-sm lg:text-base"
                                            >
                                                Judul
                                            </th>
                                            <th
                                                class="p-3 text-sm lg:text-base"
                                            >
                                                Deskripsi
                                            </th>
                                            <th
                                                class="p-3 text-sm lg:text-base"
                                            >
                                                Status
                                            </th>
                                            <th
                                                class="p-3 text-sm lg:text-base"
                                            >
                                                Deadline
                                            </th>
                                            <th
                                                class="p-3 text-sm lg:text-base"
                                            >
                                                Aksi
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="task in tasks"
                                            :key="task.id"
                                            class="border-b hover:bg-gray-50"
                                        >
                                            <td
                                                class="p-3 font-medium text-sm lg:text-base"
                                            >
                                                {{ task.title }}
                                            </td>
                                            <td
                                                class="p-3 text-gray-600 text-sm lg:text-base"
                                            >
                                                {{
                                                    task.description
                                                        ? task.description.substring(
                                                              0,
                                                              50
                                                          ) + "..."
                                                        : "-"
                                                }}
                                            </td>
                                            <td class="p-3">
                                                <span
                                                    :class="{
                                                        'bg-yellow-100 text-yellow-800':
                                                            task.status ===
                                                            'pending',
                                                        'bg-blue-100 text-blue-800':
                                                            task.status ===
                                                            'in-progress',
                                                        'bg-green-100 text-green-800':
                                                            task.status ===
                                                            'done',
                                                    }"
                                                    class="px-2 py-1 rounded text-xs font-semibold"
                                                >
                                                    {{ task.status }}
                                                </span>
                                            </td>
                                            <td
                                                class="p-3 text-gray-600 text-sm lg:text-base"
                                            >
                                                {{
                                                    task.deadline
                                                        ? new Date(
                                                              task.deadline
                                                          ).toLocaleDateString(
                                                              "id-ID"
                                                          )
                                                        : "-"
                                                }}
                                            </td>
                                            <td class="p-3">
                                                <div class="flex gap-2">
                                                    <Link
                                                        :href="
                                                            route(
                                                                'tasks.edit',
                                                                task.id
                                                            )
                                                        "
                                                        class="text-blue-600 hover:text-blue-800 font-medium text-sm"
                                                    >
                                                        Edit
                                                    </Link>
                                                    <Link
                                                        as="button"
                                                        method="delete"
                                                        :href="
                                                            route(
                                                                'tasks.destroy',
                                                                task.id
                                                            )
                                                        "
                                                        class="text-red-600 hover:text-red-800 font-medium text-sm"
                                                        @click="confirmDelete"
                                                    >
                                                        Hapus
                                                    </Link>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </template>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
