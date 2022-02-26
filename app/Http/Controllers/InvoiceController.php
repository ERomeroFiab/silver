<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use app\Models\Invoice;

class InvoiceController extends Controller
{
    public function show($id_invoice)
    {
        $relations = [
            //
        ];
        $invoice = Invoice::where('ID_INVOICE', $id_invoice)->with( $relations )->first();

        return view('models.invoice.show', ['invoice' => $invoice]);
    }
}
