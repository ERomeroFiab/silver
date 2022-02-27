<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ContratPartielConditionFianciere;

class ContratPartielConditionFianciereController extends Controller
{
    public function show(Request $request)
    {
        $relations = [
            //
        ];
        $contrat_partiel_condition_fianciere = ContratPartielConditionFianciere::where('ID_CONTRAT_PARTIEL_CONDITION_FIANCIERES', $request->get('id_contrat_partiel_condition_fianciere'))->with( $relations )->first();

        return view('models.contrat_partiel_condition_fianciere.show', ['contrat_partiel_condition_fianciere' => $contrat_partiel_condition_fianciere]);
    }
}
