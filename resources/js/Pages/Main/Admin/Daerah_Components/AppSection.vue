<template>
    <Daerah_Show
        :daerah="daerah"
        :reset-form="resetForm"
        :open-drawer="openDrawer"
        :isEditMode="false"
    >
        <div
            v-if="apps.length === 0"
            class="app-main flex-column flex-row-fluid justify-content-center align-self-center mx-10"
            style="justify-self: center"
            id="kt_app_main"
        >
            <div class="d-flex flex-column flex-column-fluid">
                <div class="container-fluid float-start">
                    <div
                        class="my-20 d-flex flex-wrap gap-20 gap-md-15 gap-lg-8"
                    >
                        <div>
                            <div
                                class="text-center py-0 d-flex align-items-center flex-column"
                            >
                                <img
                                    src="../../../../../../public/assets/media/illustrations/empty.png"
                                    alt="Tidak ada data"
                                    class="mh-300px"
                                />
                                <h2 class="text-gray-800 mb-4">
                                    Data Tidak Ditemukan
                                </h2>
                                <p class="text-gray-600 fs-4">
                                    Belum ada data atau pencarian tidak sesuai.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="app-main flex-column flex-row-fluid justify-content-center align-self-lg-start"
            id="kt_app_main"
        >
            <div class="d-flex flex-column flex-column-fluid mt-0 mt-lg-0">
                <div class="container-fluid float-start mt-10 mt-lg-8 p-0">
                    <div
                        class="my-1 d-flex flex-wrap gap-10 gap-md-15 gap-lg-5"
                    >
                        <div
                            v-for="app in apps"
                            :key="app.id"
                            class="p-3 d-flex flex-row flex-md-column gap-4 bg-white rounded-2 w-550px w-md-275px"
                            style="border: 1px solid rgba(118, 118, 128, 0.12)"
                        >
                            <div
                                class="d-block overlay position-relative h-150px h-md-200px"
                            >
                                <div style="justify-self: center">
                                    <img
                                        :src="`/storage/${app.logo_app}`"
                                        alt=""
                                        class="overlay-wrapper rounded-4 w-175px h-150px w-md-250px h-md-200px"
                                    />
                                </div>
                                <div
                                    class="overlay-layer position-absolute top-0 start-0 d-flex gap-3 align-items-center justify-content-center bg-dark bg-opacity-25 rounded-4"
                                >
                                    <button
                                        @click="editDaerah(app)"
                                        class="btn btn-sm btn-icon btn-secondary"
                                    >
                                        <i class="ri-edit-2-fill fs-5"></i>
                                    </button>
                                    <button
                                        @click="destroy(app.id)"
                                        class="btn btn-sm btn-icon btn-danger"
                                    >
                                        <i
                                            class="ri-delete-bin-fill text-white fs-5"
                                        ></i>
                                    </button>
                                </div>
                            </div>
                            <div
                                class="w-425px w-md-250px d-flex flex-column gap-2"
                            >
                                <div>
                                    <span class="fw-bolder fs-2">{{
                                        app.nama_app
                                    }}</span>
                                </div>
                                <div
                                    style="
                                        justify-self: center;
                                        color: rgba(60, 60, 67, 0.75);
                                    "
                                >
                                    <span class="fs-6" style="">{{
                                        app.deskripsi
                                    }}</span>
                                </div>
                                <div class="mt-auto">
                                    <a
                                        target="_blank"
                                        :href="`${app.link}`"
                                        class="d-flex flex-row align-items-center justify-content-center mt-auto rounded-3 gap-1 text-white bg-primary py-3"
                                    >
                                        <div
                                            class="d-flex align-items-center gap-2 fw-bold"
                                        >
                                            <span>Buka Aplikasi</span>
                                            <span
                                                ><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    class="w-15px h-15px"
                                                    viewBox="0 0 24 24"
                                                    fill="currentColor"
                                                >
                                                    <path
                                                        d="M16.0037 9.41421L7.39712 18.0208L5.98291 16.6066L14.5895 8H7.00373V6H18.0037V17H16.0037V9.41421Z"
                                                    ></path>
                                                </svg>
                                            </span>
                                        </div>
                                    </a>
                                </div>
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
                            <h2>Tambah Apps Section</h2>
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
                    <div
                        class="card-body bg-light p-6 d-flex flex-column gap-7"
                    >
                        <div class="flex-grow-1">
                            <div class="card border border-gray-300">
                                <div
                                    class="card-header h-auto p-6 border-bottom border-gray-300"
                                    style="min-height: unset"
                                >
                                    <div class="card-title m-0">
                                        <h3>Data Apps Section</h3>
                                    </div>
                                </div>
                                <div class="card-body p-6">
                                    <div class="mb-5 fv-row">
                                        <label
                                            for="name"
                                            class="required form-label fs-5"
                                            >Logo Apps</label
                                        >
                                        <div
                                            id="partner-dropzone"
                                            :key="dropzoneKey"
                                            class="dropzone border-dashed border-myprimary rounded p-5 text-center"
                                        >
                                            <div
                                                class="dz-message needsclick flex-column text-center gap-5 p-5"
                                            >
                                                <i
                                                    class="ri-image-add-line text-myprimary fs-3x"
                                                ></i>
                                                <div>
                                                    <h3
                                                        class="fs-5 fw-bold text-gray-900 mb-2"
                                                    >
                                                        Jatuhkan file di sini /
                                                        klik untuk mengunggah.
                                                    </h3>
                                                    <span
                                                        class="fs-7 fw-semibold text-gray-400"
                                                        >Maksimal 5 MB</span
                                                    >
                                                </div>
                                            </div>
                                        </div>
                                        <div
                                            v-if="form.errors.logo_app"
                                            class="text-mydanger mt-2"
                                        >
                                            {{ form.errors.logo_app }}
                                        </div>
                                    </div>
                                    <div class="mb-5 fv-row">
                                        <label
                                            for="name"
                                            class="required form-label fs-5"
                                            >Nama Aplikasi</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control fs-5"
                                            v-model="form.nama_app"
                                            required
                                            placeholder="Masukkan Title..."
                                        />
                                        <div
                                            v-if="form.errors.nama_app"
                                            class="text-mydanger mt-2"
                                        >
                                            {{ form.errors.nama_app }}
                                        </div>
                                    </div>

                                    <div class="fv-row">
                                        <label class="required form-label fs-5"
                                            >deskripsi</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control fs-5"
                                            v-model="form.deskripsi"
                                            required
                                            placeholder="Masukkan Subtitle..."
                                        />
                                        <div
                                            v-if="form.errors.deskripsi"
                                            class="text-mydanger mt-2"
                                        >
                                            {{ form.errors.deskripsi }}
                                        </div>
                                    </div>
                                    <div class="fv-row">
                                        <label class="required form-label fs-5"
                                            >Link Aplikasi</label
                                        >
                                        <input
                                            type="text"
                                            class="form-control fs-5"
                                            v-model="form.link"
                                            required
                                            placeholder="Masukkan Link Aplikasi..."
                                        />
                                        <div
                                            v-if="form.errors.link"
                                            class="text-mydanger mt-2"
                                        >
                                            {{ form.errors.link }}
                                        </div>
                                    </div>
                                    <div class="fv-row d-none">
                                        <input
                                            type="text"
                                            class="form-control fs-5"
                                            v-model="form.daerah_id"
                                            required
                                            placeholder="Masukkan Subtitle..."
                                        />
                                        <div
                                            v-if="form.errors.daerah_id"
                                            class="text-mydanger mt-2"
                                        >
                                            {{ form.errors.daerah_id }}
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
                                    Tambah Aplikasi
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
    </Daerah_Show>
</template>

<script setup>
import { Head, useForm, usePage, router, Link } from "@inertiajs/vue3";
import Swal from "sweetalert2";
import { ref, nextTick, watch, onMounted } from "vue";
import Dropzone from "dropzone";
import Daerah_Show from "../Daerah_Show.vue";
import route from "ziggy-js";

const page = usePage();

const { daerah } = defineProps({
    daerah: Object,
    apps: Object,
    errors: Object,
    flash: Object,
});

const dropzoneKey = ref(Date.now());
const dropzoneRef = ref(null);

const form = useForm({
    logo_app: "",
    nama_app: "",
    deskripsi: "",
    link: "",
    daerah_id: daerah.id,
});

const editing = ref(null);
const isEditMode = ref(false);

const destroy = (appId) => {
    Swal.fire({
        icon: "warning",
        title: "Apakah Anda yakin?",
        text: "Anda tidak akan dapat mengembalikan ini!",
        showCancelButton: true,
        confirmButtonText: "Hapus",
        cancelButtonText: "Batal",
        customClass: {
            popup: "swal-custom-icon",
            confirmButton: "btn btn-sm btn-primary",
            cancelButton: "btn btn-sm btn-danger",
        },
    }).then((result) => {
        if (result.isConfirmed) {
            router.visit(
                route("delete.app", { nama_daerah: daerah.nama_daerah }),
                {
                    method: "delete",
                    data: {
                        id: appId,
                    },
                    preserveScroll: true,
                    onSuccess: () => {
                        Swal.fire({
                            icon: "success",
                            title: "Dihapus!",
                            text: "Data berhasil dihapus!",
                            timer: 2000,
                            timerProgressBar: true,
                            showConfirmButton: false,
                            customClass: {
                                popup: "swal-custom-icon",
                            },
                        });
                        window.location.reload();
                    },
                    onError: (err) => {
                        console.error("Gagal menghapus:", err);
                        Swal.fire({
                            icon: "error",
                            title: "Gagal!",
                            text: "Gagal menghapus data.",
                            showConfirmButton: true,
                        });
                    },
                }
            );
        }
    });
};

const drawerCloseBtn = document.querySelector(
    "#kt_drawer_example_advanced_close"
);

if (drawerCloseBtn) drawerCloseBtn.click();
const openDrawer = async () => {
    dropzoneKey.value = Date.now();
    await nextTick();

    const drawerEl = document.querySelector("#kt_drawer_example_advanced");
    if (drawerEl && window.KTDrawer) {
        const drawer = KTDrawer.getInstance(drawerEl) || new KTDrawer(drawerEl);
        drawer.show();
    }
};

const resetForm = () => {
    form.logo_app = "";
    form.nama_app = "";
    form.deskripsi = "";
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

    const payload = new FormData();
    payload.append("nama_app", form.nama_app);
    payload.append("deskripsi", form.deskripsi);
    payload.append("daerah_id", form.daerah_id);
    if (
        form.logo_app &&
        (form.logo_app instanceof File || form.logo_app instanceof Blob)
    ) {
        payload.append("logo_app", form.logo_app);
    }

    const cleanup = () => {
        if (submitBtn) {
            submitBtn.removeAttribute("data-kt-indicator");
            submitBtn.removeAttribute("disabled");
        }
    };

    if (!form.logo_app) {
        Swal.fire({
            icon: "error",
            title: "Masukkan Inputan Yang Benar Pada Gambar",
            text: page.props.session.error,
            showConfirmButton: false,
            timer: 2000,
        });
        setTimeout(() => {
            window.location.reload();
        }, 100);
    }
    console.log(form);
    // console.log(route('anggotas.store'))
    if (isEditMode.value && editing.value) {
        payload.append("_method", "PUT");

        form.post(
            route("app.update", {
                nama_daerah: daerah.nama_daerah,
                app: editing.value.id, // pastikan ID app yang di-edit
            }),
            {
                preserveScroll: true,
                forceFormData: true,
                onSuccess: () => {
                    Swal.fire(
                        "Berhasil!",
                        "Data berhasil diperbarui!",
                        "success"
                    );
                    setTimeout(() => {
                        window.location.reload();
                    }, 100);
                    cleanup();
                    form.reset("");
                },
            }
        );
    } else {
        form.post(route("app.store", daerah.nama_daerah, payload), {
            forceFormData: true,
            onSuccess: () => {
                Swal.fire({
                    icon: "success",
                    title: "Berhasil",
                    text: page.props.success || "Data berhasil disimpan",
                    showConfirmButton: false,
                    timer: 2000,
                });
                setTimeout(() => {
                    window.location.reload();
                }, 100);
                form.reset();
            },
            onError: () => {
                Swal.fire({
                    icon: "error",
                    title: "Daerah Gagal Ditambah",
                    text: page.props.session.error,
                    showConfirmButton: false,
                    timer: 2000,
                });
                cleanup();
                form.reset();
            },
        });
    }
};

const editDaerah = (app) => {
    isEditMode.value = true;
    editing.value = app;

    form.nama_app = app.nama_app;
    form.logo_app = app.logo_app;
    form.link = app.link;
    form.deskripsi = app.deskripsi;

    openDrawer();
};

watch(dropzoneKey, () => {
    nextTick(() => {
        const dz = new Dropzone("#partner-dropzone", {
            url: "/",
            paramName: "bgimage",
            maxFiles: 1,
            maxFilesize: 10,
            acceptedFiles: "image/jpeg,image/png",
            autoProcessQueue: false,
            addRemoveLinks: true,
            dictRemoveFile: "Hapus",
            init: function () {
                this.on("addedfile", function (file) {
                    form.logo_app = file;
                });

                this.on("removedfile", function () {
                    form.logo_app = null;
                });

                dropzoneRef.value = this;

                if (isEditMode.value && editing.value?.logo_app) {
                    const mockFile = {
                        name: editing.value.logo_app.split("/").pop(),
                    };
                    this.emit("addedfile", mockFile);
                    this.emit(
                        "thumbnail",
                        mockFile,
                        `/storage/${editing.value.logo_app}`
                    );
                    this.emit("complete", mockFile);
                    mockFile.previewElement.classList.add(
                        "dz-success",
                        "dz-complete"
                    );
                }
            },
        });
    });
});
</script>

<style lang="scss" scoped></style>
