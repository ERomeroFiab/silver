@extends('listado')

@section('customcss')
    <style>
        #tabla_mission_motive_historique_maj_filter {
            display: none;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="my-0">Tabla: <b>mission_motive_historique_maj</b></h4>
                <p>(Total: {{ count( config('tablas')['mission_motive_historique_maj'] ) }} columnas)</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3 form-group">
                        <label>ANCIENNE_VALEUR:</label>
                        <input id="input__ANCIENNE_VALEUR" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>ANCIENNE_VALEUR_LIBELLE:</label>
                        <input id="input__ANCIENNE_VALEUR_LIBELLE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>DATE:</label>
                        <input id="input__DATE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>NOUVELLE_VALEUR:</label>
                        <input id="input__NOUVELLE_VALEUR" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>NOUVELLE_VALEUR_LIBELLE:</label>
                        <input id="input__NOUVELLE_VALEUR_LIBELLE" type="text" class="form-control">
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
                        <table id="tabla_mission_motive_historique_maj" class="table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>1 ANCIENNE_VALEUR</th>
                                    <th>2 ANCIENNE_VALEUR_LIBELLE</th>
                                    <th>3 CHAMPS</th>
                                    <th>4 DATE</th>
                                    <th>5 NOUVELLE_VALEUR</th>
                                    <th>6 NOUVELLE_VALEUR_LIBELLE</th>
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
        let TABLA_mission_motive_historique_maj;
        $(document).ready(function() {

            TABLA_mission_motive_historique_maj = $('#tabla_mission_motive_historique_maj').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_mission_motive_historique_maj') }}",
                    // error: function(jqXHR, ajaxOptions, thrownError) {
                    //     console.log("error: " + thrownError + "\n\n" + "status: " + jqXHR.statusText + "\n\n" + "response: "+jqXHR.responseText + "\n\n" + "options: "+ajaxOptions.responseText);
                    // },
                    data: function ( d ) {
                        d.SEARCH_BY_ANCIENNE_VALEUR              = $('#input__ANCIENNE_VALEUR').val();
                        d.SEARCH_BY_ANCIENNE_VALEUR_LIBELLE      = $('#input__ANCIENNE_VALEUR_LIBELLE').val();
                        d.SEARCH_BY_CHAMPS                       = $('#input__CHAMPS').val();
                        d.SEARCH_BY_DATE                         = $('#input__DATE').val();
                        d.SEARCH_BY_NOUVELLE_VALEUR              = $('#input__NOUVELLE_VALEUR').val();
                        d.SEARCH_BY_NOUVELLE_VALEUR_LIBELLE      = $('#input__NOUVELLE_VALEUR_LIBELLE').val();
                    }
                },
                columns: [
                    { data: "ANCIENNE_VALEUR"},
                    { data: "ANCIENNE_VALEUR_LIBELLE"},
                    { data: "CHAMPS"},
                    { data: "DATE"},
                    { data: "NOUVELLE_VALEUR"},
                    { data: "NOUVELLE_VALEUR_LIBELLE"},
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

        function buscar() {
            TABLA_mission_motive_historique_maj.draw();
        }


        // Refilter the table
        // $('#input__search_by_fecha_starts, #input__search_by_fecha_ends').on('change', function() {
        //     TABLA_mission_motive_historique_maj.draw();
        // });

        // Pintar en verde los inputs que contienen algo
        $( "#input__ANCIENNE_VALEUR" ).change(function() { agregar_quitar_bg_success('input__ANCIENNE_VALEUR'); });
        $( "#input__ANCIENNE_VALEUR_LIBELLE" ).change(function() { agregar_quitar_bg_success('input__ANCIENNE_VALEUR_LIBELLE'); });
        $( "#input__CHAMPS" ).change(function() { agregar_quitar_bg_success('input__CHAMPS'); });
        $( "#input__DATE" ).change(function() { agregar_quitar_bg_success('input__DATE'); });
        $( "#input__NOUVELLE_VALEUR" ).change(function() { agregar_quitar_bg_success('input__NOUVELLE_VALEUR'); });
        $( "#input__NOUVELLE_VALEUR_LIBELLE" ).change(function() { agregar_quitar_bg_success('input__NOUVELLE_VALEUR_LIBELLE'); });
        
        function agregar_quitar_bg_success(id){
            if ( $(`#${id}`).val() !== "" ) {
                $(`#${id}`).addClass('bg-success');
            } else {
                $(`#${id}`).removeClass('bg-success');
            }
        }

    </script>
@endsection