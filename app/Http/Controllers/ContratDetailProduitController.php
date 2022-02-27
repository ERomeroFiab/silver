<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ContratDetailProduit;

class ContratDetailProduitController extends Controller
{
    public function show(Request $request)
    {
        $relations = [
            //
        ];
        $contrat_detail_produit = ContratDetailProduit::where('ID_CONTRAT_DETAIL_PRODUIT', $request->get('id_contrat_detail_produit'))->with( $relations )->first();

        return view('models.contrat_detail_produit.show', ['contrat_detail_produit' => $contrat_detail_produit]);
    }
}
