@extends('listado')

@section('customcss')
    <style>
        #tabla_aide_societe_commune_filter {
            display: none;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="my-0">Tabla: <b>aide_societe_commune</b></h4>
                <p>(Total: {{ count( config('tablas')['aide_societe_commune'] ) }} columnas)</p>
            </div>
            <div class="row">

                <div class="col-3 form-group">
                    <label>CODE_POSTAL:</label>
                    <input id="input__CODE_POSTAL" type="text" class="form-control">
                </div>
                <div class="col-3 form-group">
                    <label>COMMUNE:</label>
                    <input id="input__COMMUNE" type="text" class="form-control">
                </div>
                <div class="col-3 form-group">
                    <label>INSEE:</label>
                    <input id="input__INSEE" type="text" class="form-control">
                </div>
                <div class="col-3 form-group">
                    <label>LIB_DEPARTEMENT:</label>
                    <input id="input__LIB_DEPARTEMENT" type="text" class="form-control">
                </div>
                <div class="col-3 form-group">
                    <label>REGION:</label>
                    <input id="input__REGION" type="text" class="form-control">
                </div>
                <div class="col-3 form-group">
                    <label>SECTEUR:</label>
                    <input id="input__SECTEUR" type="text" class="form-control">
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
                        <table id="tabla_aide_societe_commune" class="table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>1 CODE_POSTAL</th>
                                    <th>2 COMMUNE</th>
                                    <th>3 INSEE</th>
                                    <th>4 LIB_DEPARTEMENT</th>
                                    <th>5 REGION</th>
                                    <th>6 SECTEUR</th>
                                    <th>7 SYS_USER_CREATION</th>
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
        let TABLA_aide_societe_commune;
        $(document).ready(function() {

            TABLA_aide_societe_commune = $('#tabla_aide_societe_commune').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_aide_societe_commune') }}",
                    // error: function(jqXHR, ajaxOptions, thrownError) {
                    //     console.log("error: " + thrownError + "\n\n" + "status: " + jqXHR.statusText + "\n\n" + "response: "+jqXHR.responseText + "\n\n" + "options: "+ajaxOptions.responseText);
                    // },
                    data: function ( d ) {
                        d.SEARCH_BY_CODE_POSTAL = $('#input__CODE_POSTAL').val();
                        d.SEARCH_BY_COMMUNE = $('#input__COMMUNE').val();
                        d.SEARCH_BY_INSEE= $('#input__INSEE').val();
                        d.SEARCH_BY_LIB_DEPARTEMENT = $('#input__LIB_DEPARTEMENT').val();
                        d.SEARCH_BY_REGION = $('#input__REGION').val();
                        d.SEARCH_BY_SECTEUR = $('#input__SECTEUR').val();
                        d.SEARCH_BY_SYS_USER_CREATION = $('#input__SYS_USER_CREATION').val();
                    }
                },
                columns: [
                    { data: "CODE_POSTAL"},
                    { data: "COMMUNE"},
                    { data: "INSEE"},
                    { data: "LIB_DEPARTEMENT"},
                    { data: "REGION"},
                    { data: "SECTEUR"},
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
                    title: "tabla aide_societe_commune - " + new Date().toLocaleString(),
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
                var oldStart = dt.aide_societe_commune()[0]._iDisplayStart;
                dt.one('preXhr', function (e, s, data) {
                    // Just this once, load all data from the server...
                    data.start = 0;
                    data.length = 2147483647;
                    dt.one('preDraw', function (e, aide_societe_commune) {
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
                            aide_societe_commune._iDisplayStart = oldStart;
                            data.start = oldStart;
                        });
                        // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                        setTimeout(dt.ajax.reload, 0);
                        // Prevent rendering of the full data to the DOM
                        return false;
                    });
                });
                // Requery the server with the new one-time export aide_societe_commune
                dt.ajax.reload();
            }

        });

        function buscar() {
            TABLA_aide_societe_commune.draw();
        }


        // Refilter the table
        // $('#input__search_by_fecha_starts, #input__search_by_fecha_ends').on('change', function() {
        //     TABLA_aide_societe_commune.draw();
        // });

        // Pintar en verde los inputs que contienen algo
        $( "#input__CODE_POSTAL" ).change(function() { agregar_quitar_bg_success('input__CODE_POSTAL'); });
        $( "#input__COMMUNE" ).change(function() { agregar_quitar_bg_success('input__COMMUNE'); });
        $( "#input__INSEE" ).change(function() { agregar_quitar_bg_success('input__INSEE'); });
        $( "#input__LIB_DEPARTEMENT" ).change(function() { agregar_quitar_bg_success('input__LIB_DEPARTEMENT'); });
        $( "#input__REGION" ).change(function() { agregar_quitar_bg_success('input__REGION'); });
        $( "#input__SECTEUR" ).change(function() { agregar_quitar_bg_success('input__SECTEUR'); });
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