<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Document;

class DocumentController extends Controller
{
    public function show($id_document)
    {
        $relations = [
            //
        ];
        $document = Document::where('ID_DOCUMENTS', $id_document)->with( $relations )->first();

        return view('models.document.show', ['document' => $document]);
    }
}
