<template>
    <AppLayout>
        <div class="mb-3">
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
            <div class="d-flex justify-content-between">
                <h4 class="text-uppercase">{{ title }}</h4>
                <!-- Button trigger modal -->
                <button
                    type="button"
                    class="btn btn-primary"
                    data-bs-toggle="modal"
                    data-bs-target="#exampleModal"
                >
                    + Kelas
                </button>
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
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

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
                            {{ title }}
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
                            <input
                                type="text"
                                name="kelas"
                                id="kelas"
                                v-model="form.name"
                            />
                        </div>

                        <button
                            type="button"
                            class="btn btn-primary btn-flat"
                            v-on:click.prevent="saveAndClose"
                            data-bs-dismiss="modal"
                        >
                            Simpan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import { Inertia } from "@inertiajs/inertia";
import AppLayout from "../../Layouts/App.vue";
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
            console.log("ok");
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
        saveAndClose() {
            Inertia.post("/madin-kelas", form);
            this.reset();
        },
        // edit(data) {
        //     this.form = Object.assign({}, data);
        //     this.editMode = true;
        //     this.openModal();
        // },
        // update(data) {
        //     data._method = "PATCH";
        //     this.$inertia.post("/madin-kelas/edit/" + data.id, data);
        //     this.reset();
        //     this.closeModal();
        // },
        // deleteRow(data) {
        //     if (!confirm("Are you sure want to remove?")) return;
        //     data._method = "DELETE";
        //     this.$inertia.post("/madin-kelas/" + data.id, data);
        //     this.reset();
        //     this.closeModal();
        // },
    },
};
</script>
