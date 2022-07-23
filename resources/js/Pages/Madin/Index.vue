<template>
    <AppLayout>
        <div class="mb-3 d-flex justify-content-between">
            <div v-if="title == 'aktif'">
                <Link
                    href="/madin-data/aktif"
                    as="button"
                    class="btn btn-primary"
                    >Aktif</Link
                >
                <Link
                    href="/madin-data/belum"
                    as="button"
                    class="btn btn-default"
                    >Baru</Link
                >
            </div>
            <div v-else>
                <Link
                    href="/madin-data/aktif"
                    as="button"
                    class="btn btn-default"
                    >Aktif</Link
                >
                <Link
                    href="/madin-data/Baru"
                    as="button"
                    class="btn btn-primary"
                    >Baru</Link
                >
            </div>
            <inertia-link href="/users/create" class="btn btn-md btn-primary"
                >+ Tambah</inertia-link
            >
        </div>
        <div class="card border-0 rounded shadow-sm">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">NAMA</th>
                            <th scope="col">KELAS</th>
                            <th scope="col">ASR</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in items.data" :key="item.id">
                            <td>
                                {{ item.nama }}
                            </td>
                            <td>
                                {{ item.kelas + " (" + item.rombel + ")" }}
                            </td>
                            <td>
                                {{ item.dormitory + item.room }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="text-center mt-5 mb-5">
            <pagination :links="items.links" />
        </div>
    </AppLayout>
</template>

<script>
import Pagination from "../../Components/Pagination";
import AppLayout from "../../Layouts/App.vue";
import { Link } from "@inertiajs/inertia-vue3";

export default {
    components: {
        AppLayout,
        Pagination,
        Link,
    },
    props: {
        items: Object,
        title: String,
    },
};
</script>
