<template>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="p-4 shadow">
                <form @submit.prevent="create">
                    <h3 class="fw-bold text-center mb-3">Crear nueva tarea</h3>
                    <div class="mb-3">
                        <label class="form-label fw-bold">Titulo</label>
                        <input type="text" class="form-control" placeholder="Escriba el titulo de la tarea" v-model="task.title" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label fw-bold">Descripcion</label>
                        <textarea class="form-control" rows="3" placeholder="Escriba la descripción de la tarea" v-model="task.description" required></textarea>
                    </div>
                    <div class="col-md-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary fw-bold"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>

    import axios from 'axios';

    export default {
        name:"create",
        data() {
            return {
                task: {
                    title: "",
                    description: "",
                }
            }
        },
        methods: {
            async create() {
                await axios.post('/api/task', this.task)
                .then(response => {
                    location.reload()
                })
                .catch(error => {
                    console.log(error)
                })
            }
        }
    }
</script>

