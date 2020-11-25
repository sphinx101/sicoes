<template>
  <div class="container">
    <div class="row">
      <div class="col-md-6">
        <h1>Registro</h1>
      </div>
      <div class="col-md-6">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-gray-light justify-content-end">
            <li class="breadcrumb-item"><a href="#">Inicio</a></li>
            <li class="breadcrumb-item"><a href="#">Docente</a></li>
            <li class="breadcrumb-item active" aria-current="page">Registro</li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="row">
      <formulario-alta></formulario-alta>
    </div>
  </div>
</template>

<script>
import FormularioAlta from "./FormularioAlta.vue";
export default {
  name: "RegistroDocente",
  components: { FormularioAlta },
};
</script>

<style lang="scss" scoped>
</style>
