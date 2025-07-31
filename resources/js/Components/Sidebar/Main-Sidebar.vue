<template>
    <div
        id="kt_app_sidebar"
        class="app-sidebar flex-column"
        data-kt-drawer="true"
        data-kt-drawer-name="app-sidebar"
        data-kt-drawer-activate="{default: true, lg: false}"
        data-kt-drawer-overlay="true"
        data-kt-drawer-width="268px"
        data-kt-drawer-direction="start"
        data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle"
    >
        <div
            class="app-sidebar-logo px-6 py-4 border-end border-gray-300"
            id="kt_app_sidebar_logo"
        >
            <Link href="/dashboard">
                <img
                    alt="Logo"
                    src="/public/assets/media/logos/afila-logo.svg"
                    class="h-40px w-95px app-sidebar-logo-default theme-light-show"
                />
                <img
                    alt="Logo"
                    src="/public/assets/media/logos/afila-logo.svg"
                    class="h-20px w-90px app-sidebar-logo-minimize"
                />
            </Link>
        </div>
        <div
            class="app-sidebar-menu overflow-y-scroll flex-column-fluid border-end border-gray-300"
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
                                active: $page.url.startsWith('/dashboard'),
                            }"
                            href="/dashboard"
                        >
                            <span class="menu-icon">
                                <i
                                    :class="[
                                        $page.url.startsWith('/dashboard')
                                            ? 'ri-dashboard-fill'
                                            : 'ri-dashboard-line',
                                        'fs-2',
                                    ]"
                                ></i>
                            </span>
                            <span
                                :class="[
                                    $page.url.startsWith('/dashboard')
                                        ? ['fw-bold', 'text-dark']
                                        : 'menu-title ',
                                    'fs-4',
                                ]"
                                >Dashboard</span
                            >
                        </Link>
                    </div>
                    <div class="menu-item">
                        <Link
                            class="menu-link menu-link-mysecondary"
                            :class="{
                                active: $page.url.startsWith('/daftarkab'),
                            }"
                            href="/daftarkab"
                        >
                            <span class="menu-icon">
                                <i
                                    :class="[
                                        $page.url.startsWith('/daftarkab')
                                            ? 'ri-bank-fill'
                                            : 'ri-bank-line',
                                        'fs-2',
                                    ]"
                                ></i>
                            </span>
                            <span
                                :class="[
                                    $page.url.startsWith('/daftarkab')
                                        ? ['fw-bold', 'text-dark']
                                        : 'menu-title',
                                    ' fs-4',
                                ]"
                                >Daftar Daerah</span
                            >
                        </Link>
                    </div>
                    <!-- Bagian Judul -->

                    <div v-if="post.length === 0" class="d-none menu-item pt-4">
                        <div class="menu-content py-1">
                            <span
                                class="text-gray-500 fw-semibold text-uppercase fs-7"
                                style="letter-spacing: 0.06em"
                            >
                                PORTAL
                            </span>
                        </div>
                    </div>
                    <div v-else class="menu-item pt-4">
                        <div class="menu-content py-1">
                            <span
                                class="text-gray-500 fw-semibold text-uppercase fs-7"
                                style="letter-spacing: 0.06em"
                            >
                                PORTAL
                            </span>
                        </div>
                    </div>

                    <!-- 5 Pertama -->
                    <div
                        class="menu-item"
                        v-for="daerah in post.slice(0, 5)"
                        :key="daerah.id"
                    >
                        <Link
                            class="menu-link menu-link-mysecondary d-flex flex-row align-items-center"
                            :class="{
                                active: $page.url.startsWith(
                                    `/daerah/${daerah.nama_daerah}/`
                                ),
                            }"
                            :href="
                                route('daerah.show.hero', daerah.nama_daerah)
                            "
                        >
                            <div class="w-20px h-20px me-4">
                                <img
                                    :src="`/storage/${daerah.logo_daerah}`"
                                    alt=""
                                />
                            </div>
                            <span
                                v-if="daerah.daerah === 'Kota'"
                                class="text-capitalize"
                                :class="[
                                    $page.url.startsWith(
                                        `/daerah/${daerah.nama_daerah}`
                                    )
                                        ? ['fw-bold', 'text-dark', '']
                                        : 'menu-title ',
                                    'fs-4',
                                ]"
                            >
                                Kota
                                {{ daerah.nama_daerah }}
                            </span>
                            <span
                                v-else-if="daerah.daerah === 'Kabupaten'"
                                class="text-capitalize"
                                :class="[
                                    $page.url.startsWith(
                                        `/daerah/${daerah.nama_daerah}`
                                    )
                                        ? ['fw-bold', 'text-dark', '']
                                        : 'menu-title ',
                                    'fs-4',
                                ]"
                            >
                                Kab.
                                {{ daerah.nama_daerah }}
                            </span>
                        </Link>
                    </div>

                    <!-- Menu Tambahan (lebih dari 5) -->
                    <div v-if="post.length > 5">
                        <div
                            class="menu-inner flex-column collapse"
                            id="kt_app_sidebar_menu_dashboards_collapse"
                        >
                            <div
                                class="menu-item"
                                v-for="daerah in post.slice(5)"
                                :key="daerah.id"
                            >
                                <Link
                                    class="menu-link menu-link-mysecondary d-flex flex-row align-items-center"
                                    :class="{
                                        active: $page.url.startsWith(
                                            `/daerah/${daerah.nama_daerah}`
                                        ),
                                    }"
                                    :href="
                                        route(
                                            'daerah.show.hero',
                                            daerah.nama_daerah
                                        )
                                    "
                                >
                                    <div class="w-20px h-20px me-4">
                                        <img
                                            :src="`/storage/${daerah.logo_daerah}`"
                                            alt=""
                                        />
                                    </div>
                                    <span
                                        v-if="daerah.daerah === 'Kota'"
                                        class="text-capitalize"
                                        :class="[
                                            $page.url.startsWith(
                                                `/daerah/${daerah.nama_daerah}`
                                            )
                                                ? ['fw-bold', 'text-dark', '']
                                                : 'menu-title ',
                                            'fs-4',
                                        ]"
                                    >
                                        Kota
                                        {{ daerah.nama_daerah }}
                                    </span>
                                    <span
                                        v-else-if="
                                            daerah.daerah === 'Kabupaten'
                                        "
                                        class="text-capitalize"
                                        :class="[
                                            $page.url.startsWith(
                                                `/daerah/${daerah.nama_daerah}`
                                            )
                                                ? ['fw-bold', 'text-dark', '']
                                                : 'menu-title ',
                                            'fs-4',
                                        ]"
                                    >
                                        Kab.
                                        {{ daerah.nama_daerah }}
                                    </span>
                                </Link>
                            </div>
                        </div>

                        <!-- Tombol Toggle -->
                        <a
                            class="btn btn-flex btn-color-primary fw-normal d-flex gap-2 fs-4 p-0 ms-4 mb-2 toggle collapsible collapsed"
                            data-bs-toggle="collapse"
                            href="#kt_app_sidebar_menu_dashboards_collapse"
                            data-kt-toggle-text="Sembunyikan"
                        >
                            <span class="svg-icon toggle-on svg-icon-2">
                                <i class="ri-subtract-line fs-4"></i>
                            </span>
                            <span class="svg-icon toggle-off svg-icon-2">
                                <i class="ri-add-line fs-4"></i>
                            </span>
                            <span data-kt-toggle-text-target="true"
                                >Lihat {{ post.length - 5 }} Lainnya</span
                            >
                        </a>
                    </div>

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
                                    'menu-title fs-4',
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
                                    'menu-title fs-4',
                                ]"
                                >Akun</span
                            >
                        </Link>
                    </div>
                    <!-- button -->
                    <div>
                        <button
                            @click="
                                () => {
                                    resetFormDaerah();
                                    openDrawerDaerah();
                                }
                            "
                            style="width: 90%"
                            class="mb-10 cursor-pointer mt-10 mx-auto menu-item py-10 border border-secondary border-dashed border-2 text-center rounded-2 d-flex flex-column flex-center justify-content-center"
                        >
                            <div>
                                <!--begin::Icon-->
                                <i
                                    style="font-size: 40px"
                                    class="ri-bank-fill text-primary"
                                ></i>

                                <div class="d-flex flex-column">
                                    <h5 class="mb-1 text-capitalize">
                                        tambah daerah
                                    </h5>

                                    <span
                                        class="textcapitalize fs-6 text-gray-600"
                                        >portal aplikasi</span
                                    >
                                </div>
                            </div>
                        </button>
                        <!-- <form @submit.prevent="submit" style="z-index: 1000">
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
                                            <h2>
                                                Tambah Daerah
                                            </h2>
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
                                            <div
                                                class="card border border-gray-300"
                                            >
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
                                                                        Jatuhkan
                                                                        file di
                                                                        sini /
                                                                        klik
                                                                        untuk
                                                                        mengunggah.
                                                                    </h3>
                                                                    <span
                                                                        class="fs-7 fw-semibold text-gray-400"
                                                                        >Maksimal
                                                                        5
                                                                        MB</span
                                                                    >
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div
                                                            v-if="
                                                                form.errors
                                                                    .logo_daerah
                                                            "
                                                            class="text-mydanger mt-2"
                                                        >
                                                            {{
                                                                form.errors
                                                                    .logo_daerah
                                                            }}
                                                        </div>
                                                    </div>
                                                    <div class="mb-5 fv-row">
                                                        <label
                                                            for="name"
                                                            class="required form-label fs-5"
                                                            >Nama Daerah</label
                                                        >
                                                        <div
                                                            class="d-flex flex-row"
                                                        >
                                                            <select
                                                                v-model="
                                                                    form.daerah
                                                                "
                                                                name=""
                                                                id=""
                                                                class="w-60px border-1 input-group border-secondary form-control bg-secondary"
                                                                style="
                                                                    border-radius: 2px
                                                                        0 0 2px;
                                                                "
                                                            >
                                                                <option
                                                                    value="Kabupaten"
                                                                    class="fs-5"
                                                                >
                                                                    Kab
                                                                </option>
                                                                <option
                                                                    value="Kota"
                                                                    class="fs-5"
                                                                >
                                                                    Kota
                                                                </option>
                                                            </select>
                                                            <input
                                                                type="text"
                                                                class="form-control"
                                                                style="
                                                                    border-radius: 0
                                                                        2px 2px
                                                                        0;
                                                                "
                                                                v-model="
                                                                    form.nama_daerah
                                                                "
                                                                placeholder="Masukkan nama daerah..."
                                                            />
                                                        </div>
                                                        <div
                                                            v-if="
                                                                form.errors
                                                                    .nama_daerah
                                                            "
                                                            class="text-mydanger mt-2"
                                                        >
                                                            {{
                                                                form.errors
                                                                    .name_daerah
                                                            }}
                                                        </div>
                                                    </div>

                                                    <div class="fv-row">
                                                        <label
                                                            class="required form-label fs-5"
                                                            >Deskripsi</label
                                                        >
                                                        <input
                                                            type="text"
                                                            class="form-control fs-5"
                                                            v-model="
                                                                form.deskripsi
                                                            "
                                                            required
                                                            placeholder="Masukkan deskripsi singkat..."
                                                        />
                                                        <div
                                                            v-if="
                                                                form.errors
                                                                    .deskripsi
                                                            "
                                                            class="text-mydanger mt-2"
                                                        >
                                                            {{
                                                                form.errors
                                                                    .deskripsi
                                                            }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="flex-grow-1">
                                            <div
                                                class="card border border-gray-300"
                                            >
                                                <div
                                                    class="card-header h-auto p-6 border-bottom border-gray-300"
                                                    style="min-height: unset"
                                                >
                                                    <div class="card-title m-0">
                                                        <h3>Sosial Media</h3>
                                                    </div>
                                                </div>
                                                <div
                                                    v-for="(
                                                        item, index
                                                    ) in form.sosial_media"
                                                    :key="index"
                                                    class="card-body px-6 pt-6 d-flex flex-column"
                                                >
                                                    <div
                                                        class="d-flex flex-row justify-content-between"
                                                    >
                                                        <label
                                                            class="required form-label fs-5"
                                                            >Link Sosial
                                                            Media</label
                                                        >
                                                        <button
                                                            class="text-danger fs-5 btn link-offset-3-hover"
                                                            type="button"
                                                            @click="
                                                                removeSosmeddaerah(
                                                                    index
                                                                )
                                                            "
                                                        >
                                                            Hapus
                                                        </button>
                                                    </div>
                                                    <div
                                                        class="fv-row d-flex flex-row mb-4 align-items-start"
                                                    >
                                                        
                                                        <div class="relative">
                                                            <button
                                                                type="button"
                                                                @click="
                                                                    toggleDropdowndaerah(
                                                                        index
                                                                    )
                                                                "
                                                                class="w-60px border-1 border-secondary form-control bg-secondary d-flex flex-row gap-2 align-items-center"
                                                                style="
                                                                    border-radius: 2px
                                                                        0 0 2px;
                                                                "
                                                            >
                                                                <span
                                                                    class="d-felx flex-row align-items-center gap-2"
                                                                >
                                                                    <span
                                                                        v-html="
                                                                            getIcondaerah(
                                                                                item.media_sosial
                                                                            )
                                                                        "
                                                                    ></span>
                                                                </span>
                                                                <span
                                                                    class="fs-7"
                                                                    >▼</span
                                                                >
                                                            </button>

                                                            <div
                                                                v-if="
                                                                    dropdownOpen ===
                                                                    index
                                                                "
                                                                class="absolute z-10 mt-1 w-60px bg-white border shadow max-h-60 overflow-auto"
                                                            >
                                                                <div
                                                                    v-for="option in socialOptions"
                                                                    :key="
                                                                        option.value
                                                                    "
                                                                    @click="
                                                                        selectOptiondaerah(
                                                                            index,
                                                                            option.value
                                                                        )
                                                                    "
                                                                    class="px-3 py-2 hover:bg-gray-100 cursor-pointer gap-2"
                                                                    style="
                                                                        justify-self: center;
                                                                    "
                                                                >
                                                                    <span
                                                                        v-html="
                                                                            getIcondaerah(
                                                                                option.value
                                                                            )
                                                                        "
                                                                    ></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <input
                                                            type="text"
                                                            class="form-control fs-5"
                                                            style="
                                                                border-radius: 0
                                                                    5px 5px 0;
                                                            "
                                                            v-model="
                                                                item.link_sosmed
                                                            "
                                                            required
                                                            :placeholder="
                                                                'Link untuk ' +
                                                                item.media_sosial
                                                            "
                                                        />
                                                    </div>
                                                </div>
                                                <div
                                                    style="
                                                        background-color: rgba(
                                                            59,
                                                            130,
                                                            246,
                                                            0.1
                                                        );
                                                        width: 90%;
                                                    "
                                                    class="text-center rounded-2 py-3 align-self-center mb-6"
                                                >
                                                    <button
                                                        type="button"
                                                        @click="addSosmeddaerah"
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
                                                    Tambah Daerah
                                                </span>
                                                <span
                                                    class="indicator-progress"
                                                >
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
                        </form> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { Head, useForm, usePage, router, Link } from "@inertiajs/vue3";
import Swal from "sweetalert2";
import { ref, nextTick, watch, onMounted } from "vue";
import Dropzone from "dropzone";
import route from "ziggy-js";

const dropzoneKey = ref(Date.now());
const dropzoneRef = ref(null);

const page = usePage();

const post = page.props.daerahs;

// const form = useForm({
//     logo_daerah: "",
//     nama_daerah: "",
//     daerah: "",
//     deskripsi: "",
//     sosial_media: [
//         {
//             media_sosial: "",
//             link_sosmed: "",
//         },
//     ],
// });

// // Dropdown logic
// const dropdownOpendaerah = ref(null); // index dropdown terbuka

// function toggleDropdowndaerah(index) {
//     dropdownOpen.value = dropdownOpen.value === index ? null : index;
// }

// function selectOptiondaerah(index, value) {
//     this.form.sosial_media[index].media_sosial = value;
//     this.dropdownOpen = null;
// }

// function addSosmeddaerah() {
//     form.sosial_media.push({ media_sosial: "", link_sosmed: "" });
// }

// function removeSosmeddaerah(index) {
//     form.sosial_media.splice(index, 1);
// }

// // Opsi dan ikon
// const socialOptionsdaerah = [
//     { value: "instagram", label: "Instagram" },
//     { value: "facebook", label: "Facebook" },
//     { value: "youtube", label: "YouTube" },
//     { value: "x", label: "X" },
//     { value: "email", label: "Email" },
// ];

// function getIcondaerah(value) {
//     switch (value) {
//         case "instagram":
//             return `<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="15px" height="15px" fill="currentColor"><path d="M12.001 9C10.3436 9 9.00098 10.3431 9.00098 12C9.00098 13.6573 10.3441 15 12.001 15C13.6583 15 15.001 13.6569 15.001 12C15.001 10.3427 13.6579 9 12.001 9ZM12.001 7C14.7614 7 17.001 9.2371 17.001 12C17.001 14.7605 14.7639 17 12.001 17C9.24051 17 7.00098 14.7629 7.00098 12C7.00098 9.23953 9.23808 7 12.001 7ZM18.501 6.74915C18.501 7.43926 17.9402 7.99917 17.251 7.99917C16.5609 7.99917 16.001 7.4384 16.001 6.74915C16.001 6.0599 16.5617 5.5 17.251 5.5C17.9393 5.49913 18.501 6.0599 18.501 6.74915ZM12.001 4C9.5265 4 9.12318 4.00655 7.97227 4.0578C7.18815 4.09461 6.66253 4.20007 6.17416 4.38967C5.74016 4.55799 5.42709 4.75898 5.09352 5.09255C4.75867 5.4274 4.55804 5.73963 4.3904 6.17383C4.20036 6.66332 4.09493 7.18811 4.05878 7.97115C4.00703 9.0752 4.00098 9.46105 4.00098 12C4.00098 14.4745 4.00753 14.8778 4.05877 16.0286C4.0956 16.8124 4.2012 17.3388 4.39034 17.826C4.5591 18.2606 4.7605 18.5744 5.09246 18.9064C5.42863 19.2421 5.74179 19.4434 6.17187 19.6094C6.66619 19.8005 7.19148 19.9061 7.97212 19.9422C9.07618 19.9939 9.46203 20 12.001 20C14.4755 20 14.8788 19.9934 16.0296 19.9422C16.8117 19.9055 17.3385 19.7996 17.827 19.6106C18.2604 19.4423 18.5752 19.2402 18.9074 18.9085C19.2436 18.5718 19.4445 18.2594 19.6107 17.8283C19.8013 17.3358 19.9071 16.8098 19.9432 16.0289C19.9949 14.9248 20.001 14.5389 20.001 12C20.001 9.52552 19.9944 9.12221 19.9432 7.97137C19.9064 7.18906 19.8005 6.66149 19.6113 6.17318C19.4434 5.74038 19.2417 5.42635 18.9084 5.09255C18.573 4.75715 18.2616 4.55693 17.8271 4.38942C17.338 4.19954 16.8124 4.09396 16.0298 4.05781C14.9258 4.00605 14.5399 4 12.001 4ZM12.001 2C14.7176 2 15.0568 2.01 16.1235 2.06C17.1876 2.10917 17.9135 2.2775 18.551 2.525C19.2101 2.77917 19.7668 3.1225 20.3226 3.67833C20.8776 4.23417 21.221 4.7925 21.476 5.45C21.7226 6.08667 21.891 6.81333 21.941 7.8775C21.9885 8.94417 22.001 9.28333 22.001 12C22.001 14.7167 21.991 15.0558 21.941 16.1225C21.8918 17.1867 21.7226 17.9125 21.476 18.55C21.2218 19.2092 20.8776 19.7658 20.3226 20.3217C19.7668 20.8767 19.2076 21.22 18.551 21.475C17.9135 21.7217 17.1876 21.89 16.1235 21.94C15.0568 21.9875 14.7176 22 12.001 22C9.28431 22 8.94514 21.99 7.87848 21.94C6.81431 21.8908 6.08931 21.7217 5.45098 21.475C4.79264 21.2208 4.23514 20.8767 3.67931 20.3217C3.12348 19.7658 2.78098 19.2067 2.52598 18.55C2.27848 17.9125 2.11098 17.1867 2.06098 16.1225C2.01348 15.0558 2.00098 14.7167 2.00098 12C2.00098 9.28333 2.01098 8.94417 2.06098 7.8775C2.11014 6.8125 2.27848 6.0875 2.52598 5.45C2.78014 4.79167 3.12348 4.23417 3.67931 3.67833C4.23514 3.1225 4.79348 2.78 5.45098 2.525C6.08848 2.2775 6.81348 2.11 7.87848 2.06C8.94514 2.0125 9.28431 2 12.001 2Z"></path></svg>`;
//         case "facebook":
//             return `<svg xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" viewBox="0 0 24 24" fill="currentColor"><path d="M13.001 19.9381C16.9473 19.446 20.001 16.0796 20.001 12C20.001 7.58172 16.4193 4 12.001 4C7.5827 4 4.00098 7.58172 4.00098 12C4.00098 16.0796 7.05467 19.446 11.001 19.9381V14H9.00098V12H11.001V10.3458C11.001 9.00855 11.1402 8.52362 11.4017 8.03473C11.6631 7.54584 12.0468 7.16216 12.5357 6.9007C12.9184 6.69604 13.3931 6.57252 14.2227 6.51954C14.5519 6.49851 14.9781 6.52533 15.501 6.6V8.5H15.001C14.0837 8.5 13.7052 8.54332 13.4789 8.66433C13.3386 8.73939 13.2404 8.83758 13.1653 8.97793C13.0443 9.20418 13.001 9.42853 13.001 10.3458V12H15.501L15.001 14H13.001V19.9381ZM12.001 22C6.47813 22 2.00098 17.5228 2.00098 12C2.00098 6.47715 6.47813 2 12.001 2C17.5238 2 22.001 6.47715 22.001 12C22.001 17.5228 17.5238 22 12.001 22Z"></path></svg>`;
//         case "youtube":
//             return `<svg xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" viewBox="0 0 24 24" fill="currentColor"><path d="M19.6069 6.99482C19.5307 6.69695 19.3152 6.47221 19.0684 6.40288C18.6299 6.28062 16.501 6 12.001 6C7.50098 6 5.37252 6.28073 4.93225 6.40323C4.68776 6.47123 4.4723 6.69593 4.3951 6.99482C4.2863 7.41923 4.00098 9.19595 4.00098 12C4.00098 14.804 4.2863 16.5808 4.3954 17.0064C4.47126 17.3031 4.68676 17.5278 4.93251 17.5968C5.37252 17.7193 7.50098 18 12.001 18C16.501 18 18.6299 17.7194 19.0697 17.5968C19.3142 17.5288 19.5297 17.3041 19.6069 17.0052C19.7157 16.5808 20.001 14.8 20.001 12C20.001 9.2 19.7157 7.41923 19.6069 6.99482ZM21.5442 6.49818C22.001 8.28 22.001 12 22.001 12C22.001 12 22.001 15.72 21.5442 17.5018C21.2897 18.4873 20.547 19.2618 19.6056 19.5236C17.8971 20 12.001 20 12.001 20C12.001 20 6.10837 20 4.39637 19.5236C3.45146 19.2582 2.70879 18.4836 2.45774 17.5018C2.00098 15.72 2.00098 12 2.00098 12C2.00098 12 2.00098 8.28 2.45774 6.49818C2.71227 5.51273 3.45495 4.73818 4.39637 4.47636C6.10837 4 12.001 4 12.001 4C12.001 4 17.8971 4 19.6056 4.47636C20.5505 4.74182 21.2932 5.51636 21.5442 6.49818ZM10.001 15.5V8.5L16.001 12L10.001 15.5Z"></path></svg>`;
//         case "x":
//             return `<svg xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" viewBox="0 0 24 24" fill="currentColor"><path d="M17.6874 3.0625L12.6907 8.77425L8.37045 3.0625H2.11328L9.58961 12.8387L2.50378 20.9375H5.53795L11.0068 14.6886L15.7863 20.9375H21.8885L14.095 10.6342L20.7198 3.0625H17.6874ZM16.6232 19.1225L5.65436 4.78217H7.45745L18.3034 19.1225H16.6232Z"></path></svg>`;
//         case "email":
//             return `<svg xmlns="http://www.w3.org/2000/svg" width="15px" height="15px" viewBox="0 0 24 24" fill="currentColor"><path d="M3 3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3ZM20 7.23792L12.0718 14.338L4 7.21594V19H20V7.23792ZM4.51146 5L12.0619 11.662L19.501 5H4.51146Z"></path></svg>`;
//         default:
//             return "❔";
//     }
// }

// const drawerCloseBtndaerah = document.querySelector(
//     "#kt_drawer_example_advanced_close"
// );

// if (drawerCloseBtndaerah) drawerCloseBtndaerah.click();
// const openDrawerDaerah = async () => {
//     dropzoneKey.value = Date.now();
//     await nextTick();

//     const drawerElDaerah = document.querySelector(
//         "#kt_drawer_example_advanced"
//     );
//     if (drawerElDaerah && window.KTDrawer) {
//         const drawer =
//             KTDrawer.getInstance(drawerElDaerah) ||
//             new KTDrawer(drawerElDaerah);
//         drawer.show();
//     }
// };

// const resetFormDaerah = () => {
//     form.logo_daerah = "";
//     form.nama_daerah = "";
//     form.daerah = "";
//     form.deskripsi = "";

//     if (dropzoneRef.value) {
//         dropzoneRef.value.removeAllFiles(true);
//     }

//     const drawerCloseBtnDaerah = document.querySelector(
//         "#kt_drawer_example_advanced_close"
//     );
//     if (drawerCloseBtnDaerah) drawerCloseBtnDaerah.click();
// };

// const submit = () => {
//     const submitBtn = document.querySelector("#kt_drawer_submit_button");
//     if (submitBtn) {
//         submitBtn.setAttribute("data-kt-indicator", "on");
//         submitBtn.setAttribute("disabled", true);
//     }

//     const payload = new FormData();
//     payload.append("nama_daerah", form.name);
//     payload.append("daerah", form.link);
//     if (
//         form.logo_daerah &&
//         (form.logo_daerah instanceof File || form.logo_daerah instanceof Blob)
//     ) {
//         payload.append("logo_daerah", form.logo_daerah);
//     }

//     const cleanup = () => {
//         if (submitBtn) {
//             submitBtn.removeAttribute("data-kt-indicator");
//             submitBtn.removeAttribute("disabled");
//         }
//     };

//     if (!form.logo_daerah) {
//         Swal.fire({
//             icon: "error",
//             title: "Masukkan Inputan Yang Benar Pada Gambar",
//             text: page.props.session.success,
//             showConfirmButton: false,
//             timer: 2000,
//         });
//         setTimeout(() => {
//             window.location.reload();
//         }, 500);
//         cleanup();
//         form.reset("");
//     }
//     if (!form.daerah) {
//         Swal.fire({
//             icon: "error",
//             title: "Masukkan Inputan Yang Benar Pada Dropdown Daerah",
//             text: page.props.session.success,
//             showConfirmButton: false,
//             timer: 2000,
//         });
//         setTimeout(() => {
//             window.location.reload();
//         }, 500);
//         cleanup();
//         form.reset("");
//     }
//     if (!form.nama_daerah) {
//         Swal.fire({
//             icon: "error",
//             title: "Masukkan Inputan Yang Benar Pada Nama Daerah",
//             text: page.props.session.success,
//             showConfirmButton: false,
//             timer: 2000,
//         });
//         setTimeout(() => {
//             window.location.reload();
//         }, 500);
//         cleanup();
//         form.reset("");
//     }
//     if (!form.deskripsi) {
//         Swal.fire({
//             icon: "error",
//             title: "Masukkan Inputan Yang Benar Pada Deskripsi",
//             text: page.props.session.success,
//             showConfirmButton: false,
//             timer: 2000,
//         });
//         setTimeout(() => {
//             window.location.reload();
//         }, 500);
//         cleanup();
//         form.reset("");
//     }
//     console.log(form);
//     // console.log(route('anggotas.store'))
//         form.post(route("daerah.store", payload), {
//             forceFormData: true,
//             onSuccess: () => {
//                 Swal.fire({
//                     icon: "success",
//                     title: "Daerah Berhasil Ditambah",
//                     text: page.props.session.success,
//                     showConfirmButton: false,
//                     timer: 2000,
//                 });
//                 setTimeout(() => {
//                     window.location.reload();
//                 }, 100);
//                 cleanup();
//                 form.reset("");
//             },
//         });
//     }

// watch(dropzoneKey, () => {
//     nextTick(() => {
//         const dz = new Dropzone("#partner-dropzone", {
//             url: "/",
//             paramName: "logo_daerah",
//             maxFiles: 1,
//             maxFilesize: 10,
//             acceptedFiles: "image/jpeg,image/png",
//             autoProcessQueue: false,
//             addRemoveLinks: true,
//             dictRemoveFile: "Hapus",
//             init: function () {
//                 this.on("addedfile", function (file) {
//                     form.logo_daerah = file;
//                 });

//                 this.on("removedfile", function () {
//                     form.logo_daerah = null;
//                 });

//                 dropzoneRef.value = this;
//             },
//         });
//     });
// });
</script>

<style>
.menu-link-mysecondary:hover {
    background-color: #3b82f61a; /* Bootstrap light */
}

.menu-link-mysecondary:hover .menu-title,
.menu-link-mysecondary:hover .menu-icon i {
    color: #000000;

    /* Bootstrap primary */
}

.menu-title {
    font-family: "NunitoSans", sans-serif;
    font-weight: 600;
}

.menu-link-mysecondary,
.menu-link-mysecondary .menu-title,
.menu-link-mysecondary .menu-icon i {
    transition: all 0.1s ease-in-out;
    color: #3c3c43bf;
}

.menu-link.active {
    background-color: #3b82f61a; /* abu lebih gelap */
    color: #000000;
}
</style>
