<template>
  <div class="col-md-12">
    <div class="card bg-light mb-0 border-secondary">
      <div class="card-header bg-purple"></div>
      <div class="card-body vld-parent">
        <template>

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
                <tbody></tbody>
            </table>
        </template>
      </div>
      <div class="card-footer"></div>
    </div>
  </div>
</template>

<script>

import { destroyDELETEdocente } from "../../../api/docente";


export default {
  name: "ListaDocente",


  created() {

      this.DataTable();

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
                    processing: true,
                    serverSide: true,
                    deferRender: true,
                    ajax: {
                        url: 'ajax/docentes',
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('input[name="_token"]').attr('value')
                        }
                    },
                    /*columns:[
                        {targets: 0, data: 'id', name: 'id', width: '30px'},
                        {
                            targets: 1,
                            data: 'photo_name',
                            name: 'photo_name',
                            width: '20px',
                            render: function(data,type,row,meta){
                                return
                                '<img class="user-image img-circle elevation-2" src="http://sicoes.homestead/storage/photos/docentes/'+
                                data+'" width="40px" height="40px">';
                            },
                            orderable: false,
                            searchable: false
                        },
                        {targets: 2, data: 'nombre_completo', width: '100px'},
                        {targets: 3, data: 'rfc', width: '100px'},
                        {targets: 4, data: 'curp', width:'50px'},
                        {targets: 5, data: 'acciones', name: 'acciones', orderable: false, searchable: false}
                    ],*/
                    /*initComplete: function(settings, json) {
                            //console.log( 'Cargando is: '+this_self.isLoading );
                            this_self.isLoading=false;
                    },*/
                    //autoWidth: false,
                    columns:[
                        {data: 'id', name: 'id'},
                        {data: 'user.photo_name', name: 'user.photo_name'},
                        {data: 'nombre_completo', name: 'nombre_completo'},
                        {data: 'rfc', name: 'rfc'},
                        {data: 'curp', name: 'curp'},

                       // {data: 'acciones', name: 'acciones'}
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
            console.log('Entro metodo editar');
            console.log(docente.id);

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
                    //this.removeData(docente.id);

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
                    this.DataTable();
               });

           }).catch(e => {
               console.log(e);
           });

        }

    },
};
</script>

<style lang="stylus" scoped>
table.dataTable.dataTable_width_auto
    width: auto;


</style>


