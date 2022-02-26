<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\AffaireObjection;

class AffaireObjectionController extends Controller
{
    public function show($id_affaire_objection)
    {
        $relations = [
            //
        ];
        $affaire_objection = AffaireObjection::where('ID_AFFAIRE_OBJECTIONS', $id_affaire_objection)->with( $relations )->first();

        return view('models.affaire_objection.show', ['affaire_objection' => $affaire_objection]);
    }
}
