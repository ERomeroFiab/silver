<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\SocieteFamille;

class SocieteFamilleController extends Controller
{
    public function show($id_societe_famille)
    {
        $relations = [
            //
        ];
        $societe_famille = SocieteFamille::where('ID_SOCIETE_FAMILLE', $id_societe_famille)->with( $relations )->first();

        return view('models.societe_famille.show', ['societe_famille' => $societe_famille]);
    }
}
