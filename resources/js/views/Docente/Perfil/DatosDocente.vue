<template>
    <div class="row col-md-12">
        <section class="col-md-4 ">
            <div class="card bg-light mb-3 border-secondary  ">
                <div class="card-header bg-purple"></div>
                <div class="card-body ">
                    <img class="profile-user-img img-responsive img-circle d-flex justify-content-center"
                         :src="'http://sicoes.homestead/storage/photos/docentes/'+docente.photo_name"
                         alt="Foto Perfil">
                    <h3 class="profile-username text-center default-text-color" v-text="docente.nombre_completo.toUpperCase()"></h3>
                    <p class="text-muted text-center" v-text="docente.user.type.toUpperCase()"></p>
                    <ul class="list-group list-group-unbordered ">
                        <li class="list-group-item">
                            <b class="default-text-color">Centro Trabajo:</b>
                            <div>
                                <span class="badge badge-pill badge-primary float-left" v-text="docente.centrotrabajo.nombre"></span>
                            </div>

                        </li>
                        <li class="list-group-item">
                            <b class="default-text-color" >Grado(s) Actual(es) Impartido(s)</b>
                            <div>
                                <span class="badge badge-pill badge-success float-left">Primero</span>
                                <span class="badge badge-pill badge-danger float-left">Segundo</span>
                                <span class="badge badge-pill badge-dark float-left">Tercero</span>
                            </div>

                        </li>

                    </ul>
                </div>
            </div>
        </section>
        <section class="col-md-8">
            <div class="card bg-light mb-3 border-secondary">
                <div class="card-header bg-purple"></div>
                <form @submit.prevent="ActualizarDatos">
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
                                        @keyup="VerificarCambio('rfc')"
                                        v-model='docente.rfc'
                                        type="text"
                                        class="form-control form-control-sm"
                                        :class="CssIsInvalidRFC"
                                        id="lblrfc"
                                        name="rfc"
                                        placeholder="Introduce RFC*"
                                        aria-describedby="rfcError"
                                    />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="lblcurp" class="mb-0 default-text-color">CURP </label>

                                    <input
                                        @keyup="VerificarCambio('curp')"
                                        v-model="docente.curp"
                                        type="text"
                                        class="form-control form-control-sm"
                                        :class="CssIsInvalidCURP"
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
                                        @keyup="VerificarCambio('nombre')"
                                        v-model="docente.nombre"
                                        type="text"
                                        class="form-control form-control-sm"
                                        :class="CssIsInvalidNombre"
                                        id="lblNombre"
                                        name="nombre"
                                        placeholder="Introduce Nombre(s)"
                                        aria-describedby="errorNombre"
                                    />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="lblApPaterno" class="mb-0 default-text-color">A. Paterno </label>
                                    <input
                                        @keyup="VerificarCambio('appaterno')"
                                        v-model="docente.appaterno"
                                        type="text"
                                        class="form-control form-control-sm"
                                        :class="CssIsInvalidPaterno"
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
                                        @keyup="VerificarCambio('apmaterno')"
                                        v-model="docente.apmaterno"
                                        type="text"
                                        class="form-control form-control-sm"
                                        :class="CssIsInvalidMaterno"
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
                                <div class="form-group w-100">
                                    <label for="lblDomicilio" class="mb-0 default-text-color">Domicilio</label>
                                    <input
                                        @keyup="VerificarCambio('domicilio')"
                                        v-model="docente.domicilio"
                                        type="text"
                                        class="form-control form-control-sm"
                                        :class="CssIsInvalidDomicilio"
                                        id="lblDomicilio"
                                        name="Domicilio"
                                        placeholder="Direccion"
                                        aria-describedby="errorDomicilio"
                                    />
                                </div>
                            </div><!-- form-row -->
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="lbllocalidad" class="mb-0 default-text-color">Localidad</label>
                                    <input
                                        @keyup="VerificarCambio('localidad')"
                                        v-model="docente.localidad"
                                        type="text"
                                        class="form-control form-control-sm"
                                        :class="CssIsInvalidLocalidad"
                                        id="lbllocalidad"
                                        name="CP"
                                        placeholder="Localidad"
                                        aria-describedby="errorLocalidad"
                                    />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="lblMunicipio" class="mb-0 default-text-color">Municipio</label>
                                    <input
                                        @keyup="VerificarCambio('municipio')"
                                        v-model="docente.municipio"
                                        type="text"
                                        class="form-control form-control-sm"
                                        :class="CssIsInvalidMunicipio"
                                        id="lblMunicipio"
                                        name="Municipio"
                                        placeholder="Introduce Municipio"
                                        aria-describedby="errorMunicipio"
                                    />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="lblEstado" class="mb-0 default-text-color">Estado </label>
                                    <input
                                        @keyup="VerificarCambio('estado')"
                                        v-model="docente.estado"
                                        type="text"
                                        class="form-control form-control-sm"
                                        :class="CssIsInvalidEstado"
                                        id="lblEstado"
                                        name="Estado"
                                        placeholder="Introduce Estado"
                                        aria-describedby="errorEstado"
                                    />
                                </div>
                            </div><!-- form-row -->
                            <section class="titulo-seccion-text-color">
                                <h5><strong>Datos de Contacto</strong></h5>
                            </section>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="lbltelefono" class="mb-0 default-text-color">Telefono</label>
                                    <input
                                        @keyup="VerificarCambio('telefono')"
                                        v-model="docente.telefono"
                                        type="text"
                                        class="form-control form-control-sm"
                                        :class="CssIsInvalidTelefono"
                                        id="lbltelefono"
                                        placeholder="#Tel 123-456-78-90"
                                    />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="lblcelular" class="mb-0 default-text-color">Celular</label>
                                    <input
                                        @keyup="VerificarCambio('celular')"
                                        v-model="docente.celular"
                                        type="text"
                                        class="form-control form-control-sm"
                                        :class="CssIsInvalidCelular"
                                        id="lblcelular"
                                        placeholder="#Cel 123-456-78-90"
                                    />
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="lblCorreo" class="mb-0 default-text-color">Correo Electronico</label>
                                    <input
                                        @keyup="VerificarCambio('email')"
                                        v-model="docente.user.email"
                                        type="email"
                                        class="form-control form-control-sm"
                                        :class="CssIsInvalidEmail"
                                        id="lblEmail"
                                        name="Email"
                                        placeholder="Introduce Email"
                                        aria-describedby="errorEmail"
                                    />
                                </div>
                            </div>
                        </template>
                    </div>
                    <div class="card-footer">
                        <div class="form-group float-right">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save" aria-hidden="true"></i> Actualizar
                            </button>
                        </div>
                    </div>
                </form>


            </div>
        </section>
    </div>
</template>

<script>
//TODO Falta implementar: cambiar foto de perfil y obtener los grados impartidos
import {updateDocente} from '../../../api/docente';
    export default {
        name: 'DatosDocente',
        props:{
            docente:{
                type: Object,
                required: true
            }
        },
        created(){

            toastr.options.progressBar = true;
            toastr.options.preventDuplicates = true;
            toastr.options.timeOut = 3000;
            // toastr.options.positionClass = 'toast-bottom-full-width';
            // toastr.options.positionClass = 'toast-top-full-width';
            toastr.options.positionClass = "toast-bottom-right";
            toastr.options.closeButton = true;



            this.DatoOriginal.rfc=this.docente.rfc;
            this.DatoOriginal.curp=this.docente.curp;
            this.DatoOriginal.nombre=this.docente.nombre;
            this.DatoOriginal.appaterno=this.docente.appaterno;
            this.DatoOriginal.apmaterno=this.docente.apmaterno != null ? this.docente.apmaterno : '';
            this.DatoOriginal.domicilio=this.docente.domicilio;
            this.DatoOriginal.localidad=this.docente.localidad;
            this.DatoOriginal.municipio=this.docente.municipio;
            this.DatoOriginal.estado=this.docente.estado;
            this.DatoOriginal.telefono=this.docente.telefono != null ? this.docente.telefono : '';
            this.DatoOriginal.celular=this.docente.celular != null ? this.docente.celular : '';
            this.DatoOriginal.email=this.docente.user.email;

        },
        data(){
            return {
                DatoOriginal:{
                    rfc:'',
                    curp:'',
                    nombre:'',
                    appaterno:'',
                    apmaterno:'',
                    domicilio:'',
                    localidad:'',
                    municipio:'',
                    estado:'',
                    telefono:'',
                    celular:'',
                    email:''
                },

                actualizar: false,

                changeCssClassRFC: false,
                changeCssClassCURP: false,
                changeCssClassNombre: false,
                changeCssClassPaterno: false,
                changeCssClassMaterno: false,
                changeCssClassDomicilio: false,
                changeCssClassLocalidad: false,
                changeCssClassMunicipio: false,
                changeCssClassEstado: false,
                changeCssClassTelefono: false,
                changeCssClassCelular: false,
                changeCssClassEmail: false

            }
        },
        computed:{

            CssIsInvalidRFC(){
                return this.changeCssClassRFC ? 'is-invalid' : 'is-valid';
            },
            CssIsInvalidCURP(){
                return this.changeCssClassCURP ? 'is-invalid' : 'is-valid';
            },
            CssIsInvalidNombre(){
                return this.changeCssClassNombre ? 'is-invalid' : 'is-valid';
            },
            CssIsInvalidPaterno(){
                return this.changeCssClassPaterno ? 'is-invalid' : 'is-valid';
            },
            CssIsInvalidMaterno(){
                return this.changeCssClassMaterno ? 'is-invalid' : 'is-valid';
            },
            CssIsInvalidDomicilio(){
                return this.changeCssClassDomicilio ? 'is-invalid' : 'is-valid';
            },
            CssIsInvalidLocalidad(){
                return this.changeCssClassLocalidad ? 'is-invalid' : 'is-valid';
            },
            CssIsInvalidMunicipio(){
                return this.changeCssClassMunicipio ? 'is-invalid' : 'is-valid';
            },
            CssIsInvalidEstado(){
                return this.changeCssClassEstado ? 'is-invalid' : 'is-valid';
            },
            CssIsInvalidTelefono(){
                return this.changeCssClassTelefono ? 'is-invalid' : 'is-valid';
            },
            CssIsInvalidCelular(){
                return this.changeCssClassCelular ? 'is-invalid' : 'is-valid';
            },
            CssIsInvalidEmail(){
                return this.changeCssClassEmail ? 'is-invalid' : 'is-valid';
            }


        },
        methods:{
            async ActualizarDatos(){

                if(this.actualizar){

                   await updateDocente(this.docente)
                         .then( ({data}) => {

                            toastr.success("¡Informacion actualizada con Exito!");
                            this.DatoOriginal.rfc=data.rfc;
                            this.DatoOriginal.curp=data.curp;
                            this.DatoOriginal.nombre=data.nombre;
                            this.DatoOriginal.appaterno=data.appaterno;
                            this.DatoOriginal.apmaterno=data.apmaterno != null ? data.apmaterno : '';
                            this.DatoOriginal.domicilio=data.domicilio;
                            this.DatoOriginal.localidad=data.localidad;
                            this.DatoOriginal.municipio=data.municipio;
                            this.DatoOriginal.estado=data.estado;
                            this.DatoOriginal.telefono=data.telefono != null ? data.telefono : '';
                            this.DatoOriginal.celular=data.celular != null ? data.celular : '';
                            this.DatoOriginal.email=data.user.email;

                            this.changeCssClassRFC=this.changeCssClassCURP=this.changeCssClassNombre=
                            this.changeCssClassPaterno=this.changeCssClassMaterno=this.changeCssClassDomicilio=
                            this.changeCssClassLocalidad=this.changeCssClassMunicipio=this.changeCssClassEstado=
                            this.changeCssClassTelefono=this.changeCssClassCelular=this.changeCssClassEmail=false;

                            this.actualizar=false;
                         }).catch(errors => {
                             console.log(errors);
                         })
                }else{
                   toastr.error("¡No existe informacion que actualizar!");
                }
            },
            VerificarCambio(prop){
                let datoModificado='';
                if(prop === 'email'){
                    datoModificado=this.docente.user.email;
                }else{
                    datoModificado=this.docente[prop];
                }

                if(this.DatoOriginal[prop]!=datoModificado){

                    switch(prop){
                        case 'rfc': this.changeCssClassRFC=true;
                                    break;
                        case 'curp': this.changeCssClassCURP=true;
                                    break;
                        case 'nombre': this.changeCssClassNombre=true;
                                      break;
                        case 'appaterno': this.changeCssClassPaterno=true;
                                        break;
                        case 'apmaterno': this.changeCssClassMaterno=true;
                                        break;
                        case 'domicilio': this.changeCssClassDomicilio=true;
                                        break;
                        case 'localidad': this.changeCssClassLocalidad=true;
                                        break;
                        case 'municipio': this.changeCssClassMunicipio=true;
                                        break;
                        case 'estado': this.changeCssClassEstado=true;
                                        break;
                        case 'telefono': this.changeCssClassTelefono=true;
                                        break;
                        case 'celular': this.changeCssClassCelular=true;
                                        break;
                        case 'email': this.changeCssClassEmail=true;
                                        break;

                    }
                }else{
                    switch(prop){
                        case 'rfc': this.changeCssClassRFC=false;
                                    break;
                        case 'curp': this.changeCssClassCURP=false;
                                    break;
                        case 'nombre': this.changeCssClassNombre=false;
                                      break;
                        case 'appaterno': this.changeCssClassPaterno=false;
                                        break;
                        case 'apmaterno': this.changeCssClassMaterno=false;
                                        break;
                        case 'domicilio': this.changeCssClassDomicilio=false;
                                        break;
                        case 'localidad': this.changeCssClassLocalidad=false;
                                        break;
                        case 'municipio': this.changeCssClassMunicipio=false;
                                        break;
                        case 'estado': this.changeCssClassEstado=false;
                                        break;
                        case 'telefono': this.changeCssClassTelefono=false;
                                        break;
                        case 'celular': this.changeCssClassCelular=false;
                                        break;
                        case 'email': this.changeCssClassEmail=false;
                                        break;

                    }
                }
                if((this.changeCssClassRFC    || this.changeCssClassCURP ||   this.changeCssClassNombre ||
                    this.changeCssClassPaterno || this.changeCssClassMaterno || this.changeCssClassDomicilio ||
                    this.changeCssClassLocalidad || this.changeCssClassMunicipio || this.changeCssClassEstado ||
                    this.changeCssClassTelefono ||  this.changeCssClassCelular || this.changeCssClassEmail )){
                        this.actualizar=true;
                }else{
                        this.actualizar=false;
                }



            }
        }
    }
</script>

<style lang="stylus" scoped>

</style>
