<template>
    <div
        id="kt_app_sidebar"
        class="app-sidebar flex-column"
        data-kt-drawer="true"
        data-kt-drawer-name="app-sidebar"
        data-kt-drawer-activate="{default: true, lg: false}"
        data-kt-drawer-overlay="true"
        data-kt-drawer-width="268px"
        data-kt-drawer-direction="start"
        data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle"
    >
        <div
            class="app-sidebar-logo px-6 border-end border-gray-300"
            id="kt_app_sidebar_logo"
        >
            <Link href="/admin/dashboard">
                <img
                    alt="Logo"
                    src="/public/assets/media/logos/afila-logo.svg"
                    class="h-40px w-95px app-sidebar-logo-default theme-light-show"
                />
                <img
                    alt="Logo"
                    src="/public/assets/media/logos/afila-logo.svg"
                    class="h-20px w-90px app-sidebar-logo-minimize"
                />
            </Link>
        </div>
        <div
            class="app-sidebar-menu overflow-y-scroll flex-column-fluid border-end border-gray-300"
        >
            <div
                id="kt_app_sidebar_menu_wrapper"
                class="app-sidebar-wrapper d-flex flex-column justify-content-between gap-8 hover-scroll-overlay-y mt-5 mb-2"
                data-kt-scroll="true"
                data-kt-scroll-activate="true"
                data-kt-scroll-height="auto"
                data-kt-scroll-dependencies="#kt_app_sidebar_logo, #kt_app_sidebar_footer"
                data-kt-scroll-wrappers="#kt_app_sidebar_menu"
                data-kt-scroll-offset="5px"
                data-kt-scroll-save-state="true"
            >
                <div
                    class="menu menu-column menu-rounded menu-sub-indention px-4"
                    id="#kt_app_sidebar_menu"
                    data-kt-menu="true"
                    data-kt-menu-expand="false"
                >
                    <div class="menu-item">
                        <Link
                            class="menu-link menu-link-mysecondary"
                            :class="{
                                active: $page.url.startsWith('/dashboard'),
                            }"
                            href="/dashboard"
                        >
                            <span class="menu-icon">
                                <i
                                    :class="[
                                        $page.url.startsWith('/dashboard')
                                            ? 'ri-dashboard-fill'
                                            : 'ri-dashboard-line',
                                        'fs-2',
                                    ]"
                                ></i>
                            </span>
                            <span
                                :class="[
                                    $page.url.startsWith('/dashboard')
                                        ? ['fw-bold', 'text-dark']
                                        : 'menu-title ',
                                    'fs-4',
                                ]"
                                >Dashboard</span
                            >
                        </Link>
                    </div>
                    <div class="menu-item">
                        <Link
                            class="menu-link menu-link-mysecondary"
                            :class="{
                                active: $page.url.startsWith('/daftarkab'),
                            }"
                            href="/daftarkab"
                        >
                            <span class="menu-icon">
                                <i
                                    :class="[
                                        $page.url.startsWith('/daftarkab')
                                            ? 'ri-bank-fill'
                                            : 'ri-bank-line',
                                        'fs-2',
                                    ]"
                                ></i>
                            </span>
                            <span
                                :class="[
                                    $page.url.startsWith('/daftarkab')
                                        ? ['fw-bold', 'text-dark']
                                        : 'menu-title',
                                    ' fs-4',
                                ]"
                                >Daftar Daerah</span
                            >
                        </Link>
                    </div>
                    <!-- Bagian Judul -->

                    <div class="menu-item pt-4">
                        <div class="menu-content py-1">
                            <span
                                class="text-gray-500 fw-semibold text-uppercase fs-7"
                                style="letter-spacing: 0.06em"
                            >
                                PORTAL
                            </span>
                        </div>
                    </div>

                    <!-- 5 Pertama -->
                    <div
                        class="menu-item"
                        v-for="daerah in post.slice(0, 5)"
                        :key="daerah.id"
                    >
                        <Link
                            class="menu-link menu-link-mysecondary d-flex flex-row align-items-center"
                            :class="{
                                active: $page.url.startsWith(
                                    `/daerah/${daerah.nama_daerah}/`
                                ),
                            }"
                            :href="
                                route('daerah.show.hero', daerah.nama_daerah)
                            "
                        >
                            <img
                                :src="`/storage/${daerah.logo_daerah}`"
                                alt=""
                                class="rounded-2 me-4 w-20px h-20px"
                            />
                            <span
                                class="text-capitalize"
                                :class="[
                                    $page.url.startsWith(
                                        `/daerah/${daerah.nama_daerah}`
                                    )
                                        ? ['fw-bold', 'text-dark', '']
                                        : 'menu-title ',
                                    'fs-4',
                                ]"
                            >
                                {{ daerah.nama_daerah }}
                            </span>
                        </Link>
                    </div>

                    <!-- Menu Tambahan (lebih dari 5) -->
                    <div v-if="post.length > 5">
                        <div
                            class="menu-inner flex-column collapse"
                            id="kt_app_sidebar_menu_dashboards_collapse"
                        >
                            <div
                                class="menu-item"
                                v-for="daerah in post.slice(5)"
                                :key="daerah.id"
                            >
                                <Link
                                    class="menu-link menu-link-mysecondary d-flex flex-row align-items-center"
                                    :class="{
                                        active: $page.url.startsWith(
                                            `/daerah/${daerah.nama_daerah}`
                                        ),
                                    }"
                                    :href="
                                        route(
                                            'daerah.show.hero',
                                            daerah.nama_daerah
                                        )
                                    "
                                >
                                    <img
                                        :src="`/storage/${daerah.logo_daerah}`"
                                        alt=""
                                        class="rounded-2 me-4 w-20px h-20px"
                                    />
                                    <span
                                        class="text-capitalize"
                                        :class="[
                                            $page.url.startsWith(
                                                `/daerah/${daerah.nama_daerah}`
                                            )
                                                ? ['fw-bold', 'text-dark', '']
                                                : 'menu-title ',
                                            'fs-4',
                                        ]"
                                    >
                                        {{ daerah.nama_daerah }}
                                    </span>
                                </Link>
                            </div>
                        </div>

                        <!-- Tombol Toggle -->
                        <a
                            class="btn btn-flex btn-color-primary d-flex gap-2 fs-5 p-0 ms-4 mb-2 toggle collapsible collapsed"
                            data-bs-toggle="collapse"
                            href="#kt_app_sidebar_menu_dashboards_collapse"
                            data-kt-toggle-text="Sembunyikan"
                        >
                            <span class="svg-icon toggle-on svg-icon-2">
                                <i class="ri-add-line fs-4"></i>
                            </span>
                            <span class="svg-icon toggle-off svg-icon-2">
                                <i class="ri-subtract-line fs-4"></i>
                            </span>
                            <span data-kt-toggle-text-target="true"
                                >Lihat {{ post.length - 5 }} Lainnya</span
                            >
                        </a>
                    </div>

                    <div class="menu-item pt-4">
                        <div class="menu-content py-1">
                            <span
                                class="text-gray-500 fw-semibold text-uppercase fs-7"
                                style="letter-spacing: 0.06em"
                                >Lainnya</span
                            >
                        </div>
                    </div>

                    <div class="menu-item">
                        <Link
                            class="menu-link menu-link-mysecondary"
                            :class="{
                                active: $page.url.startsWith('/admin/user'),
                            }"
                            href="/admin/user"
                        >
                            <span class="menu-icon">
                                <i
                                    :class="[
                                        $page.url.startsWith('/admin/user')
                                            ? 'ri-settings-fill'
                                            : 'ri-settings-line',
                                        'fs-2',
                                    ]"
                                ></i>
                            </span>
                            <span
                                :class="[
                                    $page.url.startsWith('/admin/user')
                                        ? 'fw-bold'
                                        : 'fw-semibold',
                                    'menu-title fs-4',
                                ]"
                                >Pengaturan</span
                            >
                        </Link>
                    </div>
                    <div class="menu-item">
                        <Link
                            class="menu-link menu-link-mysecondary"
                            :class="{
                                active: $page.url.startsWith('/admin/user'),
                            }"
                            href="/admin/user"
                        >
                            <span class="menu-icon">
                                <i
                                    :class="[
                                        $page.url.startsWith('/admin/user')
                                            ? 'ri-account-circle-fill'
                                            : 'ri-account-circle-line',
                                        'fs-2',
                                    ]"
                                ></i>
                            </span>
                            <span
                                :class="[
                                    $page.url.startsWith('/admin/user')
                                        ? 'fw-bold'
                                        : 'fw-semibold',
                                    'menu-title fs-4',
                                ]"
                                >Akun</span
                            >
                        </Link>
                    </div>
                    <!-- button -->
                    <div
                        @click="
                            () => {
                                resetForm();
                                openDrawer();
                            }
                        "
                        style="width: 90%"
                        class="mb-10 cursor-pointer mt-10 mx-auto menu-item py-10 border border-secondary border-dashed border-2 text-center rounded-2 d-flex flex-column flex-center justify-content-center"
                    >
                        <div>
                            <!--begin::Icon-->
                            <i
                                style="font-size: 40px"
                                class="ri-bank-fill text-primary"
                            ></i>

                            <div class="d-flex flex-column">
                                <h5 class="mb-1 text-capitalize">
                                    tambah daerah
                                </h5>

                                <span class="textcapitalize fs-6 text-gray-600"
                                    >portal aplikasi</span
                                >
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/vue3";
import route from "ziggy-js";

const page = usePage();

const { daerah } = defineProps({
    resetForm: Function,
    openDrawer: Function,
});

const post = page.props.daerahs;
</script>

<style>
.menu-link-mysecondary:hover {
    background-color: #3b82f61a; /* Bootstrap light */
}

.menu-link-mysecondary:hover .menu-title,
.menu-link-mysecondary:hover .menu-icon i {
    color: #000000;

    /* Bootstrap primary */
}

.menu-title {
    font-family: "NunitoSans", sans-serif;
    font-weight: 600;
}

.menu-link-mysecondary,
.menu-link-mysecondary .menu-title,
.menu-link-mysecondary .menu-icon i {
    transition: all 0.1s ease-in-out;
    color: #3c3c43bf;
}

.menu-link.active {
    background-color: #3b82f61a; /* abu lebih gelap */
    color: #000000;
}

@font-face {
    font-family: "NunitoSans";
    src: url("/assets/media/font/NunitoSans2.ttf") format("truetype");
}
</style>
