@extends('listado')

@section('customcss')
    <style>
        #tabla_contrat_detail_produit_filter {
            display: none;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="my-0">Tabla: <b>contrat_detail_produit</b></h4>
                <p>(Total: {{ count( config('tablas')['contrat_detail_produit'] ) }} columnas)</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3 form-group">
                        <label>NO_CONTRAT_PARTIEL:</label>
                        <input id="input__NO_CONTRAT_PARTIEL" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>PRODUIT:</label>
                        <input id="input__PRODUIT" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>RUT:</label>
                        <input id="input__RUT" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>SYS_DATE_MODIFICATION_DESDE:</label>
                        <input id="input__SYS_DATE_MODIFICATION_DESDE" type="date" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>SYS_DATE_MODIFICATION_HASTA:</label>
                        <input id="input__SYS_DATE_MODIFICATION_HASTA" type="date" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>CANTIDAD_DE_MISSIONS:</label>
                        <input id="input__CANTIDAD_DE_MISIONS" type="text" class="form-control">
                    </div>
                </div>               
            </div>
            <div class="row">
                <div class="col-12">
                    <button class="btn btn-sm btn-success float-right"  type="button" onclick="buscar()">Buscar</button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12" style="overflow-x: scroll;">
                        <table id="tabla_contrat_detail_produit" class="table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>1 NO_CONTRAT_PARTIEL</th>
                                    <th>2 PRODUIT</th>
                                    <th>3 Rut</th>
                                    <th>4 SYS_DATE_MODIFICATION</th>
                                    <th>5 CANTIDAD_DE_MISIONS</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- SERVER SIDE RENDERING --}}
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div> <!-- End card -->
    </div>
</div>
@endsection

@section('customjs')
    
    <script>
        let TABLA_CONTRAT_DETAIL_PRODUIT;
        $(document).ready(function() {

            TABLA_CONTRAT_DETAIL_PRODUIT = $('#tabla_contrat_detail_produit').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_contrat_detail_produit') }}",
                    // error: function(jqXHR, ajaxOptions, thrownError) {
                    //     console.log("error: " + thrownError + "\n\n" + "status: " + jqXHR.statusText + "\n\n" + "response: "+jqXHR.responseText + "\n\n" + "options: "+ajaxOptions.responseText);
                    // },
                    data: function ( d ) {
                        d.SEARCH_BY_NO_CONTRAT_PARTIEL                      =$('#input__NO_CONTRAT_PARTIEL').val();
                        d.SEARCH_BY_PRODUIT                                 =$('#input__PRODUIT').val();
                        d.SEARCH_BY_RUT                                     =$('#input__RUT').val();
                        d.SEARCH_BY_SYS_DATE_MODIFICATION_DESDE             =$('#input__SYS_DATE_MODIFICATION_DESDE').val();
                        d.SEARCH_BY_SYS_DATE_MODIFICATION_HASTA             =$('#input__SYS_DATE_MODIFICATION_HASTA').val();
                        d.SEARCH_BY_CANTIDAD_DE_MISIONS                     =$('#input__CANTIDAD_DE_MISIONS').val();
                    } 
                },
                columns: [
                    { data: "NO_CONTRAT_PARTIEL"},
                    { data: "PRODUIT"},
                    { data: "rut"},
                    { data: "SYS_DATE_MODIFICATION"},
                    { data: "missions_count"},
                    { data: 'action', orderable: false, searchable: false}
                ],
                // order: [[ 1, 'desc' ]],
                pageLength: 10,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json',
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    title: "tabla contrat_detail_produit - " + new Date().toLocaleString(),
                    className: "bg-info",
                    exportOptions: {
                        columns: ':not(.no_exportar)'
                    },
                    action: newExportAction
                }],
            });

            // función para exportar el excel con todas las filas
            function newExportAction(e, dt, button, config) {
                var self = this;
                var oldStart = dt.settings()[0]._iDisplayStart;
                dt.one('preXhr', function (e, s, data) {
                    // Just this once, load all data from the server...
                    data.start = 0;
                    data.length = 2147483647;
                    dt.one('preDraw', function (e, settings) {
                        // Call the original action function
                        if (button[0].className.indexOf('buttons-copy') >= 0) {
                            $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
                        } else if (button[0].className.indexOf('buttons-excel') >= 0) {
                            $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                                $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                                $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
                        } else if (button[0].className.indexOf('buttons-csv') >= 0) {
                            $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
                                $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :
                                $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
                        } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
                            $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                                $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
                                $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
                        } else if (button[0].className.indexOf('buttons-print') >= 0) {
                            $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
                        }
                        dt.one('preXhr', function (e, s, data) {
                            // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                            // Set the property to what it was before exporting.
                            settings._iDisplayStart = oldStart;
                            data.start = oldStart;
                        });
                        // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                        setTimeout(dt.ajax.reload, 0);
                        // Prevent rendering of the full data to the DOM
                        return false;
                    });
                });
                // Requery the server with the new one-time export settings
                dt.ajax.reload();
            }

        });

        function buscar() {
            TABLA_CONTRAT_DETAIL_PRODUIT.draw();
        }


        // Refilter the table
        // $('#input__search_by_fecha_starts, #input__search_by_fecha_ends').on('change', function() {
        //     TABLA_CONTRAT_DETAIL_PRODUIT.draw();
        // });

        //Pintar en verde los inputs que contienen algo
        $( "#input__NO_CONTRAT_PARTIEL" ).change(function() { agregar_quitar_bg_success('input__NO_CONTRAT_PARTIEL'); });
        $( "#input__PRODUIT" ).change(function() { agregar_quitar_bg_success('input__PRODUIT'); });
        $( "#input__RUT" ).change(function() { agregar_quitar_bg_success('input__RUT'); });
        $( "#input__SYS_DATE_MODIFICATION" ).change(function() { agregar_quitar_bg_success('input__SYS_DATE_MODIFICATION'); });
        $( "#input__CANTIDAD_DE_MISIONS" ).change(function() { agregar_quitar_bg_success('input__CANTIDAD_DE_MISIONS'); });
        


        function agregar_quitar_bg_success(id){
            if ( $(`#${id}`).val() !== "" ) {
                $(`#${id}`).addClass('bg-success');
            } else {
                $(`#${id}`).removeClass('bg-success');
            }
        }

    </script>
@endsection