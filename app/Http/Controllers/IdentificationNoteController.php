<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use app\Models\IdentificationNote;

class IdentificationNoteController extends Controller
{
    public function show($id_identification_note)
    {
        $relations = [
            //
        ];
        $identification_note = IdentificationNote::where('ID_IDENTIFICATION_NOTE', $id_identification_note)->with( $relations )->first();

        return view('models.identification_note.show', ['identification_note' => $identification_note]);
    }
}
