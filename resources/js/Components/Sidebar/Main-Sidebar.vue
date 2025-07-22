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
                    class="h-45px app-sidebar-logo-default theme-light-show"
                />
                <img
                    alt="Logo"
                    src="/public/assets/media/logos/afila-logo.svg"
                    class="h-25px app-sidebar-logo-minimize"
                />
            </Link>
        </div>
        <div
            class="app-sidebar-menu overflow-hidden flex-column-fluid border-end border-gray-300"
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
                                active: $page.url.startsWith(
                                    '/admin/dashboard'
                                ),
                            }"
                            href="/dashboard"
                        >
                            <span class="menu-icon">
                                <i
                                    :class="[
                                        $page.url.startsWith('/admin/dashboard')
                                            ? 'ri-dashboard-fill'
                                            : 'ri-dashboard-line',
                                        'fs-2',
                                    ]"
                                ></i>
                            </span>
                            <span
                                :class="[
                                    $page.url.startsWith('/admin/dashboard')
                                        ? 'fw-bold'
                                        : 'fw-semibold',
                                    'menu-title fs-4',
                                ]"
                                >Dashboard</span
                            >
                        </Link>
                    </div>
                    <div class="menu-item">
                        <Link
                            class="menu-link menu-link-mysecondary"
                            :class="{
                                active: $page.url.startsWith(
                                    '/admin/dashboard'
                                ),
                            }"
                            href="/daftarkab"
                        >
                            <span class="menu-icon">
                                <i
                                    :class="[
                                        $page.url.startsWith('/admin/dashboard')
                                            ? 'ri-bank-fill'
                                            : 'ri-bank-line',
                                        'fs-2',
                                    ]"
                                ></i>
                            </span>
                            <span
                                :class="[
                                    $page.url.startsWith('/admin/dashboard')
                                        ? 'fw-bold'
                                        : 'fw-semibold',
                                    'menu-title fs-4',
                                ]"
                                >Daftar Daerah</span
                            >
                        </Link>
                    </div>
                    <div class="menu-item pt-4">
                        <div class="menu-content py-1">
                            <span
                                class="text-gray-500 fw-semibold text-uppercase fs-7"
                                style="letter-spacing: 0.06em"
                                >PORTAL</span
                            >
                        </div>
                    </div>
                    <div class="menu-item" v-for="daerah in post"
                    :key="daerah.id">
                        <Link
                            class="menu-link menu-link-mysecondary"
                            :class="{
                                active: $page.url.startsWith(
                                    '/admin/galleries'
                                ),
                            }"
                            href="/admin/galleries"
                        >
                            <img
                                :src="`/storage/${daerah.logo_daerah}`"
                                alt=""
                                srcset=""
                                class="rounded-2 me-4"
                                style="width: 17px"
                            />
                            <span
                                :class="[
                                    $page.url.startsWith('/admin/galleries')
                                        ? 'fw-bold'
                                        : 'fw-semibold',
                                    'menu-title fs-4',
                                ]"
                                >{{ daerah.nama_daerah }}</span
                            >
                        </Link>
                    </div>
                    <a
                        class="btn btn-flex btn-color-primary d-flex  fs-base p-0 ms-2 mb-2 toggle collapsible collapsed"
                        data-bs-toggle="collapse"
                        href="#kt_app_sidebar_menu_dashboards_collapse"
                        data-kt-toggle-text="Sembunyikan"
                    >
                        <span class="svg-icon toggle-on svg-icon-2 ">
                            <i class="ri-add-line"></i>
                            
                        </span>
                        <span class="svg-icon toggle-off svg-icon-2 ">
                            <i class="ri-subtract-line"></i>
                        </span>
                         <span data-kt-toggle-text-target="true"
                            >Lihat 12 Lainnya</span
                        >
                        

                        <!-- isi -->
                                            
                    </a>
                     <div class="menu-inner flex-column collapse" id="kt_app_sidebar_menu_dashboards_collapse">

                        pdcoekof
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
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Link, usePage } from "@inertiajs/vue3";

const page = usePage()

const post = page.props.daerahs

</script>

<style>
.menu-link-mysecondary:hover {
    background-color: #3B82F61A; /* Bootstrap light */
    
}

.menu-link-mysecondary:hover .menu-title,
.menu-link-mysecondary:hover .menu-icon i {
    color: #000000 ; 
    
    /* Bootstrap primary */
}

.menu-title{
    font-family: 'NunitoSans', sans-serif;
    font-size: 1.2rem;
}


.menu-link-mysecondary,
.menu-link-mysecondary .menu-title,
.menu-link-mysecondary .menu-icon i {
    transition: all 0.1s ease-in-out;
    color: #3C3C43BF;
  
}

.menu-link.active {
    background-color:  #3B82F61A; /* abu lebih gelap */
    color: #000000;
}

@font-face {
  font-family: 'NunitoSans';
  src: url('/assets/media/font/NunitoSans2.ttf') format('truetype');
}


</style>
