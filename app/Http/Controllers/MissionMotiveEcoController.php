<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MissionMotiveEco;

class MissionMotiveEcoController extends Controller
{
    public function show(Request $request)
    {
        $relations = [
            //
        ];
        $mission_motive_eco = MissionMotiveEco::where('ID_MISSION_MOTIVE_ECO', $request->get('id_mission_motive_eco'))->with( $relations )->first();
        
        return view('models.mission_motive_eco.show', ['mission_motive_eco' => $mission_motive_eco]);
    }
}
