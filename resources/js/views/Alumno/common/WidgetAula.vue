<template>

        <div class="col-md-4">
            <!-- Widget: user widget style 1 -->
                <div class="card card-widget widget-user shadow-lg">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header fondo-salon-widget">
                        <h1 class="widget-user-header text-left text-color-red"><strong><span class="badge badge-secondary">3-A</span></strong> </h1>
                        <h6 class="widget-user-desc text-center text-color-red text-bold">MATUTINO</h6>

                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle" :src="'http://sicoes.homestead/storage/photos/docentes/vimr120831mmncfs33.jpg'" alt="User Avatar">
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">16</h5>
                                    <span class="description-text default-text-color ">Hombres</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4 border-right">
                                <div class="description-block">
                                    <h5 class="description-header">16</h5>
                                    <span class="description-text default-text-color ">Mujeres</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                            <div class="col-sm-4">
                                <div class="description-block">
                                    <h5 class="description-header">32</h5>
                                    <span class="description-text default-text-color text-bold">Total Alumnos</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                        <!--button class="btn btn-primary btn-sm float-sm-right" @click.prevent='Mostrar()'>Mostrar</!--button-->
                        <button type="button" class="btn btn-primary btn-sm float-sm-right" @click.prevent='Mostrar()'>
                            Mostrar Aula <span class="badge badge-light">6</span>
                        </button>
                    </div>
                </div>
                <!-- /.widget-user -->
          </div>
          <!-- /.col -->

</template>

<script>
    export default {
        name: 'WidgetAula',
        methods: {
        Mostrar(){
            alert('Mostrar alumnos del grupo');
        }
    },
    }
</script>

<style lang="scss" scoped>

</style>
