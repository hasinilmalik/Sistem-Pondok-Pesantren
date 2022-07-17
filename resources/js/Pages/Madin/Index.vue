<template>
    <div class="mt-5">
        <div class="mb-3">
            <inertia-link href="/users/create" class="btn btn-md btn-primary"
                >TAMBAH DATA</inertia-link
            >
        </div>
        <div class="card border-0 rounded shadow-sm">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">NAMA</th>
                            <th scope="col">KELAS</th>
                            <th scope="col">ACTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="student in students" :key="student.id">
                            <td>{{ student.nama }}</td>
                            <td>{{ student.created_at }}</td>
                            <td class="text-center"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
//import layout
import LayoutApp from "../../Layouts/App.vue";

//import Link dari inertia
import { Link } from "@inertiajs/inertia-vue3";

export default {
    //layout
    layout: LayoutApp,

    //register Link di component
    components: {
        Link,
    },

    //props
    props: {
        students: Array, // <- nama props yang dibuat di controller saat parsing data
    },
};
</script>

<style></style>
