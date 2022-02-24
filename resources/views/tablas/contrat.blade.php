@extends('listado')

@section('customcss')
    <style>
        #tabla_action_filter {
            display: none;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h2>Tabla: <b>contrat</b> (54 columnas)</h2>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-12" style="overflow-x: scroll;">
                        <table id="tabla_action" class="table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>1 ID_CONTRAT</th>
                                    <th>2 E_MAIL</th>
                                    <th>3 E_MAIL_FACTURATION</th>
                                    <th>4 FIABILIS_GROUP_ENTITY</th>
                                    <th>5 MULTI_ENTITY</th>
                                    <th>6 NOM</th>
                                    <th>7 NOM_FACTURATION</th>
                                    <th>8 NO_CONTRAT</th>
                                    <th>9 NO_CONTRAT_ORIGINE</th>
                                    <th>10 NO_ENTITY</th>
                                    <th>11 STATUT</th>
                                    <th>12 SUIVI_PAR</th>
                                    <th>13 VALEUR</th>
                                    <th>14 DATE_FIN_CONTRAT</th>
                                    <th>15 DATE_SIGNATURE_CLIENT</th>
                                    <th>16 DATE_SIGNATURE_INTERNE</th>
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
        let TABLA_ORDENES;
        $(document).ready(function() {

            TABLA_ORDENES = $('#tabla_action').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_contrat') }}",
                    // error: function(jqXHR, ajaxOptions, thrownError) {
                    //     console.log("error: " + thrownError + "\n\n" + "status: " + jqXHR.statusText + "\n\n" + "response: "+jqXHR.responseText + "\n\n" + "options: "+ajaxOptions.responseText);
                    // },
                    data: function ( d ) {
                        //
                    }
                },
                columns: [
                    { data: "ID_CONTRAT"},
                    { data: "E_MAIL"},
                    { data: "E_MAIL_FACTURATION"},
                    { data: "FIABILIS_GROUP_ENTITY"},
                    { data: "MULTI_ENTITY"},
                    { data: "NOM"},
                    { data: "NOM_FACTURATION"},
                    { data: "NO_CONTRAT"},
                    { data: "NO_CONTRAT_ORIGINE"},
                    { data: "NO_ENTITY"},
                    { data: "STATUT"},
                    { data: "SUIVI_PAR"},
                    { data: "VALEUR"},
                    { data: "DATE_FIN_CONTRAT"},
                    { data: "DATE_SIGNATURE_CLIENT"},
                    { data: "DATE_SIGNATURE_INTERNE"},
                ],
                // order: [[ 1, 'desc' ]],
                pageLength: 10,
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


        // Refilter the table
        // $('#input__search_by_fecha_starts, #input__search_by_fecha_ends').on('change', function() {
        //     TABLA_ORDENES.draw();
        // });

        // Pintar en verde los inputs que contienen algo
        // $( "#input__total" ).change(function() { agregar_quitar_bg_success('input__total'); });
        // $( "#input__fecha_final_de_transaccion" ).change(function() { agregar_quitar_bg_success('input__fecha_final_de_transaccion'); });
        // $( "#input__hora_final_de_transaccion" ).change(function() { agregar_quitar_bg_success('input__hora_final_de_transaccion'); });
        // $( "#input__nombre_del_comprador" ).change(function() { agregar_quitar_bg_success('input__nombre_del_comprador'); });
        // $( "#input__email_del_comprador" ).change(function() { agregar_quitar_bg_success('input__email_del_comprador'); });
        // $( "#input__productos" ).change(function() { agregar_quitar_bg_success('input__productos'); });
        // $( "#input__compra_o_regalo" ).change(function() { agregar_quitar_bg_success('input__compra_o_regalo'); });
        // $( "#input__status" ).change(function() { agregar_quitar_bg_success('input__status'); });

        // $( "#input__search_by_fecha_starts" ).change(function() { agregar_quitar_bg_success('input__search_by_fecha_starts'); });
        // $( "#input__search_by_fecha_ends" ).change(function() { agregar_quitar_bg_success('input__search_by_fecha_ends'); });

        // function agregar_quitar_bg_success(id){
        //     if ( $(`#${id}`).val() !== "" ) {
        //         $(`#${id}`).addClass('bg-success');
        //     } else {
        //         $(`#${id}`).removeClass('bg-success');
        //     }
        // }

    </script>
@endsection