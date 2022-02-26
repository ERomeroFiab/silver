<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use app\Models\InvoiceLigne;

class InvoiceLigneController extends Controller
{
    public function show($id_invoice_ligne)
    {
        $relations = [
            //
        ];
        $invoice_ligne = InvoiceLigne::where('ID_INVOICE_LIGNE', $id_invoice_ligne)->with( $relations )->first();
        
        return view('models.invoice_ligne.show', ['invoice_ligne' => $invoice_ligne]);
    }
}
