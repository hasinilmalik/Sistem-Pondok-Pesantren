<template>
    <AppLayout>
        <div class="mb-3">
            <!-- flash message -->
            <div
                v-if="$page.props.flash.message"
                class="alert alert-success alert-dismissible fade show"
                role="alert"
            >
                {{ $page.props.flash.message }}
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="alert"
                    aria-label="Close"
                ></button>
            </div>
            <!-- Button trigger modal -->
            <div class="d-flex justify-content-between">
                <h4 class="text-uppercase">{{ title }}</h4>
                <button
                    type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#exampleModal"
                >
                    + Tambah
                </button>
            </div>

            <!-- Modal -->
            <div
                class="modal fade"
                id="exampleModal"
                tabindex="-1"
                aria-labelledby="exampleModalLabel"
                aria-hidden="true"
            >
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">
                                Pelajaran
                            </h5>
                            <button
                                type="button"
                                class="btn-close"
                                data-bs-dismiss="modal"
                                aria-label="Close"
                            ></button>
                        </div>
                        <form>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="name">Kode Mapel</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="form.kode_mapel"
                                    />
                                </div>
                                <div class="form-group">
                                    <label for="name">Nama Pelajaran</label>
                                    <input
                                        type="text"
                                        class="form-control"
                                        v-model="form.name"
                                    />
                                </div>
                                <button
                                    class="btn btn-primary mt-3"
                                    v-on:click.prevent="tutup"
                                    data-bs-dismiss="modal"
                                >
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-o rounded shadow-sm">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">KODE</th>
                            <th scope="col">PELAJARAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="mapel in mapels">
                            <td>{{ mapel.kode_mapel }}</td>
                            <td>{{ mapel.name }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import { reactive } from "vue";
import { Inertia } from "@inertiajs/inertia";
import AppLayout from "../../Layouts/App.vue";

export default {
    components: {
        AppLayout,
    },
    props: {
        title: String,
        mapels: Array,
    },

    setup() {
        const form = reactive({
            kode_mapel: null,
            name: null,
        });
        function tutup() {
            Inertia.post("/madin-mapel", form);
            this.form.kode_mapel = "";
            this.form.name = "";
        }
        return { form, tutup };
    },
};
</script>
