<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SocieteFamille;

class SocieteFamilleController extends Controller
{
    public function show(Request $request)
    {
        $relations = [
            //
        ];
        $societe_famille = SocieteFamille::where('ID_SOCIETE_FAMILLE', $request->get('id_societe_famille'))->with( $relations )->first();

        return view('models.societe_famille.show', ['societe_famille' => $societe_famille]);
    }
}
