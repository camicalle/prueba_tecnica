<template>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-7 p-4 shadow">
                <form @submit.prevent="update">
                    <h3 class="fw-bold text-center mb-3">Editar tarea</h3>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Titulo</label>
                        <input type="text" class="form-control" placeholder="Escriba el titulo de la tarea" v-model="task.title" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Descripcion</label>
                        <textarea class="form-control" rows="3" placeholder="Escriba la descripción de la tarea" v-model="task.description" required></textarea>
                    </div>
                    <div class="col-md-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary fw-bold"><i class="fa-solid fa-floppy-disk"></i> Actualizar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>

    import axios from 'axios';

    export default {
        name:"edit",
        data() {
            return {
                task: {
                    title: "",
                    description: "",
                }
            }
        },
        mounted() {
            this.showTask()
        },
        methods: {
            async showTask() {
                await axios.get(`/api/task/${this.$route.params.id}`)
                .then(response => {
                    const {title, description} = response.data
                    this.task.title = title,
                    this.task.description = description
                    console.log(title, description)
                })
                .catch(error => {
                    console.log(error)
                })
            },
            async update() {
                await axios.put(`/api/task/${this.$route.params.id}`, this.task)
                .then(response=> {
                    this.$router.push({
                        name: "showTasks"
                    })
                })
                .catch(error => {
                    console.log(error)
                })
            }
        }
    }
</script>

