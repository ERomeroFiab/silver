@extends('listado')



@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="row">
                    <div class="col-12">
                        <h4 class="my-0">ID_MISSION_MOTIVE_ECO: {{ $mission_motive_eco->ID_MISSION_MOTIVE_ECO }}</h4>
                        <p>Tabla <b>mission_motive_eco</b></p>
                    </div>
                </div>

                <div class="row">
                    @foreach (config('tablas') as $table_name => $columns)
                        @if ( $table_name === "mission_motive_eco" )
                            @foreach ($columns as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $column }}" type="text" class="form-control" value="{{ $mission_motive_eco->{$column} }}" disabled title="{{ $mission_motive_eco->{$column} }}">
                                </div>
                            @endforeach
                        @endif
                    @endforeach

                </div>

                @if ( $mission_motive_eco->mission_motive )
                    <div class="row">
                        <div class="col-12">
                            <p><b>Tabla mission_motive</b></p>
                        </div>
                    </div>
                    <div class="row">
                        @foreach (config('tablas')['mission_motive'] as $column)
                            <div class="col-3 form-group">
                                <label>{{ $column }}</label>
                                <input id="{{ $mission_motive_eco->mission_motive->{$column} }}" type="text" class="form-control" value="{{  $mission_motive_eco->mission_motive->{$column} }}" disabled title="{{ $mission_motive_eco->mission_motive->{$column} }}">
                            </div>
                        @endforeach
                    </div>

                    @if ( $mission_motive_eco->mission_motive->mission )
                        <div class="row">
                            <div class="col-12">
                                <p><b>Tabla mission</b></p>
                            </div>
                        </div>
                        <div class="row">
                            @foreach (config('tablas')['mission'] as $column)
                                <div class="col-3 form-group">
                                    <label>{{ $column }}</label>
                                    <input id="{{ $mission_motive_eco->mission_motive->mission->{$column} }}" type="text" class="form-control" value="{{  $mission_motive_eco->mission_motive->mission->{$column} }}" disabled title="{{ $mission_motive_eco->mission_motive->mission->{$column} }}">
                                </div>
                            @endforeach
                        </div>

                        @if ( $mission_motive_eco->mission_motive->mission->contrat )
                            <div class="row">
                                <div class="col-12">
                                    <p><b>Tabla contrat</b></p>
                                </div>
                            </div>
                            <div class="row">
                                @foreach (config('tablas')['contrat'] as $column)
                                    <div class="col-3 form-group">
                                        <label>{{ $column }}</label>
                                        <input id="{{ $mission_motive_eco->mission_motive->mission->contrat->{$column} }}" type="text" class="form-control" value="{{  $mission_motive_eco->mission_motive->mission->contrat->{$column} }}" disabled title="{{ $mission_motive_eco->mission_motive->mission->contrat->{$column} }}">
                                    </div>
                                @endforeach
                            </div>

                            @if ( $mission_motive_eco->mission_motive->mission->contrat->contact )
                                <div class="row">
                                    <div class="col-12">
                                        <p><b>Tabla contact</b></p>
                                    </div>
                                </div>
                                <div class="row">
                                    @foreach (config('tablas')['contact'] as $column)
                                        <div class="col-3 form-group">
                                            <label>{{ $column }}</label>
                                            <input id="{{ $mission_motive_eco->mission_motive->mission->contrat->contact->{$column} }}" type="text" class="form-control" value="{{  $mission_motive_eco->mission_motive->mission->contrat->contact->{$column} }}" disabled title="{{ $mission_motive_eco->mission_motive->mission->contrat->contact->{$column} }}">
                                        </div>
                                    @endforeach
                                </div>
                            @endif

                            
                        @endif

                        @if ( $mission_motive_eco->mission_motive->mission->identification )
                            <div class="row">
                                <div class="col-12">
                                    <p><b>Tabla identification</b></p>
                                </div>
                            </div>
                            <div class="row">
                                @foreach (config('tablas')['identification'] as $column)
                                    <div class="col-3 form-group">
                                        <label>{{ $column }}</label>
                                        <input id="{{ $mission_motive_eco->mission_motive->mission->identification->{$column} }}" type="text" class="form-control" value="{{  $mission_motive_eco->mission_motive->mission->identification->{$column} }}" disabled title="{{ $mission_motive_eco->mission_motive->mission->identification->{$column} }}">
                                    </div>
                                @endforeach
                            </div>
                        @endif

                        
                    @endif

                    
                @endif


            



                {{-- TABLA invoice_ligne --}}
                <div class="row mt-3">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="my-0">Tabla: <b>invoice_ligne</b></h4>
                                <p>({{ count( config('tablas')['invoice_ligne'] ) }} columnas)</p>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12" style="overflow-x: scroll;">
                                        <table id="tabla_invoice_ligne" class="table-hover" style="width:100%;">
                                            <thead>
                                                <tr>
                                                    <th>1 YEAR</th>
                                                    <th>2 TYPE</th>
                                                    <th>3 AMOUNT</th>
                                                    <th>4 ECO_AMOUNT</th>
                                                    <th>5 FEES</th>
                                                    <th>6 PRODUCT</th>
                                                    <th>7 SUB_MOTIVE1</th>
                                                    <th>8 SUB_MOTIVE2</th>
                                                    <th>9 MOTIVE</th>
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
        let TABLA_invoice_ligne;

        $(document).ready(function() {

            TABLA_invoice_ligne = $('#tabla_invoice_ligne').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_invoice_ligne') }}",
                    data: function ( d ) {
                        d.SEARCH_BY_PID_MISSION_MOTIVE_ECO = $('#ID_MISSION_MOTIVE_ECO').val();
                    }
                },
                columns: [
                    { data: "YEAR"},
                    { data: "TYPE"},
                    { data: "AMOUNT"},
                    { data: "ECO_AMOUNT"},
                    { data: "FEES"},
                    { data: "PRODUCT"},
                    { data: "SUB_MOTIVE1"},
                    { data: "SUB_MOTIVE2"},
                    { data: "MOTIVE"},
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
                    title: "tabla invoice_ligne - " + new Date().toLocaleString(),
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

