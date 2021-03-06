<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MissionMotiveHistoriqueMaj;

class MissionMotiveHistoriqueMajController extends Controller
{
    public function show(Request $request)
    {
        $relations = [
            //
        ];
        $mission_motive_historique_maj = MissionMotiveHistoriqueMaj::where('ID_MISSION_MOTIVE_HISTORIQUE_MAJ', $request->get('id_mission_motive_historique_maj'))->with( $relations )->first();
        
        return view('models.mission_motive_historique_maj.show', ['mission_motive_historique_maj' => $mission_motive_historique_maj]);
    }
}
