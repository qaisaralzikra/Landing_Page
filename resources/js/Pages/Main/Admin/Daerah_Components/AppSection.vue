<template>
    <Daerah_Show
        :daerah="daerah"
        :reset-form="resetForm"
        :open-drawer="openDrawer"
    >
        <div class="mt-10 mt-lg-8"></div>
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
                                            >Daerah Id</label
                                        >
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
                                    Tambah daerah
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
import { Head, useForm, usePage, router } from "@inertiajs/vue3";
import Swal from "sweetalert2";
import { ref, nextTick, watch, onMounted } from "vue";
import Dropzone from "dropzone";
import Daerah_Show from "../Daerah_Show.vue";
import route from "ziggy-js";

const page = usePage();

const { daerah } = defineProps({
    daerah: Object,
    hero: Object,
    errors: Object,
    flash: Object,
});

const dropzoneKey = ref(Date.now());
const dropzoneRef = ref(null);

const form = useForm({
    logo_app: "",
    nama_app: "",
    deskripsi: "",
    daerah_id: daerah.id,
});

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
    form.post(route("app.store", daerah.nama_daerah), payload, {
        forceFormData: true,
        onSuccess: () => {
            Swal.fire({
                icon: "success",
                title: "Berhasil",
                text: page.props.success || "Data berhasil disimpan",
                showConfirmButton: false,
                timer: 2000,
            });
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

                if (isEditMode.value && editing.value?.logo) {
                    const mockFile = {
                        name: editing.value.logo.split("/").pop(),
                    };
                    this.emit("addedfile", mockFile);
                    this.emit(
                        "thumbnail",
                        mockFile,
                        `/storage/${editing.value.logo}`
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
