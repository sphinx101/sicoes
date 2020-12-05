<template>
  <div class="col-md-12">
    <div class="card bg-light mb-3 border-secondary">
      <div class="card-header bg-purple">
        <!--h5 class="card-title">Generales del Docente</h5-->
      </div>
        <form @submit.prevent='GuardarDatos'>
            <div class="card-body">
                <template>
                    <div class="row">
                        <div class="col-md-6 titulo-seccion-text-color">
                        <h5><strong>Datos Personales</strong></h5>
                        </div>
                        <div class="col-md-6 font-italic d-flex justify-content-end">
                        <small>Campos Requeridos *</small>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="centrotrabajo_id" class="mb-0 default-text-color">
                                Centro de Trabajo<span class="text-color-red">*</span></label>
                            <select
                                    v-model="form.centrotrabajo_id"
                                    id="centrotrabajo_id"
                                    class="custom-select custom-select-sm form-control"
                                    :class="ClassIsInvalid('centrotrabajo_id')"
                                    name="centrotrabajo_id"
                                    aria-describedby="cctError">
                                <option v-for="ct in ccts" :key="ct.id" :value="ct.id" v-text="`${ct.nombre}-(${ct.cct})`"></option>
                            </select>
                            <div v-if="this.errors.centrotrabajo_id" id="cctError" class="invalid-feedback">
                                {{errors.centrotrabajo_id[0]}}
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="lblrfc" class="mb-0 default-text-color">
                                RFC <span class="text-color-red">*</span></label>
                            <input
                                v-model="form.rfc"
                                type="text"
                                class="form-control form-control-sm"
                                :class="ClassIsInvalid('rfc')"
                                id="lblrfc"
                                name="rfc"
                                placeholder="Introduce RFC*"
                                aria-describedby="rfcError"
                            />
                            <div v-if="this.errors.rfc" id="rfcError" class="invalid-feedback">
                                {{errors.rfc[0]}}
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="lblcurp" class="mb-0 default-text-color">
                                CURP <span class="text-color-red">*</span></label>
                            <input
                                v-model="form.curp"
                                type="text"
                                class="form-control form-control-sm"
                                :class="ClassIsInvalid('curp')"
                                id="lblcurp"
                                name="curp"
                                placeholder="Introduce CURP*"
                                aria-describedby="curpError"
                            />
                            <div v-if="this.errors.curp" id="curpError" class="invalid-feedback">
                                {{errors.curp[0]}}
                            </div>
                        </div>
                    </div>
                    <!-- form-row -->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="lblNombre" class="mb-0 default-text-color">
                                Nombre <span class="text-color-red">*</span></label>
                            <input
                                v-model="form.nombre"
                                type="text"
                                class="form-control form-control-sm"
                                :class="ClassIsInvalid('nombre')"
                                id="lblNombre"
                                name="nombre"
                                placeholder="Introduce Nombre(s)"
                                aria-describedby="errorNombre"
                            />
                            <div v-if="this.errors.nombre" id="errorNombre" class="invalid-feedback">
                                {{errors.nombre[0]}}
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="lblApPaterno" class="mb-0 default-text-color">
                                A. Paterno <span class="text-color-red">*</span></label>
                            <input
                                v-model="form.appaterno"
                                type="text"
                                class="form-control form-control-sm"
                                :class="ClassIsInvalid('appaterno')"
                                id="lblApPaterno"
                                name="paterno"
                                placeholder="Introduce A. Paterno"
                                aria-describedby="errorApPaterno"
                            />
                            <div v-if="this.errors.appaterno" id="errorApPaterno" class="invalid-feedback">
                                {{errors.appaterno[0]}}
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="lblApMaterno" class="mb-0 default-text-color"
                                >A. Materno</label
                            >
                            <input
                                v-model="form.apmaterno"
                                type="text"
                                class="form-control form-control-sm"
                                id="lblApMaterno"
                                name="materno"
                                placeholder="Introduce A. Materno"
                            />
                        </div>
                    </div>
                    <!-- form-row -->
                    <section class="titulo-seccion-text-color">
                        <h5><strong>Datos de Ubicación</strong></h5>
                    </section>
                    <div class="form-row">
                        <div class="form-group w-100">
                            <label for="lblDomicilio" class="mb-0 default-text-color">
                                Domicilio <span class="text-color-red">*</span></label>
                            <input
                                v-model="form.domicilio"
                                type="text"
                                class="form-control form-control-sm"
                                :class="ClassIsInvalid('domicilio')"
                                id="lblDomicilio"
                                name="Domicilio"
                                placeholder="Direccion"
                                aria-describedby="errorDomicilio"
                            />
                            <div v-if="this.errors.domicilio" id="errorDomicilio" class="invalid-feedback">
                                {{errors.domicilio[0]}}
                            </div>
                        </div>
                    </div>
                    <!-- form-row -->
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="lbllocalidad" class="mb-0 default-text-color">
                                Localidad <span class="text-color-red">*</span></label>
                            <input
                                v-model="form.localidad"
                                type="text"
                                class="form-control form-control-sm"
                                :class="ClassIsInvalid('localidad')"
                                id="lbllocalidad"
                                name="CP"
                                placeholder="Localidad"
                                aria-describedby="errorLocalidad"
                            />
                            <div v-if="this.errors.localidad" id="errorLocalidad" class="invalid-feedback">
                                {{ errors.localidad[0] }}
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="lblMunicipio" class="mb-0 default-text-color">
                                Municipio <span class="text-color-red">*</span></label>
                            <input
                                v-model="form.municipio"
                                type="text"
                                class="form-control form-control-sm"
                                :class="ClassIsInvalid('municipio')"
                                id="lblMunicipio"
                                name="Municipio"
                                placeholder="Introduce Municipio"
                                aria-describedby="errorMunicipio"
                            />
                            <div v-if="this.errors.municipio" id="errorMunicipio" class="invalid-feedback">
                                {{ errors.municipio[0] }}
                            </div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="lblEstado" class="mb-0 default-text-color">
                                Estado <span class="text-color-red">*</span></label>
                            <input
                                v-model="form.estado"
                                type="text"
                                class="form-control form-control-sm"
                                :class="ClassIsInvalid('estado')"
                                id="lblEstado"
                                name="Estado"
                                placeholder="Introduce Estado"
                                aria-describedby="errorEstado"
                            />
                            <div v-if="this.errors.estado" id="errorEstado" class="invalid-feedback">
                                {{ errors.estado[0] }}
                            </div>
                        </div>
                    </div>
                    <!-- form-row -->
                    <section class="titulo-seccion-text-color">
                        <h5><strong>Datos de Contacto</strong></h5>
                    </section>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="lbltelefono" class="mb-0 default-text-color"
                                >Telefono</label
                            >
                            <input
                                v-model="form.telefono"
                                type="text"
                                class="form-control form-control-sm"
                                id="lbltelefono"
                                placeholder="#Tel 123-456-78-90"
                            />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="lblcelular" class="mb-0 default-text-color"
                                >Celular</label
                            >
                            <input
                                v-model="form.celular"
                                type="text"
                                class="form-control form-control-sm"
                                id="lblcelular"
                                placeholder="#Cel 123-456-78-90"
                            />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="lblCorreo" class="mb-0 default-text-color">
                                Correo Electronico <span class="text-color-red">*</span></label>
                            <input
                                v-model="form.email"
                                type="email"
                                class="form-control form-control-sm"
                                :class="ClassIsInvalid('email')"
                                id="lblEmail"
                                name="Email"
                                placeholder="Introduce Email"
                                aria-describedby="errorEmail"
                            />
                            <div v-if="this.errors.email" id="errorEmail" class="invalid-feedback">
                                {{ errors.email[0] }}
                            </div>
                        </div>
                    </div>
                    <section class="titulo-seccion-text-color">
                        <h5><strong>Dato Puesto Trabajo</strong></h5>
                    </section>
                    <div class="form-row">
                        <div class="form-group col-md-4">
                            <label for="puesto" class="mb-0 default-text-color">
                                Puesto<span class="text-color-red">*</span></label>
                            <select
                                    v-model="form.type"
                                    id="puesto"
                                    class="custom-select custom-select-sm form-control"
                                    :class="ClassIsInvalid('type')"
                                    name="Puesto"
                                    aria-describedby="errorPuesto">

                                <option v-for="rol in roles" :key="rol.id" :value="rol.id" v-text="rol.display_name" ></option>

                            </select>
                            <div v-if="this.errors.type" id="errorPuesto" class="invalid-feedback">
                                {{errors.type[0]}}
                            </div>
                        </div>
                    </div>
                </template>
            </div>
            <div class="card-footer">
                <div class="form-group float-right">
                  <button type="submit" class="btn btn-success">
                     <i class="fa fa-save" aria-hidden="true"></i> Guardar
                  </button>
                </div>
            </div>
        </form>
    </div>
  </div>
</template>

<script>
export default {
   name: "FormularioAlta",
   props:{
       ccts:{
           type: Array,
           required: true
       },
       roles:{
           type: Array,
           required: true
       }
       /*errors:{
           type: Object,
           required: true
       }*/
   },
  data() {
    return {
      form: {
        centrotrabajo_id: "",
        //user_id: "",
        rfc: "",
        curp: "",
        nombre: "",
        appaterno: "",
        apmaterno: "",
        domicilio: "",
        localidad: "",
        municipio: "",
        estado: "",
        telefono: "",
        celular: "",
        email: "",
        type: ""
      },
      errors: []

    };
  },
  created(){
        toastr.options.progressBar = true;
        toastr.options.preventDuplicates = true;
        toastr.options.timeOut = 3000;
       // toastr.options.positionClass = 'toast-bottom-full-width';
       // toastr.options.positionClass = 'toast-top-full-width';
        toastr.options.positionClass = 'toast-bottom-right';
        toastr.options.closeButton = true;
  },
  methods: {
    GuardarDatos() {
        axios({
            url: '/docentes',
            method: 'post',
            responseType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
            },
            params: this.form
        }).then(response => {
            toastr.success('¡Registro creado con exito!');
            //console.log(response);
            this.form.centrotrabajo_id='';
            this.form.rfc='';
            this.form.curp='';
            this.form.nombre='';
            this.form.appaterno='';
            this.form.apmaterno='';
            this.form.domicilio='';
            this.form.localidad='';
            this.form.municipio='';
            this.form.estado='';
            this.form.telefono='';
            this.form.celular='';

            //window.location.href='/home';
        }).catch(({response}) => {
            console.log(response);
            if(response.data.hasOwnProperty('errors')){
                this.errors=response.data.errors;
                const errores=response.data.errors;
                if(response.status===422){
                    console.log(response.data);
                    for(let error in errores){
                        toastr.error(errores[error][0]);
                    }
                }
            }

        });
        //this.$inertia.post('/docentes',this.form);
    },
    ClassIsInvalid(prop){

        return this.errors.hasOwnProperty(prop) ? 'is-invalid' : '';
    }

  },
};
</script>
