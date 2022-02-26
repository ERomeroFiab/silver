@extends('listado')



@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <h4 class="my-0">ID_CONTRAT: {{ $contrat->ID_CONTRAT }}</h4>
                        <p>Tabla <b>contrat</b></p>
                    </div>
                </div>

                <div class="row">
                    @foreach (config('tablas') as $table_name => $columns)
                        @if ( $table_name === "contrat" )
                            @foreach ($columns as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $column }}" type="text" class="form-control" value="{{ $contrat->{$column} }}" disabled>
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                </div>

                @if ( $contrat->identification )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla identification</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['identification'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $contrat->identification->{$column} }}" type="text" class="form-control" value="{{  $contrat->identification->{$column} }}" disabled title="{{ $contrat->identification->{$column} }}">
                            </div>
                        @endforeach
                    </div>
                @endif

                @if ( $contrat->contact )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla contact</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['contact'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $contrat->contact->{$column} }}" type="text" class="form-control" value="{{  $contrat->contact->{$column} }}" disabled title="{{ $contrat->contact->{$column} }}">
                            </div>
                        @endforeach
                    </div>
                @endif

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
                                                    <th>1 ID_CONTRAT_DETAIL_PRODUIT</th>
                                                    <th>2 NO_CONTRAT_PARTIEL</th>
                                                    <th>3 PRODUIT</th>
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

                {{-- TABLA contrat_partiel_condition_fiancieres --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="my-0">Tabla: <b>contrat_partiel_condition_fiancieres</b></h4>
                                <p>({{ count( config('tablas')['contrat_partiel_condition_fiancieres'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_contrat_partiel_condition_fiancieres" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>1 REMUNERATION</th>
                                                    <th>2 SEUIL_MAX</th>
                                                    <th>3 SEUIL_MIN</th>
                                                    <th>4 VALEUR</th>
                                                    <th>5 COMMENTS</th>
                                                    <th>6 YEAR</th>
                                                    <th>7 SENS</th>
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
                                                    <th>1 NO_CONTRAT</th>
                                                    <th>2 CONTRACT_NBER</th>
                                                    <th>3 INVOICE_DATE</th>
                                                    <th>4 INVOICE_NBER</th>
                                                    <th>5 PRODUCT</th>
                                                    <th>6 STATUS</th>
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
                                                    <th>1 DATE_DEBUT</th>
                                                    <th>2 DATE_FIN_ANALYSE</th>
                                                    <th>3 NO_CONTRAT</th>
                                                    <th>4 NO_MISSION</th>
                                                    <th>5 PRODUIT</th>
                                                    <th>6 POURCENTAGE</th>
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

            TABLA_ACTION = $('#tabla_action').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_action') }}",
                    data: function ( d ) {
                        d.SEARCH_BY_PID_CONTRAT = $('#ID_CONTRAT').val();
                    }
                },
                columns: [
                    { data: "CATEGORIE"},
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
                        d.SEARCH_BY_PID_CONTRAT = $('#ID_CONTRAT').val();
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

            TABLA_CONTRAT_DETAIL_PRODUIT = $('#tabla_contrat_detail_produit').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_contrat_detail_produit') }}",
                    data: function ( d ) {
                        d.SEARCH_BY_PID_CONTRAT = $('#ID_CONTRAT').val();
                    }
                },
                columns: [
                    { data: "ID_CONTRAT_DETAIL_PRODUIT"},
                    { data: "NO_CONTRAT_PARTIEL"},
                    { data: "PRODUIT"},
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

            TABLA_CONTRAT_PARTIEL_CONDITION_FIANCIERES = $('#tabla_contrat_partiel_condition_fiancieres').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_contrat_partiel_condition_fiancieres') }}",
                    data: function ( d ) {
                        d.SEARCH_BY_PID_CONTRAT = $('#ID_CONTRAT').val();
                    }
                },
                columns: [
                    { data: "REMUNERATION"},
                    { data: "SEUIL_MAX"},
                    { data: "SEUIL_MIN"},
                    { data: "VALEUR"},
                    { data: "COMMENTS"},
                    { data: "YEAR"},
                    { data: "SENS"},
                ],
                // order: [[ 1, 'desc' ]],
                pageLength: 5,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json',
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    title: "tabla contrat_partiel_condition_fiancieres - " + new Date().toLocaleString(),
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
                        d.SEARCH_BY_PID_CONTRAT = $('#ID_CONTRAT').val();
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

            TABLA_INVOICE = $('#tabla_invoice').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_invoice') }}",
                    data: function ( d ) {
                        d.SEARCH_BY_PID_CONTRAT = $('#ID_CONTRAT').val();
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
                        d.SEARCH_BY_PID_CONTRAT = $('#ID_CONTRAT').val();
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

