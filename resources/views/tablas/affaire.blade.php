@extends('listado')

@section('customcss')
    <style>
        #tabla_action_filter {
            display: none;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="my-0">Tabla: <b>affaire</b></h4>
                <p>(Total: {{ count( config('tablas')['affaire'] ) }} columnas)</p>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-3 form-group">
                        <label>ID_AFFAIRE:</label>
                        <input id="input__ID_AFFAIRE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>CIVILITE:</label>
                        <input id="input__CIVILITE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>DATE_PREVISIONNEL:</label>
                        <input id="input__DATE_PREVISIONNEL" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>DATE_SIGNATURE:</label>
                        <input id="input__DATE_SIGNATURE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>FAMILLE:</label>
                        <input id="input__FAMILLE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>PRENOM:</label>
                        <input id="input__PRENOM" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>NOM:</label>
                        <input id="input__NOM" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>NO_AFFAIRE:</label>
                        <input id="input__NO_AFFAIRE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>PHASE:</label>
                        <input id="input__PHASE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>PROBABILITE:</label>
                        <input id="input__PROBABILITE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>PRODUIT:</label>
                        <input id="input__PRODUIT" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>STATUT:</label>
                        <input id="input__STATUT" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>SUIVI_PAR:</label>
                        <input id="input__SUIVI_PAR" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>TOTAL_PREVISIONNEL:</label>
                        <input id="input__TOTAL_PREVISIONNEL" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>ACTIONS_COUNT:</label>
                        <input id="input__ACTIONS_COUNT" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>RUT:</label>
                        <input id="input__RUT" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>RAZON SOCIAL:</label>
                        <input id="input__RAZON_SOCIAL" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>SYS_DATE_MODIFICATION:</label>
                        <input id="input__SYS_DATE_MODIFICATION" type="text" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-sm btn-success float-right" type="button" onclick="buscar()">Buscar</button>
                    </div>
                </div>
                    
                    <div class="col-12" style="overflow-x: scroll;">
                        <table id="tabla_action" class="table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>1 ID_AFFAIRE</th>
                                    <th>2 CIVILITE</th>
                                    <th>3 DATE_PREVISIONNEL</th>
                                    <th>4 DATE_SIGNATURE</th>
                                    <th>5 FAMILLE</th>
                                    <th>6 PRENOM</th>
                                    <th>7 NOM</th>
                                    <th>8 NO_AFFAIRE</th>
                                    <th>9 PHASE</th>
                                    <th>10 PROBABILITE</th>
                                    <th>11 PRODUIT</th>
                                    <th>12 STATUT</th>
                                    <th>13 SUIVI_PAR</th>
                                    <th>14 TOTAL_PREVISIONNEL</th>
                                    <th>15 ACTIONS_COUNT</th>
                                    <th>16 RUT</th>
                                    <th>17 RAZON_SOCIAL</th>
                                    <th>18 SYS_DATE_MODIFICATION</th>
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
        let TABLA_ORDENES;
        $(document).ready(function() {

            TABLA_ORDENES = $('#tabla_action').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_affaire') }}",
                    // error: function(jqXHR, ajaxOptions, thrownError) {
                    //     console.log("error: " + thrownError + "\n\n" + "status: " + jqXHR.statusText + "\n\n" + "response: "+jqXHR.responseText + "\n\n" + "options: "+ajaxOptions.responseText);
                    // },
                    data: function ( d ) {
                        d.SEARCH_BY_ID_AFFAIRE                      = $('#input__ID_AFFAIRE').val();
                        d.SEARCH_BY_CIVILITE                        = $('#input__CIVILITE').val();
                        d.SEARCH_BY_DATE_PREVISIONNEL               = $('#input__DATE_PREVISIONNEL').val();
                        d.SEARCH_BY_DATE_SIGNATURE                  = $('#input__DATE_SIGNATURE').val();
                        d.SEARCH_BY_FAMILLE                         = $('#input__FAMILLE').val();
                        d.SEARCH_BY_PRENOM                          = $('#input__PRENOM').val();
                        d.SEARCH_BY_NOM                             = $('#input__NOM').val();
                        d.SEARCH_BY_NO_AFFAIRE                      = $('#input__NO_AFFAIRE').val();
                        d.SEARCH_BY_PHASE                           = $('#input__PHASE').val();
                        d.SEARCH_BY_PROBABILITE                     = $('#input__PROBABILITE').val();
                        d.SEARCH_BY_PRODUIT                         = $('#input__PRODUIT').val();
                        d.SEARCH_BY_STATUT                          = $('#input__STATUT').val();
                        d.SEARCH_BY_SUIVI_PAR                       = $('#input__SUIVI_PAR').val();
                        d.SEARCH_BY_TOTAL_PREVISIONNEL              = $('#input__TOTAL_PREVISIONNEL').val();
                        d.SEARCH_BY_ACTIONS_COUNT                   = $('#input__ACTIONS_COUNT').val();
                        d.SEARCH_BY_RUT                             = $('#input__RUT').val();
                        d.SEARCH_BY_RAZON_SOCIAL                    = $('#input__RAZON_SOCIAL').val();
                        d.SEARCH_BY_SYS_DATE_MODIFICATION           = $('#input__SYS_DATE_MODIFICATION').val();
                    }
                },
                columns: [
                    { data: "ID_AFFAIRE"},
                    { data: "CIVILITE"},
                    { data: "DATE_PREVISIONNEL"},
                    { data: "DATE_SIGNATURE"},
                    { data: "FAMILLE"},
                    { data: "PRENOM"},
                    { data: "NOM"},
                    { data: "NO_AFFAIRE"},
                    { data: "PHASE"},
                    { data: "PROBABILITE"},
                    { data: "PRODUIT"},
                    { data: "STATUT"},
                    { data: "SUIVI_PAR"},
                    { data: "TOTAL_PREVISIONNEL"},
                    { data: "actions_count"},
                    { data: "rut"},
                    { data: "razon_social"},
                    { data: "SYS_DATE_MODIFICATION"},
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
                    title: "tabla affaire - " + new Date().toLocaleString(),
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
        function buscar(){
            TABLA_ORDENES.draw();
        }


        // Refilter the table
        // $('#input__search_by_fecha_starts, #input__search_by_fecha_ends').on('change', function() {
        //     TABLA_ORDENES.draw();
        // });

        // Pintar en verde los inputs que contienen algo
        $( "#input__ID_AFFAIRE" ).change(function() { agregar_quitar_bg_success('input__ID_AFFAIRE'); });
        $( "#input__CIVILITE" ).change(function() { agregar_quitar_bg_success('input__CIVILITE'); });
        $( "#input__DATE_PREVISIONNEL" ).change(function() { agregar_quitar_bg_success('input__DATE_PREVISIONNEL'); });
        $( "#input__DATE_SIGNATURE" ).change(function() { agregar_quitar_bg_success('input__DATE_SIGNATURE'); });
        $( "#input__FAMILLE" ).change(function() { agregar_quitar_bg_success('input__FAMILLE'); });
        $( "#input__PRENOM" ).change(function() { agregar_quitar_bg_success('input__PRENOM'); });
        $( "#input__NOM" ).change(function() { agregar_quitar_bg_success('input__NOM'); });
        $( "#input__NO_AFFAIRE" ).change(function() { agregar_quitar_bg_success('input__NO_AFFAIRE'); });
        $( "#input__PHASE" ).change(function() { agregar_quitar_bg_success('input__PHASE'); });
        $( "#input__PROBABILITE" ).change(function() { agregar_quitar_bg_success('input__PROBABILITE'); });
        $( "#input__PRODUIT" ).change(function() { agregar_quitar_bg_success('input__PRODUIT'); });
        $( "#input__STATUT" ).change(function() { agregar_quitar_bg_success('input__STATUT'); });
        $( "input__SUIVI_PAR" ).change(function() { agregar_quitar_bg_success('input__SUIVI_PAR'); });
        $( "#input__TOTAL_PREVISIONNEL" ).change(function() { agregar_quitar_bg_success('input__TOTAL_PREVISIONNEL'); });
        $( "#input__ACTIONS_COUNT" ).change(function() { agregar_quitar_bg_success('input__ACTIONS_COUNT'); });
        $( "#input__RUT" ).change(function() { agregar_quitar_bg_success('input__RUT'); });
        $( "#input__RAZON_SOCIAL" ).change(function() { agregar_quitar_bg_success('input__RAZON_SOCIAL'); });
        $( "#input__SYS_DATE_MODIFICATION" ).change(function() { agregar_quitar_bg_success('input__SYS_DATE_MODIFICATION'); });

        // $( "#input__search_by_fecha_starts" ).change(function() { agregar_quitar_bg_success('input__search_by_fecha_starts'); });
        // $( "#input__search_by_fecha_ends" ).change(function() { agregar_quitar_bg_success('input__search_by_fecha_ends'); });

        function agregar_quitar_bg_success(id){
            if ( $(`#${id}`).val() !== "" ) {
                $(`#${id}`).addClass('bg-success');
            } else {
                $(`#${id}`).removeClass('bg-success');
            }
        }

    </script>
@endsection