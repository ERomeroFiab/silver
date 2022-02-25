@extends('listado')



@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <h4 class="my-0">Rut: {{ $identification->SIRET }}</h4>
                        <p>Tabla <b>identification</b></p>
                    </div>
                </div>

                <div class="row">
                    @foreach (config('tablas') as $table_name => $columns)
                        @if ( $table_name === "identification" )
                            @foreach ($columns as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $column }}" type="text" class="form-control" value="{{ $identification->{$column} }}" disabled>
                                </div>
                            @endforeach
                        @endif
                    @endforeach
                </div>

                {{-- TABLA ACTION --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="mb-0">Tabla: <b>action</b> del rut <b>{{ $identification->SIRET }}</b></h2>
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

                {{-- TABLA AFFAIRE --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="mb-0">Tabla: <b>affaire</b> del rut <b>{{ $identification->SIRET }}</b></h2>
                                <p>({{ count( config('tablas')['affaire'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_affaire" class="table-hover" style="width:100%;">
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

                {{-- TABLA CONTACT --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="mb-0">Tabla: <b>contact</b> del rut <b>{{ $identification->SIRET }}</b></h2>
                                <p>({{ count( config('tablas')['contact'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_contact" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>1 NOM</th>
                                                    <th>2 SERVICE</th>
                                                    <th>3 FONCTION</th>
                                                    <th>4 E_MAIL</th>
                                                    <th>5 CONTACT_PRINCIPAL</th>
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

                {{-- TABLA CONTRAT --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="mb-0">Tabla: <b>contrat</b> del rut <b>{{ $identification->SIRET }}</b></h2>
                                <p>({{ count( config('tablas')['contrat'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_contrat" class="table-hover" style="width:100%;">
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

                {{-- TABLA contrat_detail_produit --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="mb-0">Tabla: <b>contrat_detail_produit</b> del rut <b>{{ $identification->SIRET }}</b></h2>
                                <p>({{ count( config('tablas')['contrat_detail_produit'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_contrat_detail_produit" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>1 PRODUIT</th>
                                                    <th>2 NO_CONTRAT_PARTIEL</th>
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
                                <h2 class="mb-0">Tabla: <b>documents</b> del rut <b>{{ $identification->SIRET }}</b></h2>
                                <p>({{ count( config('tablas')['documents'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_documents" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>1 DOCUMENT_FICHIER_NOM</th>
                                                    <th>2 DOCUMENT_FICHIER_TYPE</th>
                                                    <th>3 ORIGINE</th>
                                                    <th>4 DOCUMENT_FICHIER_DATE</th>
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

                {{-- TABLA identification_note --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="mb-0">Tabla: <b>identification_note</b> del rut <b>{{ $identification->SIRET }}</b></h2>
                                <p>({{ count( config('tablas')['identification_note'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_identification_note" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>1 NOTE</th>
                                                    <th>2 KOMPASS_ID</th>
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

                {{-- TABLA invoice --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="mb-0">Tabla: <b>invoice</b> del rut <b>{{ $identification->SIRET }}</b></h2>
                                <p>({{ count( config('tablas')['invoice'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_invoice" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>1 NO_CONTRAT</th>
                                                    <th>2 CONTRACT_NBER</th>
                                                    <th>3 INVOICE_DATE</th>
                                                    <th>4 INVOICE_NBER</th>
                                                    <th>5 PRODUCT</th>
                                                    <th>6 STATUS</th>
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

                {{-- TABLA mission --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="mb-0">Tabla: <b>mission</b> del rut <b>{{ $identification->SIRET }}</b></h2>
                                <p>({{ count( config('tablas')['mission'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_mission" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>1 DATE_DEBUT</th>
                                                    <th>2 DATE_FIN_ANALYSE</th>
                                                    <th>3 NO_CONTRAT</th>
                                                    <th>4 NO_MISSION</th>
                                                    <th>5 PRODUIT</th>
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

                {{-- TABLA mission_team --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="mb-0">Tabla: <b>mission_team</b> del rut <b>{{ $identification->SIRET }}</b></h2>
                                <p>({{ count( config('tablas')['mission_team'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_mission_team" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>1 ACTIF</th>
                                                    <th>2 DATE_DEBUT</th>
                                                    <th>3 DATE_FIN</th>
                                                    <th>4 CONSULTANT</th>
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

                {{-- TABLA societe_famille --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="mb-0">Tabla: <b>societe_famille</b> del rut <b>{{ $identification->SIRET }}</b></h2>
                                <p>({{ count( config('tablas')['societe_famille'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_societe_famille" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>1 NIVEAU</th>
                                                    <th>2 FIN_CONTRAT</th>
                                                    <th>3 FAMILLE</th>
                                                    <th>4 COMMERCIAL</th>
                                                    <th>5 DATE_SIGNATURE</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($identification->societe_familles as $soc_fam)
                                                    <tr>
                                                        <td>{{ $soc_fam->NIVEAU }}</td>
                                                        <td>{{ $soc_fam->FIN_CONTRAT }}</td>
                                                        <td>{{ $soc_fam->FAMILLE }}</td>
                                                        <td>{{ $soc_fam->COMMERCIAL }}</td>
                                                        <td>{{ $soc_fam->DATE_SIGNATURE }}</td>
                                                    </tr>
                                                @endforeach
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
                        d.SEARCH_BY_PID_IDENTIFICATION = $('#ID_IDENTIFICATION').val();
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

            TABLA_AFFAIRE = $('#tabla_affaire').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_affaire') }}",
                    data: function ( d ) {
                        d.SEARCH_BY_PID_IDENTIFICATION = $('#ID_IDENTIFICATION').val();
                    }
                },
                columns: [
                    { data: "NOM"},
                    { data: "NO_AFFAIRE"},
                    { data: "PHASE"},
                    { data: "EMAIL"},
                    { data: "DATE_SIGNATURE"},
                ],
                // order: [[ 1, 'desc' ]],
                pageLength: 5,
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

            TABLA_CONTACT = $('#tabla_contact').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_contact') }}",
                    data: function ( d ) {
                        d.SEARCH_BY_PID_IDENTIFICATION = $('#ID_IDENTIFICATION').val();
                    }
                },
                columns: [
                    { data: "NOM"},
                    { data: "SERVICE"},
                    { data: "FONCTION"},
                    { data: "E_MAIL"},
                    { data: "CONTACT_PRINCIPAL"},
                ],
                // order: [[ 1, 'desc' ]],
                pageLength: 5,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json',
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    title: "tabla contact - " + new Date().toLocaleString(),
                    className: "bg-info",
                    exportOptions: {
                        columns: ':not(.no_exportar)'
                    },
                    action: newExportAction
                }],
            });

            TABLA_CONTRAT = $('#tabla_contrat').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_contrat') }}",
                    data: function ( d ) {
                        d.SEARCH_BY_PID_IDENTIFICATION = $('#ID_IDENTIFICATION').val();
                    }
                },
                columns: [
                    { data: "NO_CONTRAT"},
                    { data: "NO_ENTITY"},
                    { data: "STATUT"},
                    { data: "NOM"},
                    { data: "E_MAIL"},
                    { data: "ALERTE_FIN_CONTRAT"},
                ],
                // order: [[ 1, 'desc' ]],
                pageLength: 5,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json',
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    title: "tabla contrat - " + new Date().toLocaleString(),
                    className: "bg-info",
                    exportOptions: {
                        columns: ':not(.no_exportar)'
                    },
                    action: newExportAction
                }],
            });

            TABLA_CONTRAT_DETAIL_PRODUIT = $('#tabla_contrat_detail_produit').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_contrat_detail_produit') }}",
                    data: function ( d ) {
                        d.SEARCH_BY_PID_IDENTIFICATION = $('#ID_IDENTIFICATION').val();
                    }
                },
                columns: [
                    { data: "PRODUIT"},
                    { data: "NO_CONTRAT_PARTIEL"},
                ],
                // order: [[ 1, 'desc' ]],
                pageLength: 5,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json',
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    title: "tabla contrat_detail_produit - " + new Date().toLocaleString(),
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
                        d.SEARCH_BY_PID_IDENTIFICATION = $('#ID_IDENTIFICATION').val();
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

            TABLA_IDENTIFICATION_NOTE = $('#tabla_identification_note').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_identification_note') }}",
                    data: function ( d ) {
                        d.SEARCH_BY_PID_IDENTIFICATION = $('#ID_IDENTIFICATION').val();
                    }
                },
                columns: [
                    { data: "NOTE"},
                    { data: "KOMPASS_ID"},
                ],
                // order: [[ 1, 'desc' ]],
                pageLength: 5,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json',
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    title: "tabla identification_note - " + new Date().toLocaleString(),
                    className: "bg-info",
                    exportOptions: {
                        columns: ':not(.no_exportar)'
                    },
                    action: newExportAction
                }],
            });

            TABLA_INVOICE = $('#tabla_invoice').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_invoice') }}",
                    data: function ( d ) {
                        d.SEARCH_BY_PID_IDENTIFICATION = $('#ID_IDENTIFICATION').val();
                    }
                },
                columns: [
                    { data: "NO_CONTRAT"},
                    { data: "CONTRACT_NBER"},
                    { data: "INVOICE_DATE"},
                    { data: "INVOICE_NBER"},
                    { data: "PRODUCT"},
                    { data: "STATUS"},
                ],
                // order: [[ 1, 'desc' ]],
                pageLength: 5,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json',
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    title: "tabla invoice - " + new Date().toLocaleString(),
                    className: "bg-info",
                    exportOptions: {
                        columns: ':not(.no_exportar)'
                    },
                    action: newExportAction
                }],
            });

            TABLA_MISSION = $('#tabla_mission').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_mission') }}",
                    data: function ( d ) {
                        d.SEARCH_BY_PID_IDENTIFICATION = $('#ID_IDENTIFICATION').val();
                    }
                },
                columns: [
                    { data: "DATE_DEBUT"},
                    { data: "DATE_FIN_ANALYSE"},
                    { data: "NO_CONTRAT"},
                    { data: "NO_MISSION"},
                    { data: "PRODUIT"},
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
                    title: "tabla mission - " + new Date().toLocaleString(),
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
                        d.SEARCH_BY_PID_IDENTIFICATION = $('#ID_IDENTIFICATION').val();
                    }
                },
                columns: [
                    { data: "ACTIF"},
                    { data: "DATE_DEBUT"},
                    { data: "DATE_FIN"},
                    { data: "CONSULTANT"},
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

            TABLA_SOCIETE_FAMILLE = $('#tabla_societe_famille').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_societe_famille') }}",
                    data: function ( d ) {
                        d.SEARCH_BY_PID_IDENTIFICATION = $('#ID_IDENTIFICATION').val();
                    }
                },
                columns: [
                    { data: "NIVEAU"},
                    { data: "FIN_CONTRAT"},
                    { data: "FAMILLE"},
                    { data: "COMMERCIAL"},
                    { data: "DATE_SIGNATURE"},
                ],
                // order: [[ 1, 'desc' ]],
                pageLength: 5,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json',
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    title: "tabla societe_famille - " + new Date().toLocaleString(),
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

