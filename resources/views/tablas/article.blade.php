@extends('listado')

@section('customcss')
    <style>
        #tabla_article_filter {
            display: none;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="my-0">Tabla: <b>article</b></h4>
                <p>(Total: {{ count( config('tablas')['article'] ) }} columnas)</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3 form-group">
                        <label>DESIGNATION:</label>
                        <input id="input__DESIGNATION" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>FAMILLE:</label>
                        <input id="input__FAMILLE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>PRIX_ACHAT:</label>
                        <input id="input__PRIX_ACHAT" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>PRIX_VENTE:</label>
                        <input id="input__PRIX_VENTE" type="text" class="form-control">
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
                        <table id="tabla_article" class="table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>1 DESIGNATION</th>
                                    <th>2 FAMILLE</th>
                                    <th>3 PRIX_ACHAT</th>
                                    <th>4 PRIX_VENTE</th>
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
        let TABLA_article;
        $(document).ready(function() {

            TABLA_article = $('#tabla_article').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_article') }}",
                    // error: function(jqXHR, ajaxOptions, thrownError) {
                    //     console.log("error: " + thrownError + "\n\n" + "status: " + jqXHR.statusText + "\n\n" + "response: "+jqXHR.responseText + "\n\n" + "options: "+ajaxOptions.responseText);
                    // },
                    data: function ( d ) {
                        d.SEARCH_BY_DESIGNATION    = $('#input__DESIGNATION').val();
                        d.SEARCH_BY_FAMILLE        = $('#input__FAMILLE').val();
                        d.SEARCH_BY_PRIX_ACHAT     = $('#input__PRIX_ACHAT').val();
                        d.SEARCH_BY_PRIX_VENTE     = $('#input__PRIX_VENTE').val();
                    }
                },
                columns: [
                    { data: "DESIGNATION"},
                    { data: "FAMILLE"},
                    { data: "PRIX_ACHAT"},
                    { data: "PRIX_VENTE"},
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
            TABLA_article.draw();
        }

        // Refilter the table
        // $('#input__search_by_fecha_starts, #input__search_by_fecha_ends').on('change', function() {
        //     TABLA_article.draw();
        // });

        // Pintar en verde los inputs que contienen algo
        $( "#input__DESIGNATION" ).change(function() { agregar_quitar_bg_success('input__DESIGNATION'); });
        $( "#input__FAMILLE" ).change(function() { agregar_quitar_bg_success('input__FAMILLE'); });
        $( "#input__PRIX_ACHAT" ).change(function() { agregar_quitar_bg_success('input__PRIX_ACHAT'); });
        $( "#input__PRIX_VENTE" ).change(function() { agregar_quitar_bg_success('input__PRIX_VENTE'); });

        function agregar_quitar_bg_success(id){
            if ( $(`#${id}`).val() !== "" ) {
                $(`#${id}`).addClass('bg-success');
            } else {
                $(`#${id}`).removeClass('bg-success');
            }
        }

    </script>
@endsection