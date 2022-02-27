<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Mission;

class MissionController extends Controller
{
    public function show(Request $request)
    {
        $relations = [
            'identification',
            'actions',
            'documents',
            'mission_motives',
            'mission_motive_historique_majs',
            'mission_teams',
        ];
        $mission = Mission::where('ID_MISSION', $request->get('id_mission'))->with( $relations )->first();

        return view('models.mission.show', ['mission' => $mission]);
    }
}
