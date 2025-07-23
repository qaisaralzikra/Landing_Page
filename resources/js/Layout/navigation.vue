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
                    <main-sidebar />
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
