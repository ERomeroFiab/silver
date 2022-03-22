@extends('listado')

@section('customcss')
    <style>
        #tabla_invoice_ligne_filter {
            display: none;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="my-0">Tabla: <b>invoice_ligne</b></h4>
                <p>(Total: {{ count( config('tablas')['invoice_ligne'] ) }} columnas)</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3 form-group">
                        <label>AMOUNT:</label>
                        <input id="input__AMOUNT" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>ECO_AMOUNT:</label>
                        <input id="input__ECO_AMOUNT" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>FEES:</label>
                        <input id="input__FEES" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>MOTIVE:</label>
                        <input id="input__MOTIVE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>NO_LIGNE:</label>
                        <input id="input__NO_LIGNE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>PRODUCT:</label>
                        <input id="input__PRODUCT" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>SUB_MOTIVE1:</label>
                        <input id="input__SUB_MOTIVE1" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>SUB_MOTIVE2:</label>
                        <input id="input__SUB_MOTIVE2" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>YEAR:</label>
                        <input id="input__YEAR" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>RUT:</label>
                        <input id="input__RUT" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>RAZON_SOCIAL:</label>
                        <input id="input__RAZON_SOCIAL" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>SYS_DATE_MODIFICATION_DESDE:</label>
                        <input id="input__SYS_DATE_MODIFICATION_DESDE" type="date" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>SYS_DATE_MODIFICATION_HASTA:</label>
                        <input id="input__SYS_DATE_MODIFICATION_HASTA" type="date" class="form-control">
                    </div>
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
                        <table id="tabla_invoice_ligne" class="table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>1 AMOUNT</th>
                                    <th>2 ECO_AMOUNT</th>
                                    <th>3 FEES</th>
                                    <th>4 MOTIVE</th>
                                    <th>5 NO_LIGNE</th>
                                    <th>6 PRODUCT</th>
                                    <th>7 SUB_MOTIVE1</th>
                                    <th>8 SUB_MOTIVE2</th>
                                    <th>9 YEAR</th>
                                    <th>10 RUT</th>
                                    <th>11 RAZON_SOCIAL</th>
                                    <th>12 SYS_DATE_MODIFICATION</th>
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
        let TABLA_invoice_ligne;
        $(document).ready(function() {

            TABLA_invoice_ligne = $('#tabla_invoice_ligne').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_invoice_ligne') }}",
                    // error: function(jqXHR, ajaxOptions, thrownError) {
                    //     console.log("error: " + thrownError + "\n\n" + "status: " + jqXHR.statusText + "\n\n" + "response: "+jqXHR.responseText + "\n\n" + "options: "+ajaxOptions.responseText);
                    // },
                    data: function ( d ) {
                        d.SEARCH_BY_AMOUNT                         = $('#input__AMOUNT').val();
                        d.SEARCH_BY_ECO_AMOUNT                     = $('#input__ECO_AMOUNT').val();
                        d.SEARCH_BY_FEES                           = $('#input__FEES').val();
                        d.SEARCH_BY_MOTIVE                         = $('#input__MOTIVE').val();
                        d.SEARCH_BY_NO_LIGNE                       = $('#input__NO_LIGNE').val();
                        d.SEARCH_BY_PRODUCT                        = $('#input__PRODUCT').val();
                        d.SEARCH_BY_SUB_MOTIVE1                    = $('#input__SUB_MOTIVE1').val();
                        d.SEARCH_BY_SUB_MOTIVE2                    = $('#input__SUB_MOTIVE2').val();
                        d.SEARCH_BY_YEAR                           = $('#input__YEAR').val();
                        d.SEARCH_BY_RUT                            = $('#input__RUT').val();
                        d.SEARCH_BY_RAZON_SOCIAL                   = $('#input__RAZON_SOCIAL').val();
                        d.SEARCH_BY_SYS_DATE_MODIFICATION_DESDE    = $('#input__SYS_DATE_MODIFICATION_DESDE').val();
                        d.SEARCH_BY_SYS_DATE_MODIFICATION_HASTA    = $('#input__SYS_DATE_MODIFICATION_HASTA').val();
                    }
                },
                columns: [
                    { data: "AMOUNT"},
                    { data: "ECO_AMOUNT"},
                    { data: "FEES"},
                    { data: "MOTIVE"},
                    { data: "NO_LIGNE"},
                    { data: "PRODUCT"},
                    { data: "SUB_MOTIVE1"},
                    { data: "SUB_MOTIVE2"},
                    { data: "YEAR"},
                    { data: "rut"},
                    { data: "razon_social"},
                    { data: "SYS_DATE_MODIFICATION"},
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
            TABLA_invoice_ligne.draw();
        }


        // Refilter the table
        // $('#input__search_by_fecha_starts, #input__search_by_fecha_ends').on('change', function() {
        //     TABLA_invoice_ligne.draw();
        // });

        // Pintar en verde los inputs que contienen algo
        $( "#input__AMOUNT" ).change(function() { agregar_quitar_bg_success('input__AMOUNT'); });
        $( "#input__ECO_AMOUNT" ).change(function() { agregar_quitar_bg_success('input__ECO_AMOUNT'); });
        $( "#input__FEES" ).change(function() { agregar_quitar_bg_success('input__FEES'); });
        $( "#input__MOTIVE" ).change(function() { agregar_quitar_bg_success('input__MOTIVE'); });
        $( "#input__NO_LIGNE" ).change(function() { agregar_quitar_bg_success('input__NO_LIGNE'); });
        $( "#input__PRODUCT" ).change(function() { agregar_quitar_bg_success('input__PRODUCT'); });
        $( "#input__SUB_MOTIVE1" ).change(function() { agregar_quitar_bg_success('input__SUB_MOTIVE1'); });
        $( "#input__SUB_MOTIVE2" ).change(function() { agregar_quitar_bg_success('input__SUB_MOTIVE2'); });
        $( "#input__YEAR" ).change(function() { agregar_quitar_bg_success('input__YEAR'); });
        $( "#input__RUT" ).change(function() { agregar_quitar_bg_success('input__RUT'); });
        $( "#input__RAZON_SOCIAL" ).change(function() { agregar_quitar_bg_success('input__RAZON_SOCIAL'); });
        $( "#input__SYS_DATE_MODIFICATION" ).change(function() { agregar_quitar_bg_success('input__SYS_DATE_MODIFICATION'); });

        function agregar_quitar_bg_success(id){
            if ( $(`#${id}`).val() !== "" ) {
                $(`#${id}`).addClass('bg-success');
            } else {
                $(`#${id}`).removeClass('bg-success');
            }
        }

    </script>
@endsection