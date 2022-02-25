@extends('listado')



@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <h4 class="my-0">ID_MISSION: {{ $mission->ID_MISSION }}</h4>
                        <p>Tabla <b>mission</b></p>
                    </div>
                </div>

                <div class="row">
                    @foreach (config('tablas') as $table_name => $columns)
                        @if ( $table_name === "mission" )
                            @foreach ($columns as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $column }}" type="text" class="form-control" value="{{ $mission->{$column} }}" disabled>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                    @if ( $mission->identification )
                        <hr>
                        <div class="col-3 form-group">
                            <label>IDENTIFICATION</label>
                            <input id="{{ $mission->identification->ID_IDENTIFICATION }}" type="text" class="form-control" value="{{  $mission->identification->ID_IDENTIFICATION }}" disabled>
                        </div>
                    @endif
                </div>

                {{-- TABLA action --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="my-0">Tabla: <b>action</b></h4>
                                <p>({{ count( config('tablas')['action'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_action" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>1 CATEGORIE</th>
                                                    <th>2 EMPLACEMENT</th>
                                                    <th>3 E_MAIL</th>
                                                    <th>4 NOM</th>
                                                    <th>5 RESULTAT</th>
                                                    <th>6 SUIVI_PAR</th>
                                                    <th>7 TYPE_EVENEMENT</th>
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

                {{-- TABLA documents --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="my-0">Tabla: <b>documents</b></h4>
                                <p>({{ count( config('tablas')['documents'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_documents" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>1 NOM</th>
                                                    <th>2 NO_AFFAIRE</th>
                                                    <th>3 PHASE</th>
                                                    <th>4 EMAIL</th>
                                                    <th>5 DATE_SIGNATURE</th>
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

                {{-- TABLA mission_motive --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="my-0">Tabla: <b>mission_motive</b></h4>
                                <p>({{ count( config('tablas')['mission_motive'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_mission_motive" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>1 COMMENTS_SITE</th>
                                                    <th>2 CONSULTANT</th>
                                                    <th>3 DATE_LIMITE</th>
                                                    <th>4 ETAPE_COURANTE</th>
                                                    <th>5 MOTIF</th>
                                                    <th>6 POURCENTAGE</th>
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
                                                    <th>1 NO_CONTRAT</th>
                                                    <th>2 NO_ENTITY</th>
                                                    <th>3 STATUT</th>
                                                    <th>4 NOM</th>
                                                    <th>5 E_MAIL</th>
                                                    <th>6 ALERTE_FIN_CONTRAT</th>
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

                {{-- TABLA mission_team --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="my-0">Tabla: <b>mission_team</b></h4>
                                <p>({{ count( config('tablas')['mission_team'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_mission_team" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>1 ACTIF</th>
                                                    <th>2 CONSULTANT</th>
                                                    <th>3 DATE_DEBUT</th>
                                                    <th>4 DATE_FIN</th>
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

            TABLA_ACTION = $('#tabla_action').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_action') }}",
                    data: function ( d ) {
                        d.SEARCH_BY_PID_MISSION = $('#ID_MISSION').val();
                    }
                },
                columns: [
                    { data: "CATEGORIE"},
                    { data: "EMPLACEMENT"},
                    { data: "E_MAIL"},
                    { data: "NOM"},
                    { data: "RESULTAT"},
                    { data: "SUIVI_PAR"},
                    { data: "TYPE_EVENEMENT"},
                ],
                // order: [[ 1, 'desc' ]],
                pageLength: 5,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json',
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    title: "tabla action - " + new Date().toLocaleString(),
                    className: "bg-info",
                    exportOptions: {
                        columns: ':not(.no_exportar)'
                    },
                    action: newExportAction
                }],
            });

            TABLA_DOCUMENTS = $('#tabla_documents').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_documents') }}",
                    data: function ( d ) {
                        d.SEARCH_BY_PID_MISSION = $('#ID_MISSION').val();
                    }
                },
                columns: [
                    { data: "DOCUMENT_FICHIER_NOM"},
                    { data: "DOCUMENT_FICHIER_TYPE"},
                    { data: "ORIGINE"},
                    { data: "DOCUMENT_FICHIER_DATE"},
                ],
                // order: [[ 1, 'desc' ]],
                pageLength: 5,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json',
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    title: "tabla documents - " + new Date().toLocaleString(),
                    className: "bg-info",
                    exportOptions: {
                        columns: ':not(.no_exportar)'
                    },
                    action: newExportAction
                }],
            });

            TABLA_MISSION_MOTIVE = $('#tabla_mission_motive').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_mission_motive') }}",
                    data: function ( d ) {
                        d.SEARCH_BY_PID_MISSION = $('#ID_MISSION').val();
                    }
                },
                columns: [
                    { data: "COMMENTS_SITE"},
                    { data: "CONSULTANT"},
                    { data: "DATE_LIMITE"},
                    { data: "ETAPE_COURANTE"},
                    { data: "MOTIF"},
                    { data: "POURCENTAGE"},
                ],
                // order: [[ 1, 'desc' ]],
                pageLength: 5,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json',
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    title: "tabla mission_motive - " + new Date().toLocaleString(),
                    className: "bg-info",
                    exportOptions: {
                        columns: ':not(.no_exportar)'
                    },
                    action: newExportAction
                }],
            });

            TABLA_MISSION_MOTIVE_HISTORIQUE_MAJ = $('#tabla_mission_motive_historique_maj').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_mission_motive_historique_maj') }}",
                    data: function ( d ) {
                        d.SEARCH_BY_PID_MISSION = $('#ID_MISSION').val();
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

            TABLA_MISSION_TEAM = $('#tabla_mission_team').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_mission_team') }}",
                    data: function ( d ) {
                        d.SEARCH_BY_PID_MISSION = $('#ID_MISSION').val();
                    }
                },
                columns: [
                    { data: "ACTIF"},
                    { data: "CONSULTANT"},
                    { data: "DATE_DEBUT"},
                    { data: "DATE_FIN"},
                ],
                // order: [[ 1, 'desc' ]],
                pageLength: 5,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json',
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    title: "tabla mission_team - " + new Date().toLocaleString(),
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

    </script>
@endsection

