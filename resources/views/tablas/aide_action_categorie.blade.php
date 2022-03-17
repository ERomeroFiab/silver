@extends('listado')

@section('customcss')
    <style>
        #tabla_aide_action_categorie_filter {
            display: none;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="my-0">Tabla: <b>aide_action_categorie</b></h4>
                <p>(Total: {{ count( config('tablas')['aide_action_categorie'] ) }} columnas)</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3 form-group">
                        <label>CATEGORIE:</label>
                        <input id="input__CATEGORIE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>EXCLUSIVE</label>
                        <input id="input__EXCLUSIVE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>GROUPE:</label>
                        <input id="input__GROUPE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>MISE_A_JOUR_AGENDA</label>
                        <input id="input__MISE_A_JOUR_AGENDA" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>TYPE_EVENEMENT:</label>
                        <input id="input__TYPE_EVENEMENT" type="text" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-sm btn-success float-right" type="button" onclick="buscar()">Buscar</button>
                    </div>
                </div>
                    <div class="col-12" style="overflow-x: scroll;">
                        <table id="tabla_aide_action_categorie" class="table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>1 CATEGORIE</th>
                                    <th>2 EXCLUSIVE</th>
                                    <th>3 GROUPE</th>
                                    <th>4 MISE_A_JOUR_AGENDA</th>
                                    <th>5 TYPE_EVENEMENT</th>
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
        let TABLA_AIDE_ACTION_CATEGORIE;
        $(document).ready(function() {

            TABLA_AIDE_ACTION_CATEGORIE = $('#tabla_aide_action_categorie').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_aide_action_categorie') }}",
                    // error: function(jqXHR, ajaxOptions, thrownError) {
                    //     console.log("error: " + thrownError + "\n\n" + "status: " + jqXHR.statusText + "\n\n" + "response: "+jqXHR.responseText + "\n\n" + "options: "+ajaxOptions.responseText);
                    // },
                    data: function ( d ) {
                        d.SEARCH_BY_CATEGORIE                = $('#input__CATEGORIE').val();
                        d.SEARCH_BY_EXCLUSIVE                = $('#input__EXCLUSIVE').val();
                        d.SEARCH_BY_GROUPE                   = $('#input__GROUPE').val();
                        d.SEARCH_BY_MISE_A_JOUR_AGENDA       = $('#input__MISE_A_JOUR_AGENDA').val();
                        d.SEARCH_BY_TYPE_EVENEMENT           = $('#input__TYPE_EVENEMENT').val();
                    }
                },
                columns: [
                    { data: "CATEGORIE"},
                    { data: "EXCLUSIVE"},
                    { data: "GROUPE"},
                    { data: "MISE_A_JOUR_AGENDA"},
                    { data: "TYPE_EVENEMENT"},
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
            TABLA_AIDE_ACTION_CATEGORIE.draw();
        }


        // Refilter the table
        // $('#input__search_by_fecha_starts, #input__search_by_fecha_ends').on('change', function() {
        //     TABLA_AIDE_ACTION_CATEGORIE.draw();
        // });

        // Pintar en verde los inputs que contienen algo
        $( "#input__CATEGORIE" ).change(function() { agregar_quitar_bg_success('input__CATEGORIE'); });
        $( "#input__EXCLUSIVE" ).change(function() { agregar_quitar_bg_success('input__EXCLUSIVE'); });
        $( "#input__GROUPE" ).change(function() { agregar_quitar_bg_success('input__GROUPE'); });
        $( "#input__MISE_A_JOUR_AGENDA" ).change(function() { agregar_quitar_bg_success('input__MISE_A_JOUR_AGENDA'); });
        $( "#input__TYPE_EVENEMENT" ).change(function() { agregar_quitar_bg_success('input__TYPE_EVENEMENT'); });
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