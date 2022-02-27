<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Identification;

class IdentificationController extends Controller
{
    public function show(Request $request)
    {
        $relations = [
            //
        ];
        $identification = Identification::where('ID_IDENTIFICATION', $request->get('id_identification'))->with( $relations )->first();

        return view('models.identification.show', ['identification' => $identification]);
    }
}
