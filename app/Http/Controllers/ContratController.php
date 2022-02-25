<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Contrat;

class ContratController extends Controller
{
    public function show($id_contrat)
    {
        $relations = [
            "actions",
            "affaires",
            "contrat_detail_produits",
            "contrat_partiel_condition_fiancieres",
            "documents",
            "invoices",
            "missions",
        ];
        $contrat = Contrat::where('ID_CONTRAT', $id_contrat)->with( $relations )->first();

        return view('models.contrat.show', ['contrat' => $contrat]);
    }
}
