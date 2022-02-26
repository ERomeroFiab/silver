<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\HistoriqueMajAffaire;

class HistoriqueMajAffaireController extends Controller
{
    public function show($id_historique_maj_affaire)
    {
        $relations = [
            //
        ];
        $historique_maj_affaire = HistoriqueMajAffaire::where('ID_HISTORIQUE_MAJ_AFFAIRE', $id_historique_maj_affaire)->with( $relations )->first();

        return view('models.historique_maj_affaire.show', ['historique_maj_affaire' => $historique_maj_affaire]);
    }
}
