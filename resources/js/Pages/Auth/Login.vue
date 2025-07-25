<template>
    <Head>
        <title>Administrator - Portal Daerah</title>
    </Head>
    <div class="d-flex flex-row">
        <form @submit.prevent="submit" class="w-50 m-auto mx-20" id="kt_sign_in_form">
            <div class="text-center mb-11">
                <h1 class="text-dark fs-2hx fw-bolder mb-4">Hello Admin 👋</h1>
                <div class="text-gray-600 fw-semibold fs-4">
                    Masuk untuk mengelola halaman Portal Daerah
                </div>
            </div>
            <div class="fv-row mb-4">
                <input
                    type="email"
                    placeholder="Alamat Email"
                    name="email"
                    autocomplete="off"
                    v-model="form.email"
                    class="form-control fs-5"
                    :class="{ 'is-invalid': form.errors.email }"
                />
                <div v-if="form.errors.email" class="text-danger mt-2">
                    {{ form.errors.email }}
                </div>
            </div>
            <div class="fv-row mb-7">
                <input
                    type="password"
                    placeholder="Kata Sandi"
                    name="password"
                    autocomplete="off"
                    v-model="form.password"
                    class="form-control fs-5"
                    :class="{ 'is-invalid': form.errors.password }"
                />
                <div v-if="form.errors.password" class="text-danger mt-2">
                    {{ form.errors.password }}
                </div>
            </div>
            <div class="d-grid mb-10">
                <button
                    type="submit"
                    id="kt_sign_in_submit"
                    class="btn btn-primary fs-5"
                >
                    <span class="indicator-label">Masuk</span>
                    <span class="indicator-progress"
                        >Mohon tunggu...
                        <span
                            class="spinner-border spinner-border-sm align-middle ms-2"
                        ></span
                    ></span>
                </button>
            </div>
        </form>
        <div class="col col-6 bgimage" style="width: 60%; height: 100vh;">
        </div>
    </div>
</template>

<script setup>
import { Head, Link, router, usePage, useForm } from "@inertiajs/vue3";

import Swal from "sweetalert2";

const page = usePage();

const form = useForm({
    email: "",
    password: "",
});

const submit = () => {
    console.log(form);
    form.post(route('login.post'), {
        forceFormData: true,
        onSuccess: () => {
            Swal.fire({
                icon: "success",
                title: "Data Berhasil Ditemukan\nLogin Berhasil",
                text: page.props.session.success,
                showConfirmButton: false,
                timer: 2000,
            });
            setTimeout(() => {
                window.location.reload();
            }, 2000);
        },
        onError: () => {
            Swal.fire({
                icon: "error",
                title: "Data Tidak Ditemukan\nLogin Gagal",
                text: page.props.session.error,
                showConfirmButton: false,
                timer: 2000,
            });
            form.reset("");
        },
    });
};
</script>

<style scoped>
.bgimage {
    background-image: url('../../../../public/assets/media/illustrations/landing-hero.jpg');
    background-position: center;
    background-size: cover;
    background-repeat: no-repeat;
}
</style>