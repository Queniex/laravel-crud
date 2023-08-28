<template>
    <div class="container">
        <div class="row justify-content-center mx-5">
            <div class="bg-body-secondary py-1 px-1">
                <div class="row">
                    <div class="col">
                        <div class="text-Left mx-2 mt-1 fw-bold fs-4">
                            Data User
                        </div>
                    </div>
                    <div class="col">
                        <div class="mx-2 mt-1 d-flex justify-content-end">
                            <button class=" btn btn-success" @click="showModal">Add Data +</button>
                        </div>
                    </div>
                </div>
                <div class="mx-2 my-2">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Username</th>
                                <th scope="col">Level</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in users" :key="item.id">
                                <th scope="row">{{ index + 1 }}</th>
                                <td>{{ item.name }}</td>
                                <td>{{ item.level_id }}</td>
                                <td>{{ item.email }}</td>
                                <td> <a href="#" @click="showModalEdit(item)"
                                        class="text-primary text-decoration-none">Update</a> |
                                    <a href="#" @click="delData(item.id)"
                                        class="text-danger text-decoration-none">Delete</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                    <!-- Modal -->
                    <div class="modal fade" id="modalUser" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5 text-center" id="exampleModalLabel" v-show="!statusModal">
                                        Add Data User</h1>
                                    <h1 class="modal-title fs-5 text-center" id="exampleModalLabel" v-show="statusModal">
                                        Edit Data User</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <form @submit.prevent=" statusModal ? editData() : saveData()">
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <input v-model="form.name" class="form-control" id="name" type="text"
                                                placeholder="Username" :class="{ 'is-invalid': form.errors.has('name') }">
                                            <div v-if="form.errors.has('name')" v-html="form.errors.get('name')" />
                                        </div>
                                        <div class="form-group">
                                            <select class="form-select" id="level_id" v-model="form.level_id"
                                                :class="{ 'is-invalid': form.errors.has('level_id') }">
                                                <option value>Choose level</option>
                                                <option v-for="item in levels" :key="item.id" :value="item.id">{{
                                                    item.level_name }}</option>
                                            </select>
                                            <div v-if="form.errors.has('level_id')" v-html="form.errors.get('level_id')" />
                                        </div>
                                        <div class="form-group">
                                            <input v-model="form.email" id="email" class="form-control" type="text"
                                                placeholder="email@email.com"
                                                :class="{ 'is-invalid': form.errors.has('email') }">
                                            <div v-if="form.errors.has('email')" v-html="form.errors.get('email')" />
                                        </div>
                                        <div class="form-group">
                                            <input v-model="form.password" id="password" class="form-control"
                                                type="password" placeholder="Password"
                                                :class="{ 'is-invalid': form.errors.has('password') }">
                                            <div v-if="form.errors.has('password')" v-html="form.errors.get('password')" />
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-success" :disabled="disabled"
                                            v-show="!statusModal"><i v-show="loading" class="fa fa-spinner fa-spin"></i>
                                            Save Data</button>
                                        <button type="submit" class="btn btn-primary" :disabled="disabled"
                                            v-show="statusModal"><i v-show="loading" class="fa fa-spinner fa-spin"></i>
                                            Update Data</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import Form from 'vform';
import axios from 'axios';
const csrfToken = document.head.querySelector('meta[name="csrf-token"]');

if (csrfToken) {
    axios.defaults.headers.common['X-CSRF-TOKEN'] = csrfToken.content;
}

export default {
    data() {
        return {
            loading: false,
            disabled: false,
            statusModal: false,
            levels: {},
            users: {},
            form: new Form({
                id: "",
                name: "",
                level_id: "",
                email: "",
                password: "",
            })
        }
    },
    methods: {
        showModal() {
            this.statusModal = false;
            this.form.reset();
            $("#modalUser").modal("show");
        },
        showModalEdit(item) {
            this.statusModal = true;
            $("#modalUser").modal("show");
            this.form.fill(item);
        },
        loadData() {
            axios
                .get('api/getDataLevel')
                .then(({ data }) => { this.levels = data });
            axios
                .get('api/user')
                .then(({ data }) => { this.users = data });
        },
        saveData() {
            this.loading = true;
            this.disabled = true;
            this.form
                .post('api/user')
                .then(response => {

                    // Refresh Data
                    Fire.$emit("refreshData");

                    // Handle success here
                    console.log(response.data);
                    $("#modalUser").modal("hide");

                    // Sweet Alert
                    Toast.fire({
                        icon: 'success',
                        title: 'Data Save Successfully'
                    });
                    this.loading = false;
                    this.disabled = false;
                })
                .catch(error => {
                    this.loading = false;
                    this.disabled = false;
                    console.error(error);
                });
        },
        editData() {
            this.loading = true;
            this.disabled = true;
            this.form
                .put('api/user/' + this.form.id)
                .then(response => {

                    // Refresh Data
                    Fire.$emit("refreshData");

                    // Handle success here
                    console.log(response.data);
                    $("#modalUser").modal("hide");

                    // Sweet Alert
                    Toast.fire({
                        icon: 'success',
                        title: 'Data update Successfully'
                    });
                    this.loading = false;
                    this.disabled = false;
                })
                .catch(error => {
                    this.loading = false;
                    this.disabled = false;
                    console.error(error);
                });
        },
        delData(id) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Delete"
            }).then(result => {
                if (result.value) {
                    this.form
                        .delete("api/user/" + id)
                        .then(() => {
                            Swal.fire(
                                "Deleted",
                                "Your file has been deleted",
                                "success"
                            );
                            Fire.$emit("refreshData");
                        })
                        .catch(() => {
                            Swal.fire(
                                "failed",
                                "There's an error occurred!",
                                "warning"
                            );
                        });
                }
            });
        }
    },
    created() {
        this.loadData();
        Fire.$on("refreshData", () => {
            this.loadData();
        });
    }
}
</script>

<style scoped>
/* * {
    border: 1px solid red;
} */
</style>
