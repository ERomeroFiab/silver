@extends('listado')

@section('customcss')
    <style>
        #tabla_invoice_filter {
            display: none;
        }
    </style>
@endsection

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4 class="my-0">Tabla: <b>invoice</b></h4>
                <p>(Total: {{ count( config('tablas')['invoice'] ) }} columnas)</p>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-3 form-group">
                        <label>TOTAL_AMOUNT_INVOICED:</label>
                        <input id="input__TOTAL_AMOUNT_INVOICED" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>CONTRACT_NBER:</label>
                        <input id="input__CONTRACT_NBER" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>INVOICE_DATE:</label>
                        <input id="input__INVOICE_DATE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>INVOICE_NBER:</label>
                        <input id="input__INVOICE_NBER" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>NO_CONTRAT:</label>
                        <input id="input__NO_CONTRAT" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>PAYE:</label>
                        <input id="input__PAYE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>PAYMENT_DATE:</label>
                        <input id="input__PAYMENT_DATE" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>PRODUCT:</label>
                        <input id="input__PRODUCT" type="text" class="form-control">
                    </div>
                    <div class="col-3 form-group">
                        <label>BALANCE_DUE:</label>
                        <input id="input__BALANCE_DUE" type="text" class="form-control">
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
                        <table id="tabla_invoice" class="table-hover" style="width:100%;">
                            <thead>
                                <tr>
                                    <th>1 TOTAL_AMOUNT_INVOICED</th>
                                    <th>2 CONTRACT_NBER</th>
                                    <th>3 INVOICE_DATE</th>
                                    <th>4 INVOICE_NBER</th>
                                    <th>5 NO_CONTRAT</th>
                                    <th>6 PAYE</th>
                                    <th>7 PAYMENT_DATE</th>
                                    <th>8 PRODUCT</th>
                                    <th>9 BALANCE_DUE</th>
                                    <th>10 Rut</th>
                                    <th>11 Razón Social</th>
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
        let TABLA_invoice;
        $(document).ready(function() {

            TABLA_invoice = $('#tabla_invoice').DataTable({
                serverSide: true,
                processing: true,
                ajax: {
                    url: "{{ route('get_tabla_invoice') }}",
                    // error: function(jqXHR, ajaxOptions, thrownError) {
                    //     console.log("error: " + thrownError + "\n\n" + "status: " + jqXHR.statusText + "\n\n" + "response: "+jqXHR.responseText + "\n\n" + "options: "+ajaxOptions.responseText);
                    // },
                    data: function ( d ) {
                        d.SEARCH_BY_TOTAL_AMOUNT_INVOICED          = $('#input__TOTAL_AMOUNT_INVOICED').val();
                        d.SEARCH_BY_CONTRACT_NBER                  = $('#input__CONTRACT_NBER').val();
                        d.SEARCH_BY_INVOICE_DATE                   = $('#input__INVOICE_DATE').val();
                        d.SEARCH_BY_INVOICE_NBER                   = $('#input__INVOICE_NBER').val();
                        d.SEARCH_BY_NO_CONTRAT                     = $('#input__NO_CONTRAT').val();
                        d.SEARCH_BY_PAYE                           = $('#input__PAYE').val();
                        d.SEARCH_BY_PAYMENT_DATE                   = $('#input__PAYMENT_DATE').val();
                        d.SEARCH_BY_PRODUCT                        = $('#input__PRODUCT').val();
                        d.SEARCH_BY_BALANCE_DUE                    = $('#input__BALANCE_DUE').val();
                        d.SEARCH_BY_RUT                            = $('#input__RUT').val();
                        d.SEARCH_BY_RAZON_SOCIAL                   = $('#input__RAZON_SOCIAL').val();
                        d.SEARCH_BY_SYS_DATE_MODIFICATION_DESDE    = $('#input__SYS_DATE_MODIFICATION_DESDE').val();
                        d.SEARCH_BY_SYS_DATE_MODIFICATION_HASTA    = $('#input__SYS_DATE_MODIFICATION_HASTA').val();
                    }
                },
                columns: [
                    { data: "TOTAL_AMOUNT_INVOICED"},
                    { data: "CONTRACT_NBER"},
                    { data: "INVOICE_DATE"},
                    { data: "INVOICE_NBER"},
                    { data: "NO_CONTRAT"},
                    { data: "PAYE"},
                    { data: "PAYMENT_DATE"},
                    { data: "PRODUCT"},
                    { data: "BALANCE_DUE"},
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
            TABLA_invoice.draw();
        }


        // Refilter the table
        // $('#input__search_by_fecha_starts, #input__search_by_fecha_ends').on('change', function() {
        //     TABLA_invoice.draw();
        // });

        // Pintar en verde los inputs que contienen algo
        $( "#input__TOTAL_AMOUNT_INVOICED" ).change(function() { agregar_quitar_bg_success('input__TOTAL_AMOUNT_INVOICED'); });
        $( "#input__CONTRACT_NBER" ).change(function() { agregar_quitar_bg_success('input__CONTRACT_NBER'); });
        $( "#input__INVOICE_DATE" ).change(function() { agregar_quitar_bg_success('input__INVOICE_DATE'); });
        $( "#input__NO_CONTRAT" ).change(function() { agregar_quitar_bg_success('input__NO_CONTRAT'); });
        $( "#input__PAYE" ).change(function() { agregar_quitar_bg_success('input__PAYE'); });
        $( "#input__PAYMENT_DATE" ).change(function() { agregar_quitar_bg_success('input__PAYMENT_DATE'); });
        $( "#input__PRODUCT" ).change(function() { agregar_quitar_bg_success('input__PRODUCT'); });
        $( "#input__BALANCE_DUE" ).change(function() { agregar_quitar_bg_success('input__BALANCE_DUE'); });
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