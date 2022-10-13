<template>
    <div class="container mt-5 mb-5 shadow">
        <div class="row p-4">
            <h2 class="text-center fw-bold mb-2">Listado de Tareas</h2>
            <div class="col-md-12 mb-4">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-success fw-bold" @click.prevent="exportExcel"><i class="fas fa-file-excel"></i> Excel</button>
                </div>
            </div>
            <div>
                <table class="table table-bordered table-hover shadow-sm">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Descripción</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="task in tasks" :key="task.id">
                            <td>{{ task.id }}</td>
                            <td>{{ task.title }}</td>
                            <td>{{ task.description }}</td>
                            <td class="d-flex gap-2">
                                <router-link :to='{name:"editTask", params:{id:task.id}}' class="btn btn-primary" ><i class="fa-solid fa-pen-to-square"></i></router-link>
                                <a type="button" @click="deleteTask(task.id)" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>

    import axios from 'axios';
    import xlsx from 'xlsx/dist/xlsx.full.min';

    export default {
        name:"tasks",
        data() {
            return {
                tasks: []
            }
        },
        mounted() {
            this.showTasks()
        },
        methods: {
            async showTasks() {
                await axios.get('/api/task')
                .then(response => {
                    this.tasks = response.data
                })
                .catch(error => {
                    this.task = []
                })
            },
            deleteTask(id) {
                swal({
                    title: "Estas seguro?",
                    text: "Estas seguro que desea eliminar la tarea?",
                    icon: "warning",
                    buttons: ["Cancelar", "Si"],
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        axios.delete(`/api/task/${id}` )
                        .then(response => {
                            this.showTasks()
                        })
                        .catch(error => {
                            console
                        })
                        swal("La tarea fue eliminada con exito!", {
                            icon: "success",
                        });
                    } else {
                        this.showTasks()
                    }
                });
            },
            exportExcel() {
                const XLSX = xlsx;
                const workbook = XLSX.utils.book_new();
                const worksheet = XLSX.utils.json_to_sheet(this.tasks);
                XLSX.utils.book_append_sheet(workbook, worksheet, "tareas");
                XLSX.writeFile(workbook, "tareas.xlsx");
            }
        }
    }
</script>
