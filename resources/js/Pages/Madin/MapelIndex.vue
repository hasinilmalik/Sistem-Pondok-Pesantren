<template>
    <div>
        <div class="mb-3">
            <!-- Button trigger modal -->
            <div class="d-flex justify-content-between">
                <h4>{{ title }}</h4>
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
                        <div class="modal-body">
                            <div class="form-group">
                                <label for="name">Pelajaran</label>
                                <input type="text" class="form-control" />
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal"
                            >
                                Tutup
                            </button>
                            <button type="button" class="btn btn-primary">
                                Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card border-o rounded shadow-sm">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">PELAJARAN</th>
                            <th scope="col">PELAJARAN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="mapel in mapels">
                            <td>{{ mapel.name }}</td>
                            <td>{{ mapel.name }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import LayoutApp from "../../Layouts/App.vue";

export default {
    layout: LayoutApp,
    props: {
        title: String,
        mapels: Array,
    },
};
</script>
