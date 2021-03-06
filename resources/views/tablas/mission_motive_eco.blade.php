@extends('listado')

@section('customcss')
    <style>
        #tabla_mission_motive_eco_filter {
            display: none;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="my-0">Tabla: <b>mission_motive_eco</b></h4>
                <p>(Total: {{ count( config('tablas')['mission_motive_eco'] ) }} columnas)</p>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-3 form-group">
                        <label>DATE_PREVISIONNELLE:</label>
                        <input id="input__DATE_PREVISIONNELLE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>ECO_ABANDONNEE:</label>
                        <input id="input__ECO_ABANDONNEE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>ECO_A_FACTURER:</label>
                        <input id="input__ECO_A_FACTURER" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>ECO_ECART:</label>
                        <input id="input__ECO_ECART" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>ECO_PRESENTEE:</label>
                        <input id="input__ECO_PRESENTEE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>ECO_VALIDEE:</label>
                        <input id="input__ECO_VALIDEE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>SOUS_MOTIF_1:</label>
                        <input id="input__SOUS_MOTIF_1" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>SOUS_MOTIF_2:</label>
                        <input id="input__SOUS_MOTIF_2" type="text" class="form-control">
                    </div>

                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-sm btn-success float-right" type="button" onclick="buscar()">Filtrar</button>
                    </div>
                </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12" style="overflow-x: scroll;">
                        <table id="tabla_mission_motive_eco" class="table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>1 DATE_PREVISIONNELLE</th>
                                    <th>2 ECO_ABANDONNEE</th>
                                    <th>3 ECO_A_FACTURER</th>
                                    <th>4 ECO_ECART</th>
                                    <th>5 ECO_PRESENTEE</th>
                                    <th>6 ECO_VALIDEE</th>
                                    <th>7 SOUS_MOTIF_1</th>
                                    <th>8 SOUS_MOTIF_2</th>
                                    <th>9 YEAR</th>
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
        let TABLA_mission_motive_eco;
        $(document).ready(function() {

            TABLA_mission_motive_eco = $('#tabla_mission_motive_eco').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_mission_motive_eco') }}",
                    // error: function(jqXHR, ajaxOptions, thrownError) {
                    //     console.log("error: " + thrownError + "\n\n" + "status: " + jqXHR.statusText + "\n\n" + "response: "+jqXHR.responseText + "\n\n" + "options: "+ajaxOptions.responseText);
                    // },
                    data: function ( d ) {
                        d.SEARCH_BY_DATE_PREVISIONNELLE     = $('#input__DATE_PREVISIONNELLE').val();
                        d.SEARCH_BY_ECO_ABANDONNEE          = $('#input__ECO_ABANDONNEE').val();
                        d.SEARCH_BY_ECO_A_FACTURER          = $('#input__ECO_A_FACTURER').val();
                        d.SEARCH_BY_ECO_ECART               = $('#input__ECO_ECART').val();
                        d.SEARCH_BY_ECO_PRESENTEE           = $('#input__ECO_PRESENTEE').val();
                        d.SEARCH_BY_ECO_VALIDEE             = $('#input__ECO_VALIDEE').val();
                        d.SEARCH_BY_SOUS_MOTIF_1            = $('#input__SOUS_MOTIF_1').val();
                        d.SEARCH_BY_SOUS_MOTIF_2            = $('#input__SOUS_MOTIF_2').val();
                        d.SEARCH_BY_YEAR                    = $('#input__YEAR').val();
                    }
                },
                columns: [
                    { data: "DATE_PREVISIONNELLE"},
                    { data: "ECO_ABANDONNEE"},
                    { data: "ECO_A_FACTURER"},
                    { data: "ECO_ECART"},
                    { data: "ECO_PRESENTEE"},
                    { data: "ECO_VALIDEE"},
                    { data: "SOUS_MOTIF_1"},
                    { data: "SOUS_MOTIF_2"},
                    { data: "YEAR"},
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

            // funci??n para exportar el excel con todas las filas
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
            TABLA_mission_motive_eco.draw();
        }


        // Refilter the table
        // $('#input__search_by_fecha_starts, #input__search_by_fecha_ends').on('change', function() {
        //     TABLA_mission_motive_eco.draw();
        // });

        // Pintar en verde los inputs que contienen algo
        $( "#input__DATE_PREVISIONNELLE" ).change(function() { agregar_quitar_bg_success('input__DATE_PREVISIONNELLE'); });
        $( "#input__ECO_ABANDONNEE" ).change(function() { agregar_quitar_bg_success('input__ECO_ABANDONNEE'); });
        $( "#input__ECO_A_FACTURER" ).change(function() { agregar_quitar_bg_success('input__ECO_A_FACTURER'); });
        $( "#input__ECO_ECART" ).change(function() { agregar_quitar_bg_success('input__ECO_ECART'); });
        $( "#input__ECO_PRESENTEE" ).change(function() { agregar_quitar_bg_success('input__ECO_PRESENTEE'); });
        $( "#input__ECO_VALIDEE" ).change(function() { agregar_quitar_bg_success('input__ECO_VALIDEE'); });
        $( "#input__SOUS_MOTIF_1" ).change(function() { agregar_quitar_bg_success('input__SOUS_MOTIF_1'); });
        $( "#input__SOUS_MOTIF_2" ).change(function() { agregar_quitar_bg_success('input__SOUS_MOTIF_2'); });
        $( "#input__YEAR" ).change(function() { agregar_quitar_bg_success('input__YEAR'); });
        
        // function agregar_quitar_bg_success(id){
        //     if ( $(`#${id}`).val() !== "" ) {
        //         $(`#${id}`).addClass('bg-success');
        //     } else {
        //         $(`#${id}`).removeClass('bg-success');
        //     }
        // }

    </script>
@endsection