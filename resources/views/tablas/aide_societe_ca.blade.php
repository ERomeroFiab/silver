@extends('listado')

@section('customcss')
    <style>
        #tabla_aide_societe_ca_filter {
            display: none;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="my-0">Tabla: <b>aide_societe_ca</b></h4>
                <p>(Total: {{ count( config('tablas')['aide_societe_ca'] ) }} columnas)</p>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-3 form-group">
                        <label>CA_MAX:</label>
                        <input id="input__CA_MAX" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>CA_MIN:</label>
                        <input id="input__CA_MIN" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>CA_TRANCHE:</label>
                        <input id="input__CA_TRANCHE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>SYS_DATE_CREATION:</label>
                        <input id="input__SYS_DATE_CREATION" type="text" class="form-control">
                    </div>

                    <div class="col-3 form-group">
                        <label>SYS_USER_CREATION:</label>
                        <input id="input__SYS_USER_CREATION" type="text" class="form-control">
                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-sm btn-success float-right" type="button" onclick="buscar()">Buscar</button>
                    </div>
                </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12" style="overflow-x: scroll;">
                        <table id="tabla_aide_societe_ca" class="table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>1 CA_MAX</th>
                                    <th>2 CA_MIN</th>
                                    <th>3 CA_TRANCHE</th>
                                    <th>4 SYS_DATE_CREATION</th>
                                    <th>5 SYS_USER_CREATION</th>
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
        let TABLA_aide_societe_ca;
        $(document).ready(function() {

            TABLA_aide_societe_ca = $('#tabla_aide_societe_ca').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_aide_societe_ca') }}",
                    // error: function(jqXHR, ajaxOptions, thrownError) {
                    //     console.log("error: " + thrownError + "\n\n" + "status: " + jqXHR.statusText + "\n\n" + "response: "+jqXHR.responseText + "\n\n" + "options: "+ajaxOptions.responseText);
                    // },
                    data: function ( d ) {
                        d.SEARCH_BY_CA_MAX = $('#input__CA_MAX').val();
                        d.SEARCH_BY_CA_MIN = $('#input__CA_MIN').val();
                        d.SEARCH_BY_CA_TRANCHE = $('#input__CA_TRANCHE').val();
                        d.SEARCH_BY_SYS_DATE_CREATION = $('#input__SYS_DATE_CREATION').val();
                        d.SEARCH_BY_SYS_USER_CREATION = $('#input__SYS_USER_CREATION').val();
                        
                    }
                },
                columns: [
                    { data: "CA_MAX"},
                    { data: "CA_MIN"},
                    { data: "CA_TRANCHE"},
                    { data: "SYS_DATE_CREATION"},
                    { data: "SYS_USER_CREATION"},
                ],
                // order: [[ 1, 'desc' ]],
                pageLength: 10,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json',
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    title: "tabla aide_societe_ca - " + new Date().toLocaleString(),
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
                var oldStart = dt.aide_societe_ca()[0]._iDisplayStart;
                dt.one('preXhr', function (e, s, data) {
                    // Just this once, load all data from the server...
                    data.start = 0;
                    data.length = 2147483647;
                    dt.one('preDraw', function (e, aide_societe_ca) {
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
                            aide_societe_ca._iDisplayStart = oldStart;
                            data.start = oldStart;
                        });
                        // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                        setTimeout(dt.ajax.reload, 0);
                        // Prevent rendering of the full data to the DOM
                        return false;
                    });
                });
                // Requery the server with the new one-time export aide_societe_ca
                dt.ajax.reload();
            }

        });

        function buscar() {
            TABLA_aide_societe_ca.draw();
        }


        // Refilter the table
        // $('#input__search_by_fecha_starts, #input__search_by_fecha_ends').on('change', function() {
        //     TABLA_aide_societe_ca.draw();
        // });

        // Pintar en verde los inputs que contienen algo
        $( "#input__CA_MAX" ).change(function() { agregar_quitar_bg_success('input__CA_MAX'); });
        $( "#input__CA_MIN" ).change(function() { agregar_quitar_bg_success('input__CA_MIN'); });
        $( "#input__CA_TRANCHE" ).change(function() { agregar_quitar_bg_success('input__CA_TRANCHE'); });
        $( "#input__SYS_DATE_CREATION" ).change(function() { agregar_quitar_bg_success('input__SYS_DATE_CREATION'); });
        $( "#input__SYS_USER_CREATION" ).change(function() { agregar_quitar_bg_success('input__SYS_USER_CREATION'); });
        

        function agregar_quitar_bg_success(id){
            if ( $(`#${id}`).val() !== "" ) {
                $(`#${id}`).addClass('bg-success');
            } else {
                $(`#${id}`).removeClass('bg-success');
            }
        }

    </script>
@endsection