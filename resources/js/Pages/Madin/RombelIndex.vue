<template>
    <AppLayout>
        <div class="mb-3"></div>
        <div class="card border-o rounded shadow-sm">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama Rombel</th>
                            <th>Kelas</th>
                            <th>Jumlah santri</th>
                            <th>Jk</th>
                            <th>Detail</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="row in rombel" :key="row.id">
                            <td>{{ row.name }}</td>
                            <td>{{ row.kelas }}</td>
                            <td>{{ row.jumlah }}</td>
                            <td>{{ row.jk }}</td>
                            <td>
                                <Link
                                    as="button"
                                    class="btn btn-sm btn-primary mx-1"
                                    :href="route('madin-rombel.show', row.id)"
                                >
                                    Lihat</Link
                                >
                                <Link
                                    as="button"
                                    class="btn btn-sm btn-primary mx-1"
                                    :href="route('madin-rombel.edit', row.id)"
                                >
                                    Edit</Link
                                >
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>
<script>
import { Link } from "@inertiajs/inertia-vue3";
import { Inertia } from "@inertiajs/inertia";
import AppLayout from "../../Layouts/App";
export default {
    components: {
        Link,
        AppLayout,
    },
    props: {
        rombel: Object,
    },
};
</script>
