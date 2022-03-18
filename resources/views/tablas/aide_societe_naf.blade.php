@extends('listado')

@section('customcss')
    <style>
        #tabla_aide_societe_naf_filter {
            display: none;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="my-0">Tabla: <b>aide_societe_naf</b></h4>
                <p>(Total: {{ count( config('tablas')['aide_societe_naf'] ) }} columnas)</p>
            </div>
            <div class="row">
                <div class="col-3 form-group">
                    <label>CODE:</label>
                    <input id="input__CODE" type="text" class="form-control">
                </div>
                <div class="col-3 form-group">
                    <label>IT_PART_TIME:</label>
                    <input id="input__IT_PART_TIME" type="text" class="form-control">
                </div>
                <div class="col-3 form-group">
                    <label>LIBELLE:</label>
                    <input id="input__LIBELLE" type="text" class="form-control">
                </div>
                <div class="col-3 form-group">
                    <label>SEGMENT:</label>
                    <input id="input__SEGMENT" type="text" class="form-control">
                </div>
                <div class="col-3 form-group">
                    <label>TGG_2017:</label>
                    <input id="input__TGG_2017" type="text" class="form-control">
                </div>
                <div class="col-3 form-group">
                    <label>TARGET_AT:</label>
                    <input id="input__TARGET_AT" type="text" class="form-control">
                </div>
                <div class="col-3 form-group">
                    <label>TARGET_INNO:</label>
                    <input id="input__TARGET_INNO" type="text" class="form-control">
                </div>
                <div class="col-3 form-group">
                    <label>TARGET_ONSS:</label>
                    <input id="input__TARGET_ONSS" type="text" class="form-control">
                </div>
                <div class="col-3 form-group">
                    <label>TARGET_PRP:</label>
                    <input id="input__TARGET_PRP" type="text" class="form-control">
                </div>
                <div class="col-3 form-group">
                    <label>TARGET_SOCIAL:</label>
                    <input id="input__TARGET_SOCIAL" type="text" class="form-control">
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
                        <table id="tabla_aide_societe_naf" class="table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>1 CODE</th>
                                    <th>2 IT_PART_TIME</th>
                                    <th>3 LIBELLE</th>
                                    <th>4 SEGMENT</th>
                                    <th>5 TGG_2017</th>
                                    <th>6 TARGET_AT</th>
                                    <th>7 TARGET_INNO</th>
                                    <th>8 TARGET_ONSS</th>
                                    <th>9 TARGET_PRP</th>
                                    <th>10 TARGET_SOCIAL</th>
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
        let TABLA_aide_societe_naf;
        $(document).ready(function() {

            TABLA_aide_societe_naf = $('#tabla_aide_societe_naf').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_aide_societe_naf') }}",
                    // error: function(jqXHR, ajaxOptions, thrownError) {
                    //     console.log("error: " + thrownError + "\n\n" + "status: " + jqXHR.statusText + "\n\n" + "response: "+jqXHR.responseText + "\n\n" + "options: "+ajaxOptions.responseText);
                    // },
                    data: function ( d ) {
                        d.SEARCH_BY_CODE               = $('#input__CODE').val();
                        d.SEARCH_BY_IT_PART_TIME       = $('#input__IT_PART_TIME').val();
                        d.SEARCH_BY_LIBELLE            = $('#input__LIBELLE').val();
                        d.SEARCH_BY_SEGMENT            = $('#input__SEGMENT').val();
                        d.SEARCH_BY_TGG_2017           = $('#input__TGG_2017').val();
                        d.SEARCH_BY_TARGET_AT          = $('#input__TARGET_AT').val();
                        d.SEARCH_BY_TARGET_INNO        = $('#input__TARGET_INNO').val();
                        d.SEARCH_BY_TARGET_ONSS        = $('#input__TARGET_ONSS').val();
                        d.SEARCH_BY_TARGET_PRP         = $('#input__TARGET_PRP').val();
                        d.SEARCH_BY_TARGET_SOCIAL      = $('#input__TARGET_SOCIAL').val();
                    }
                },
                columns: [
                    { data: "CODE"},
                    { data: "IT_PART_TIME"},
                    { data: "LIBELLE"},
                    { data: "SEGMENT"},
                    { data: "TGG_2017"},
                    { data: "TARGET_AT"},
                    { data: "TARGET_INNO"},
                    { data: "TARGET_ONSS"},
                    { data: "TARGET_PRP"},
                    { data: "TARGET_SOCIAL"},
                ],
                // order: [[ 1, 'desc' ]],
                pageLength: 10,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json',
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    title: "tabla aide_societe_naf - " + new Date().toLocaleString(),
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
                var oldStart = dt.aide_societe_naf()[0]._iDisplayStart;
                dt.one('preXhr', function (e, s, data) {
                    // Just this once, load all data from the server...
                    data.start = 0;
                    data.length = 2147483647;
                    dt.one('preDraw', function (e, aide_societe_naf) {
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
                            aide_societe_naf._iDisplayStart = oldStart;
                            data.start = oldStart;
                        });
                        // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                        setTimeout(dt.ajax.reload, 0);
                        // Prevent rendering of the full data to the DOM
                        return false;
                    });
                });
                // Requery the server with the new one-time export aide_societe_naf
                dt.ajax.reload();
            }

        });

        function buscar() {
            TABLA_aide_societe_naf.draw();
        }

        // Refilter the table
        // $('#input__search_by_fecha_starts, #input__search_by_fecha_ends').on('change', function() {
        //     TABLA_aide_societe_naf.draw();
        // });

        // Pintar en verde los inputs que contienen algo
        $( "#input__CODE" ).change(function() { agregar_quitar_bg_success('input__CODE'); });
        $( "#input__IT_PART_TIME" ).change(function() { agregar_quitar_bg_success('input__IT_PART_TIME'); });
        $( "#input__LIBELLE" ).change(function() { agregar_quitar_bg_success('input__LIBELLE'); });
        $( "#input__SEGMENT" ).change(function() { agregar_quitar_bg_success('input__SEGMENT'); });
        $( "#input__TGG_2017" ).change(function() { agregar_quitar_bg_success('input__TGG_2017'); });
        $( "#input__TARGET_AT" ).change(function() { agregar_quitar_bg_success('input__TARGET_AT'); });
        $( "#input__TARGET_INNO" ).change(function() { agregar_quitar_bg_success('input__TARGET_INNO'); });
        $( "#input__TARGET_ONSS" ).change(function() { agregar_quitar_bg_success('input__TARGET_ONSS'); });
        $( "#input__TARGET_PRP" ).change(function() { agregar_quitar_bg_success('input__TARGET_PRP'); });
        $( "#input__TARGET_SOCIAL" ).change(function() { agregar_quitar_bg_success('input__TARGET_SOCIAL'); });

        function agregar_quitar_bg_success(id){
            if ( $(`#${id}`).val() !== "" ) {
                $(`#${id}`).addClass('bg-success');
            } else {
                $(`#${id}`).removeClass('bg-success');
            }
        }

    </script>
@endsection