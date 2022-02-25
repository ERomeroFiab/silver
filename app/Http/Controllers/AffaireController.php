<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Affaire;

class AffaireController extends Controller
{
    public function show($id_affaire)
    {
        $relations = [
            "affaire_conditions_financieres",
        ];
        $affaire = Affaire::where('ID_AFFAIRE', $id_affaire)->with( $relations )->first();

        return view('models.affaire.show', ['affaire' => $affaire]);
    }
}
