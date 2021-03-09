<template>
    <div class="col-md-12">
        <div class="card bg-light mb-3 border-secondary">
            <form>
                <div class="card-body">
                    <template>
                        <div class="row">
                            <div class="col-md-6 titulo-seccion-text-color">
                                <h5><strong>Datos Personales</strong></h5>
                            </div>

                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="lblrfc" class="mb-0 default-text-color">RFC </label>

                                <input

                                    type="text"
                                    class="form-control form-control-sm"

                                    id="lblrfc"
                                    name="rfc"
                                    placeholder="Introduce RFC*"
                                    aria-describedby="rfcError"
                                />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="lblcurp" class="mb-0 default-text-color">CURP </label>

                                <input

                                    type="text"
                                    class="form-control form-control-sm"

                                    id="lblcurp"
                                    name="curp"
                                    placeholder="Introduce CURP*"
                                    aria-describedby="curpError"
                                />
                            </div>
                        </div><!-- form-row-->

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="lblNombre" class="mb-0 default-text-color">Nombre </label>
                                <input

                                    type="text"
                                    class="form-control form-control-sm"

                                    id="lblNombre"
                                    name="nombre"
                                    placeholder="Introduce Nombre(s)"
                                    aria-describedby="errorNombre"
                                />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="lblApPaterno" class="mb-0 default-text-color">A. Paterno </label>
                                <input

                                    type="text"
                                    class="form-control form-control-sm"

                                    id="lblApPaterno"
                                    name="paterno"
                                    placeholder="Introduce A. Paterno"
                                    aria-describedby="errorApPaterno"
                                />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="lblApMaterno" class="mb-0 default-text-color">
                                    A. Materno</label>
                                <input

                                    type="text"
                                    class="form-control form-control-sm"
                                    id="lblApMaterno"
                                    name="materno"
                                    placeholder="Introduce A. Materno"
                                />
                            </div>
                        </div><!-- form-row-->
                        <section class="titulo-seccion-text-color">
                            <h5><strong>Datos de Ubicación</strong></h5>
                        </section>
                        <div class="form-row">

                        </div><!-- form-row -->

                    </template>
                </div>

            </form>
        </div> <!-- card -->
    </div> <!--col-md-12-->
</template>

<script>
    export default {
        name: 'FormularioEdicion'
    }
</script>
