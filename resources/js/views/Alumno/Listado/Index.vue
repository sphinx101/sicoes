<template>
   <div>
        <div class="row">
            <div class="col-md-6 shadow p-0 mb-5 bg-purple rounded d-flex justify-content-center">
                <h4 class="pt-1">Alumnos Registrados</h4>
            </div>
            <div class="col-md-6 font-italic">
                <nav aria-label="breadcrumb">
                <ol class="breadcrumb bg-gray-light justify-content-end">
                    <li class="breadcrumb-item">
                    <a href="/home">
                        <i class="fas fa-home"></i>
                        <small>Inicio</small>
                    </a>

                    </li>
                    <li class="breadcrumb-item">
                    <span>
                        <i class="fas fa-chalkboard-teacher"></i>
                        <small>Alumno</small>
                    </span>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                    <small>Registrados</small>
                    </li>
                </ol>
                </nav>
            </div>
        </div>
        <div class="row col-md-12" >

            <widget-aula></widget-aula>
        </div>

    </div>
</template>

<script>
import WidgetAula from '../common/WidgetAula.vue';
export default {
    name: 'ListadoAlumno',
    components:{WidgetAula},

}
</script>

<style>

</style>
