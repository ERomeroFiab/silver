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
                    <div class="col-3 form-group">
                        <label>E_MAIL:</label>
                        <input id="input__E_MAIL" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>E_MAIL_FACTURATION:</label>
                        <input id="input__E_MAIL_FACTURATION" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>MULTI_ENTITY:</label>
                        <input id="input__MULTI_ENTITY" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>NOM:</label>
                        <input id="input__NOM" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>NOM_FACTURATION:</label>
                        <input id="input__NOM_FACTURATION" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>NO_CONTRAT:</label>
                        <input id="input__NO_CONTRAT" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>NO_CONTRAT_ORIGINE:</label>
                        <input id="input__NO_CONTRAT_ORIGINE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>NO_ENTITY:</label>
                        <input id="input__NO_ENTITY" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>STATUT:</label>
                        <input id="input__STATUT" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>SUIVI_PAR:</label>
                        <input id="input__SUIVI_PAR" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>DATE_FIN_CONTRAT:</label>
                        <input id="input__DATE_FIN_CONTRAT" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>DATE_SIGNATURE_CLIENT:</label>
                        <input id="input__DATE_SIGNATURE_CLIENT" type="text" class="form-control">
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
                        <table id="tabla_action" class="table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>1 E_MAIL</th>
                                    <th>2 E_MAIL_FACTURATION</th>
                                    <th>3 MULTI_ENTITY</th>
                                    <th>4 NOM</th>
                                    <th>5 NOM_FACTURATION</th>
                                    <th>6 NO_CONTRAT</th>
                                    <th>7 NO_CONTRAT_ORIGINE</th>
                                    <th>8 NO_ENTITY</th>
                                    <th>9 STATUT</th>
                                    <th>10 SUIVI_PAR</th>
                                    <th>11 DATE_FIN_CONTRAT</th>
                                    <th>12 DATE_SIGNATURE_CLIENT</th>
                                    <th>&nbsp;</th>
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
                        d.SEARCH_BY_E_MAIL                         = $('#input__E_MAIL').val();
                        d.SEARCH_BY_E_MAIL_FACTURATION             = $('#input__E_MAIL_FACTURATION').val();
                        d.SEARCH_BY_MULTI_ENTITY                   = $('#input__MULTI_ENTITY').val();
                        d.SEARCH_BY_NOM                            = $('#input__NOM').val();
                        d.SEARCH_BY_NOM_FACTURATION                = $('#input__NOM_FACTURATION').val();
                        d.SEARCH_BY_NO_CONTRAT                     = $('#input__NO_CONTRAT').val();
                        d.SEARCH_BY_NO_CONTRAT_ORIGINE             = $('#input__NO_CONTRAT_ORIGINE').val();
                        d.SEARCH_BY_NO_ENTITY                      = $('#input__NO_ENTITY').val();
                        d.SEARCH_BY_STATUT                         = $('#input__STATUT').val();
                        d.SEARCH_BY_SUIVI_PAR                      = $('#input__SUIVI_PAR').val();
                        d.SEARCH_BY_DATE_FIN_CONTRAT               = $('#input__DATE_FIN_CONTRAT').val();
                        d.SEARCH_BY_DATE_SIGNATURE_CLIENT          = $('#input__DATE_SIGNATURE_CLIENT').val();
                    }
                },
                columns: [
                    { data: "E_MAIL"},
                    { data: "E_MAIL_FACTURATION"},
                    { data: "MULTI_ENTITY"},
                    { data: "NOM"},
                    { data: "NOM_FACTURATION"},
                    { data: "NO_CONTRAT"},
                    { data: "NO_CONTRAT_ORIGINE"},
                    { data: "NO_ENTITY"},
                    { data: "STATUT"},
                    { data: "SUIVI_PAR"},
                    { data: "DATE_FIN_CONTRAT"},
                    { data: "DATE_SIGNATURE_CLIENT"},
                    { data: 'action', orderable: false, searchable: false}
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

        function buscar() {
            TABLA_ORDENES.draw();
        }


        // Refilter the table
        // $('#input__search_by_fecha_starts, #input__search_by_fecha_ends').on('change', function() {
        //     TABLA_ORDENES.draw();
        // });

        // Pintar en verde los inputs que contienen algo
        $( "#input__E_MAIL" ).change(function() { agregar_quitar_bg_success('input__E_MAIL'); });
        $( "#input__E_MAIL_FACTURATION" ).change(function() { agregar_quitar_bg_success('input__E_MAIL_FACTURATION'); });
        $( "#input__MULTI_ENTITY" ).change(function() { agregar_quitar_bg_success('input__MULTI_ENTITY'); });
        $( "#input__NOM" ).change(function() { agregar_quitar_bg_success('input__NOM'); });
        $( "#input__NOM_FACTURATION" ).change(function() { agregar_quitar_bg_success('input__NOM_FACTURATION'); });
        $( "#input__NO_CONTRAT" ).change(function() { agregar_quitar_bg_success('input__NO_CONTRAT'); });
        $( "#input__NO_CONTRAT_ORIGINE" ).change(function() { agregar_quitar_bg_success('input__NO_CONTRAT_ORIGINE'); });
        $( "#input__NO_ENTITY" ).change(function() { agregar_quitar_bg_success('input__NO_ENTITY'); });
        $( "#input__STATUT" ).change(function() { agregar_quitar_bg_success('input__STATUT'); });
        $( "#input__SUIVI_PAR" ).change(function() { agregar_quitar_bg_success('input__SUIVI_PAR'); });
        $( "#input__DATE_FIN_CONTRAT" ).change(function() { agregar_quitar_bg_success('input__DATE_FIN_CONTRAT'); });
        $( "#input__DATE_SIGNATURE_CLIENT" ).change(function() { agregar_quitar_bg_success('input__DATE_SIGNATURE_CLIENT'); });

        function agregar_quitar_bg_success(id){
            if ( $(`#${id}`).val() !== "" ) {
                $(`#${id}`).addClass('bg-success');
            } else {
                $(`#${id}`).removeClass('bg-success');
            }
        }

    </script>
@endsection