@extends('listado')



@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <h4 class="my-0">ID_ACTION: {{ $action->ID_ACTION }}</h4>
                        <p>Tabla <b>action</b></p>
                    </div>
                </div>

                <div class="row">
                    @foreach (config('tablas') as $table_name => $columns)
                        @if ( $table_name === "action" )
                            @foreach ($columns as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $column }}" type="text" class="form-control" value="{{ $action->{$column} }}" disabled title="{{ $action->{$column} }}">
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                </div>

                @if ( $action->identification )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla Identification</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['identification'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $action->identification->{$column} }}" type="text" class="form-control" value="{{  $action->identification->{$column} }}" disabled title="{{ $action->identification->{$column} }}">
                            </div>
                        @endforeach
                    </div>
                @endif

                @if ( $action->contrat )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla contrat</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['contrat'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $action->contrat->{$column} }}" type="text" class="form-control" value="{{  $action->contrat->{$column} }}" disabled title="{{ $action->contrat->{$column} }}">
                            </div>
                        @endforeach
                    </div>
                @endif

                @if ( $action->affaire )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla affaire</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['affaire'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $action->affaire->{$column} }}" type="text" class="form-control" value="{{  $action->affaire->{$column} }}" disabled title="{{ $action->affaire->{$column} }}">
                            </div>
                        @endforeach
                    </div>
                @endif

                @if ( $action->contact )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla contact</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['contact'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $action->contact->{$column} }}" type="text" class="form-control" value="{{  $action->contact->{$column} }}" disabled title="{{ $action->contact->{$column} }}">
                            </div>
                        @endforeach
                    </div>
                @endif

                @if ( $action->mission )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla mission</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['mission'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $action->mission->{$column} }}" type="text" class="form-control" value="{{  $action->mission->{$column} }}" disabled title="{{ $action->mission->{$column} }}">
                            </div>
                        @endforeach
                    </div>
                @endif


            



                {{-- TABLA action_intervenants_fiabilis --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="my-0">Tabla: <b>action_intervenants_fiabilis</b></h4>
                                <p>({{ count( config('tablas')['action_intervenants_fiabilis'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_action_intervenants_fiabilis" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>1 LOGIN</th>
                                                    <th>2 SYS_DATE_CREATION</th>
                                                    <th>3 SYS_DATE_MODIFICATION</th>
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


            </div>



        </div> <!-- End card -->
    </div>
</div>
@endsection

@section('customjs')
    
    <script>
        let TABLA_ACTION_INTERVENANTS_FIABILIS;
        let TABLA_DOCUMENTS;

        $(document).ready(function() {

            TABLA_ACTION_INTERVENANTS_FIABILIS = $('#tabla_action_intervenants_fiabilis').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_action_intervenants_fiabilis') }}",
                    data: function ( d ) {
                        d.SEARCH_BY_PID_AFFAIRE = $('#ID_AFFAIRE').val();
                    }
                },
                columns: [
                    { data: "LOGIN"},
                    { data: "SYS_DATE_CREATION"},
                    { data: "SYS_DATE_MODIFICATION"},
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
                    title: "tabla action_intervenants_fiabilis - " + new Date().toLocaleString(),
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
                        d.SEARCH_BY_PID_AFFAIRE = $('#ID_AFFAIRE').val();
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

