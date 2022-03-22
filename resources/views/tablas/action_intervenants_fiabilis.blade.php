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
                <h4 class="my-0">Tabla: <b>action_intervenants_fiabilis</b> (9 columnas)</h4>
                <p>(Total: {{ count( config('tablas')['action_intervenants_fiabilis'] ) }} columnas)</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3 form-group">
                        <label>ID_ACTION_INTERVENANTS_FIABILIS:</label>
                        <input id="input__ID_ACTION_INTERVENANTS_FIABILIS" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>LOGIN:</label>
                        <input id="input__LOGIN" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>PID_ACTION:</label>
                        <input id="input__PID_ACTION" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>SYS_DATE_CREATION:</label>
                        <input id="input__SYS_DATE_CREATION" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>SYS_DATE_MODIFICATION desde:</label>
                        <input id="input__SYS_DATE_MODIFICATION_DESDE" type="date" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>SYS_DATE_MODIFICATION hasta:</label>
                        <input id="input__SYS_DATE_MODIFICATION_HASTA" type="date" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>SYS_HEURE_CREATION:</label>
                        <input id="input__SYS_HEURE_CREATION" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>SYS_HEURE_MODIFICATION:</label>
                        <input id="input__SYS_HEURE_MODIFICATION" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>SYS_USER_CREATION:</label>
                        <input id="input__SYS_USER_CREATION" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>SYS_USER_MODIFICATION:</label>
                        <input id="input__SYS_USER_MODIFICATION" type="text" class="form-control">
                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-sm btn-success float-right"  type="button" onclick="buscar()">Buscar</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_action" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>1 ID_ACTION_INTERVENANTS_FIABILIS</th>
                                                    <th>2 LOGIN</th>
                                                    <th>3 PID_ACTION</th>
                                                    <th>4 SYS_DATE_CREATION</th>
                                                    <th>5 SYS_DATE_MODIFICATION</th>
                                                    <th>6 SYS_HEURE_CREATION</th>
                                                    <th>7 SYS_HEURE_MODIFICATION</th>
                                                    <th>8 SYS_USER_CREATION</th>
                                                    <th>9 SYS_USER_MODIFICATION</th>
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
                    url: "{{ route('get_tabla_action_intervenants_fiabilis') }}",

                    data: function ( d ) {
                        d.SEARCH_BY_ID_ACTION_INTERVENANTS_FIABILIS = $('#input__ID_ACTION_INTERVENANTS_FIABILIS').val();
                        d.SEARCH_BY_LOGIN                           = $('#input__LOGIN').val();
                        d.SEARCH_BY_PID_ACTION                      = $('#input__PID_ACTION').val();
                        d.SEARCH_BY_SYS_DATE_CREATION               = $('#input__SYS_DATE_CREATION').val();
                        d.SEARCH_BY_SYS_DATE_MODIFICATION_DESDE     = $('#input__SYS_DATE_MODIFICATION_DESDE').val();
                        d.SEARCH_BY_SYS_DATE_MODIFICATION_HASTA     = $('#input__SYS_DATE_MODIFICATION_HASTA').val();
                        d.SEARCH_BY_SYS_HEURE_CREATION              = $('#input__SYS_HEURE_CREATION').val();
                        d.SEARCH_BY_SYS_HEURE_MODIFICATION          = $('#input__SYS_HEURE_MODIFICATION').val();
                        d.SEARCH_BY_SYS_USER_CREATION               = $('#input__SYS_USER_CREATION').val();
                        d.SEARCH_BY_SYS_USER_MODIFICATION           = $('#input__SYS_USER_MODIFICATION').val();
                    }
                    
                },
                columns: [
                    { data: "ID_ACTION_INTERVENANTS_FIABILIS"},
                    { data: "LOGIN"},
                    { data: "PID_ACTION"},
                    { data: "SYS_DATE_CREATION"},
                    { data: "SYS_DATE_MODIFICATION"},
                    { data: "SYS_HEURE_CREATION"},
                    { data: "SYS_HEURE_MODIFICATION"},
                    { data: "SYS_USER_CREATION"},
                    { data: "SYS_USER_MODIFICATION"},
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
                    title: "tabla action_intervenants_fiabilis - " + new Date().toLocaleString(),
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
            TABLA_ORDENES.draw();
        }
        
        // Pintar en verde los inputs que contienen algo
        $('#input__ID_ACTION_INTERVENANTS_FIABILIS').change(function() { agregar_quitar_bg_success('input__ID_ACTION_INTERVENANTS_FIABILIS'); });
        $('#input__LOGIN').change(function() { agregar_quitar_bg_success('input__LOGIN'); });
        $( "#input__PID_ACTION" ).change(function() { agregar_quitar_bg_success('input__PID_ACTION'); });
        $( "#input__SYS_DATE_CREATION" ).change(function() { agregar_quitar_bg_success('input__SYS_DATE_CREATION'); });
        $( "#input__SYS_DATE_MODIFICATION" ).change(function() { agregar_quitar_bg_success('input__SYS_DATE_MODIFICATION'); });
        $( "#input__SYS_HEURE_CREATION" ).change(function() { agregar_quitar_bg_success('input__SYS_HEURE_CREATION'); });
        $( "#input__SYS_HEURE_MODIFICATION" ).change(function() { agregar_quitar_bg_success('input__SYS_HEURE_MODIFICATION'); });
        $( "#input__SYS_USER_CREATION" ).change(function() { agregar_quitar_bg_success('input__SYS_USER_CREATION'); });
        $( "#input__SYS_USER_MODIFICATION" ).change(function() { agregar_quitar_bg_success('input__SYS_USER_MODIFICATION'); });

        function agregar_quitar_bg_success(id){
            if ( $(`#${id}`).val() !== "" ) {
                $(`#${id}`).addClass('bg-success');
            } else {
                $(`#${id}`).removeClass('bg-success');
            }
        }

    </script>
@endsection