@extends('listado')

@section('customcss')
    <style>
        #tabla_mission_filter {
            display: none;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="my-0">Tabla: <b>mission</b></h4>
                <p>(Total: {{ count( config('tablas')['mission'] ) }} columnas)</p>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-3 form-group">
                        <label>NO_MISSION:</label>
                        <input id="input__NO_MISSION" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>CURRENT_STEP:</label>
                        <input id="input__CURRENT_STEP" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>NO_CONTRAT:</label>
                        <input id="input__NO_CONTRAT" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>PRODUIT:</label>
                        <input id="input__PRODUIT" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>Rut:</label>
                        <input id="input__RUT" type="text" class="form-control">
                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-sm btn-success float-right" type="button" onclick="buscar()">Filtrar</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12" style="overflow-x: scroll;">
                        <table id="tabla_mission" class="table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>1 NO_MISSION</th>
                                    <th>2 COORDINATOR</th>
                                    <th>3 CURRENT_STEP</th>
                                    <th>4 DATE_DEBUT</th>
                                    <th>5 POURCENTAGE</th>
                                    <th>6 NO_CONTRAT</th>
                                    <th>7 PRODUIT</th>
                                    <th>7 Cantidad de actions</th>
                                    <th>8 Rut</th>
                                    <th>9 Razón Social</th>
                                    <th>10 SYS_DATE_MODIFICATION</th>
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
        let TABLA_mission;
        $(document).ready(function() {

            TABLA_mission = $('#tabla_mission').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_mission') }}",
                    // error: function(jqXHR, ajaxOptions, thrownError) {
                    //     console.log("error: " + thrownError + "\n\n" + "status: " + jqXHR.statusText + "\n\n" + "response: "+jqXHR.responseText + "\n\n" + "options: "+ajaxOptions.responseText);
                    // },
                    data: function ( d ) {
                        d.SEARCH_BY_NO_MISSION   = document.querySelector('#input__NO_MISSION').value;
                        d.SEARCH_BY_CURRENT_STEP = document.querySelector('#input__CURRENT_STEP').value;
                        d.SEARCH_BY_NO_CONTRAT   = document.querySelector('#input__NO_CONTRAT').value;
                        d.SEARCH_BY_PRODUIT      = document.querySelector('#input__PRODUIT').value;
                        d.SEARCH_BY_RUT          = document.querySelector('#input__RUT').value;
                    }
                },
                columns: [
                    { data: "NO_MISSION"},
                    { data: "COORDINATOR"},
                    { data: "CURRENT_STEP"},
                    { data: "DATE_DEBUT"},
                    { data: "POURCENTAGE"},
                    { data: "NO_CONTRAT"},
                    { data: "PRODUIT"},
                    { data: "actions_count"},
                    { data: "rut"},
                    { data: "razon_social"},
                    { data: "SYS_DATE_MODIFICATION"},
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


        function buscar(){
            TABLA_mission.draw();
        }


        // Pintar en verde los inputs que contienen algo
        $( "#aaa" ).change(function() { agregar_quitar_bg_success('bbb'); });

        function agregar_quitar_bg_success(id){
            if ( $(`#${id}`).val() !== "" ) {
                $(`#${id}`).addClass('bg-success');
            } else {
                $(`#${id}`).removeClass('bg-success');
            }
        }

    </script>
@endsection