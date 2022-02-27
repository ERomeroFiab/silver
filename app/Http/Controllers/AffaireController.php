<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Affaire;

class AffaireController extends Controller
{
    public function show(Request $request)
    {
        $relations = [
            "affaire_conditions_financieres",
        ];
        $affaire = Affaire::where('ID_AFFAIRE', $request->get('id_affaire'))->with( $relations )->first();

        return view('models.affaire.show', ['affaire' => $affaire]);
    }
}
