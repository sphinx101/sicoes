<template>
  <div class="col-md-12">
    <div class="card bg-light mb-0 border-secondary">
      <div class="card-header bg-purple"></div>
      <div class="card-body vld-parent">
        <template>
            <loading
                :active.sync="isLoading"
                :can-cancel="false"
                :is-full-page="fullPage"
            ></loading>
            <table
                id="tableDocentes"
                class="table table-sm table-striped table-hover table-bordered dt-responsive nowrap"
                style="width: 100%"
                cellspacing="0"

            >
                <thead class="thead-dark">
                <tr>
                    <th>Id</th>
                    <th>Foto</th>
                    <th>Nombre</th>
                    <th>RFC</th>
                    <th>CURP</th>

                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                <tr v-for="docente in docentes" :key="docente.id">
                    <th scope="row" class=" d-flex justify-content-center" v-text="docente.id"></th>
                    <td >
                        <img
                            class="user-image img-circle elevation-2"
                            :src="'http://sicoes.homestead/storage/photos/docentes/'+docente.photo_name"
                            :alt="docente.photo_name"
                            width="40px"
                            height="40px">
                    </td>
                    <td v-text="docente.nombre_completo"></td>
                    <td v-text="docente.rfc"></td>
                    <td v-text="docente.curp"></td>


                    <td>
                        <a :href="'docentes/'+docente.id"
                            class="btn btn-success btn-sm"
                            role="button"
                            title="Ver"><i class="fas fa-eye" aria-hidden="true"></i></a>
                        <a href="#"
                            @click.prevent="editData(docente)"
                            class="btn btn-warning btn-sm"
                            role="button"
                            title="Editar"><i class="fas fa-edit" aria-hidden="true"></i></a>
                        <a href="#"
                            @click.prevent="DialogRemoveData(docente)"
                            class="btn btn-danger btn-sm"
                            role="button"
                            title="Eliminar"><i class="fas fa-eraser" aria-hidden="true"></i></a>
                    </td>
                </tr>
                </tbody>
                <!--tfoot class="thead-dark" >
                    <tr>
                        <th width="25px">Id</th>

                        <th width="80px">Nombre</th>
                        <th>RFC</th>
                        <th>CURP</th>
                        <th># Tel.</th>
                        <th># Cel.</th>
                        <th width="150px" >Acciones</th>
                    </tr>
                </!--tfoot-->
            </table>
        </template>
      </div>
      <div class="card-footer"></div>
    </div>
    <div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="MyModalLabelEdit" aria-hidden="true">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="MyModalLabelEdit">Editar Docente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary">Guardar Cambios</button>
            </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>

//import datatables from 'datatables.net-bs4';
//require ('datatables.net-buttons/js/dataTables.buttons');
//require('datatables.net-buttons/js/buttons.html5');
//import print from 'datatables.net-buttons/js/buttons.print';

//import pdfMake from 'pdfmake/build/pdfmake';
//import pdfFont from 'pdfmake/build/vfs_fonts';

//pdfMake.vfs=pdfFonts.pdfMake.vfs;

import { getDocentes, retrievePOSTdocentes, destroyDELETEdocente } from "../../../api/docente";
import Loading from 'vue-loading-overlay';

export default {
  name: "ListaDocente",
  components:{Loading},
  data() {
    return {
        isLoading: true,
        fullPage: true,
        docentes: [],
    };
  },
  async created() {
    await retrievePOSTdocentes().then(({ data }) => {
      //console.log(data);
      this.docentes = data;
      this.DataTable();

   });
    toastr.options.progressBar = true;
    toastr.options.preventDuplicates = true;
    toastr.options.timeOut = 3000;
    toastr.options.positionClass = "toast-bottom-right";
    toastr.options.closeButton = true;
  },
  methods: {
        DataTable(){
            var this_self=this;
            this.$nextTick(()=>{
                $('#tableDocentes').DataTable({
                   /* processing: true,
                    serverSide: true,
                    ajax: {
                        url: 'ajax/docentes',
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
                        }

                    },
                    columns:[
                        {data: 'id', name: 'id'},
                        {data: 'nombre_completo', name: 'nombre_completo'},
                        {data: 'rfc', name: 'rfc'},
                        {data: 'curp', name: 'curp'},
                        {data: 'telefono', name: 'telefono'},
                        {data: 'celular', name: 'celular'},
                        {data: 'acciones', name: 'acciones'}
                    ],*/
                    "initComplete": function(settings, json) {
                            //console.log( 'Cargando is: '+this_self.isLoading );
                            this_self.isLoading=false;
                    },
                    //autoWidth: false,
                    columnDefs:[
                        {  targets: 0, width: '30px'},
                        {  targets: 1, width: '20px'},
                        {  targets: 2, width: '100px'},
                        {  targets: 3, width: '100px'},
                        {  targets: 4, width: '50px'},
                        {  targets: 5, width: '100px'},
                    ],
                    language:{
                        url:'//cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json',
                        buttons: {
                            copyTitle: 'Copiado al Portapapeles',
                            copySuccess: {
                                _: '%d registros copiados',
                                1: '1 registro copiado'
                            }
                        }
                    },
                    order: [[0]],
                    dom: "<'row'<'col-sm-12 col-md-3'B><'col-sm-12 col-md-5 d-flex justify-content-center'l><'col-sm-12 col-md-4'f>>" +
                         "<'row'<'col-sm-12'rt>>" +
                         "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    buttons: [
                        {
                            extend: 'copyHtml5',
                            text: '<i class="far fa-copy"></i>',
                            titleAttr: 'Copiar a Portapapeles',
                            className: 'btn  btn-outline-secondary'
                        },
                        {
                            extend: 'excelHtml5',
                            text:      '<i class="far fa-file-excel"></i>',
                            titleAttr: 'Exportar a Excel',
                            className: 'btn  btn-outline-secondary'

                        },
                        {
                            extend: 'pdfHtml5',
                            text:      '<i class="far fa-file-pdf"></i>',
                            titleAttr: 'Exportar a PDF',
                            className: 'btn  btn-outline-secondary',
                            download: 'open'
                        },
                        {
                            extend: 'print',
                            text: '<i class="fas fa-print"></i>',
                            titleAttr: 'Enviar a Impresora',
                            className: 'btn  btn-outline-secondary'
                        }
                    ],

                });



            });
        },
        editData(docente){
            //console.log(docente);
            var formData = new FormData();
            formData.append("centrotrabajo_id", docente.centrotrabajo_id);
            formData.append("rfc", docente.rfc);
            formData.append("curp", docente.curp);
            formData.append("nombre", docente.nombre);
            formData.append("appaterno", docente.appaterno);
            formData.append("apmaterno", docente.apmaterno);
            formData.append("domicilio", docente.domicilio);
            formData.append("localidad", docente.localidad);
            formData.append("municipio", docente.municipio);
            formData.append("estado", docente.estado);
            formData.append("telefono", docente.telefono);
            formData.append("celular", docente.celular);
            formData.append("email", docente.user.email);
            formData.append("type", docente.user.type);
            //console.log(formData.getAll('email'));
            $('#modalEdit').modal('show');

        },
        DialogRemoveData(docente){

            this.$swal({
                title: '¿Estas seguro?',
                //text: "Se eliminara al docente: "+docente.nombre_completo,
                html:
                    '¡Se eliminara al Docente: <b>'+docente.nombre_completo+'!</b>, ',

                icon: 'warning',
                imageUrl: 'http://sicoes.homestead/storage/photos/docentes/'+docente.photo_name,
                imageWidth: 200,
                imageHeight: 200,
                imageAlt: docente.nombre,
                showCancelButton: true,
                confirmButtonColor: '#605ca8',
                cancelButtonColor: '#d33',
                cancelButtonText: 'Cancelar',
                confirmButtonText: '¡Si, seguro!'
            }).then((result) => {
                console.log(result);
                if (result.isConfirmed) {
                    //this.$swal('Guardado!', '', 'success')
                    this.removeData(docente.id);

                }
            });
        },
        async removeData(id){
           await destroyDELETEdocente(id).then( response =>{
               console.log(response);

               toastr.success("¡Registro eliminado con exito!");
               retrievePOSTdocentes().then(({ data }) => {
                    //console.log(data);
                    this.docentes = data;
                    $('#tableDocentes').DataTable();
               });

           }).catch(errors => {
               console.log(errors);
           });

        }

    },
};
</script>

<style lang="stylus" scoped>
table.dataTable.dataTable_width_auto
    width:auto


</style>

