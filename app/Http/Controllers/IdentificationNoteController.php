<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\IdentificationNote;

class IdentificationNoteController extends Controller
{
    public function show(Request $request)
    {
        $relations = [
            //
        ];
        $identification_note = IdentificationNote::where('ID_IDENTIFICATION_NOTE', $request->get('id_identification_note'))->with( $relations )->first();

        return view('models.identification_note.show', ['identification_note' => $identification_note]);
    }
}
