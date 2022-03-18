@extends('listado')

@section('customcss')
    <style>
        #tabla_aide_contrat_entity_filter {
            display: none;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="my-0">Tabla: <b>aide_contrat_entity</b></h4>
                <p>(Total: {{ count( config('tablas')['aide_contrat_entity'] ) }} columnas)</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3 form-group">
                        <label>IBAN:</label>
                        <input id="input__IBAN" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>INITIALS:</label>
                        <input id="input__INITIALS" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>NAME:</label>
                        <input id="input__NAME" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>NB_ANNEE_A_SOUSTRAIRE:</label>
                        <input id="input__NB_ANNEE_A_SOUSTRAIRE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>PREFIX_COMPTEUR:</label>
                        <input id="input__PREFIX_COMPTEUR" type="text" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <button class="btn btn-sm btn-success float-right" type="button" onclick="buscar()">Buscar</button>
                    </div>
                    <div class="col-12" style="overflow-x: scroll;">
                        <table id="tabla_aide_contrat_entity" class="table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>1 IBAN</th>
                                    <th>2 INITIALS</th>
                                    <th>3 NAME</th>
                                    <th>4 NB_ANNEE_A_SOUSTRAIRE</th>
                                    <th>5 PREFIX_COMPTEUR</th>
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
        let TABLA_AIDE_CONTRAT_ENTITY;
        $(document).ready(function() {

            TABLA_AIDE_CONTRAT_ENTITY = $('#tabla_aide_contrat_entity').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_aide_contrat_entity') }}",
                    // error: function(jqXHR, ajaxOptions, thrownError) {
                    //     console.log("error: " + thrownError + "\n\n" + "status: " + jqXHR.statusText + "\n\n" + "response: "+jqXHR.responseText + "\n\n" + "options: "+ajaxOptions.responseText);
                    // },
                    data: function ( d ) {
                        d.SEARCH_BY_IBAN                        = $('#input__IBAN').val();
                        d.SEARCH_BY_INITIALS                    = $('#input__INITIALS').val();
                        d.SEARCH_BY_NAME                        = $('#input__NAME').val();
                        d.SEARCH_BY_NB_ANNEE_A_SOUSTRAIRE       = $('#input__NB_ANNEE_A_SOUSTRAIRE').val();
                        d.SEARCH_BY_PREFIX_COMPTEUR             = $('#input__PREFIX_COMPTEUR').val();
                    }
                },
                columns: [
                    { data: "IBAN"},
                    { data: "INITIALS"},
                    { data: "NAME"},
                    { data: "NB_ANNEE_A_SOUSTRAIRE"},
                    { data: "PREFIX_COMPTEUR"},
                ],
                // order: [[ 1, 'desc' ]],
                pageLength: 10,
                language: {
                    url: 'https://cdn.datatables.net/plug-ins/1.10.19/i18n/Spanish.json',
                },
                dom: 'Bfrtip',
                buttons: [{
                    extend: 'excelHtml5',
                    title: "tabla aide_contrat_entity - " + new Date().toLocaleString(),
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
                var oldStart = dt.aide_contrat_entity()[0]._iDisplayStart;
                dt.one('preXhr', function (e, s, data) {
                    // Just this once, load all data from the server...
                    data.start = 0;
                    data.length = 2147483647;
                    dt.one('preDraw', function (e, aide_contrat_entity) {
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
                            aide_contrat_entity._iDisplayStart = oldStart;
                            data.start = oldStart;
                        });
                        // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                        setTimeout(dt.ajax.reload, 0);
                        // Prevent rendering of the full data to the DOM
                        return false;
                    });
                });
                // Requery the server with the new one-time export aide_contrat_entity
                dt.ajax.reload();
            }

        });
        function buscar(){
            TABLA_AIDE_CONTRAT_ENTITY.draw(); 
        }


        // Refilter the table
        // $('#input__search_by_fecha_starts, #input__search_by_fecha_ends').on('change', function() {
        //     TABLA_aide_contrat_entity.draw();
        // });

        // Pintar en verde los inputs que contienen algo
        $( "#input__IBAN" ).change(function() { agregar_quitar_bg_success('input__IBAN'); });
        $( "#input__INITIALS" ).change(function() { agregar_quitar_bg_success('input__INITIALS'); });
        $( "#input__NAME" ).change(function() { agregar_quitar_bg_success('input__NAME'); });
        $( "#input__NB_ANNEE_A_SOUSTRAIRE" ).change(function() { agregar_quitar_bg_success('input__NB_ANNEE_A_SOUSTRAIRE'); });
        $( "#input__PREFIX_COMPTEUR" ).change(function() { agregar_quitar_bg_success('input__PREFIX_COMPTEUR'); });
        // $( "#input__productos" ).change(function() { agregar_quitar_bg_success('input__productos'); });
        // $( "#input__compra_o_regalo" ).change(function() { agregar_quitar_bg_success('input__compra_o_regalo'); });
        // $( "#input__status" ).change(function() { agregar_quitar_bg_success('input__status'); });

        // $( "#input__search_by_fecha_starts" ).change(function() { agregar_quitar_bg_success('input__search_by_fecha_starts'); });
        // $( "#input__search_by_fecha_ends" ).change(function() { agregar_quitar_bg_success('input__search_by_fecha_ends'); });

        function agregar_quitar_bg_success(id){
            if ( $(`#${id}`).val() !== "" ) {
                $(`#${id}`).addClass('bg-success');
            } else {
                $(`#${id}`).removeClass('bg-success');
            }
        }

    </script>
@endsection