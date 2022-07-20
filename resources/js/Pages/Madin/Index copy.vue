<template>
    <div class="mt-5">
        <div class="mb-3 d-flex justify-content-between">
            <div v-if="title=='aktif'">
                <Link href="/madin-data/aktif" as="button" class="btn btn-primary">Aktif</Link>
                <Link href="/madin-data/belum" as="button" class="btn btn-default">Baru</Link>
            </div>
            <div v-else>
                <Link href="/madin-data/aktif" as="button" class="btn btn-default">Aktif</Link>
                <Link href="/madin-data/Baru" as="button" class="btn btn-primary">Baru</Link>
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
                            <td>{{ item.nama }}</td>
                            <!-- <td>{{ student.madin_institution.name }}</td>
                            <td>{{ student.dormitory.name + student.rooms }}</td> -->
                            <td class="text-center"></td>
                        </tr>
                    </tbody>
                </table>
                <pagination :links="items.links" />
            </div>
        </div>
    </div>
</template>

<script>
import Pagination from '../../Components/Pagination';
//import layout
import LayoutApp from "../../Layouts/App.vue";

//import Link dari inertia
import { Link } from "@inertiajs/inertia-vue3";

export default {
    //layout
    layout: LayoutApp,

    //register Link di component
    components: {
        Pagination,
        Link,
    },

    //props
    props: {
        title: String,
        items:object, // <- nama props yang dibuat di controller saat parsing data
    },
};
</script>

<style></style>
