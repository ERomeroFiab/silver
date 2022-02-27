<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Action;

class ActionController extends Controller
{
    public function show(Request $request)
    {
        $relations = [
            //
        ];
        $action = Action::where('ID_ACTION', $request->get('id_action'))->with( $relations )->first();

        return view('models.action.show', ['action' => $action]);
    }
}
