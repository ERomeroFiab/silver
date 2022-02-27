<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use app\Models\Invoice;

class InvoiceController extends Controller
{
    public function show(Request $request)
    {
        $relations = [
            //
        ];
        $invoice = Invoice::where('ID_INVOICE', $request->get('id_invoice'))->with( $relations )->first();

        return view('models.invoice.show', ['invoice' => $invoice]);
    }
}
