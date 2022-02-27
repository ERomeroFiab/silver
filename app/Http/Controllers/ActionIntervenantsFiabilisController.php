<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\ActionIntervenantsFiabilis;

class ActionIntervenantsFiabilisController extends Controller
{
    public function show(Request $request)
    {
        $relations = [
            //
        ];
        $action_intervenants_fiabilis = ActionIntervenantsFiabilis::where('ID_ACTION_INTERVENANTS_FIABILIS', $request->get('id_action_intervenants_fiabilis'))->with( $relations )->first();

        return view('models.action_intervenants_fiabilis.show', ['action_intervenants_fiabilis' => $action_intervenants_fiabilis]);
    }
}
