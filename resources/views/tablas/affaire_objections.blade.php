@extends('listado')

@section('customcss')
    <style>
        #tabla_affaire_objections_filter {
            display: none;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="my-0">Tabla: <b>affaire_objections</b></h4>
                <p>(Total: {{ count( config('tablas')['affaire_objections'] ) }} columnas)</p>
            </div>
            <div class="card-body">
                <div class="row"><div class="col-3 form-group">
                    <label>COMMENTS:</label>
                    <input id="input__COMMENTS" type="text" class="form-control">
                </div>
                <div class="col-3 form-group">
                    <label>DATE:</label>
                    <input id="input__DATE" type="text" class="form-control">
                </div>
                <div class="col-3 form-group">
                    <label>SOLVED:</label>
                    <input id="input__SOLVED" type="text" class="form-control">
                </div>
                <div class="col-3 form-group">
                    <label>STEP:</label>
                    <input id="input__STEP" type="text" class="form-control">
                </div>
                <div class="col-3 form-group">
                    <label>OBJECTIONS:</label>
                    <input id="input__OBJECTIONS" type="text" class="form-control">
                </div>
                <div class="col-3 form-group">
                    <label>RUT:</label>
                    <input id="input__RUT" type="text" class="form-control">
                </div>
                <div class="col-3 form-group">
                    <label>RAZON_SOCIAL:</label>
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
                        <table id="tabla_affaire_objections" class="table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>1 COMMENTS</th>
                                    <th>2 DATE</th>
                                    <th>3 SOLVED</th>
                                    <th>4 STEP</th>
                                    <th>5 OBJECTIONS</th>
                                    <th>6 RUT</th>
                                    <th>7 RAZON_SOCIAL</th>
                                    <th>8 SYS_DATE_MODIFICATION</th>
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
        let TABLA_AFFAIRE_OBJECTIONS;
        $(document).ready(function() {

            TABLA_AFFAIRE_OBJECTIONS = $('#tabla_affaire_objections').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_affaire_objections') }}",
                    // error: function(jqXHR, ajaxOptions, thrownError) {
                    //     console.log("error: " + thrownError + "\n\n" + "status: " + jqXHR.statusText + "\n\n" + "response: "+jqXHR.responseText + "\n\n" + "options: "+ajaxOptions.responseText);
                    // },
                    data: function ( d ) {
                        d.SEARCH_BY_COMMENTS                  = $('#input__COMMENTS').val();
                        d.SEARCH_BY_DATE                      = $('#input__DATE').val();
                        d.SEARCH_BY_SOLVED                    = $('#input__SOLVED').val();
                        d.SEARCH_BY_STEP                      = $('#input__STEP').val();
                        d.SEARCH_BY_OBJECTIONS                = $('#input__OBJECTIONS').val();
                        d.SEARCH_BY_RUT                       = $('#input__RUT').val();
                        d.SEARCH_BY_RAZON_SOCIAL              = $('#input__RAZON_SOCIAL').val();
                        d.SEARCH_BY_SYS_DATE_MODIFICATION     = $('#input__SYS_DATE_MODIFICATION').val();
                        
                    }
                },
                columns: [
                    { data: "COMMENTS"},
                    { data: "DATE"},
                    { data: "SOLVED"},
                    { data: "STEP"},
                    { data: "OBJECTIONS"},
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
            TABLA_AFFAIRE_OBJECTIONS.draw();
        }


        // Refilter the table
        // $('#input__search_by_fecha_starts, #input__search_by_fecha_ends').on('change', function() {
        //     TABLA_AFFAIRE_OBJECTIONS.draw();
        // });

        // Pintar en verde los inputs que contienen algo
        $( "#input__COMMENTS" ).change(function() { agregar_quitar_bg_success('input__COMMENTS'); });
        $( "#input__DATE" ).change(function() { agregar_quitar_bg_success('input__DATE'); });
        $( "#input__SOLVED" ).change(function() { agregar_quitar_bg_success('input__SOLVED'); });
        $( "#input__STEP" ).change(function() { agregar_quitar_bg_success('input__STEP'); });
        $( "#input__OBJECTIONS" ).change(function() { agregar_quitar_bg_success('input__OBJECTIONS'); });
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