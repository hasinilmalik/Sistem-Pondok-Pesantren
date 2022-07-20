<template>
    <div class="mb-3">
        <div>
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
                            <th>ID</th>
                            <th>Kelas</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="row in data" :key="row.id">
                            <td>{{ row.id }}</td>
                            <td>{{ row.name }}</td>
                            <td class="border px-4 py-2">
                                <button
                                    @click="edit(row)"
                                    class="btn btn-sm btn-outline-primary"
                                >
                                    Edit
                                </button>
                                <button
                                    @click="deleteRow(row)"
                                    class="btn btn-sm btn-outline-danger"
                                >
                                    Delete
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
import AppLayout from "../../Layouts/App.vue";
import { Inertia } from "@inertiajs/inertia";
export default {
    components: {
        AppLayout,
    },
    props: {
        title: String,
        data: Array,
    },
    data() {
        return {
            editMode: false,
            isOpen: false,
            form: {
                name: null,
            },
        };
    },
    methods: {
        openModal() {
            this.isOpen = true;
        },
        closeModal() {
            this.isOpen = false;
            this.reset();
            this.editMode = false;
        },
        reset() {
            this.form = {
                name: null,
            };
        },
        save() {
            this.$inertia.post("madin-kelas", data);
            this.reset();
            this.closeModal();
            this.editMode = false;
        },
        edit(data) {
            this.form = Object.assign({}, data);
            this.editMode = true;
            this.openModal();
        },
        update(data) {
            data._method = "PATCH";
            this.$inertia.post("/madin-kelas/edit/" + data.id, data);
            this.reset();
            this.closeModal();
        },
        deleteRow(data) {
            if (!confirm("Are you sure want to remove?")) return;
            data._method = "DELETE";
            this.$inertia.post("/madin-kelas/" + data.id, data);
            this.reset();
            this.closeModal();
        },
    },
};
</script>
