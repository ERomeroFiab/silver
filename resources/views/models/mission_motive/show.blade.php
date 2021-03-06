@extends('listado')

@section('customcss')
    <style>
        #tabla_mission_motive_eco_filter {
            display: none;
        }
        
        #tabla_mission_motive_historique_maj_filter{
            display: none;
        }

    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <h4 class="my-0">ID_MISSION_MOTIVE: {{ $mission_motive->ID_MISSION_MOTIVE }}</h4>
                        <p>Tabla <b>mission_motive</b></p>
                    </div>
                </div>

                <div class="row">
                    @foreach (config('tablas') as $table_name => $columns)
                        @if ( $table_name === "mission_motive" )
                            @foreach ($columns as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $column }}" type="text" class="form-control" value="{{ $mission_motive->{$column} }}" disabled>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>

                @if ( $mission_motive->mission )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla mission</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['mission'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $mission_motive->mission->{$column} }}" type="text" class="form-control" value="{{  $mission_motive->mission->{$column} }}" disabled title="{{ $mission_motive->mission->{$column} }}">
                            </div>
                        @endforeach
                    </div>
                @endif

                {{-- TABLA mission_motive_eco --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="my-0">Tabla: <b>mission_motive_eco</b></h4>
                                <p>({{ count( config('tablas')['mission_motive_eco'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_mission_motive_eco" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>1 ECO_PRESENTEE</th>
                                                    <th>2 ECO_VALIDEE</th>
                                                    <th>3 SOUS_MOTIF_2</th>
                                                    <th>4 YEAR</th>
                                                    <th>5 PACKAGE</th>
                                                    <th>6 ECO_ABANDONNEE</th>
                                                    <th>7 ECO_A_FACTURER</th>
                                                    <th>&nbsp;</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End card -->
                    </div>
                </div>

                {{-- TABLA mission_motive_historique_maj --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="my-0">Tabla: <b>mission_motive_historique_maj</b></h4>
                                <p>({{ count( config('tablas')['mission_motive_historique_maj'] ) }} columnas)</p>
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

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- End card -->
                    </div>
                </div>



            </div>



        </div> <!-- End card -->
    </div>
</div>
@endsection

@section('customjs')
    
    <script>
        let TABLA_ACTION;

        $(document).ready(function() {

            TABLA_ACTION = $('#tabla_mission_motive_eco').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_mission_motive_eco') }}",
                    data: function ( d ) {
                        d.SEARCH_BY_PID_MISSION_MOTIVE = $('#ID_MISSION_MOTIVE').val();
                    }
                },
                columns: [
                    { data: "ECO_PRESENTEE"},
                    { data: "ECO_VALIDEE"},
                    { data: "SOUS_MOTIF_2"},
                    { data: "YEAR"},
                    { data: "PACKAGE"},
                    { data: "ECO_ABANDONNEE"},
                    { data: "ECO_A_FACTURER"},
                ],
                // order: [[ 1, 'desc' ]],
                pageLength: 5,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json',
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    title: "tabla mission_motive_eco - " + new Date().toLocaleString(),
                    className: "bg-info",
                    exportOptions: {
                        columns: ':not(.no_exportar)'
                    },
                    action: newExportAction
                }],
            });

            TABLA_ACTION = $('#tabla_mission_motive_historique_maj').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_mission_motive_historique_maj') }}",
                    data: function ( d ) {
                        d.SEARCH_BY_PID_MISSION_MOTIVE = $('#ID_MISSION_MOTIVE').val();
                    }
                },
                columns: [
                    { data: "ANCIENNE_VALEUR"},
                    { data: "ANCIENNE_VALEUR_LIBELLE"},
                    { data: "CHAMPS"},
                    { data: "DATE"},
                    { data: "NOUVELLE_VALEUR"},
                    { data: "NOUVELLE_VALEUR_LIBELLE"},
                ],
                // order: [[ 1, 'desc' ]],
                pageLength: 5,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json',
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    title: "tabla mission_motive_historique_maj - " + new Date().toLocaleString(),
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

    </script>
@endsection

