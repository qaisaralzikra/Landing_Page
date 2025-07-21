<template>
    <div class="mt-10 ms-10 d-flex flex-column gap-2">
        <div>
            <ol class="breadcrumb text-muted fs-6 fw-semibold">
                <li class="breadcrumb-item">
                    <Link href="#" class="fs-4">Dashboard</Link>
                </li>
                <li class="breadcrumb-item text-muted fs-4">Daftar Daerah</li>
            </ol>
        </div>
        <div>
            <h1 class="fs-2qx">Daftar Daerah</h1>
            <span></span>
        </div>
        <div class=" d-flex flex-column gap-4">
            <div class="border-1 w-75 h-50px w-lg-25 rounded-3">
                <form
                    @submit.prevent="handleSearch"
                    class="d-flex align-items-center position-relative my-1 flex-grow-1 flex-sm-grow-0 w-100 w-sm-300px"
                >
                    <i class="bi bi-search position-absolute ms-5 fs-4"></i>
                    <input
                        type="text"
                        class="form-control form-control-solid ps-13 fs-5"
                        placeholder="Cari Daerah"
                    />
                </form>
            </div>
            <div class=" d-flex flex-row pt-4 ps-2 rounded-2 gap-3 w-100px align-items-center border-2 border-secondary">
                <p class="ri-filter-3-line fs-1"></p>
                <p class="fs-3 fw-semibold">Terbaru</p>
            </div>
            <div></div>
        </div>
    </div>
</template>

<script setup>
import { Link } from "@inertiajs/vue3";
</script>

<style lang="scss" scoped></style>
