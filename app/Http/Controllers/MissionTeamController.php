<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use app\Models\MissionTeam;

class MissionTeamController extends Controller
{
    public function show(Request $request)
    {
        $relations = [
            //
        ];
        $mission_team = MissionTeam::where('ID_MISSION_TEAM', $request->get('id_mission_team'))->with( $relations )->first();
        
        return view('models.mission_team.show', ['mission_team' => $mission_team]);
    }
}
