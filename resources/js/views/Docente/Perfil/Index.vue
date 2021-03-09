<template>
    <div>
        <div class="row">
            <div class="col-md-6 shadow p-0 mb-5 bg-purple rounded d-flex justify-content-center">
                <h4 class="pt-1">Perfil del Docente</h4>
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
                            <small>Perfil</small>
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <datos-docente :docente='Docente'></datos-docente>
        </div>

    </div>
</template>

<script>
import DatosDocente from './DatosDocente.vue';
    export default {
        name: 'PerfilDocente',
        components:{DatosDocente},
        props:{
            docente:{
                type: Object,
                required: true
            }
        },
        created(){
            //console.log(this.docente.data.user);
        },
        computed: {
            Docente(){
                return this.docente.data;
            }
        },
    }
</script>

