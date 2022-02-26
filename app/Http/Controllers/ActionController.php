<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Action;

class ActionController extends Controller
{
    public function show($id_action)
    {
        $relations = [
            //
        ];
        $action = Action::where('ID_ACTION', $id_action)->with( $relations )->first();

        return view('models.action.show', ['action' => $action]);
    }
}
