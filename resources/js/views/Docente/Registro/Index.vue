<template>
  <div>
    <div class="row">
      <div
        class="col-md-6 shadow p-0 mb-5 bg-purple rounded d-flex justify-content-center"
      >
        <h4 class="pt-1">Registro de Informacion</h4>
      </div>
      <div class="col-md-6 font-italic">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb bg-gray-light justify-content-end">
            <li class="breadcrumb-item">
              <a href="/home">
                <i class="fas fa-home"></i>
                <small>Inicio</small>
              </a>
              <!--inertia-link href="/home" replace>
                <i class="fas fa-home"></i>
                <small>Inicio</small>
              </inertia-link-->
            </li>
            <li class="breadcrumb-item">
              <span>
                <i class="fas fa-chalkboard-teacher"></i>
                <small>Docente</small>
              </span>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              <small>Registro</small>
            </li>
          </ol>
        </nav>
      </div>
    </div>
    <div class="row">
        <formulario-alta
            :ccts='CentroTrabajos'
            :roles='Roles'>
        </formulario-alta>
    </div>
  </div>
</template>

<script>
import FormularioAlta from "./FormularioAlta.vue";
export default {
  name: "RegistroDocente",
  components: { FormularioAlta },
  props:{
      ccts:{
          type: Array,
          required: true
      },
      roles: {
          type: Array,
          required: true
      }
      /*errors:{
          type: Object,
          required: true
      }*/
  },
  created(){
      //console.log(this.ccts);
  },
  computed:{
      CentroTrabajos(){
          return this.ccts;
      },
      Roles(){
          return this.roles;
      }
  }
};
</script>

<style lang="stylus" scoped>
i, small, span
  color: #605ca8

</style>
