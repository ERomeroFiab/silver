<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MissionMotive;

class MissionMotiveController extends Controller
{
    public function show(Request $request)
    {
        $relations = [
            'mission_motive_ecos',
            'mission_motive_historique_majs',
        ];
        $mission_motive = MissionMotive::where('ID_MISSION_MOTIVE', $request->get('id_mission_motive'))->with( $relations )->first();

        return view('models.mission_motive.show', ['mission_motive' => $mission_motive]);
    }
}
