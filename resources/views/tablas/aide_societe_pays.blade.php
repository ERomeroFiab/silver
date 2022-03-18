@extends('listado')

@section('customcss')
    <style>
        #tabla_aide_societe_pays_filter {
            display: none;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="my-0">Tabla: <b>aide_societe_pays</b></h4>
                <p>(Total: {{ count( config('tablas')['aide_societe_pays'] ) }} columnas)</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3 form-group">
                        <label>CODE_ISO:</label>
                        <input id="input__CODE_ISO" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>CONTINENT:</label>
                        <input id="input__CONTINENT" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>INDICATIF_TEL:</label>
                        <input id="input__INDICATIF_TEL" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>NOM_PAYS:</label>
                        <input id="input__NOM_PAYS" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>LATITUDE:</label>
                        <input id="input__LATITUDE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>LONGITUDE:</label>
                        <input id="input__LONGITUDE" type="text" class="form-control">
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
                        <table id="tabla_aide_societe_pays" class="table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>1 CODE_ISO</th>
                                    <th>2 CONTINENT</th>
                                    <th>3 INDICATIF_TEL</th>
                                    <th>4 NOM_PAYS</th>
                                    <th>5 LATITUDE</th>
                                    <th>6 LONGITUDE</th>
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
        let TABLA_aide_societe_pays;
        $(document).ready(function() {

            TABLA_aide_societe_pays = $('#tabla_aide_societe_pays').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_aide_societe_pays') }}",
                    // error: function(jqXHR, ajaxOptions, thrownError) {
                    //     console.log("error: " + thrownError + "\n\n" + "status: " + jqXHR.statusText + "\n\n" + "response: "+jqXHR.responseText + "\n\n" + "options: "+ajaxOptions.responseText);
                    // },
                    data: function ( d ) {
                        d.SEARCH_BY_CODE_ISO         = $('#input__CODE_ISO').val();
                        d.SEARCH_BY_CONTINENT        = $('#input__CONTINENT').val();
                        d.SEARCH_BY_INDICATIF_TEL    = $('#input__INDICATIF_TEL').val();
                        d.SEARCH_BY_NOM_PAYS         = $('#input__NOM_PAYS').val();
                        d.SEARCH_BY_LATITUDE         = $('#input__LATITUDE').val();
                        d.SEARCH_BY_LONGITUDE        = $('#input__LONGITUDE').val();
                    }
                },
                columns: [
                    { data: "CODE_ISO"},
                    { data: "CONTINENT"},
                    { data: "INDICATIF_TEL"},
                    { data: "NOM_PAYS"},
                    { data: "LATITUDE"},
                    { data: "LONGITUDE"},
                ],
                // order: [[ 1, 'desc' ]],
                pageLength: 10,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json',
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    title: "tabla aide_societe_pays - " + new Date().toLocaleString(),
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
                var oldStart = dt.aide_societe_pays()[0]._iDisplayStart;
                dt.one('preXhr', function (e, s, data) {
                    // Just this once, load all data from the server...
                    data.start = 0;
                    data.length = 2147483647;
                    dt.one('preDraw', function (e, aide_societe_pays) {
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
                            aide_societe_pays._iDisplayStart = oldStart;
                            data.start = oldStart;
                        });
                        // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                        setTimeout(dt.ajax.reload, 0);
                        // Prevent rendering of the full data to the DOM
                        return false;
                    });
                });
                // Requery the server with the new one-time export aide_societe_pays
                dt.ajax.reload();
            }

        });

        function buscar() {
            TABLA_aide_societe_pays.draw();
        }

        // Refilter the table
        // $('#input__search_by_fecha_starts, #input__search_by_fecha_ends').on('change', function() {
        //     TABLA_aide_societe_pays.draw();
        // });

        // Pintar en verde los inputs que contienen algo
        $( "#input__CODE_ISO" ).change(function() { agregar_quitar_bg_success('input__CODE_ISO'); });
        $( "#input__CONTINENT" ).change(function() { agregar_quitar_bg_success('input__CONTINENT'); });
        $( "#input__INDICATIF_TEL" ).change(function() { agregar_quitar_bg_success('input__INDICATIF_TEL'); });
        $( "#input__NOM_PAYS" ).change(function() { agregar_quitar_bg_success('input__NOM_PAYS'); });
        $( "#input__LATITUDE" ).change(function() { agregar_quitar_bg_success('input__LATITUDE'); });
        $( "#input__LONGITUDE" ).change(function() { agregar_quitar_bg_success('input__LONGITUDE'); });
        

        function agregar_quitar_bg_success(id){
            if ( $(`#${id}`).val() !== "" ) {
                $(`#${id}`).addClass('bg-success');
            } else {
                $(`#${id}`).removeClass('bg-success');
            }
        }

    </script>
@endsection