<template>
    <div id="kt_app_header" class="app-header bg-white">
        <div
            class="container-fluid d-flex align-items-stretch justify-content-between"
        >
            <!-- Sidebar toggle -->
            <div
                class="d-flex align-items-center d-lg-none ms-n3 me-2"
                title="Show sidebar menu"
            >
                <div
                    class="btn btn-icon btn-myicon w-35px h-35px"
                    id="kt_app_sidebar_mobile_toggle"
                >
                    <i class="ri-menu-line fs-2"></i>
                </div>
            </div>

            <!-- Logo -->
            <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                <a href="#" class="d-lg-none">
                    <img
                        alt="Logo"
                        src="/public/assets/media/logos/afila-logo.svg"
                        class="h-35px"
                    />
                </a>
            </div>

            <!-- Right area -->
            <div
                class="d-flex align-items-center justify-content-between flex-lg-grow-1"
                id="kt_app_header_wrapper"
            >
                <div></div>

                <!-- User Menu -->
                <div
                    class="app-navbar-item ms-1 ms-lg-3"
                    id="kt_header_user_menu_toggle"
                >
                    <div
                        class="gap-3 cursor-pointer d-flex symbol symbol-35px symbol-md-40px"
                        data-kt-menu-trigger="click"
                        data-kt-menu-attach="parent"
                        data-kt-menu-placement="bottom-end"
                    >
                        <div
                            style="font-family: 'NunitoSans'; font-weight: bold"
                            class="symbol-label rounded-circle fs-4 bg-primary text-white"
                        >
                            {{ getInitial }}
                        </div>
                        <div class="fw-bold d-flex align-items-center">
                            <span
                                class="fs-md-4 fs-5"
                                style="
                                    font-family: 'NunitoSans';
                                    font-weight: bold;
                                "
                            >
                                {{ user.name }}
                            </span>
                            <i
                                class="ri-arrow-down-s-fill ms-2 fs-4 text-dark"
                            ></i>
                        </div>
                    </div>

                    <!-- Dropdown -->
                    <div
                        class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold mt-3 py-4 fs-6 w-175px"
                        data-kt-menu="true"
                    >
                        <!-- Header -->
                        <!-- Logout -->
                        <div class="menu-item px-5">
                            <Link
                                href="/logout"
                                method="POST"
                                as="button"
                                class="px-5 btn btn-danger w-100 text-start"
                            >
                                Keluar
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import { computed } from "vue";

const page = usePage();

const user = computed(() => page.props.auth?.user || {});

const getInitial = computed(() => {
    const name = user.value?.name || "";
    const words = name.trim().split(" ");
    if (words.length === 1) return words[0][0]?.toUpperCase() || "";
    return (words[0][0] + words[1][0]).toUpperCase();
});
</script>

<style scoped></style>
