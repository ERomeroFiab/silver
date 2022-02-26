<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use app\Models\JournalDeleted;

class JournalDeletedController extends Controller
{
    public function show($id_journal_deleted)
    {
        $relations = [
            //
        ];
        $journal_deleted = JournalDeleted::where('ID_JOURNAL_DELETED', $id_journal_deleted)->with( $relations )->first();
        
        return view('models.journal_deleted.show', ['journal_deleted' => $journal_deleted]);
    }
}
