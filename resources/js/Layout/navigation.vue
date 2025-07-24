<template>
    <main
        data-kt-name="metronic"
        id="kt_app_body"
        data-kt-app-header-fixed="true"
        data-kt-app-layout="light-sidebar"
        data-kt-app-sidebar-enabled="true"
        data-kt-app-sidebar-fixed="true"
        data-kt-app-sidebar-hoverable="true"
        data-kt-app-sidebar-push-header="true"
        data-kt-app-sidebar-push-toolbar="true"
        data-kt-app-sidebar-push-footer="true"
        data-kt-app-toolbar-enabled="true"
        class="app-default"
    >
        <div
            class="d-flex flex-column flex-root app-root align-self-center"
            id="kt_app_root"
        >
            <div
                class="app-page flex-column flex-column-fluid"
                id="kt_app_page"
            >
                <main-header />
                <div
                    class="app-wrapper flex-column flex-row-fluid"
                    id="kt_app_wrapper"
                >
                    <main-sidebar>
                        <div
                        style="
                            cursor: pointer;
                            justify-items: center;
                            border: 2px dotted rgba(60, 60, 67, 0.25);
                        "
                        class="mx-5 my-5 rounded-2"
                        @click="
                            () => {
                                resetForm();
                                openDrawer();
                            }
                        "
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="40px"
                            height="40px"
                            viewBox="0 0 24 24"
                            fill="currentColor"
                            color="rgba(59, 130, 246, 1)"
                            class="my-6"
                        >
                            <path
                                d="M2 20H22V22H2V20ZM4 12H6V19H4V12ZM9 12H11V19H9V12ZM13 12H15V19H13V12ZM18 12H20V19H18V12ZM2 7L12 2L22 7V11H2V7ZM12 8C12.5523 8 13 7.55228 13 7C13 6.44772 12.5523 6 12 6C11.4477 6 11 6.44772 11 7C11 7.55228 11.4477 8 12 8Z"
                            ></path>
                        </svg>
                        <div
                            class="d-flex flex-column text-center lh-base mb-6"
                        >
                            <span class="fw-bold fs-4">Tambah Daerah</span>
                            <span
                                class="fw-normal fs-6"
                                style="color: rgba(60, 60, 67, 0.5)"
                                >Portal Aplikasi</span
                            >
                        </div>
                    </div>
                    </main-sidebar>
                    <div class="mx-10 my-5">
                        <slot />
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
<script setup>
import MainSidebar from "../Components/Sidebar/Main-Sidebar.vue";
import MainHeader from "../Components/Header/Main-Header.vue";
</script>
