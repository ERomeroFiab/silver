@extends('listado')

@section('customcss')
    <style>
        #tabla_aide_societe_effectif_filter {
            display: none;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="my-0">Tabla: <b>aide_societe_effectif</b></h4>
                <p>(Total: {{ count( config('tablas')['aide_societe_effectif'] ) }} columnas)</p>
            </div>
            <div class="card-body">
                <div class="row">

                    <div class="col-3 form-group">
                        <label>EFFECTIF:</label>
                        <input id="input__EFFECTIF" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>TRANCHE_MAXI:</label>
                        <input id="input__TRANCHE_MAXI" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>TRANCHE_MINI:</label>
                        <input id="input__TRANCHE_MINI" type="text" class="form-control">
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
                        <table id="tabla_aide_societe_effectif" class="table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>1 EFFECTIF</th>
                                    <th>2 TRANCHE_MAXI</th>
                                    <th>3 TRANCHE_MINI</th>
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
        let TABLA_aide_societe_effectif;
        $(document).ready(function() {

            TABLA_aide_societe_effectif = $('#tabla_aide_societe_effectif').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_aide_societe_effectif') }}",
                    // error: function(jqXHR, ajaxOptions, thrownError) {
                    //     console.log("error: " + thrownError + "\n\n" + "status: " + jqXHR.statusText + "\n\n" + "response: "+jqXHR.responseText + "\n\n" + "options: "+ajaxOptions.responseText);
                    // },
                    data: function ( d ) {
                        d.SEARCH_BY_EFFECTIF         = $('#input__EFFECTIF').val();
                        d.SEARCH_BY_TRANCHE_MAXI     = $('#input__TRANCHE_MAXI').val();
                        d.SEARCH_BY_TRANCHE_MINI     = $('#input__TRANCHE_MINI').val();
                    }
                },
                columns: [
                    { data: "EFFECTIF"},
                    { data: "TRANCHE_MAXI"},
                    { data: "TRANCHE_MINI"},
                ],
                // order: [[ 1, 'desc' ]],
                pageLength: 10,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json',
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    title: "tabla aide_societe_effectif - " + new Date().toLocaleString(),
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
                var oldStart = dt.aide_societe_effectif()[0]._iDisplayStart;
                dt.one('preXhr', function (e, s, data) {
                    // Just this once, load all data from the server...
                    data.start = 0;
                    data.length = 2147483647;
                    dt.one('preDraw', function (e, aide_societe_effectif) {
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
                            aide_societe_effectif._iDisplayStart = oldStart;
                            data.start = oldStart;
                        });
                        // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                        setTimeout(dt.ajax.reload, 0);
                        // Prevent rendering of the full data to the DOM
                        return false;
                    });
                });
                // Requery the server with the new one-time export aide_societe_effectif
                dt.ajax.reload();
            }

        });

        function buscar() {
            TABLA_aide_societe_effectif.draw();
        }


        // Refilter the table
        // $('#input__search_by_fecha_starts, #input__search_by_fecha_ends').on('change', function() {
        //     TABLA_aide_societe_effectif.draw();
        // });

        // Pintar en verde los inputs que contienen algo
        $( "#input__EFFECTIF" ).change(function() { agregar_quitar_bg_success('input__EFFECTIF'); });
        $( "#input__TRANCHE_MAXI" ).change(function() { agregar_quitar_bg_success('input__TRANCHE_MAXI'); });
        $( "#input__TRANCHE_MINI" ).change(function() { agregar_quitar_bg_success('input__TRANCHE_MINI'); });

        function agregar_quitar_bg_success(id){
            if ( $(`#${id}`).val() !== "" ) {
                $(`#${id}`).addClass('bg-success');
            } else {
                $(`#${id}`).removeClass('bg-success');
            }
        }

    </script>
@endsection