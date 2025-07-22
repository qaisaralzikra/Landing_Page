<template>
    <div
        id="kt_app_sidebar"
        class="app-sidebar flex-column"
        data-kt-drawer="true"
        data-kt-drawer-name="app-sidebar"
        data-kt-drawer-activate="{default: true, lg: false}"
        data-kt-drawer-overlay="true"
        data-kt-drawer-width="225px"
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
                    src="/assets/media/logos/glp-indtim-logo.png"
                    class="h-40px app-sidebar-logo-default theme-light-show"
                />
                <img
                    alt="Logo"
                    src="/assets/media/logos/glp-indtim-logo.png"
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
                            href="/admin/dashboard"
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
                                    'menu-title fs-5',
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
                            href="/admin/dashboard"
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
                                    'menu-title fs-5',
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
                    <div class="menu-item">
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
                                src="/assets/media/logos/logo-kab-bone.png"
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
                                    'menu-title fs-5',
                                ]"
                                >Kab.Bone</span
                            >
                        </Link>

                        <div class="menu-inner flex-column collapse" id="kt_app_sidebar_menu_dashboards_collapse">
                            
                        </div>
                    </div>
                    <a
                        class="btn btn-flex btn-color-primary d-flex flex-stack fs-base p-0 ms-2 mb-2 toggle collapsible collapsed"
                        data-bs-toggle="collapse"
                        href="#kt_app_sidebar_menu_dashboards_collapse"
                        data-kt-toggle-text="Show Less"
                    >
                        <span data-kt-toggle-text-target="true"
                            >Show 12 More</span
                        >
                        <!--begin::Svg Icon | path: icons/duotune/general/gen036.svg-->
                        <span class="svg-icon toggle-on svg-icon-2 me-0">
                            <svg
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <rect
                                    opacity="0.3"
                                    x="2"
                                    y="2"
                                    width="20"
                                    height="20"
                                    rx="5"
                                    fill="currentColor"
                                />
                                <rect
                                    x="6.0104"
                                    y="10.9247"
                                    width="12"
                                    height="2"
                                    rx="1"
                                    fill="currentColor"
                                />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                        <!--begin::Svg Icon | path: icons/duotune/general/gen035.svg-->
                        <span class="svg-icon toggle-off svg-icon-2 me-0">
                            <svg
                                width="24"
                                height="24"
                                viewBox="0 0 24 24"
                                fill="none"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <rect
                                    opacity="0.3"
                                    x="2"
                                    y="2"
                                    width="20"
                                    height="20"
                                    rx="5"
                                    fill="currentColor"
                                />
                                <rect
                                    x="10.8891"
                                    y="17.8033"
                                    width="12"
                                    height="2"
                                    rx="1"
                                    transform="rotate(-90 10.8891 17.8033)"
                                    fill="currentColor"
                                />
                                <rect
                                    x="6.01041"
                                    y="10.9247"
                                    width="12"
                                    height="2"
                                    rx="1"
                                    fill="currentColor"
                                />
                            </svg>
                        </span>
                        <!--end::Svg Icon-->
                    </a>

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
                                    'menu-title fs-5',
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
                                    'menu-title fs-5',
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

<script>
import { Link } from "@inertiajs/vue3";

export default {
    components: {
        Link,
    },
};
</script>

<style></style>
