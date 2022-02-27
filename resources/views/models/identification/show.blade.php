@extends('listado')



@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <h4 class="my-0">ID_IDENTIFICATION: {{ $identification->ID_IDENTIFICATION }}</h4>
                        <p>Tabla <b>identification</b></p>
                    </div>
                </div>

                <div class="row">
                    @foreach (config('tablas') as $table_name => $columns)
                        @if ( $table_name === "identification" )
                            @foreach ($columns as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $column }}" type="text" class="form-control" value="{{ $identification->{$column} }}" disabled title="{{ $identification->{$column} }}">
                                </div>
                            @endforeach
                        @endif
                    @endforeach

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
                                                    <th>1 DOCUMENT_FICHIER_NOM</th>
                                                    <th>2 DOCUMENT_FICHIER_TYPE</th>
                                                    <th>3 ORIGINE</th>
                                                    <th>4 DOCUMENT_FICHIER_DATE</th>
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
                                                    <th>2 RESULTAT</th>
                                                    <th>3 NOTE</th>
                                                    <th>4 NOM</th>
                                                    <th>5 FAIT</th>
                                                    <th>6 EMPLACEMENT</th>
                                                    <th>7 DATE_DEBUT</th>
                                                    <th>8 DATE_FIN</th>
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

                {{-- TABLA affaire --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="my-0">Tabla: <b>affaire</b></h4>
                                <p>({{ count( config('tablas')['affaire'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_affaire" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>1 TOTAL_PREVISIONNEL</th>
                                                    <th>2 PRODUIT</th>
                                                    <th>3 PROBABILITE</th>
                                                    <th>4 PRENOM</th>
                                                    <th>5 NOM</th>
                                                    <th>6 NO_AFFAIRE</th>
                                                    <th>7 PHASE</th>
                                                    <th>8 EMAIL</th>
                                                    <th>9 MONTANT_PONDERE</th>
                                                    <th>10 SUIVI_PAR</th>
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

                {{-- TABLA contact --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="my-0">Tabla: <b>contact</b></h4>
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
                                                    <th>4 CONTACT_PRINCIPAL</th>
                                                    <th>5 NOTE</th>
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

                {{-- TABLA contrat --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="my-0">Tabla: <b>contrat</b></h4>
                                <p>({{ count( config('tablas')['contrat'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_contrat" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>1 NO_CONTRAT</th>
                                                    <th>2 VALEUR</th>
                                                    <th>3 SUIVI_PAR</th>
                                                    <th>4 NO_CONTRAT_ORIGINE</th>
                                                    <th>5 NO_ENTITY</th>
                                                    <th>6 E_MAIL</th>
                                                    <th>7 ENGAGEMENT_MOIS</th>
                                                    <th>8 NOM</th>
                                                    <th>9 DATE_DEBUT_CONTRAT</th>
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

                {{-- TABLA contrat_detail_produit --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="my-0">Tabla: <b>contrat_detail_produit</b></h4>
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
                                                    <th>3 DUPLICATION_CONTRAT_ID</th>
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

                {{-- TABLA identification_note --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="my-0">Tabla: <b>identification_note</b></h4>
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

                {{-- TABLA invoice --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="my-0">Tabla: <b>invoice</b></h4>
                                <p>({{ count( config('tablas')['invoice'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_invoice" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>1 BALANCE_DUE</th>
                                                    <th>2 TOTAL_AMOUNT_INVOICED</th>
                                                    <th>3 PRODUCT</th>
                                                    <th>4 STATUS</th>
                                                    <th>5 NO_CONTRAT</th>
                                                    <th>6 INVOICE_NBER</th>
                                                    <th>7 INVOICE_DATE</th>
                                                    <th>8 CONTRACT_NBER</th>
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

                {{-- TABLA mission --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="my-0">Tabla: <b>mission</b></h4>
                                <p>({{ count( config('tablas')['mission'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_mission" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>1 VP_FEES</th>
                                                    <th>2 PRODUIT</th>
                                                    <th>3 PROJECT_MANAGER</th>
                                                    <th>4 POURCENTAGE</th>
                                                    <th>5 NO_CONTRAT</th>
                                                    <th>6 NO_MISSION</th>
                                                    <th>7 DATE_DEBUT</th>
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

                {{-- TABLA societe_famille --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="my-0">Tabla: <b>societe_famille</b></h4>
                                <p>({{ count( config('tablas')['societe_famille'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_societe_famille" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>1 TYPE</th>
                                                    <th>2 NIVEAU</th>
                                                    <th>3 FAMILLE</th>
                                                    <th>4 DATE_SIGNATURE</th>
                                                    <th>5 FIN_CONTRAT</th>
                                                    <th>6 QUALIFIED</th>
                                                    <th>7 COMMERCIAL</th>
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
        let TABLA_action;

        $(document).ready(function() {

            TABLA_documents = $('#tabla_documents').DataTable({
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
                    { data: 'action', orderable: false, searchable: false}
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

            TABLA_action = $('#tabla_action').DataTable({
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
                    { data: "RESULTAT"},
                    { data: "NOTE"},
                    { data: "NOM"},
                    { data: "FAIT"},
                    { data: "EMPLACEMENT"},
                    { data: "DATE_DEBUT"},
                    { data: "DATE_FIN"},
                    { data: 'action', orderable: false, searchable: false}
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

            TABLA_affaire = $('#tabla_affaire').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_affaire') }}",
                    data: function ( d ) {
                        d.SEARCH_BY_PID_IDENTIFICATION = $('#ID_IDENTIFICATION').val();
                    }
                },
                columns: [
                    { data: "TOTAL_PREVISIONNEL"},
                    { data: "PRODUIT"},
                    { data: "PROBABILITE"},
                    { data: "PRENOM"},
                    { data: "NOM"},
                    { data: "NO_AFFAIRE"},
                    { data: "PHASE"},
                    { data: "EMAIL"},
                    { data: "MONTANT_PONDERE"},
                    { data: "SUIVI_PAR"},
                    { data: 'action', orderable: false, searchable: false}
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

            TABLA_contact = $('#tabla_contact').DataTable({
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
                    { data: "CONTACT_PRINCIPAL"},
                    { data: "NOTE"},
                    { data: 'action', orderable: false, searchable: false}
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

            TABLA_contrat = $('#tabla_contrat').DataTable({
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
                    { data: "VALEUR"},
                    { data: "SUIVI_PAR"},
                    { data: "NO_CONTRAT_ORIGINE"},
                    { data: "NO_ENTITY"},
                    { data: "E_MAIL"},
                    { data: "ENGAGEMENT_MOIS"},
                    { data: "NOM"},
                    { data: "DATE_DEBUT_CONTRAT"},
                    { data: 'action', orderable: false, searchable: false}
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

            TABLA_contrat_detail_produit = $('#tabla_contrat_detail_produit').DataTable({
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
                    { data: "DUPLICATION_CONTRAT_ID"},
                    { data: 'action', orderable: false, searchable: false}
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

            TABLA_identification_note = $('#tabla_identification_note').DataTable({
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
                    { data: 'action', orderable: false, searchable: false}
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

            TABLA_invoice = $('#tabla_invoice').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_invoice') }}",
                    data: function ( d ) {
                        d.SEARCH_BY_PID_IDENTIFICATION = $('#ID_IDENTIFICATION').val();
                    }
                },
                columns: [
                    { data: "BALANCE_DUE"},
                    { data: "TOTAL_AMOUNT_INVOICED"},
                    { data: "PRODUCT"},
                    { data: "STATUS"},
                    { data: "NO_CONTRAT"},
                    { data: "INVOICE_NBER"},
                    { data: "INVOICE_DATE"},
                    { data: "CONTRACT_NBER"},
                    { data: 'action', orderable: false, searchable: false}
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

            TABLA_mission = $('#tabla_mission').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_mission') }}",
                    data: function ( d ) {
                        d.SEARCH_BY_PID_IDENTIFICATION = $('#ID_IDENTIFICATION').val();
                    }
                },
                columns: [
                    { data: "VP_FEES"},
                    { data: "PRODUIT"},
                    { data: "PROJECT_MANAGER"},
                    { data: "POURCENTAGE"},
                    { data: "NO_CONTRAT"},
                    { data: "NO_MISSION"},
                    { data: "DATE_DEBUT"},
                    { data: 'action', orderable: false, searchable: false}
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

            TABLA_mission_team = $('#tabla_mission_team').DataTable({
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
                    { data: "CONSULTANT"},
                    { data: "DATE_DEBUT"},
                    { data: "DATE_FIN"},
                    { data: 'action', orderable: false, searchable: false}
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

            TABLA_societe_famille = $('#tabla_societe_famille').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_societe_famille') }}",
                    data: function ( d ) {
                        d.SEARCH_BY_PID_IDENTIFICATION = $('#ID_IDENTIFICATION').val();
                    }
                },
                columns: [
                    { data: "TYPE"},
                    { data: "NIVEAU"},
                    { data: "FAMILLE"},
                    { data: "DATE_SIGNATURE"},
                    { data: "FIN_CONTRAT"},
                    { data: "QUALIFIED"},
                    { data: "COMMERCIAL"},
                    { data: 'action', orderable: false, searchable: false}
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

