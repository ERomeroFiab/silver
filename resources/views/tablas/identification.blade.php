@extends('listado')

@section('customcss')
    <style>
        #tabla_identification_filter {
            display: none;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h3 class="my-0">Tabla: <b>identification</b></h3>
                <p>(total: {{ count( config('tablas')['identification'] ) }} columnas)</p>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-3 form-group">
                        <label>ID_IDENTIFICATION:</label>
                        <input id="input__ID_IDENTIFICATION" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>SIRET:</label>
                        <input id="input__SIRET" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>ADRESSE1:</label>
                        <input id="input__ADRESSE1" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>AUDITEUR:</label>
                        <input id="input__AUDITEUR" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>EFFECTIF:</label>
                        <input id="input__EFFECTIF" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>GROUP:</label>
                        <input id="input__GROUP" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>RAISON_SOC:</label>
                        <input id="input__RAISON_SOC" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>TYPE_FICHE:</label>
                        <input id="input__TYPE_FICHE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>VILLE:</label>
                        <input id="input__VILLE" type="text" class="form-control">
                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-sm btn-success float-right" type="button" onclick="buscar()">Buscar</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12" style="overflow-x: scroll;">
                        <table id="tabla_identification" class="table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>1  ID_IDENTIFICATION</th>
                                    <th>2  SIRET</th>
                                    <th>3  ADRESSE1</th>
                                    <th>4  AUDITEUR</th>
                                    <th>5  EFFECTIF</th>
                                    <th>6  GROUP</th>
                                    <th>7  RAISON_SOC</th>
                                    <th>8  TYPE_FICHE</th>
                                    <th>9  VILLE</th>
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
        let TABLA_IDENTIFICATION;
        $(document).ready(function() {

            TABLA_IDENTIFICATION = $('#tabla_identification').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_identification') }}",
                    // error: function(jqXHR, ajaxOptions, thrownError) {
                    //     console.log("error: " + thrownError + "\n\n" + "status: " + jqXHR.statusText + "\n\n" + "response: "+jqXHR.responseText + "\n\n" + "options: "+ajaxOptions.responseText);
                    // },
                    data: function ( d ) {
                        d.SEARCH_BY_ID_IDENTIFICATION = $('#input__ID_IDENTIFICATION').val();
                        d.SEARCH_BY_SIRET             = $('#input__SIRET').val();
                        d.SEARCH_BY_ADRESSE1          = $('#input__ADRESSE1').val();
                        d.SEARCH_BY_AUDITEUR          = $('#input__AUDITEUR').val();
                        d.SEARCH_BY_EFFECTIF          = $('#input__EFFECTIF').val();
                        d.SEARCH_BY_GROUP             = $('#input__GROUP').val();
                        d.SEARCH_BY_RAISON_SOC        = $('#input__RAISON_SOC').val();
                        d.SEARCH_BY_TYPE_FICHE        = $('#input__TYPE_FICHE').val();
                        d.SEARCH_BY_VILLE             = $('#input__VILLE').val();
                    }
                },
                columns: [
                    { data: "ID_IDENTIFICATION"},
                    { data: "SIRET"},
                    { data: "ADRESSE1"},
                    { data: "AUDITEUR"},
                    { data: "EFFECTIF"},
                    { data: "GROUP"},
                    { data: "RAISON_SOC"},
                    { data: "TYPE_FICHE"},
                    { data: "VILLE"},
                ],
                // order: [[ 1, 'desc' ]],
                pageLength: 10,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json',
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    title: "tabla identification - " + new Date().toLocaleString(),
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
            TABLA_IDENTIFICATION.draw();
        }


        // Refilter the table
        // $('#input__search_by_fecha_starts, #input__search_by_fecha_ends').on('change', function() {
        //     TABLA_ORDENES.draw();
        // });

        // Pintar en verde los inputs que contienen algo
        $( "#input__ID_IDENTIFICATION" ).change(function() { agregar_quitar_bg_success('input__ID_IDENTIFICATION'); });
        $( "#input__SIRET" ).change(function() { agregar_quitar_bg_success('input__SIRET'); });
        $( "#input__ADRESSE1" ).change(function() { agregar_quitar_bg_success('input__ADRESSE1'); });
        $( "#input__AUDITEUR" ).change(function() { agregar_quitar_bg_success('input__AUDITEUR'); });
        $( "#input__EFFECTIF" ).change(function() { agregar_quitar_bg_success('input__EFFECTIF'); });
        $( "#input__GROUP" ).change(function() { agregar_quitar_bg_success('input__GROUP'); });
        $( "#input__RAISON_SOC" ).change(function() { agregar_quitar_bg_success('input__RAISON_SOC'); });
        $( "#input__TYPE_FICHE" ).change(function() { agregar_quitar_bg_success('input__TYPE_FICHE'); });
        $( "#input__VILLE" ).change(function() { agregar_quitar_bg_success('input__VILLE'); });

        function agregar_quitar_bg_success(id){
            if ( $(`#${id}`).val() !== "" ) {
                $(`#${id}`).addClass('bg-success');
            } else {
                $(`#${id}`).removeClass('bg-success');
            }
        }

    </script>
@endsection