@extends('listado')

@section('customcss')
    <style>
        #tabla_aide_affaire_perte_filter {
            display: none;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="my-0">Tabla: <b>aide_affaire_perte</b></h4>
                <p>(Total: {{ count( config('tablas')['aide_affaire_perte'] ) }} columnas)</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3 form-group">
                        <label>MOTIF_PERTE:</label>
                        <input id="input__MOTIF_PERTE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>NO_GO:</label>
                        <input id="input__NO_GO" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>SYS_DATE_CREATION:</label>
                        <input id="input__SYS_DATE_CREATION" type="text" class="form-control">
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
                    <div class="col-12" style="overflow-x: scroll;">
                        <table id="tabla_aide_affaire_perte" class="table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>1 MOTIF_PERTE</th>
                                    <th>2 NO_GO</th>
                                    <th>3 SYS_DATE_CREATION</th>
                                    <th>4 SYS_DATE_MODIFICATION</th>
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
        let TABLA_AIDE_AFFAIRE_PERTE;
        $(document).ready(function() {

            ABLA_AIDE_AFFAIRE_PERTE = $('#tabla_aide_affaire_perte').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_aide_affaire_perte') }}",
                    // error: function(jqXHR, ajaxOptions, thrownError) {
                    //     console.log("error: " + thrownError + "\n\n" + "status: " + jqXHR.statusText + "\n\n" + "response: "+jqXHR.responseText + "\n\n" + "options: "+ajaxOptions.responseText);
                    // },
                    data: function ( d ) {
                        d.SEARCH_BY_MOTIF_PERTE                = $('#input__MOTIF_PERTE').val();
                        d.SEARCH_BY_NO_GO                = $('#input__NO_GO').val();
                        d.SEARCH_BY_SYS_DATE_CREATION        = $('#input__SYS_DATE_CREATION').val();
                        d.SEARCH_BY_SYS_DATE_MODIFICATION    = $('#input__SYS_DATE_MODIFICATION').val();
                    }
                },
                columns: [
                    { data: "MOTIF_PERTE"},
                    { data: "NO_GO"},
                    { data: "SYS_DATE_CREATION"},
                    { data: "SYS_DATE_MODIFICATION"},
                ],
                // order: [[ 1, 'desc' ]],
                pageLength: 10,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json',
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    title: "tabla aide_affaire_perte - " + new Date().toLocaleString(),
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
                var oldStart = dt.aide_affaire_perte()[0]._iDisplayStart;
                dt.one('preXhr', function (e, s, data) {
                    // Just this once, load all data from the server...
                    data.start = 0;
                    data.length = 2147483647;
                    dt.one('preDraw', function (e, aide_affaire_perte) {
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
                            aide_affaire_perte._iDisplayStart = oldStart;
                            data.start = oldStart;
                        });
                        // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                        setTimeout(dt.ajax.reload, 0);
                        // Prevent rendering of the full data to the DOM
                        return false;
                    });
                });
                // Requery the server with the new one-time export aide_affaire_perte
                dt.ajax.reload();
            }

        });
        function buscar(){
            ABLA_AIDE_AFFAIRE_PERTE.draw(); 
        }


        // Refilter the table
        // $('#input__search_by_fecha_starts, #input__search_by_fecha_ends').on('change', function() {
        //     TABLA_aide_affaire_perte.draw();
        // });

        // Pintar en verde los inputs que contienen algo
        $( "#input__MOTIF_PERTE" ).change(function() { agregar_quitar_bg_success('input__MOTIF_PERTE'); });
        $( "#input__NO_GO" ).change(function() { agregar_quitar_bg_success('input__NO_GO'); });
        $( "#input__SYS_DATE_CREATION" ).change(function() { agregar_quitar_bg_success('input__SYS_DATE_CREATION'); });
        $( "#input__SYS_DATE_MODIFICATION" ).change(function() { agregar_quitar_bg_success('input__SYS_DATE_MODIFICATION'); });
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