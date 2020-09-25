<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Routers
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div class="bg-white rounded-md p-4 mb-10">
                    <h1>Disk Usages:</h1>
                    <p v-for="(disk, index) in diskUsages" :key="index">
                        {{ disk }}
                    </p>
                </div>

                <div class="bg-white rounded-md p-4">
                    <h1>File Path: {{ files.path }} </h1>
                    <p v-for="(file, index) in files.files" :key="index">
                        {{ file }}
                    </p>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";

export default {
    props: ["diskUsages", "files"],

    components: {
        AppLayout,
    },

    data() {
        return {};
    },
};
</script>
