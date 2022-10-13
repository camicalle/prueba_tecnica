<template>
    <div class="container mt-5">
        <div class="row d-flex justify-content-center ">
            <div class="col-md-5 p-4 shadow">
                <form @submit.prevent="update">
                    <h3 class="fw-bold text-center mb-3">Iniciar Sesión</h3>
                    <div class="mb-3">
                        <label class="form-label fw-bold"><i class="fa-solid fa-envelope"></i> Correo Electronico</label>
                        <input type="text" class="form-control" placeholder="Escriba el correo electronico"  required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold"><i class="fa-solid fa-lock"></i> Contraseña</label>
                        <input type="text" class="form-control" placeholder="Escriba la contraseña"  required>
                    </div>
                    <div class="col-md-12 d-flex justify-content-between gap-2">
                        <router-link type="submit" class="btn btn-danger fw-bold" :to='{name: "register"}'>Registrarse</router-link>
                        <button type="submit" class="btn btn-primary fw-bold">Entrar <i class="fa-solid fa-right-to-bracket"></i></button>
                    </div>
                    <div class="text-center mt-3">
                        <a href="#" class="text-decoration-none fw-bold">Olvidaste tu contraseña?</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {

}
</script>

<style>

</style>
