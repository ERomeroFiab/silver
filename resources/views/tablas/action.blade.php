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
                <h3 class="my-0">Tabla: <b>action</b></h3>
                <p>(Total: {{ count( config('tablas')['action'] ) }} columnas)</p>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-3 form-group">
                        <label>CATEGORIE:</label>
                        <input id="input__CATEGORIE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>EMPLACEMENT:</label>
                        <input id="input__EMPLACEMENT" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>E_MAIL:</label>
                        <input id="input__E_MAIL" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>NOM:</label>
                        <input id="input__NOM" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>NOTE:</label>
                        <input id="input__NOTE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>RESULTAT:</label>
                        <input id="input__RESULTAT" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>SUIVI_PAR:</label>
                        <input id="input__SUIVI_PAR" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>TYPE_EVENEMENT:</label>
                        <input id="input__TYPE_EVENEMENT" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>SYS_DATE_MODIFICATION:</label>
                        <input id="input__SYS_DATE_MODIFICATION" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>RUT:</label>
                        <input id="input__RUT" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>RAZON SOCIAL:</label>
                        <input id="input__RAZON_SOCIAL" type="text" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="btn btn-sm btn-success float-right" type="button" onclick="buscar()">Buscar</button>
                        </div>
                    </div>
                </div>

                    <div class="col-12" style="overflow-x: scroll;">
                        <table id="tabla_action" class="table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>1 CATEGORIE</th>
                                    <th>2 EMPLACEMENT</th>
                                    <th>3 E_MAIL</th>
                                    <th>4 NOM</th>
                                    <th>5 NOTE</th>
                                    <th>6 RESULTAT</th>
                                    <th>7 SUIVI_PAR</th>
                                    <th>8 TYPE_EVENEMENT</th>
                                    <th>9 SYS_DATE_MODIFICATION</th>
                                    <th>10 RUT</th>
                                    <th>11 RAZON SOCIAL</th>
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
        let TABLA_ACTION;
        $(document).ready(function() {

            TABLA_ACTION = $('#tabla_action').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_action') }}",
                    // error: function(jqXHR, ajaxOptions, thrownError) {
                    //     console.log("error: " + thrownError + "\n\n" + "status: " + jqXHR.statusText + "\n\n" + "response: "+jqXHR.responseText + "\n\n" + "options: "+ajaxOptions.responseText);
                    // },
                    data: function ( d ) {
                        d.SEARCH_BY_CATEGORIE              = $('#input__CATEGORIE').val();
                        d.SEARCH_BY_EMPLACEMENT            = $('#input__EMPLACEMENT').val();
                        d.SEARCH_BY_E_MAIL                 = $('#input__E_MAIL').val();
                        d.SEARCH_BY_NOM                    = $('#input__NOM').val();
                        d.SEARCH_BY_NOTE                   = $('#input__NOTE').val();
                        d.SEARCH_BY_RESULTAT               = $('#input__RESULTAT').val();
                        d.SEARCH_BY_SUIVI_PAR              = $('#input__SUIVI_PAR').val();
                        d.SEARCH_BY_TYPE_EVENEMENT         = $('#input__TYPE_EVENEMENT').val();
                        d.SEARCH_BY_SYS_DATE_MODIFICATION  = $('#input__SYS_DATE_MODIFICATION').val();
                        d.SEARCH_BY_RUT                    = $('#input__RUT').val();
                        d.SEARCH_BY_RAZON_SOCIAL           = $('#input__RAZON_SOCIAL').val();
                    }
                },
                columns: [
                    { data: "CATEGORIE"},
                    { data: "EMPLACEMENT"},
                    { data: "E_MAIL"},
                    { data: "NOM"},
                    { data: "NOTE"},
                    { data: "RESULTAT"},
                    { data: "SUIVI_PAR"},
                    { data: "TYPE_EVENEMENT"},
                    { data: "SYS_DATE_MODIFICATION"},
                    { data: "RUT"},
                    { data: "RAZON_SOCIAL"},
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
                    title: "tabla action - " + new Date().toLocaleString(),
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
            TABLA_ACTION.draw();
        }

        // Refilter the table
        // $('#input__search_by_fecha_starts, #input__search_by_fecha_ends').on('change', function() {
        //     TABLA_ORDENES.draw();
        // });

        // Pintar en verde los inputs que contienen algo
        $( "#input__CATEGORIE" ).change(function() { agregar_quitar_bg_success('input__CATEGORIE'); });
        $( "#input__EMPLACEMENT" ).change(function() { agregar_quitar_bg_success('input__EMPLACEMENT'); });
        $( "#input__E_MAIL" ).change(function() { agregar_quitar_bg_success('input__E_MAIL'); });
        $( "#input__NOM" ).change(function() { agregar_quitar_bg_success('input__NOM'); });
        $( "#input__NOTE" ).change(function() { agregar_quitar_bg_success('input__NOTE'); });
        $( "#input__RESULTAT" ).change(function() { agregar_quitar_bg_success('input__RESULTAT'); });
        $( "#input__SUIVI_PAR" ).change(function() { agregar_quitar_bg_success('input__SUIVI_PAR'); });
        $( "#input__TYPE_EVENEMENT" ).change(function() { agregar_quitar_bg_success('input__TYPE_EVENEMENT'); });
        $( "#input__SYS_DATE_MODIFICATION" ).change(function() { agregar_quitar_bg_success('input__SYS_DATE_MODIFICATION'); });
        $( "#input__RUT" ).change(function() { agregar_quitar_bg_success('input__RUT'); });
        $( "#input__RAZON_SOCIAL" ).change(function() { agregar_quitar_bg_success('input__RAZON_SOCIAL'); });
        //$( "#input__search_by_fecha_starts" ).change(function() { agregar_quitar_bg_success('input__search_by_fecha_starts'); });
        //$( "#input__search_by_fecha_ends" ).change(function() { agregar_quitar_bg_success('input__search_by_fecha_ends'); });

        // function agregar_quitar_bg_success(id){
        //     if ( $(`#${id}`).val() !== "" ) {
        //         $(`#${id}`).addClass('bg-success');
        //     } else {
        //         $(`#${id}`).removeClass('bg-success');
        //     }
        // }

    </script>
@endsection