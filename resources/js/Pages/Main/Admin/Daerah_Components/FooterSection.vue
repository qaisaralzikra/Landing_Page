<template>
    <Daerah_Show
        :daerah="daerah"
        :reset-form="resetForm"
        :open-drawer="openDrawer"
    >
        <div
            v-if="daerah.length === 0"
            class="app-main flex-column flex-row-fluid justify-content-center align-self-center mx-10"
            style="justify-self: center"
            id="kt_app_main"
        >
            <div class="d-flex flex-column flex-column-fluid">
                <div class="container-fluid float-start">
                    <div
                        class="my-20 d-flex flex-wrap gap-20 gap-md-15 gap-lg-8"
                    >
                        <div>
                            <div
                                class="text-center py-0 d-flex align-items-center flex-column"
                            >
                                <img
                                    src="../../../../../../public/assets/media/illustrations/empty.png"
                                    alt="Tidak ada data"
                                    class="mh-300px"
                                />
                                <h2 class="text-gray-800 mb-4">
                                    Data Tidak Ditemukan
                                </h2>
                                <p class="text-gray-600 fs-4">
                                    Belum ada data atau pencarian tidak sesuai.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="app-main flex-column flex-row-fluid justify-content-center align-self-lg-start"
            id="kt_app_main"
        >
            <div class="d-flex flex-column flex-column-fluid mt-0 mt-lg-0">
                <div class="container-fluid float-start mt-10 mt-lg-8 p-0">
                    <div
                        class="my-1 d-flex flex-wrap gap-10 gap-md-15 gap-lg-5"
                    >
                        <div
                            class="p-3 d-flex flex-row align-items-center align-items-md-start gap-4 bg-white rounded-2 w-550px"
                            style="border: 1px solid rgba(118, 118, 128, 0.12)"
                        >
                            <div style="justify-self: center">
                                <img
                                    :src="`/storage/${daerah.logo_daerah}`"
                                    alt=""
                                    class="rounded-4 w-md-150px h-md-150px w-125px h-125px"
                                />
                            </div>
                            <div class="flex-column d-flex gap-md-3 gap-2">
                                <div
                                    class="d-flex flex-row gap-2"
                                    style="justify-self: center"
                                >
                                    <span
                                        class="fw-bolder fs-md-2 fs-4 text-capitalize"
                                        >{{ daerah.daerah }}</span
                                    >
                                    <span
                                        class="fw-bolder fs-md-2 fs-4 text-capitalize"
                                        >{{ daerah.nama_daerah }}</span
                                    >
                                </div>
                                <div
                                    style="
                                        justify-self: center;
                                        color: rgba(60, 60, 67, 0.75);
                                    "
                                >
                                    <span
                                        class="fs-md-6 fs-7 text-truncate-1"
                                        style="
                                            overflow: hidden;
                                            text-overflow: ellipsis;
                                            display: -webkit-box;
                                            -webkit-line-clamp: 5; /* Batasi ke 2 baris */
                                            -webkit-box-orient: vertical;
                                        "
                                        >{{ daerah.deskripsi }}</span
                                    >
                                </div>
                                <div class="d-flex flex-row align-items-center gap-2">
                                    <div
                                        v-for="medsos in sosmed"
                                        :key="medsos.id"
                                    >
                                        <a
                                            :href="medsos.link_sosmed"
                                            target="_blank"
                                            class="text-gray-700 hover:text-blue-600"
                                        >
                                            <!-- Facebook -->
                                            <span
                                                v-if="
                                                    medsos.media_sosial.toLowerCase() ===
                                                    'facebook'
                                                "
                                            >
                                                <svg
                                                    class="w-20px h-20px text-blue-600"
                                                    fill="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        d="M22 12c0-5.522-4.477-10-10-10S2 6.478 2 12c0 5.01 3.657 9.154 8.438 9.877v-6.99h-2.54v-2.887h2.54V9.845c0-2.506 1.493-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.772-1.63 1.562v1.874h2.773l-.443 2.887h-2.33v6.99C18.343 21.154 22 17.01 22 12z"
                                                    />
                                                </svg>
                                            </span>
    
                                            <!-- Instagram -->
                                            <span
                                                v-else-if="
                                                    medsos.media_sosial.toLowerCase() ===
                                                    'instagram'
                                                "
                                            >
                                                <svg
                                                    class="w-20px h-20px text-pink-500"
                                                    fill="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        d="M12 2.2c3.2 0 3.584.012 4.85.07 1.17.054 1.96.24 2.416.402a4.9 4.9 0 0 1 1.768 1.1 4.9 4.9 0 0 1 1.1 1.768c.162.456.348 1.246.402 2.416.058 1.266.07 1.65.07 4.85s-.012 3.584-.07 4.85c-.054 1.17-.24 1.96-.402 2.416a4.9 4.9 0 0 1-1.1 1.768 4.9 4.9 0 0 1-1.768 1.1c-.456.162-1.246.348-2.416.402-1.266.058-1.65.07-4.85.07s-3.584-.012-4.85-.07c-1.17-.054-1.96-.24-2.416-.402a4.9 4.9 0 0 1-1.768-1.1 4.9 4.9 0 0 1-1.1-1.768c-.162-.456-.348-1.246-.402-2.416C2.212 15.784 2.2 15.4 2.2 12s.012-3.584.07-4.85c.054-1.17.24-1.96.402-2.416a4.9 4.9 0 0 1 1.1-1.768 4.9 4.9 0 0 1 1.768-1.1c.456-.162 1.246-.348 2.416-.402C8.416 2.212 8.8 2.2 12 2.2Zm0 2.2c-3.162 0-3.532.012-4.782.07-.962.044-1.484.206-1.832.342-.462.18-.79.396-1.134.74-.344.344-.56.672-.74 1.134-.136.348-.298.87-.342 1.832C3.612 8.468 3.6 8.838 3.6 12c0 3.162.012 3.532.07 4.782.044.962.206 1.484.342 1.832.18.462.396.79.74 1.134.344.344.672.56 1.134.74.348.136.87.298 1.832.342 1.25.058 1.62.07 4.782.07s3.532-.012 4.782-.07c.962-.044 1.484-.206 1.832-.342.462-.18.79-.396 1.134-.74.344-.344.56-.672.74-1.134.136-.348.298-.87.342-1.832.058-1.25.07-1.62.07-4.782s-.012-3.532-.07-4.782c-.044-.962-.206-1.484-.342-1.832a2.9 2.9 0 0 0-.74-1.134 2.9 2.9 0 0 0-1.134-.74c-.348-.136-.87-.298-1.832-.342-1.25-.058-1.62-.07-4.782-.07ZM12 6.4a5.6 5.6 0 1 1 0 11.2 5.6 5.6 0 0 1 0-11.2Zm0 2.2a3.4 3.4 0 1 0 0 6.8 3.4 3.4 0 0 0 0-6.8Zm4.2-.84a1.12 1.12 0 1 1 0 2.24 1.12 1.12 0 0 1 0-2.24Z"
                                                    />
                                                </svg>
                                            </span>
    
                                            <!-- YouTube -->
                                            <span
                                                v-else-if="
                                                    medsos.media_sosial.toLowerCase() ===
                                                    'youtube'
                                                "
                                            >
                                                <svg
                                                    class="w-20px h-20px text-red-600"
                                                    fill="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        d="M23.498 6.186a2.999 2.999 0 0 0-2.117-2.12C19.7 3.5 12 3.5 12 3.5s-7.7 0-9.381.566A2.999 2.999 0 0 0 .5 6.186C0 7.868 0 12 0 12s0 4.132.5 5.814a2.999 2.999 0 0 0 2.117 2.12C4.3 20.5 12 20.5 12 20.5s7.7 0 9.381-.566a2.999 2.999 0 0 0 2.117-2.12c.5-1.682.5-5.814.5-5.814s0-4.132-.5-5.814ZM9.75 15.02V8.98L15.5 12l-5.75 3.02Z"
                                                    />
                                                </svg>
                                            </span>
    
                                            <!-- X / Twitter -->
                                            <span
                                                v-else-if="
                                                    medsos.media_sosial.toLowerCase() ===
                                                    'x'
                                                "
                                            >
                                                <svg
                                                    class="w-20px h-20px text-black"
                                                    fill="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        d="M20.87 3H17.4l-4.26 5.18L9.45 3H3.09l6.87 9.88L3 21h3.47l4.59-5.58 3.93 5.58h6.36l-7.15-10.33L20.87 3ZM16.8 19.2h-1.56l-2.4-3.4-1.8 2.2h-1.3l2.95-3.5-7.1-10.2H7.2l2.85 4.2 1.6 2.3 1.75-2.3L16.8 4.8H18l-3.35 4.2 2.8 4.1-2.3 2.6L18 19.2Z"
                                                    />
                                                </svg>
                                            </span>
    
                                            <!-- Email -->
                                            <span
                                                v-else-if="
                                                    medsos.media_sosial.toLowerCase() ===
                                                    'email'
                                                "
                                            >
                                                <svg
                                                    class="w-20px h-20px text-gray-600"
                                                    fill="currentColor"
                                                    viewBox="0 0 24 24"
                                                >
                                                    <path
                                                        d="M20 4H4c-1.1 0-2 .9-2 2v12a2 2 0 0 0 2 2h16c1.1 0 2-.9 2-2V6a2 2 0 0 0-2-2Zm0 4-8 5-8-5V6l8 5 8-5v2Z"
                                                    />
                                                </svg>
                                            </span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </Daerah_Show>
</template>

<script setup>
import { Head, useForm, usePage, router } from "@inertiajs/vue3";
import Swal from "sweetalert2";
import { ref, nextTick, watch, onMounted } from "vue";
import Dropzone from "dropzone";
import Daerah_Show from "../Daerah_Show.vue";

defineProps({
    daerah: Object,
    sosmed: Object,
});

const page = usePage();
</script>

<style lang="scss" scoped></style>
