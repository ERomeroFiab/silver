@extends('listado')

@section('customcss')
    <style>
        #tabla_contrat_partiel_condition_fiancieres_filter {
            display: none;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="my-0">Tabla: <b>contrat_partiel_condition_fiancieres</b></h4>
                <p>(Total: {{ count( config('tablas')['contrat_partiel_condition_fiancieres'] ) }} columnas)</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3 form-group">
                        <label>REMUNERATION:</label>
                        <input id="input__REMUNERATION" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>SEUIL_MAX:</label>
                        <input id="input__SEUIL_MAX" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>SEUIL_MIN:</label>
                        <input id="input__SEUIL_MIN" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>VALEUR:</label>
                        <input id="input__VALEUR" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>YEAR:</label>
                        <input id="input__YEAR" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>RUT:</label>
                        <input id="input__RUT" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>RAZON_SOCIAL:</label>
                        <input id="input__RAZON_SOCIAL" type="text" class="form-control">
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
                        <table id="tabla_contrat_partiel_condition_fiancieres" class="table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>1 REMUNERATION</th>
                                    <th>2 SEUIL_MAX</th>
                                    <th>3 SEUIL_MIN</th>
                                    <th>4 VALEUR</th>
                                    <th>5 YEAR</th>
                                    <th>5 Rut</th>
                                    <th>6 RAZON_SOCIAL</th>
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
        let TABLA_contrat_partiel_condition_fiancieres;
        $(document).ready(function() {

            TABLA_contrat_partiel_condition_fiancieres = $('#tabla_contrat_partiel_condition_fiancieres').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_contrat_partiel_condition_fiancieres') }}",
                    // error: function(jqXHR, ajaxOptions, thrownError) {
                    //     console.log("error: " + thrownError + "\n\n" + "status: " + jqXHR.statusText + "\n\n" + "response: "+jqXHR.responseText + "\n\n" + "options: "+ajaxOptions.responseText);
                    // },
                    data: function ( d ) {
                        d.SEARCH_BY_REMUNERATION             = $('#input__REMUNERATION').val();
                        d.SEARCH_BY_SEUIL_MAX                = $('#input__SEUIL_MAX').val();
                        d.SEARCH_BY_SEUIL_MIN                = $('#input__SEUIL_MIN').val();
                        d.SEARCH_BY_VALEUR                   = $('#input__VALEUR').val();
                        d.SEARCH_BY_YEAR                     = $('#input__YEAR').val();
                        d.SEARCH_BY_RUT                      = $('#input__RUT').val();
                        d.SEARCH_BY_RAZON_SOCIAL             = $('#input__RAZON_SOCIAL').val();
                    }
                },
                columns: [
                    { data: "REMUNERATION"},
                    { data: "SEUIL_MAX"},
                    { data: "SEUIL_MIN"},
                    { data: "VALEUR"},
                    { data: "YEAR"},
                    { data: "rut"},
                    { data: "razon_social"},
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

        function buscar() {
            TABLA_contrat_partiel_condition_fiancieres.draw();
        }

        // Refilter the table
        // $('#input__search_by_fecha_starts, #input__search_by_fecha_ends').on('change', function() {
        //     TABLA_contrat_partiel_condition_fiancieres.draw();
        // });

        // Pintar en verde los inputs que contienen algo
        $( "#input__REMUNERATION" ).change(function() { agregar_quitar_bg_success('input__REMUNERATION'); });
        $( "#input__SEUIL_MAX" ).change(function() { agregar_quitar_bg_success('input__SEUIL_MAX'); });
        $( "#input__SEUIL_MIN" ).change(function() { agregar_quitar_bg_success('input__SEUIL_MIN'); });
        $( "#input__VALEUR" ).change(function() { agregar_quitar_bg_success('input__VALEUR'); });
        $( "#input__YEAR" ).change(function() { agregar_quitar_bg_success('input__YEAR'); });
        $( "#input__RUT" ).change(function() { agregar_quitar_bg_success('input__RUT'); });
        $( "#input__RAZON_SOCIAL" ).change(function() { agregar_quitar_bg_success('input__RAZON_SOCIAL'); });

        function agregar_quitar_bg_success(id){
            if ( $(`#${id}`).val() !== "" ) {
                $(`#${id}`).addClass('bg-success');
            } else {
                $(`#${id}`).removeClass('bg-success');
            }
        }

    </script>
@endsection