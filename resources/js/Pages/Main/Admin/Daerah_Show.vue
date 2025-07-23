<script setup>
import navigation from "../../../Layout/navigation.vue";
import { Link } from "@inertiajs/vue3";
import route from "ziggy-js";

const { daerah } = defineProps({
    daerah: Object,
});

</script>

<template>
    <navigation>
        <div class="d-flex flex-column gap-31">
            <div>
                <ol
                    class="text-muted fs-6 d-flex flex-row gap-4 align-items-center p-0"
                >
                    <span class="fs-4 text-primary" style="font-weight: 700"
                        >Dashboard</span
                    >
                    <span class="fs-1">/</span>
                    <span class="fs-4 text-primary" style="font-weight: 700"
                        >Daftar Daerah</span
                    >
                    <span class="fs-1">/</span>
                    <span class="fs-4" style="font-weight: 400">{{
                        daerah.nama_daerah
                    }}</span>
                </ol>
            </div>
            <div class="d-flex flex-row align-items-center gap-5">
                <h1 class="fs-2qx">{{ daerah.daerah }}</h1>
                <h1 class="fs-2qx">{{ daerah.nama_daerah }}</h1>
            </div>
            <div class="d-flex flex-row gap-10 mt-7">
                <Link
                    :href="route('daerah.show.hero', daerah.nama_daerah)"
                    :class="
                        $page.url.startsWith(
                            `/daerah/${encodeURIComponent(
                                daerah.nama_daerah
                            )}/herosection`
                        )
                            ? 'active'
                            : 'no-active'
                    "
                >
                    <span class="fs-3">Hero Section</span>
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
                    <span class="fs-3">Apps Section</span>
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
                    <span class="fs-3">Footer Section</span>
                </Link>
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
