<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AffaireConditionsFinanciere;

class AffaireConditionsFinanciereController extends Controller
{
    public function show($id_affaire_conditions_financiere)
    {
        $relations = [
            //
        ];
        $affaire_conditions_financiere = AffaireConditionsFinanciere::where('ID_AFFAIRE_CONDITIONS_FINANCIERES', $id_affaire_conditions_financiere)->with( $relations )->first();

        return view('models.affaire_conditions_financiere.show', ['affaire_conditions_financiere' => $affaire_conditions_financiere]);
    }
}
