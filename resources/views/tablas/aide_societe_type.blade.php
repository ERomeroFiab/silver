@extends('listado')

@section('customcss')
    <style>
        #tabla_aide_societe_type_filter {
            display: none;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="my-0">Tabla: <b>aide_societe_type</b></h4>
                <p>(Total: {{ count( config('tablas')['aide_societe_type'] ) }} columnas)</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3 form-group">
                        <label>NIVEAU:</label>
                        <input id="input__NIVEAU" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>PARTNER:</label>
                        <input id="input__PARTNER" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>TYPE_FICHE:</label>
                        <input id="input__TYPE_FICHE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>SUPPLIER:</label>
                        <input id="input__SUPPLIER" type="text" class="form-control">
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
                        <table id="tabla_aide_societe_type" class="table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>1 NIVEAU</th>
                                    <th>2 PARTNER</th>
                                    <th>3 TYPE_FICHE</th>
                                    <th>4 SUPPLIER</th>
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
        let TABLA_aide_societe_type;
        $(document).ready(function() {

            TABLA_aide_societe_type = $('#tabla_aide_societe_type').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_aide_societe_type') }}",
                    // error: function(jqXHR, ajaxOptions, thrownError) {
                    //     console.log("error: " + thrownError + "\n\n" + "status: " + jqXHR.statusText + "\n\n" + "response: "+jqXHR.responseText + "\n\n" + "options: "+ajaxOptions.responseText);
                    // },
                    data: function ( d ) {
                        d.SEARCH_BY_NIVEAU       = $('#input__NIVEAU').val();
                        d.SEARCH_BY_PARTNER      = $('#input__PARTNER').val();
                        d.SEARCH_BY_TYPE_FICHE   = $('#input__TYPE_FICHE').val();
                        d.SEARCH_BY_SUPPLIER     = $('#input__SUPPLIER').val();
                    }
                },
                columns: [
                    { data: "NIVEAU"},
                    { data: "PARTNER"},
                    { data: "TYPE_FICHE"},
                    { data: "SUPPLIER"},
                ],
                // order: [[ 1, 'desc' ]],
                pageLength: 10,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json',
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    title: "tabla aide_societe_type - " + new Date().toLocaleString(),
                    className: "bg-info",
                    exportOptions: {
                        columns: ':not(.no_exportar)'
                    },
                    action: newExportAction
                }],
            });

            // funci??n para exportar el excel con todas las filas
            function newExportAction(e, dt, button, config) {
                var self = this;
                var oldStart = dt.aide_societe_type()[0]._iDisplayStart;
                dt.one('preXhr', function (e, s, data) {
                    // Just this once, load all data from the server...
                    data.start = 0;
                    data.length = 2147483647;
                    dt.one('preDraw', function (e, aide_societe_type) {
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
                            aide_societe_type._iDisplayStart = oldStart;
                            data.start = oldStart;
                        });
                        // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                        setTimeout(dt.ajax.reload, 0);
                        // Prevent rendering of the full data to the DOM
                        return false;
                    });
                });
                // Requery the server with the new one-time export aide_societe_type
                dt.ajax.reload();
            }

        });

        function buscar() {
            TABLA_aide_societe_type.draw();
        }


        // Refilter the table
        // $('#input__search_by_fecha_starts, #input__search_by_fecha_ends').on('change', function() {
        //     TABLA_aide_societe_type.draw();
        // });

        // Pintar en verde los inputs que contienen algo
        $( "#input__NIVEAU" ).change(function() { agregar_quitar_bg_success('input__NIVEAU'); });
        $( "#input__PARTNER" ).change(function() { agregar_quitar_bg_success('input__PARTNER'); });
        $( "#input__TYPE_FICHE" ).change(function() { agregar_quitar_bg_success('input__TYPE_FICHE'); });
        $( "#input__SUPPLIER" ).change(function() { agregar_quitar_bg_success('input__SUPPLIER'); });

        function agregar_quitar_bg_success(id){
            if ( $(`#${id}`).val() !== "" ) {
                $(`#${id}`).addClass('bg-success');
            } else {
                $(`#${id}`).removeClass('bg-success');
            }
        }

    </script>
@endsection