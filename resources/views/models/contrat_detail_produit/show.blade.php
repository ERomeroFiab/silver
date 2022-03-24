@extends('listado')

@section('customcss')
    <style>
        #tabla_contrat_partiel_condition_fiancieres_filter {
            display: none;
        }

        #tabla_mission_filter{
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
                        <h4 class="my-0">ID_CONTRAT_DETAIL_PRODUIT: {{ $contrat_detail_produit->ID_CONTRAT_DETAIL_PRODUIT }}</h4>
                        <p>Tabla <b>contrat_detail_produit</b></p>
                    </div>
                </div>

                <div class="row">
                    @foreach (config('tablas') as $table_name => $columns)
                        @if ( $table_name === "contrat_detail_produit" )
                            @foreach ($columns as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $column }}" type="text" class="form-control" value="{{ $contrat_detail_produit->{$column} }}" disabled title="{{ $contrat_detail_produit->{$column} }}">
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                </div>

                @if ( $contrat_detail_produit->identification )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla Identification</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['identification'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $contrat_detail_produit->identification->{$column} }}" type="text" class="form-control" value="{{  $contrat_detail_produit->identification->{$column} }}" disabled title="{{ $contrat_detail_produit->identification->{$column} }}">
                            </div>
                        @endforeach
                    </div>
                @endif

                @if ( $contrat_detail_produit->contrat )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla contrat</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['contrat'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $contrat_detail_produit->contrat->{$column} }}" type="text" class="form-control" value="{{  $contrat_detail_produit->contrat->{$column} }}" disabled title="{{ $contrat_detail_produit->contrat->{$column} }}">
                            </div>
                        @endforeach
                    </div>


                    @if ( $contrat_detail_produit->contrat->contact )
                        <div class="row">
                            <div class="col-12">
                                <p><b>Tabla contact</b></p>
                            </div>
                        </div>
                        <div class="row">
                            @foreach (config('tablas')['contact'] as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $contrat_detail_produit->contrat->contact->{$column} }}" type="text" class="form-control" value="{{  $contrat_detail_produit->contrat->contact->{$column} }}" disabled title="{{ $contrat_detail_produit->contrat->contact->{$column} }}">
                                </div>
                            @endforeach
                        </div>
                    @endif

                @endif


            



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
                                                    <th>2 VALEUR</th>
                                                    <th>3 SEUIL_MAX</th>
                                                    <th>4 SEUIL_MIN</th>
                                                    <th>5 COMMENTS</th>
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
                                                    <th>1 NO_MISSION</th>
                                                    <th>2 NO_CONTRAT</th>
                                                    <th>3 DATE_DEBUT</th>
                                                    <th>4 PRODUIT</th>
                                                    <th>5 DATE_DEBUT_ANALYSE</th>
                                                    <th>6 DATE_FIN_ANALYSE</th>
                                                    <th>7 DATE_FIN_MISSION</th>
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
        let tabla_contrat_partiel_condition_fiancieres;
        let TABLA_mission;

        $(document).ready(function() {

            tabla_contrat_partiel_condition_fiancieres = $('#tabla_contrat_partiel_condition_fiancieres').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_contrat_partiel_condition_fiancieres') }}",
                    data: function ( d ) {
                        d.SEARCH_BY_PID_CONTRAT_DETAIL_PRODUIT = $('#ID_CONTRAT_DETAIL_PRODUIT').val();
                    }
                },
                columns: [
                    { data: "REMUNERATION"},
                    { data: "VALEUR"},
                    { data: "SEUIL_MAX"},
                    { data: "SEUIL_MIN"},
                    { data: "COMMENTS"},
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
                    title: "tabla contrat_partiel_condition_fiancieres - " + new Date().toLocaleString(),
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
                        d.SEARCH_BY_PID_CONTRAT_DETAIL_PRODUIT = $('#ID_CONTRAT_DETAIL_PRODUIT').val();
                    }
                },
                columns: [
                    { data: "NO_MISSION"},
                    { data: "NO_CONTRAT"},
                    { data: "DATE_DEBUT"},
                    { data: "PRODUIT"},
                    { data: "DATE_DEBUT_ANALYSE"},
                    { data: "DATE_FIN_ANALYSE"},
                    { data: "DATE_FIN_MISSION"},
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

