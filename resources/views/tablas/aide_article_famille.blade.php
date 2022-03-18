@extends('listado')

@section('customcss')
    <style>
        #tabla_aide_article_famille_filter {
            display: none;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="my-0">Tabla: <b>aide_article_famille</b></h4>
                <p>(Total: {{ count( config('tablas')['aide_article_famille'] ) }} columnas)</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3 form-group">
                        <label>FAMILLE:</label>
                        <input id="input__FAMILLE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>CODE_ANALYTIQUE_SAGE:</label>
                        <input id="input__CODE_ANALYTIQUE_SAGE" type="text" class="form-control">
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
                    <div class="col-12" style="overflow-x: scroll;">
                        <table id="tabla_aide_article_famille" class="table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>1 FAMILLE</th>
                                    <th>2 CODE_ANALYTIQUE_SAGE</th>
                                    <th>3 SYS_DATE_CREATION</th>
                                    <th>4 SYS_USER_CREATION</th>
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
        let TABLA_AIDE_ARTICLE_FAMILLE;
        $(document).ready(function() {

            TABLA_AIDE_ARTICLE_FAMILLE = $('#tabla_aide_article_famille').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_aide_article_famille') }}",
                    // error: function(jqXHR, ajaxOptions, thrownError) {
                    //     console.log("error: " + thrownError + "\n\n" + "status: " + jqXHR.statusText + "\n\n" + "response: "+jqXHR.responseText + "\n\n" + "options: "+ajaxOptions.responseText);
                    // },
                    data: function ( d ) {
                        d.SEARCH_BY_FAMILLE                   = $('#input__FAMILLE').val();
                        d.SEARCH_BY_CODE_ANALYTIQUE_SAGE      = $('#input__CODE_ANALYTIQUE_SAGE').val();
                        d.SEARCH_BY_SYS_DATE_CREATION         = $('#input__SYS_DATE_CREATION').val();
                        d.SEARCH_BY_SYS_USER_CREATION         = $('#input__SYS_USER_CREATION').val();
                    }
                },
                columns: [
                    { data: "FAMILLE"},
                    { data: "CODE_ANALYTIQUE_SAGE"},
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
                    title: "tabla aide_article_famille - " + new Date().toLocaleString(),
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
                var oldStart = dt.aide_article_famille()[0]._iDisplayStart;
                dt.one('preXhr', function (e, s, data) {
                    // Just this once, load all data from the server...
                    data.start = 0;
                    data.length = 2147483647;
                    dt.one('preDraw', function (e, aide_article_famille) {
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
                            aide_article_famille._iDisplayStart = oldStart;
                            data.start = oldStart;
                        });
                        // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                        setTimeout(dt.ajax.reload, 0);
                        // Prevent rendering of the full data to the DOM
                        return false;
                    });
                });
                // Requery the server with the new one-time export aide_article_famille
                dt.ajax.reload();
            }

        });
        function buscar(){
            TABLA_AIDE_ARTICLE_FAMILLE.draw(); 
        }


        // Refilter the table
        // $('#input__search_by_fecha_starts, #input__search_by_fecha_ends').on('change', function() {
        //     TABLA_aide_article_famille.draw();
        // });

        // Pintar en verde los inputs que contienen algo
        $( "#input__FAMILLE" ).change(function() { agregar_quitar_bg_success('input__FAMILLE'); });
        $( "#input__CODE_ANALYTIQUE_SAGE" ).change(function() { agregar_quitar_bg_success('input__CODE_ANALYTIQUE_SAGE'); });
        $( "#input__SYS_DATE_CREATION" ).change(function() { agregar_quitar_bg_success('input__SYS_DATE_CREATION'); });
        $( "#input__SYS_USER_CREATION" ).change(function() { agregar_quitar_bg_success('input__SYS_USER_CREATION'); });
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