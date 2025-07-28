<script setup>
import navigation from "../../../Layout/navigation.vue";
import { Link } from "@inertiajs/vue3";
import route from "ziggy-js";

const { daerah } = defineProps({
    daerah: Object,
    resetForm: Function,
    openDrawer: Function,
});
</script>

<template>
    <navigation>
        <div class="d-flex flex-column gap-31">
            <div>
                <ol
                    class="text-muted fs-6 d-flex flex-row gap-4 align-items-center p-0"
                >
                    <span
                        class="fs-md-4 fs-5 text-primary"
                        style="font-weight: 700"
                        >Dashboard</span
                    >
                    <span class="fs-md-1 fs-2">/</span>
                    <span
                        class="fs-md-4 fs-5 text-primary"
                        style="font-weight: 700"
                        >Daftar Daerah</span
                    >
                    <span class="fs-md-1 fs-2">/</span>
                    <span
                        class="fs-md-4 fs-5 text-capitalize"
                        style="font-weight: 400"
                        >{{ daerah.nama_daerah }}</span
                    >
                </ol>
            </div>
            <div class="d-flex flex-row align-items-center gap-3">
                <h1 class="fs-md-2qx fs-1 text-capitalize">
                    {{ daerah.daerah }}
                </h1>
                <h1 class="fs-md-2qx fs-1 text-capitalize">
                    {{ daerah.nama_daerah }}
                </h1>
            </div>
            <div
                class="d-flex flex-column gap-10 flex-lg-row justify-content-lg-between"
            >
                <div class="d-flex flex-row gap-10 mt-7">
                    <Link
                        :href="
                            daerah && daerah.nama_daerah
                                ? route('daerah.show.hero', {
                                        nama_daerah: daerah.nama_daerah,
                                    })
                                : '#'
                        "
                        :class="
                            daerah &&
                            daerah.nama_daerah &&
                            $page.url.startsWith(
                                `/daerah/${encodeURIComponent(
                                    daerah.nama_daerah
                                )}/herosection`
                            )
                                ? 'active'
                                : 'no-active'
                        "
                    >
                        <span class="fs-md-3 fs-5">Hero Section</span>
                    </Link>
                    <Link
                        :href="route('daerah.show.app', daerah.nama_daerah)"
                        :class="
                            $page.url.startsWith(
                                `/daerah/${encodeURIComponent(
                                    daerah.nama_daerah
                                )}/appsection`
                            )
                                ? 'active'
                                : 'no-active'
                        "
                    >
                        <span class="fs-md-3 fs-5">Apps Section</span>
                    </Link>
                    <Link
                        :href="route('daerah.show.footer', daerah.nama_daerah)"
                        :class="
                            $page.url.startsWith(
                                `/daerah/${encodeURIComponent(
                                    daerah.nama_daerah
                                )}/footer`
                            )
                                ? 'active'
                                : 'no-active'
                        "
                    >
                        <span class="fs-md-3 fs-5">Footer Section</span>
                    </Link>
                </div>
                <div
                    class="d-flex flex-row gap-4 align-items-center"
                    :class="
                        $page.url.startsWith(
                            `/daerah/${encodeURIComponent(
                                daerah.nama_daerah
                            )}/footer`
                        )
                            ? 'd-none'
                            : 'd-flex'
                    "
                >
                    <button
                        @click="
                            () => {
                                resetForm();
                                openDrawer();
                            }
                        "
                        class="btn-primary btn py-1 rounded-2 text-white px-4 d-flex flex-row gap-3 align-items-center"
                    >
                        <p class="m-0 ri-add-fill fs-1 m-0"></p>
                        <p class="fs-3 fw-semibold m-0">Component</p>
                    </button>
                </div>
            </div>
        </div>
        <slot></slot>
    </navigation>
</template>

<style scoped>
:global(.active) {
    font-weight: bolder;
    color: black;
}
:global(.no-active) {
    color: rgba(60, 60, 67, 0.5);
}
</style>
