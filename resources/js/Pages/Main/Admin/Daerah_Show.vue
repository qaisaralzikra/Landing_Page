<template>
    <navigation>
        <div>
            <div>
                <ol
                    class="text-muted fs-6 d-flex flex-row gap-4 align-items-center p-0"
                >
                    <span class="fs-4 text-primary" style="font-weight: 700">Dashboard</span>
                    <span class="fs-1">/</span>
                    <span class="fs-4 text-primary" style="font-weight: 700">Daftar Daerah</span>
                    <span class="fs-1">/</span>
                    <span class="fs-4" style="font-weight: 400">{{ daerah.nama_daerah }}</span>
                </ol>
            </div>
            <div class="d-flex flex-row align-items-center gap-5">
                <h1 class="fs-2qx">{{ daerah.daerah }}</h1>
                <h1 class="fs-2qx">{{ daerah.nama_daerah }}</h1>
            </div>
        </div>
    </navigation>
</template>

<script setup>
import navigation from "../../../Layout/navigation.vue";

defineProps({
    daerah: Object,
});
</script>

<style lang="scss" scoped></style>
