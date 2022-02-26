<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Identification;

class IdentificationController extends Controller
{
    public function show($id_identification)
    {
        $relations = [
            //
        ];
        $identification = Identification::where('ID_IDENTIFICATION', $id_identification)->with( $relations )->first();

        return view('models.identification.show', ['identification' => $identification]);
    }
}
