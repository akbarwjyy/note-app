<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";

const props = defineProps({
    task: Object,
});

const form = useForm({
    title: props.task.title,
    description: props.task.description,
    status: props.task.status,
    deadline: props.task.deadline,
});

const submit = () => {
    form.put(route("tasks.update", props.task.id));
};
</script>

<template>
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Task
            </h2>
        </template>

        <div class="py-6 sm:py-12">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-4 sm:p-6 text-gray-900">
                        <form
                            @submit.prevent="submit"
                            class="max-w-2xl space-y-4 sm:space-y-6"
                        >
                            <div>
                                <label
                                    class="block font-medium text-gray-700 text-sm sm:text-base"
                                    >Judul</label
                                >
                                <input
                                    v-model="form.title"
                                    type="text"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm sm:text-base"
                                    placeholder="Masukkan judul task"
                                />
                                <div
                                    v-if="form.errors.title"
                                    class="text-red-600 text-sm mt-1"
                                >
                                    {{ form.errors.title }}
                                </div>
                            </div>

                            <div>
                                <label
                                    class="block font-medium text-gray-700 text-sm sm:text-base"
                                    >Deskripsi</label
                                >
                                <textarea
                                    v-model="form.description"
                                    rows="4"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm sm:text-base"
                                    placeholder="Deskripsi task (opsional)"
                                ></textarea>
                            </div>

                            <div>
                                <label
                                    class="block font-medium text-gray-700 text-sm sm:text-base"
                                    >Deadline</label
                                >
                                <input
                                    v-model="form.deadline"
                                    type="date"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm sm:text-base"
                                />
                            </div>

                            <div>
                                <label
                                    class="block font-medium text-gray-700 text-sm sm:text-base"
                                    >Status</label
                                >
                                <select
                                    v-model="form.status"
                                    class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring-blue-500 text-sm sm:text-base"
                                >
                                    <option value="pending">Pending</option>
                                    <option value="in-progress">
                                        In Progress
                                    </option>
                                    <option value="done">Done</option>
                                </select>
                            </div>

                            <div class="flex flex-col sm:flex-row gap-3 pt-2">
                                <button
                                    type="submit"
                                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 text-sm sm:text-base font-medium"
                                    :disabled="form.processing"
                                >
                                    {{
                                        form.processing
                                            ? "Menyimpan..."
                                            : "Update"
                                    }}
                                </button>
                                <Link
                                    :href="route('tasks.index')"
                                    class="px-4 py-2 border rounded hover:bg-gray-50 text-center text-sm sm:text-base font-medium"
                                >
                                    Batal
                                </Link>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
