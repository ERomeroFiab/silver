@extends('listado')

@section('customcss')
    <style>
        #tabla_action_filter {
            display: none;
        }

        #tabla_affaire_filter{
            display: none;
        }

        #tabla_contrat_filter{
            display: none;
        }

        #tabla_document_filter{
            display:none;
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
                        <h4 class="my-0">ID_CONTACT: {{ $contact->ID_CONTACT }}</h4>
                        <p>Tabla <b>contact</b></p>
                    </div>
                </div>

                <div class="row">
                    @foreach (config('tablas') as $table_name => $columns)
                        @if ( $table_name === "contact" )
                            @foreach ($columns as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $column }}" type="text" class="form-control" value="{{ $contact->{$column} }}" disabled title="{{ $contact->{$column} }}">
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                </div>

                @if ( $contact->identification )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla Identification</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['identification'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $contact->identification->{$column} }}" type="text" class="form-control" value="{{  $contact->identification->{$column} }}" disabled title="{{ $contact->identification->{$column} }}">
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
                                                    <th>NOM</th>
                                                    <th>EMPLACEMENT</th>
                                                    <th>CATEGORIE</th>
                                                    <th>DATE_DEBUT</th>
                                                    <th>DATE_FIN</th>
                                                    <th>E_MAIL</th>
                                                    <th>FAIT</th>
                                                    <th>NOTE</th>
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
                                                    <th>PHASE</th>
                                                    <th>PRODUIT</th>
                                                    <th>PRENOM</th>
                                                    <th>NOM</th>
                                                    <th>EMAIL</th>
                                                    <th>DATE_SIGNATURE</th>
                                                    <th>DATE_PREVISIONNEL</th>
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
                                                    <th>ALERTE_FIN_CONTRAT</th>
                                                    <th>NO_CONTRAT</th>
                                                    <th>NO_CONTRAT_ORIGINE</th>
                                                    <th>NO_ENTITY</th>
                                                    <th>SUIVI_PAR</th>
                                                    <th>E_MAIL</th>
                                                    <th>ALERTE_POSEE</th>
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

                {{-- TABLA document --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="my-0">Tabla: <b>document</b></h4>
                                <p>({{ count( config('tablas')['documents'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_document" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>DOCUMENT_FICHIER_TYPE</th>
                                                    <th>DOCUMENT_FICHIER_NOM</th>
                                                    <th>ORIGINE</th>
                                                    <th>DOCUMENT_FICHIER_DATE</th>
                                                    <th>DOCUMENT_FICHIER_TAILLE</th>
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


        $(document).ready(function() {

            TABLA_ACTION = $('#tabla_action').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_action') }}",
                    data: function ( d ) {
                        d.SEARCH_BY_PID_CONTACT = $('#ID_CONTACT').val();
                    }
                },
                columns: [
                    { data: "NOM"},
                    { data: "EMPLACEMENT"},
                    { data: "CATEGORIE"},
                    { data: "DATE_DEBUT"},
                    { data: "DATE_FIN"},
                    { data: "E_MAIL"},
                    { data: "FAIT"},
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
                        d.SEARCH_BY_PID_CONTACT = $('#ID_CONTACT').val();
                    }
                },
                columns: [
                    { data: "PHASE"},
                    { data: "PRODUIT"},
                    { data: "PRENOM"},
                    { data: "NOM"},
                    { data: "EMAIL"},
                    { data: "DATE_SIGNATURE"},
                    { data: "DATE_PREVISIONNEL"},
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

            TABLA_CONTRAT = $('#tabla_contrat').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_contrat') }}",
                    data: function ( d ) {
                        d.SEARCH_BY_PID_CONTACT = $('#ID_CONTACT').val();
                    }
                },
                columns: [
                    { data: "ALERTE_FIN_CONTRAT"},
                    { data: "NO_CONTRAT"},
                    { data: "NO_CONTRAT_ORIGINE"},
                    { data: "NO_ENTITY"},
                    { data: "SUIVI_PAR"},
                    { data: "E_MAIL"},
                    { data: "ALERTE_POSEE"},
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

            TABLA_DOCUMENT = $('#tabla_document').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_documents') }}",
                    data: function ( d ) {
                        d.SEARCH_BY_PID_CONTACT = $('#ID_CONTACT').val();
                    }
                },
                columns: [
                    { data: "DOCUMENT_FICHIER_TYPE"},
                    { data: "DOCUMENT_FICHIER_NOM"},
                    { data: "ORIGINE"},
                    { data: "DOCUMENT_FICHIER_DATE"},
                    { data: "DOCUMENT_FICHIER_TAILLE"},
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
                    title: "tabla document - " + new Date().toLocaleString(),
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

