<template>
    <div class="container">
        <div class="row justify-content-center mx-5">
            <div class="bg-body-secondary py-1 px-1">
                <div class="text-Left mx-2 mt-1 fw-bold fs-4">
                    Data Level
                </div>
                <div class="mx-2 my-2">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Permission</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(item, index) in levels" :key="item.id">
                                <th scope="row">{{ index + 1 }}</th>
                                <td>{{ item.level_name }}</td>
                                <td> <span class="text-primary">Update</span> | <span class="text-danger">Delete</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            levels: {},
        }
    },
    methods: {
        loadData() {
            axios.get('api/get_dataLevel').then(({ data }) => { this.levels = data });
        }
    },
    created() {
        this.loadData();
    }
}
</script>

<style scoped>
/* * {
    border: 1px solid red;
} */
</style>
