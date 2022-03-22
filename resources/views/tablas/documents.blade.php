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
                <h2>Tabla: <b>documents</b> (30 columnas)</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3 form-group">
                        <label>DOCUMENT_FICHIER_NOM:</label>
                        <input id="input__DOCUMENT_FICHIER_NOM" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>DOCUMENT_FICHIER_DATE:</label>
                        <input id="input__DOCUMENT_FICHIER_DATE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>FICHIER_TAILLE:</label>
                        <input id="input__DOCUMENT_FICHIER_TAILLE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>FICHIER_TYPE:</label>
                        <input id="input__DOCUMENT_FICHIER_TYPE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>ORIGINE:</label>
                        <input id="input__ORIGINE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>SYS_DATE_CREATION:</label>
                        <input id="input__SYS_DATE_CREATION" type="text" class="form-control">
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
                        <table id="tabla_action" class="table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>1 DOCUMENT_FICHIER_NOM</th>
                                    <th>2 DOCUMENT_FICHIER_DATE</th>
                                    <th>3 DOCUMENT_FICHIER_TAILLE</th>
                                    <th>4 DOCUMENT_FICHIER_TYPE</th>
                                    <th>5 ORIGINE</th>
                                    <th>6 SYS_DATE_CREATION</th>
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
                    url: "{{ route('get_tabla_documents') }}",
                    // error: function(jqXHR, ajaxOptions, thrownError) {
                    //     console.log("error: " + thrownError + "\n\n" + "status: " + jqXHR.statusText + "\n\n" + "response: "+jqXHR.responseText + "\n\n" + "options: "+ajaxOptions.responseText);
                    // },
                    data: function ( d ) {
                        d.SEARCH_BY_DOCUMENT_FICHIER_NOM                 = $('#input__DOCUMENT_FICHIER_NOM').val();
                        d.SEARCH_BY_DOCUMENT_FICHIER_DATE                = $('#input__DOCUMENT_FICHIER_DATE').val();
                        d.SEARCH_BY_DOCUMENT_FICHIER_TAILLE              = $('#input__DOCUMENT_FICHIER_TAILLE').val();
                        d.SEARCH_BY_DOCUMENT_FICHIER_TYPE                = $('#input__DOCUMENT_FICHIER_TYPE').val();
                        d.SEARCH_BY_ORIGINE                              = $('#input__ORIGINE').val();
                        d.SEARCH_BY_SYS_DATE_CREATION                    = $('#input__SYS_DATE_CREATION').val(); 
                    }
                },
                columns: [
                    { data: "DOCUMENT_FICHIER_NOM"},
                    { data: "DOCUMENT_FICHIER_DATE"},
                    { data: "DOCUMENT_FICHIER_TAILLE"},
                    { data: "DOCUMENT_FICHIER_TYPE"},
                    { data: "ORIGINE"},
                    { data: "SYS_DATE_CREATION"},
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
                    title: "tabla documents - " + new Date().toLocaleString(),
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


        // Refilter the table
        // $('#input__search_by_fecha_starts, #input__search_by_fecha_ends').on('change', function() {
        //     TABLA_ORDENES.draw();
        // });

        // Pintar en verde los inputs que contienen algo
        $( "#input__DOCUMENT_FICHIER_NOM" ).change(function() { agregar_quitar_bg_success('input__DOCUMENT_FICHIER_NOM'); });
        $( "#input__DOCUMENT_FICHIER_DATE" ).change(function() { agregar_quitar_bg_success('input__DOCUMENT_FICHIER_DATE'); });
        $( "#input__DOCUMENT_FICHIER_TAILLE" ).change(function() { agregar_quitar_bg_success('input__DOCUMENT_FICHIER_TAILLE'); });
        $( "#input__DOCUMENT_FICHIER_TYPE" ).change(function() { agregar_quitar_bg_success('input__DOCUMENT_FICHIER_TYPE'); });
        $( "#input__ORIGINE" ).change(function() { agregar_quitar_bg_success('input__ORIGINE'); });
        $( "#input__SYS_DATE_CREATION" ).change(function() { agregar_quitar_bg_success('input__SYS_DATE_CREATION'); });

        function agregar_quitar_bg_success(id){
            if ( $(`#${id}`).val() !== "" ) {
                $(`#${id}`).addClass('bg-success');
            } else {
                $(`#${id}`).removeClass('bg-success');
            }
        }

    </script>
@endsection