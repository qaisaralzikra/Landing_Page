<template>
    <form @submit.prevent="submit" style="z-index: 1000">
        <div
            id="kt_drawer_daerah"
            class="drawer drawer-end"
            data-kt-drawer="true"
            data-kt-drawer-name="daerah"
            data-kt-drawer-activate="true"
            data-kt-drawer-overlay="true"
            data-kt-drawer-width="450px"
            data-kt-drawer-direction="end"
            data-kt-drawer-toggle="#openDrawerDaerah"
            data-kt-drawer-close="#closeDrawerDaerah"
        >
            <div class="card w-100 rounded-0">
                <div
                    class="card-header ps-6 pe-3 h-60px border-bottom border-gray-300 h-60px h-lg-70px"
                >
                    <div class="card-title">
                        <h2>Tambah Partner</h2>
                    </div>
                    <div class="card-toolbar" id="closeDrawerDaerah">
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
                                        >Logo Daerah</label
                                    >
                                    <div
                                        id="partner-dropzone"
                                        class="dropzone border-dashed border-myprimary rounded p-5 text-center"
                                    >
                                        <div
                                            class="dz-message needsclick flex-column text-center gap-5 p-5"
                                        >
                                            <i
                                                class="ri-image-add-line text-primary fs-3x"
                                            ></i>
                                            <div>
                                                <h3
                                                    class="fs-5 fw-bold text-gray-900 mb-2"
                                                >
                                                    Jatuhkan file di sini / klik
                                                    untuk mengunggah.
                                                </h3>
                                                <span
                                                    class="fs-7 fw-semibold text-gray-400"
                                                    >Maksimal 5 MB</span
                                                >
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        v-if="form.errors.logo_daerah"
                                        class="text-mydanger mt-2"
                                    >
                                        {{ form.errors.logo_daerah }}
                                    </div>
                                </div>
                                <div class="mb-5 fv-row">
                                    <label
                                        for="name"
                                        class="required form-label fs-5"
                                        >Nama Daerah</label
                                    >
                                    <div class="d-flex flex-row">
                                        <select
                                            v-model="form.daerah"
                                            name=""
                                            id=""
                                            class="w-60px border-1 input-group border-secondary form-control bg-secondary"
                                            style="border-radius: 2px 0 0 2px"
                                        >
                                            <option
                                                value="Kabupaten"
                                                class="fs-5"
                                            >
                                                Kab
                                            </option>
                                            <option value="Kota" class="fs-5">
                                                Kota
                                            </option>
                                        </select>
                                        <input
                                            type="text"
                                            class="form-control"
                                            style="border-radius: 0 2px 2px 0"
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
                    <div class="flex-grow-1">
                        <div class="card border border-gray-300">
                            <div
                                class="card-header h-auto p-6 border-bottom border-gray-300"
                                style="min-height: unset"
                            >
                                <div class="card-title m-0">
                                    <h3>Sosial Media</h3>
                                </div>
                            </div>
                            <div
                                v-for="(item, index) in form.sosial_media"
                                :key="index"
                                class="card-body px-6 pt-6 d-flex flex-column"
                            >
                                <div
                                    class="d-flex flex-row justify-content-between"
                                >
                                    <label class="required form-label fs-5"
                                        >Link Sosial Media</label
                                    >
                                    <button
                                        class="text-danger fs-5 btn link-offset-3-hover"
                                        type="button"
                                        @click="removeSosmed(index)"
                                    >
                                        Hapus
                                    </button>
                                </div>
                                <div
                                    class="fv-row d-flex flex-row mb-4 align-items-start"
                                >
                                    <!-- Custom Dropdown -->
                                    <div class="relative">
                                        <button
                                            type="button"
                                            @click="toggleDropdown(index)"
                                            class="w-60px border-1 border-secondary form-control bg-secondary d-flex flex-row gap-2 align-items-center"
                                            style="border-radius: 2px 0 0 2px"
                                        >
                                            <span
                                                class="d-felx flex-row align-items-center gap-2"
                                            >
                                                <span
                                                    v-html="
                                                        getIcon(
                                                            item.media_sosial
                                                        )
                                                    "
                                                ></span>
                                            </span>
                                            <span class="fs-7">▼</span>
                                        </button>

                                        <div
                                            v-if="dropdownOpen === index"
                                            class="absolute z-10 mt-1 w-60px bg-white border shadow max-h-60 overflow-auto"
                                        >
                                            <div
                                                v-for="option in socialOptions"
                                                :key="option.value"
                                                @click="
                                                    selectOption(
                                                        index,
                                                        option.value
                                                    )
                                                "
                                                class="px-3 py-2 hover:bg-gray-100 cursor-pointer gap-2"
                                                style="justify-self: center"
                                            >
                                                <span
                                                    v-html="
                                                        getIcon(option.value)
                                                    "
                                                ></span>
                                            </div>
                                        </div>
                                    </div>
                                    <input
                                        type="text"
                                        class="form-control fs-5"
                                        style="border-radius: 0 5px 5px 0"
                                        v-model="item.link_sosmed"
                                        required
                                        :placeholder="
                                            'Link untuk ' + item.media_sosial
                                        "
                                    />
                                </div>
                            </div>
                            <div
                                style="
                                    background-color: rgba(59, 130, 246, 0.1);
                                    width: 90%;
                                "
                                class="text-center rounded-2 py-3 align-self-center mb-6"
                            >
                                <button
                                    type="button"
                                    @click="addSosmed"
                                    class="text-primary fs-4 fw-bold rounded-2"
                                >
                                    + Tambah Sosmed
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button
                            type="reset"
                            class="btn btn-sm btn-danger fs-5 me-3"
                            id="kt_drawer_example_advanced_close"
                        >
                            Batal
                        </button>
                        <button
                            type="submit"
                            id="kt_drawer_submit_button"
                            class="btn btn-sm btn-primary fs-5"
                        >
                            <span class="indicator-label"> Tambah Daerah </span>
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
import { ref, onMounted, watch, nextTick } from "vue";
import { Head, useForm, usePage, router, Link } from "@inertiajs/vue3";
import Dropzone from "dropzone";
import "dropzone/dist/dropzone.css";

const showDrawer = ref(false);
const dropzoneRef = ref(null);

const page = usePage();

const form = useForm({
    logo_daerah: "",
    nama_daerah: "",
    daerah: "",
    deskripsi: "",
    sosial_media: [
        {
            media_sosial: "",
            link_sosmed: "",
        },
    ],
});

// Fungsi global agar bisa dipanggil dari Sidebar
window.openDrawerDaerah = () => {
    showDrawer.value = true;
};

// Dropdown logic
const dropdownOpen = ref(null); // index dropdown terbuka

function toggleDropdown(index) {
    dropdownOpen.value = dropdownOpen.value === index ? null : index;
}

function selectOption(index, value) {
    this.form.sosial_media[index].media_sosial = value;
    this.dropdownOpen = null;
}

function addSosmed() {
    form.sosial_media.push({ media_sosial: "", link_sosmed: "" });
}

function removeSosmed(index) {
    form.sosial_media.splice(index, 1);
}

// Opsi dan ikon
const socialOptions = [
    { value: "instagram", label: "Instagram" },
    { value: "facebook", label: "Facebook" },
    { value: "youtube", label: "YouTube" },
    { value: "x", label: "X" },
    { value: "email", label: "Email" },
];

function getIcon(value) {
    switch (value) {
        case "instagram":
            return `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="15px" height="15px" fill="currentColor"><path d="M12.001 9C10.3436 9 9.00098 10.3431 9.00098 12C9.00098 13.6573 10.3441 15 12.001 15C13.6583 15 15.001 13.6569 15.001 12C15.001 10.3427 13.6579 9 12.001 9ZM12.001 7C14.7614 7 17.001 9.2371 17.001 12C17.001 14.7605 14.7639 17 12.001 17C9.24051 17 7.00098 14.7629 7.00098 12C7.00098 9.23953 9.23808 7 12.001 7ZM18.501 6.74915C18.501 7.43926 17.9402 7.99917 17.251 7.99917C16.5609 7.99917 16.001 7.4384 16.001 6.74915C16.001 6.0599 16.5617 5.5 17.251 5.5C17.9393 5.49913 18.501 6.0599 18.501 6.74915ZM12.001 4C9.5265 4 9.12318 4.00655 7.97227 4.0578C7.18815 4.09461 6.66253 4.20007 6.17416 4.38967C5.74016 4.55799 5.42709 4.75898 5.09352 5.09255C4.75867 5.4274 4.55804 5.73963 4.3904 6.17383C4.20036 6.66332 4.09493 7.18811 4.05878 7.97115C4.00703 9.0752 4.00098 9.46105 4.00098 12C4.00098 14.4745 4.00753 14.8778 4.05877 16.0286C4.0956 16.8124 4.2012 17.3388 4.39034 17.826C4.5591 18.2606 4.7605 18.5744 5.09246 18.9064C5.42863 19.2421 5.74179 19.4434 6.17187 19.6094C6.66619 19.8005 7.19148 19.9061 7.97212 19.9422C9.07618 19.9939 9.46203 20 12.001 20C14.4755 20 14.8788 19.9934 16.0296 19.9422C16.8117 19.9055 17.3385 19.7996 17.827 19.6106C18.2604 19.4423 18.5752 19.2402 18.9074 18.9085C19.2436 18.5718 19.4445 18.2594 19.6107 17.8283C19.8013 17.3358 19.9071 16.8098 19.9432 16.0289C19.9949 14.9248 20.001 14.5389 20.001 12C20.001 9.52552 19.9944 9.12221 19.9432 7.97137C19.9064 7.18906 19.8005 6.66149 19.6113 6.17318C19.4434 5.74038 19.2417 5.42635 18.9084 5.09255C18.573 4.75715 18.2616 4.55693 17.8271 4.38942C17.338 4.19954 16.8124 4.09396 16.0298 4.05781C14.9258 4.00605 14.5399 4 12.001 4ZM12.001 2C14.7176 2 15.0568 2.01 16.1235 2.06C17.1876 2.10917 17.9135 2.2775 18.551 2.525C19.2101 2.77917 19.7668 3.1225 20.3226 3.67833C20.8776 4.23417 21.221 4.7925 21.476 5.45C21.7226 6.08667 21.891 6.81333 21.941 7.8775C21.9885 8.94417 22.001 9.28333 22.001 12C22.001 14.7167 21.991 15.0558 21.941 16.1225C21.8918 17.1867 21.7226 17.9125 21.476 18.55C21.2218 19.2092 20.8776 19.7658 20.3226 20.3217C19.7668 20.8767 19.2076 21.22 18.551 21.475C17.9135 21.7217 17.1876 21.89 16.1235 21.94C15.0568 21.9875 14.7176 22 12.001 22C9.28431 22 8.94514 21.99 7.87848 21.94C6.81431 21.8908 6.08931 21.7217 5.45098 21.475C4.79264 21.2208 4.23514 20.8767 3.67931 20.3217C3.12348 19.7658 2.78098 19.2067 2.52598 18.55C2.27848 17.9125 2.11098 17.1867 2.06098 16.1225C2.01348 15.0558 2.00098 14.7167 2.00098 12C2.00098 9.28333 2.01098 8.94417 2.06098 7.8775C2.11014 6.8125 2.27848 6.0875 2.52598 5.45C2.78014 4.79167 3.12348 4.23417 3.67931 3.67833C4.23514 3.1225 4.79348 2.78 5.45098 2.525C6.08848 2.2775 6.81348 2.11 7.87848 2.06C8.94514 2.0125 9.28431 2 12.001 2Z"></path></svg>`;
        case "facebook":
            return `<svg xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" viewBox="0 0 24 24" fill="currentColor"><path d="M13.001 19.9381C16.9473 19.446 20.001 16.0796 20.001 12C20.001 7.58172 16.4193 4 12.001 4C7.5827 4 4.00098 7.58172 4.00098 12C4.00098 16.0796 7.05467 19.446 11.001 19.9381V14H9.00098V12H11.001V10.3458C11.001 9.00855 11.1402 8.52362 11.4017 8.03473C11.6631 7.54584 12.0468 7.16216 12.5357 6.9007C12.9184 6.69604 13.3931 6.57252 14.2227 6.51954C14.5519 6.49851 14.9781 6.52533 15.501 6.6V8.5H15.001C14.0837 8.5 13.7052 8.54332 13.4789 8.66433C13.3386 8.73939 13.2404 8.83758 13.1653 8.97793C13.0443 9.20418 13.001 9.42853 13.001 10.3458V12H15.501L15.001 14H13.001V19.9381ZM12.001 22C6.47813 22 2.00098 17.5228 2.00098 12C2.00098 6.47715 6.47813 2 12.001 2C17.5238 2 22.001 6.47715 22.001 12C22.001 17.5228 17.5238 22 12.001 22Z"></path></svg>`;
        case "youtube":
            return `<svg xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" viewBox="0 0 24 24" fill="currentColor"><path d="M19.6069 6.99482C19.5307 6.69695 19.3152 6.47221 19.0684 6.40288C18.6299 6.28062 16.501 6 12.001 6C7.50098 6 5.37252 6.28073 4.93225 6.40323C4.68776 6.47123 4.4723 6.69593 4.3951 6.99482C4.2863 7.41923 4.00098 9.19595 4.00098 12C4.00098 14.804 4.2863 16.5808 4.3954 17.0064C4.47126 17.3031 4.68676 17.5278 4.93251 17.5968C5.37252 17.7193 7.50098 18 12.001 18C16.501 18 18.6299 17.7194 19.0697 17.5968C19.3142 17.5288 19.5297 17.3041 19.6069 17.0052C19.7157 16.5808 20.001 14.8 20.001 12C20.001 9.2 19.7157 7.41923 19.6069 6.99482ZM21.5442 6.49818C22.001 8.28 22.001 12 22.001 12C22.001 12 22.001 15.72 21.5442 17.5018C21.2897 18.4873 20.547 19.2618 19.6056 19.5236C17.8971 20 12.001 20 12.001 20C12.001 20 6.10837 20 4.39637 19.5236C3.45146 19.2582 2.70879 18.4836 2.45774 17.5018C2.00098 15.72 2.00098 12 2.00098 12C2.00098 12 2.00098 8.28 2.45774 6.49818C2.71227 5.51273 3.45495 4.73818 4.39637 4.47636C6.10837 4 12.001 4 12.001 4C12.001 4 17.8971 4 19.6056 4.47636C20.5505 4.74182 21.2932 5.51636 21.5442 6.49818ZM10.001 15.5V8.5L16.001 12L10.001 15.5Z"></path></svg>`;
        case "x":
            return `<svg xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" viewBox="0 0 24 24" fill="currentColor"><path d="M17.6874 3.0625L12.6907 8.77425L8.37045 3.0625H2.11328L9.58961 12.8387L2.50378 20.9375H5.53795L11.0068 14.6886L15.7863 20.9375H21.8885L14.095 10.6342L20.7198 3.0625H17.6874ZM16.6232 19.1225L5.65436 4.78217H7.45745L18.3034 19.1225H16.6232Z"></path></svg>`;
        case "email":
            return `<svg xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" viewBox="0 0 24 24" fill="currentColor"><path d="M3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM20 7.23792L12.0718 14.338L4 7.21594V19H20V7.23792ZM4.51146 5L12.0619 11.662L19.501 5H4.51146Z"></path></svg>`;
        default:
            return "❔";
    }
}

const submit = () => {
    const submitBtn = document.querySelector("#kt_drawer_submit_button");
    if (submitBtn) {
        submitBtn.setAttribute("data-kt-indicator", "on");
        submitBtn.setAttribute("disabled", true);
    }

    const payload = new FormData();
    payload.append("nama_daerah", form.name);
    payload.append("daerah", form.link);
    if (
        form.logo_daerah &&
        (form.logo_daerah instanceof File || form.logo_daerah instanceof Blob)
    ) {
        payload.append("logo_daerah", form.logo_daerah);
    }

    const cleanup = () => {
        if (submitBtn) {
            submitBtn.removeAttribute("data-kt-indicator");
            submitBtn.removeAttribute("disabled");
        }
    };

    if (!form.logo_daerah) {
        Swal.fire({
            icon: "error",
            title: "Masukkan Inputan Yang Benar Pada Gambar",
            text: page.props.session.success,
            showConfirmButton: false,
            timer: 2000,
        });
        setTimeout(() => {
            window.location.reload();
        }, 500);
        cleanup();
        form.reset("");
    }
    if (!form.daerah) {
        Swal.fire({
            icon: "error",
            title: "Masukkan Inputan Yang Benar Pada Dropdown Daerah",
            text: page.props.session.success,
            showConfirmButton: false,
            timer: 2000,
        });
        setTimeout(() => {
            window.location.reload();
        }, 500);
        cleanup();
        form.reset("");
    }
    if (!form.nama_daerah) {
        Swal.fire({
            icon: "error",
            title: "Masukkan Inputan Yang Benar Pada Nama Daerah",
            text: page.props.session.success,
            showConfirmButton: false,
            timer: 2000,
        });
        setTimeout(() => {
            window.location.reload();
        }, 500);
        cleanup();
        form.reset("");
    }
    if (!form.deskripsi) {
        Swal.fire({
            icon: "error",
            title: "Masukkan Inputan Yang Benar Pada Deskripsi",
            text: page.props.session.success,
            showConfirmButton: false,
            timer: 2000,
        });
        setTimeout(() => {
            window.location.reload();
        }, 500);
        cleanup();
        form.reset("");
    }
    console.log(form);
    // console.log(route('anggotas.store'))

    form.post(route("daerah.store", payload), {
        forceFormData: true,
        onSuccess: () => {
            Swal.fire({
                icon: "success",
                title: "Daerah Berhasil Ditambah",
                text: page.props.session.success,
                showConfirmButton: false,
                timer: 2000,
            });
            setTimeout(() => {
                window.location.reload();
            }, 100);
            cleanup();
            form.reset("");
        },
    });
};

onMounted(() => {
    const drawerEl = document.getElementById("kt_drawer_daerah");
    if (drawerEl && typeof KTDrawer !== "undefined") {
        new KTDrawer(drawerEl);
    }
});

watch(showDrawer, async (visible) => {
    const drawer = document.getElementById("kt_drawer_daerah");
    const instance = KTDrawer.getInstance(drawer);

    if (visible) {
        instance?.show();

        await nextTick(); // pastikan DOM sudah ter-render

        // Hindari re-inisialisasi Dropzone
        if (!dropzoneRef.value) {
            const dz = new Dropzone("#partner-dropzone", {
                url: "/",
                paramName: "logo_daerah",
                maxFiles: 1,
                maxFilesize: 10,
                acceptedFiles: "image/jpeg,image/png",
                autoProcessQueue: false,
                addRemoveLinks: true,
                dictRemoveFile: "Hapus",
                init: function () {
                    this.on("addedfile", (file) => {
                        form.value.logo_daerah = file;
                    });

                    this.on("removedfile", () => {
                        form.value.logo_daerah = null;
                    });

                    // Tampilkan file lama jika sedang edit
                    if (isEditMode.value && editing.value?.logo_daerah) {
                        const mockFile = {
                            name: editing.value.logo_daerah.split("/").pop(),
                            size: 12345,
                        };
                        this.emit("addedfile", mockFile);
                        this.emit(
                            "thumbnail",
                            mockFile,
                            `/storage/${editing.value.logo_daerah}`
                        );
                        this.emit("complete", mockFile);
                        mockFile.previewElement.classList.add(
                            "dz-success",
                            "dz-complete"
                        );
                    }

                    dropzoneRef.value = this;
                },
            });
        } else {
            // Reset jika Dropzone sudah pernah dibuat sebelumnya
            dropzoneRef.value.removeAllFiles(true);

            // Tambah ulang file edit jika sedang edit
            if (isEditMode.value && editing.value?.logo_daerah) {
                const mockFile = {
                    name: editing.value.logo_daerah.split("/").pop(),
                    size: 12345,
                };
                dropzoneRef.value.emit("addedfile", mockFile);
                dropzoneRef.value.emit(
                    "thumbnail",
                    mockFile,
                    `/storage/${editing.value.logo_daerah}`
                );
                dropzoneRef.value.emit("complete", mockFile);
                mockFile.previewElement.classList.add(
                    "dz-success",
                    "dz-complete"
                );
            }
        }
    } else {
        instance?.hide();
        dropzoneRef.value?.removeAllFiles(true);
        form.value.logo_daerah = null;
    }
});
</script>
