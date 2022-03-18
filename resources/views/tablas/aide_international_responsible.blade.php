@extends('listado')

@section('customcss')
    <style>
        #tabla_aide_international_responsible_filter {
            display: none;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="my-0">Tabla: <b>aide_international_responsible</b></h4>
                <p>(Total: {{ count( config('tablas')['aide_international_responsible'] ) }} columnas)</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3 form-group">
                        <label>CODE:</label>
                        <input id="input__CODE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>NOM:</label>
                        <input id="input__NOM" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>PAYS:</label>
                        <input id="input__PAYS" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>SERVICE:</label>
                        <input id="input__SERVICE" type="text" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-sm btn-success float-right" type="button" onclick="buscar()">Buscar</button>
                    </div>
                    <div class="col-12" style="overflow-x: scroll;">
                        <table id="tabla_aide_international_responsible" class="table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>1 CODE</th>
                                    <th>2 NOM</th>
                                    <th>3 PAYS</th>
                                    <th>4 SERVICE</th>
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
        let TABLA_AIDE_INTERNATIONAL_RESPONSIBLE;
        $(document).ready(function() {

            TABLA_AIDE_INTERNATIONAL_RESPONSIBLE = $('#tabla_aide_international_responsible').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_aide_international_responsible') }}",
                    // error: function(jqXHR, ajaxOptions, thrownError) {
                    //     console.log("error: " + thrownError + "\n\n" + "status: " + jqXHR.statusText + "\n\n" + "response: "+jqXHR.responseText + "\n\n" + "options: "+ajaxOptions.responseText);
                    // },
                    data: function ( d ) {
                        d.SEARCH_BY_CODE         = $('#input__CODE').val();
                        d.SEARCH_BY_NOM          = $('#input__NOM').val();
                        d.SEARCH_BY_PAYS         = $('#input__PAYS').val();
                        d.SEARCH_BY_SERVICE      = $('#input__SERVICE').val();
                    }
                },
                columns: [
                    { data: "CODE"},
                    { data: "NOM"},
                    { data: "PAYS"},
                    { data: "SERVICE"},
                ],
                // order: [[ 1, 'desc' ]],
                pageLength: 10,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json',
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    title: "tabla aide_international_responsible - " + new Date().toLocaleString(),
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
                var oldStart = dt.aide_international_responsible()[0]._iDisplayStart;
                dt.one('preXhr', function (e, s, data) {
                    // Just this once, load all data from the server...
                    data.start = 0;
                    data.length = 2147483647;
                    dt.one('preDraw', function (e, aide_international_responsible) {
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
                            aide_international_responsible._iDisplayStart = oldStart;
                            data.start = oldStart;
                        });
                        // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                        setTimeout(dt.ajax.reload, 0);
                        // Prevent rendering of the full data to the DOM
                        return false;
                    });
                });
                // Requery the server with the new one-time export aide_international_responsible
                dt.ajax.reload();
            }

        });
        function buscar(){
            TABLA_AIDE_INTERNATIONAL_RESPONSIBLE.draw(); 
        }


        // Refilter the table
        // $('#input__search_by_fecha_starts, #input__search_by_fecha_ends').on('change', function() {
        //     TABLA_aide_international_responsible.draw();
        // });

        // Pintar en verde los inputs que contienen algo
        $( "#input__CODE" ).change(function() { agregar_quitar_bg_success('input__CODE'); });
        $( "#input__NOM" ).change(function() { agregar_quitar_bg_success('input__NOM'); });
        $( "#input__PAYS" ).change(function() { agregar_quitar_bg_success('input__PAYS'); });
        $( "#input__SERVICE" ).change(function() { agregar_quitar_bg_success('input__SERVICE'); });
        // $( "#input__email_del_comprador" ).change(function() { agregar_quitar_bg_success('input__email_del_comprador'); });
        // $( "#input__productos" ).change(function() { agregar_quitar_bg_success('input__productos'); });
        // $( "#input__compra_o_regalo" ).change(function() { agregar_quitar_bg_success('input__compra_o_regalo'); });
        // $( "#input__status" ).change(function() { agregar_quitar_bg_success('input__status'); });

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