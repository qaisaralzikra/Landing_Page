<template>
    <div class="my-10 mx-10 d-flex flex-column gap-3">
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
        <div
            class="d-flex flex-column flex-lg-row gap-4 justify-content-lg-between"
        >
            <div class="border-1 w-75 h-50px w-lg-25 rounded-2">
                <form
                    @submit.prevent="handleSearch"
                    class="d-flex align-items-center position-relative my-1"
                >
                    <i class="bi bi-search position-absolute ms-5 fs-4"></i>
                    <input
                        type="text"
                        class="form-control form-control-solid ps-13 fs-5"
                        placeholder="Cari Daerah"
                    />
                </form>
            </div>
            <div class="d-flex flex-row gap-4 align-items-center">
                <div
                    class="border-1 rounded-2 d-flex flex-row gap-3 align-items-center px-4 py-1"
                    style="
                        color: rgba(60, 60, 67, 0.75);
                        border-color: rgba(60, 60, 67, 0.75);
                    "
                >
                    <p class="ri-filter-3-line fs-1 m-0"></p>
                    <p class="fs-3 fw-semibold m-0">Terbaru</p>
                </div>
                <button
                    @click="
                        () => {
                            resetForm();
                            openDrawer();
                        }
                    "
                    class="btn-primary btn py-1 rounded-2 text-white px-4 d-flex flex-row gap-3 align-items-center"
                >
                    <p class="m-0 ri-add-fill fs-1"></p>
                    <p class="fs-3 fw-semibold m-0">Daerah</p>
                </button>
            </div>
        </div>
    </div>

    <div
        v-if="daerahs.length === 0"
        class="app-main flex-column flex-row-fluid justify-content-center align-self-center mx-10"
        style="justify-self: center"
        id="kt_app_main"
    >
        <div class="d-flex flex-column flex-column-fluid">
            <div class="container-fluid float-start">
                <div class="my-20 d-flex flex-wrap gap-20 gap-md-15 gap-lg-8">
                    <div>
                        <div
                            class="text-center py-0 d-flex align-items-center flex-column"
                        >
                            <img
                                src="../../../../../public/assets/media/illustrations/empty.png"
                                alt="Tidak ada data"
                                class="mh-300px"
                            />
                            <h2 class="text-gray-800 mb-4">
                                Album Tidak Ditemukan
                            </h2>
                            <p class="text-gray-600 fs-4">
                                Belum ada album atau pencarian tidak sesuai.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form @submit.prevent="submit" style="z-index: 1000">
        <div
            id="kt_drawer_example_advanced"
            class="bg-body"
            data-kt-drawer="true"
            data-kt-drawer-activate="true"
            data-kt-drawer-toggle="#kt_drawer_example_advanced_button"
            data-kt-drawer-close="#kt_drawer_example_advanced_close"
            data-kt-drawer-name="docs"
            data-kt-drawer-overlay="true"
            data-kt-drawer-width="{default:'100%', 'md': '500px'}"
            data-kt-drawer-direction="end"
        >
            <div class="card w-100 rounded-0">
                <div
                    class="card-header ps-6 pe-3 h-60px border-bottom border-gray-300 h-60px h-lg-70px"
                    style="min-height: unset"
                >
                    <div class="card-title">
                        <h2>Tambah Daerah</h2>
                    </div>
                    <div
                        class="card-toolbar"
                        id="kt_drawer_example_advanced_close"
                    >
                        <div
                            class="btn btn-sm btn-icon btn-mylighten rounded-pill"
                        >
                            <i class="bi bi-x-lg fs-3"></i>
                        </div>
                    </div>
                </div>
                <div class="card-body bg-light p-6 d-flex flex-column gap-7">
                    <div class="flex-grow-1">
                        <div class="card border border-gray-300">
                            <div
                                class="card-header h-auto p-6 border-bottom border-gray-300"
                                style="min-height: unset"
                            >
                                <div class="card-title m-0">
                                    <h3>Profil Daerah</h3>
                                </div>
                            </div>
                            <div class="card-body p-6">
                                <div class="mb-5 fv-row">
                                    <label
                                        for="name"
                                        class="required form-label fs-5"
                                        >Nama Daerah</label
                                    >
                                    <div class="d-flex flex-row">
                                        <select v-model="daerah" name="" id="" class="border-1 border-secondary w-60px form-control bg-secondary" style="border-radius: 2px 0 0 2px;">
                                            <option value="Kabupaten" class="fs-5 py-1 px-1">Kab</option>
                                            <option value="Kota" class="fs-5 py-1 px-1">Kota</option>
                                        </select>
                                        <input
                                            type="text"
                                            class="form-control fs-5"
                                            style="border-radius: 0 2px 2px 0;"
                                            v-model="form.nama_daerah"
                                            placeholder="Masukkan nama daerah..."
                                        />
                                    </div>
                                    <div
                                        v-if="form.errors.nama_daerah"
                                        class="text-mydanger mt-2"
                                    >
                                        {{ form.errors.name_daerah }}
                                    </div>
                                </div>

                                <div class="fv-row">
                                    <label class="required form-label fs-5"
                                        >Deskripsi</label
                                    >
                                    <input
                                        type="text"
                                        class="form-control fs-5"
                                        v-model="form.deskripsi"
                                        required
                                        placeholder="Masukkan deskripsi singkat..."
                                    />
                                    <div
                                        v-if="form.errors.deskripsi"
                                        class="text-mydanger mt-2"
                                    >
                                        {{ form.errors.deskripsi }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button
                            type="reset"
                            class="btn btn-sm btn-mylight fs-5 me-3"
                            id="kt_drawer_example_advanced_close"
                        >
                            Batal
                        </button>
                        <button
                            type="submit"
                            id="kt_drawer_submit_button"
                            class="btn btn-sm btn-dark fs-5"
                        >
                            <span class="indicator-label">
                                Tambah Partner
                            </span>
                            <span class="indicator-progress">
                                Mohon Tunggu...
                                <span
                                    class="spinner-border spinner-border-sm align-middle ms-2"
                                ></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</template>

<script setup>
import { Head, useForm, usePage } from "@inertiajs/vue3";
import Swal from "sweetalert2";
import { ref, nextTick, watch } from "vue";

defineProps({
    daerahs: {
        type: Array,
        default: () => [],
    },
});

const page = usePage();

const form = useForm({
    logo_daerah: "",
    nama_daerah: "",
    daerah: "",
    deskripsi: "",
});

const drawerCloseBtn = document.querySelector(
    "#kt_drawer_example_advanced_close"
);
if (drawerCloseBtn) drawerCloseBtn.click();
const dropzoneKey = ref(Date.now());
const openDrawer = async () => {
    dropzoneKey.value = Date.now();
    await nextTick();

    const drawerEl = document.querySelector("#kt_drawer_example_advanced");
    if (drawerEl && window.KTDrawer) {
        const drawer = KTDrawer.getInstance(drawerEl) || new KTDrawer(drawerEl);
        drawer.show();
    }
};
const dropzoneRef = ref(null);
const resetForm = () => {
    form.name = "";
    form.link = "";

    if (dropzoneRef.value) {
        dropzoneRef.value.removeAllFiles(true);
    }

    const drawerCloseBtn = document.querySelector(
        "#kt_drawer_example_advanced_close"
    );
    if (drawerCloseBtn) drawerCloseBtn.click();
};
const submit = () => {
    const submitBtn = document.querySelector("#kt_drawer_submit_button");
    if (submitBtn) {
        submitBtn.setAttribute("data-kt-indicator", "on");
        submitBtn.setAttribute("disabled", true);
    }

    const cleanup = () => {
        if (submitBtn) {
            submitBtn.removeAttribute("data-kt-indicator");
            submitBtn.removeAttribute("disabled");
        }
    };

    console.log(form);
    // console.log(route('anggotas.store'))
    form.post(route("daerah.store"), {
        onSuccess: () => {
            Swal.fire({
                icon: "success",
                title: "Daerah Berhasil Ditambah",
                text: page.props.session.success,
                showConfirmButton: false,
                timer: 2000,
            });
            cleanup();
            form.reset("");
        },
        onError: () => {
            Swal.fire({
                icon: "error",
                title: "Daeah Gagal Ditambah",
                text: page.props.session.error,
                showConfirmButton: false,
                timer: 2000,
            });
            form.reset("");
        },
    });
};
</script>

<style lang="scss" scoped></style>
