<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Routers
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <div
                    class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2"
                >
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                            <label
                                class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                for="grid-first-name"
                            >
                                Hostname
                            </label>
                            <input
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-1"
                                id="grid-first-name"
                                type="text"
                                placeholder="HOSTNAME"
                                v-model="form.hostname"
                            />
                            <p class="text-red-500 text-xs italic" v-if="form.error('hostname')">
                                {{ form.error('hostname') }}
                            </p>
                        </div>
                        <div class="md:w-1/2 px-3">
                            <label
                                class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                for="grid-last-name"
                            >
                                Loopback
                            </label>
                            <input
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                                id="grid-last-name"
                                type="text"
                                placeholder="LOOPBACK"
                                v-model="form.loopback"
                            />

                            <p class="text-red-500 text-xs italic" v-if="form.error('loopback')">
                                {{ form.error('loopback') }}
                            </p>
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-1/2 px-3">
                            <label
                                class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2"
                                for="grid-last-name"
                            >
                                Mac
                            </label>
                            <input
                                class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4"
                                id="grid-last-name"
                                type="text"
                                placeholder="MAC"
                                v-model="form.mac"
                            />

                            <p class="text-red-500 text-xs italic" v-if="form.error('mac')">
                                {{ form.error('mac') }}
                            </p>
                        </div>
                    </div>
                    <div class="-mx-3 md:flex mb-6">
                        <div class="md:w-1/2 px-3">
                            <button
                                type="button"
                                class="px-6 py-2.5 bg-blue-400 rounded-md text-white tracking-wide inline-flex space-x-2"
                                :class="{ 'opacity-25': form.processing }" :disabled="form.processing"
                                @click="onSubmit"
                            >
                                <svg
                                    v-if="form.processing"
                                    class="w-6 h-6 animate-spin"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"
                                    ></path>
                                </svg>
                                <span>SAVE</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "./../../Layouts/AppLayout";

export default {
    props: ["router"],

    components: {
        AppLayout,
    },

    data() {
        return {
            form: this.$inertia.form(
                {
                    _method: "PUT",
                    hostname: this.router.hostname,
                    loopback: this.router.loopback,
                    mac: this.router.mac,
                },
                {
                    resetOnSuccess: false,
                }
            )
        }
    },

    methods: {
        onSubmit () {
            this.form.post(`/routers/${this.router.sap_id}`, {
                preserveScroll: true
            });
        }
    }
};
</script>
