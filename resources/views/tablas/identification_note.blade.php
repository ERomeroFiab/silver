@extends('listado')

@section('customcss')
    <style>
        #tabla_identification_note_filter {
            display: none;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="my-0">Tabla: <b>identification_note</b></h4>
                <p>(Total: {{ count( config('tablas')['identification_note'] ) }} columnas)</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3 form-group">
                        <label>KOMPASS_ID:</label>
                        <input id="input__KOMPASS_ID" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>NOTE:</label>
                        <input id="input__NOTE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>SYS_DATE_CREATION:</label>
                        <input id="input__SYS_DATE_CREATION" type="text" class="form-control">
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
                        <label>SYS_DATE_MODIFICATION_DESDE:</label>
                        <input id="input__SYS_DATE_MODIFICATION_DESDE" type="date" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>SYS_DATE_MODIFICATION_HASTA:</label>
                        <input id="input__SYS_DATE_MODIFICATION_HASTA" type="date" class="form-control">
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
                        <table id="tabla_identification_note" class="table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>1 KOMPASS_ID</th>
                                    <th>2 NOTE</th>
                                    <th>3 SYS_DATE_CREATION</th>
                                    <th>4 RUT</th>
                                    <th>5 RAZON_SOCIAL</th>
                                    <th>6 SYS_DATE_MODIFICATION</th>
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
        let TABLA_identification_note;
        $(document).ready(function() {

            TABLA_identification_note = $('#tabla_identification_note').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_identification_note') }}",
                    // error: function(jqXHR, ajaxOptions, thrownError) {
                    //     console.log("error: " + thrownError + "\n\n" + "status: " + jqXHR.statusText + "\n\n" + "response: "+jqXHR.responseText + "\n\n" + "options: "+ajaxOptions.responseText);
                    // },
                    data: function ( d ) {
                        d.SEARCH_BY_KOMPASS_ID                     = $('#input__KOMPASS_ID').val();
                        d.SEARCH_BY_NOTE                           = $('#input__NOTE').val();
                        d.SEARCH_BY_SYS_DATE_CREATION              = $('#input__SYS_DATE_CREATION').val();
                        d.SEARCH_BY_RUT                            = $('#input__RUT').val();
                        d.SEARCH_BY_RAZON_SOCIAL                   = $('#input__RAZON_SOCIAL').val();
                        d.SEARCH_BY_SYS_DATE_MODIFICATION_DESDE    = $('#input__SYS_DATE_MODIFICATION_DESDE').val();
                        d.SEARCH_BY_SYS_DATE_MODIFICATION_HASTA    = $('#input__SYS_DATE_MODIFICATION_HASTA').val();
                    }
                },
                columns: [
                    { data: "KOMPASS_ID"},
                    { data: "NOTE"},
                    { data: "SYS_DATE_CREATION"},
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

        function buscar() {
            TABLA_identification_note.draw();
        }

        // Refilter the table
        // $('#input__search_by_fecha_starts, #input__search_by_fecha_ends').on('change', function() {
        //     TABLA_identification_note.draw();
        // });

        // Pintar en verde los inputs que contienen algo
        $( "#input__KOMPASS_ID" ).change(function() { agregar_quitar_bg_success('input__KOMPASS_ID'); });
        $( "#input__NOTE" ).change(function() { agregar_quitar_bg_success('input__NOTE'); });
        $( "#input__SYS_DATE_CREATION" ).change(function() { agregar_quitar_bg_success('input__SYS_DATE_CREATION'); });
        $( "#input__RUT" ).change(function() { agregar_quitar_bg_success('input__RUT'); });
        $( "#input__RAZON_SOCIAL" ).change(function() { agregar_quitar_bg_success('input__RAZON_SOCIAL'); });
        $( "#input__SYS_DATE_MODIFICATION" ).change(function() { agregar_quitar_bg_success('input__SYS_DATE_MODIFICATION'); });

        function agregar_quitar_bg_success(id){
            if ( $(`#${id}`).val() !== "" ) {
                $(`#${id}`).addClass('bg-success');
            } else {
                $(`#${id}`).removeClass('bg-success');
            }
        }
    </script>
@endsection