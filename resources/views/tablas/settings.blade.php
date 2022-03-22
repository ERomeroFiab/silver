@extends('listado')

@section('customcss')
    <style>
        #tabla_settings_filter {
            display: none;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="my-0">Tabla: <b>settings</b></h4>
                <p>(Total: {{ count( config('tablas')['settings'] ) }} columnas)</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3 form-group">
                        <label>CLIENT_REVIEW_LABEL:</label>
                        <input id="input__CLIENT_REVIEW_LABEL" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>CONTRACT_COUNTER_PREFIX:</label>
                        <input id="input__CONTRACT_COUNTER_PREFIX" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>CONTRACT_DUNNING_PERIOD:</label>
                        <input id="input__CONTRACT_DUNNING_PERIOD" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>CONTRACT_DURATION:</label>
                        <input id="input__CONTRACT_DURATION" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>COUNTRY:</label>
                        <input id="input__COUNTRY" type="text" class="form-control">
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
                        <table id="tabla_settings" class="table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>1 CLIENT_REVIEW_LABEL</th>
                                    <th>2 CONTRACT_COUNTER_PREFIX</th>
                                    <th>3 CONTRACT_DUNNING_PERIOD</th>
                                    <th>4 CONTRACT_DURATION</th>
                                    <th>5 COUNTRY</th>
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
        let TABLA_settings;
        $(document).ready(function() {

            TABLA_settings = $('#tabla_settings').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_settings') }}",
                    // error: function(jqXHR, ajaxOptions, thrownError) {
                    //     console.log("error: " + thrownError + "\n\n" + "status: " + jqXHR.statusText + "\n\n" + "response: "+jqXHR.responseText + "\n\n" + "options: "+ajaxOptions.responseText);
                    // },
                    data: function ( d ) {
                        d.SEARCH_BY_CLIENT_REVIEW_LABEL        = $('#input__CLIENT_REVIEW_LABEL').val();
                        d.SEARCH_BY_CONTRACT_COUNTER_PREFIX    = $('#input__CONTRACT_COUNTER_PREFIX').val();
                        d.SEARCH_BY_CONTRACT_DUNNING_PERIOD    = $('#input__CONTRACT_DUNNING_PERIOD').val();
                        d.SEARCH_BY_CONTRACT_DURATION          = $('#input__CONTRACT_DURATION').val();
                        d.SEARCH_BY_COUNTRY                    = $('#input__COUNTRY').val();
                        
                    }
                },
                columns: [
                    { data: "CLIENT_REVIEW_LABEL"},
                    { data: "CONTRACT_COUNTER_PREFIX"},
                    { data: "CONTRACT_DUNNING_PERIOD"},
                    { data: "CONTRACT_DURATION"},
                    { data: "COUNTRY"},
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
                    title: "tabla settings - " + new Date().toLocaleString(),
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
            TABLA_settings.draw();
        }


        // Refilter the table
        // $('#input__search_by_fecha_starts, #input__search_by_fecha_ends').on('change', function() {
        //     TABLA_settings.draw();
        // });

        // Pintar en verde los inputs que contienen algo
        $( "#input__CLIENT_REVIEW_LABEL" ).change(function() { agregar_quitar_bg_success('input__CLIENT_REVIEW_LABEL'); });
        $( "#input__CONTRACT_COUNTER_PREFIX" ).change(function() { agregar_quitar_bg_success('input__CONTRACT_COUNTER_PREFIX'); });
        $( "#input__CONTRACT_DUNNING_PERIOD" ).change(function() { agregar_quitar_bg_success('input__CONTRACT_DUNNING_PERIOD'); });
        $( "#input__CONTRACT_DURATION" ).change(function() { agregar_quitar_bg_success('input__CONTRACT_DURATION'); });
        $( "#input__COUNTRY" ).change(function() { agregar_quitar_bg_success('input__COUNTRY'); });

        function agregar_quitar_bg_success(id){
            if ( $(`#${id}`).val() !== "" ) {
                $(`#${id}`).addClass('bg-success');
            } else {
                $(`#${id}`).removeClass('bg-success');
            }
        }

    </script>
@endsection